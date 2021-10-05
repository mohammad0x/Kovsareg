<div class="container">
    <div class="col-md-12 mt-3">
        <ul class="list-group">

            <li class="list-group-item text-white" style="background-color: #0B3760" aria-current="true"><h3>جدیدترین پست ها</h3></li>
            @if(count($newPosts) > 0)
            @foreach($newPosts as $post)

                <h6><a href="{{route('web.post_details',$post->id)}}" style="text-decoration: none;font-weight: bold"> <li class="list-group-item">{!! $post->title !!}</li></a></h6>
            
            @endforeach
            
            @else
                            <h6><a href="#" style="text-decoration: none;font-weight: bold"> <li class="list-group-item">پستی وجود ندارد.</li></a></h6>

            @endif
            
        </ul>
    </div>
</div>
