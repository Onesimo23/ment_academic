@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GuiAcademica</title>
  <style>
    body {
      background-image: url('fundo.jpg'); 
      background-size: cover;
      background-repeat: no-repeat;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
  </style>
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>GuiAcademica</b></a>
    </div>
    <div class="card">
      <div class="card-body login-card-body">
        <div align="center">
          <p class="clearfix">
            <img width="60px" src="vendor/adminlte/dist/img/face2.jpg" class="img-responsive" id="logo" alt="responsive image">
          </p>
        </div>

        <p class="login-box-msg">Informe os seus dados</p>

        <form method="POST" action="{{ route('login') }}">
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
            
              <button type=<button type="submit" class="btn btn-info">
                {{ __('Autenticar') }}</button>
            </div>

            
              
                  
                  
          </div>
        </form>

        <div class="social-auth-links text-center mb-3">
          
          <a href="https://sig.unisave.ac.mz/sigeup/index.php" class="btn btn-block btn-info">
            </i> Aceder ao SIGUNISAVE
          </a>
          <a href="https://ava.unisave.ac.mz/" class="btn btn-block btn-info">
            </i> Aceder ao AVA
          </a>
        </div>

        @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Recuperar senha') }}
                                    </a>
                                @endif
      </div>
    </div>
  </div>
</body>
</html>
@endsection
