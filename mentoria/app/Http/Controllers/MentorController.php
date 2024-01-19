<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mentor;
use App\Models\User;

class MentorController extends Controller
{
    public function index()
    {
        $users = User::all();
        $mentors = Mentor::all();
        return view('mentor.index', compact('mentors', 'users'));
    }

    public function create()
    {
        // Se precisar de dados adicionais para o formulário de adição, adicione aqui.
        return view('mentor.create');
    }

    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            // Adicione as regras de validação conforme necessário
        ]);

        // Criação de um novo mentor
        $mentor = new Mentor([
            'user_id' => $request->input('user_id'),
            'area_de_formacao' => $request->input('area_de_formacao'),
            'tempo_na_universidade' => $request->input('tempo_na_universidade'),
            'preferencias' => json_encode($request->input('preferencias')),
        ]);

        $mentor->save();

        return redirect()->route('mentors.index')->with('success', 'Mentor adicionado com sucesso!');
    }

    public function show($id)
    {
        $mentor = Mentor::find($id);
        return view('mentor.show', compact('mentor'));
    }

    public function edit($id)
    {
        $mentor = Mentor::find($id);
        // Se precisar de dados adicionais para o formulário de edição, adicione aqui.
        return view('mentor.edit', compact('mentor'));
    }

    public function update(Request $request, $id)
    {
        // Validação dos dados do formulário
        $request->validate([
            // Adicione as regras de validação conforme necessário
        ]);

        $mentor = Mentor::find($id);
        $mentor->area_de_formacao = $request->input('area_de_formacao');
        $mentor->tempo_na_universidade = $request->input('tempo_na_universidade');
        $mentor->preferencias = json_encode($request->input('preferencias'));
        $mentor->save();

        return redirect()->route('mentors.index')->with('success', 'Mentor atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $mentor = Mentor::find($id);
        $mentor->delete();

        return redirect()->route('mentors.index')->with('success', 'Mentor excluído com sucesso!');
    }
}
