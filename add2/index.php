    <?php

                        include '../TMDB/curl.php';
                        //require_once '../auth/auth.php';
                        // HTML authentication
                        //authHTML();
                        include '../theme/header.php';




    $descripton = "";

    $description_err = "";



    if($_SERVER["REQUEST_METHOD"] == "POST"){

        // Validate name

        $input_description = trim($_POST["descripton"]);

        if(empty($input_description)){

            $description_err = "Please enter a descripton.";

        } elseif(!filter_var(trim($_POST["descripton"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Zа-яА-ЯёЁ0-9]+$/")))){

            $description_err = 'Please enter a valid descripton.';

        } else{

            $descripton = $input_description;

        }


    }


    ?>
<style>
    .loader {
    display: none;
    z-index: 1000;
    }
    #progress-wrp {
    border: 1px solid #0099CC;
    padding: 1px;
    position: relative;
    border-radius: 3px;
    margin: 10px;
    text-align: left;
    background: #fff;
    box-shadow: inset 1px 3px 6px rgba(0, 0, 0, 0.12);
}
#progress-wrp .progress-bar{
	height: 20px;
    border-radius: 3px;
    background-color: #f39ac7;
    width: 0;
    box-shadow: inset 1px 1px 10px rgba(0, 0, 0, 0.11);
}
#progress-wrp .status{
	top:3px;
	left:50%;
	position:absolute;
	display:inline-block;
	color: #000000;
}
.bar {
    height: 18px;
    background: green;
}
</style>


        <div class="wrapper_">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-md-12">

                        <div class="page-header">

                            <h2>Upload file</h2>

                        </div>
                        
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>jQuery File Upload Example</title>
</head>
<body>
<input id="fileupload" type="file" name="files[]" data-url="server/php/" multiple>
 <div id="progress" class="progress progress-striped progress-bar-animated">
              <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
            </div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="js/vendor/jquery.ui.widget.js"></script>
<script src="js/jquery.iframe-transport.js"></script>
<script src="js/jquery.fileupload.js"></script>
<script>
$(function () {
    $('#fileupload').fileupload({
        dataType: 'json',
        add: function (e, data) {
            data.context = $('<button/>').text('Upload')
                .appendTo(document.body)
                .click(function () {
                    data.context = $('<p/>').text('Uploading...').replaceAll($(this));
                    data.submit();
                });
        },
        done: function (e, data) {
            data.context.text('Upload finished.');
        },
       progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
            console.log("progress: " + progress);
        }
    });
});
</script>

</body> 
</html>
</body>
</html>

