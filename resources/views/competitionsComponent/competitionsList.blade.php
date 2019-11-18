<div id="competitionsList">
    @foreach ($competitions as $competition)
    <div class="media border-bottom" id="competition{{$competition->id}}">
        <a class="d-flex" href="{{url('/details', $competition->id)}}">
            <img src={{$competition->icon}} alt="">
        </a>
        <div class="media-body">
            <h5><a href="{{url('/details', $competition->id)}}" style="color: black;">{{$competition->name}}</a>
            </h5>
            <p>{{$competition->created_at}}</p>
        </div>
    </div>
    @endforeach
    {{$competitions->links()}}
</div>
