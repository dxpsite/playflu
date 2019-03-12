<?php
$qury=$_GET['q'];
$qury1=urlencode($qury);
$data=json_decode(file_get_contents("https://api.themoviedb.org/3/search/movie?api_key=0d2861372b5b46a514fa633fee10594f&language=ru&query=$qury1&page=1&include_adult=true"),true);
$count=count($data['results']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add new media</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css" >
<style>
  
/* The overlay effect (full height and width) - lays on top of the container and over the image */
.overlay {
  position: absolute;
  top: 5%;
  bottom: 0;
  left: 5%;
  right: 1%;
  height: 60%;
  width: 90%;
  opacity: 0;
  transition: .3s ease;
  /*background-color: grey;*/
}

/* When you mouse over the container, fade in the overlay icon*/
.col-sm-3:hover .overlay {
  opacity: 0.7;
}

/* The icon inside the overlay is positioned in the middle vertically and horizontally */
.icon {
  color: white;
  font-size: 60px;
  position: absolute;
  top: 30%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
  color: white;
  -webkit-text-stroke-width: 2px;
   -webkit-text-stroke-color: black;
}

.icon2 {
  color: white;
  font-size: 60px;
  position: absolute;
  top: 70%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
  color: white;
  -webkit-text-stroke-width: 2px;
   -webkit-text-stroke-color: black;
}
/* When you move the mouse over the icon, change color */
.fa-plus-circle:hover {
  color: grey;
  -webkit-text-stroke-width: 2px;
   -webkit-text-stroke-color: black;
}  

.fa-info-circle:hover {
  color: grey;
  -webkit-text-stroke-width: 2px;
   -webkit-text-stroke-color: black;
}  
</style>

</head>
<body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<nav class="navbar navbar-expand-lg ">
<a class="navbar-brand" href="../index.php">Movies</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
    </ul>
    <form method="GET" action="search_result.php" class="form-inline my-2 my-lg-0">
      <input name="q" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<div class="search-result">
<div class="container">
<div class="row text-center">
<?php

for ($i=0;$i <$count; $i++) { 
    if($data['results'][$i]['media_type']=='tv'){
        $title=$data['results'][$i]['original_name'];
        $titlerus=$data['results'][$i]['name'];
        $act="tv.php";
    }else{   $title=$data['results'][$i]['title'];
        $act="movie.php";
    }
  $poster_path=$data['results'][$i]['poster_path'];
  $vote_average=$data['results'][$i]['vote_average'];
  $id=$data['results'][$i]['id'];
  echo '
  <div class="col-sm-3">
  <a href="#"><img class="img-thumbnail" src="https://image.tmdb.org/t/p/w185_and_h278_bestv2/'.$poster_path.'"></a>
  <div class="overlay">
    <a href="../../create.php?id='.$id.'" class="icon" title="Add New Media">
      <i class="fa fa-plus-circle"></i>
    </a>
    <a href="https://subty.ru/air/admin/TMDB/pages/movie.php?id='.$id.'" class="icon2" title="Overview">
      <i class="fa fa-info-circle"></i>
    </a>
  </div>
  <p class="lead">'.$title.'</p>
</div>

<hr>
  ';
}
?>

  <div id="theModal" class="modal fade text-center">
    <div class="modal-dialog">
      <div class="modal-content">
      </div>
    </div>
  </div>

    <script>
    $('.modals').on('click', function(e){
      e.preventDefault();
      $('#theModal').modal('show').find('.modal-content').load($(this).attr('href'));
    });
  </script>

</div>
</div>
</body>
</html>

