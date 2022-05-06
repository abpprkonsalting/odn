<?php

namespace App\Http\Controllers;

use App\DataTables\AffiliateDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAffiliateRequest;
use App\Http\Requests\UpdateAffiliateRequest;
use App\Repositories\AffiliateRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AffiliateController extends AppBaseController
{
    /** @var  AffiliateRepository */
    private $affiliateRepository;

    public function __construct(AffiliateRepository $affiliateRepo)
    {
        $this->affiliateRepository = $affiliateRepo;
    }

    /**
     * Display a listing of the Affiliate.
     *
     * @param AffiliateDataTable $affiliateDataTable
     * @return Response
     */
    public function index(AffiliateDataTable $affiliateDataTable)
    {
        return $affiliateDataTable->render('affiliates.index');
    }

    /**
     * Show the form for creating a new Affiliate.
     *
     * @return Response
     */
    public function create()
    {
        return view('affiliates.create');
    }

    /**
     * Store a newly created Affiliate in storage.
     *
     * @param CreateAffiliateRequest $request
     *
     * @return Response
     */
    public function store(CreateAffiliateRequest $request)
    {
        $input = $request->all();

        $affiliate = $this->affiliateRepository->create($input);

        Flash::success('Affiliate saved successfully.');

        return redirect(route('affiliates.index'));
    }

    /**
     * Display the specified Affiliate.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $affiliate = $this->affiliateRepository->find($id);

        if (empty($affiliate)) {
            Flash::error('Affiliate not found');

            return redirect(route('affiliates.index'));
        }

        return view('affiliates.show')->with('affiliate', $affiliate);
    }

    /**
     * Show the form for editing the specified Affiliate.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $affiliate = $this->affiliateRepository->find($id);

        if (empty($affiliate)) {
            Flash::error('Affiliate not found');

            return redirect(route('affiliates.index'));
        }

        return view('affiliates.edit')->with('affiliate', $affiliate);
    }

    /**
     * Update the specified Affiliate in storage.
     *
     * @param  int              $id
     * @param UpdateAffiliateRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAffiliateRequest $request)
    {
        $affiliate = $this->affiliateRepository->find($id);

        if (empty($affiliate)) {
            Flash::error('Affiliate not found');

            return redirect(route('affiliates.index'));
        }

        $affiliate = $this->affiliateRepository->update($request->all(), $id);

        Flash::success('Affiliate updated successfully.');

        return redirect(route('affiliates.index'));
    }

    /**
     * Remove the specified Affiliate from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $affiliate = $this->affiliateRepository->find($id);

        if (empty($affiliate)) {
            Flash::error('Affiliate not found');

            return redirect(route('affiliates.index'));
        }

        $this->affiliateRepository->find($id)->forcedelete();

        Flash::success('Affiliate deleted successfully.');

        return redirect(route('affiliates.index'));
    }
}
