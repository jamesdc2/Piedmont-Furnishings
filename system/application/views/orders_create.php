<script type="text/javascript">
	
	$(document).ready( function() {
		
		var count = 2;
		
		$(".delete").live("click", function(event){
			$(this).parent().parent().remove();
		});
		
		$(".add").live("click", function(event) {
			
			var newRow = "<tr><td class=\"entry_cell\"><select name=\"od_product_@@\"><option value=\"BB501\">Shaker Bedframe</option><option value=\"BB602\">Classic Bedframe</option><option value=\"BB603\">Oak Bedframe</option><option value=\"BC501\">Shaker Chest</option><option value=\"BC602\">Classic Chest</option><option value=\"BC603\">Oak Chest</option><option value=\"BW501\">Shaker Wardrobe</option><option value=\"DB301\">Shaker Buffet</option><option value=\"DB302\">Classic Buffet</option><option value=\"DC301A\">Shaker Chair - arm</option><option value=\"DC301B\">Shaker Chair - no arm</option><option value=\"DC302A\">Classic Chair - arm</option><option value=\"DC302B\">Classic Chair - no arm</option><option value=\"DT301\">Shaker Table</option><option value=\"DT302\">Classic Table</option><option value=\"LB101\">Shaker Bookshelf</option><option value=\"LB202\">Classic Bookshelf</option><option value=\"LE101\">Shaker Entertainment Center</option><option value=\"LE202\">Classic Entertainment Center</option><option value=\"LE203\">Oak Entertainment Center</option></select></td><td class=\"entry_cell\"><input class=\"quantity\" type=\"text\" size=\"7\" name=\"od_quantity_@@\"/></td><td class=\"entry_cell\"><input type=\"text\" size=\"10\" class=\"changetotal price\" name=\"od_unit_price_@@\"/></td><td class=\"entry_cell\"><input type=\"text\" size=\"10\" class=\"sumtotal price\" name=\"od_total_price_@@\"/></td><td class=\"entry_cell\"><a onclick=\"return false;\" class=\"add\" href=\"\">+</a> / <a onclick=\"return false;\" class=\"delete\" href=\"\">-</a></td></tr>";
			newRow = newRow.replace(/@@/g, count);
			$("#product_info tr:last").after(newRow);
			count++;				
		});
		
		$(".changetotal").live("keyup",function() {
			
			var name = $(this).attr("name");
			name = name.substring(name.length - 1);
			
			var unitPrice = $("input[name='od_unit_price_"+name+"']").val().replace('$','').replace(',','');
			var quantity = $("input[name='od_quantity_"+name+"']").val().replace('$','').replace(',','');
			 $("input[name='od_total_price_"+name+"']").val('$' + unitPrice * quantity + '.00');
			 
			var total = 0;
			$(".sumtotal").each(function(i){
				total += parseInt(this.value.replace('$','').replace(',','').replace('.00',''));
			});
			
			$('#total_total').val('$' + total + '.00');
			 
		});
		
	});
	
	var error;
	var alertmsg;
	var pattern;
	
	function checkAll() {

		error = false;
		alertmsg = "";
				
		var dateField = document.getElementById("order_date");
		var quanArr = document.getElementsByClassName("quantity");
		var priceArr = document.getElementsByClassName("price");
		
		checkDate(dateField);
		
		var i;
		for( i = 0; i < priceArr.length; i++) {
			checkPrice(priceArr[i]);
		}
		
		for ( i = 0; i < quanArr.length; i++) {
			checkQuantity(quanArr[i]);
		}
		
		if (error == true) {
			document.getElementById("errorbox").innerHTML = "<p>" + alertmsg + "</p>";
			return false;
		}
		else {
			document.getElementById("errorbox").InnerHTML = "";
			return true;
		}
		
	};
	
	function checkDate(field) {
		pattern = /\d\d\d\d\-\d\d\-\d\d/;
		if(pattern.test(field.value) == false) {
			alertmsg += "Please enter the date in a YYYY-MM-DD format<br>";
			error = true;
		}					
	};
	
	function checkQuantity(field) {
		pattern = /\D/;
		if(field.value == "") {
			alertmsg += "A quantity has been left blank<br>";
			error = true;
			return;
		}
		if(pattern.test(field.value) == true ) {
			alertmsg += "A quantity has been entered incorrectly<br>";
			error = true;
		}
	};
	
	function checkPrice(field) {
		
		if( field.value == "" ) {
			alertmsg += "A price has been left blank<br>";
			error = true;
			return;
		}
		
		var pattern1 = /[^\d\.\,\$]/; 	// non-integer other than a decimal point or comma or dollar sign.
		var pattern2 = /\./; 			// single decimal point (to test for two decimals)
		var pattern3 = /\d+\.\d\d/;		// check format.

		if ( pattern1.test(field.value) ) {
			alertmsg += "A price contains an invalid character.<br>";
			error = true;
		} else {
			var str = field.value;
			var str1 = str.substring(str.search(pattern2) + 1, str.length);

			if ( pattern2.test( str1 ) ) {
				alertmsg += "A price has been entered incorrectly. All prices must contain exactly 1 decimal point.<br>";
				error = true;
			}
		}
		if ( pattern3.test(field.value) == false ) {
			alertmsg += "A price has been entered incorrectly. All prices must be of the format 0.00<br>";
			error = true;
		}
	}
    
