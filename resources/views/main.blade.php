<!DOCTYPE html>
<html lang="pl">
  <head>
    @include('partial._head')
  </head>

  <body>

    @include('partial._nav')

    <div class="container">
      @include('partial._messages')
      @yield('content')   
      @include('partial._footer')

    </div> <!-- end of .container -->


  </body>
</html>