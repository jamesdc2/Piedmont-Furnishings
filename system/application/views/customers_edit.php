
<h2><a href="#">Edit Customer</a></h2>

<form class="no_table_borders customer_edit_form clear" action="<?php echo wp ?>index.php/customers/add" method="post">
	                         	<div class="form-padding">
	                         		<label class="line-below">Company Information</label>
	                         		<table border="0" cellpadding="0" cellspacing="0" >
	                         			<tr>
	                         				<td><label>Region:</label></td>
											<td>
												<select name="use_region_id">
													<option <?php if($customer->region_id == 1){echo 'selected="selected"';} ?> value="1">North East</option>
													<option <?php if($customer->region_id == 2){echo 'selected="selected"';} ?> value="2">South East</option>
													<option <?php if($customer->region_id == 3){echo 'selected="selected"';} ?> value="3">Midwest</option>
													<option <?php if($customer->region_id == 4){echo 'selected="selected"';} ?> value="4">South West</option>
													<option <?php if($customer->region_id == 5){echo 'selected="selected"';} ?> value="5">North West</option>
													<option <?php if($customer->region_id == 6){echo 'selected="selected"';} ?> value="6">International</option>
												</select>
											</td>
	                         			</tr>
										<tr>
	                         				<td><label>Company Name:</label></td><td><input type="text" name="use_cust_company" value="<?php echo $customer->cust_company ?>" size="25" /></td>
	                         			</tr>
	                         		</table>
	                              
								  <label style="margin-top: 15px; padding-left: 10px; width: 250px; border-bottom-style: solid; border-bottom-color: black; border-bottom-width: 1px;">Contact Information</label>
	                              <br />
								  
								  <table border="0" cellpadding="0" cellspacing="0" >
	                         			<tr>
	                         				<td><label>Last Name:</label></td><td><input type="text" name="use_cust_lname" size="13" value="<?php echo $customer->cust_lname ?>" /></td>
	                         				<td><label>First Name:</label></td><td><input type="text" name="use_cust_fname" size="13" value="<?php echo $customer->cust_fname ?>" /></td>
	                         			</tr>
										<tr >
											<td colspan="4"><label>Street Address:</label></td>
										</tr>
										<tr>
											<td colspan="4"><textarea style="width: 100%; height: 50px" name="use_cust_address" rows="3" cols="3"><?php echo $customer->cust_address ?></textarea></td>
										</tr>
										<tr>
											<td class="oneline" colspan="4"><label>City:</label><input type="text" name="use_cust_city" size="16" value="<?php echo $customer->cust_city ?>" />
											<label>State:</label><input type="text" name="use_cust_state" style="width: 20px" size="1" value="<?php echo $customer->cust_state ?>" />
											<label>Zip:</label><input type="text" name="use_cust_zip" size="2" value="<?php echo $customer->cust_zip ?>" /></td>
										</tr>
										<tr>
											<td class="oneline" colspan="4"><label>Phone:</label><input type="text" name="use_cust_phone" size="16" value="<?php echo $customer->cust_phone ?>" />
											<label>Fax:</label><input type="text" name="use_cust_fax" size="16" value="<?php echo $customer->cust_fax ?>" /></td>
										</tr>
										<tr>
											<td class="oneline" colspan="4"><label>Email:</label><input type="text" name="use_cust_email" size="23" value="<?php echo $customer->cust_email ?>" /></td>
										</tr>
	                         		</table>
								  
								  <input type="hidden" name="cust_id" value="<?php echo $customer->cust_id ?>" />
	                              <input style="margin-top: 10px;" onclick="return false;" class="button submit_customer_edit_form" type="submit" value="Change Customer Information" />
								  <input id="customer_edit_cancel" onclick="return false;" style="margin-top: 10px;" class="button" type="submit" value="Cancel" />
								  </div>
	                         </form>


