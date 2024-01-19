<!-- Em resources/views/auth/student-login.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Login do Estudante</b></a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Informe os seus dados</p>

                <form method="POST" action="{{ route('student.login') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Informe o seu email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Insira a sua senha">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Lembrar-se de mim') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-info">
                                {{ __('Autenticar') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
