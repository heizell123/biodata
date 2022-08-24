<?= $this->extend('layout/template_utama'); ?>

<?= $this->section('content'); ?>

<div class="row">
	<div class="col-md-12">
		<div class="tabs-vertical-env">
			<ul class="nav tabs-vertical">
				<?= view('my_account/menu_account'); ?>
			</ul>

			<div class="tab-content">
				<div class="tab-pane active" id="tab-1">
					<div class="row">
						<div class="col-md-8">
							<h3><?= $application_counter ?> Latest Application History</h3>
							<table class="table responsive">
								<thead>
									<tr>
										<th>TITLE</th>
										<th>LEVEL</th>
										<th>CLOSING DATE</th>
										<th>LOCATION</th>
										<th>STATUS</th>
										<th>&nbsp;</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($application as $value) { ?>
										<tr>
											<td><?= $value['job_position']?></td>
											<td><?= $value['level_name']?></td>
											<td><?= $value['expired_date']?></td>
											<td><?= $value['location_name']?></td>
											<td><?= $value['flag_name']?></td>
											<td>
												<a href="<?= base_url()?>/My_account/appDetail/<?=$value['noapp']?>" class="btn btn-info">Detail</a>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8">
							<h3><?= $save_vacancy_counter ?> Latest Saved Jobs</h3>
							<table class="table responsive">
								<thead>
									<tr>
										<th>TITLE</th>
										<th>LEVEL</th>
										<th>CLOSING DATE</th>
										<th>LOCATION</th>
										<th>&nbsp;</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($save_vacancy as $value) {
										if($value['flag_application']==TRUE){
											$class1 = "btn btn-danger";
											$class2 = "";
											$nama 	= "Applied";
										}else{
											$class1 = "btn btn-primary";
											$class2 = "entypo-paper-plane";
											$nama 	= "Apply Now";
										}
										?>
										<tr>
											<td><?= $value['job_position']?></td>
											<td><?= $value['level_name']?></td>
											<td><?= $value['expired_date']?></td>
											<td><?= $value['location_name']?></td>
											<td>
												<button class="<?= $class1?>" onclick="apply('<?= $value['jv_id']?>')" id="apply<?= $value['jv_id']?>"> <i class="<?= $class2?>"></i> <?= $nama ?></button>
												<a href="<?= base_url()?>/Front_end/viewDetail/<?=$value['jv_id']?>" class="btn btn-info">Detail</a>
												<button class="btn btn-warning" onclick="del('<?= $value['jv_id']?>')" >Delete</button>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function apply(jv_id) {

		$.ajax({
			type: "GET",
			url: '<?= base_url()?>/Front_end/apply?jv_id='+jv_id,
			success: function(response){

				var data = JSON.parse(response);
				var status = data.status;
				if(status =="added"){
					$("#apply"+jv_id).attr('class', 'btn btn-danger');
					$("#apply"+jv_id).html('Applied');
					Swal.fire(
						'Success',
						'Success',
						'success'
						);
				}else if(status == "exist"){
					Swal.fire(
						'Status Apply',
						'Application Already Exist',
						'error'
						);

				}else if(status == "error"){
					Swal.fire(
						'Status Apply',
						'Login required',
						'error'
						);

				}
			}
		});
	}

	function del(jv_id) {
		$.ajax({
			type: "GET",
			url: '<?= base_url()?>/Front_end/bookmarked?jv_id='+jv_id,
			success: function(response){

				var data = JSON.parse(response);
				var status = data.status;
				if(status =="deleted"){
					location.reload();
					Swal.fire(
						'Success deleted saved vacancy',
						'success',
						'success'
						);

				}else if(status == "error"){
					Swal.fire(
						'Status Apply',
						'Login required',
						'error'
						);

				}
			}
		});
	}
</script>

<?= $this->endSection(); ?>