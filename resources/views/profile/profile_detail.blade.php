@extends('layouts.app')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.22/b-1.6.5/cr-1.5.2/fc-3.3.1/fh-3.1.7/r-2.2.6/rg-1.1.2/sc-2.0.3/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.22/b-1.6.5/cr-1.5.2/fc-3.3.1/fh-3.1.7/r-2.2.6/rg-1.1.2/sc-2.0.3/datatables.min.js"></script>
 
    <style>
         body {
            background: #071224;

        }
        .dataTables_wrapper .dataTables_processing {
  background: none;
  border: none;
  border-radius: 3px;
  color : white;
        
}
.borderless td, .borderless th {
    border: none;
}
.dataTables_info,.dataTables_filter,.dataTables_length{
    color : white;
}
.list-group .list-group-item {
    background-color: #111D35;
    color : white
}

   
    </style>
    @if(!Auth::user())
    <?php $currentUser = 'guest' ?>
    @else
    <?php $currentUser = Auth::user()->id ?>
    @endif
    <div class="container bootstrap snippets bootdey">
        <div class="row">
            <div class="col-sm-10">
            <h1 class="text-light">{{$user->username}}'s Profile</h1></div>
            <div class="col-sm-2">
                <a href="{{ route('profile.show', ['id' => $user->username]) }}" class="float-right"> <img title="profile image" class="img-circle img-fluid rounded-circle" src="{{ url('uploads/avatars/' . $user->avatar) }}"></a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 mt-3">
                <!--left col-->
    
                <ul class="list-group">
                    <li class="list-group-item text-muted">Profile</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Joined</strong></span> {{$user->created_at->diffForHumans()}}</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Last seen</strong></span> {{Carbon\Carbon::parse($user->last_seen->toDateTime()->format('Y-m-d H:i:s'))->diffForHumans()}}</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Real name</strong></span> {{$user->nama_lengkap}}</li>
    
                </ul>
    
                
    
                <ul class="list-group mt-3" >
                    <li class="list-group-item text-muted" >Activity <i class="fa fa-dashboard fa-1x"></i></li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Reviews</strong></span> 0</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 0</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 0</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Games</strong></span> 0</li>
                </ul>
    
               
    
            </div>
            <!--/col-3-->
            <div class="card col-sm-9 mt-3" style="background-color: #111D35;">
    
             
    
                <div class="tab-content mt-3">
                    <div class="tab-pane active" id="home">
                        <div class="table-responsive">
                            <table class="table table-hover table-borderless text-light" id="yajra-datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Game Name</th>
                                        <th>Status</th>
                                        <th>Last Update</th>
                                        @if($user->user_id == $currentUser)
                                        <th>Action </th>
                                       @endif
                                    </tr>
                                </thead>
                                <tbody id="items">
                                    
                                </tbody>
                            </table>
                   
                        </div>
                        <!--/table-resp-->
    
                     
                    </div>
                    <!--/tab-pane-->
                   
                    <!--/tab-pane-->
                    
    
                </div>
                <!--/tab-pane-->
            </div>
            <!--/tab-content-->
    
        </div>
        <!--/col-9-->
    </div>
    

        @endsection
        
        @push('javascripts')
        <script>
            $(function() {
                $('#yajra-datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{route('profile.detail',$user->id)}}",
                    columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'title', name: 'title'},
            {data: 'status', name: 'status'},
            {data: 'updated_at', name: 'updated_at'},
            @if($user->user_id == $currentUser)
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
            @endif
        ]
                });
            });
        </script>
@endpush
