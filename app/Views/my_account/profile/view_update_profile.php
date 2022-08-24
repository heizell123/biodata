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
													<form id="profile_1" role="form" method="post" class="form-horizontal form-groups validate" enctype="multipart/form-data">
														<div class="col-md-12">
															<div class="col-sm-6">
																<img src="<?= base_url()?>/vacancy_assets/foto_profile/<?= $user_data[0]['foto_profile']?>" class="img-thumbnail">
															</div>
															<div class="col-sm-6">
																<input type="file" name="form-control" name="foto_profile" id="foto_profile" accept=".jpg, .jpeg, png">
																<input type="hidden" name="foto_profile_old" value="<?= $user_data[0]['foto_profile']?>">
																<input type="hidden" name="user_id" value="<?= $user[0]['user_id']?>">
															</div>
														</div>
														
														<table class="table table-bordered">
															<tr>
																<td>Name</td>
																<td>
																	<input type="text" class="form-control" name="full_name" id="full_name" value="<?= $user[0]['full_name']?>" data-validate="required">
																</td>
															</tr>
															<tr>
																<td>Phone Number</td>
																<td>
																	<input type="text" class="form-control" name="phone_number" id="phone_number" value="<?= $user_data[0]['phone_number']?>" data-validate="required,number">
																	
																</td>
															</tr>
															<tr>
																<td>Place Of Birth</td>
																<td>
																	<input type="text" class="form-control" name="pob" id="pob" value="<?= $user_data[0]['pob']?>" data-validate="required">

																</td>
															</tr>
															<tr>
																<td>Date Of Birth</td>
																<td>
																	<input type="text" class="form-control datepicker" name="dob" id="dob" value="<?= viewDate($user_data[0]['dob'])?>" data-validate="required" readonly data-start-view="2">
																</td>
															</tr>
															<tr>
																<td>Religion</td>
																<td>
																	<select name="religion_id" id="religion_id" class="form-control" data-validate='required'>
																		<option value="">Please Choose</option>
																		<?php 
																		foreach ($religion as $value) {
																			$select = $value['religion_id'] == $user_data[0]['religion_id']?'selected':'';
																			echo '<option value="'.$value['religion_id'].'"'.$select.'>'.$value['name'].'</option>';
																		} 
																		?>
																	</select>	
																</td>
															</tr>
															<tr>
																<td>Tax/ Marital Status</td>
																<td>
																	<select name="marital_id" id="marital_id" class="form-control" data-validate='required'>
																		<option value="">Please Choose</option>
																		<?php 
																		foreach ($marital as $value) {
																			$select = $value['marital_id'] == $user_data[0]['marital_id']?'selected':'';
																			echo '<option value="'.$value['marital_id'].'"'.$select.'>'.$value['name'].'</option>';
																		} 
																		?>
																	</select>
																	
																</td>
															</tr>
															<tr>
																<td>Major</td>
																<td>
																	<select name="major_id" id="major_id" class="form-control" data-validate='required'>
																		<option value="">Please Choose</option>
																		<?php 
																		foreach ($major as $value) {
																			$select = $value['major_id'] == $user_data[0]['major_id']?'selected':'';
																			echo '<option value="'.$value['major_id'].'"'.$select.'>'.$value['name'].'</option>';
																		} 
																		?>
																	</select>
																</td>
															</tr>
														</table>
														<div class="row">
															<div class="col-md-12">
																<div class="col-md-4">

																</div>
																<div class="col-md-4">
																	<button type="button" class="btn btn-info btn-lg btn-block" onclick="saveProfile(1)">Save</button>
																</div>
																<div class="col-md-4">

																</div>
															</div>
														</div>
													</form>

												</div>

											</div>


											<div class="panel panel-primary panel-collapse" data-collapsed="0">

												<div class="panel-heading">
													<div class="panel-title">Address</div>

													<div class="panel-options">
														
														<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
													</div>
												</div>

												<div class="panel-body" >
													<form id="profile_2" role="form" method="post" class="form-horizontal form-groups validate" enctype="multipart/form-data">

														<input type="hidden" name="user_id" value="<?= $user[0]['user_id']?>">
														<table class="table table-bordered">
															<tr>
																<td>Address</td>
																<td>
																	<textarea class="form-control" name="address" id="address" data-validate="required"><?= $user_data[0]['address']?></textarea>
																</td>
															</tr>
															<tr>
																<td>RT</td>
																<td>
																	<input type="text" class="form-control" name="rt" id="rt" value="<?= $user_data[0]['rt']?>" data-validate="required">
																	
																</td>
															</tr>
															<tr>
																<td>RW</td>
																<td>
																	<input type="text" class="form-control" name="rw" id="rw" value="<?= $user_data[0]['rw']?>" data-validate="required">
																</td>
															</tr>
															<tr>
																<td>Village</td>
																<td>
																	<input type="text" class="form-control" name="village" id="village" value="<?= $user_data[0]['village']?>" data-validate="required">
																</td>
															</tr>
															<tr>
																<td>Sub District</td>
																<td>
																	<input type="text" class="form-control" name="sub_district" id="sub_district" value="<?= $user_data[0]['sub_district']?>" data-validate="required">
																</td>
															</tr>
															<tr>
																<td>City</td>
																<td>
																	<select name="location_id" id="location_id" class="select2" data-validate='required'>
																		<option value="">Please Choose</option>
																		<?php 
																		foreach ($location as $value) {
																			$select = $value['location_id'] == $user_data[0]['location_id']?'selected':'';
																			echo '<option value="'.$value['location_id'].'"'.$select.'>'.$value['name'].'</option>';
																		} 
																		?>
																	</select>
																</td>
															</tr>
														</table>
														<div class="row">
															<div class="col-md-12">
																<div class="col-md-4">

																</div>
																<div class="col-md-4">
																	<button type="button" class="btn btn-info btn-lg btn-block" onclick="saveProfile(2)">Save</button>
																</div>
																<div class="col-md-4">

																</div>
															</div>
														</div>
													</form>

												</div>

											</div>



											<div class="panel panel-primary panel-collapse" data-collapsed="0">

												<div class="panel-heading">
													<div class="panel-title">Education History</div>

													<div class="panel-options">
														
														<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
													</div>
												</div>

												<div class="panel-body" >

													<form id="profile_3" role="form" method="post" class="form-horizontal form-groups validate" enctype="multipart/form-data">
														<h3>Education History</h3>
														<?php 
														$date_now = date('Y');
														$date_old = $date_now-4;
														?>
														<table class="table table-bordered" id="edu_table">
															<thead>
																<tr>
																	<td width="10%">Start Year</td>
																	<td width="10%">End Year</td>
																	<td width="20%">Level</td>
																	<td>University/ School</td>
																	<td>Major</td>
																	<td width="9%">GPA</td>
																	<td>
																		<button type="button" class="btn btn-success" onclick="addRowE()"><i class="entypo-plus"></i></button>
																	</td>
																</tr>
															</thead>
															<tbody>
																<?php foreach ($education_history as $key=>$value) {?>
																	<tr id="tr<?= $key+1?>">
																		<td>
																			<input type="text" name="start_year[]" id="start_year<?= $key+1?>" class="form-control" placeholder="<?= $date_old?>" value="<?= $value['start_year']?>" data-validate="required,number,maxlength[4]">
																		</td>
																		<td>
																			<input type="text" name="end_year[]" id="end_year<?= $key+1?>" class="form-control" placeholder="<?= $date_now?>" value="<?= $value['end_year']?>" data-validate="required,number,maxlength[4]">
																		</td>
																		<td>
																			<select name="edu_id[]" id="edu_id<?= $key+1?>" class="form-control" data-validate='required'>
																				<option value="">Please Choose</option>
																				<?php foreach ($education as $val) {
																					$select = $val['edu_id']==$value['edu_id']?"selected":"";
																					?>
																					<option value="<?= $val['edu_id']?>" <?= $select?>><?= $val['name']?></option>
																				<?php } ?>
																			</select>
																		</td>
																		<td>
																			<input type="text" name="univ_name[]" id="univ_name<?= $key+1?>" class="form-control" value="<?= $value['univ_name']?>" placeholder="University/ School" data-validate='required'>
																		</td>
																		<td>
																			<select class="select2" name="major_id[]" id="major_id<?= $key+1?>" data-validate='required'>
																				<option value="">Please Choose</option>
																				<?php foreach ($major as $val) {
																					$select = $val['major_id']==$value['major_id']?"selected":"";
																					?>
																					<option value="<?= $val['major_id']?>" <?= $select?>><?= $val['name']?></option>
																				<?php } ?>
																			</select>
																		</td>
																		<td>
																			<input type="text" name="gpa[]" id="gpa<?= $key+1?>" class="form-control" value="<?= $value['gpa']?>" placeholder="0.00" data-validate='required,maxlength[4]'></td>
																			<td>
																				<?php if ($key+1!=1) {?>
																					<button type="button" onclick="delEdu('<?= $key+1?>')" class="btn btn-danger">-</button>
																				<?php } ?>
																			</td>
																		</tr>

																	<?php } ?>
																</tbody>
															</table>
															<div class="row">
																<div class="col-md-12">
																	<div class="col-md-4">

																	</div>
																	<div class="col-md-4">
																		<button type="button" class="btn btn-info btn-lg btn-block" onclick="saveProfile(3)">Save</button>
																	</div>
																	<div class="col-md-4">

																	</div>
																</div>
															</div>
														</form>

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


											<div class="panel panel-primary panel-collapse" data-collapsed="0">

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

											<div class="panel panel-primary panel-collapse" data-collapsed="0">

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

