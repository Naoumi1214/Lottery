<h1 style="margin-bottom: 10px">当選を行う</h1>
<div id="ramdom" class="winningform">
    <h3>当選種類別にランダムに当選させる</h3>
    <form action="/createWinningNoRandom" method="post">
        @csrf
        <input type="hidden" name="competition_id" value="{{$competition_id}}">
        <div class="form-group">
            <label for="">当選種類</label>
            <select class="form-control winning_type_id" name="winning_type_id">
                @foreach ($winningtypes as $item)
                <option value="{{$item->id}}">種類名：{{$item->name}}&nbsp;&nbsp;&nbsp;当選最大人数：{{$item->maxNumberOfPeople}}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">当選番号の上限</label>
            <input type="text" name="maxno" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="duplicate" id="" value="true">
                重複を許す
            </label>
        </div>
        <button id="randomHitbtn" type="button" class="btn btn-primary">当選させる</button>
    </form>
</div>

<div id="between" class="winningform">
    <h3>当選種類別に範囲を決めて当選させる</h3>
    <form action="/createBetweenRandom" method="post">
        @csrf
        <input type="hidden" name="competition_id" value="{{$competition_id}}">
        <div class="form-group">
            <label for="">当選種類</label>
            <select class="form-control" name="winning_type_id" id="">
                @foreach ($winningtypes as $item)
                <option value="{{$item->id}}">{{$item->name}}&nbsp;&nbsp;&nbsp;当選最大人数：{{$item->maxNumberOfPeople}}
                </option>
                @endforeach
            </select>
            <div class="form-row">
                <div class="form-group col-6">
                    <label for="">最小番号</label>
                    <input type="text" name="minno" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    <small id="helpId" class="text-muted">対象の範囲の最小値をご入力してください</small>
                </div>
                <div class="form-group col-6">
                    <label for="">最大番号</label>
                    <input type="text" name="maxno" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    <small id="helpId" class="text-muted">対象の範囲の最大値をご入力してください</small>
                </div>
                <p>※片方だけでも決めることができます</p>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="duplicate" id="" value="true">
                    重複を許す
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">当選させる</button>
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">当選番号</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h1 id="no" class="display-1" style="text-align: center;">&nbsp;</h1>
                <h2 id="name">当選種類：</h2>
            </div>
            <div class="modal-footer">
                <button id="start" type="button" class="btn btn-primary">当選開始！！</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
            </div>
        </div>
    </div>
</div>

<table class="table winning_nosTable">
    <thead>
        <tr>
            <th>当選種類名</th>
            <th>当選番号</th>
            <th></th>
        </tr>
    </thead>
    <tbody id="winning_noObjs_tbody">
        @foreach ($winning_noObjs as $winning_noObj)
        <tr id="{{$winning_noObj->id}}tr" class="">
            <td scope="row">{{$winning_noObj->name}}</td>
            <td><a href="{{url('/updateNo', $winning_noObj->id)}}" style="color: blue;">{{$winning_noObj->no}}</a></td>
            <td><button type="button" id="{{$winning_noObj->id}}" class="btn btn-primary deletebtn">削除する</button></td>
        </tr>
        @endforeach
    </tbody>
</table>
