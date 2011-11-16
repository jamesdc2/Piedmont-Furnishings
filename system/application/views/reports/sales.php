
<script type="text/javascript" src="http://yui.yahooapis.com/2.8.0r4/build/yahoo-dom-event/yahoo-dom-event.js"></script>
<script type="text/javascript" src="http://yui.yahooapis.com/2.8.0r4/build/dragdrop/dragdrop-min.js"></script>
<script type="text/javascript" src="http://yui.yahooapis.com/2.8.0r4/build/element/element-min.js"></script>
<script type="text/javascript" src="http://yui.yahooapis.com/2.8.0r4/build/button/button-min.js"></script>
<script type="text/javascript" src="http://yui.yahooapis.com/2.8.0r4/build/container/container-min.js"></script>
<script type="text/javascript" src="http://yui.yahooapis.com/2.8.0r4/build/calendar/calendar-min.js"></script>

<script type="text/javascript">
    YAHOO.util.Event.onDOMReady(function(){

        var Event = YAHOO.util.Event,
            Dom = YAHOO.util.Dom,
            dialog,
            calendar, dialog2, calendar2;

        var showBtn = Dom.get("show");
		var showBtn2 = Dom.get("show2");
		
		
	
        Event.on(showBtn, "click", function() {

            // Lazy Dialog Creation - Wait to create the Dialog, and setup document click listeners, until the first time the button is clicked.
            if (!dialog) {

                // Hide Calendar if we click anywhere in the document other than the calendar
                Event.on(document, "click", function(e) {
                    var el = Event.getTarget(e);
                    var dialogEl = dialog.element;
                    if (el != dialogEl && !Dom.isAncestor(dialogEl, el) && el != showBtn && !Dom.isAncestor(showBtn, el)) {
                        dialog.hide();
                    }
                });

                function resetHandler() {
                    // Reset the current calendar page to the select date, or 
                    // to today if nothing is selected.
                    var selDates = calendar.getSelectedDates();
                    var resetDate;
        
                    if (selDates.length > 0) {
                        resetDate = selDates[0];
                    } else {
                        resetDate = calendar.today;
                    }
        
                    calendar.cfg.setProperty("pagedate", resetDate);
                    calendar.render();
                }
        
                function closeHandler() {
                    dialog.hide();
                }

                dialog = new YAHOO.widget.Dialog("container", {
                    visible:false,
                    context:["show", "tl", "bl"],
                    buttons:[ {text:"Reset", handler: resetHandler, isDefault:true}, {text:"Close", handler: closeHandler}],
                    draggable:false,
                    close:true
                });
                dialog.setHeader('Pick A Date');
                dialog.setBody('<div id="cal"></div>');
                dialog.render(document.body);

                dialog.showEvent.subscribe(function() {
                    if (YAHOO.env.ua.ie) {
                        // Since we're hiding the table using yui-overlay-hidden, we 
                        // want to let the dialog know that the content size has changed, when
                        // shown
                        dialog.fireEvent("changeContent");
                    }
                });
            }

            // Lazy Calendar Creation - Wait to create the Calendar until the first time the button is clicked.
            if (!calendar) {

                calendar = new YAHOO.widget.Calendar("cal", {
                    iframe:false,          // Turn iframe off, since container has iframe support.
                    hide_blank_weeks:true  // Enable, to demonstrate how we handle changing height, using changeContent
                });
                calendar.render();

                calendar.selectEvent.subscribe(function() {
                    if (calendar.getSelectedDates().length > 0) {

                        var selDate = calendar.getSelectedDates()[0];

                        // Pretty Date Output, using Calendar's Locale values: Friday, 8 February 2008
                        //var wStr = calendar.cfg.getProperty("WEEKDAYS_LONG")[selDate.getDay()];
                        var dStr = selDate.getDate();
                        //var mStr = calendar.cfg.getProperty("MONTHS_LONG")[selDate.getMonth()];
						var mStr = selDate.getMonth();
                        var yStr = selDate.getFullYear();
        
                        //Dom.get("date").value = wStr + ", " + dStr + " " + mStr + " " + yStr;
						Dom.get("date").value = yStr + '/' + (mStr + 1) + '/' + dStr;
                    } else {
                        Dom.get("date").value = "";
                    }
                    dialog.hide();
                });

                calendar.renderEvent.subscribe(function() {
                    // Tell Dialog it's contents have changed, which allows 
                    // container to redraw the underlay (for IE6/Safari2)
                    dialog.fireEvent("changeContent");
                });
            }

            var seldate = calendar.getSelectedDates();

            if (seldate.length > 0) {
                // Set the pagedate to show the selected date if it exists
                calendar.cfg.setProperty("pagedate", seldate[0]);
                calendar.render();
            }

            dialog.show();
        });
		
		
		
		Event.on(showBtn2, "click", function() {

            // Lazy dialog2 Creation - Wait to create the Dialog, and setup document click listeners, until the first time the button is clicked.
            if (!dialog2) {

                // Hide Calendar if we click anywhere in the document other than the calendar
                Event.on(document, "click", function(e) {
                    var el = Event.getTarget(e);
                    var dialogEl = dialog2.element;
                    if (el != dialogEl && !Dom.isAncestor(dialogEl, el) && el != showBtn2 && !Dom.isAncestor(showBtn2, el)) {
                        dialog2.hide();
                    }
                });

                function resetHandler() {
                    // Reset the current calendar page to the select date, or 
                    // to today if nothing is selected.
                    var selDates = calendar2.getSelectedDates();
                    var resetDate;
        
                    if (selDates.length > 0) {
                        resetDate = selDates[0];
                    } else {
                        resetDate = calendar2.today;
                    }
        
                    calendar2.cfg.setProperty("pagedate", resetDate);
                    calendar2.render();
                }
        
                function closeHandler() {
                    dialog2.hide();
                }

                dialog2 = new YAHOO.widget.Dialog("container", {
                    visible:false,
                    context:["show", "tl", "bl"],
                    buttons:[ {text:"Reset", handler: resetHandler, isDefault:true}, {text:"Close", handler: closeHandler}],
                    draggable:false,
                    close:true
                });
                dialog2.setHeader('Pick A Date');
                dialog2.setBody('<div id="cal"></div>');
                dialog2.render(document.body);

                dialog2.showEvent.subscribe(function() {
                    if (YAHOO.env.ua.ie) {
                        // Since we're hiding the table using yui-overlay-hidden, we 
                        // want to let the dialog know that the content size has changed, when
                        // shown
                        dialog2.fireEvent("changeContent");
                    }
                });
            }

            // Lazy Calendar Creation - Wait to create the Calendar until the first time the button is clicked.
            if (!calendar2) {

                calendar2 = new YAHOO.widget.Calendar("cal", {
                    iframe:false,          // Turn iframe off, since container has iframe support.
                    hide_blank_weeks:true  // Enable, to demonstrate how we handle changing height, using changeContent
                });
                calendar2.render();

                calendar2.selectEvent.subscribe(function() {
                    if (calendar2.getSelectedDates().length > 0) {

                        var selDate = calendar2.getSelectedDates()[0];

                        // Pretty Date Output, using Calendar's Locale values: Friday, 8 February 2008
                        //var wStr = calendar.cfg.getProperty("WEEKDAYS_LONG")[selDate.getDay()];
                        var dStr = selDate.getDate();
                        //var mStr = calendar.cfg.getProperty("MONTHS_LONG")[selDate.getMonth()];
						var mStr = selDate.getMonth();
                        var yStr = selDate.getFullYear();
                        //Dom.get("date").value = wStr + ", " + dStr + " " + mStr + " " + yStr;
						Dom.get("date2").value = yStr + '/' + (mStr + 1) + '/' + dStr;
                    } else {
                        Dom.get("date2").value = "";
                    }
                    dialog2.hide();
                });

                calendar2.renderEvent.subscribe(function() {
                    // Tell Dialog it's contents have changed, which allows 
                    // container to redraw the underlay (for IE6/Safari2)
                    dialog2.fireEvent("changeContent");
                });
            }

            var seldate = calendar2.getSelectedDates();

            if (seldate.length > 0) {
                // Set the pagedate to show the selected date if it exists
                calendar2.cfg.setProperty("pagedate", seldate[0]);
                calendar2.render();
            }

            dialog2.show();
        });
		
		
		
    });
