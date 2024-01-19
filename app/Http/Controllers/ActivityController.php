<?php

namespace App\Http\Controllers;

// use App\Models\Activity;
use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $activity = Activity::all();
//     
       
      return view('activity.index', compact('activity'));
       
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
        Activity::create($request->all());
        // return redirect()->back()->with('error', 'Ocorreu um erro ao criar o usuário. Por favor, tente novamente.');
        return redirect()->route('activity.index')->with('success', 'Actividade adicionado!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $activity = Activity::findOrFail($id);
        return view('activity.show', compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $activity = Activity::findOrFail($id);
       
       

        return view('activity.edit', compact('activity'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $activity = Activity::findOrFail($id);

        $activity->update($request->all());

        return redirect()->route('activity.index')->with('success', 'Actividade actualizado');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);

        $activity->delete();

        return redirect()->route('activity.index')->with('success', 'Actividade adicionado com sucesso');

    }
}
