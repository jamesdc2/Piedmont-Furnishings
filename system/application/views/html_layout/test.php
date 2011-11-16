<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<meta name="Description" content="Information architecture, Web Design, Web Standards." />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Distribution" content="Global" />
<meta name="Author" content="Jeff Brabant and James Cline" />


<link rel="stylesheet" href="/css/Outdoor.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/datatable/assets/skins/sam/datatable.css" />
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/fonts/fonts-min.css" />



<script src="/js/jquery.js" type="text/javascript"></script>

<script type="text/javascript" src="http://yui.yahooapis.com/2.7.0/build/yahoo-dom-event/yahoo-dom-event.js"></script>
<script type="text/javascript" src="http://yui.yahooapis.com/2.7.0/build/connection/connection-min.js"></script>
<script type="text/javascript" src="http://yui.yahooapis.com/2.7.0/build/json/json-min.js"></script>
<script type="text/javascript" src="http://yui.yahooapis.com/2.7.0/build/element/element-min.js"></script>
<script type="text/javascript" src="http://yui.yahooapis.com/2.7.0/build/datasource/datasource-min.js"></script>
<script type="text/javascript" src="http://yui.yahooapis.com/2.7.0/build/datatable/datatable-min.js"></script>




<title>Piedmont Furnishings</title>


<script type="text/javascript">
	
	
	
	function slideUp(id)
	{
		if($(id).hasClass("stayDown") == false)
		{
			$(id).slideUp("fast");
		}
	}
	
	$(document).ready(function(){
	
	$("#users-dd").hide();
	$("#orders-dd").hide();
	$("#reports-dd").hide();
	$("div.panel-1").hide();
	
	//Users Drop Down
	$('.dd1').mouseenter(function(){
		$("#users-dd").slideDown("fast");
		$("#users-dd").addClass("stayDown");
	});
	
	$('.dd1').mouseleave(function(){
		
		setTimeout ( "slideUp('#users-dd')", 100 );
		$("#users-dd").removeClass("stayDown");

	});
	
	$("#users-dd").mouseleave(function(){
		setTimeout ( "slideUp('#users-dd')", 100 );
		$("#users-dd").removeClass("stayDown");
			
	});
	
	$("#users-dd").mouseenter(function(){
			$("#users-dd").addClass("stayDown");
	});
	
	
	//Orders Drop Down
	$('.dd2').mouseenter(function(){
		$("#orders-dd").slideDown("fast");
		$("#orders-dd").addClass("stayDown");
	});
	
	$('.dd2').mouseleave(function(){
		
		setTimeout ( "slideUp('#orders-dd')", 100 );
		$("#orders-dd").removeClass("stayDown");

	});
	
	$("#orders-dd").mouseleave(function(){
		setTimeout ( "slideUp('#orders-dd')", 100 );
		$("#orders-dd").removeClass("stayDown");
			
	});
	
	$("#orders-dd").mouseenter(function(){
			$("#orders-dd").addClass("stayDown");
	});
	
	//Reports Drop Down
	$('.dd3').mouseenter(function(){
		$("#reports-dd").slideDown("fast");
		$("#order-dd").addClass("stayDown");
	});
	
	$('.dd3').mouseleave(function(){
		setTimeout ( "slideUp('#reports-dd')", 100 );
		$("#reports.dd").removeClass("stayDown");
	});
	
	$("#reports-dd").mouseleave(function(){
		setTimeout ( "slideUp('#reports-dd')", 100 );
		$("#reports-dd").removeClass("stayDown");
	})
	
	$("#reports-dd").mouseenter(function(){
		$("#reports-dd").addClass("stayDown");
	})
	
	//End Drop Downs
	
	
	$('#new_user').click(function(){
		var loc = getScrollXY();
		$("#panel-wrapper").css("top",loc);
		$("div.panel-1").animate({height: "600px"}).animate({height: "525px" }, "fast",
			function(){$("div.panel-contents").fadeIn("slow");});
	});

	$('div.panel-1').click(function(){
		$('div.panel-contents').fadeOut("fast",closePanels());	
	});
	
	$('#edit_user').click(function(){
		var loc = getScrollXY();
		$("#panel-wrapper2").css("top",loc);
		$("div.panel-2").animate({height: "600px"}).animate({height: "525px" }, "fast",
			function(){$("div.panel2-contents").fadeIn("slow");});
	});

	$('#close_panel_2').click(function(){
		$('div.panel2-contents').fadeOut("fast",closePanels2());	
	});

   
 });
 

 function closePanels2(){
		$("div.panel-2").animate({height: "600px"}).animate({height: "0px",top:"0px"}, "fast", function(){$(this).hide();});
	}

 function closePanels(){
		$("div.panel-1").animate({height: "600px"}).animate({height: "0px",top:"0px"}, "fast", function(){$(this).hide();});
	}
 
 function noaction()
 {
 	return false;
 }
 
 function getScrollXY() {
  var scrOfX = 0, scrOfY = 0;
  if( typeof( window.pageYOffset ) == 'number' ) {
    //Netscape compliant
    scrOfY = window.pageYOffset;
    scrOfX = window.pageXOffset;
  } else if( document.body && ( document.body.scrollLeft || document.body.scrollTop ) ) {
    //DOM compliant
    scrOfY = document.body.scrollTop;
    scrOfX = document.body.scrollLeft;
  } else if( document.documentElement && ( document.documentElement.scrollLeft || document.documentElement.scrollTop ) ) {
    //IE6 standards compliant mode
    scrOfY = document.documentElement.scrollTop;
    scrOfX = document.documentElement.scrollLeft;
  }
  //return [ scrOfX, scrOfY ];
  return scrOfY;
}

