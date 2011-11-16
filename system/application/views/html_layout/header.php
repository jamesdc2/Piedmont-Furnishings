<?php


$this->load->library('session');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

	
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<meta name="Description" content="Information architecture, Web Design, Web Standards." />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Distribution" content="Global" />
<meta name="Author" content="Jeff Brabant and James Cline" />


<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.0r4/build/button/assets/skins/sam/button.css" />
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.0r4/build/container/assets/skins/sam/container.css" />
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.0r4/build/calendar/assets/skins/sam/calendar.css" />

<link rel="stylesheet" href="<?php echo wp ?>css/Outdoor.css" type="text/css" />
<link rel="stylesheet" href="<?php echo wp ?>css/datatable.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/fonts/fonts-min.css" />
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/paginator/assets/skins/sam/paginator.css" />





<style type="text/css">
body {
	margin:0;
	padding:0;
}
</style>

<?php

if( isset($no_sidebar) )
{

	if($no_sidebar == true)
	{
		?>
	<style type="text/css">
		<!--
		#main{
			width: 100%;
		}
		-->
	</style>

<?php
	}
}

?>


<script type="text/javascript">
	var webRoot = '<?php echo wp ?>';
</script>


<script src="<?php echo wp ?>js/jquery.js" type="text/javascript"></script>
<script src="<?php echo wp ?>js/jquery-form.js" type="text/javascript"></script>

<script type="text/javascript" src="http://yui.yahooapis.com/2.7.0/build/yahoo-dom-event/yahoo-dom-event.js"></script>
<script type="text/javascript" src="http://yui.yahooapis.com/2.7.0/build/connection/connection-min.js"></script>
<script type="text/javascript" src="http://yui.yahooapis.com/2.7.0/build/json/json-min.js"></script>
<script type="text/javascript" src="http://yui.yahooapis.com/2.7.0/build/element/element-min.js"></script>
<script type="text/javascript" src="http://yui.yahooapis.com/2.7.0/build/datasource/datasource-min.js"></script>
<script type="text/javascript" src="http://yui.yahooapis.com/2.7.0/build/datatable/datatable-min.js"></script>
<script type="text/javascript" src="http://yui.yahooapis.com/2.7.0/build/paginator/paginator-min.js"></script>


<script type="text/javascript" src="<?php echo wp ?>js/header.js"></script>


<title>Piedmont Furnishings</title>






</head>
<body class="yui-skin-sam">

<!-- wrap starts here -->
<div id="wrap">

<div id="users-dd" class="dropdown">
<a id="new_user" href="#" onclick="return false;">New Customer</a>
<a id="edit_user" href="#" onclick="return false;">Edit Customer</a>
</div>

<div id="orders-dd" class="dropdown">
<a href="<?php echo wp ?>index.php/orders/create">Create Order</a>
<a href="<?php echo wp ?>index.php/orders/search">Edit Order</a>
</div>

<div id="reports-dd" class="dropdown">
<a href="<?php echo wp ?>index.php/reports/sales?start=true">Sales</a>
<a href="<?php echo wp ?>index.php/reports/performance?start=true">Performance</a>
</div>

<div style="position: absolute" id="panel-wrapper" >
                    <div class="panel-1">
                        <div class="panel-contents">
							<h3 style="float:left;" >Add Customer:</h3>
							<p id="close_add_user_form" style="float: right">Click here to close the form</p>
	                         <form class="customer_new_form clear" action="<?php echo wp ?>index.php/customers/add" method="post">
	                         	<div class="form-padding">
	                         		<label class="line-below">Company Information</label>
	                         		<table border="0" cellpadding="0" cellspacing="0" >
	                         			<tr>
	                         				<td><label>Region:</label></td>
											<td>
												<select name="use_region_id">
													<option value="1">North East</option>
													<option value="2">South East</option>
													<option value="3">Midwest</option>
													<option value="4">South West</option>
													<option value="5">North West</option>
													<option value="6">International</option>
												</select>
											</td>
	                         			</tr>
										<tr>
	                         				<td><label>Company Name:</label></td><td><input type="text" name="use_cust_company" size="25" /></td>
	                         			</tr>
	                         		</table>
	                              
								  <label style="margin-top: 15px; padding-left: 10px; width: 250px; border-bottom-style: solid; border-bottom-color: black; border-bottom-width: 1px;">Contact Information</label>
	                              <br />
								  
								  <table border="0" cellpadding="0" cellspacing="0" >
	                         			<tr>
	                         				<td><label>Last Name:</label></td><td><input type="text" name="use_cust_lname" size="13" /></td>
	                         				<td><label>First Name:</label></td><td><input type="text" name="use_cust_fname" size="13" /></td>
	                         			</tr>
										<tr >
											<td colspan="4"><label>Street Address:</label></td>
										</tr>
										<tr>
											<td colspan="4"><textarea style="width: 100%; height: 50px" name="use_cust_address" rows="3" cols="3"></textarea></td>
										</tr>
										<tr>
											<td class="oneline" colspan="4"><label>City:</label><input type="text" name="use_cust_city" size="16" />
											<label>State:</label><input type="text" name="use_cust_state" style="width: 20px" size="1" />
											<label>Zip:</label><input type="text" name="use_cust_zip" size="2" /></td>
										</tr>
										<tr>
											<td class="oneline" colspan="4"><label>Phone:</label><input type="text" name="use_cust_phone" size="16" />
											<label>Fax:</label><input type="text" name="use_cust_fax" size="16" /></td>
										</tr>
										<tr>
											<td class="oneline" colspan="4"><label>Email:</label><input type="text" name="use_cust_email" size="23" /></td>
										</tr>
	                         		</table>
								  
	                              <input style="margin-top: 10px;" onclick="return false;" class="button submit_customer_new_form" type="submit" value="Create Customer" />
								  </div>
	                         </form>
                    	</div>
					</div>
