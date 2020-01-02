
 <?php include("navbar.php");?>
<?php include("head.php");?>
<?php session_start();
$con = mysqli_connect("","","","");

if(isset($_POST["btnSubmit"])){
    $usrn = $_POST["usrn"];
    $pwd = $_POST["pwd"];
    $query = mysqli_query( $con, "SELECT * FROM USRS WHERE usrn = '$usrn' AND pwd  = '$pwd'");
    $data = mysqli_fetch_assoc($query);
    $memtype = $data["memtype"];
    if(mysqli_num_rows($query)==1 && $memtype == "1"){
        $_SESSION["login"] = "admin";
        header("Location:index.php");
    }elseif(mysqli_num_rows($query)==1 && $memtype == "0"){
        $_SESSION["login"]="user";
        header("Location:index.php");
    }else{
        echo"<h3>Username and password don't match.".$memtype."<br> Please Try again.</h3>";
    }
}


?> 
<body>
    <div class="container">
        <div class = "row">
            <div class= "col-md-4 col-sm-4 col-xs-12 col-md-offset-4" style="padding-top: 30px;">
                <div class = "jumbotron">
                <form method="post">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h1> LOGIN </h1>
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
                            <div class="form-group">
                                <label for="btnSubmit">Login</label>
                                <input type="submit" name="btnSubmit" id= "btnSubmit" class="form-control btn btn-success">
                            </div>
                            <div class="form-group">
                                <a href="register.php"><button type="button" class = "btn btn-success" name="Register" id= "Register" >Register </button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
                        
