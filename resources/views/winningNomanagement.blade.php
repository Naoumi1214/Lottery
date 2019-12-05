@extends('layouts.app')
@section('javascript-head')
<script src="{{ asset('js/createWinningNoAjax.js') }}" defer></script>
@endsection
@section('content')
<div class="container">
@include('competitionsComponent.createwinningNoform',['competition_id','winning_noObjs'])
</div>
@endsection
