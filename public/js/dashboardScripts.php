<?php
/**
 * Created by PhpStorm.
 * User: randy
 * Date: 7/7/16
 * Time: 2:05 PM
 */
?>

<script>
    // CHART
    var graph = document.getElementById("myChart");
    var myChart = new Chart(graph, {
        type: 'bar',
        data: {
            labels: ["<?php echo htmlspecialchars(date_format(date_create($args[0][0]['date_earned']), 'm/d')); ?>",
    "<?php echo htmlspecialchars(date_format(date_create($args[0][1]['date_earned']), 'm/d')); ?>",
    "<?php echo htmlspecialchars(date_format(date_create($args[0][2]['date_earned']), 'm/d')); ?>",
    "<?php echo htmlspecialchars(date_format(date_create($args[0][3]['date_earned']), 'm/d')); ?>",
    "<?php echo htmlspecialchars(date_format(date_create($args[0][4]['date_earned']), 'm/d')); ?>",
    "<?php echo htmlspecialchars(date_format(date_create($args[0][5]['date_earned']), 'm/d')); ?>",
    "<?php echo htmlspecialchars(date_format(date_create($args[0][6]['date_earned']), 'm/d')); ?>"
],
                datasets: [{
                label: 'Stars earned',
                data: [<?php echo htmlspecialchars($args[0][0]['num_stars'], ENT_NOQUOTES, 'UTF-8'); ?>,
<?php echo htmlspecialchars($args[0][1]['num_stars'], ENT_NOQUOTES, 'UTF-8'); ?>,
<?php echo htmlspecialchars($args[0][2]['num_stars'], ENT_NOQUOTES, 'UTF-8'); ?>,
<?php echo htmlspecialchars($args[0][3]['num_stars'], ENT_NOQUOTES, 'UTF-8'); ?>,
<?php echo htmlspecialchars($args[0][4]['num_stars'], ENT_NOQUOTES, 'UTF-8'); ?>,
<?php echo htmlspecialchars($args[0][5]['num_stars'], ENT_NOQUOTES, 'UTF-8'); ?>,
<?php echo htmlspecialchars($args[0][6]['num_stars'], ENT_NOQUOTES, 'UTF-8'); ?>,

],
backgroundColor: [
'rgba(255, 99, 132, 0.7)',
'rgba(54, 162, 235, 0.7)',
'rgba(255, 206, 86, 0.7)',
'rgba(75, 192, 192, 0.7)',
'rgba(153, 102, 255, 0.7)',
'rgba(255, 159, 64, 0.7)'
],
borderColor: [
'rgba(255,99,132,1)',
'rgba(54, 162, 235, 1)',
'rgba(255, 206, 86, 1)',
'rgba(75, 192, 192, 1)',
'rgba(153, 102, 255, 1)',
'rgba(255, 159, 64, 1)'
],
borderWidth: 1
}]
},
options: {
scales: {
yAxes: [{
ticks: {
beginAtZero:true
}
}]
}
}
});


</script>