<?php
include("../Includes/db.php");
//session_start();
include("../Functions/functions.php");
?>


<!-- ================================================================================================================================================================================== --> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TechFarm Nexus </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
          rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlF5r5u5f5f5u5s5a5h5i5r5i5h5u5m5n5a5n5g5T5I5T5T5Y5N5"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/c32adfdcda.js" crossorigin="anonymous"></script>
    <style>
      /* Header styles */
      .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #007bff; /* Header background color */
        padding: 10px 20px;
        color: white;
      }
  
      .logout-button {
        padding: 8px 16px;
        background-color: #1fcb1f; /* Button background color */
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        text-decoration: none;
        color: white;
      }
  
      .logout-button:hover {
        background-color: #21a9cfd7 /* Button background color on hover */
      }
  
      .techfarm {
        font-size: 24px;
        font-weight: bold;
        text-decoration: none;
        color: white;
      }
    
     
}



      
    </style>
  </head>
  <body>
    <div class="header">
      <a href="#" class="techfarm">TechFarm</a>
      <a href="logout.php" class="logout-button">Log out </a>
    </div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">TechFarm</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../../home.html">Home</a>
            </li>
           

              
              
              
              
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Features
              </a>
              <ul class="dropdown-menu dropdown-menu-dark">
               <li><a class="dropdown-item" href="#"  >Crop Recommendation</a></li>
                <li><a class="dropdown-item" href="../../weather.html">Weather Prediction</a></li>
                <li><a class="dropdown-item" href="../../mandi_market.html" >Mandi Market Price</a></li>
                <li><a class="dropdown-item" href="#">Soil Testing</a></li>
                <li><a class="dropdown-item" href="../../cultivation.html" >Cultivation Tips</a></li>
                <li><a class="dropdown-item" href="../../news.html" >News</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" >KRISHI MARKET</a></li>
                <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" >COMMUNITY</a></li>
              </ul>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   
    <!-- ================================================================================================================================================================================== -->
      
      
      


    


	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Farmer Login portal</title>
	<!-- <link rel="stylesheet" type="text/css" href="../Styles/FarmerLogin.css"> -->
	<script src="https://kit.fontawesome.com/c587fc1763.js" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<a href="https://icons8.com/icon/83325/roman-soldier"></a>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src="https://kit.fontawesome.com/c587fc1763.js" crossorigin="anonymous"></script>
	<style>
		@import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);

		.myfooter {
			background-color: #292b2c;

			color: goldenrod;
			margin-top: 15px;
		}

		#a {
			text-align: center;
			font-size: 25px;
			border-style: solid;
			/*margin-border-top: 8%;*/
			margin-top: 10%;
			margin-left: 28%;
			margin-right: 20%;
			margin-bottom: 18%;
			max-width: 40%;
			min-width: 20%;
		}

		.aligncenter {
			text-align: center;
		}

		a {
			color: goldenrod;
		}

		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		nav {
			background-color: #292b2c;
		}

		.navbar-custom {
			background-color: #292b2c;
		}

		/* change the brand and text color */
		.navbar-custom .navbar-brand,
		.navbar-custom .navbar-text {
			background-color: #292b2c;
		}

		.navbar-custom .navbar-nav .nav-link {
			background-color: #292b2c;
		}

		.navbar-custom .nav-item.active .nav-link,
		.navbar-custom .nav-item:hover .nav-link {
			background-color: #292b2c;
		}


		.mybtn {
			border-color: green;
			border-style: solid;
		}


		.right {
			display: flex;
		}

		.left {
			display: none;
		}

		.cart {
			/* margin-left:10px; */
			margin-right: -9px;
		}

		.profile {
			margin-right: 2px;

		}

		.login {
			margin-right: -2px;
			margin-top: 12px;
			display: none;
		}

		.searchbox {
			width: 60%;
		}

		.lists {
			display: inline-block;
		}

		.moblists {
			display: none;
		}

		.logins {
			text-align: center;
			margin-right: -30%;
			margin-left: 35%;
		}

		body {
			margin: 0;
			font-size: .9rem;
			font-weight: 400;
			line-height: 1.6;
			color: #212529;
			text-align: left ! important;
			background-color: #f5f8fa;
			text-align: center;
			background-size: 100% 100%;

		}

		.my-form,
		.login-form {
			font-family: Raleway, sans-serif;
		}

		.my-form {
			padding-top: 1.5rem;
			padding-bottom: 1.5rem;
		}

		.my-form .row {
			margin-left: 0;
			margin-right: 0;
		}

		.login-form {
			padding-top: 1.5rem;
			padding-bottom: 1.5rem;
		}

		.login-form .row {
			margin-left: 0;
			margin-right: 0;
		}

		@media only screen and (min-device-width:320px) and (max-device-width:480px) {
			/* .mycarousel {
            display: none;
        }

        .firstimage {
            height: auto;
            width: 90%;
        }

        .card {
            width: 80%;
            margin-left: 10%;
            margin-right: 10%;

        }

        .col {
            margin-top: 20px;
        } */

			.right {
				display: none;
				background-color: #ff5500;
			}

			/* 
            .settings{
            margin-left:79%;
        } */
			.left {
				display: flex;
			}

			.moblogo {
				display: none;
			}

			.logins {
				text-align: center;
				margin-right: 35%;
				padding: 15px;
			}

			.searchbox {
				width: 95%;
				margin-right: 5%;
				margin-left: 0%;
			}

			.moblists {
				display: inline-block;
				text-align: center;
				width: 100%;
			}

			/* .pic{
        height:auto;
    } */

			/* .mobtext{
        display:none;
    }
    .destext{
        display:inline-block;
        width:90%;
        margin-left: 5%;
        margin-right: 5%;
    } */
		}
	</style>
