<?php
$title = "Profile";
include(dirname(__DIR__) . "/layout.php");
?>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">

            <h1 class="page-header">Welcome <?php echo $_SESSION['user']['name']; ?></h1>

            <p class="lead">This site serves one purpose, it's a timecard for your relationship.</p>
            <h4>This week you have earned: <?php echo $num_stars; ?>  stars</h4>

            <h4>You have used: 10 vetoes this month</h4>  

            <a class="twitter-follow-button" href="https://twitter.com/randy_gannaway"></a>

        </div>
    </div>
</div>

<?php include(dirname(__DIR__) . "/footer.php"); ?>
