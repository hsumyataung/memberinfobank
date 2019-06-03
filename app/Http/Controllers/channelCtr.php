<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\channelMod;

class channelCtr extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $channels=channelMod::all();
        return view('index',compact('channels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('channelView');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate(['channelDesc'=>'required'
                            ]);
      $channels=new channelMod(['channelDesc'=>$request->get('channelDesc'),
                                'active'=>$request->get('active'),
                                'remark'=>$request->get('remark')
               

      ]);
      $channels->save();
      return redirect('/channelCN')->with('success','Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $channels=channelMod::find($id);
        return view('/channelEdit',compact('channels'));
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
        $request->validate(['channelDesc'=>'required'
        ]);
        $channels=channelMod::find($id);
        $channels->channelDesc=$request->get('channelDesc');
        $channels->active=$request->get('active');
        $channels->remark=$request->get('remark');
        $channels->save();
        return redirect('/channelCN')->with('success','Successfully Updated');
               
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $channels=channelMod::find($id);
        $channels->delete();
        return redirect('/channelCN')->with('success','Successfully Deleted');
                
    }
}
