<?php include("head.php")?>
<?php
session_start();
$con = mysqli_connect("","","","");
$query = "SELECT * FROM MOVIES";
$result = mysqli_query($con,$query);
// This is the code for the button. If the user presses the button, then, the variables inside get assigned and the conditions get checked. 
if(isset($_POST["btnSubmit"])){
    // The next if statement is checking sessions, making sure that the user is logged in. If the user is logged in, the button executes, if not, they are redirected to the login page. 
    if(isset($_SESSION["login"])){    
        $quantity = $_POST["quantity"];
        // The value of $movie is fetched from the value printed in the value field of the dropdown menu.
        $movie = $_POST["movie"];
        // This is the query needed to subtract the amount of tickets from the ones on the database. There is no need to check if the number of tickets available is less than the number of tickets bought. 
        $sql= "UPDATE MOVIES SET tickets = tickets - '$quantity' WHERE title = '$movie'";
        if(!mysqli_query($con,$sql)){
            die('Error:'.mysqli_error($con));
        }
        echo "<h2>You ordered ".$quantity." ".$movie." tickets</h2>";
    }else{
        header("Location:login.php");
    }
}
?>


<body>
    <div class="jumbotron">
        <form method="post">
            <div class ="form-group" method="post">
                <label for="sel1"><h3>Pick a movie:</h3></label>
                <!-- This is a dropdown menu -->
                <select class="form-control" id="sel1" name="movie" method="post">
                <!-- The next snippet of PHP takes the data gotten from the $query and $result and stores it in an array, which is iterable. It prints all the options from the movies directly from the database as options in the dropdown menu.   -->
                <?php while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                    // Every option in the dropdown menu has a name and a value. The value is stored in the variable $movie to be used for the UPDATE query
                    print "<option value='".$row[title]."'>".$row[title]."</option>";
                }
                ?>
            </select>
            <div class="form-group">
                <label for="q"><h3>Quantity:</h3></label>
                <!-- This is the form where you select the quantity. The maximum is 100 and the minimum is 1 so that the user can't do negative numbers. -->
                <input name="quantity" type="text" class = "form-control" id="quantity" placeholder="Please enter quantity" max="100" min="1"/>
            </div>
            <div class="form-group" method="post" action="">
            <!-- Html for button -->
                <label for="btnSubmit">ORDER!</label>
                <input type="submit" name="btnSubmit" id= "btnSubmit" class="form-control btn btn-success">
            </div>
        </form>
    </div>
</body>

