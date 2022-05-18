<?php

namespace App\Http\Controllers;

use App\DataTables\SeamanBookDataTable;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\CreateSeamanBookRequest;
use App\Http\Requests\UpdateSeamanBookRequest;
use App\Repositories\SeamanBookRepository;
use App\Models\PersonalInformation;
use App\Repositories\PersonalInformationRepository;
use Yajra\DataTables\DataTables;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SeamanBookController extends AppBaseController
{
    /** @var  SeamanBookRepository */
    private $seamanBookRepository;
    /** @var  PersonalInformationRepository */
    private $personalInformationRepo;

    public function __construct(SeamanBookRepository $seamanBookRepo, PersonalInformationRepository $personalInformationRepo)
    {
        $this->seamanBookRepository = $seamanBookRepo;
        $this->personalInformationRepo = $personalInformationRepo;
    }

    /**
     * Display a listing of the SeamanBook.
     *
     * @param SeamanBookDataTable $seamanBookDataTable
     * @return Response
     */
    public function index(SeamanBookDataTable $seamanBookDataTable)
    {
        return $seamanBookDataTable->render('seaman_books.index');
    }

    /**
     * Show the form for creating a new SeamanBook.
     *
     * @return Response
     */
    public function create(Request $request)
    {

        if (isset($request->id) && !empty($request->id)) {
            $personalInformationModel = $this->personalInformationRepo->model();
            $personalInformation = $personalInformationModel::find($request->id);

            if (!empty($personalInformation)) {
                return view('seaman_books.create')->with('personalInformation', $personalInformation);
            }
        }

        Flash::error('Personal Information not found');
        return redirect(route('personalInformations.index'));
    }

    /**
     * Store a newly created SeamanBook in storage.
     *
     * @param CreateSeamanBookRequest $request
     *
     * @return Response
     */
    public function store(CreateSeamanBookRequest $request)
    {
        $input = $request->all();

        $seamanBook = $this->seamanBookRepository->create($input);

        Flash::success('Seaman Book saved successfully.');


        return redirect(route('seamanBooks.create', ['id' => $seamanBook->personal_informations_id]));
    }

    /**
     * Display the specified SeamanBook.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $seamanBook = $this->seamanBookRepository->find($id);

        if (empty($seamanBook)) {
            Flash::error('Seaman Book not found');

            return redirect(route('seamanBooks.index'));
        }

        return view('seaman_books.show')->with('seamanBook', $seamanBook);
    }

    /**
     * Show the form for editing the specified SeamanBook.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $seamanBook = $this->seamanBookRepository->find($id);

        if (empty($seamanBook)) {
            Flash::error('Seaman Book not found');

            return redirect(route('seamanBooks.index'));
        }


        return view('seaman_books.edit')->with(['seamanBook' => $seamanBook, 'personalInformation' => $seamanBook->personalInformation]);
    }

    /**
     * Update the specified SeamanBook in storage.
     *
     * @param  int              $id
     * @param UpdateSeamanBookRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSeamanBookRequest $request)
    {
        $seamanBook = $this->seamanBookRepository->find($id);

        if (empty($seamanBook)) {
            Flash::error('Seaman Book not found');

            return redirect(route('seamanBooks.index'));
        }

        $seamanBook = $this->seamanBookRepository->update($request->all(), $id);

        Flash::success('Seaman Book updated successfully.');


        return redirect(route('seamanBooks.create', ['id' => $seamanBook->personal_informations_id]));
    }

    /**
     * Remove the specified SeamanBook from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        try {
            $seamanBook = $this->seamanBookRepository->find($id);
            $personalInformationId = $seamanBook->personal_information_id;
            $seamanBook->forcedelete();
            Flash::success('Seaman Book deleted successfully.');
        } catch (\Illuminate\Database\QueryException $ex) {
            Flash::error('The Seaman Book can not be deleted. Probably it\'s been used by other entity');
        } finally {
            return redirect(route('seamanBooks.create', ['id' => $personalInformationId]));
        }
    }

    /**
     * Return JSON with listing of the Seaman Book belong to PersonalInformation.
     *
     * @param integer $personal_informations_id
     * @return JSON
     */
    public function getPersonalInformationSeamanBook($id)
    {
        $seamanBookModel = $this->seamanBookRepository->model();
        return Datatables::of($seamanBookModel::where(['personal_informations_id' => $id])->get())
            ->addColumn('action', 'seaman_books.datatables_actions')
            ->rawColumns(['action'])
            ->make(true);
    }
}
