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
                    hide_blank_weeks:true,  // Enable, to demonstrate how we handle changing height, using changeContent
                    selected: "1/1/2006"
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

                calendar2 = new YAHOO.widget.Calendar("cal",  {
                    iframe:false,          // Turn iframe off, since container has iframe support.
                    hide_blank_weeks:true,  // Enable, to demonstrate how we handle changing height, using changeContent
                    selected:"12/1/2006"
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
	
	.calheader {
		color: #000000;
	}
	-->
</style>

<h2>Generate Performance Report</h2>

<form>
	<div class="form-padding">

<?php 
if($user_role == 'manager')
{
?>

<div style="float: left; margin-right: 20px;">
	<label>Employee</label>
	<select name="employee">
	<option value="1">Robert Pamplin</option>
	<option value="2">Jeannine Burruss</option>
	<option value="3">William Derring</option>
	<option value="4">Michael Hahn</option>
	<option value="5">Linda Robeson</option>
	<option value="6">Carla Newman</option>
	<option value="-1" selected="selected">All</option>
	</select>

</div>

<?php 
}
?>

<div style="float: left; margin-right: 20px">

	<div class="datefield">
		<label for="date">Date Between: </label><input type="text" id="date" name="date" value="2006/01/01" /><button type="button" id="show" title="Show Calendar"><img src="http://developer.yahoo.com/yui/examples/calendar/assets/calbtn.gif" width="18" height="18" alt="Calendar" ></button>
	</div>
	<div class="datefield">
<input type="text" id="date2" name="date2" value="2006/12/01" /><button type="button" id="show2" title="Show Calendar"><img src="http://developer.yahoo.com/yui/examples/calendar/assets/calbtn.gif" width="18" height="18" alt="Calendar" ></button>
	</div>

</div>

<div style="float: left; margin-right: 20px;">
<label>Group Data By</label>
<select name="groupby">
	<option value="region_name as Region">Region</option>
	<option value="product_name as Product">Product</option>
	<option value="category_name as Category">Category</option>
	<option value="cust_lname as Customer">Customer</option>
	</select>
</div>
<div style="clear: left"><br /></div>

<input style="margin-top: 10px;" class="button" type="submit" value="Generate Report" />

</div>
</form>


<?php 
if(isset($data) && sizeof($data) > 0)
{
?>

	<h3>Performance Report for <?php if($uid != -1 ) {echo "$ufname $ulname";}else{echo "all employees";} ?></h3>
	<div style="margin-left: 75px">
		<h4>Between <?php echo "$sdate and $edate" ?></h4>
	
		<table>
			<tr>
		<?php
		
		foreach($data[0] as $key => $value)
		{
			echo '<th>';
			echo $key;
			echo '</th>';
		}
		
		?>
		</tr>
		
		<?php
		foreach($data as $row)
		{
			echo '<tr>';
			foreach($row as $value)
			{
				echo '<td>';
				echo $value;
				echo '</td>';
			}
			echo '</tr>';
		}
		?>
		
		</table>							
	</div>
	
<?php
}
?>

