<?php

namespace App\Http\Controllers;

use Session;

use App\Courses;
use Illuminate\Http\Request;


class CoursesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Courses::all();
        return view('admin.index', [
            'courses' => $courses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $VvalidatedData = $request->validate([
            'code' => ['required', 'string', 'max:7', 'unique:courses'],
            'title' => ['required', 'string', 'max:255',],
            'credit' => ['required', 'integer', 'max:6']

        ]);

        // dd("$request->code");

        Courses::create([
            'code' => $request->code,
            'title' => $request->title,
            'credit' => $request->credit,
            'lecturer' => $request->lecturer,
            'description' => $request->description 
        ]);
        Session::flash('status', 'successfully added '.$request->code.' record to databse');
        return redirect('/course');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function show(Courses $course)
    {
    
        return view ('admin.show', [
           'course' => $course
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function edit(Courses $course)
    {
        return view ('admin.edit', [
            'course' => $course
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Courses $course)
    {
        
        $check = Courses::where('code',$request->code);
        if ($check->count() <=1){
        $VvalidatedData = $request->validate([
            'code' => ['required', 'string', 'max:7'],
            'title' => ['required', 'string', 'max:255',],
            'credit' => ['required', 'integer', 'max:6']

        ]);
        $course->code = $request->code;
        $course->title = $request->title;
        $course->credit = $request->credit;
        $course->lecturer = $request->lecturer;
        $course->description = $request->description;

        $course->save();

        Session::flash('status', 'successfully updated '.$course->code.' record');
        return redirect('course');

        }

        else {
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courses $course)
    {
        $course->delete();
    }
}
