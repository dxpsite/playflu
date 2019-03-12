<?php
    $movies = $tmdb->searchMovie("звездные войны");

    echo '  <div class="panel panel-default">
                <div class="panel-body">
                    <ul>';

    foreach($movies as $movie){
        echo '          <li>'. $movie->getTitle() .' (<a href="https://www.themoviedb.org/movie/'. $movie->getID() .'">'. $movie->getID() .'</a>)</li>';
    }

    echo '          </ul>
                </div>
            </div>';
?>