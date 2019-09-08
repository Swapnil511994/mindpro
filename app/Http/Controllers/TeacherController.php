<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use PHPUnit\Framework\Constraint\IsNull;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $teachers = Teacher::all();
        //dd($teachers);
        return View("Teachers.index")->with(compact("teachers"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        $genders = array("0"=> "Male", "1"=>"Female");
        return view('Teachers.create')->with(compact('genders'));
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
            'Email' => ['required','max:400'],
            'Contact' => ['required','max:12'],
            'Gender' => ['required'],

        ]);
        $user = User::create([
            'name' => $request->Name,
            'email' => $request->Email,
            'password' => Hash::make("123456"),
            'active' => 1,
            'Role'=>'Teacher'
        ]);
        
        $request->merge(["UserId"=>$user->id]);
        Teacher::create($request->all());
        //return redirect()->route('ManageSubCategories.index')->with('success', 'category created succesfully');
        return redirect()->route('Teachers.index')->with('success','Teacher created successfully');
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $teacher = Teacher::where('TeacherId',$id)->first();
        $genders = array("0"=> "Male", "1"=>"Female");
        return view('Teachers.edit')->with(compact('teacher','genders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $teacher = Teacher::where('TeacherId',$id)->first();

        $user = User::where('id',$id)->first();
        if(empty($user->email)){
            return abort(404);
        }
        else{
            if($user->email == $request->Email){

            }
            else{
                $user->email = $request->Email;
                $user->save();
            }
            

        }
        $request->validate([
            'Name' => ['required', 'string', 'max:100'],
            'Email' => ['required','max:400'],
            'Contact' => ['required','max:12'],
            'Gender'=>['required']
        ]);

        $teacher->fill($request->all());
        $teacher->save();
        return redirect()->route('Teachers.index')->with('success','Teacher updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $teacher = Teacher::where('TeacherId',$id)->first();
        $user = User::where('email',$teacher->Email)->first();
        $teacher->delete();
        $user->delete();
        return redirect()->route('Teachers.index')->with('success','Teacher deleted successfully');
    }
}
