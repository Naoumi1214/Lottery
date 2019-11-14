@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div id="createform" class="col-md-8">
            <h1>大会を主催する</h1>
            <form action="" method="post">
                @csrf
                <div class="form-group">
                    <label for="">大会名</label>
                    <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="">概要</label>
                    <textarea class="form-control" name="overview" id="" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="">アイコン画像</label>
                    <input type="file" class="form-control-file" name="icon" id="" placeholder=""
                        aria-describedby="fileHelpId">
                </div>
                <input type="hidden" name="user_id" value="{{Auth::id()}}">
                <button type="submit" class="btn btn-primary">主催</button>
            </form>
        </div>
    </div>
</div>
@endsection
