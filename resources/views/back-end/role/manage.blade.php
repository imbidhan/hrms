@extends('back-end.master')
@section('body')
    <div class="back-end-mainContent">
        <div class="main_heading">
            <h2>Role List</h2>
            <a href="{{ route('create-role') }}" class="btn btn-success btn-sm">Create Role</a>
        </div>
        <div class="main_content  bg-white">
            <?php $message = Session::get('message') ?>
            @if(isset($message))
                <div class="alert alert-success alert-dismissible fade show">
                    <button href="#" class="close" data-dismiss="alert" aria-label="close">&times;</button>
                    {{ $message }}
                </div>
            @endif
            <table id="table_id" class="display table table-bordered table-hover table-striped text-center">
                <thead class="bg-info text-white">
                <tr>
                    <th>#</th>
                    <th>Role Name</th>
                    <th>Publication Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php($i=1)
                @foreach($roles as $role)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ ucwords($role->role_name) }}</td>
                        <td>{{ $role->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                        <td>
                            @if($role->publication_status == 1)
                                <a href="{{ route('unpublished-role',['id' => $role->id] ) }}" class="btn btn-info btn-sm" title="Published">
                                    <i class="fas fa-arrow-up"></i>
                                </a>
                            @else
                                <a href="{{ route('published-role',['id' => $role->id] ) }}" class="btn btn-danger btn-sm" title="Unpublished">
                                    <i class="fas fa-arrow-down"></i>
                                </a>
                            @endif
                            <a href="{{ route('edit-role',['id' => $role->id] ) }}" class="btn btn-success btn-sm" title="Edit">
                                <span class="fas fa-edit"></span>
                            </a>
                            <a onclick="return confirm('Are you sure to delete!'); "  href="{{ route('delete-role',['id' => $role->id] ) }}" class="btn btn-danger btn-sm" title="Delete">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                <tbody>
            </table>
        </div>
    </div>
@endsection