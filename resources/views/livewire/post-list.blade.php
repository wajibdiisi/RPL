<div x-data="{tab : 'post'}">
    
    <template x-if = "tab === 'post'">
    <div>
    @foreach($posts as $post)
    
    <li class="timeline-item">
       <div class="card card-white grid-margin">
           <div class="card-body">
       <div class="card-body">
           <div class="timeline-item-header">
            <?php $profile_posted_by = UserHelp::getProfile($post->posted_by)?>
            <img src="{{ url('uploads/avatars/' . $profile_posted_by->avatar) }}" alt="" />
              
               @if($post->posted_by == $post->profile_id)
               <p><a class="text-decoration-none" href ="{{ route('profile.show',$profile_posted_by->username)}}">{{$profile_posted_by->nama_lengkap}}</a><span> posted a status</span> 
                @if($profile_posted_by->id == $currentUser_id)
                    @if($confirm_action == $post->id)
                    <button class="float-right btn btn-outline-success btn-sm"  wire:click.prevent ="deletePost('{{$post->id}}')"><i class="far fa-check-circle"></i></button>
                    @else
                    <button class="float-right btn btn-outline-danger btn-sm"  wire:click.prevent ="confirmDelete('{{$post->id}}')"><i class="far fa-trash-alt"></i></button>
                    @endif
                @endif
                </p>
               @elseif($post->posted_by != $post->profile_id)
               <p><a href ="{{ route('profile.show',$profile_posted_by->username)}}">{{$profile_posted_by->nama_lengkap}}</a><span> posted a status on 
                    <a class="text-decoration-none" href ="{{ route('profile.show',UserHelp::get_username($post->profile_id))}}">{{UserHelp::get_fullname($post->profile_id)}}</a> profile</span> @if($profile_posted_by->user_id == $currentUser_id)
                    <button class="float-right btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></button>@endif</p>
                @endif
               <small>{{($post->getCreatedTime()->diffForHumans())}}
               @if($post->getCreatedTime() != $post->getUpdatedTime())
                   (Last Updated : {{$post->getUpdatedTime()->diffForHumans()}} )@endif
               </small>
           </div>
           <div class="timeline-item-post">
           <p>{{$post->post_content}}</p>
               <div class="timeline-options">
                
                   @if(array_search($currentUser_id,$post->like) === FALSE)
                   <button class="btn btn-outline-primary" wire:click ="addLike('{{$post->id}}', '{{$currentUser_id}}')"><i class="fa fa-thumbs-up"></i>Like({{count((array)$post->like)}})</button>
                   @else
                   <button class="btn btn-outline-primary" wire:click ="removeLike('{{$post->id}}', '{{$currentUser_id}}')"><i class="fa fa-thumbs-up"></i>Like({{count((array)$post->like)}})</button>
                   @endif
                   @if($openPost_id != $post->id)
               <button class ="btn btn-outline-success" wire:click ="$set('openPost_id','{{$post->id}}')"><i class="fa fa-comment"></i>  Comment ({{count((array)$post->comments)}})</button>
                   @elseif($openPost_id == $post->id)
                   <button class ="btn btn-outline-success" wire:click="$set('openPost_id','')"><i class="fa fa-comment"></i> Comment ({{count((array)$post->comments)}})</button>
                   @endif
                   
               </div>
               @if($openPost_id == $post->id)
               @livewire('show-comment',['post' => $post,'currentUser_id' => $currentUser_id], key($post->id))
               @elseif($openPost_id != $post->id)
               @endif
           </div>
       </div>
   </div></div>
   </li>
   @endforeach
   <div class="row">
    <div class="col-12">
        <div class="blog-pagination text-center mt-3">
            <ul class="pagination justify-content-center">
               
                {{$posts->links()}}
              
              </ul>
        </div>
    </div>
</div>
</div>
</template>
@if (session()->has('message'))

                <script>
                
                    toastr.success('  {{ session('message') }}');
                
                </script>
@elseif(session()->has('danger'))
<script>
                
    toastr.error('  {{ session('danger') }}');

</script>
                
                @endif

   </div>