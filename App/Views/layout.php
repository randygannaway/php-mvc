<!DOCTYPE html>
<html>
<head>
    <title>Las Esposas</title>
     
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">    

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <a class="navbar-brand" href="home">
                LasEsposas
            </a>
            <ul class="nav nav-tabs">
                <li role="presentation"><a href="stars">Stars</a></li>
                <li role="presentation"><a href="vetoes">Vetoes</a></li>
                <li role="presentation"><a href="badges">Badges</a></li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-body">
                <?php include($file); ?>
            </div>
        </div>
    </div>
</body>
