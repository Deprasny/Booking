@extends('layouts.app')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h2>List Booking</h2>
            </div>
            <div class="float-end">
                <a class="btn btn-primary" href="{{ route('booking.create') }}"><i class="fas fa-user-plus"></i> Add booking</a>
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
            <th width="280px"class="text-center">Code</th>
            <th width="280px"class="text-center">Date</th>
            <th width="280px"class="text-center">Student</th>
            <th width="280px"class="text-center">day</th>
            <th width="280px"class="text-center">session</th>
            <th width="280px"class="text-center">from</th>
            <th width="280px"class="text-center">to</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @if ($result->count() > 0)
        @foreach ($result as $key => $booking)
        <tr>
            <td class="text-center">{{ ++$key }}</td>
            <td>{{ $booking->code }}</td>
            <td>{{ $booking->date }}</td>
            <td>{{ $booking->student->name }}</td>
            <td>{{ $booking->session->day }}</td>
            <td>{{ $booking->session->session }}</td>
            <td>{{ date('H:i', strtotime($booking->session->from))}}</td>
            <td>{{ date('H:i', strtotime($booking->session->to))}}</td>
            <td class="text-center">
                <form action="{{ route('booking.destroy',$booking->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this?')"><i class="fas fa-trash-alt"></i> Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="8" class="text-center">No Data booking</td>
        </tr>
        @endif
        
    </table>

    {!! $result->links() !!}

@endsection