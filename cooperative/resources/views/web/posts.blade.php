<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/plugins/owlcarousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/plugins/owlcarousel/dist/assets/owl.theme.default.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/assets/dist/css/web-styles.css">

    <title>پست ها</title>
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
        .advertising-body{
            border:1px solid #457b9d;
              box-shadow: 10px 8px 11px -4px rgba(0,0,0,0.64);
-webkit-box-shadow: 10px 8px 11px -4px rgba(0,0,0,0.64);
-moz-box-shadow: 10px 8px 11px -4px rgba(0,0,0,0.64);
        }
        .details-btn{
           width: 100% !important;
    display: flex;
    flex: 1;
    flex-direction: row;
    justify-content: flex-end;
        }
        .btn-info{
            border-radius:none;
            background-color:#457b9d;
            border: none;
    border-radius: none !important;
    color: white;
    font-weight: 900;

        }
        .header-gradient{
            background: rgb(11,55,96);
            color:white;
background: linear-gradient(280deg, rgba(11,55,96,1) 0%, rgba(9,9,121,1) 35%, rgba(238,238,238,0.2024160005799195) 100%);
        }
    </style>
</head>
<body>

@include('partials.web_header')


<div class="container" style="min-height: 600px">
    <div class="header-gradient">
            <h3 class="mt-5 p-2" style="font-family: Vazir">پست ها</h3>

    </div>

    <div class="col-md-12 mt-5">
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-6 mt-5">
                    <div class="advertising-body">
                        <div class="advertising-img text-center">
                            <img src="/cooperative/public{{$post->image}}"  width="200" height="200" class="img-rounded" alt="">
                        </div>
                        <div class="advertising-header mt-4 mb-4 text-center"><h4 style="font-family: Vazir">
                            {!! $post->title !!}
                            </h4></div>
                            <div class="details-btn">
                    <a href="{{route('web.post_details',$post->id)}}" class="btn btn-sm btn-info">جزئیات</a>            
                            </div>
                    

                    </div>
                </div>
            @endforeach


        </div>


    </div>
    <div class="col-md-12  text-center flex-row mt-5">

{{--        {{$posts->links('pagination::bootstrap-4')}}--}}
    </div>
</div>

@include('partials.web_footer')
<script src="/assets/plugins/jquery3/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
<script src="/assets/plugins/owlcarousel/dist/owl.carousel.min.js"></script>
<script>
</script>
</body>
</html>
