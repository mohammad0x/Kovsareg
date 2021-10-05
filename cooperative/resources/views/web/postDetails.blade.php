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

    <title>جزئیات پست</title>
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
            .header-gradient{
            background: rgb(11,55,96);
            color:white;
background: linear-gradient(280deg, rgba(11,55,96,1) 0%, rgba(9,9,121,1) 35%, rgba(238,238,238,0.2024160005799195) 100%);
        }
         .post-header{
           background-color: #1d3557;
    border-top-right-radius: 10px;
    border-top-left-radius: 10px;
    height: 4rem !important;

        }
        .post-details{
            padding:0 !important;
            border-radius:5px;
            
        }
        .about-us{
            font-family: Vazir;
    /* margin-top: auto; */
    padding: 10px;
    color: white;
}
        
        .post-details{
             border:1px solid #457b9d !important;
        }
        .post-desc{
            padding:10px;
            background:#ced4da !important;
            font-weight:600;
        }
    </style>
</head>
<body>

@include('partials.web_header')
@include('partials.web_Slider')
@include('partials.web_post')

<div class="container">
        <div class="header-gradient mt-5 mb-2">

    <h3 class="p-2" style="font-family: Vazir !important;">جزئیات پست</h3>
    </div>
    <div class="post-details">
        <div class="post-header text-center">
            <h4 class="about-us" style="font-family: Vazir">
                {!! $post->title !!}
            </h4>
        </div>
        <div class="post-image-lg mt-5 text-center">
            <div class="col-md-6">

                <img src="/cooperative/public{{$post->image}}"width="300" height="300" alt="">
            </div>
        </div>
        <div class="post-desc">
            <p>
                {!! $post->description !!}
            </p>
        </div>
    </div>
</div>

@include('partials.web_footer')

<script src="/assets/plugins/jquery3/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
<script src="/assets/plugins/owlcarousel/dist/owl.carousel.min.js"></script>
<script>
    $(document).ready(function(){
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        })
    })
</script>
</body>
</html>
