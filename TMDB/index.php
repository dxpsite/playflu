<?php 
require"curl.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movies</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" >

</head>
<body>
<nav class="navbar navbar-expand-lg ">
  <a class="navbar-brand" href="index.php">Movies</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <form method="GET" action="pages/search_result.php" class="form-inline my-2 my-lg-0">
      <input name="q" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<!-- end nav -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100"  src="css/images/1.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="css/images/2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="css/images/3.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- end slider -->
<section class="top-rate">
<div class="container">
<h2><span>|</span>Top rated movies</h2>
<div class="row text-center">

<?php
$data=movie();
for ($i=0;$i < 4; $i++) { 
  $title=$data['results'][$i]['title'];
  $poster_path=$data['results'][$i]['poster_path'];
  $vote_average=$data['results'][$i]['vote_average'];
  $id=$data['results'][$i]['id'];
  echo '
  <div class="col-sm-3">
<a href="pages/movie.php?id='.$id.'"><img class="img-thumbnail" src="https://image.tmdb.org/t/p/w185_and_h278_bestv2/'.$poster_path.'"></a>
<p class="lead">'.$title.'</p>
<p><span>'.$vote_average.'</span> Vote</p>
</div>
  ';
}
?>

</div>
<!-- end row 1 -->
<div class="view text-center">
<a class="view-all" href="pages/all_movies.php">View all</a>
</div>
<hr>
</div>
</section>
<!-- end top-movies-rate section -->

<section class="top-rate">
<div class="container">
<h2><span>|</span>Top rated TV shows</h2>
<div class="row text-center">
<?php
$tv=tv();
for ($i=0;$i < 4; $i++) { 
  $title=$tv['results'][$i]['original_name'];
  $poster_path=$tv['results'][$i]['poster_path'];
  $vote_average=$tv['results'][$i]['vote_average'];
  $id=$tv['results'][$i]['id'];
  echo '
  <div class="col-sm-3">
<a href="pages/tv.php?id='.$id.'"><img class="img-thumbnail" src="https://image.tmdb.org/t/p/w185_and_h278_bestv2/'.$poster_path.'"></a>
<p class="lead">'.$title.'</p>
<p><span>'.$vote_average.'</span> Vote</p>
</div>
  ';
}
?>


</div>
<!-- end row 1 -->
<div class="view text-center">
<a class="view-all" href="pages/all_tv_show.php">View all</a>
</div>
<hr>
</div>
</section>
<!-- end TV-show section -->


<section class="top-rate">
<div class="container">
<h2><span>|</span>Trending</h2>
<div class="row text-center">

<?php
$trend=trend();
for ($i=0;$i < 4; $i++) { 
  $title=$trend['results'][$i]['title'];
  $poster_path=$trend['results'][$i]['poster_path'];
  $vote_average=$trend['results'][$i]['vote_average'];
  $id=$trend['results'][$i]['id'];
  echo '
  <div class="col-sm-3">
<a  href="pages/movie.php?id='.$id.'"><img class="img-thumbnail" src="https://image.tmdb.org/t/p/w185_and_h278_bestv2/'.$poster_path.'"></a>
<p class="lead">'.$title.'</p>
<p><span>'.$vote_average.'</span> Vote</p>
</div>
  ';
}
?>
</div>

<!-- end row 1 -->
<div class="view text-center">
<a class="view-all" href="pages/trend.php">View all</a>
</div>
</div>
</section>
<div class="container">
<section class="footer">
    <p>Copyright © subty.ru All Rights Reserved</p>
</section>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>   

</body>
</html>