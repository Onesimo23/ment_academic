<?php

namespace App\Http\Controllers;

use App\Models\Course ;
use App\Models\Department ;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $courses = Course::all();
        $departments = Department::all();

       
      return view('course.index', compact('courses', 'departments'));
       
    }
   
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Carregue a lista de faculdades para a view
        $departments = Department::all();
        
        return view('course.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Course::create(array_merge($request->all(), ['department_id' => $request->faculty_id]));
    
        return redirect()->route('course.index')->with('success', 'Curso adicionado!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $course  = Course ::findOrFail($id);
        return view('course .show', compact('course '));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $course  = Course::findOrFail($id);
       
       

        return view('course.edit', compact('course '));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $course  = Course ::findOrFail($id);

        $course ->update($request->all());

        return redirect()->route('course.index')->with('success', 'Curso actualizado');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $course  = Course ::findOrFail($id);

        $course ->delete();

        return redirect()->route('course.index')->with('success', 'Curso adicionado com sucesso');

    }
}
