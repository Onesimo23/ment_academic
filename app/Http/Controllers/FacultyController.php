<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $faculty = Faculty::all();
//     
       
      return view('faculty.index', compact('faculty'));
       
    }
   
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Faculty::create($request->all());
        // return redirect()->back()->with('error', 'Ocorreu um erro ao criar o usuário. Por favor, tente novamente.');
        return redirect()->route('faculty.index')->with('success', 'Faculdade adicionado!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $faculty = Faculty::findOrFail($id);
        return view('faculty.show', compact('faculty'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $faculty = Faculty::findOrFail($id);
       
       

        return view('faculty.edit', compact('faculty'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $faculty = Faculty::findOrFail($id);

        $faculty->update($request->all());

        return redirect()->route('faculty.index')->with('success', 'Faculdade actualizado');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $faculty = Faculty::findOrFail($id);

        $faculty->delete();

        return redirect()->route('faculty.index')->with('success', 'Faculdade adicionado com sucesso');

    }
}
