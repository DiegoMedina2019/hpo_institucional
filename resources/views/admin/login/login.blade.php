<!DOCTYPE html>
<html lang="es">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin-HPO</title>
    <link href="{{asset('plantilla/assets/img/logo_2.png')}}" rel="icon">

    <link href="{{asset('plantilla/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('plantilla/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <link rel="stylesheet" href="{{asset('plantilla/assets/css/login.css')}}">
</head>
<body>
    <div class="wrapper">
        <div class="logo">
            <img src="{{asset('plantilla/assets/img/logo_2.png')}}" alt="">
        </div>
        <div class="text-center mt-4 name">
            HPO
        </div>
        <form class="p-3 mt-3" action="{{route('login.admin')}}" method="POST">
            @csrf
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="username" id="username" placeholder="Nombre de usuario">
            </div>
            <span class="badge rounded-pill bg-danger">{{ $errors->first('username')}}</span>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Password">
            </div>
            <span class="badge rounded-pill bg-danger">{{ $errors->first('password')}}</span>
            <button type="submit" class="btn mt-3">Login</button>
        </form>
        <div class="text-center fs-6">
            {{-- <a href="#">Forget password?</a> or <a href="#">Sign up</a> --}}
        </div>
    </div>
</body>
</html>