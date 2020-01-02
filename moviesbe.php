<?php include("head.php");?>
<?php 
$con = mysqli_connect("","","","");
$query="SELECT * FROM MOVIES";
$result = mysqli_query($con, $query) or die ('could not execute query');
?>
<div class="container">
    <?php while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
        echo "<div class='card mb-3'>
        <img class='card-img-top' src=".$row[image]." alt='Card image cap'>
        <div class='card-body'>
            <h5 class='card-title'>".$row[title]."</h5>
            <p class='card-text'>".$row[description]."</p>
            <p class='card-text'> Tickets available: ".$row[tickets]."</p>
            <a href='order.php' class='btn btn-primary'>Order</a>
        </div>
        </div>";
    }

    ?>
</div>