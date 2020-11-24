@extends('layouts.app')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha512-WNLxfP/8cVYL9sj8Jnp6et0BkubLP31jhTG9vhL/F5uEZmg5wEzKoXp1kJslzPQWwPT1eyMiSxlKCgzHLOTOTQ==" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.22/b-1.6.5/cr-1.5.2/fc-3.3.1/fh-3.1.7/r-2.2.6/rg-1.1.2/sc-2.0.3/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/dt-1.10.22/b-1.6.5/cr-1.5.2/fc-3.3.1/fh-3.1.7/r-2.2.6/rg-1.1.2/sc-2.0.3/datatables.min.js"></script>

 
    <style>
        .dataTables_wrapper .dataTables_processing {
  background: none;
  border: none;
  border-radius: 3px;
        
}
   
    </style>
    <div class="container bootstrap snippets bootdey">
        <div class="row">
            <div class="col-sm-10">
            <h1>{{$user->username}}'s Profile</h1></div>
            <div class="col-sm-2">
                <a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="https://bootdey.com/img/Content/avatar/avatar1.png"></a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <!--left col-->
    
                <ul class="list-group">
                    <li class="list-group-item text-muted">Profile</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Joined</strong></span> {{$user->created_at->diffForHumans()}}</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Last seen</strong></span> {{Carbon\Carbon::parse($user->last_seen->toDateTime()->format('Y-m-d H:i:s'))->diffForHumans()}}</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Real name</strong></span> {{$user->nama_lengkap}}</li>
    
                </ul>
    
                
    
                <ul class="list-group mt-3">
                    <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
                </ul>
    
                <div class="panel panel-default">
                    <div class="panel-heading">Social Media</div>
                    <div class="panel-body">
                        <i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
                    </div>
                </div>
    
            </div>
            <!--/col-3-->
            <div class="col-sm-9">
    
             
    
                <div class="tab-content mt-2">
                    <div class="tab-pane active" id="home">
                        <div class="table-responsive">
                            <table class="table table-hover" id="yajra-datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Game Name</th>
                                        <th>Status</th>
                                        <th>Last Update</th>
                                        <th>Progression </th>
                                       
                                    </tr>
                                </thead>
                                <tbody id="items">
                                    
                                </tbody>
                            </table>
                            <hr>
                           
                        </div>
                        <!--/table-resp-->
    
                        <hr>
    
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
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
                });
            });
        </script>
@endpush
