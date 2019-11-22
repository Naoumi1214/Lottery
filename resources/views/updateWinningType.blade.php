@extends('layouts.app')
@section('javascript-head')
<script src="{{ asset('js/selectboxNumber.js') }}" defer></script>

@endsection
@section('content')
<div class="container">
    <h3>当選種類の内容を更新する</h3>
    <form action="/createWinningType" method="post">
        @csrf
        <input type="hidden" name="competition_id" value="{{$winningType->competition_id}}">
        <input type="hidden" name="competition_id" value="{{$winningType->id}}">
        <div class="form-group">
            <label for="">当選種類名</label>
            <input type="text" name="name" id="name" class="form-control"　value="{{$winningType->name}}" placeholder="" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <label for="">最大当選人数</label>
            <select class="form-control" name="maxNumberOfPeople" id="maxNumberOfPeople">
            </select>
        </div>
        <button type="submit" class="btn btn-primary">更新する</button>
    </form>

</div>
@endsection
