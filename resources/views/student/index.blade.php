@extends('main')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-sm-6">
            <h3>Estudantes</h3>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="app-title">
                    <div>
                        <button class="btn btn-outline-info" data-toggle="modal" data-target="#addStudentModal">Adicionar Estudante</button>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Área de Formação</th>
                            <th>Especialização</th>
                            <th>Preferências</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->user->name }}</td>
                            <td>{{ $student->area_de_formacao }}</td>
                            <td>{{ $student->especializacao }}</td>
                            <td> {{ $student->preferencias }} </td>
                            <td>
                                <center>
                                    <button class="btn btn-info" data-toggle="modal" data-target="#editStudentModal{{ $student->id }}">Editar</button>
                                    <button class="btn btn-warning" data-toggle="modal" data-target="#confirmDelete{{ $student->id }}">Apagar</button>
                                </center>
                            </td>
                        </tr>

                        <!-- Modal de confirmação de exclusão -->
                        <div class="modal fade" id="confirmDelete{{ $student->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Confirmar Exclusão</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Tem certeza de que deseja excluir este Estudante?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Confirmar</button>
                                        </form>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal de edição -->
                        <div class="modal fade" id="editStudentModal{{ $student->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Editar Estudante</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="forms-sample" method="post" action="{{ route('students.update', $student->id) }}">
                                            @csrf
                                            @method('PUT')

                                            <div class="form-group">
                                                <label for="area_de_formacao">Área de Formação</label>
                                                <input type="text" class="form-control" name="area_de_formacao" value="{{ $student->area_de_formacao }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="especializacao">Especialização</label>
                                                <input type="text" class="form-control" name="especializacao" value="{{ $student->especializacao }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="preferencias">Preferências</label>
                                                <select class="form-control" name="preferencias" required>
                                                    <option value="opcao1" @if($student->preferencias == 'opcao1') selected @endif>Opção 1</option>
                                                    <option value="opcao2" @if($student->preferencias == 'opcao2') selected @endif>Opção 2</option>
                                                </select>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Atualizar</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal para adicionar estudantes -->
        <div class="modal fade" id="addStudentModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Adicionar Estudante</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form class="forms-sample" method="post" action="{{ route('students.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="user_id">Usuário</label>
                                <select class="form-control" name="user_id" required>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="area_de_formacao">Área de Formação</label>
                                <select class="form-control" name="area_de_formacao" required>
                                    <option value="Informatica">Informatica</option>
                                    <option value="Fisica">Fisica</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="especializacao">Especialização</label>
                                <select class="form-control" name="especializacao" required>
                                    <option value="Engenharia de Software">Engenharia de Software</option>
                                    <option value="Engenharia de redes">Engenharia de redes</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="preferencias">Preferências</label>
                                <input type="text" class="form-control" name="preferencias" placeholder="Preferências" required>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary me-2">Guardar</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
</div>
@endsection