@extends('layouts.app')

@section('content')
<div class="container">
@include('competitionsComponent.createwinningNoform',['competition_id','winning_noObjs'])
</div>
@endsection
