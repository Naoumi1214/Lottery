@extends('layouts.app')
@section('javascript-head')
<script src="{{ asset('js/singleNoConfirmationAjax.js') }}" defer></script>
@endsection
@section('content')
<div class="container">
    <h1>当選番号確認</h1>
    <form action="/singleNoConfirmation" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$id}}">
        <div class="form-group">
            <label for="">番号を入力してください</label>
            <input type="text" name="no" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <button type="button" id="submit" class="btn btn-primary">当選を確認する</button>
    </form>

    <table class="table result">
        <thead>
            <tr>
                <th>当選種類名</th>
                <th>当選番号</th>
            </tr>
        </thead>
        <tbody id="nos">
        </tbody>
    </table>


</div>
@endsection
