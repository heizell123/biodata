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
							<div class="panel minimal minimal-gray">

								<div class="panel-heading">
									<div class="panel-title"><h4>Profile</h4></div>
									<div class="panel-options">

										<ul class="nav nav-tabs">
											<?= view('my_account/menu_profile'); ?>
										</ul>
									</div>
								</div>

								<div class="panel-body">

									<div class="tab-content">
										<div class="tab-pane active">

											<div class="panel panel-primary" data-collapsed="0">

												<div class="panel-heading">
													<div class="panel-title">Main Profile</div>

													<div class="panel-options">
														
														<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
													</div>
												</div>

												<div class="panel-body">
													<img src="<?= base_url()?>/vacancy_assets/foto_profile/<?= $user_data[0]['foto_profile']?>" class="img-thumbnail">
													<table class="table table-bordered">
														<tr>
															<td>Name</td>
															<td>
																<?= $user[0]['full_name']?>
															</td>
														</tr>
														<tr>
															<td>Phone Number</td>
															<td>
																<?= $user_data[0]['phone_number']?>
															</td>
														</tr>
														<tr>
															<td>Place Of Birth</td>
															<td>
																<?= $user_data[0]['pob']?>	
															</td>
														</tr>
														<tr>
															<td>Date Of Birth</td>
															<td>
																<?= viewDate($user_data[0]['dob'])?>
															</td>
														</tr>
														<tr>
															<td>Religion</td>
															<td>
																<?php 
																foreach ($religion as $value) {
																	$exist = $value['religion_id'] == $user_data[0]['religion_id']?'exist':'';
																	if($exist=='exist'){
																		echo $value['name'];
																	}
																} 
																?>	
															</td>
														</tr>
														<tr>
															<td>Tax/ Marital Status</td>
															<td>
																<?php 
																foreach ($marital as $value) {
																	$exist = $value['marital_id'] == $user_data[0]['marital_id']?'exist':'';
																	if($exist == 'exist'){
																		echo $value['name'];
																	}
																} 
																?>
															</td>
														</tr>
														<tr>
															<td>Major</td>
															<td>
																<?php 
																foreach ($major as $value) {
																	$exist = $value['major_id'] == $user_data[0]['major_id']?'exist':'';
																	if($exist == 'exist'){
																		echo $value['name'];
																	}
																} 
																?>
															</td>
														</tr>
													</table>

												</div>

											</div>


											<div class="panel panel-primary panel-collapse" data-collapsed="1">

												<div class="panel-heading">
													<div class="panel-title">Address</div>

													<div class="panel-options">
														
														<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
													</div>
												</div>

												<div class="panel-body" >
													<table class="table table-bordered">
														<tr>
															<td>Address</td>
															<td>
																<?= $user[0]['address']?>
															</td>
														</tr>
														<tr>
															<td>RT</td>
															<td>
																<?= $user_data[0]['rt']?>
															</td>
														</tr>
														<tr>
															<td>RW</td>
															<td>
																<?= $user_data[0]['rw']?>
															</td>
														</tr>
														<tr>
															<td>Village</td>
															<td>
																<?= $user_data[0]['village']?>
															</td>
														</tr>
														<tr>
															<td>Sub District</td>
															<td>
																<?= $user_data[0]['sub_district']?>
															</td>
														</tr>
														<tr>
															<td>City</td>
															<td>
																<?php 
																foreach ($location as $value) {
																	$exist = $value['location_id'] == $user_data[0]['location_id']?'exist':'';
																	if($exist == 'exist'){
																		echo $value['name'];
																	}
																} 
																?>
															</td>
														</tr>
													</table>

												</div>

											</div>



											<div class="panel panel-primary panel-collapse" data-collapsed="1">

												<div class="panel-heading">
													<div class="panel-title">Education History</div>

													<div class="panel-options">
														
														<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
													</div>
												</div>

												<div class="panel-body" >
													<h3>Education History</h3>
													<table class="table table-bordered">
														<thead>
															<tr>
																<td>Start Year</td>
																<td>End Year</td>
																<td>Level</td>
																<td>Name</td>
																<td>Major</td>
																<td>GPA</td>
															</tr>
														</thead>
														<tbody>
															<?php foreach ($education_history as $value) {?>
																<tr>
																	<td><?= $value['start_year']?></td>
																	<td><?= $value['end_year']?></td>
																	<td><?= $value['edu_name']?></td>
																	<td><?= $value['univ_name']?></td>
																	<td><?= $value['major_name']?></td>
																	<td><?= $value['gpa']?></td>
																</tr>
															<?php } ?>
														</tbody>
													</table>

													<h3>Language Skill</h3>
													<table class="table table-bordered">
														<thead>
															<tr>
																<td>Language</td>
																<td>Level</td>
															</tr>
														</thead>
														<tbody>
															<?php foreach ($language_user as $value) {?>
																<tr>
																	<td><?= $value['lang_name']?></td>
																	<td><?= $value['ll_name']?></td>
																</tr>
															<?php } ?>
														</tbody>
													</table>

												</div>

											</div>


											<div class="panel panel-primary panel-collapse" data-collapsed="1">

												<div class="panel-heading">
													<div class="panel-title">Work Experience</div>

													<div class="panel-options">
														
														<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
													</div>
												</div>

												<div class="panel-body" >
													<table class="table table-bordered">
														<thead>
															<tr>
																<td>Start Period</td>
																<td>End Period</td>
																<td>Company Name</td>
																<td>Salary</td>
															</tr>
														</thead>
														<tbody>
															<?php foreach ($work_experience as $value) {?>
																<tr>
																	<td><?= viewDate($value['start_period'])?></td>
																	<td><?= viewDate($value['end_period'])?></td>
																	<td><?= $value['company_name']?></td>
																	<td><?= $value['salary']?></td>
																</tr>
															<?php } ?>
														</tbody>
													</table>

												</div>

											</div>

											<div class="panel panel-primary panel-collapse" data-collapsed="1">

												<div class="panel-heading">
													<div class="panel-title">Family Structure</div>

													<div class="panel-options">
														
														<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
													</div>
												</div>

												<div class="panel-body" >
													<table class="table table-bordered">
														<thead>
															<tr>
																<td>Relationship</td>
																<td>Name</td>
																<td>Gender</td>
															</tr>
														</thead>
														<tbody>
															<?php foreach ($family_user as $value) {?>
																<tr>
																	<td><?= $value['relationship']?></td>
																	<td><?= $value['name']?></td>
																	<td><?= $value['gender']?></td>
																</tr>
															<?php } ?>
														</tbody>
													</table>

												</div>

											</div>

											<div class="panel panel-primary panel-collapse" data-collapsed="1">

												<div class="panel-heading">
													<div class="panel-title">Additional Information</div>

													<div class="panel-options">
														
														<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
													</div>
												</div>

												<div class="panel-body" >
													<h3>Expected Salary : IDR <?= numFormat($user_data[0]['expected_salary'])?></h3>
													<table class="table table-bordered">
														<thead>
															<td>Name</td>
															<td>Relation</td>
															<td>Position</td>
														</thead>
														<tbody>
															<?php foreach ($ref_internal as $value){ ?>
																<tr>
																	<td><?= $value['name']?></td>
																	<td><?= $value['relation']?></td>
																	<td><?= $value['position']?></td>
																</tr>	
															<?php } ?>
														</tbody>
													</table>

												</div>

											</div>


											<div class="row">
												<div class="col-md-12">
													<div class="col-md-4">
														
													</div>
													<div class="col-md-4">
														<a href="<?= base_url()?>/my-account/profile/edit"><button class="btn btn-info btn-lg btn-block">Edit Profile</button></a>
													</div>
													<div class="col-md-4">
														
													</div>
												</div>
											</div>
											
										</div>

									</div>

								</div>

							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>




	<?= $this->endSection(); ?>