

@extends('adminlte::page')


@section('title', 'Dashboard')
@section('content')



<div class="col-sm-6">
    <h3>Faculdades</h3>
  </div>
  

<div class="card">
    <div class="card-header">
      
      <div class="app-title">
        <div><button class="btn btn-outline-info"  data-toggle="modal" data-target="#mutemba"><a href=""></a>Adicionar Tema</button></div>
          </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>Faculdade</th>
          <th>Ação</th>

          @if($faculty->count() > 0)
                          @foreach($faculty as $rs)

                          <tr>
                            <td>{{ $rs->id }}</td>
                            <td>{{ $rs->name }}</td>
                           
                            <td>
                              <center>
                                <button class="btn btn-info" data-toggle="modal" data-target="#salvador">
                                  <a href="{{ route('faculty.edit', $rs->id) }}">Editar</a>
                              </button>-
                              <button class="btn btn-warning" data-toggle="modal" data-target="#confirmDelete{{ $rs->id }}">
                                Apagar
                              </button>
                            </center>
<!-- Modal de confirmação de exclusão -->
<div class="modal fade" id="confirmDelete{{ $rs->id }}">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">Confirmar Exclusão</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
              <p>Tem certeza de que deseja excluir esta faculdade?</p>
          </div>
          <div class="modal-footer">
              <form action="{{ route('faculty.destroy', $rs->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Confirmar</button>
              </form>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          </div>
      </div>
   </div>
</div>


                            </td>
                          </tr>
                          @endforeach
                          @endif
          
        </tr>
        </thead>
        <tbody>

            {{-- Modal para adicionar temas --}}
<div class="modal fade" id="mutemba">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Conteúdo do modal aqui -->
            <div class="modal-header">
                <h4 class="modal-title">Adicionar</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" method="post" action="{{route('faculty.store')}}">
                          @csrf
                      <div class="form-group">
                        <label for="title">Faculdade</label>
                        <input type="text" class="form-control" name="name" placeholder="Faculdade">
                      </div>
                      
                      
                      
                      
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary me-2">Guardar</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                  </div>
  

            @stop

            