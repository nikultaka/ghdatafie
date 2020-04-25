<?php
 session_start();
 include 'include/config.php';
 include 'include/functions.php';
?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>GHDATAFIE</title>
	<!-- Meta Tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- // Meta Tags -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
	<!--testimonial flexslider-->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!--fonts-->
	<link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Raleway:300,400,500,600,800" rel="stylesheet">
	<!--//fonts-->

</head>

<body>
	<!--Header-->
	<div class="header">
	<?php include_once('header.php');?>
    <?php include_once('slider.php');?>
		
	</div>
	<!--//Header-->
	<!-- services -->
	<div class="w3-agile-services">
		<div class="container">
			<h3 class="title-txt">Get Started </h3>
            <p>Search Over 133 Datasets In 25 Agencies</p>
            
            <div class="search_bar">
            	<form>
                	<input type="text" placeholder="Enter Search Here">
                    <input type="submit" value="Search" >
                </form>
            </div>
            
		<div class="agileits-services">
				<div class="services-right-grids">
				<a href="#">	<div class="col-md-2 services-right-grid services_div">
						<div class="se-top">
							<div class="services-icon">
								<img src="images/icon1.png">
							</div>
							<div class="services-icon-info">
								<h5>Reporting & Data Provisioning</h5>
								</div>
						</div>
					</div></a>
                    
                         <a href="#">  <div class="col-md-2 services-right-grid services_div">
						<div class="se-top">
							<div class="services-icon">
								<img src="images/icon2.png">
							</div>
							<div class="services-icon-info">
								<h5>Dashboarding & Decision Support</h5>
								</div>
						</div>
					</div></a>
                    
                        <a href="#">   <div class="col-md-2 services-right-grid services_div">
						<div class="se-top">
							<div class="services-icon">
								<img src="images/icon3.png">
							</div>
							<div class="services-icon-info">
								<h5>Data Science & Mining </h5>
								</div>
						</div>
					</div></a>
                    
                   <a href="#"> <div class="col-md-2 services-right-grid services_div">
						<div class="se-top">
							<div class="services-icon">
								<img src="images/icon4.png">
							</div>
							<div class="services-icon-info">
								<h5>Data Warehouse Optimisation </h5>
								</div>
						</div>
					</div></a>
                    
                   <a href="#"> <div class="col-md-2 services-right-grid services_div">
						<div class="se-top">
							<div class="services-icon">
								<img src="images/icon5.png">
							</div>
							<div class="services-icon-info">
								<h5>Business Intelligence & Analytics </h5>
								</div>
						</div>
					</div></a>
                    
					
					
					<div class="clearfix"> </div>
				</div>
				
			</div>
		</div>
	</div>
	<!-- //services -->
 <?php include_once('footer.php');?>

</body>

</html>