<div class="card card-white grid-margin">
                    <div class="card-body">
                        <form wire:submit.prevent="store" >
                            <div class="post">
                                <input type="hidden" wire:model="postedProfile_id" value="{{$postedProfile_id}}">
            <input type="hidden" wire:model="posted_by" value="{{$posted_by}}">
                            <textarea class="form-control" wire:model ="content" placeholder="Post" rows="4" name="content"></textarea>
                            <div class="post-options">
                                <a href="#"><i class="fa fa-camera"></i></a>
                                <a href="#"><i class="fas fa-video"></i></a>
                                <a href="#"><i class="fa fa-music"></i></a>
                                <button class="btn btn-outline-primary float-right">Post</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>