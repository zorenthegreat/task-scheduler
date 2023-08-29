<?php

require_once('../../config.php');
if (isset($_GET['id']) && $_GET['id'] > 0) {
	$qry = $conn->query("SELECT * from `schedule_list` where id = '{$_GET['id']}' ");
	if ($qry->num_rows > 0) {
		foreach ($qry->fetch_assoc() as $k => $v) {
			$$k = $v;
		}
	}
}
?>

<body onload="hyflex()">
	<div class="container-fluid">
		<form action="" id="schedule-form">
			<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
			<div class="form-group">
				<label for="category_id" class="control-label">Category</label>
				<select name="category_id" id="category_id" class="form-control form-control-sm rounded-0" required>
					<option>Zoom</option>
					<option>Webinar</option>
					<option>Hyflex-setup</option>
				</select>
			</div>
			<div class="form-group">
				<label for="title" class="control-label">Title</label>
				<input type="text" name="title" id="title" class="form-control form-control-sm rounded-0" value="<?php echo isset($title) ? $title : ''; ?>" required />
			</div>

			<div class="form-group">
				<label for="names" class="control-label">Contact Person</label>
				<input type="text" name="contact_person" id="contact_person" class="form-control form-control-sm rounded-0" value="<?php echo isset($names) ? $names : ''; ?>" required />
			</div>

			<div class="form-group">
				<label for="emails" class="control-label">Email Address</label>
				<input type="text" name="emails" id="emails" class="form-control form-control-sm rounded-0" value="<?php echo isset($emails) ? $emails : ''; ?>" required />
			</div>

			<div class="form-group">
				<label for="college" class="control-label">College</label>
				<input type="text" name="college" id="college" class="form-control form-control-sm rounded-0" value="<?php echo isset($college) ? $college : ''; ?>" required />
			</div>

			<div class="form-group hides">
				<label for="setup_type" class="control-label">Setup Type</label>
				<select name="setup_type" id="setup_type" class="form-control form-control-sm rounded-0" required>
					<option>Conference Type</option>
					<option>Seminar Type</option>
					<option>Social Event Type</option>
				</select>
			</div>



			<div class="form-group">
				<label for="schedule_from" class="control-label">DRY RUN</label>
				<input type="datetime-local" min="<?= date("Y-m-d\TH:i") ?>" name="dry_run" id="dry_run" class="form-control form-control-sm rounded-0" value="<?php echo isset($dry_run) ? date("Y-m-d\TH:i", strtotime($dry_run)) : 0; ?>" required />
			</div>

			<div class="form-group Break_out_room">
				<label for="Break_out_room" class="control-label">Break-out room</label>
				<select name="Break_out_room" id="Break_out_room" class="form-control form-control-sm rounded-0" required>
					<option value="">-- Select One --</option>
					<option value="Yes">Yes</option>
					<option value="Yes">No</option>
				</select>
			</div>

			<div class="form-group">
				<label for="live" class="control-label">Livestreaming</label>
				<select name="live" id="live" class="form-control form-control-sm rounded-0" required>
					<option value="">-- Select One --</option>
					<option value="none">none</option>
					<option value="Facebook">Facebook</option>
					<option value="Youtube">Youtube</option>
					<option value="TLC">TLC</option>
				</select>
			</div>




			<div class="form-group listhide">
				<label for="panel" class="control-label ">List of Panelist</label>
				<input type="text" name="panel" id="panel" class="form-control form-control-sm rounded-0" value=" <?php echo isset($panel) ? $panel : ''; ?>" required />
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
				<input type="text" name="ass" id="ass" class="form-control form-control-sm rounded-0" value="<?php echo isset($ass) ? $ass : ''; ?>" required />
			</div>

			<div class="form-group hidehost">
				<label for="host" class="control-label">Zoom Host/Co-Host</label>
				<input type="text" name="host" id="host" class="form-control form-control-sm rounded-0" value="<?php echo isset($host) ? $host : ''; ?>" required />
			</div>

			<div class="form-group hides">
				<label for="venue" class="control-label">Venue/Location</label>
				<input type="text" name="venue" id="venue" class="form-control">
			</div>

			<div class="row">
				<div class="form-group">
					<label for="schedule_from" class="control-label">Schedule Start</label>
					<input type="datetime-local" min="<?= date("Y-m-d\TH:i") ?>" name="schedule_from" id="schedule_from" class="form-control form-control-sm rounded-0" value="<?php echo isset($schedule_from) ? date("Y-m-d\TH:i", strtotime($schedule_from)) : 0; ?>" required />
				</div>
				&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<div class="form-group ">
					<label for="schedule_to" class="control-label">Schedule End</label>
					<input type="datetime-local" min="<?= date("Y-m-d\TH:i") ?>" name="schedule_to" id="schedule_to" class="form-control form-control-sm rounded-0" value="<?php echo isset($schedule_to) ? date("Y-m-d\TH:i", strtotime($schedule_to)) : 0; ?>" required />
				</div>

				<div class="form-group hides">
					<label class="control-label">Services</label><br>
					<label class="radio-inline">
						<input type="radio" name="services" id="rdo_zoom" onchange="hyflex()" value="zoom" required> ZOOM
					</label>
					<label class="radio-inline">
						<input type="radio" name="services" id="rdo_webinar" onchange="hyflex()" value="webinar" required> WEBINAR
					</label>
					<label class="radio-inline">
						<input type="radio" name="services" onchange="hyflex()" value="none" required> NONE
					</label>
				</div>
			</div>


			<div id="hyflex_web" style="display: none;">

				<div class="form-group">
					<label for="title" class="control-label">Title</label>
					<input type="text" name="title2" id="title2" class="form-control form-control-sm rounded-0" required />
				</div>

				<div class="form-group">
					<label for="schedule_from" class="control-label">DRY RUN</label>
					<input type="datetime-local" min="<?= date("Y-m-d\TH:i") ?>" name="dry_run2" id="dry_run2" class="form-control form-control-sm rounded-0" value="<?php echo isset($dry_run) ? date("Y-m-d\TH:i", strtotime($dry_run)) : 0; ?>" required />
				</div>
				<div class="form-group">
					<label for="live" class="control-label">Livestreaming</label>
					<select name="live2" id="live2" class="form-control form-control-sm rounded-0" required>
						<option value="">-- Select One --</option>
						<option value="none">none</option>
						<option value="Facebook">Facebook</option>
						<option value="Youtube">Youtube</option>
						<option value="TLC">TLC</option>
					</select>
				</div>
				<div class="form-group">
					<label for="record" class="control-label">Recording </label>
					<select name="record2" id="record2" class="form-control form-control-sm rounded-0" required>
						<option value="">-- Select One --</option>
						<option value="yes">Yes
						</option>
						<option value="no">No</option>
						<?php echo $record; ?>
					</select>
				</div>
				<div class="form-group" id="not_zoom">
					<label for="panel" class="control-label ">List of Panelist</label>
					<input type="text" name="panel2" id="panel2" class="form-control form-control-sm rounded-0" value=" <?php echo isset($panel) ? $panel : ''; ?>" required />
				</div>
				<div class="form-group">
					<label for="ass" class="control-label">Tech Assistant(TCET/if others,pls specify)</label>
					<input type="text" name="ass2" id="ass2" class="form-control form-control-sm rounded-0" value="<?php echo isset($ass) ? $ass : ''; ?>" required />
				</div>

				<div class="form-group ">
					<label for="host" class="control-label">Zoom Host/Co-Host</label>
					<input type="text" name="host2" id="host2" class="form-control form-control-sm rounded-0" value="<?php echo isset($host) ? $host : ''; ?>" required />
				</div>

			</div>



		</form>
	</div>
	<div id="date_verify">
	</div>
