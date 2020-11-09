<div>
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
                   @if($openPost_id != $post->id)
               <button class ="btn btn-outline-success" wire:click="$set('openPost_id','<?=$post->id?>')" wire:model = ><i class="fa fa-comment"></i>  Comment ({{count((array)$post->comments)}})</button>
                   @elseif($openPost_id == $post->id)
                   <button class ="btn btn-outline-success" wire:click="$set('openPost_id','')"><i class="fa fa-comment"></i> Comment ({{count((array)$post->comments)}})</button>
                   @endif
                   
               </div>
               @if($openPost_id == $post->id)
               @livewire('show-comment',['post' => $post,'user_id' => $user->id], key($post->id))
               @elseif($openPost_id != $post->id)
               @endif
           </div>
       </div>
   </div></div>
   </li>
   @endforeach
   </div>