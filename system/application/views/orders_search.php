<script language="JavaScript">
	
	$(document).ready(function(){
		$('#order_search').click(function(){
			deleteAllDataTableRows();
			var request= submitFormString('.search_order_form');
			newRequestForDataTable(request);
		});
		
		$('#order_search_all').click(function(){
			deleteAllDataTableRows();
			newRequestForDataTable('');
		});
		
		$('#order_edit').click(function(){
			var recordInstance = searchTable.getRecord(searchTable.getLastSelectedRecord());
			var order_id = recordInstance.getData("order_id");
			window.location = webRoot + 'index.php/orders/edit/?order_id=' + order_id;
		});
		$('#order_delete').click(function(){
			var recordInstance = searchTable.getRecord(searchTable.getLastSelectedRecord());
			var order_id = recordInstance.getData("order_id");
			window.location = webRoot + 'index.php/orders/delete/?order_id=' + order_id;
		})
	});
	
	var searchTable = null;
	
	function deleteAllDataTableRows()
	{
		searchTable.deleteRows(0,10000);
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
            scope : searchTable
        };
		
		searchTable.getDataSource().sendRequest(newRequest,callbackObj);
	}
	
	YAHOO.util.Event.addListener(window, "load", function() {
    YAHOO.example.XHR_JSON = function() {

        var myColumnDefs = [
            {key:"order_id", label:"Order #", sortable:true, formatter:YAHOO.widget.DataTable.formatDefault},
            {key:"cust_lname", label:"Customer Name", sortable:true, formatter:YAHOO.widget.DataTable.formatDefault},
            {key:"emp_lname", label:"Employee Name", sortable:true, formatter:YAHOO.widget.DataTable.formatDefault},
            {key:"order_date", label:"Order Date", sortable:true, formatter:YAHOO.widget.DataTable.formatDefault}
        ];
		
		var myConfigs = { 
	        initialRequest: "?none=none", // Initial request for first page of data
	        paginator: new YAHOO.widget.Paginator({ rowsPerPage:10 }),
			MSG_EMPTY: 'Enter Search Criteria and Click Search<BR />&nbsp;<BR />&nbsp;<BR />&nbsp;<BR />&nbsp;<BR />&nbsp;<BR />&nbsp;<BR />&nbsp;<BR />&nbsp;',
			MSG_LOADING: 'Loading...',
			selectionMode:"single"
	    };
		

        var myDataSource = new YAHOO.util.DataSource(webRoot + "index.php/ajax/search_orders/");
        myDataSource.responseType = YAHOO.util.DataSource.TYPE_JSON;
        //myDataSource.connXhrMode = "queueRequests";
        myDataSource.responseSchema = {
            resultsList: "ResultSet.Result",
			//resultsList: "Result",
            fields: ["order_id","cust_lname","emp_lname","order_date"]
        };

        var myDataTable = new YAHOO.widget.DataTable("search_results", myColumnDefs, myDataSource, myConfigs);
		
		myDataTable.subscribe("rowMouseoverEvent", myDataTable.onEventHighlightRow); 
	    myDataTable.subscribe("rowMouseoutEvent", myDataTable.onEventUnhighlightRow); 
	    myDataTable.subscribe("rowClickEvent", myDataTable.onEventSelectRow); 
        
		
		searchTable = myDataTable;
		

        //myDataSource.sendRequest("query=chinese&zip=94089&results=10&output=json",callbackObj);
                
        return {
            oDS: myDataSource,
            oDT: myDataTable
        };
    }();
});
	
</script>

<form method="post" action="#" class="search_order_form no_table_borders">
    <div class="form-padding">
    	<h3 class="line-below">Find an Order to Edit</h3>
		<table border="0px" padding="0px" margin="0px">
			<tr>
				<td>
					<label>Order #:</label>
					</td>
					<td>
        			<input name="order_id" type="text" size="5" />
				</td>
			</tr>
			<tr>
				<td>
					<label>Customer Name:</label>
					</td>
					<td>
					<input name="cust_name" type="text" size="25" />
				</td>
			</tr>
		</table>
        <div style="text-align: center">
        	<input class="button" id="order_search" type="submit" onclick="return false;" value="Search" />
			<input class="button" id="order_search_all" type="submit" onclick="return false;" value="View All" />
		</div>
		<p style="font-size:0.8em">Note: Running a search on all records will take some time.</p>
		<h3 class="line-below">Search Results</h3>
		<div id="search_results"></div>
		<div style="text-align: center">
				<input class="button" id="order_edit" type="submit" onclick="return false;" value="Edit Selected Order" />
				<input class="button" id="order_delete" type="button" onclick="return false;" value="Delete Selected Order" />
		</div>
    </div>
</form>