</body>
<script>
	$(document).ready(function() {
		var get = $('#category_id').val();
		if (get == 'Zoom') {
			$('#panel').hide();
			$('.listhide').hide();
			$('.hides').hide();
			$('.hidetitle').show();
			$('.hidetech').show();
			$('.hiderecord').show();
			$('.Break_out_room').hide();
			$('.hidehost').show();

		}

		$('#uni_modal').on('shown.modal.bs', function() {
			$('#category_id').select2({
				placeholder: 'Please Select Category Here',
				width: "100%",
				containerCssClass: "form-control form-control-sm rounded-0"
			})
		})

		$('#category_id').change(function() {
			var get = $('#category_id').val();
			if (get == 'Zoom') {
				$('#panel').hide();
				$('.listhide').hide();
				$('.hides').hide();
				$('.hidetitle').show();
				$('.hidetech').show();
				$('.hidehost').show();
				$('.Break_out_room').hide();
				$('.hiderecord').show();
			} else if (get == 'Webinar') {
				$('#panel').show();
				$('.listhide').show();
				$('.hides').hide();
				$('.hidetitle').show();
				$('.hidepanel').show();
				$('.hidetech').show();
				$('.hidehost').show();
				$('.Break_out_room').hide();
				$('.hiderecord').show();

			} else if (get == 'Hyflex-setup') {

				$('.hides').show();
				$('.shows').hide();

				$('.listhide').hide();
				$('.hidetech').hide();
				$('.hidehost').hide();
				$('.hiderecord').hide();
				$('.Break_out_room').show();
			} else {

			}

		});



		function convertToDatabaseDatetime(inputString) {
			// Extracting components
			var datetimeParts = inputString.split("T");
			var datePart = datetimeParts[0];
			var timePart = datetimeParts[1];

			// Constructing the converted string
			var convertedString = datePart + " " + timePart + ':' + '00';

			return convertedString;
		}
		$('#schedule-form').submit(function(e) {
			e.preventDefault();
			start_loader();
			var category = $('#select2-category_id-container').val(); //
			var title = $('#title').val(); //
			var title2 = $('#title2').val(); //
			var contact_person = $('#contact_person').val(); //
			var email = $('#emails').val(); //
			var college = $('#college').val(); //
			var dry_run = convertToDatabaseDatetime($('#dry_run').val());
			var dry_run2 = convertToDatabaseDatetime($('#dry_run2').val());
			var live = $('#live option:selected').val();
			var live2 = $('#live2 option:selected').val();
			var record = $('#record option:selected').val();
			var record2 = $('#record2 option:selected').val();
			var assistant = $('#ass').val();
			var assistant2 = $('#ass2').val();
			var host = $('#host').val();
			var host2 = $('#host2').val();
			var schedule_from = convertToDatabaseDatetime($('#schedule_from').val());
			var schedule_to = convertToDatabaseDatetime($('#schedule_to').val());
			var setup_type = $('#setup_type option:selected').val();
			var break_out_room = $('#Break_out_room option:selected').val();
			var venue = $('#venue').val();
			var panel2 = $('#panel2').val();

			console.log(schedule_from)
			var mydata = 'category_id=' + category + '&title=' + title + '&title2=' + title2 + '&contact_person=' + contact_person + '&email=' + email + '&college=' + college + '&dry_run=' + dry_run + '&dry_run2=' + dry_run2 + '&live=' + live + '&live2=' + live2 + '&record=' + record + '&record2=' + record2 + '&ass=' + assistant + '&ass2=' + assistant2 + '&host=' + host + '&host2=' + host2 + '&schedule_from=' + schedule_from + '&schedule_to=' + schedule_to + '&setup_type=' + setup_type + '&break_out_room=' + break_out_room + '&venue=' + venue + '&panel2=' + panel2;


			if (title != '' && contact_person != '' && email != '' && college != '') { //

				$.ajax({
					type: 'post',
					url: '../classes/Master.php?f=check_schedule',
					data: {
						schedule_from: schedule_from
					},

					success: function(response) {

						if (response > 0) {
							alert_toast('This date is already scheduled.', 'error');
							end_loader();
						} else {
							$.ajax({
								type: 'post',
								url: '../classes/Master.php?f=save_schedule2',
								data: mydata,

								success: function(response) {

									if (response > 0) {
										alert_toast("New schedule successfully saved");
										end_loader();
										$('#title').val('');
										$('#contact_person').val('');
										$('#emails').val('');
										$('#college').val('');
									}
								}
							})
						}
					}
				})
			} else { //
				alert_toast('All field are mandatory.', 'error'); //
				end_loader();
			} //

			// var _this = $(this)
			// $('.err-msg').remove();
			// start_loader();
			// $.ajax({
			// 	url: _base_url_ + "classes/Master.php?f=save_schedule",
			// 	data: new FormData($(this)[0]),
			// 	cache: false,
			// 	contentType: false,
			// 	processData: false,
			// 	method: 'POST',
			// 	type: 'POST',
			// 	dataType: 'json',
			// 	error: err => {
			// 		console.log(err)
			// 		alert_toast("An error occured", 'error');
			// 		end_loader();
			// 	},
			// 	success: function(resp) {
			// 		if (typeof resp == 'object' && resp.status == 'success') {
			// 			location.reload()
			// 		} else if (resp.status == 'failed' && !!resp.msg) {
			// 			var el = $('<div>')
			// 			el.addClass("alert alert-danger err-msg").text(resp.msg)
			// 			_this.prepend(el)
			// 			el.show('slow')
			// 			$("html, body, .modal").scrollTop(0)
			// 			end_loader()
			// 		} else {
			// 			alert_toast("An error occured", 'error');
			// 			end_loader();
			// 			console.log(resp)
			// 		}
			// 	}
			// })


		})
	})
</script>
<script>
	function hyflex() {
		if (document.getElementById('rdo_zoom').checked) {
			document.getElementById('hyflex_web').style.display = 'block';
			document.getElementById('not_zoom').innerHTML = '';
		} else {}


		if (document.getElementById('rdo_webinar').checked) {
			document.getElementById('hyflex_web').style.display = 'block';
			document.getElementById('not_zoom').innerHTML = '<label for="panel" class="control-label " >List of Panelist</label>			<input type="text" name="panel2" id="panel2" class="form-control form-control-sm rounded-0" required/>';
		} else {
			document.getElementById('not_zoom').innerHTML = '';
		}
	}
</script>