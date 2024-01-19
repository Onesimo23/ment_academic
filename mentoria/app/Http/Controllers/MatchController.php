<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matches;
use App\Models\Student;
use App\Models\Mentor;

class MatchController extends Controller
{
    public function index()
    {
        $matches = Matches::with(['student.user', 'mentor.user'])->get();
        $students = Student::all();
        $mentors = Mentor::all();

        return view('match.index', compact('matches', 'students', 'mentors'));
    }

    public function create()
    {
        // Se precisar de dados adicionais para o formulário de adição, adicione aqui.
        $students = Student::all();
        $mentors = Mentor::all();

        return view('match.create', compact('students', 'mentors'));
    }

    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'student_id' => 'required',
            'mentor_id' => 'required',
        ]);

        // Criação de um novo match
        $match = new Matches([
            'student_id' => $request->input('student_id'),
            'mentor_id' => $request->input('mentor_id'),
        ]);

        $match->save();

        return redirect()->route('matches.index')->with('success', 'Match adicionado com sucesso!');
    }

    public function edit($id)
    {
        $match = Matches::find($id);
        $students = Student::all();
        $mentors = Mentor::all();
    
        return view('match.edit', compact('match', 'students', 'mentors'));
    }
    

    public function update(Request $request, $id)
    {
        // Validação dos dados do formulário
        $request->validate([
            'student_id' => 'required',
            'mentor_id' => 'required',
        ]);

        $match = Matches::find($id);
        $match->student_id = $request->input('student_id');
        $match->mentor_id = $request->input('mentor_id');
        $match->save();

        return redirect()->route('matches.index')->with('success', 'Match atualizado com sucesso!');
    }
    public function show($id)
    {
        $match = Mentor::find($id);
        return view('matches.show', compact('match'));
    }

    public function destroy($id)
    {
        $match = Matches::find($id);
        $match->delete();

        return redirect()->route('matches.index')->with('success', 'Match excluído com sucesso!');
    }
}
