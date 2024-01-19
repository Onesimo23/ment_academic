@extends('adminlte::page')

@section('title', 'Editar Faculdade')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Editar Faculdade</h4>
    </div>
    <div class="card-body">
        <form class="forms-sample" method="post" action="{{ route('faculty.update', $faculty->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Faculdade</label>
                <input type="text" class="form-control" name="name" value="{{ $faculty->name }}" placeholder="Nome da Faculdade">
            </div>
            <button type="submit" class="btn btn-primary me-2">Atualizar</button>
        </form>
    </div>
</div>
@stop