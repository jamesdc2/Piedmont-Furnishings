<h2>Support</h2>
<p>Use the form below and an email will be sent to a person in technical support who will
 assist you. A confirmation email will be sent back to the provided email address.</p>
<form id="contact" action="#" method="get">
	<div class="form-padding">
		<label>Email Address:</label><input name="email" size="30" />
		<label>Name:</label><input name="name" type="text" size="30" value="<?php echo $this->session->userdata['emp_fname'].' '.$this->session->userdata['emp_lname']; ?>"/>
		<label>Please describe your issue:</label><textarea rows="10" cols="40" name="message"></textarea>
		<input type="submit" style="margin-top: 10px;" class="button" value="Submit Service Request" onclick="return false;" />
		<input type="button" style="margin-top: 10px;" class="button" onclick="reset(); return false;" value="Reset Form" />
	</div>
</form>
