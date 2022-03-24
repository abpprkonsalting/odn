<?php

namespace App\Http\Controllers;

use App\Models\OperationalInformation;
use App\Models\PersonalInformation;
use App\Models\Status;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Array_;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personalInformationCount = PersonalInformation::count();
        $operationalInformationsByStatus = Array();
        Status::all()->each(function($item) use (&$operationalInformationsByStatus){
            $count = OperationalInformation::with('status')->get()->filter(function($value) use ($item) {
                if ($value['status'] == $item) {
                    return true;
                }})->count();
            $operationalInformationsByStatus [$item->name] = $count;
        });
        
        $ops = OPerationalInformation::all()->groupBy("personal_informations_id");


        return view('home', compact('personalInformationCount','operationalInformationsByStatus'));
    }
}
