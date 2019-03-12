<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $address = $salary = "";
$name_err = $address_err = $salary_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    // Validate address
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Please enter an address.";     
    } else{
        $address = $input_address;
    }
    
    // Validate salary
    $input_salary = trim($_POST["salary"]);
    if(empty($input_salary)){
        $salary_err = "Please enter the salary amount.";     
    } elseif(!ctype_digit($input_salary)){
        $salary_err = "Please enter a positive integer value.";
    } else{
        $salary = $input_salary;
    }
    
    // Check input errors before inserting in database
 //   if(empty($name_err) && empty($address_err) && empty($salary_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO employees (name, address, salary) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_address, $param_salary);
            
            // Set parameters
            $param_name = $address;
            $param_address = $address;
            $param_salary = $salary;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
  //  }
    
    // Close connection
    mysqli_close($link);
}

$dategen = new datetime();
$dategen_out = date_format($dategen, 'Y-m-d');
$genname = "playlist_".$dategen_out;


?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Daily Playlist</title>
        <!-- 1. Подключить CSS-файл Bootstrap 3 -->  
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <!-- 2. Подключить CSS-файл библиотеки Bootstrap 3 DateTimePicker -->  
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css" />
     
    <!-- 3. Подключить библиотеку jQuery -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <!-- 4. Подключить библиотеку moment -->
    <script src="js/moment-with-locales.min.js"></script>
    <!-- 5. Подключить js-файл фреймворка Bootstrap 3 -->
    <script src="js/bootstrap.min.js"></script>
    <!-- 6. Подключить js-файл библиотеки Bootstrap 3 DateTimePicker -->
    <script src="js/bootstrap-datetimepicker.min.js"></script>
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create New Playlist</h2>
                    </div>
                    <p>Please fill this form and submit to add new record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $genname; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                       <div class="form-group">
                            <label>Set Date</label>
                <div class='input-group date' id='datetimepicker_d'>
                    <input type='text' name="address" class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
                        <div class="form-group">
                            <label>Set Time (optional)</label>
                <div class='input-group date' id='datetimepicker'>
                    <input type='text' name="salary" class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>

                     <!--   <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                            <label>Address</label>
                            <textarea name="address" class="form-control"><?php echo $address; ?></textarea>
                            <span class="help-block"><?php echo $address_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($salary_err)) ? 'has-error' : ''; ?>">
                            <label>Salary</label>
                            <input type="text" name="salary" class="form-control" value="<?php echo $salary; ?>">
                            <span class="help-block"><?php echo $salary_err;?></span>
                        </div> -->
                        <br>
                        <input type="submit" class="btn btn-primary" value="Continue">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
    <script>
        $(function () {
            $('#datetimepicker').datetimepicker(
                {format: 'HH:mm', locale: 'ru'}
            );
              $('#datetimepicker_d').datetimepicker(
                {format: 'YYYY-MM-DD', locale: 'ru'}
            );
        });
    </script>