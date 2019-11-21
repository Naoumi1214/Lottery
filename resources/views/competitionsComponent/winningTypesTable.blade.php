<table class="table">
    <thead>
        <tr>
            <th>当選種類名</th>
            <th>最大当選人数</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($winning_typesObj as $winning_type)
        <tr>
        <td scope="row"><a href="{{url('/updateWinningType',$winning_type->id)}}" style="color: blue">{{$winning_type->name}}</a></td>
            <td>{{$winning_type->maxNumberOfPeople}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
