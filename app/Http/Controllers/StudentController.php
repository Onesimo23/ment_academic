<?php
namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a lis
     * ting of the resource.
     */
    public function index()
    {
        $users = User::all();
        $courses = Course::all();
        $students = Student::with('course')->get();
        return view('student.index', compact('students', 'courses', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return view('student.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['name']); // Use o nome como senha padrão
        $student = Student::create($data);
        
        // Defina um marcador para indicar que a senha precisa ser alterada
        $student->update(['password_change_required' => true]);
        
        return redirect()->route('student.index')->with('success', 'Estudante adicionado com sucesso!');
    }
    
    
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = Student::findOrFail($id);
        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $courses = Course::all();
        return view('student.edit', compact('student', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->update($request->all());
        return redirect()->route('student.index')->with('success', 'Estudante atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('student.index')->with('success', 'Estudante removido com sucesso!');
    }
}
