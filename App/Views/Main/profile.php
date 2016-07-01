<?php
$title = "Profile";
include(dirname(__DIR__) . "/layout.php");
?>
// TODO block this page from non-logged in users
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <?php var_dump($_SESSION); ?>

            <h1 class="page-header">Welcome <?php echo $_SESSION['user']['name']; ?></h1>

            <p class="lead">This site serves one purpose, it's a timecard for your relationship.</p>
            <div id="bar-chart"></div>
            <h4>This week you have earned: <?php echo $num_stars; ?>  stars</h4>
            
            
            <button class="btn btn-danger"><?php echo $args['event']; ?></button>

            <h4>You have used: 10 vetoes this month</h4>  

            <a class="twitter-follow-button" href="https://twitter.com/randy_gannaway"></a>
        </div>
    </div>
</div>
<?php var_dump($args); ?>       

<script src="//d3js.org/d3.v3.min.js"></script>
<script>


var chartdata = <?php echo json_encode($args); ?>;
 
var height = 200,
    width = 720,
    barWidth = 40,
    barOffset = 20;
 
var dynamicColor;
 
var yScale = d3.scale.linear()
        .domain([0, d3.max(chartdata)])
        .range([0, height])
 
var xScale = d3.scale.ordinal()
        .domain(d3.range(0, chartdata.length))
        .rangeBands([0, width])
 
var colors = d3.scale.linear()
.domain([0, chartdata.length*.33, chartdata.length*.66, chartdata.length])
.range(['#d6e9c6', '#bce8f1', '#faebcc', '#ebccd1'])
 
 
d3.select('#bar-chart').append('svg')
  .attr('width', width)
  .attr('height', height)
  .style('background', '#bce8f1')
  .selectAll('rect').data(chartdata)
  .enter().append('rect')
.style({'fill': function(data,i){return colors(i);}, 'stroke': '#31708f', 'stroke-width': '5'})
    .attr('width', xScale.rangeBand())
    .attr('height', function (data) {
        return yScale(data);
    })
    .attr('x', function (data, i) {
        return xScale(i);
    })
    .attr('y', function (data) {
        return height - yScale(data);
    })
    .on('mouseover', function(data) {
        dynamicColor = this.style.fill;
        d3.select(this)
            .style('fill', '#3c763d')
    })
 
    .on('mouseout', function(data) {
        d3.select(this)
            .style('fill', dynamicColor)
    });
</script>
<?php include(dirname(__DIR__) . "/footer.php"); ?>
