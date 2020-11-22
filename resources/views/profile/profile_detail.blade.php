@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
<link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<div class="container">
    <h1 class="mt-4 mb-4"> User DataTable Server Side</h2>
        <table class="table table-bordered yajra-datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Username</th>
                   
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>   
        <script>
            $(function() {
                $('#data_users_side').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{route('profile.detail',$user->id)}}",
                    columns: [{
                            data: 'user_id',
                            name: 'user_id'
                        },
                        {
                            data: 'username',
                            name: 'username'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
                        },
                        {
                            data: '_id',
                            name: '_id'
                        }
                    ]
                });
            });
        </script>
</div>
@endsection
