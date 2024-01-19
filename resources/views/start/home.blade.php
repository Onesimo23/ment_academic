{{-- @extends('layouts.app') --}}
@extends('adminlte::page')
@section('content')

@section('title', 'Dashboard')

@section('content_header')
    <h1>INÍCIO</h1>
@stop


@section('content')
<div class="body-card">
<p>Bem-vindo ao Sistema de Gestão de Trabalhos de Culminação de Curso!</p>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <!-- small card 1 -->
            <div class="small-box bg-pink">
                <div class="inner">
                    <h3>8</h3>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <div class="icon">
                    <i class="far fa-building"></i>
                </div>
                <a href="{{route('faculty.index')}}" class="small-box-footer">
                    Faculdades <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    
        <div class="col-lg-3">
            <!-- small card 2 -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>3</h3>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <div class="icon">
                    <i class="far fa-file-alt"></i>
                </div>
                <a href="{{route('department.index')}}" class="small-box-footer">
                    Departamentos <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    
        <div class="col-lg-3">
            <!-- small card 3 -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>4</h3>
                </div>
                <div class="icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                
                <a href="{{route('course.index')}}" class="small-box-footer">
                    Cursos <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    
        <div class="col-lg-3">
            <!-- small card 4 -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>6</h3>
                </div>
                <div class="icon">
                    <i class="far fa-calendar-alt"></i>
                </div>
                <a href="{{route('activity.index')}}" class="small-box-footer">
                    Atividades <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
    
    
    
      
          
          
          
          
          
          

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop





@endsection
