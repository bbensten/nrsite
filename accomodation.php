<!DOCTYPE HTML>
<!--
	Helios by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title></title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/jquery.scrolly.min.js"></script>
		<script src="js/jquery.onvisible.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/jquery-ui.min.js"></script>
		<script src="js/property-feed.js"></script>
		<script src="js/init.js"></script>
		
		 <script>
		<?php if(isset($_REQUEST['locid'])){?>
		var locid = <?php echo $_REQUEST['locid'];?>;
		<?php } else { ?>
		var locid ='';
		<?php } ?>
		$(document).ready(function(){
		$.getJSON('https://nres.naturalretreats.com/rest/ews/getlocations?p_site=1&p_key=TASD234DFH', function (data) {
		 
			$.each(data.locationdata, function (key, val) {
					if(val.locationid == locid){			
					$('#selLocation').append('<option  value="'+val.locationid+'" selected="selected">'+val.locationname+'</option>');
					}
					else{
					$('#selLocation').append('<option  value="'+val.locationid+'" >'+val.locationname+'</option>');
					}
				});

			});
		
				searchProperties();
			});
		
		
			$(document).on('click','#edit-filter-submit',function(e){
				searchProperties();
			});
			
			
		
			
			$(function() {
			$( "#datepicker" ).datepicker();
			$( "#datepicker" ).datepicker( "option", "dateFormat", "dd-M-y" );
		  });
		  
		</script>
		
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
			<link rel="stylesheet" href="css/style-noscript.css" />
		</noscript>
				<link rel="stylesheet" href="css/kmp.css" />
			<link rel="stylesheet" href="css/bootstrap.css" />
			<link rel="stylesheet" href="css/override.css" />
			<link rel="stylesheet" href="css/properties.css" />
			<link rel="stylesheet" href="css/jquery-ui.min.css">
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body class="left-sidebar">

		<!-- Header -->
			<div id="header">

				<!-- Inner -->
					<div class="inner">
						<header>
							<h1><a href="index.php" id="logo"><img src="images/logo.png"></a></h1>
							<hr>
             
						</header>
					</div>
				
		

	<!-- Nav -->
					<nav id="nav">
						
					</nav>


			</div>
			
			
			
	

<div ><div class="col-xs-12 activities-filter"><div class="heading heading--primary heading--quick-booking">Find your perfect property</div><div class="container">

<form accept-charset="UTF-8" id="nr-meta-form-accommodation" method="GET" action="#"><div>
<div class="col-sm-3"><label>Location</label><div class="activities-filter__options"><div class="form-type-select form-item-price form-item form-group">
 <select id="selLocation" name="" class="form-control form-select"  >
						
						<?php if(isset($_REQUEST['locid'])){?>
							<option value="<?php echo $_REQUEST['locid'];?>" >Any</option>
							<?php } else { ?>
							<option value="" >Any</option>
							<?php } ?>
					  </select>
</div>
</div></div>

<div class="col-sm-3"><label>Bedrooms (min)</label><div class="activities-filter__options"><div class="form-type-select form-item-bedrooms form-item form-group">
 <select name="bedrooms" id="edit-bedrooms" class="form-control form-select"><option selected="selected" value="">Any</option><option value="0">1</option><option value="1">2</option><option value="2">3</option><option value="3">4</option><option value="4">5</option><option value="5">6</option><option value="6">7</option><option value="7">8</option><option value="8">9</option><option value="9">10</option><option value="10">11</option><option value="11">12</option><option value="12">13</option><option value="13">14</option></select>
</div>
</div></div>
<div class="col-sm-3"><label>Availability</label><div class="activities-filter__options"><div class="form-type-textfield form-item-check-in-date form-item form-group">
<input id="datepicker" class="form-control form-text jquery-once-2-processed" style="background-color:#fff;" type="text" maxlength="128" size="60" value="" name="check_in" readonly="readonly" placeholder="Pick a date">
</div>
</div></div>

<div class="col-sm-3"><div class="activities-filter__subtitle"><br></div><input type="button" value="Filter" name="op" id="edit-filter-submit" class="button form-submit">
</div><input type="hidden" value="form-hv_wQTQoPS-SvJzRNrcir-ldcQegbzLFn58O_6Y-vto" name="form_build_id">
<input type="hidden" value="nr_meta_form_accommodation" name="form_id">
</div></form></div></div></div>
			
		<!-- Main -->
			<div class="wrapper style1">

				<div class="container">
					<div >
						
						
					<!-- list of properties-->
					<main>
						<div id="searchContainer">
							<div id="searchResults" class="" >
								
								<div id="resultsHeader"><div class="container-fluid"><div class="searchText" id="resultsTextContainer"><div class="searchResultsText"><h1><span>Displaying</span> <span id="resultsNumber"></span> <span> hand picked homes in your search</span> <span id="resultText"> </span></h1></div><div class="searchLoadingText"><img src="images/img/bx-loader.gif"> <span>Updating your search results</span></div></div></div></div>
								
								<div  class="row-spc-30" id="resultsList">
								
									<div class="col-sm-1 listView" style="width: 100%;" id="propertyList">

									</div>
								<div id="resultLoading" style="display:none;"><img src="images/img/bx-loader.gif"></div>	
							</div>
						</div>
				

				</div>
				<!-- End of Search Results -->



			</div>
					</main>					
					<!-- end list -->

						
							
						
					</div>
										
				</div>

			</div>

			
		  <!-- Features -->


			 <!-- Features -->

			<?php /* ?>
			<div class="wrapper style1">
				
				<section id="features" class="container special">
					<header>
						<h2>Featured Properties</h2>
						<p></p>
					</header>
					<!--<div class="row" id="nr_featured">
						
					</div>-->
                    
				</section>    
			 
			
			<!-- Carousel -->
			
				
				<section class="carousel" >
					
					<div class="reel" id="nr_slider">
					
					</div>
                    
				</section>    
			</div>
			<?php */ ?>
			
			

<?php include('footer.php');?>