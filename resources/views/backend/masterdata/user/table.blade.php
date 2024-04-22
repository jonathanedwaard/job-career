@extends('backend.template')

@section('title','User')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
    <a type="button" href="/backend/create-user" class="ml-1 mb-2 font-weight-bold btn btn-warning">Add User</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">User</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date of Birth</th>
                            <th>Is Active</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td width="5%">{{ $loop->iteration }}</td>
                            <td width="30%">{{ $item->name }}</td>
                            <td width="30%">{{ $item->email }}</td>
                            <td width="20%">{{ $item->dateofbirth }}</td>
                            <td width="10%">
                                @if($item->isactive == 'Y')
                                    Yes
                                @elseif($item->isactive == 'N')
                                    No
                                @endif
                            </td>
                            <td width="5%"><a href="/backend/user/{{ $item->id }}" class="btn btn-warning">Update</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    </div>
    <!-- /.container-fluid -->
@endsection