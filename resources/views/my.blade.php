@extends('layouts.app')

@section('content')
<div class="container">
    @include('competitionsComponent.competitionsList',['competitions' => $competitions])

</div>
@endsection
