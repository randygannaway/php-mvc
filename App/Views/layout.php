
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php echo htmlspecialchars($title, ENT_COMPAT, 'UTF-8'); ?></title>

      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
      <link href="http://designmodo.github.io/Flat-UI/dist/css/flat-ui.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/style.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div id="wrapper">
        <div class="overlay"></div>
    
        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand">
                    <a href="/home">
                       Txors
                    </a>
                </li>
                <li>
                    <a href="/home"><i class="fa fa-fw fa-home"></i> Home</a>
                </li>
                <li>
                    <a href="/dashboard"><i class="fa fa-fw fa-folder"></i>Dashboard</a>
                </li>
                <li>
                    <a href="/tasks"><i class="fa fa-fw fa-folder"></i>Tasks</a>
                </li>
                <li>
                    <a href="/profile"><i class="fa fa-fw fa-folder"></i>Profile</a>
                </li>
                <li>
                    <a href="/contact"><i class="fa fa-fw fa-file-o"></i> Contact</a>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-plus"></i> Login/Signup <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <!--<li class="dropdown-header">Login/Signup</li>-->
                    <li><a href="/login">Login</a></li>
                    <li><a href="/users/signup">Sign Up</a></li>
                    <li><a href="/logout">Log Out</a></li>
                  </ul>
                </li>
        </nav>
        <!-- /#sidebar-wrapper -->

        <div id="page-content-wrapper">
          <button type="button" class="hamburger is-closed animated fadeInLeft" data-toggle="offcanvas">
            <span class="hamb-top"></span>
            <span class="hamb-middle"></span>
            <span class="hamb-bottom"></span>
          </button>
        
    <!-- Page content-->

            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-md-8">
                                <h1 class="page-header">Txors   <?php if (isset($_SESSION['user'])): ?>
                                                                <?php echo "for" . htmlspecialchars($_SESSION['user']['name'], ENT_COMPAT, 'UTF-8'); ?>
                                                                <?php endif; ?>
                                </h1>
                            </div>
                            <div class="col-md-4">
                                <img src="img/vacuum.jpg" class="img-circle">
                            </div>
                        </div>
