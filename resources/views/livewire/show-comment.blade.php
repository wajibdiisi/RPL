<div class="timeline-comment">
@foreach($commentlist as $comment)
@foreach($comment->embedsComment as $comments)
                                            <div class="timeline-comment-header">
                                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="" />
                                                <p>{{UserHelp::get_fullname($comments->profile_id)}} <small>1 hour ago</small></p>
                                            </div>
                                        <p class="timeline-comment-text">{{$comments->comment_content}}</p>
                                        @endforeach
                                        @endforeach
                                        <div>
                                            <form wire:submit.prevent="store">
                                               
                                                <input type="hidden" wire:model="post_id" value="{{$post->id}}">
                                                <input type="hidden" wire:model="user_id" value="{{$user_id}}">
                                            <textarea class="form-control" wire:model ="comment_content" placeholder="Reply" name="comment_content"></textarea>
                                                                            <button type="submit" class ="btn btn-primary">Submit</button>
                                            </form>
                                        </div>                                       
                                        
</div>
