<?php
include("navbar.php");
include("head.php");
session_start();
if($_SESSION["login"]!="admin"){
    header("Location:index.php");
}
$con = mysqli_connect("","","","");
$query="SELECT * FROM MOVIES";
$result = mysqli_query($con, $query) or die ('could not execute query');
$movie = $_POST["movie"];

// $sql = "SELECT * FROM MOVIES WHERE title='$movie'";
// $check = mysqli_query($con,$sql);
// $array = mysqli_array($check,MYSQLI_ASSOC);
if(isset($_POST["btnSubmit"])){ 
    $title = $_POST["title"];
    $description = $_POST["description"];
    $image = $_POST["image"];
    $tickets = $_POST["tickets"];
    $price = $_POST["price"];
    $sqledit = "UPDATE MOVIES SET tickets = '$tickets', title = '$title', `description` ='$description', `image` = '$image', price = '$price' WHERE title = '$movie'";
    if(!mysqli_query($con,$sqledit)){
        die('Error:'.mysqli_error($con));
    }
    echo"<h2>Movie successfully edited!</h2>";
    
}
?>


<body>
    
    <div class="container">
      
        <div class = "row">
            <div class= "col-md-4 col-sm-4 col-md-offset-4" style="padding-top: 30px;">
                <div class="jumbotron">
                    <form method="post">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h1> Edit movies </h1>
                            </div>
                            <div class="form-group" method="post">
                                    <label for="sel1">Pick a Movie:</label>
                                    <select class="form-control" id="sel1" name="movie" method="post">
                                        <?php while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                            print "<option value='".$row[title]."'>".$row[title]."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>  Title </label>
                                    <input type="text" name="title" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>  Description </label>
                                    <input type="text" name="description" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>  Price </label>
                                    <input type="text" name="price" class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>  Tickets available </label>
                                    <input type="text" name="tickets" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>  Image Source </label>
                                    <input type="text" name="image" class="form-control" >
                                </div>

                                <div class="form-group">
                                    <label for="GO">SUBMIT EDIT</label>
                                    <input type="submit" name="btnSubmit" id= "btnSubmit" class="form-control btn btn-success" href="login.php">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>