<?php 
session_start();
?>
<html>
    <body>



        <div>

            <!-- Static navbar -->
            <nav class="navbar fixed-top navbar-expand-md navbar-light bg-light">
                <a class="navbar-brand" href="home.php" ><img src="imgs/icinema.svg" width="60" height="60" alt=""/></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src= "imgs/menu.svg" width="30" height="30" clas="form-inline"/>
                                </a>
                                    <div class="dropdown-menu my-2 my-lg-0" aria-labelledby="navbarDropdown">
                                        <?php
    
                                        $urls = array(
                                            'Home' => 'home.php',
                                           
                                            'Movies' => 'movies.php'                                     
                                        );

                                        foreach ($urls as $name => $url) {
                                            print '<a href="'.$url.'" class="dropdown-item">'.$name.'</a>';
                                        }
                                        if(isset($_SESSION["login"])){
                                            print '<a href="logout.php" class="dropdown-item">Logout</a>';
                                            print '<a href="order.php" class ="dropdown-item">Order Tickets</a>';
                                            if($_SESSION["login"]=="admin"){
                                                print'<a href="adminpage.php" class="dropdown-item">Admin</a>';
                                            }


                                        }else{
                                            print'<a href="login.php" class="dropdown-item">Log In</a>';
                                            print'<a href="register.php" class="dropdown-item">Register</a>';
                                        }
                                        
                                        ?>
                                    </div>
                                 </li>                               

                        </ul>
                </div>
            </nav>
        </div>
                       






        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>

        <script src="js/bootstrap-4-navbar.js"></script>
    </body>
</html>
