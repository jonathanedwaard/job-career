@extends('backend.template')

@section('title','Applicant')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Applicant</h6>
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
                            <th>Job Title</th>
                            <th>Job Type</th>
                            <th>Status</th>
                            <th>Accepted</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td width="5%">{{ $loop->iteration }}</td>
                            <td width="20%">{{ $item->users->name }}</td>
                            <td width="15%">{{ $item->job_requests->job_titles->name }}</td>
                            <td width="15%">{{ $item->job_requests->job_types->name }}</td>
                            <td width="15%">{{ $item->status }}</td>
                            <td width="10%">
                                @if($item->isaccepted == 'Y')
                                    Yes
                                @elseif($item->isaccepted == 'N')
                                    No
                                @endif
                            </td>
                            <td width="15%"><a href="/backend/applicant/{{ $item->id }}" class="btn btn-warning">View Detail</a></td>
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