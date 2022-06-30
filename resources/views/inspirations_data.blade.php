@include('header')
<div><img src="{{ asset('/images/' . @$data->image) }}"></div>
<div>{{ @$data->title }}</div>
@include('footer')
