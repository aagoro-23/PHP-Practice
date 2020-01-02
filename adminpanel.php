<?php
session_start();
if($_SESSION["login"]!="admin"){
    header("Location:index.php");
}
$con = mysqli_connect("","","","");
$query="SELECT * FROM MOVIES";
$result = mysqli_query($con, $query) or die ('could not execute query');
if(isset($_POST["delete"])){
    $movie = $_POST["delete"];
    $sql = "DELETE FROM MOVIES WHERE title = '$movie'";
    if(!mysqli_query($con,$sql)){
        die('Error:'.mysqli_error($con));
    }
    echo"<h2>Movie Deleted Successfully!</h2>";
    
}
if(isset($_POST["editSubmit"])){
    $movie = $_POST["hidden"]; 
    $title = $_POST["title"];
    $description = $_POST["description"];
    $image = $_POST["image"];
    $tickets = $_POST["tickets"];
    $price = $_POST["price"];
    $sqledit = "UPDATE MOVIES SET tickets = '$tickets', title = '$title', `description` ='$description', price = '$price' WHERE title = '$movie'";
    if(!mysqli_query($con,$sqledit)){
        die('Error:'.mysqli_error($con));
    }
    echo"<h2>Movie successfully edited!</h2>";
    
}
?>


<div class="jumbotron container">
    <div class="container-fluid">
    <div class="row">
        <table class= "table-hover">
            
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Tickets Available</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody>
                
                    <?php while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                        echo '<form method="post">';    
                        echo "<div class='form-group'>";
                        echo "<tr><td scope='row'><img src='".$row[image]."' class='img-thumbnail img-fluid' style='width:120px;height:120px'></td>";
                        echo "<td scope='row'><input type='hidden' name='hidden' value='".$row[title]."'></td>";
                        echo "<td scope='row'><h2><input type='text' name='title' value='".$row[title]."' .></h2></td>";
                        echo "<td scope='row'><input class='form-control' type='text' name='description' value='".$row[description]."' .></td>";
                        echo "<td scope='row'><input class='form-control'type='text' name='price' value='".$row[price]."' .></td>";
                        echo "<td scope='row'><input type='text' class='form-control' name='tickets' value='".$row[tickets]."' ></td>";
                        echo "<td scope='row'><button type='submit'  name='editSubmit' id= 'editSubmit' class='form-control btn btn-success' >EDIT</td>";
                        echo"<td scope='row'><button type='submit'  class='form-control btn btn-secondary' name='delete' method='post' value='".$row[title]."' >Delete</button></td>
                        </tr>";
                        echo"</div>";
                        echo '</form>';
                    }
                    ?>
                
                </tbody>
        </table>
        <div >
                <a class="btn btn-success" href="add.php" role="button">ADD</a>
                <a class="btn btn-success" href="usrsadmin.php" role="button">Manage Users</a>
        </div>
        </div>
    </div>
</div>