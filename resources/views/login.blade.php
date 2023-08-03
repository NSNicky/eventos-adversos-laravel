<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>

    <!-- Agrega el enlace al archivo CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Agrega el enlace al archivo JS (opcional) -->
</head>
<body class="bg-gradient-primary">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 t67shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row container-interno">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenido Al Registro y Gestion de Eventos Adversos!</h1>
                                    </div>
                                    <form class="user" name="login-form" method="POST" action="{{ url('/user-login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="user" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Usuario">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Contraseña">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Ingresar</button>
                                        @if(Session::has('flash_message_success'))
                                            <div class="alert alert-success alert-block">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                    <strong class="fuenteLetrica">{!! session('flash_message_success') !!}</strong>
                                            </div>
                                        @endif
                                        @if(Session::has('flash_message_error'))
                                            <div class="alert alert-error alert-block" style="background-color:#f4d2d2">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                    <strong class="fuenteLetrica">{!! session('flash_message_error') !!}</strong>
                                            </div>
                                        @endif
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html"></a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
