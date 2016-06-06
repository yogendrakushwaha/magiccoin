<table>
	<thead>
		<tr>
			<th>Date</th>
			<th>User Id</th>
			<th>Description</th>
			<th>Credit</th>
			<th>Debit</th>
			<th>Current Balance</th>
		</tr>
	</thead>
	<tbody>
		<?php
			foreach($user_details as $rows)
			{ 
			?>
			<tr>
				<td><?php echo $rows->LEDGER_DATETIME; ?></td>
				<td><?php echo $rows->LEDGER_USERID; ?></td>
				<td><?php echo $rows->LEDGER_DESC; ?></td>
				<td><?php echo $rows->LEDGER_CR; ?></td>
				<td><?php echo $rows->LEDGER_DR; ?></td>
				<td><?php echo $rows->LEDGER_CURRBAL; ?></td>
			</tr>   
			<?php 
			}
		?> 
	</tbody>
</table>