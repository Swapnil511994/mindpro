<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subjects = Subject::paginate(15);
        return View('Subject.index')->with(compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('Subject.create');
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
            'Description' => ['required','max:400'],

        ]);
        Subject::create($request->all());
        return redirect()->route('Subject.index')->with('success', 'subject created succesfully');
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
        $subject = Subject::where('SubjectId',$id)->first();
        return view('Subject.edit')->with(compact('subject'));

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
            'Description' => ['required','max:400'],

        ]);
        $subject = Subject::where('SubjectId',$id)->first();
        $subject->fill($request->all());
        $subject->save();
        return redirect()->route('Subject.index')->with('success', 'subject created succesfully');
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $subject = Subject::where('SubjectId',$id)->first();
        $subject->delete();
        return redirect()->route('Subject.index')->with('success', 'subject created succesfully');
        
    }
}
