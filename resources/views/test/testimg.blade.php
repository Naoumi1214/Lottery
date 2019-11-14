@extends('layouts.app')

@section('content')
<div class="container">
    <div id="nomalimg">
        <p></p>
    <img src="\storage\usericonimgs\food_character_nerimono_tsumire.png" alt="">
    </div>
    <div id="usericon">
    <p>{{$usericon}}</p>
        <img src="{{$usericon}}" alt="" srcset="">
    </div>
</div>
@endsection
