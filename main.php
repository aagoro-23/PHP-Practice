
<?php 
echo "<h1>Hi ".$user.", Welcome to iCinema!</h1>'";
?>
<div class="container fluid">
    <div class="jumbotron container">
        <div id="carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role = "listbox">
            <div class="carousel-item active">
            <img src="imgs/movie1.jpg" class="d-block w-100" alt="movie1">
            </div>
            <div class="carousel-item">
            <img src="imgs/movie2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="imgs/movie3.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
    </div>
</div>