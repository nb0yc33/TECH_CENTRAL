<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>TECH_CENTRAL</title>

    <link href="https://fonts.googleapis.com/css?family=Dosis&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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

	form {
		width: 30%;

	}

	form input[type=text] {
  		padding: 3%;
  		border: 1px solid #141B41;
  		width: 75%;
  		float: left;
  		color: black;
	}

	form button {
  		width: 25%;
  		padding: 3%;
  		background: #141B41;
  		color: #98B9F2;
  		border: 1px solid #141B41;
  		border-left: none; 
  		cursor: pointer;
	}

	form button:hover {
  		background: white;
	}

    .active {
        background: #918EF4;
        color: #141B41;
    }

    #upload-details {
        padding: 2%;
        width: 100%;
        display: flex; 
        justify-content: space-around; 
		background-color: black;
    }

    #update-button {
        background-color: #306BAC;
    }

    #update-button:hover {
        background-color: white;
    }

    #upload {
        font-family: 'Dosis', sans-serif;
    }

    label {
        float: left;
    }

    .upload-form {
        height: 1em;
    }
    
    
    a:hover {
        text-decoration:none;
    }

    .active {
        background: #918EF4;
        color: #141B41;
		font-size: 1.2em;
		text-transform: uppercase;
    }

	.button {
		background-color: #306BAC;
		color: #98B9F2;
		border: none;
		padding: 0.4em;
		margin: 0 auto;
		display: block;
		margin: 10px 10px 10px 10px;
		font-size: 1.2em;
	}

	</style>

</head>
<body>

<div class="container">
	<div id="logo">
		<h1><a href="<?=site_url('home/dashboard');?>">TECH_CENTRAL</a></h1>
	</div>

    <nav class="navbar">
        <ul class="nav navbar-nav">
			<li> <a href="<?=site_url('home/profile');?>" class="active"><?php echo $username = $this->session->userdata('username'); ?></a> </li>
            <li><a href="<?=site_url('home/upload');?>">UPLOAD</a></li>
			<li><a href="<?=site_url('home/search');?>">SEARCH</a></li>        
		</ul>
    </nav>


    <section id="upload-details">
	    <form action="<?=site_url('users/update_email');?>" method="post"> 
            <label for="myprofile">MY_PROFILE: &nbsp;</label>
            <br> <br>
            <div id='username-line'>
				<label for="username">USERNAME &nbsp;</label>
                <p name="username"> <?php echo $username = $this->session->userdata('username'); ?> <br> <br>
            </div>
            <div id="email-line">
                <label for="currentemail">EMAIL &nbsp;</label>
                <p name="currentemail"> <?php echo $email = $this->session->userdata('email'); ?> <br> <br>                              
            </div>
            <div id="verification-line">
                <label for="verificationstatus">VERIFICATION_STATUS &nbsp;</label>
                <p name="verificationstatus"> <?php echo $status = $this->User_model->echo_verification_status(); ?><br> <br>                              
            </div>
            <br> <br>
            <label for="username">USERNAME &nbsp;</label>
                <input type="text" class="upload-form" name="username"/><br> <br> <br>
            <label for="email">NEW_EMAIL &nbsp;</label>
                <input type="text" class="upload-form" name="email"/><br> <br> 
            <input type="submit" name="submit" class="button" value="UPDATE_EMAIL"/>
            <input type="submit" name="submit" class="button" value="LOG_OUT"/>
        </form>
        <form action="<?=site_url('users/verify_account');?>" method="post">
			    <label for="verifycode">VERIFY_ACCOUNT</label> <br>
			    <input type="text" class="upload-form" name="verifycode"/><br/>
			    <br>
			<input type="submit" name="submit" class="button" value="VERIFY_ACCOUNT"> 
		</form>
    </section>  

</div>
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




</script>
</body>
</html>