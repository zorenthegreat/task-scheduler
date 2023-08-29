
<div class="form-group">
	<label for="title" class="control-label">Title</label>
	<input type="text" name="title2" id="title2" class="form-control form-control-sm rounded-0" required/>
</div>  

<div class="form-group">
	<label for="schedule_from" class="control-label">DRY RUN</label>
	<input type="datetime-local" min="<?= date("Y-m-d\TH:i") ?>" name="dry_run" id="dry_run" class="form-control form-control-sm rounded-0" value="<?php echo isset($dry_run) ? date("Y-m-d\TH:i", strtotime($dry_run)) : 0; ?>"  required/>
</div>
<div class="form-group">
	<label for="live" class="control-label">Livestreaming</label>
	<select  name="live" id="live" class="form-control form-control-sm rounded-0" required>
		<option value="">-- Select One --</option>
		<option value="none">none</option>
		<option value="Facebook">Facebook</option>
		<option value="Youtube">Youtube</option>
		<option value="TLC">TLC</option>
	</select>
</div>
<div class="form-group  ">
	<label for="record" class="control-label">Recording </label>
	<select name="record" id="record" class="form-control form-control-sm rounded-0" required>
		<option value="">-- Select One --</option>
		<option value="yes">Yes
		</option>
		<option value="no">No</option>
		<?php echo $record; ?>
	</select>
</div>
<div class="form-group  hidetech">
	<label for="ass" class="control-label">Tech Assistant(TCET/if others,pls specify)</label>
	<input type="text" name="ass" id="ass" class="form-control form-control-sm rounded-0" value="<?php echo isset($ass) ? $ass : ''; ?>"  required/>
</div>

<div class="form-group hidehost"  >
	<label for="host" class="control-label">Zoom Host/Co-Host</label>
	<input type="text" name="host" id="host" class="form-control form-control-sm rounded-0" value="<?php echo isset($host) ? $host : ''; ?>"  required/>
</div>


