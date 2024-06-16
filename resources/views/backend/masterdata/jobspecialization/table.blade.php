@extends('backend.template')

@section('title','Job Specialization')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
    <a type="button" href="/backend/create-jobspecialization" class="ml-1 mb-2 font-weight-bold btn btn-warning">Add Job Specialization</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Job Specialization</h6>
        </div>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Is Active</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td width="5%">{{ $loop->iteration }}</td>
                            <td width="80%">{{ $item->name }}</td>
                            <td width="10%">
                                @if($item->isactive == 'Y')
                                    Yes
                                @elseif($item->isactive == 'N')
                                    No
                                @endif
                            </td>
                            <td width="5%"><a href="/backend/jobspecialization/{{ $item->id }}" class="btn btn-warning">Update</a></td>
                            <form action="{{ route('delete-jobspecialization', $item->id) }}" method="POST">
                                {{ method_field('DELETE') }}
                                @csrf
                                <td width="5%"><button class="btn btn-danger">Delete</button></td>
                            </form>
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