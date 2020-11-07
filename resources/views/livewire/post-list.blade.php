
 @foreach($posts as $post)
 <li class="timeline-item">
    <div class="card card-white grid-margin">
        <div class="card-body">
    <div class="card-body">
        <div class="timeline-item-header">
            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" />
            <p><a href ="{{ route('profile.show',UserHelp::get_username($post->posted_by))}}">{{UserHelp::get_fullname($post->posted_by)}}</a><span> posted a status</span></p>
            <small>{{($post->getCreatedTime()->diffForHumans())}}
            @if($post->getCreatedTime() != $post->getUpdatedTime())
                (Last Updated : {{$post->getUpdatedTime()->diffForHumans()}} )@endif
            </small>
        </div>
        <div class="timeline-item-post">
        <p>{{$post->post_content}}</p>
            <div class="timeline-options">
                
                @if(array_search($user->id,$post->like) === FALSE)
                <a href="{{ route('post.addLike',['post_id' => $post->id ,'id' => $user->id]) }}"><i class="fa fa-thumbs-up"></i>Like({{count((array)$post->like)}})</a>
                @else
                <a href="{{ route('post.removeLike',['post_id' => $post->id ,'id' => $user->id]) }}"><i class="fa fa-thumbs-up"></i>Like({{count((array)$post->like)}})</a>
                @endif
                <a href="#"><i class="fa fa-comment"></i> Comment ({{count((array)$post->comments)}})</a>
                <a href="#"><i class="fa fa-share"></i> Share (6)</a>
            </div>
            <div class="timeline-comment">
                <div class="timeline-comment-header">
                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" />
                    <p>asdasdsadsad <small>1 hour ago</small></p>
                </div>
            <p class="timeline-comment-text">asdsadsadasd</p>
            </div>

            <form enctype="multipart/form-data" method="post" action="">
            @csrf
            <textarea class="form-control" placeholder="Reply" name="comment_content"></textarea>
            <button type="submit" class ="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div></div>
</li>
@endforeach