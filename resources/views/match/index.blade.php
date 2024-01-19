@extends('main')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-sm-6">
            <h3>Matches</h3>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="app-title">
                    <div>
                        <button class="btn btn-outline-info" data-toggle="modal" data-target="#addMatchModal">Adicionar Match</button>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Estudante</th>
                            <th>Mentor</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($matches as $match)
                        <tr>
                            <td>{{ $match->id }}</td>
                            <td>{{ $match->student->user->name }}</td>
                            <td>{{ $match->mentor->user->name }}</td>
                            <td>
                                <center>
                                    <button class="btn btn-info" data-toggle="modal" data-target="#editMatchModal{{ $match->id }}">Editar</button>
                                    <button class="btn btn-warning" data-toggle="modal" data-target="#confirmDelete{{ $match->id }}">Apagar</button>
                                </center>
                            </td>
                        </tr>


                        <!-- Modal de confirmação de exclusão -->
                        <div class="modal fade" id="confirmDelete{{ $match->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Confirmar Exclusão</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Tem certeza de que deseja excluir este Match?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('matches.destroy', $match->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Confirmar</button>
                                        </form>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal para adicionar matches -->
        <div class="modal fade" id="addMatchModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Adicionar Match</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form class="forms-sample" method="post" action="{{ route('matches.store') }}">
                            @csrf

                            <div class="form-group">
                                <label for="student_id">Estudante</label>
                                <select class="form-control" name="student_id" required>
                                    @foreach ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="mentor_id">Mentor</label>
                                <select class="form-control" name="mentor_id" required>
                                    @foreach ($mentors as $mentor)
                                    <option value="{{ $mentor->id }}">{{ $mentor->user->name }}</option>
                                    @endforeach
                                </select>
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

<!-- Modal de edição -->
@if(isset($match))
    <div class="modal fade" id="editMatchModal{{ $match->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Match</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" method="post" action="{{ route('matches.update', $match->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="student_id">Estudante</label>
                            <select class="form-control" name="student_id" required>
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}" @if($student->id == $match->student_id) selected @endif>{{ $student->user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="mentor_id">Mentor</label>
                            <select class="form-control" name="mentor_id" required>
                                @foreach ($mentors as $mentor)
                                    <option value="{{ $mentor->id }}" @if($mentor->id == $match->mentor_id) selected @endif>{{ $mentor->user->name }}</option>
                                @endforeach
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
@endif



    </div>
</div>
</div>
@endsection