</script>



<script type="text/javascript">
YAHOO.util.Event.addListener(window, "load", function() {
    YAHOO.example.XHR_JSON = function() {

        var myColumnDefs = [
            {key:"cust_company", label:"Company", sortable:true, formatter:YAHOO.widget.DataTable.formatString},
            {key:"cust_lname", label:"Last Name", sortable:true, formatter:YAHOO.widget.DataTable.formatString},
            {key:"cust_fname", label:"First Name", sortable:true, formatter:YAHOO.widget.DataTable.formatString},
            {key:"cust_city", label:"City", sortable:true, formatter:YAHOO.widget.DataTable.formatString}
        ];

        var myDataSource = new YAHOO.util.DataSource("/index.php/ajax/search_user/");
        myDataSource.responseType = YAHOO.util.DataSource.TYPE_JSON;
        myDataSource.connXhrMode = "queueRequests";
        myDataSource.responseSchema = {
            resultsList: "ResultSet.Result",
            fields: ["cust_company","cust_lname","cust_fname","cust_city"]
        };

        var myDataTable = new YAHOO.widget.DataTable("search_user", myColumnDefs,
                myDataSource, {initialRequest:"partialFName/a"});

        var mySuccessHandler = function() {
            this.set("sortedBy", null);
            this.onDataReturnAppendRows.apply(this,arguments);
        };
        var myFailureHandler = function() {
            this.showTableMessage(YAHOO.widget.DataTable.MSG_ERROR, YAHOO.widget.DataTable.CLASS_ERROR);
            this.onDataReturnAppendRows.apply(this,arguments);
        };
        var callbackObj = {
            success : mySuccessHandler,
            failure : myFailureHandler,
            scope : myDataTable
        };
        
        //myDataSource.sendRequest("query=mexican&zip=94089&results=10&output=json",callbackObj);

        //myDataSource.sendRequest("query=chinese&zip=94089&results=10&output=json",callbackObj);
                
        return {
            oDS: myDataSource,
            oDT: myDataTable
        };
    }();
});

</script>



</head>
<body>

<!-- wrap starts here -->
<div id="wrap">

<div id="users-dd" class="dropdown">
<a id="new_user" href="#" onclick="return false;">New User</a>
<a id="edit_user" href="#" onclick="return false;">Edit User</a>
</div>

<div id="orders-dd" class="dropdown">
<a href="gohere.html">Create Order</a>
<a href="gohere.html">Edit Order</a>
</div>

<div id="reports-dd" class="dropdown">
<a href="/index.php/reports">Sales Report</a>
<a href="/index.php/reports/analysis">Analysis</a>
</div>

