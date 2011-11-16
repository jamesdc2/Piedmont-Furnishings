<!-- main ends -->	
		</div>
		
<?php

if( !isset($no_sidebar) ||  $no_sidebar == false)
{
		?>
		
<div id="sidebar">
			<h3>Search Box</h3>	
			<form action="#" class="searchform">
				<p>
				<input name="search_query" class="textbox" type="text" />
  				<input name="search" class="button" value="Search" type="submit" />
				</p>			
			</form>	
					
			<h3>Upcoming Events</h3>
			<ul class="sidemenu">
				<li><a href="<?php echo wp ?>index.php/welcome"><strong>Camping Trip</strong></a> <br /> We will be camping in the woods</li>
				<li><a href="<?php echo wp ?>index.php/welcome"><strong>Sales Conference</strong></a> <br /> Get ready to sell</li>
				<li><a href="<?php echo wp ?>index.php/welcome"><strong>Marketing Meeting</strong></a> <br />Talk about marketing to new business segments</li>
				<li><a href="<?php echo wp ?>index.php/welcome"><strong>Casual Friday</strong></a> <br /> Wear whatever you want</li>
			</ul>
				
			<h3>Top Salespeople</h3>
			<ul class="sidemenu">
				<li><a href="<?php echo wp ?>index.php/welcome"><strong>Bob Evans</strong></a> <br /> $120,000</li>
				<li><a href="<?php echo wp ?>index.php/welcome"><strong>Tina Fey</strong></a> <br /> $115,000</li>
				<li><a href="<?php echo wp ?>index.php/welcome"><strong>Vin Diesel</strong></a> <br />$80,000</li>
				<li><a href="<?php echo wp ?>index.php/welcome"><strong>Lady Gaga</strong></a> <br /> $79,000</li>			
			</ul>
				
			<h3>Words From The CEO</h3>
			<p>&quot;Do not limit yourself. Many people limit themselves to what they think they can do. You can go as far as your mind lets you. What you believe, remember, you can achieve.&quot; </p>
					
			<p class="align-right">- John Fenron</p>		
						
		<!-- sidebar ends -->		
		</div>
		<?php } ?>

</div>
		
	<!-- footer starts -->		
	<div id="footer-wrap">
	
		
		
		<div id="footer-bottom">		
			
			<p>
			&copy; 2009 <strong>VT</strong> | 
			Validate <a href="http://validator.w3.org/check?uri=referer">XHTML</a>
			 
			<a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | 
			
   		
			
		<a href="<?php echo wp ?>index.php/welcome">Home</a>
   		</p>		
			
		</div>
		
<!-- footer ends-->
</div>

<!-- wrap ends here -->
</div>

</body>
</html>