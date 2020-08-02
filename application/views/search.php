<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>TECH_CENTRAL</title>

    <link href="https://fonts.googleapis.com/css?family=Dosis&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #141B41;
		font-family: 'Dosis', sans-serif;
		color: #98B9F2;
		font-size: 14px;
	}

	h1 {
		font-size: 5em;
        padding-bottom: 0.2em;
        padding-top: 0.2em;
	}

	.container {
		display: flex;
		flex-direction: column;
		justify-content: center;
		align-items: center;
	}
	
    .navbar {
	    background-color: #306BAC;
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
    } 

    a {
        color: #98B9F2;
        font-size: 1.1em;
    }

	#search {
  		float:left;
  		color: black;
        width: 25%;
	}


	.username {
		color: white;
		font-size: 1.2em;
		text-transform: uppercase;
	}

	a:hover {
        text-decoration:none;
    }

	#sodium_crypto_sign_verify_detached-area {
		text-align: center;

	}

	h2 {
		text-transform:uppercase;
	}

	h3 {
		text-transform:uppercase;	
	}

	
	.result-container {
		background-color: black;
		width: 60vw;
		margin: auto;
		padding-left: 1em;
		padding-right: 1em;
		
	}

	</style>



	<script>
		$(function(){
			
			function timeChecker(){
				setInterval(function(){
					var storedTimeStamp = sessionStorage.getItem("lastTimeStamp");
					timeCompare(storedTimeStamp);
				},3000);
			}

			function timeCompare(timeString){
				var currentTime = new Date();
				var pastTime = new Date(timeString);
				var timeDiff = currentTime - pastTime;
				var minPast = Math.floor((timeDiff/60000));


				if(minPast > 15){
					sessionStorage.removeItem("lastTimeStamp");
					window.location = "./force_logout";
				} else {

				}

			}

			$(document).mousemove(function(){
				var timeStamp = new Date();
				sessionStorage.setItem("lastTimeStamp", timeStamp);
			
			});

			timeChecker();
		});

        $(document).ready(function(){

            load_data();

            function load_data(query) {
                $.ajax({
                    url:"<?php echo base_url(); ?>search/fetch",
                    method:"POST",
                    data:{query:query},
                    success:function(data){
                        $('#result').html(data);
                    }
                })
            }

            $('#search_text').keyup(function(){
                var search = $(this).val();
                if(search != ''){
                    load_data(search);
                } else {
                    load_data();
                }
            });
        });

	</script>


</head>
<body>

<div class="container">
	<div id="logo">
		<h1><a href="<?=site_url('home/dashboard');?>">TECH_CENTRAL</a></h1>
	</div>

    <nav class="navbar">
        <ul class="nav navbar-nav">
			<li> <a href="<?=site_url('home/profile');?>" class="username"> <?php echo $username = $this->session->userdata('username'); ?></a> </li>
			<li><a href="<?=site_url('home/upload');?>">UPLOAD</a></li>
			<li><a href="<?=site_url('home/search');?>">SEARCH</a></li>           
        </ul>
    </nav>
</div>


<div class="result-container">
   <br />
   <br />
   <br />
   <div class="form-group">
    <div class="input-group">
     <span class="input-group-addon">SEARCH</span>
     <input type="text" name="search_text" id="search_text" placeholder="SEARCH_FOR_VIDEO" class="form-control" />
    </div>
   </div>
   <br />
   <div id="result"></div>
  </div>
  <div style="clear:both"></div>
  <br />
  <br />
  <br />
  <br />

</body>

</html>

