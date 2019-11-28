@extends('layouts.app')

@section('content')
<div class="container">
    <h1>当選番号一覧</h1>
    <div class="row">
        <table class="table winning_nosTable">
            <thead>
                <tr>
                    <th>当選種類名</th>
                    <th>当選番号</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($winning_noObjs as $winning_noObj)
                <tr class="">
                    <td scope="row">{{$winning_noObj->name}}</td>
                    <td>{{$winning_noObj->no}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
