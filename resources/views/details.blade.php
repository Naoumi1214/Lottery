@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="competitiondetails col-8">
            <h1 id="title">TITLE:{{$name}}</h1>
            <div class="row mx-auto">
                <img id="icon" src="{{$icon}}"
                    class="col-md-3 img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"
                    alt="">
                <div id="col-md-10 overview">
                    <h2>概要</h2>
                    <p>{{$overview}}</p>
                </div>
            </div>
            <div class="row mx-auto" 　style="margin-top: 10px;">
                <!--mobile-->
                <a href="#" class="btn btn-primary active btn-block d-md-none center-block" role="button">当選番号一覧</a>
                <a href="#" class="btn btn-primary active btn-block d-md-none center-block" role="button">当選を確認</a>
                <!--PC-->
                <a href="#" class="btn btn-primary active btn-block d-none d-md-inline col-md-5 ml-md-3"
                    role="button">当選番号一覧</a>
                <a href="#" class="btn btn-primary active btn-block d-none d-md-inline col-md-5 ml-md-3"
                    role="button">当選を確認</a>
                @if (Auth::check() && Auth::id()===$user_id)
                <a href="#" class="btn btn-primary active btn-block center-block" role="button">当選を確認</a>
                @endif
            </div>
        </div>
    </div>
    @endsection
