
		jQuery(document).ready(function(){
			var url="../nrsite/proxy-php/data-feed.php";
			jQuery.getJSON(url,function(json){
                     jQuery.each(json.tagdata,function(i,tagdata){
						alert(tagdata); 
					});
					                // loop through the posts here
			});
		});
