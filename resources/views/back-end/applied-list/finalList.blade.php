@extends('back-end.master')
@section('body')
    <div class="back-end-mainContent">
        <div class="main_heading">
            <h2>Final List</h2>
        </div>
        <div class="main_content  bg-white">
            <?php $message = Session::get('message') ?>

            @if(isset($message))
                <div class="alert alert-success alert-dismissible fade show">
                    <button href="#" class="close" data-dismiss="alert" aria-label="close">&times;</button>
                    {{ $message }}
                </div>
            @endif

            {{ Form::open(['route'=>'assign-employee','method'=>'POST','name'=>'assignEmployeeForm','id'=>'assignEmployeeForm']) }}

            <table id="table_id" class="display table table-bordered table-hover table-striped text-center">
                <thead class="bg-info text-white">
                <tr>
                    <th> Select </th>
                    <th>Unique Id</th>
                    <th>Post Name</th>
                    <th>Total Exp.</th>
                    <th>Skills</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($finalLists as $finalList)
                    <tr>
                        <td>
                            <input type="checkbox" name="checkSingle" id="singleCheckAll" value="{{ $finalList->id }}"/>
                            <input type="hidden" name="full_name" id="full_name" value="{{ $finalList->full_name }}"/>
                            <input type="hidden" name="post_name" id="post_name" value="{{ $finalList->post_name }}"/>
                        </td>
                        <td>{{ $finalList->unique_apply_id }}</td>
                        <td>{{ $finalList->post_name }}</td>
                        <td>@if($finalList->totalExperince == '') 0 @else {{ $finalList->totalExperince }} @endif</td>
                        <td>{{ $finalList->skills }}</td>
                        <td><img src="{{ asset($finalList->photo) }}" width="50" alt="Applicant Image"/></td>

                        <td>
                            <a href="{{ url('single-advertisement',['id' => $finalList->id ]) }}" class="btn btn-info btn-sm" title="View">
                                <i class="fas fa-search-plus"></i>
                            </a>
                            <a onclick="return confirm('Are you sure to delete!'); "  href="{{ url('delete-advertisement',['id' => $finalList->id] ) }}" class="btn btn-danger btn-sm" title="Delete">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                <p class="text-right">
                    <input class="btn btn-success btn-sm showHidden" type="submit" name="viva_list" id="short_list" value="Assign Employee"/>
                </p>
                <tbody>
            </table>

            {{ Form::close() }}
        </div>
    </div>
@endsection