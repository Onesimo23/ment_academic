<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\Faculty;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        $faculties = Faculty::all();

        return view('department.index', compact('departments', 'faculties'));
     
    }
   
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Carregue a lista de faculdades para a view
        $faculties = Faculty::all();
        
        return view('department.create', compact('faculties'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Department::create($request->all());
        return redirect()->route('department.index')->with('success', 'Departamento adicionado!');
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $department = Department::findOrFail($id);
        return view('department.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $department = Department::findOrFail($id);
        // Carregue a lista de faculdades para a view
        $faculties = Faculty::all();

        return view('department.edit', compact('department', 'faculties'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $department = Department::findOrFail($id);

        $department->update($request->all());

        return redirect()->route('department.index')->with('success', 'Departmento actualizado');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $department = Department::findOrFail($id);

        $department->delete();

        return redirect()->route('department.index')->with('success', 'Departamento adicionado com sucesso');

    }
}
