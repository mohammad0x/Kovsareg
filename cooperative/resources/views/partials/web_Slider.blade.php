
<div class="container">

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @if(count($slides)==1)
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1" style="background-color: #0B3760"></button>

            @elseif(count($slides)==2)
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1" style="background-color: #0B3760"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2" style="background-color: #0B3760"></button>
            @else
             <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1" style="background-color: #0B3760"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2" style="background-color: #0B3760"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3" style="background-color: #0B3760"></button>
            
            @endif
        </div>
        <div class="carousel-inner">
            @foreach($slides as $slide)
                <div class="carousel-item @if($loop->index==0) active @endif">
                <a href="{{route('web.post_details',$slide->id)}} "style="text-decoration: none">
                    <img src="/cooperative/public{{$slide->image}}" height="450" class="d-block w-100" alt="{{$slide->title}}" >
                    </a>
                    <a href="{{route('web.post_details',$slide->id)}} "style="text-decoration: none">
                    <div class="carousel-caption d-none d-md-block">

                         <h5 class="text-dark" style="font-family: Vazir">{!! $slide->title !!}</h5>
                    </div>
                    </a>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
