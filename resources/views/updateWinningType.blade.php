@extends('layouts.app')
@section('javascript-head')

@endsection
@section('content')
<div class="container">
    <h3>当選種類の内容を更新する</h3>
    <form action="" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$winningType->id}}">
        <div class="form-group">
            <label for="">当選種類名</label>
            <input type="text" name="name" id="name" class="form-control" 　value="{{$winningType->name}}" placeholder=""
                aria-describedby="helpId">
        </div>
        <div class="form-group">
          <label for="">最大当選人数</label>
          <input type="text"name="maxNumberOfPeople" id="maxNumberOfPeople" class="form-control" placeholder="" aria-describedby="helpId">
          <small id="helpId" class="text-muted">数秒をご入力してください</small>
        </div>
        <button type="submit" class="btn btn-primary">更新する</button>
    </form>

</div>
@endsection
