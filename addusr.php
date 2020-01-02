<?php
include("head.php");
include("navbar.php");
session_start();
if($_SESSION["login"]!="admin"){
    header("Location:index.php");
}
$con = mysqli_connect("","","","");
if(isset($_POST["btnSubmit"])){ 
    $title = $_POST["title"];
    $description = $_POST["description"];
    $image = $_POST["image"];
    $tickets = $_POST["tickets"];
    $price = $_POST["price"];
    $sqledit = "INSERT INTO USRS (usrn, `pwd`, memtype ,`image`,tickets)
    VALUES ( '$title','$description', '$price', '$image', '$tickets'); ";
    if(!mysqli_query($con,$sqledit)){
        die('Error:'.mysqli_error($con));
    }
    echo"<h2>Movie successfully added!</h2>";
    
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
                                <h1> Add movies </h1>
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
                                    <label for="GO">ADD MOVIE</label>
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