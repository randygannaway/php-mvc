<?php
$title = "Profile";
include(dirname(__DIR__) . "/layout.php");
?>

<div class="container">
  <div class="page-header">
    <h1>Welcome <?php echo $name; ?></h1>
  </div>
  <p class="lead">This is your profile</p>
  <p>Back to <a href="../sticky-footer">the default sticky footer</a> minus the navbar.</p>

    </div>
</div>
<?php include(dirname(__DIR__) . "/footer.php"); ?>
