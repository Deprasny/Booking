<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;

class SessionControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Session::latest()->paginate(4);
        return view ('session.index',compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('session.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $day = $request->day;
        $quota = $request->quota;
        $data = [
            ['day' => $day, 'session' => 1, 'from' => '08:30', 'to' => '09:30', 'quota' => $quota], 
            ['day' => $day, 'session' => 2, 'from' => '09:45', 'to' => '10:45', 'quota' => $quota],
            ['day' => $day, 'session' => 3, 'from' => '11:00', 'to' => '12:00', 'quota' => $quota],
            ['day' => $day, 'session' => 4, 'from' => '13:30', 'to' => '14:30', 'quota' => $quota],
         ];
         
         Session::insert($data);

        return redirect()->route('session.index')->with('succes','Session created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $session = Session::find($id);
        $session->delete();
        return redirect()->route('session.index')->with('succes','Session Successfully Deleted');
    }
}
