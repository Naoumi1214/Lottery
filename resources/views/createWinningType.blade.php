@extends('layouts.app')
@section('javascript-head')

@endsection
<script src="{{ asset('js/selectboxNumber.js') }}" defer></script>
@section('content')
<div class="container">
    @include('competitionsComponent.createWinningTypeForm',['competition_id' => $competition_id])
</div>
@endsection
