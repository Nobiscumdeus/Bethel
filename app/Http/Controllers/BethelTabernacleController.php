<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\bethel;

class BethelTabernacleController extends Controller
{
    //
    //

    public function index()
    {
        $members=bethel::all();
        return view('crud.index')->with('members',$members);
    }
    public function create()
    {
        return view('crud.create');
    }
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'name'=>'required|string',
            'sex'=>'required|string',
            'about'=>'required|string',
            
        ]);
        $bethel=bethel::create($validatedData);
        return redirect()->route('crud.index')->with('success','data entered successfully');
       // return response()->json($bethel,201);
       
      
    }
   //Edit is the form, update is the action 
   //create is the form, store is then the action 
   public function edit($member) //No request is approaching it from a form, hence the model alone
   {
       $bethel=bethel::find($member);
       return view('crud.edit',compact('bethel'));
  
   }

   
   public function update(Request $request,$member) //Now You have a request from a form and then you also need the model
   {

        $validatedData=$request->validate([
            'name'=>'required|string',
            'sex'=>'required|string',
            'about'=>'required|string'
        ]);
       bethel::where('id',$member)->update($validatedData);
       return redirect()->route('crud.index')->with('success','Data has been updated successfully');

   }
   public function destroy($member)
   {
    bethel::find($member)->delete();
    return redirect()->route('crud.index')->with('success','Data deleted successfully');


   }
  
/**
 * 

  
public function show(bethel $bethel)
{

    return view('crud.show', compact('bethel'));
}

public function edit(bethel $bethel)
{
    return view('crud.edit', compact('bethel'));
}

public function update(Request $request, bethel $bethel)
{
    $validatedData=$request->validate([
        'name'=>'required|string|max:255',
        'contact'=>'required|integer',
        'sex'=>'required|string|max:255',
        'about'=>'required|string'
    ]);

    $bethel->update($validatedData);
    return redirect()->route('crud.show',$bethel)->with('success','Data updated successfully');
}

public function destroy(bethel $bethel)
{
    $bethel->delete();
    return redirect()->route('crud.index')->with('success','Data deleted successfully');

}
 * 
 */
}