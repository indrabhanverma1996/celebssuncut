@extends('layouts.appFront')

@section('content')


    <div class="row">
    	<h2>Clips</h2>
  <div class="col-md-12">

    <div id="mdb-lightbox-ui"></div>

    <div class="mdb-lightbox no-margin">
         @foreach($postmedia as $val)
          <?php  $extension = substr($val->video, -3); ?>

          @if($extension=='mp4' || $extension=='MKV'||$extension=='3gp')
       <div class="col-md-4">
          <video loop autoplay muted controls class="float-right w-100 " width="320" height="240">
                        <source src="{{url('/')}}/public/{{$val->video}}" type="video/mp4 ">
                     </video>
                   </div>
          @else

      <figure class="col-md-4">
        <a href="" data-size="1600x1067">
          <img alt="picture" src="{{url('/')}}/public/images/posts/{{$val->video}}"
            class="img-fluid">
        </a>
      </figure>
@endif
     @endforeach

    </div>

  </div>
</div>
            

@endsection