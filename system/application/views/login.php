

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<meta name="Description" content="Information architecture, Web Design, Web Standards." />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Distribution" content="Global" />
<meta name="Author" content="Jeff Brabant and James Cline" />


<link rel="stylesheet" href="<?php echo $wp?>css/Outdoor.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $wp?>css/datatable.css" type="text/css" />


<style type="text/css">
body {
	margin:0;
	padding:0;
}
#content-wrap{
	background: #ffffff;
}
#header-photo{
	height: 216px;
	margin-left: 15px;
	margin-right: 0px;
	margin-top: 0px;
	margin-bottom: 0px;
	background: #ffffff;
}
.postmeta{
	margin: 0px;
}
</style>

<title>Piedmont Furnishings</title>



</head>
<body class="yui-skin-sam">

<!-- wrap starts here -->
<div id="wrap">




	<!--header -->
	<div id="header">			
				
		<h1 id="logo-text"><a href="<?php echo $wp?>index.php/welcome" title="">Piedmont Furnishings</a></h1>		
		<p id="slogan">Handmade Furniture from High Point, North Carolina</p>				
		
	<!--header ends-->					
	</div>

	
	<div id="header-photo"><img src="<?php echo $wp?>images/header-photo.jpg" width="870" height="206" alt="header-photo" /></div>	
	
				
			
	<!-- content-wrap starts -->
	<div id="content-wrap">
	<div style="text-align: center">
	<h2 style="margin-top: 20px;" >Please Enter Login Information</h2>	
	</div>
	
	<form method="post" action="<?php echo $wp?>index.php/login/start" style="width: 220px; margin-bottom: 40px; margin-left: auto; margin-right: auto;">
		<div style="padding-left: 10px; padding-top:10px; padding-bottom: 10px; padding-right: 10px">
			<label>Username</label>
			<input type="text" size="20" value="" name="username"/>
			<label>Password</label>
			<input type="password" size="20" value="" name="password"/>
			<br />
			
			
			<?php
			
			if($num_tries > 0)
			{	
				
				if($num_tries >=3)
				{
					echo '<div class="postmeta" style="color: red; margin-top: 10px">No more attempts may be made</div>';
				}
				else
				{
					echo '<div class="postmeta" style="color: red; margin-top: 10px" >Failed attempts = '.$num_tries.' (out of 3)</div>';
				}
			}
			?>
			
			
			<input type="hidden" name="num_tries" value="<?php echo $num_tries ?>" />
			
			<?php
				if($num_tries < 3)
				{
					echo '<input style="margin-top: 20px; margin-left: 20px" class="button" type="submit" value="Submit"/>';
				}
			?>
			
		</div>
		
	</form>
	



</div>
		
	<!-- footer starts -->		
	<div id="footer-wrap">

	
		
		
		<div id="footer-bottom">		
			
			<p>
			&copy; 2009 <strong>VT</strong> | 
			Validate <a href="http://validator.w3.org/check?uri=referer">XHTML</a>
			 
			<a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | 
			
   		
			
		<a href="#">Home</a>

   		</p>		
			
		</div>
		
<!-- footer ends-->
</div>

<!-- wrap ends here -->
</div>

</body>
</html>