<div sytle="position: absolute" id="panel-wrapper" >
                    <div class="panel-1">
                        <div class="panel-contents">
							<h3 style="float:left;" >Add User</h3>
							<p style="float: right">Click anywhere in this window to close the form</p>
	                         <form class="clear" action="#" method="post">
	                         	<p>
	                         		<label style="padding-left: 10px; width: 250px; border-bottom-style: solid; border-bottom-color: black; border-bottom-width: 1px;">Company Information</label>
	                         		<table border="0" cellpadding="0" cellspacing="0" >
	                         			<tr>
	                         				<td><label>Region:</label></td>
											<td>
												<select name="Region">
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
	                         				<td><label>Company Name:</label></td><td><input type="text" name="CompanyName" size="25" /></td>
	                         			</tr>
	                         		</table>
	                              
								  <label style="margin-top: 15px; padding-left: 10px; width: 250px; border-bottom-style: solid; border-bottom-color: black; border-bottom-width: 1px;">Contact Information</label>
	                              <br />
								  
								  <table border="0" cellpadding="0" cellspacing="0" >
	                         			<tr>
	                         				<td><label>Last Name:</label></td><td><input type="text" name="LastName" size="13" /></td>
	                         				<td><label>First Name:</label></td><td><input type="text" name="FirstName" size="13" /></td>
	                         			</tr>
										<tr >
											<td colwidth="4"><label>Street Address:</label></td>
										</tr>
										<tr colspan="4">
											<td colspan="4"><textarea style="width: 100%; height: 50px" name="StreetAddress" rows="3" cols="3"></textarea></td>
										</tr>
										<tr>
											<td class="oneline" colspan="4"><label>City:</label><input type="text" name="City" size="16" />
											<label>State:</label><input type="text" name="State" size="3" />
											<label>Zip:</label><input type="text" name="Zip" size="5" /></td>
										</tr>
										<tr>
											<td class="oneline" colspan="4"><label>Phone:</label><input type="text" name="Phone" size="16" />
											<label>Fax:</label><input type="text" name="State" size="16" /></td>
										</tr>
										<tr>
											<td class="oneline" colspan="4"><label>Email:</label><input type="text" name="Email" size="23" /></td>
										</tr>
	                         		</table>
								  
	                              <input style="margin-top: 10px;" class="button" type="submit" value="Create User" />
								  </p>
	                         </form>
                    	</div>
					</div>
</div>


<div sytle="position: absolute" id="panel-wrapper2" >
                    <div class="panel-2">
                        <div class="panel2-contents">
							<h3 style="float:left;" >Find User to Edit</h3>
							<p id="close_panel_2" style="float: right">Click here to close</p>
	                         <form class="clear" action="#" method="post">
	                         	<p>
	                         		<label>First Name</label>
									<input type="text" name="DontUse" size="13" />
									
									
									
								  </p>
	                         </form>
                    	</div>
					</div>
</div>


	<!--header -->
	<div id="header">			
				
		<h1 id="logo-text"><a href="/index.php/welcome" title="">Piedmont Furnishings</a></h1>		
		<p id="slogan">Handmade Furniture from High Point, North Carolina</p>				
		
	<!--header ends-->					
	</div>
	
	<div id="header-photo"><img src="/images/header-photo.jpg" width="870" height="206" alt="header-photo" /></div>	
	
	<!-- navigation starts-->	
	<div  id="nav">
		<ul>
			<li id="current"><a href="/index.php/welcome">Home</a></li>
			<li class="dd1" ><a href="index.html">Users</a></li>
			<li class="dd2" ><a href="index.html">Orders</a></li>
			<li class="dd3" ><a href="#">Reports</a></li>
			<li><a href="index.html">Support</a></li>
			<li><a href="index.html">About</a></li>		
		</ul>
	<!-- navigation ends-->	
	</div>					
			
	<!-- content-wrap starts -->
	<div id="content-wrap">