</script>


<style type="text/css">
	<!--
    /* Clear calendar's float, using dialog inbuilt form element */
    #container .bd form {
        clear:left;
    }

    /* Have calendar squeeze upto bd bounding box */
    #container .bd {
        padding:0;
    }

    #container .hd {
        text-align:left;
    }

    /* Center buttons in the footer */
    #container .ft .button-group {
        text-align:center;
    }

    /* Prevent border-collapse:collapse from bleeding through in IE6, IE7 */
    #container_c.yui-overlay-hidden table {
        display:none;
    }

    /* Remove calendar's border and set padding in ems instead of px, so we can specify an width in ems for the container */
    #cal {
        border:none;
        padding:1em;
    }



    .datefield input,
    .datefield button,
    .datefield label  {
        vertical-align:middle;
    }


    .datefield input  {
        width:5em;
    }

    .datefield button  {
        padding:0 5px 0 5px;
        margin-left:2px;
    }

    .datefield button img {
        padding:0;
        margin:0;
        vertical-align:middle;
    }
	-->
</style>


<h2>Filter Orders</h2>

<form>
	<div class="form-padding">

<div style="float: left; margin-right: 20px">
<label>Order Status</label>
<select name="orderstatus">
	<option value='1'>on order</option>
	<option value='2'>complete</option>
	<option selected="selected" value='-1'>All</option>
