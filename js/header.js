
	
	
	
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

	$('#close_add_user_form').click(function(){
		$('div.panel-contents').fadeOut("fast",closePanels());	
	});
	
	$('#edit_user').click(function(){
		var loc = getScrollXY();
		$("#panel-wrapper2").css("top",loc);
		$("div.panel-2").animate({height: "830px"}).animate({height: "720px" }, "fast",
			function(){$("div.panel2-contents").fadeIn("slow");});
	});

	$('#close_panel_2').click(function(){
		$('div.panel2-contents').fadeOut("fast",closePanels2());	
	});
	
	$('.submit_customer_edit_form').click(function()
	{
		
	});
	
	
	//Submit the customer_edit data to the customer/add controller
	$('.submit_customer_edit_form').click(function()
	{
		var action = $('.customer_edit_form').attr('action');
		if (action[action.length-1] != '/')
		{
			action += '/'
		}
		
		var request = submitFormString('.customer_edit_form');
		window.location = action + request;
	});
	
	
	//Submit the customer_new_form data to the customer/add controller
	$('.submit_customer_new_form').click(function()
	{
		var action = $('.customer_new_form').attr('action');
		if (action[action.length-1] != '/')
		{
			action += '/'
		}
		
		var request = submitFormString('.customer_new_form');
		window.location = action + request;
	});
	
	
	//Search for customer
	$('#search_search').click(function(){
		deleteAllDataTableRows();
		var request= submitFormString('.search_customer_form');
		newRequestForDataTable(request);
	});
	
	$('#search_search_all').click(function(){
		deleteAllDataTableRows();
		newRequestForDataTable('');
	});
	
	
	
	$('#search_edit').click(function(){
		var recordInstance = dataTable.getRecord(dataTable.getLastSelectedRecord());
		var cust_id = recordInstance.getData("cust_id");
		window.location = webRoot + 'index.php/customers/edit/' + cust_id;
	});

   
 });
 
 function submitFormString(match)
 {
 	var request = "";
	
	request = $(match).formSerialize();
	
	return '?' + request;
 }
 
 function trim(str)
 {
 	return str.replace(/^\s\s*/, '').replace(/\s\s*$/, '');
 }

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


	
	var dataTable = null;
	
	function deleteAllDataTableRows()
	{
		dataTable.deleteRows(0,10000);
	}
	
	function newRequestForDataTable(newRequest)
	{
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
            scope : dataTable
        };
		
		dataTable.getDataSource().sendRequest(newRequest,callbackObj);
	}
	
YAHOO.util.Event.addListener(window, "load", function() {
    YAHOO.example.XHR_JSON = function() {

        var myColumnDefs = [
            {key:"cust_company", label:"Company", sortable:true, formatter:YAHOO.widget.DataTable.formatDefault},
            {key:"cust_lname", label:"Last Name", sortable:true, formatter:YAHOO.widget.DataTable.formatDefault},
            {key:"cust_fname", label:"First Name", sortable:true, formatter:YAHOO.widget.DataTable.formatDefault},
            {key:"cust_city", label:"City", sortable:true, formatter:YAHOO.widget.DataTable.formatDefault}
        ];
		
		var myConfigs = { 
	        initialRequest: "?none=none", // Initial request for first page of data
	        paginator: new YAHOO.widget.Paginator({ rowsPerPage:5 }),
			MSG_EMPTY: 'Enter Search Criteria and Click Search<BR />&nbsp;<BR />&nbsp;<BR />&nbsp;<BR />&nbsp;<BR />&nbsp;<BR />&nbsp;<BR />&nbsp;<BR />&nbsp;',
			MSG_LOADING: 'Loading...',
			selectionMode:"single"
	    };
		

        var myDataSource = new YAHOO.util.DataSource(webRoot + "index.php/ajax/search_user/");
        myDataSource.responseType = YAHOO.util.DataSource.TYPE_JSON;
        //myDataSource.connXhrMode = "queueRequests";
        myDataSource.responseSchema = {
            resultsList: "ResultSet.Result",
			//resultsList: "Result",
            fields: ["cust_company","cust_lname","cust_fname","cust_city", "cust_id"]
        };

        var myDataTable = new YAHOO.widget.DataTable("search_user", myColumnDefs, myDataSource, myConfigs);
		
		myDataTable.subscribe("rowMouseoverEvent", myDataTable.onEventHighlightRow); 
	    myDataTable.subscribe("rowMouseoutEvent", myDataTable.onEventUnhighlightRow); 
	    myDataTable.subscribe("rowClickEvent", myDataTable.onEventSelectRow); 
        
		
		dataTable = myDataTable;
		

        //myDataSource.sendRequest("query=chinese&zip=94089&results=10&output=json",callbackObj);
                
        return {
            oDS: myDataSource,
            oDT: myDataTable
        };
    }();
});

