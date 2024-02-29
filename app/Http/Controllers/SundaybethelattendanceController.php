<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sundaybethelattendance;
use Illuminate\Support\Facades\Session;

class SundaybethelattendanceController extends Controller
{
    //
    public function index()
    {
        return view('attendance.index');
    }
	public function home()
	{
		return view('attendance.home');
	}
    public function store(Request $request)
    {
        $request->validate([
            'men' => 'required|numeric',
            'women' => 'required|numeric',
            'children' => 'required|numeric',
            'guests' => 'required|numeric',
            'converts' => 'required|numeric',
            'total' => 'required|numeric',
            'message' => 'required|string',
            'minister' => 'required|string',
            'date'=>'required|date',

        ]);
        //Create a new attendance instance and populate with the data 
        $attendance = new sundaybethelattendance([
            'men' => $request->input('men'),
            'women' => $request->input('women'),
            'children' => $request->input('children'),
            'guests' => $request->input('guests'),
            'converts' => $request->input('converts'),
            'total' => $request->input('total'),
            'message' => $request->input('message'),
            'minister' => $request->input('minister'),
            'date'=>$request->input('date'),

        ]);

        //Save the attendance data 
        $attendance->save();

        //Flash a success message to the session 
        Session::flash('success', 'Congrats!!! Your data has been saved successfully');

        return redirect()->route('bethelattendance.index');
    }
}