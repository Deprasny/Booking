@extends('layouts.app')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-start">
                <h2>Create Booking</h2>
            </div>
            <div class="float-end">
                <a class="btn btn-primary" href="{{ route('booking.index') }}"><i class="fas fa-user-plus"></i> Back</a>
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
            <th width="280px"class="text-center">Session</th>
            <th width="280px"class="text-center">From</th>
            <th width="280px"class="text-center">To</th>
            <th width="280px"class="text-center">Quota</th>
            <th width="280px"class="text-center">Filled</th>
            <th width="280px"class="text-center">
                remaining quota</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @if ($resultSession->count() > 0)
        @foreach ($resultSession as $key => $session)
        <!-- Modal -->
        <div class="modal fade" id="exampleModal{{$session->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Student Name</label>
                            <select class="form-select" name="student_id" required>
                                @foreach ($resultStudent as $student)
                                <option value="{{$student->id}}">{{$student->name}}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" name="date" class="form-control" required>
                          </div>
                          <input type="hidden" name="session_id" value="{{$session->id}}">
                        
                    
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            </div>
            </div>
        </div>

        <tr>
            <td class="text-center">{{ ++$key }}</td>
            <td>{{ $session->day }}</td>
            <td>{{ $session->session }}</td>
            <td>{{ date('H:i', strtotime($session->from)) }} WIB</td>
            <td>{{ date('H:i', strtotime($session->to)) }} WIB</td>
            <td>{{ $session->quota + $session->filled }}</td>
            <td>
                {{ $session->filled }}
            </td>
            <td>
                {{ $session->quota }}
            </td>
            <td class="text-center">
                @if($session->day == 'Jumat' && $session->from == '11:00:00')
                <button type="button" class="btn btn-primary btn-sm" disabled>
                    Jumatan
                </button>
                @else
                @if($session->quota == 0)
                
                <button type="button" class="btn btn-danger btn-sm" disabled>
                    <i class="far fa-edit"></i> Fully Booked
                </button>
                    @else
                
                <button type="button" class="btn btn-warning btn-sm" href="{{ route('session.edit',$session->id) }}" data-bs-toggle="modal" data-bs-target="#exampleModal{{$session->id}}">
                    <i class="far fa-edit"></i> Booking
                </button>
                @endif
                @endif
                
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="7" class="text-center">No Data Booking</td>
        </tr>
        @endif
        
    </table>
    

    {!! $resultSession->links() !!}

@endsection