@extends('layouts.app')

@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-start">
            <h2>Create New session</h2>
        </div>
        <div class="float-end">
            <a class="btn btn-primary " href="{{ route('session.index') }}"><i class="fas fa-backspace"></i> Back</a>
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

<form action="{{ route('session.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Day</label>
        <select name="day" class="form-control" id="">
            <option value="Senin">Senin</option>
            <option value="Selasa">Selasa</option>
            <option value="Rabu">Rabu</option>
            <option value="Kamis">Kamis</option>
            <option value="Jumat">Jumat</option>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Qouta</label>
        <input type="text" name="quota" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary float-end">Submit</button>

</form>
@endsection