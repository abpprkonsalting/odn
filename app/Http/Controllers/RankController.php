<?php

namespace App\Http\Controllers;

use App\DataTables\RankDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateRankRequest;
use App\Http\Requests\UpdateRankRequest;
use App\Repositories\RankRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class RankController extends AppBaseController
{
    /** @var  RankRepository */
    private $rankRepository;

    public function __construct(RankRepository $rankRepo)
    {
        $this->rankRepository = $rankRepo;
    }

    /**
     * Display a listing of the Rank.
     *
     * @param RankDataTable $rankDataTable
     * @return Response
     */
    public function index(RankDataTable $rankDataTable)
    {
        return $rankDataTable->render('ranks.index');
    }

    /**
     * Show the form for creating a new Rank.
     *
     * @return Response
     */
    public function create()
    {
        return view('ranks.create');
    }

    /**
     * Store a newly created Rank in storage.
     *
     * @param CreateRankRequest $request
     *
     * @return Response
     */
    public function store(CreateRankRequest $request)
    {
        $input = $request->all();

        $rank = $this->rankRepository->create($input);

        Flash::success('Rank saved successfully.');

        return redirect(route('ranks.index'));
    }

    /**
     * Display the specified Rank.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $rank = $this->rankRepository->find($id);

        if (empty($rank)) {
            Flash::error('Rank not found');

            return redirect(route('ranks.index'));
        }

        return view('ranks.show')->with('rank', $rank);
    }

    /**
     * Show the form for editing the specified Rank.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $rank = $this->rankRepository->find($id);

        if (empty($rank)) {
            Flash::error('Rank not found');

            return redirect(route('ranks.index'));
        }

        return view('ranks.edit')->with('rank', $rank);
    }

    /**
     * Update the specified Rank in storage.
     *
     * @param  int              $id
     * @param UpdateRankRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRankRequest $request)
    {
        $rank = $this->rankRepository->find($id);

        if (empty($rank)) {
            Flash::error('Rank not found');

            return redirect(route('ranks.index'));
        }

        $rank = $this->rankRepository->update($request->all(), $id);

        Flash::success('Rank updated successfully.');

        return redirect(route('ranks.index'));
    }

    /**
     * Remove the specified Rank from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $rank = $this->rankRepository->find($id);

        if (empty($rank)) {
            Flash::error('Rank not found');

            return redirect(route('ranks.index'));
        }

        $this->rankRepository->delete($id);

        Flash::success('Rank deleted successfully.');

        return redirect(route('ranks.index'));
    }
}
