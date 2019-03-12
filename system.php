<?php

                        require_once 'auth/auth.php';
                        // HTML authentication
                        authHTML();
                        include 'theme/header.php';
                        
                        // Include config file

                        require_once 'config.php';
?>                        

        <title>System settings</title>

        <script type="text/javascript">

            $(document).ready(function(){

                $('[data-toggle="tooltip"]').tooltip();   

            });

        </script>


        <div class="wrapper">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-md-12">

                        <div class="page-header clearfix">

                            <h2 class="pull-left">System settings</h2>

                           

                        </div>

                       <?php

$query = "SELECT * FROM tbl_user ORDER BY id DESC";
$result = mysqli_query($link, $query);
?>
<html>  
 <head>  
          <title></title>  
          
    <script src="../js/jquery.tabledit.min.js"></script>
    </head>  
    <body>  
  <div class="container">  
            <div class="table-responsive">  
    <table id="editable_table" class="table table-bordered table-striped">
     <thead>
      <tr>
      <th>ID</th>
       <th>Variable</th>
       <th>Value</th>
      </tr>
     </thead>
     <tbody>
     <?php
     while($row = mysqli_fetch_array($result))
     {
      echo '
      <tr>
      <td>'.$row["id"].'</td>
       <td>'.$row["var"].'</td>
       <td>'.$row["val"].'</td>
      </tr>
      ';
     }
     ?>
     </tbody>
    </table>
   </div>  
  </div>  
 </body>  
</html>  
<script>  
$(document).ready(function(){  
     $('#editable_table').Tabledit({
      url:'../action.php',
       deleteButton: false,
    saveButton: false,
    autoFocus: false,
    buttons: {
        edit: {
            class: 'btn btn-sm btn-primary',
            html: '<span class="glyphicon glyphicon-pencil"></span> &nbsp EDIT',
            action: 'edit'
        }
    },
      columns:{
       identifier:[0, "id"],
       editable:[[2, 'val']]
      },
      restoreButton:false,
      onSuccess:function(data, textStatus, jqXHR)
      {
       if(data.action == 'delete')
       {
        $('#'+data.id).remove();
       }
      }
     });
 
});  
 </script>
                    </div>

                </div>        

            </div>

        </div>


<?
include 'theme/footer.php';