</select>
</div>

<?php 
if($user_role == 'manager')
{
	?>
<div style="float: left; margin-right: 20px">
<label>Employee</label>
<select name="employee">
	
	<?php 
		foreach($employees->result_array() as $row)
		{
			echo "<option value=\"{$row['emp_id']}\">{$row['emp_fname']} {$row['emp_lname']}</option>";
		}
	?>
	
	
	<option selected="selected" value="-1">All</option>
	
</select>
</div>

<?php 
}
?>

<div style="float: left; margin-right: 20px">

	<div class="datefield">
		<label for="date">Date Between: </label><input type="text" id="date" name="date" value="" /><button type="button" id="show" title="Show Calendar"><img src="http://developer.yahoo.com/yui/examples/calendar/assets/calbtn.gif" width="18" height="18" alt="Calendar" ></button>
	</div>
	<div class="datefield">
<input type="text" id="date2" name="date2" value="" /><button type="button" id="show2" title="Show Calendar"><img src="http://developer.yahoo.com/yui/examples/calendar/assets/calbtn.gif" width="18" height="18" alt="Calendar" ></button>
	</div>

</div>

<div style="float: left; margin-right: 20px">
	<label>Total Price Between :</label>
	
	<select name="tgt">
		<option selected="selected" value="0">$0</option>
		<option value="500">$500</option>
		<option value="700">$700</option>
		<option value="900">$900</option>
		<option value="1100">$1100</option>
		<option value="1300">$1300</option>
		<option value="1500">$1500</option>
		<option value="1700">$1700</option>
		<option value="1900">$1900</option>
		<option value="2100">$2100</option>
		<option value="2300">$2300</option>
		<option value="2500">$2500</option>
	</select>
	-
	<select name="tlt">
		<option value="500">$500</option>
		<option value="700">$700</option>
		<option value="900">$900</option>
		<option value="1100">$1100</option>
		<option value="1300">$1300</option>
		<option value="1500">$1500</option>
		<option value="1700">$1700</option>
		<option value="1900">$1900</option>
		<option value="2100">$2100</option>
		<option value="2300">$2300</option>
		<option value="2500">$2500</option>
		<option selected="selected" value="10000">$10000</option>
	</select>
	<br />
	<div style="margin-top: 10px">
	<input type="checkbox" name="nf" value="no" /> Filter on total price
	</div>
</div>




<div style="clear: left"><br /></div>

<input style="margin-top: 10px;" class="button" type="submit" value="Filter Orders" />

<?php 
if($user_role == 'manager')
{
	echo '<input style="margin-top: 10px;" class="button" name="all" type="submit" value="Show All" />';
}
?>

<input type="checkbox" name="genxml" value="yes" /> Generate report as xml


</div>
</form>

<div style="clear: left">&nbsp;</div>


<?php



if(sizeof($table_data) >= 1)
{
	echo '<table>';
	
	echo '<tr>';
	foreach($table_data[0] as $key => $value)
	{
		echo ("<th>$key</th>");
	}
	echo '</tr>';

	$c = 0;
	foreach ($table_data as $row)
	{
		$str = 'row-a';
		if($c++ % 2 == 1)
		{
			$str = 'row-b';
		}
		
		echo "<tr class=\"$str\">";
		foreach($row as $key => $value)
		{
			echo ("<td>$value</td>");
		}
		echo '</tr>';
		
	}
	
	echo "<tr><th colspan=\"7\"></th><th>Total</th><td>\$$total_total</td></tr>";
	
	echo '</table>';
}


?>