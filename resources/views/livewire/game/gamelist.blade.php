
@foreach($games as $game)
<div class="col-lg-4 col-md-6">
<div class="single-game mb-50">
    <div class="game-img">
        <a href="{{ route('game.show',$game->custom_url) }}"><img src="{{ url('uploads/gamePicture/' . $game->gamePicture) }}" alt="" style="height:370px"></a>
    </div>
    <div class="game-content">
    <h4><a href="games-details.html">{{$game->gameName}}</a></h4>
        <span>pc/xbox/ps4</span>
    </div>
</div>
</div>

@endforeach
