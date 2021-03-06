
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">

    <title> Files</title>

    <!-- Bootstrap core CSS -->
   {{ HTML::style('assets\bootstrap\css\bootstrap.min.css') }}

    <!-- Custom styles for this template -->
    {{ HTML::style('assets\css\custom.css') }}

     @yield('header')

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ URL::to('/') }}">Files db</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class=""><a href="{{ URL::to('/') }}">Home</a></li>
            <li><a href="{{ URL::route('Files.search') }}">Search</a></li>
            <li><a href="{{ URL::route('Files.create') }}">Add</a></li>
            @if(Auth::check() )
             
              <li><a href="{{ URL::route('user.files',['id'=>Auth::user()->id]) }}">My Files</a></li>
            @endif
            @if(Auth::check() && Auth::user()->admin )
             
              <li><a href="{{ URL::route('user.create') }}">Add Users</a></li>
            @endif

            
          </ul>
          <ul class="nav navbar-nav navbar-right">

            @if(!Auth::check())
              <li><a href="#">Hello Guest</a></li>
              <li><a href="{{ URL::route('sessions.create') }}">Login</a></li>
            @else 
               <li><a href="#">Hello {{Auth::user()->username}}</a></li>
              <li><a href="{{ URL::to('logout') }}">Logout</a></li>
            @endif
            
            
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">
    <div class = content>
      @yield('content')
      </div>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  </body>
</html>
