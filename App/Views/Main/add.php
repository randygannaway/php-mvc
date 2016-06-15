<div>
    <h4>Your husband would like to: </h4>
        <button class="btn btn-danger"><?php echo $args[0]['event']; ?></button>
        &nbsp;
            <h4>He currently has: <?php echo $args[1]['num_stars']; ?>  stars</h4>
                <?php for ($i = 0 ; $i < $args[1]['num_stars'] ; $i++): ?>
                <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                <?php endfor; ?>
                <h4>You have used: 10 vetoes this month</h4>
</div>