<div id="main">
				
			<a name="TemplateInfo"></a>
			<h2><a href="index.html">Template Info</a></h2>
			
			<div id="search_user"></div> 
			
			<p class="post-info">Posted by <a href="index.html">erwin</a></p>
				
			<p><strong>Outdoor 1.0</strong> is a free, W3C-compliant, CSS-based website template 
			by <strong><a href="http://www.styleshout.com/">styleshout.com</a></strong>. This work is 
			distributed under the <a rel="license" href="http://creativecommons.org/licenses/by/2.5/">
			Creative Commons Attribution 2.5  License</a>, which means that you are free to 
			use and modify it for any purpose. All I ask is that you include a link back to  
			<a href="http://www.styleshout.com/">my website</a> in your credits.</p>  

			<p>For more free designs, you can visit 
			<a href="http://www.styleshout.com/">my website</a> to see 
			my other works.</p>
		
			<p>Good luck and I hope you find my free templates useful!</p>
			
			<p><button class="open">Open</button> </p>
				
			<p class="postmeta">		
			<a href="index.html" class="readmore">Read more</a> |
			<a href="index.html" class="comments">Comments (7)</a> |				
			<span class="date">May 20, 2007</span>	
			</p>
			
			<a name="SampleTags"></a>
			<h2><a href="index.html">Sample Tags</a></h2>
				
			<h3>Code</h3>				
			<p><code>
			code-sample { <br />
			font-weight: bold;<br />
			font-style: italic;<br />				
			}		
			</code></p>	
				
			<h3>Example Lists</h3>
			
			<ol>
				<li>Here is an example</li>
				<li>of an ordered list</li>								
			</ol>	
							
			<ul>
				<li>Here is an example</li>
				<li>of an unordered list</li>								
			</ul>				
				
			<h3>Blockquote</h3>			
			<blockquote><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy 
			nibh euismod tincidunt ut laoreet dolore magna aliquam erat....</p></blockquote>
				
			<h3>Image and text</h3>
			<p><a href="index.html"><img src="images/image-sample.jpg" width="144" height="144" alt="image sample" class="float-left" /></a>
			Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum. 
			Cras id urna. Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu 
			posuere nunc justo tempus leo. Donec mattis, purus nec placerat bibendum, dui pede condimentum 
			odio, ac blandit ante orci ut diam. Cras fringilla magna. Phasellus suscipit, leo a pharetra 
			condimentum, lorem tellus eleifend magna, eget fringilla velit magna id neque. Curabitur vel urna. 
			In tristique orci porttitor ipsum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum. 
			Cras id urna. Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu 
			posuere nunc justo tempus leo. 				
			</p>
				
			<h3>Table Styling</h3>							
			<table>
				<tr>
					<th class="first"><strong>post</strong> date</th>
					<th>title</th>
					<th>description</th>
				</tr>
				<tr class="row-a">
					<td class="first">04.18.2007</td>
					<td><a href="index.html">Augue non nibh</a></td>
					<td><a href="index.html">Lobortis commodo metus vestibulum</a></td>
				</tr>
				<tr class="row-b">
					<td class="first">04.18.2007</td>
					<td><a href="index.html">Fusce ut diam bibendum</a></td>
					<td><a href="index.html">Purus in eget odio in sapien</a></td>
				</tr>
				<tr class="row-a">
					<td class="first">04.18.2007</td>
					<td><a href="index.html">Maecenas et ipsum</a></td>
					<td><a href="index.html">Adipiscing blandit quisque eros</a></td>
				</tr>
				<tr class="row-b">
					<td class="first">04.18.2007</td>
					<td><a href="index.html">Sed vestibulum blandit</a></td>
					<td><a href="index.html">Cras lobortis commodo metus lorem</a></td>
				</tr>
			</table>
								
			<h3>Example Form</h3>
			<form action="#">			
			<p>			
			<label>Name</label>
			<input name="dname" value="Your Name" type="text" size="30" />
			<label>Email</label>
			<input name="demail" value="Your Email" type="text" size="30" />
			<label>Your Comments</label>
			<textarea rows="5" cols="5"></textarea>
			<br />	
			<input class="button" type="submit" value="Go next" />		
			</p>		
			</form>				
			<br />	

		<!-- main ends -->	
		</div>