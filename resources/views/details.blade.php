@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="competitiondetails col-8">
            <h1 id="title">{{$name}}</h1>
            <div class="row">
                <img id="icon" src="{{$icon}}"
                    class="col-md-3 img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"
                    alt="">
                <div id="col-md-10 overview">
                    <p>{{$overview}}</p>
                </div>
            </div>
            <div class="row" 　style="margin-top: 10px;">
                <p class="ml-sm-3 btn-block"><a href="#" class="btn btn-primary active" role="button">当選番号一覧</a></p>
                <p class="ml-sm-3 btn-block"><a href="#" class="btn btn-primary active" role="button">当選番号一覧</a></p>
            </div>
        </div>
    </div>
    @endsection
