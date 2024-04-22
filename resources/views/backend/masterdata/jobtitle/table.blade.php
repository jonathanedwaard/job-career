@extends('backend.template')

@section('title','Job Title')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

    <!-- Page Heading -->
    <a type="button" href="/backend/create-jobtitle" class="ml-1 mb-2 font-weight-bold btn btn-warning">Add Job Title</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Job Title</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Job Specialization</th>
                            <th>Is Active</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td width="5%">{{ $loop->iteration }}</td>
                            <td width="40%">{{ $item->name }}</td>
                            <td width="40%">{{ $item->job_specializations->name }}</td>
                            <td width="10%">
                                @if($item->isactive == 'Y')
                                    Yes
                                @elseif($item->isactive == 'N')
                                    No
                                @endif
                            </td>
                            <td width="5%"><a href="/backend/jobtitle/{{ $item->id }}" class="btn btn-warning">Update</a></td>
                            <form action="{{ route('delete-jobtitle', $item->id) }}" method="POST">
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