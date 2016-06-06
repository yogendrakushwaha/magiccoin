<select name="ddperfect" id="ddperfect" class="form-control" parsley-required="true">
	<option value="">Select</option>
	<?php
	foreach($rec->result() as $row)
	{
	?>
	<option value="<?php echo $row->m_pfect_id; ?>"><?php echo $row->m_pfect_acc." - ".$row->curr_type; ?></option>
	<?php
	}
	?>
</select>