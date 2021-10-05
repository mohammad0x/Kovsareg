<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/plugins/font-awesome/css/font-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
            crossorigin="anonymous"></script>
                <link rel="stylesheet" href="/assets/dist/css/web-styles.css">

    <title>ورود</title>
    <style>
          footer{
        height:auto !important;
    }
    .footer-item{
        border-radius:5px;
        padding:5px !important;
    }
    .footer-item:hover{
        background:#dee2e6;
        color:#000000 !important;
    }
    .footer-item:hover a{
        color:#000000 !important;
    }
    .header-menu{
        margin-right:10px;
    }
    .header-menu-item{
    padding:5px;
    border-radius:5px;
    
}
.header-menu-item:hover{
    background:#f8f9fa;
    color:#000000 !important;
}
.header-menu-item:hover a{
    color:#000000 !important;
}
    </style>
</head>
<body>
@include('partials.web_header')
<main>
    <div class="main-header mt-5 mb-5">
        <h1 style="font-family: Vazir">ورود</h1>
    </div>
    <div class="register-form">
        @if(\Illuminate\Support\Facades\Session::has('error'))
            <div class="text-danger">{{\Illuminate\Support\Facades\Session::get('error')}}</div>
            @endif
        @if($errors->any())


            @foreach($errors->all() as $error)

                <div class="text-danger">{{$error}}</div>
            @endforeach

        @endif
        @if(\Illuminate\Support\Facades\Session::has('success'))<div class="text-center" style="color: #00a616"> {{\Illuminate\Support\Facades\Session::get('success')}}</div>@endif
        <form action="{{route('web.login_post')}}" method="post" enctype="application/x-www-form-urlencoded">
            @csrf
            @if($errors->any())
                @foreach($errors as $error)
                    <div class="alert-danger">{{$error}}</div>
                @endforeach
            @endif
            <div class="input-group mb-3">

                <input type="text" class="form-control" placeholder="نام کاربری" name="mobile">
            </div>
            <div class="input-group mb-3">

                <input type="password" class="form-control" placeholder="پسورد" name="password">
            </div>


            <button type="submit" class="btn-register">ورود</button>
    </form>

    </div>
</main>
@include('partials.web_footer')
<script src="/assets/plugins/jquery3/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
        integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
        integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc"
        crossorigin="anonymous"></script>
</body>
</html>
