@extends('layouts.app')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h2>List student</h2>
            </div>
            <div class="float-end">
                <a class="btn btn-primary" href="{{ route('student.create') }}"><i class="fas fa-user-plus"></i> Add student</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('succes'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th width="280px"class="text-center">NIM</th>
            <th width="280px"class="text-center">Name</th>
            <th width="280px"class="text-center">Address</th>
            <th width="280px"class="text-center">No telp</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @if ($result->count() > 0)
        @foreach ($result as $key => $student)
        <tr>
            <td class="text-center">{{ ++$key }}</td>
            <td>{{ $student->nim }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->address }}</td>
            <td>{{ $student->no_telp }}</td>
            <td class="text-center">
                <form action="{{ route('student.destroy',$student->id) }}" method="POST">

                    <a class="btn btn-warning btn-sm" href="{{ route('student.edit',$student->id) }}"><i class="far fa-edit"></i> Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this?')"><i class="fas fa-trash-alt"></i> Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="7" class="text-center">No Data student</td>
        </tr>
        @endif
        
    </table>

    {!! $result->links() !!}

@endsection