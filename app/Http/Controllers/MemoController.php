<?php

namespace App\Http\Controllers;

use App\DataTables\MemoDataTable;
use Illuminate\Http\Request;

use App\Http\Requests\CreateMemoRequest;
use App\Http\Requests\UpdateMemoRequest;
use App\Repositories\MemoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use App\Models\PersonalInformation;
use App\Repositories\PersonalInformationRepository;
use Yajra\DataTables\DataTables;
use Response;

class MemoController extends AppBaseController
{
    /** @var  MemoRepository */
    private $memoRepository;
    /** @var  PersonalInformationRepository */
    private $personalInformationRepo;

    public function __construct(MemoRepository $memoRepo, PersonalInformationRepository $personalInformationRepo)
    {
        $this->memoRepository = $memoRepo;
        $this->personalInformationRepo = $personalInformationRepo;
    }

    /**
     * Display a listing of the Memo.
     *
     * @param MemoDataTable $memoDataTable
     * @return Response
     */
    public function index(MemoDataTable $memoDataTable)
    {
        return $memoDataTable->render('memos.index');
    }

    /**
     * Show the form for creating a new Memo.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        if(isset($request->id) && !empty($request->id)) {
            $personalInformationModel = $this->personalInformationRepo->model();
            $personalInformation = $personalInformationModel::find($request->id);

            if(!empty($personalInformation)) {
                return view('memos.create')->with('personalInformation', $personalInformation);
            }
        }

        Flash::error('Personal Information not found');
        return redirect(route('personalInformations.index'));
        
    }

    /**
     * Store a newly created Memo in storage.
     *
     * @param CreateMemoRequest $request
     *
     * @return Response
     */
    public function store(CreateMemoRequest $request)
    {
        $input = $request->all();

        $memo = $this->memoRepository->create($input);

        Flash::success('Memo saved successfully.');

        return redirect(route('memos.create', [ 'id' => $memo->personal_informations_id ]));
    }

    /**
     * Display the specified Memo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $memo = $this->memoRepository->find($id);

        if (empty($memo)) {
            Flash::error('Memo not found');

            return redirect(route('memos.index'));
        }

        return view('memos.show')->with('memo', $memo);
    }

    /**
     * Show the form for editing the specified Memo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $memo = $this->memoRepository->find($id);

        if (empty($memo)) {
            Flash::error('Memo not found');

            return redirect(route('memos.index'));
        }

        return view('memos.edit')->with(['memo' => $memo, 'personalInformation' => $memo->personalInformation]);
    }

    /**
     * Update the specified Memo in storage.
     *
     * @param  int              $id
     * @param UpdateMemoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMemoRequest $request)
    {
        $memo = $this->memoRepository->find($id);

        if (empty($memo)) {
            Flash::error('Memo not found');

            return redirect(route('memos.index'));
        }

        $memo = $this->memoRepository->update($request->all(), $id);

        Flash::success('Memo updated successfully.');

        return redirect(route('memos.create', [ 'id' => $memo->personal_informations_id ]));
    }

    /**
     * Remove the specified Memo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $memo = $this->memoRepository->find($id);

        if (empty($memo)) {
            Flash::error('Memo not found');

            return redirect(route('personalInformation.index'));
        }

        try{
            
            $this->memoRepository->find($id)->forcedelete();

            Flash::success('Memo deleted successfully.');

 
             }
         catch(\Illuminate\Database\QueryException $ex){
             
     
            Flash::success('Memo Cannot Delete. It has been used for other entity');
            
             }

        

        return redirect(route('memos.create', [ 'id' => $memo->personal_informations_id ]));
    }

    /**
     * Return JSON with listing of the Memos belong to PersonalInformation.
     *
     * @param integer $personal_informations_id
     * @return JSON
     */
    public function getPersonalInformationMemo($id)
    {
        $memoModel = $this->memoRepository->model();
        return Datatables::of($memoModel::where(['personal_informations_id' => $id])->get())
            ->addColumn('action', 'memos.datatables_actions')
            ->rawColumns(['action'])
            ->make(true);
    
    }
}
