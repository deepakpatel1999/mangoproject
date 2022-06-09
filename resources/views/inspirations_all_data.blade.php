@include('header') 
<div class="event_cat_carousel owl-carousel">
    @foreach ($data as $datas)
      
    
     <div class="event_image"><img src="{{ asset('/images/'.@$datas->image) }}">
       <div class="event_heading yellow_bg">{{@$datas->title}}</div>
     </a>
   </div>
    
   @endforeach
  </div>
  @include('footer') 