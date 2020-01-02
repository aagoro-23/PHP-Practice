<?php include("head.php");
include("navbar.php");?>

<?php

$con = mysqli_connect("","","","");

if(isset($_POST["btnSubmit"])){
    $usrn = $_POST["usrn"];
    $pwd = $_POST["pwd"];
    $query = "SELECT * FROM USRS WHERE usrn = $usrn";
    $result = mysqli_query($con,$query);
    $memtype = $_POST["memtype"];

    if(mysqli_num_rows($result)>0){
        echo"<h2> Username already exists</h2>";

    }else{
        $sql = "INSERT INTO USRS (usrn,pwd, memtype) VALUES ('$usrn', '$pwd', '$memtype') ";
        if (!mysqli_query($con,$sql)){
            die('Error:' .mysqli_error($con));

        }
        echo"<h2>You have created your username and password.</h2>";
        

    }
}
?> 
<body>
    
    <div class="container">
      
        <div class = "row">
            <div class= "col-md-4 col-sm-4 col-xs-12 col-md-offset-4" style="padding-top: 30px;">
                <div class="jumbotron">
                    <form method="post">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h1> Register </h1>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>  Username </label>
                                    <input type="text" name="usrn" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>  Password </label>
                                    <input type="text" name="pwd" class="form-control">
                                </div>
                                <div class="form-group" method="post">
                                    <label for="sel1">Membership Type:</label>
                                    <select class="form-control" id="sel1" name="memtype">
                                        <option value="1">Admin</option>
                                        <option value="0">Normal User</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="GO">Login</label>
                                    <input type="submit" name="btnSubmit" id= "btnSubmit" class="form-control btn btn-success" href="login.php">
                                </div>
                                <div class="form-group">
                                    <a href="login.php"><button type="button" class = "btn btn-success" name="login" id= "login" >Login </button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>