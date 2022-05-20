<?php

namespace App\Exports;

use App\Models\Course;
use App\Models\LicenseEndorsement;
use App\Models\Passport;
use App\Models\PersonalMedicalInformation;
use App\Models\SeamanBook;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

use FontLib\TrueType\Collection;

class MailReportExport implements FromCollection, WithStyles, ShouldAutoSize
{
    private $currentTime;
    private $deadLine;
    private $expiredRows = [];
    private $startRow = 2;

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $this->currentTime = Carbon::now();
        $this->deadLine = Carbon::now()->addMonthsWithOverflow(2)->addDays(15);
        $headers = collect([
            0 => [
                'internal_file_number' => 'Internal File Number',
                'rank' => 'Rank',
                'full_name' => 'Full Name',
                'document_type' => 'Document Type',
                'document_identification' => 'Document Identification',
                'expiry_date' => 'Expire Date',
                'days_to_expire' => 'Time to expire',
                'company' => 'Company'
            ]

        ]);
        $nonValidPassports = $this->nonValidPassports();
        $nonValidMedicalInformations = $this->nonValidMedicalInformations();
        $nonValidCourses = $this->nonValidCourses();
        $nonValidLicenses = $this->nonValidLicenseEndorsements();
        $nonValidSeamanBooks = $this->nonValidSeamanBooks();
        $collection = $nonValidPassports
                        ->concat($nonValidMedicalInformations)
                        ->concat($nonValidCourses)
                        ->concat($nonValidLicenses)
                        ->concat($nonValidSeamanBooks)
                        ->sortByDesc([
                            ['internal_file_number', 'asc'],
                            ['expiry_date', 'asc'],
                            ['document_type', 'asc']
                        ]);
        return $headers->concat($collection);
    }

    private function nonValidPassports()
    {
        $passports = Passport::get();
        $passports = $passports->filter(function ($passport, $key) {
            if ($passport->expiry_extension_date != null) {
                $expiryExtensionDate = Carbon::createFromFormat('d-m-Y', $passport->expiry_extension_date);
                if ($expiryExtensionDate->lt($this->deadLine)) {
                    return true;
                }
                return false;
            }
            $expiryDate = Carbon::createFromFormat('d-m-Y', $passport->expiry_date);
            if ($expiryDate != null && $expiryDate->lt($this->deadLine)) {
                return true;
            }
            return false;
        });
        $passports = collect($passports->values());
        $passports = $passports->map(function ($item, $key) {
            $passportEndDate = $item->expiry_extension_date != null ? $item->expiry_extension_date : $item->expiry_date;
            $endDate = Carbon::createFromFormat('d-m-Y', $passportEndDate);
            $toEndDate = $this->timeToEndDate($endDate, $this->currentTime);
            if ($toEndDate['expired']) array_push($this->expiredRows, $key + $this->startRow);
            return [
                'internal_file_number' => $item->personalInformation->internal_file_number,
                'rank' => $item->personalInformation->highestRankCourseNumber()?->courseNumber->rank->name,
                'full_name' => $item->personalInformation->full_name,
                'document_type' => 'passport',
                'document_identification' => $item->no_passport,
                'expiry_date' => $item->expiry_extension_date != null ? $item->expiry_extension_date : $item->expiry_date,
                'days_to_expire' => $toEndDate['timeToEndDate'],
                'company' => $item->personalInformation->company?->company_name
            ];
        });
        $this->startRow += $passports->count();
        return $passports;
    }

    private function nonValidMedicalInformations(): \Illuminate\Support\Collection
    {
        $personalMedicalInformations = PersonalMedicalInformation::get();
        $personalMedicalInformations = $personalMedicalInformations->filter(function ($item, $key) {
            if ($item->expiry_date != null) {
                $expiryDate = Carbon::createFromFormat('d-m-Y', $item->expiry_date);
                if ($expiryDate->lt($this->deadLine)) {
                    return true;
                }
                return false;
            }
            return false;
        });
        $personalMedicalInformations = collect($personalMedicalInformations->values());
        $personalMedicalInformations = $personalMedicalInformations->map(function ($item, $key) {
            $endDate = Carbon::createFromFormat('d-m-Y', $item->expiry_date);
            $toEndDate = $this->timeToEndDate($endDate, $this->currentTime);
            if ($toEndDate['expired']) array_push($this->expiredRows, $key + $this->startRow);
            return [
                'internal_file_number' => $item->personalInformation->internal_file_number,
                'rank' => $item->personalInformation->highestRankCourseNumber()?->courseNumber->rank->name,
                'full_name' => $item->personalInformation->full_name,
                'document_type' => 'medical information',
                'document_identification' => $item->medicalInformation->name,
                'expiry_date' => $item->expiry_date,
                'days_to_expire' => $toEndDate['timeToEndDate'],
                'company' => $item->personalInformation->company?->company_name
            ];
        });
        $this->startRow += $personalMedicalInformations->count();
        return $personalMedicalInformations;
    }

    private function nonValidCourses(): \Illuminate\Support\Collection
    {
        $courses = Course::get();
        $courses = $courses->filter(function ($item, $key) {
            if ($item->end_date != null) {
                $expiryDate = Carbon::createFromFormat('d-m-Y', $item->end_date);
                if ($expiryDate->lt($this->deadLine)) {
                    return true;
                }
                return false;
            }
            return false;
        });
        $courses = collect($courses->values());
        $courses = $courses->map(function ($item, $key) {
            $endDate = Carbon::createFromFormat('d-m-Y', $item->end_date);
            $toEndDate = $this->timeToEndDate($endDate, $this->currentTime);
            if ($toEndDate['expired']) array_push($this->expiredRows, $key + $this->startRow);
            return [
                'internal_file_number' => $item->personalInformation->internal_file_number,
                'rank' => $item->personalInformation->highestRankCourseNumber()?->courseNumber->rank->name,
                'full_name' => $item->personalInformation->full_name,
                'document_type' => 'course',
                'document_identification' => $item->courseNumber->name,
                'expiry_date' => $item->end_date,
                'days_to_expire' => $toEndDate['timeToEndDate'],
                'company' => $item->personalInformation->company?->company_name
            ];
        });
        $this->startRow += $courses->count();
        return $courses;
    }

    private function nonValidLicenseEndorsements(): \Illuminate\Support\Collection
    {
        $licenseEndorsements = LicenseEndorsement::get();
        $licenseEndorsements = $licenseEndorsements->filter(function ($item, $key) {
            if ($item->expiry_date != null) {
                $expiryDate = Carbon::createFromFormat('d-m-Y', $item->expiry_date);
                if ($expiryDate->lt($this->deadLine)) {
                    return true;
                }
                return false;
            }
            return false;
        });
        $licenseEndorsements = collect($licenseEndorsements->values());
        $licenseEndorsements = $licenseEndorsements->map(function ($item, $key) {
            $endDate = Carbon::createFromFormat('d-m-Y', $item->expiry_date);
            $toEndDate = $this->timeToEndDate($endDate, $this->currentTime);
            if ($toEndDate['expired']) array_push($this->expiredRows, $key + $this->startRow);
            return [
                'internal_file_number' => $item->personalInformation->internal_file_number,
                'rank' => $item->personalInformation->highestRankCourseNumber()?->courseNumber->rank->name,
                'full_name' => $item->personalInformation->full_name,
                'document_type' => 'License',
                'document_identification' => $item->licenseEndorsementName->name,
                'expiry_date' => $item->expiry_date,
                'days_to_expire' => $toEndDate['timeToEndDate'],
                'company' => $item->personalInformation->company?->company_name
            ];
        });
        $this->startRow += $licenseEndorsements->count();
        return $licenseEndorsements;
    }

    private function nonValidSeamanBooks(): \Illuminate\Support\Collection
    {
        $seamanBooks = SeamanBook::get();
        $seamanBooks = $seamanBooks->filter(function ($item, $key) {
            if ($item->expiry_date != null) {
                $expiryDate = Carbon::createFromFormat('d-m-Y', $item->expiry_date);
                if ($expiryDate->lt($this->deadLine)) {
                    return true;
                }
                return false;
            }
            return false;
        });
        $seamanBooks = collect($seamanBooks->values());
        $seamanBooks = $seamanBooks->map(function ($item, $key) {
            $endDate = Carbon::createFromFormat('d-m-Y', $item->expiry_date);
            $toEndDate = $this->timeToEndDate($endDate, $this->currentTime);
            if ($toEndDate['expired']) array_push($this->expiredRows, $key + $this->startRow);
            return [
                'internal_file_number' => $item->personalInformation->internal_file_number,
                'rank' => $item->personalInformation->highestRankCourseNumber()?->courseNumber->rank->name,
                'full_name' => $item->personalInformation->full_name,
                'document_type' => 'SeamanBook',
                'document_identification' => $item->number,
                'expiry_date' => $item->expiry_date,
                'days_to_expire' => $toEndDate['timeToEndDate'],
                'company' => $item->personalInformation->company?->company_name
            ];
        });
        $this->startRow += $seamanBooks->count();
        return $seamanBooks;
    }

    private function timeToEndDate($endDate, $currentTime)
    {
        $toEndDate = $endDate->longRelativeDiffForHumans($currentTime, 3);
        $beforePosition = strrpos($toEndDate, 'before');
        if ($beforePosition !== false) {
            $toEndDate = "- " . str_replace(' before', '', $toEndDate);
            return [
                'expired' => true,
                'timeToEndDate' => $toEndDate
            ];
        } else {
            $afterPosition = strrpos($toEndDate, 'after');
            if ($afterPosition !== false) {
                $toEndDate = str_replace(' after', '', $toEndDate);
                return [
                    'expired' => false,
                    'timeToEndDate' => $toEndDate
                ];
            }
        }
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:H1')
            ->getFont()
            ->setBold(true);
        $sheet->getStyle('A1:H1')
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $sheet->getStyle('A1:H1')
            ->getBorders()
            ->getAllBorders()
            ->getColor()
            ->setRGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);
        $sheet->getStyle('A1:H1')
            ->getFill()
            ->setFillType('solid')
            ->getStartColor()
            ->setRGB('CCCCCC');
        // if (!empty($this->expiredRows)) {
        //     foreach ($this->expiredRows as $key => $value) {
        //         $cell = 'F' . $value;
        //         $this->setRedCell($sheet, $cell);
        //         $cell = 'G' . $value;
        //         $this->setRedCell($sheet, $cell);
        //     }
        // }
        $conditional = new \PhpOffice\PhpSpreadsheet\Style\Conditional();
        $conditional->setConditionType(\PhpOffice\PhpSpreadsheet\Style\Conditional::CONDITION_CONTAINSTEXT);
        $conditional->setOperatorType(\PhpOffice\PhpSpreadsheet\Style\Conditional::CONDITION_CONTAINSTEXT);
        $conditional->setText('-');
        $conditional->getStyle()
                    ->getFont()
                    ->getColor()
                    ->setRGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED);
        $conditional->getStyle()
                    ->getFont()
                    ->setBold(true);
        $conditionalStyles = $sheet->getStyle('G')->getConditionalStyles();
        $conditionalStyles[] = $conditional;
        $sheet->getStyle('G')->setConditionalStyles($conditionalStyles);
    }

    private function setRedCell(Worksheet $sheet, $cell)
    {
        $sheet->getStyle($cell)
            ->getFill()
            ->setFillType('solid')
            ->getStartColor()
            ->setRGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED);
        $sheet->getStyle($cell)
            ->getFont()
            ->getColor()
            ->setRGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
    }
}
