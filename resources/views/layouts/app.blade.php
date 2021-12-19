<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Booking Kunjungan</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Booking Kunjungan</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : ''}}" aria-current="page" href="/">HOME</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ request()->is('booking*') ? 'active' : ''}}" href="{{route('booking.index')}}">Booking</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ request()->is('session*') ? 'active' : ''}}" href="{{route('session.index')}}">Session</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ request()->is('student*') ? 'active' : ''}}" href="{{route('student.index')}}">Student</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>

        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>
    <!-- Copyright -->
    <br><br><br><br><br><br><br><br><br><br><br><br><br>
  <div class="footer-copyright text-center py-3">
    <a class="text-decoration-none" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"> Made With <i class="far fa-heart"></i> By ....</a>
  </div>
  <!-- Copyright -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kesan Pesan Praktikum</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Kesan : Aral</p>
        <p>Pesan : Pisan</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</body>

</html>
