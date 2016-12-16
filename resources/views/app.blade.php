@include('_head')
    <body>
      @include('_navbar')
      @yield('content')

      <div class="flex-center position-ref full-height">
          @if (Route::has('login'))
              <div class="top-right links">
                  @if (Auth::check())
                      <a href="{{ url('/home') }}">Home</a>
                  @else
                      <a href="{{ url('/login') }}">Login</a>
                      <a href="{{ url('/register') }}">Register</a>
                  @endif
              </div>
          @endif
      </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  </body>
</html>
