@extends('layouts.app')
@section('javascript-head')
<script src="{{ asset('js/deleteWinningTypeAjax.js') }}" defer></script>
<script src="{{ asset('js/selectboxNumber.js') }}" defer></script>
@endsection
@section('content')
<div class="container">
    @include('competitionsComponent.createWinningTypeForm',['competition_id' => $competition_id])
    @include('competitionsComponent.winningTypesTable',['winning_typesObj' => $winning_typesObj])
</div>
@endsection
