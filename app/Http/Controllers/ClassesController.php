<?php

namespace App\Http\Controllers;

use App\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function index()
    {
        //
        $classes = Classes::paginate(15);
        return View('Classes.index')->with(compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('Classes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'Name' => ['required', 'string', 'max:100'],

        ]);
        Classes::create($request->all());
        return redirect()->route('Classes.index')->with('success', 'class created succesfully');
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
        return abort(400);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cls = Classes::where('ClassId',$id)->first();
        return view('Classes.edit')->with(compact('cls'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //$subject = Subject::where('SubjectId',$id)->first();

        $request->validate([
            'Name' => ['required', 'string', 'max:100'],

        ]);
        $cls = Classes::where('ClassId',$id)->first();
        $cls->fill($request->all());
        $cls->save();
        return redirect()->route('Classes.index')->with('success', 'class created succesfully');
        dd($request);
    }

  
    public function destroy($id)
    {
        //
        $cls = Classes::where('ClassId',$id)->first();
        $cls->delete();
        return redirect()->route('Classes.index')->with('success', 'class deleted succesfully');
        
    }
}