</div>


<div style="position: absolute" id="panel-wrapper2" >
                    <div class="panel-2">
                        <div class="panel2-contents">
							
	                         <form class="clear search_customer_form" action="#" method="post">
	                         	<div class="form-padding">
	                         		
	                         		<h3 class="line-below" style="float:left;" >Find a Customer to Edit</h3>
									<p id="close_panel_2" style="float: right">Click here to close</p>
									<div class="clear" style="height:12px"></div>
									<div style="margin-bottom: 7px;" class="clear">Use the following fields to search for a customer to edit.  The search will be a partial text search, so putting "a" in the First Name field will return all customers with "a" in their first name.  Then choose the customer you want to edit and click edit. </div>
									<table style="margin-top: 5px" border="0" cellpadding="0" cellspacing="0" >
										<tr>
											<td><label>Region:</label></td>
											<td>
												<select name="region_id">
													<option selected="selected" value="">All</option>
													<option value="1">North East</option>
													<option value="2">South East</option>
													<option value="3">Midwest</option>
													<option value="4">South West</option>
													<option value="5">North West</option>
													<option value="6">International</option>
												</select>
											</td>
											<td><label>Company Name:</label></td><td><input type="text" name="cust_company" size="25" /></td>
										</tr>
	                         			<tr>
	                         				<td><label>Last Name:</label></td><td><input type="text" name="cust_lname" size="13" /></td>
	                         				<td><label>First Name:</label></td><td><input type="text" name="cust_fname" size="13" /></td>
	                         			</tr>
											
										<tr>
											<td class="oneline" colspan="4"><label>City:</label><input type="text" name="cust_city" size="16" />
											<label>State:</label><input style="width:23px;" type="text" name="cust_state" size="1" />
											<label>Zip:</label><input type="text" name="cust_zip" size="5" /></td>
										</tr>
										<tr>
											<td class="oneline" colspan="4"><label>Email:</label><input type="text" name="cust_email" size="23" /></td>
										</tr>
	                         		</table>
									<div style="text-align: center"><input class="button" id="search_search" type="submit" onclick="return false;" value="Search" />&nbsp;<input class="button" id="search_search_all" type="submit" onclick="return false;" value="View All" /></div>
									
									<h3 class="line-below" style="margin-bottom:20px">Search Results</h3>
									<div id="search_user"></div>
									<div style="text-align: center"><input class="button" id="search_edit" type="submit" onclick="return false;" value="Edit Selected Customer" /></div>
									<br />
								  </div>
	                         </form>
                    	</div>
					</div>
</div>


	<!--header -->
	<div id="header">			
				
		<h1 id="logo-text"><a href="<?php echo wp ?>index.php/welcome" title="">Piedmont Furnishings</a></h1>		
		<p id="slogan">Handmade Furniture from High Point, North Carolina</p>
		<p id="session" style="margin-left: 650px; font-size:0.8em;">Currently logged in as: <?php echo $this->session->userdata['emp_fname'] . ' ' . $this->session->userdata['emp_lname']; ?></p>				
		
	<!--header ends-->					
	</div>
	
	<div id="header-photo"><img src="<?php echo wp ?>images/header-photo.jpg" width="870" height="206" alt="header-photo" /></div>	
	
	<!-- navigation starts-->	
	<div  id="nav">
		<ul>
			<li id="current"><a href="<?php echo wp ?>index.php/welcome">Home</a></li>
			<li class="dd1" ><a href="<?php echo wp ?>index.php/welcome">Customers</a></li>
			<li class="dd2" ><a href="<?php echo wp ?>index.php/welcome">Orders</a></li>
			<li class="dd3" ><a href="#">Reports</a></li>
			<li><a href="<?php echo wp ?>index.php/support">Support</a></li>	
			<li><a href="<?php echo wp ?>index.php/login/logout">Logout</a></li>
		</ul>
	<!-- navigation ends-->	
	</div>					
			
	<!-- content-wrap starts -->
	<div id="content-wrap">
		<div id="main">
