<?php

namespace App\Services;

use App\Models\OperationalInformation;
use Illuminate\Support\Collection;
use Carbon\Carbon;

use App\Models\PersonalInformation;
use App\Models\Status;
use App\Repositories\OperationalInformationRepository;
use App\Repositories\PersonalInformationRepository;
use PhpOffice\PhpSpreadsheet\Calculation\Logical\Boolean;

class StatusService
{

    /** @var  OperationalInformationRepository */
    private $operationalInformationRepository;


    private $currentTime;
    private $nonReadyStatus;
    private $readyStatus;

    /**
     * Constructs a new status service.
     *
     */
    public function __construct(
        OperationalInformationRepository $operationalInformationRepository
    ) {
        $this->operationalInformationRepository = $operationalInformationRepository;
    }

    /**
     *
     * @param \App\Models\PersonalInformation $personalInformation
     * @return void
     */
    public function checkPersonalInformationStatus(PersonalInformation $personalInformation = null): void
    {
        $personalInformations = new Collection();
        if ($personalInformation != null) {
            $personalInformations->add($personalInformation);
        } else {
            $personalInformations = PersonalInformation::with([
                'courses',
                'passports',
                'seamanBooks',
                'personalMedicalInformations',
                'licenseEndorsements',
                'operationalInformation'
            ])->get();
        }
        $this->currentTime = Carbon::now();
        $this->nonReadyStatus = Status::where(['name' => "Non Ready"])->first();
        $this->readyStatus = Status::where(['name' => "Ready"])->first();
        $personalInformations->each($this->checkStatus());
    }

    private function checkStatus(): callable
    {
        return function ($item, $key) {
            $status = $item->operationalInformation->status;
            if ($status == $this->readyStatus || $status == $this->nonReadyStatus) {
                if (!$this->checkValidPassports($item)) return;
                if (!$this->checkValidMedicalInformation($item)) return;
                if (!$this->checkValidCourses($item)) return;
                if (!$this->checkLicenseEndorsements($item)) return;
                if (!$this->checkSeamanBook($item)) return;

                $this->setPersonalInformationStatus($item, $this->readyStatus);
            }
        };
    }

    private function checkValidPassports($personalInformation) : bool
    {
        $passports = $personalInformation->passports;
        if ($passports->first() == null) {
            $this->setPersonalInformationStatus($personalInformation, $this->nonReadyStatus);
            return false;
        }
        $validPassport = $passports->first(function ($passport, $key) {
            if ($passport->expiry_extension_date != null) {
                $expiryExtensionDate = Carbon::createFromFormat('d-m-Y', $passport->expiry_extension_date);
                if ($expiryExtensionDate->gt($this->currentTime)) {
                    return true;
                }
            }
            $expiryDate = Carbon::createFromFormat('d-m-Y', $passport->expiry_date);
            if ($expiryDate != null && $expiryDate->gt($this->currentTime)) {
                return true;
            }
        });
        if ($validPassport == null) {
            $this->setPersonalInformationStatus($personalInformation, $this->nonReadyStatus);
            return false;
        }
        return true;
    }

    // El algoritmo de esto hay que revisarlo
    private function checkValidMedicalInformation($personalInformation)
    {
        $personalMedicalInformations = $personalInformation->personalMedicalInformations;
        if ($personalMedicalInformations->first() == null) {
            $this->setPersonalInformationStatus($personalInformation, $this->nonReadyStatus);
            return false;
        }
        $nonValidPersonalMedicalInformations = $personalMedicalInformations->first(function ($item, $key) {
            if ($item->expiry_date != null) {
                $expiryDate = Carbon::createFromFormat('d-m-Y', $item->expiry_date);
                if ($expiryDate->lt($this->currentTime)) {
                    return true;
                }
            }
        });
        if ($nonValidPersonalMedicalInformations != null) {
            $this->setPersonalInformationStatus($personalInformation, $this->nonReadyStatus);
            return false;
        }
        return true;
    }

    private function checkValidCourses($personalInformation)
    {
        $courses = $personalInformation->courses;
        if ($courses->first() == null) {
            $this->setPersonalInformationStatus($personalInformation, $this->nonReadyStatus);
            return false;
        }
        $nonValidCourses = $courses->first(function ($item, $key) {
            if ($item->end_date != null) {
                $endDate = Carbon::createFromFormat('d-m-Y', $item->end_date);
                if ($endDate->lt($this->currentTime)) {
                    return true;
                }
            }
        });
        if ($nonValidCourses != null) {
            $this->setPersonalInformationStatus($personalInformation, $this->nonReadyStatus);
            return false;
        }
        return true;
    }

    private function checkLicenseEndorsements($personalInformation)
    {
        $licenseEndorsements = $personalInformation->licenseEndorsements;
        if ($licenseEndorsements->first() == null) {
            $this->setPersonalInformationStatus($personalInformation, $this->nonReadyStatus);
            return false;
        }
        $nonValidLicenseEndorsements = $licenseEndorsements->first(function ($item, $key) {
            if ($item->expiry_date != null) {
                $expiryDate = Carbon::createFromFormat('d-m-Y', $item->expiry_date);
                if ($expiryDate->lt($this->currentTime)) {
                    return true;
                }
            }
        });
        if ($nonValidLicenseEndorsements != null) {
            $this->setPersonalInformationStatus($personalInformation, $this->nonReadyStatus);
            return false;
        }
        return true;
    }

    private function checkSeamanBook($personalInformation)
    {
        $seamanBooks = $personalInformation->seamanBooks;
        if ($seamanBooks->first() == null) {
            $this->setPersonalInformationStatus($personalInformation, $this->nonReadyStatus);
            return false;
        }
        $nonValidSeamanBooks = $seamanBooks->first(function ($item, $key) {
            if ($item->expiry_date != null) {
                $expiryDate = Carbon::createFromFormat('d-m-Y', $item->expiry_date);
                if ($expiryDate->lt($this->currentTime)) {
                    return true;
                }
            }
        });
        if ($nonValidSeamanBooks != null) {
            $this->setPersonalInformationStatus($personalInformation, $this->nonReadyStatus);
            return false;
        }
        return true;
    }

    private function setPersonalInformationStatus($personalInformation, $status) {
        $this->operationalInformationRepository->update(
            ['statuses_id' => $status->id],
            $personalInformation->operationalInformation->id
        );
    }
}
