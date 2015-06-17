<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

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
		<script src="js/custom-feed.js"></script>
		<script src="js/init.js"></script>
		<script>
		var pageid=1;
		<?php if(isset($pageid)){?>
			pageid=<?php echo $pageid;?>;
		<?php } ?>
		$(document).ready(function()
	{
		$.getJSON('https://nres.naturalretreats.com/rest/ews/gettagdata?p_site=1&p_key=TASD234DFH', function (data) {
 
		 $.each(data, function (key, val) {
			 		
				if(val.tagname == "Banner" && val.pagename == "Home"){
				  var val2 = val.tagdata[0];
					//console.log(val2);
					$('#header').css("background", "url("+val2.tagcontent+") no-repeat");
					
				 }
			});
		
		});
		});
	
		</script>		
		
				<link rel="stylesheet" href="css/kmp.css" />
				<link rel="stylesheet" href="css/properties.css" />
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
            <link rel="stylesheet" href="css/main.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
			<link rel="stylesheet" href="css/style-noscript.css" />
           
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
        <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/es5-shim/4.0.5/es5-shim.min.js"></script>
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
			