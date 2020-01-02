<?php include('navbar.php');?>
<?php include("head.php");?>
<?php
session_start();
if($_SESSION["login"]!="admin"){
    header("Location:index.php");
}
$con = mysqli_connect("","","","");
$query="SELECT * FROM USRS";
$result = mysqli_query($con, $query) or die ('could not execute query');
if(isset($_POST["delete"])){
    $usr = $_POST["delete"];
    $sql = "DELETE FROM USRS WHERE usrn = '$usr'";
    if(!mysqli_query($con,$sql)){
        die('Error:'.mysqli_error($con));
    }
    echo"<h2>User Deleted Successfully!</h2>";
    
}
if(isset($_POST["editSubmit"])){
    $usr = $_POST["hidden"]; 
    $usrn = $_POST["usr"];
    $memtype = $_POST["memtype"];
    $pwd = $_POST["pwd"];
    $sqledit = "UPDATE USRS SET usrn = '$usrn', pwd = '$pwd', memtype ='$memtype' WHERE usrn='$usr'";
    if(!mysqli_query($con,$sqledit)){
        die('Error:'.mysqli_error($con));
    }
    echo"<h2>User successfully edited!</h2>";
    
}
?>


<div class="jumbotron container">
    <div class="container-fluid">
        <table class= "table-hover">
            
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col">Username</th>
                        <th scope="col">Member Type</th>
                        <th scope="col">Password</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Edit</th>
                    </tr>
                </thead>
                <tbody>
                
                    <?php while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                        echo '<form method="post">';    
                        echo "<div class='form-group'>";
                        echo "<tr><td scope='row'><input type='hidden' name='hidden' value='".$row[usrn]."'></td>";
                        echo "<td scope='row'><h2><input type='text' name='usr' value='".$row[usrn]."' .></h2></td>";
                        echo "<td scope='row'><input class='form-control' type='text' name='memtype' value='".$row[memtype]."' ></td>";
                        echo "<td scope='row'><input class='form-control'type='text' name='pwd' value='".$row[pwd]."' ></td>";
                        echo "<td scope='row'><button type='submit'  name='editSubmit' id= 'editSubmit' class='form-control btn btn-success' >EDIT</td>";
                        echo"<td scope='row'><button type='submit'  class='form-control btn btn-secondary' name='delete' method='post' value='".$row[usrn]."' >Delete</button></td>
                        </tr>";
                        echo"</div>";
                        echo '</form>';
                    }
                    ?>
                
                </tbody>
        </table>
        <div >
                <a class="btn btn-success" href="addusr.php" role="button">ADD</a>
        </div>
    </div>
</div>