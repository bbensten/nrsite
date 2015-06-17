				
		<?php include('header.php');?>				
		<script>
		 var locid='';
		 <?php if(isset($_REQUEST['locid'])){?>
		 locid = <?php echo $_REQUEST['locid'];?>;
		 <?php } ?>
		 if(locid != ''){

			$.ajax({
				url: "proxy-php/location-search.php?locid="+locid,
				cache: false,
				dataType: "json",
				complete: function(data) {
										 
				 var data2=data.responseJSON;
				 //console.log(data2);
				 var val=data2.categorydata[0];	
						//console.log(val);				
						if(val.images.length > 0){
							var imgpath  = val.images[0].url;
							}
							else{
							var imgpath  = '';
							}
									
						
						$('#propertyList').append('<div  class="villa" id="H-'+val.categoryid+'">         <div class="villaImageContainer">             <a href="booking.php?pid='+val.categoryid+'" id="villaLinkImage'+val.categoryid+'" class="villaLink villaLinkImage">                           <img alt="" style="" src="'+imgpath+'" >                            <div class="villaPromo "></div>                      </a> </div>                    <div class="villaDescription">                        <h3 itemprop="name"><a href="booking.php?pid='+val.categoryid+'" class="villaLink villaLinkTitle">'+val.categoryname.substr(0,20)+'</a></h3>                         <a href="booking.php?pid='+val.categoryid+'" class="villaLink viewVillaButton button small buttonPrimary" >VIEW HOME</a>                    </div>               </div>');
				}
			});
		}
		
		
		</script>		
		<!-- Main -->
			<div class="wrapper style1">

				<div class="container">
					<div class="row 200%">
						<?php include('sidebar.php');?>
						<div class="8u important(collapse)" id="content">
							<article id="main">
								<header id="banner_title">
									<h2><a href="#">Page Title</a></h2>
						
								</header>
															
								<section id="nr_summary">
									
								</section>
								<div id="searchContainer">
							<div id="searchResults" class="" >
								
								<div id="resultsHeader"><div class="container-fluid"><div class="searchText" id="resultsTextContainer"><div class="searchResultsText"><h1><span>Displaying</span> <span id="resultsNumber"></span> <span> hand picked homes in your search</span> <span id="resultText"> </span></h1></div></div></div></div>
								
								<div  class="row-spc-30" id="resultsList">
								
									<div class="col-sm-1 listView" style="width: 100%;" id="propertyList">

									</div>
								<div id="resultLoading" style="display:none;"><img src="images/img/bx-loader.gif"></div>	
							</div>
						</div>
				

				</div>
							</article>
						</div>
					</div>
					
				</div>

			</div>
			
		<?php include('footer.php');?>	