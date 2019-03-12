    <?php

                        include '../TMDB/curl.php';
                 //       require_once '../auth/auth.php';
                        // HTML authentication
                   //     authHTML();
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
</style>
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
                <li class="active"><a href="https://subty.ru/addmedia/">Upload</a></li> 
                <li><a href="https://subty.ru/shed/">Sheduler</a></li>
                <li><a href="https://subty.ru/settings/">Settings</a></li>
                <li><a href="https://subty.ru/logout.php">Logout</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

        <div class="wrapper_">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-md-12">

                        <div class="page-header">

                            <h2>Upload file</h2>

                        </div>
                        

                        <!--<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">-->

                        <p>Find data from TMDB</p>
                        <input name="title" type="text" name="search" id="search_box" class='search_box' />
                        <input type="submit" value="Search from title" class="search_button" /><br />
                        <div id="results"><div class="loader"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span></div></div>
                        <br>

                        <form id="upload_form" action="../upload/file_upload_parser_test.php" enctype="multipart/form-data" method="post">
                       
                        <label>TMBD ID:</label>
                        <input type="text" id="tmdbtitle" name="tmdbtitle">                            
                        <hr>
                        <p>Please add media file</p>


                     


<script>

var max_file_size 			= 2048576; //allowed file size. (1 MB = 1048576)
var allowed_file_types 		= ['video/avi', 'video/mp4', 'video/mpeg']; //allowed file types
var result_output 			= '#output'; //ID of an element for response output
var my_form_id 				= '#upload_form'; //ID of an element for response output
var total_files_allowed 	= 3; //Number files allowed to upload
var progress_bar_id 		= '#progress-wrp'; //ID of an element for response output

//on form submit
$(my_form_id).on( "submit", function(event) { 
	event.preventDefault();
	var proceed = true; //set proceed flag
	var error = [];	//errors
	var total_files_size = 0;
	
	if(!window.File && window.FileReader && window.FileList && window.Blob){ //if browser doesn't supports File API
		error.push("Your browser does not support new File API! Please upgrade."); //push error text
	}else{
		var total_selected_files = this.elements['files'].files.length; //number of files
		
		//limit number of files allowed
		if(total_selected_files > total_files_allowed){
			error.push( "You have selected "+total_selected_files+" file(s), " + total_files_allowed +" is maximum!"); //push error text
			proceed = false; //set proceed flag to false
		}
		 //iterate files in file input field
		$(this.elements['files'].files).each(function(i, ifile){
			if(ifile.value !== ""){ //continue only if file(s) are selected
				/*if(allowed_file_types.indexOf(ifile.type) === -1){ //check unsupported file
					error.push( "<b>"+ ifile.name + "</b> is unsupported file type!"); //push error text
					proceed = false; //set proceed flag to false
				}*/

				total_files_size = total_files_size + ifile.size; //add file size to total size
			}
		});
		
		//if total file size is greater than max file size
		/*if(total_files_size > max_file_size){ 
			error.push( "You have "+total_selected_files+" file(s) with total size "+bytesToSize(total_files_size)+", Allowed size is " + bytesToSize(max_file_size) +", Try smaller file!"); //push error text
			proceed = false; //set proceed flag to false
		}*/
		
		var submit_btn  = $(this).find("input[type=submit]"); //form submit button	
		
		//if everything looks good, proceed with jQuery Ajax
		if(proceed){
			submit_btn.val("Please Wait...").prop( "disabled", true); //disable submit button
			var form_data = new FormData(this); //Creates new FormData object
			var post_url = $(this).attr("action"); //get action URL of form
			
			//jQuery Ajax to Post form data
			$.ajax({
				url : post_url,
				type: "POST",
				data : form_data,
				contentType: false,
				cache: false,
				processData:false,
				xhr: function(){
					//upload Progress
					var xhr = $.ajaxSettings.xhr();
					if (xhr.upload) {
						xhr.upload.addEventListener('progress', function(event) {
							var percent = 0;
							var position = event.loaded || event.position;
							var total = event.total;
							if (event.lengthComputable) {
								percent = Math.ceil(position / total * 100);
							}
							//update progressbar
							$(progress_bar_id +" .progress-bar").css("width", + percent +"%");
							$(progress_bar_id + " .status").text(percent +"%");
						}, true);
					}
					return xhr;
				},
				mimeType:"multipart/form-data"
			}).done(function(res){ //
				$(my_form_id)[0].reset(); //reset form
				$(result_output).html(res); //output response from server
				submit_btn.val("Upload").prop( "disabled", false); //enable submit button once ajax is done
			});
		}
	}
	
	$(result_output).html(""); //reset output 
	$(error).each(function(i){ //output any error to output element
		$(result_output).append('<div class="error">'+error[i]+"</div>");
	});
		
//function to format bites bit.ly/19yoIPO
function bytesToSize(bytes) {
   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
   if (bytes == 0) return '0 Bytes';
   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
}
});

</script>
<script>
    $(function() {
       $(".search_button").click(function() {

 
        // getting the value that user typed
        var searchString    = $("#search_box").val();
        // forming the queryString
        var data            = 'title='+ searchString;
          
        // if searchString is not empty
        if(searchString) {
            $('.loader').show();
            // ajax call
            $.ajax({
                type: "POST",
                url: "searchresults.php",
                data: data,

               success: function(html){ // this happen after we get result
                    $('#results').load('searchresults.php', function() {
                        $("#results").show();
                    $("#results").append(html);
    $('.loader').hide(); // And hide it
});
              },
               error: function(html){ // this happen after we get result
                    alert("Error");
                    
              }
            });    
        }
        return false;
    });
});
</script>
   <script>
      function insertText(text)
      {
        
// var elem = document.getElementById('t100');
         //elem.innerHTML = +text;
         document.getElementById('tmdbtitle').value = +text;
        // $.notify("TMDB ID "+text+" successfully added");
         //alert(text);
      //  $('#tmdbtitle')[0].outerHTML;
      }
    </script>


  <!--<script>
   $(".appendbtn").click(function () {
    alert("Clicked!");
    var template = $('#appendTemplate").html();
    $(".tmbdtitle").append();
});
  </script>-->
 <!--<label>Description</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $descripton; ?>">

                                <span class="help-block"><?php echo $description_err;?></span>

                            </div>-->

    <input name="files" type="file" />
    File processed?
    <input type="checkbox" name="encoded" value="yes" />
    <hr>
    <p>Please add closed captions file (*.SRT, *.VTT) (optional - <font color=red>for VOD ONLY</font>)</p>
    <input name="subs" type="file" /><br>
  <input name="__submit__" type="submit" value="Upload" />
<div id="progress-wrp"><div class="progress-bar"></div ><div class="status">0%</div></div>
    <div id="output"><!-- error or success results --></div>
 <!-- <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>-->
  <h3 id="status"></h3>
  <p id="loaded_n_total"></p>
</form>
</body>
</html>

