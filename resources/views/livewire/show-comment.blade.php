<div class="timeline-comment" style="border:none">

@foreach($commentlist as $comment)
@foreach($comment->embedsComment as $comments)
                                            <div class="timeline-comment-header">
                                                <img class="img-fluid" src="{{ url('uploads/avatars/' . UserHelp::get_avatar($comments->profile_id)) }}"/>
                                                <p style="color:#007bff">{{UserHelp::get_fullname($comments->profile_id)}} <small>1 hour ago</small></p>
                                            </div>
                                        <p class="timeline-comment-text text-light">{{$comments->comment_content}}</p>
                                        @endforeach
                                        @endforeach
                                        <div>
                                            <form wire:submit.prevent="store">
                                               
                                                <input type="hidden" wire:model="post_id" value="{{$post->id}}">
                                                <input type="hidden" wire:model="currentUser_id" value="{{$user->id}}">
                                            <textarea class="form-control" style="background : #131f39;border : none" wire:model ="comment_content" placeholder="Reply" name="comment_content"></textarea>
                                                                            <button type="submit" class ="mt-2 btn btn-outline-primary">Submit</button>
                                            </form>
                                        </div>                                       
                                        
</div>
