<h3>新しく当選種類を追加する</h3>
<form action="/createWinningType" method="post">
    @csrf
    <input type="hidden" name="competition_id" value="{{$competition_id}}">
    <div class="form-group">
        <label for="">当選種類名</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="helpId">
    </div>
    <div class="form-group">
        <label for="">最大当選人数</label>
        <select class="form-control" name="maxNumberOfPeople" id="maxNumberOfPeople">
        </select>
    </div>
    <button type="submit" class="btn btn-primary">追加する</button>
</form>
