<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\wednesdaybethelattendance;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class WednesdayChartController extends Controller
{
    //
    public function index()
    {
        return view('attendance.wednesdaychart');
    }
    public function show()
    {
        //Retrieving the attendance from the database 
        $data=wednesdaybethelattendance::all();

        //Processing the date 
        $data->each(function ($item){ 
            $item->date = Carbon::parse($item->date)->format('l j, F Y');
        });
        return response()->json($data);

    }

    public function wednesdaytable()
    {
        //Retrieving the attendance from the database 
        $wednesdayData =wednesdaybethelattendance::all();

        //Processing the date 
        $wednesdayData->each(function ($item)
        {
            $item->date=Carbon::parse($item->date)->format('l j, F Y');

        });
        return view('attendance.wednesdaytable',compact('wednesdayData'));

       

    }
	public function wednesdayform(){
		return view('attendance.wednesdayform');
	}



}