<p>名前を押すと対象の当選種類を編集できます</p>
<table class="table">
    <thead>
        <tr>
            <th>当選種類名</th>
            <th>最大当選人数</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($winning_typesObj as $winning_type)
        <tr id="tr{{$winning_type->id}}">
            <td scope="row"><a href="{{url('/updateWinningType',$winning_type->id)}}"
                    style="color: blue">{{$winning_type->name}}</a></td>
            <td>{{$winning_type->maxNumberOfPeople}}</td>
            <td class="text-center"><button type="button" name="" id="{{$winning_type->id}}"
                    class="btn btn-primary btn-lg deleteBtn">削除する</button></td>
        </tr>
        @endforeach
    </tbody>
</table>
