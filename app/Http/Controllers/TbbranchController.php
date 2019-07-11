<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tbbranch;
use App\Http\Requests\TbbranchRequest;

class TbbranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listdata = Tbbranch::paginate(10);
        return view('branch',[
            'listdata' => $listdata
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('formbranch');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TbbranchRequest $request)
    {
        $branch = new Tbbranch();
        $branch->branchname = $request->branchname;
        $branch->save();
        return redirect()->route('branch.index')->with('feedback','Save branch success!');
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
    public function edit(Tbbranch $branch)
    {
        return view('formbranch',[
            'branch' => $branch
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TbbranchRequest $request, Tbbranch $branch)
    {
        $branch->branchname = $request->branchname;
        $branch->save();
        return redirect()->route('branch.index')->with('feedback','Save branch success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branch = Tbbranch::findOrFail($id);
        $branch->delete();
        return redirect()->route('branch.index')->with('feedback','Delete branch success!');
    }
}
