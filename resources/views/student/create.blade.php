@extends('layouts.app')

@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-start">
            <h2>Create New Student</h2>
        </div>
        <div class="float-end">
            <a class="btn btn-primary " href="{{ route('student.index') }}"><i class="fas fa-backspace"></i> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">NIM</label>
        <input type="text" class="form-control" name="nim" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Address</label>
        <input type="text" name="address" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">No telp</label>
        <input name="no_telp" type="text" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary float-end">Submit</button>

</form>
@endsection