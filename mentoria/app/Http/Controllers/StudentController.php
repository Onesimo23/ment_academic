<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('user')->get();
        $users = User::all(); 
        return view('student.index', compact('students','users'));
    }

    public function create()
    {
        // Se precisar de dados adicionais para o formulário de adição, adicione aqui.
        return view('student.create');
    }

    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            // Adicione as regras de validação conforme necessário
        ]);

        // Criação de um novo estudante
        $student = new Student([
            'user_id' => $request->input('user_id'),
            'area_de_formacao' => $request->input('area_de_formacao'),
            'especializacao' => $request->input('especializacao'),
            'preferencias' => json_encode($request->input('preferencias')),
        ]);

        $student->save();

        return redirect()->route('students.index')->with('success', 'Estudante adicionado com sucesso!');
    }

    public function show($id)
    {
        $student = Student::with('user')->find($id);
        return view('student.show', compact('student'));
    }

    public function edit($id)
    {
        $student = Student::with('user')->find($id);
        // Se precisar de dados adicionais para o formulário de edição, adicione aqui.
        return view('student.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        // Validação dos dados do formulário
        $request->validate([
            // Adicione as regras de validação conforme necessário
        ]);

        $student = Student::find($id);
        $student->area_de_formacao = $request->input('area_de_formacao');
        $student->especializacao = $request->input('especializacao');
        $student->preferencias = json_encode($request->input('preferencias'));
        $student->save();

        return redirect()->route('students.index')->with('success', 'Estudante atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Estudante excluído com sucesso!');
    }
}
