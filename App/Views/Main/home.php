<?php

$title="Home";
include(dirname(__DIR__) . "/layout.php");
?>

<div class="container">
  <div class="page-header">
    <h1>Sticky footer with fixed navbar</h1>
  </div>
  <p class="lead">Pin a fixed-height footer to the bottom of the viewport in desktop browsers with this custom HTML and CSS. A fixed navbar has been added with <code>padding-top: 60px;</code> on the <code>body > .container</code>.</p>
  <p>Back to <a href="../sticky-footer">the default sticky footer</a> minus the navbar.</p>


    <a href="/users/signup-form">Sign Up</a>

    <h1>Add An Event</h1>
        <form action="/home/add" method="get">
            <input type="text" name="event"><br>
            <input type="submit" action="submit" value="Ask Her">
        </form>
</div>

<?php include(dirname(__DIR__) . "/footer.php"); ?>
