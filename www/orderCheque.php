<?php session_start();
include 'capchaClass.php';
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>E-Banking System</title>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <link rel="stylesheet" href="css/captchaStyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800,900&display=swap" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js?render=6LeR_f4UAAAAALkSnm6Bg6YidmlssS9XCW8hzUOu"></script>
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/loginStyle.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/registrationStyle.css">
    
  </head>
  <body>
	  <div class="bg-top navbar-light">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-center align-items-stretch">
    			<div class="col-md-4 d-flex align-items-center py-4">
    				<a class="navbar-brand" href="index.html">E-Banking System</a>
    			</div>
	    		<div class="col-lg-8 d-block">
		    		<div class="row d-flex">
					    <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4">
					    	<div class="icon d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
					    	<div class="text">
					    		<span>Email</span>
						    	<span>youremail@email.com</span>
						    </div>
					    </div>
					    <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4">
					    	<div class="icon d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <div class="text">
						    	<span>Call</span>
						    	<span>Call Us: + 1235 2355 98</span>
						    </div>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container d-flex align-items-center">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <form action="#" class="searchform order-lg-last">
          <div class="form-group d-flex">
          <ul class="navbar-nav mr-auto">
	          <li class="nav-item active"><a href="logout.php" class="nav-link">Logout</a></li>
	        </ul>
          </div>
        </form>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav mr-auto">
			<li class="nav-item"><a href="dashBoard.php" class="nav-link pl-0">DashBoard</a></li>
	        	<li class="nav-item"><a href="checkBalance.php" class="nav-link">Check balance</a></li>
            <li class="nav-item"><a href="transaction.php" class="nav-link">Transaction</a></li>
            <li class="nav-item"><a href="statment.php" class="nav-link">Statements</a></li>
            <li class="nav-item"><a href="" class="nav-link">Acoount Setting</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    
    <!-- END nav -->
    
    

    <section class="ftco-section contact-section">
      <div class="container">
      <?php
            if(isset($_SESSION["error"])){
              
              echo $_SESSION["error"];
              unset($_SESSION['error']);
            }
            if(isset($_SESSION["successfully"])){
              
              echo $_SESSION["successfully"];
              unset($_SESSION['successfully']);
            }
            if(isset($_SESSION["ChequeBookRequest"])){
              
              echo $_SESSION["ChequeBookRequest"];
              unset($_SESSION['ChequeBookRequest']);
            }
          ?>
        <div class="row d-flex mb-5 contact-info justify-content-center">
        <div class="signup-form">
    <form action="orderback.php" method="POST">
		<h2>Order Details</h2>
		<p class="hint-text">order your cheque book  and get as soon as possible from your branch .</p>
        <div class="form-group">
        <label> <b>Account Title of the person from DB</b>  </label>
        </div>
              
      <div class="form-group">
      <select class="form-control" id="pages" name="pages">
               <option value = "0">Select Number of Pages</option>
               <option value = "10">10</option>
               <option value = "20">20</option>
               <option value = "30">30</option>
               <option value = "40">40</option>
               <option value = "50">50</option>
             </select>
      </div> 
        <div class="form-group">
        <div class="g-recaptcha" data-sitekey="6LdnkP4UAAAAACLhWaM4Dr8SvbZFUGNSpekjKj1E"></div>
        </div> 
        <div class="form-group">
          <div class="status">
          </div>
        </div>
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">Request Now</button>
        </div>
    </form>
</div>

      </div>
    </section>


		
    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Bahria Univeristy Karachi Campus</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 0000000000000</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@xyz.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5">
              <h2 class="ftco-heading-2">Recent</h2>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Last Date</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> June 27, 2019</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-5 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Date</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> June 27, 2019</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5 ml-md-4">
              <h2 class="ftco-heading-2">Links</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Home</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>About</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Services</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Projects</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2 mb-0">Connect With Us</h2>
            	<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

          <p>
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="https://geekwarehouse.org" target="_blank">Geekwarehouse</a>
  </p>
          </div>
        </div>
      </div>
    </footer>	
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  
  <script>
grecaptcha.ready(function() {
    grecaptcha.execute('6LdnkP4UAAAAACLhWaM4Dr8SvbZFUGNSpekjKj1E', {action: 'homepage'}).then(function(token) {
       ...
    });
});
</script>
  </body>
</html>