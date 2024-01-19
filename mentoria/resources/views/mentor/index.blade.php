<!-- resources/views/mentor/index.blade.php -->

@extends('main')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-sm-6">
            <h3>Mentores</h3>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="app-title">
                    <div>
                        <button class="btn btn-outline-info" data-toggle="modal" data-target="#addMentorModal">Adicionar Mentor</button>
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
                            <th>Tempo na Universidade</th>
                            <th>Preferências</th>
                            
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mentors as $mentor)
                        <tr>
                            <td>{{ $mentor->id }}</td>
                            <td>{{ $mentor->user->name }}</td>
                            <td>{{ $mentor->area_de_formacao }}</td>
                            <td>{{ $mentor->tempo_na_universidade }}</td>
                            <td>{{  $mentor->preferencias }}</td>
                               
                            <td>
                                <center>
                                    <button class="btn btn-info" data-toggle="modal" data-target="#editMentorModal{{ $mentor->id }}">Editar</button>
                                    <button class="btn btn-warning" data-toggle="modal" data-target="#confirmDeleteMentor{{ $mentor->id }}">Apagar</button>
                                </center>
                            </td>
                        </tr>

                        <!-- Modal de confirmação de exclusão -->
                        <div class="modal fade" id="confirmDeleteMentor{{ $mentor->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Confirmar Exclusão</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Tem certeza de que deseja excluir este Mentor?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('mentors.destroy', $mentor->id) }}" method="POST">
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
                        <div class="modal fade" id="editMentorModal{{ $mentor->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Editar Mentor</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="forms-sample" method="post" action="{{ route('mentors.update', $mentor->id) }}">
                                            @csrf
                                            @method('PUT')

                                            <div class="form-group">
                                                <label for="area_de_formacao">Área de Formação</label>
                                                <input type="text" class="form-control" name="area_de_formacao" value="{{ $mentor->area_de_formacao }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="tempo_na_universidade">Tempo na Universidade</label>
                                                <input type="text" class="form-control" name="tempo_na_universidade" value="{{ $mentor->tempo_na_universidade }}" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="preferencias">Preferências</label>
                                                <input type="text" class="form-control" name="preferencias" value="{{ $mentor->preferencias }}" required>
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

        <!-- Modal de adição -->
        <div class="modal fade" id="addMentorModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Adicionar Mentor</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form class="forms-sample" method="post" action="{{ route('mentors.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="user_id">Nome do Mentor</label>
                                <select class="form-control" name="user_id" required>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="area_de_formacao">Área de Formação</label>
                                <input type="text" class="form-control" name="area_de_formacao" placeholder="Área de Formação" required>
                            </div>

                            <div class="form-group">
                                <label for="tempo_na_universidade">Tempo na Universidade</label>
                                <input type="text" class="form-control" name="tempo_na_universidade" placeholder="Tempo na Universidade" required>
                            </div>

                            <div class="form-group">
                                <label for="preferencias">Preferências</label>
                                <input type="text" class="form-control" name="preferencias" placeholder="Preferências" required>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Adicionar</button>
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