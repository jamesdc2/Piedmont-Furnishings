

<div style="text-align:center"><h2>Order Information</h2></div>

<table style="margin-left: auto; margin-right: auto">
	
	<tr>
	<th style="width: 120px" class="first">Field Name</th>
	<th style="width: 120px">New Value</th>
	</tr>
	<h3>The following changes were successfully made to the database:</h3>
	<tr class="row-a">
		<td class="first">Order Number</td>
		<td><?php echo isset($params['order_num']) ? $params['order_num'] : $order_id; ?></td>	
	</tr>
	
	<tr class="row-b">
		<td class="first">Order Date</td>
		<td><?php echo $params['order_date'] ?></td>	
	</tr>
	
	<tr class="row-a">
		<td class="first">Customer</td>
		<td><?php echo $params['customer'] ?></td>	
	</tr>
	
	<tr class="row-b">
		<td class="first">Sales Agent</td>
		<td><?php echo $params['sales_agent'] ?></td>	
	</tr>
	
	<tr class="row-a">
		<td class="first">Order Status</td>
		<td><?php echo $params['order_status'] ?></td>	
	</tr>
	
	<tr class="row-b">
		<td class="first">Total Order Amount</td>
		<td><?php echo $params['total_order'] ?></td>	
	</tr>
	
	<?php
		$c = 1;
		foreach($params as $key => $value)
		{
			$type = "row-a";
			if($c++ % 2 == 0)
			{
				$type = "row-b";
			}
			if(strpos($key, 'od_') === 0)
			{
				if($value != '')
				{
					echo '<tr class="'.$type.'">';
					echo '<td class="first">'.$key.'</td>';
					echo '<td>'.$value.'</td>';
					echo '</tr>';
				}
			}
		}
	
	?>
	
	
	
	
</table>