</head>

<body>

	<main class="my-form">
		<div class="cotainer">
			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="card " >
						<div class="card-header text-left" style="background-color:#292b2c">
							<h4  style="font-style:bold;color:goldenrod;text-align:left">Login</h4>
						</div>
						<div class="card-body border border-dark">
							<form name="my-form" action="FarmerLogin.php" method="post">

								<div class="form-group row">
									<label for="phone_number" class="col-md-4 col-form-label text-md-right"><i class="fas fa-phone-alt mr-2"></i><b>Phone Number</b></label>
									<div class="col-md-6">
										<input type="text" id="phone_number" class="form-control border border-dark" name="phonenumber" placeholder="Phone Number" required>
									</div>
								</div>

								<div class="form-group row">
									<label for="p1" class="col-md-4 col-form-label text-md-right"><i class="fas fa-lock mr-2"></i><b>Password</b></label>
									<div class="col-md-6">
										<input id="p1" class="form-control border border-dark" type="password" name="password" placeholder="Password" required>
									</div>
								</div>

								<div class="col-md-6 offset-md-4">
									<button type="submit" class="btn btn-primary text-left border border-dark" style="background-color:#292b2c;color:goldenrod" name="login" value="Login">
										Login
									</button>
								</div>
								<br>
								<div class="col-md-6 offset-md-4">
									<label id="forgotPassword"  class="text-left"><a id='link' style="" href="FarmerForgotPassword.php"><b style="color:black ;text-align:left"> Forgot your password </b></a></label>
									<br>
									<label id="account" class="text-left"><a id='link' href="FarmerRegister.php"><b style="color:black"> Create New Account</b></a></label>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	
</body>

</html>

<?php
if (isset($_POST['login'])) {

	$phonenumber = mysqli_real_escape_string($con, $_POST['phonenumber']);
	$password = mysqli_real_escape_string($con, $_POST['password']);

	$ciphering = "AES-128-CTR";
	$iv_length = openssl_cipher_iv_length($ciphering);
	$options = 0;
	$encryption_iv = '2345678910111211';
	$encryption_key = "DE";
	$encryption = openssl_encrypt(
		$password,
		$ciphering,
		$encryption_key,
		$options,
		$encryption_iv
	);
	// echo $encryption;

	$query = "select * from farmerregistration where farmer_phone = '$phonenumber' and farmer_password = '$encryption'";
	echo $query;
	$run_query = mysqli_query($con, $query);
	$count_rows = mysqli_num_rows($run_query);
	if ($count_rows == 0) {
		echo "<script>alert('Please Enter Valid Details');</script>";
		echo "<script>window.open('FarmerLogin.php','_self')</script>";
	}
	while ($row = mysqli_fetch_array($run_query)) {
		$id = $row['farmer_id'];
	}

	$_SESSION['phonenumber'] = $phonenumber;
	echo "<script>window.open('../FarmerPortal/farmerHomepage.php','_self')</script>";
}

?>
<div id="footer-container"></div>
    
    <script>
        // Load the header
        $("#header-container").load("header.html", function () {
            // Header has been loaded
        });

        // Load the footer
        $("#footer-container").load("footer.html", function () {
            // Footer has been loaded
        });
    </script>
</body>
</html>