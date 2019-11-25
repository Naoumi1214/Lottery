@extends('layouts.app')

@section('content')
<div class="container">
    <h3>当選番号を変更する</h3>
    <form action="" method="post">
        <input type="hidden" name="id" value="{{$targetNo->id}}">
        <div class="form-group">
            <label for=""></label>
            <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId"
                value="{{$targetNo->no}}">
            <small id="helpId" class="text-muted">変更したい番号をご入力してください</small>
        </div>
        <button type="submit" class="btn btn-primary">変更する</button>
    </form>
</div>
@endsection
