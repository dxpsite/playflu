<?php
$id=$_GET['id'];
$data=json_decode(file_get_contents("https://api.themoviedb.org/3/tv/".$id."?api_key=47a1cf3b0d5c4be49db546d4056d0bc0&language=ru"),true);
$data_credits=json_decode(file_get_contents("https://api.themoviedb.org/3/tv/".$id."/credits?api_key=47a1cf3b0d5c4be49db546d4056d0bc0&language=ru"),true);
$title=$data['name'];
$poster_path=$data['poster_path'];
$vote=$data['vote_average'];
$overview=$data['overview'];
$original_language=$data['original_language'];
$first_air_date=$data['first_air_date'];
$genres=$data['genres'];
$credits=$data_credits['cast'];
$sposter_path=$data_credits['poster_path'];
$production_date = substr($release_date, 0, 4);
$number_of_episodes=$data['number_of_episodes'];
$number_of_seasons=$data['number_of_seasons'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movies</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css" >
</head>
<body>
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
<section class="info text-center">
<div class="container">

   <div class="row">
   <?php
echo '
<div class="col-sm-3">
<img class="img-thumbnail" src="https://image.tmdb.org/t/p/w300_and_h450_bestv2/'.$poster_path.'">
<h3>'.$title.'</h3>
</div>

<div class="col-sm-8">
<h3>Overview</h3>
<p class="lead">'.$overview.'</p>
<div class="row">';

$s=0;
foreach($credits as $actors) {
  $s++;
  //include $tables;
     echo'
    <div class="col-sm-3">
      <img src="https://image.tmdb.org/t/p/w92/'.$actors['profile_path'].'" class="avatar">
      <div class="container-fluid">
        <h6>'.$actors['name'].'</h6>
         </div>
    </div>';
  
  if($s == 8) break;
}

echo '
</div>
<ul class="list-unstyled">
<li>Vote: <span>'.$vote.'</span></li>
<li>Original Language: <span>'.$original_language.'</span></li>
<li>first air date: <span>'.$first_air_date.'</span></li>
<li>genres: 
';
for ($i=0; $i <count($genres) ; $i++) { 
   echo'<span>'.$genres[$i]['name'].' </span>';

}
echo '
</li>
<li>number of seasons: <span>'.$number_of_seasons.'</span></li>
<li>number of episodes: <span>'.$number_of_episodes.'</span></li>
</ul>
</div>
';

?>
   </div>
   </div> 
</section>
</body>
</html>