<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCourseFormRequest;
use App\Models\CourseForm;
use Illuminate\Http\Request;

class CourseFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCourseFormRequest $request)
    {
        $courseForm = CourseForm::create($request->only('name', 'surname', 'email'));
        return response()->json($courseForm);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CourseForm  $courseForm
     * @return \Illuminate\Http\Response
     */
    public function show(CourseForm $courseForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseForm  $courseForm
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseForm $courseForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseForm  $courseForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseForm $courseForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseForm  $courseForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseForm $courseForm)
    {
        //
    }
}
