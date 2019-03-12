    <?php

                        require_once 'auth/auth.php';
                        // HTML authentication
                        authHTML();
                        include 'theme/header.php';

    // Process delete operation after confirmation

    if(isset($_POST["id"]) && !empty($_POST["id"])){

        // Include config file

        require_once 'config.php';

        

        // Prepare a delete statement

        $sql = "DELETE FROM media WHERE id = ?";

        //unlink($id);

        if($stmt = mysqli_prepare($link, $sql)){

            // Bind variables to the prepared statement as parameters

            mysqli_stmt_bind_param($stmt, "i", $param_id);

            

            // Set parameters

            $param_id = trim($_POST["id"]);

            

            // Attempt to execute the prepared statement

            if(mysqli_stmt_execute($stmt)){

                // Records deleted successfully. Redirect to landing page

                header("location: index.php");

                exit();

            } else{

                echo "Oops! Something went wrong. Please try again later.";

            }

        }

         

        // Close statement

        mysqli_stmt_close($stmt);

        

        // Close connection

        mysqli_close($link);

    } else{

        // Check existence of id parameter

        if(empty(trim($_GET["id"]))){

            // URL doesn't contain id parameter. Redirect to error page

            header("location: error.php");

            exit();

        }

    }

    ?>

        <title>View Record</title>


  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">PlayFLU</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="https://subty.ru">Home</a></li>
                <li><a href="https://subty.ru/addmedia/">Upload</a></li> 
                <li><a href="https://subty.ru/shed/">Sheduler</a></li>
                <li><a href="https://subty.ru/settings/">Settings</a></li>
                <li><a href="https://subty.ru/logout.php">Logout</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

        <div class="wrapper">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-md-12">

                        <div class="page-header">

                            <h1>Delete Record</h1>

                        </div>

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                            <div class="alert alert-danger fade in">

                                <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>

                                <p>Are you sure you want to delete this record?</p><br>

                                <p>

                                    <input type="submit" value="Yes" class="btn btn-danger">

                                    <a href="index.php" class="btn btn-default">No</a>

                                </p>

                            </div>

                        </form>

                    </div>

                </div>        

            </div>

        </div>

    </body>

    </html>