<script type="text/javascript">

	var siteUrl ="<?= base_url()?>";

	function saveProfile(i) {
		if(i==1){
			if($("#profile_1").valid()){
				$("#profile_1").submit();
			}	
		}else if(i==2){
			if($("#profile_2").valid()){
				$("#profile_2").submit();
			}
		}else if(i==3){
			if($("#profile_3").valid()){
				$("#profile_3").submit();
			}
		}
	}

	$("#profile_1").submit(function(e){
		e.preventDefault();
		var file_data = $('#foto_profile').prop('files')[0];   
		var form_data = new FormData(this);                 
		form_data.append('foto_profile', file_data);
		$.ajax({
			url : siteUrl + '/My_account/saveProfile/1',
			type : 'POST',
			data : form_data,
			processData : false, 
			contentType : false, 
			beforeSend: function(){
				Swal.fire("Please Wait ...");
			},
			success: function(response){

				res = JSON.parse(response);
				var status = res.status;
				if(status == "failed"){
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Incorrect Email Or Password!'
					});
				}else if(status == "success"){
					Swal.fire({
						icon: 'success',
						title: 'Success'
					}).then((result)=>{
						window.location.reload();
					});
				}else{
					Swal.fire({
						icon: 'error',
						title: 'Contact IT'
					});
				}


			},
			error: function(){      

			}
		});
	});

	$("#profile_2").submit(function(e){
		e.preventDefault();
		$.ajax({
			url : siteUrl + '/My_account/saveProfile/2',
			type : 'POST',
			data : new FormData(this),
			processData : false, 
			contentType : false, 
			beforeSend: function(){
				Swal.fire("Please Wait ...");
			},
			success: function(response){

				res = JSON.parse(response);
				var status = res.status;
				if(status == "failed"){
					var message = res.message;
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: ''+message
					});
				}else if(status == "success"){
					Swal.fire({
						icon: 'success',
						title: 'Success'
					}).then((result)=>{
						window.location.reload();
					});
				}else{
					Swal.fire({
						icon: 'error',
						title: 'Contact IT'
					});
				}


			},
			error: function(){      

			}
		});
	});
	$("#profile_3").submit(function(e){
		e.preventDefault();
		$.ajax({
			url : siteUrl + '/My_account/saveProfile/3',
			type : 'POST',
			data : new FormData(this),
			processData : false, 
			contentType : false, 
			beforeSend: function(){
				Swal.fire("Please Wait ...");
			},
			success: function(response){

				res = JSON.parse(response);
				var status = res.status;
				if(status == "failed"){
					var message = res.message;
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: ''+message
					});
				}else if(status == "success"){
					Swal.fire({
						icon: 'success',
						title: 'Success'
					}).then((result)=>{
						window.location.reload();
					});
				}else{
					Swal.fire({
						icon: 'error',
						title: 'Contact IT'
					});
				}


			},
			error: function(){      

			}
		});
	});


	function addRowE(){
		var tbl                     = document.getElementById('edu_table');
		var theBodyTable            = tbl.tBodies[0];
		var RowsLength              = theBodyTable.rows.length;
		var row                     = theBodyTable.insertRow(RowsLength);       
		var LastIteration           = RowsLength +1 ;

		row.setAttribute('align','left');
		row.setAttribute('id' ,'tr' + LastIteration);


		var cellRight = row.insertCell(0);
		var el1 = document.createElement('input');
		el1.type = 'text';
		el1.name = 'start_year[]';
		el1.id = 'start_year'+LastIteration;
		el1.className = "form-control";
		el1.placeholder = "<?= $date_old?>";
		cellRight.appendChild(el1);

		var cellRight = row.insertCell(1);
		var el1 = document.createElement('input');
		el1.type = 'text';
		el1.name = 'end_year[]';
		el1.id = 'end_year'+LastIteration;
		el1.className = "form-control";
		el1.placeholder = "<?= $date_now?>";
		cellRight.appendChild(el1);


		var cellRightSel = row.insertCell(2);
		var sel = document.createElement('select');
		sel.name = 'edu_id[]';
		sel.id = 'edu_id' + LastIteration;
		sel.options[0] = new Option("Please Choose", "");
		<?php 
		$a=1;
		foreach( $education as $val ){ ?>
			sel.options[<?=$a;?>] = new Option("<?=$val['name'];?>", "<?=$val['edu_id'];?>");
			<?php
			$a++;
		} ?>
		sel.className="form-control";
		cellRightSel.appendChild(sel);

		var cellRight = row.insertCell(3);
		var el1 = document.createElement('input');
		el1.type = 'text';
		el1.name = 'univ_name[]';
		el1.id = 'univ_name'+LastIteration;
		el1.className = "form-control";
		el1.placeholder = "University/ School";
		cellRight.appendChild(el1);

		var cellRightSel = row.insertCell(4);
		var sel = document.createElement('select');
		sel.name = 'major_id[]';
		sel.id = 'major_id' + LastIteration;
		sel.options[0] = new Option("Please Choose", "");
		<?php 
		$a=1;
		foreach( $major as $valu ){ ?>
			sel.options[<?=$a;?>] = new Option("<?=$valu['name'];?>", "<?=$valu['major_id'];?>");
			<?php
			$a++;
		} ?>
		sel.className="form-control";
		cellRightSel.appendChild(sel);

		var cellRight = row.insertCell(5);
		var el1 = document.createElement('input');
		el1.type = 'text';
		el1.name = 'gpa[]';
		el1.id = 'gpa'+LastIteration;
		el1.className = "form-control";
		el1.placeholder = "0.00";
		cellRight.appendChild(el1);

		var cellRight = row.insertCell(6);
		cellRight.style.textAlign = "center";
		var el1 = document.createElement('button');
		el1.type='button';
		el1.className= 'btn btn-danger btn-sm';
		el1.id='removeBtnPk';
		el1.textContent="-";
		el1.onclick    = function(){delEdu(LastIteration);};
		cellRight.appendChild(el1);

    $('#major_id'+LastIteration).select2();


	}

	function delEdu(row){
		$("#tr"+row).remove();
	}
</script>



<?= $this->endSection(); ?>