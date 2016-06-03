<!-- included in the <body> of /App/Views/layout.php -->

<div class="container">

    <h1>Welcome to the home page!</h1>

    <ul>
        <!-- iterate through the events listed in the events table and display their title -->
        <?php foreach ($events as $event): ?>
            <li><?php echo $event['title'] ?></li>
        <?php endforeach ?>
    </ul>

</div>