</script>

<h3>Create a New Order</h3>
<form method="post" action="<?php echo wp ?>index.php/orders/done" class="order_form no_table_borders" onsubmit="return checkAll();">
    <div class="form-padding">
        <label class="line-below">
            Order Information
        </label>
        <table border="0" cellpadding="0" cellspacing="0" class="order_info">
            <tr>
                <td>
                    <label>
                        Order Date:
                    </label>
                </td>
                <td>
                    <input type="text" id="order_date" name="order_date" size="10" value="<?php echo $date; ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <label>
                        Customer:
                    </label>
					
                </td>
                <td colspan="3">
                    <select name="customer">
						<?php foreach($cust_list->result() as $customer) {
							echo '<option value="' . $customer->cust_id . '">' . $customer->cust_fname . ' ' . $customer->cust_lname . "</option>";
						} ?>
					 </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label>
                        Sales Agent:
                    </label>
                </td>
                <td>
                    <select name="sales_agent">
                    <?php foreach($emp_list->result() as $employee) {
                    	echo '<option';
						echo ' value="' . $employee->emp_id . '"';						
						echo '>';
						echo $employee->emp_fname . ' ' . $employee->emp_lname;
						echo '</option>'; 
                    } ?>
					</select>
                </td>
                <td>
                    <label>
                        Order Status:
                    </label>
                </td>
                <td>
                    <select name="order_status">
					<?php foreach($order_status->result() as $entry) {
						echo '<option';
						echo ' value="' . $entry->status_id . '">';
						echo $entry->status_type . "</option>";
					} ?>
					</select>
                </td>
            </tr>
        </table>
        <label class="line-below">
            Product Information
        </label>
        <table border="0" cellpadding="0" cellspacing="0" id="product_info">
            <thead>
                <tr>
                    <th>
                        Product
                    </th>
                    <th>
                        Qty.
                    </th>
                    <th>
                        Unit Price
                    </th>
                    <th>
                        Total Price
                    </th>
                    <th>
                    </th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="3">
                        <label style="float: right;">
                            Total Order:
                        </label>
                    </th>
                    <td class="entry_cell">
                        <input type="text" class="price" id="total_total" name="total_order" size="10" value="" />
                    </td>
                </tr>
            </tfoot>
            <tbody>
                <tr>
                    <td class="entry_cell">
                        <select name="od_product_1" />
							<?php
								foreach($product_query->result() as $entry) {
									echo '<option value="'.$entry->product_id.'">';
									echo $entry->product_name;
									echo '</option>';
								}
							?>
						</select>
                    </td>
                    <td class="entry_cell">
                        <input type="text" class="quantity" name="od_quantity_1" size="7" />
                    </td>
                    <td class="entry_cell">
                        <input type="text" class="changetotal price" name="od_unit_price_1" size="10" />
                    </td>
                    <td class="entry_cell">
                        <input type="text" class="sumtotal price" name="od_total_price_1" size="10"  />
                    </td>
                    <td class="entry_cell">
                        <a href="" class="add" onclick="return false;">+</a> / <a href="" class="delete" onclick="return false;">-</a>
                    </td>
                </tr>
            </tbody>
        </table>
		<input type="submit" value="Submit Order" style="margin: 10px;" class="button" />
		<input type="button" onclick="reset();" value="Reset Form" style="margin: 10px;" class="button"/>
    </div>
</form>
	<div id="errorbox" style="border: 1px solid #EAE7DB; background: #FAFAE7; color: red; margin: 10px;"></div>
