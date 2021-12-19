@extends('layouts.app')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h2>List Session</h2>
            </div>
            <div class="float-end">
                <a class="btn btn-primary" href="{{ route('session.create') }}"><i class="fas fa-user-plus"></i> Add session</a>
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
            <th width="280px"class="text-center">Day</th>
            <th width="20px"class="text-center">Session</th>
            <th width="280px"class="text-center">From</th>
            <th width="280px"class="text-center">To</th>
            <th width="20px"class="text-center">Quota</th>
            <th width="40px"class="text-center">Action</th>
        </tr>
        @if ($result->count() > 0)
        @foreach ($result as $key => $session)
        <tr>
            <td class="text-center">{{ ++$key }}</td>
            <td>{{ $session->day }}</td>
            <td>{{ $session->session }}</td>
            <td>{{ date('H:i', strtotime($session->from)) }} WIB</td>
            <td>{{ date('H:i', strtotime($session->to)) }} WIB</td>
            <td>{{ $session->quota }}</td>
            <td class="text-center">
                <form action="{{ route('session.destroy',$session->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this?')"><i class="fas fa-trash-alt"></i> Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="7" class="text-center">No Data session</td>
        </tr>
        @endif
        
    </table>

    {!! $result->links() !!}

@endsection