<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<h1>Gallery Customer</h1>
<a href="<?=base_url('/index.php/Master/Master_gallery/add_form_gc') ?>"><button class="btn btn-info pull-right link" style="margin-right:10px;"><i class="entypo-plus"> &nbsp Add Gallery Customer</i></button></a>
<br>
<br>
<div class="row">
	<?php if (!empty(session()->getFlashdata('success'))) { ?>
		<div class="form-group"> <div class="alert alert-success"><strong>Alert!</strong>
			<?php echo session()->getFlashdata('success'); ?></div>
		</div>
	<?php } ?>
	<?php if (!empty(session()->getFlashdata('error'))) { ?>
		<div class="form-group"> <div class="alert alert-danger"><strong>Alert!</strong>
			<?php echo session()->getFlashdata('error'); ?></div>
		</div>
	<?php } ?>	
</div>
<div id="table-2_wrapper" class="dataTables_wrapper form-inline" role="grid">
	
	<table class="table table-bordered table-striped datatable " id="myTable">
		<thead>
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Image Gallery</th>
				<th>Active</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$status="";
			foreach ($gallery_customer as $key=>$value) {
				
			 ?>
				<tr>
					<td><?=$key+1 ?></td>
					<td><?= $value['gallery_name'] ?></td>
					<td><a target="_blank" href="<?= base_url().'/public/resto_assets'?>/assets/img/gallery_customer/<?=$value['gallery_img']?>"> <img src="<?= base_url().'/public/resto_assets'?>/assets/img/gallery_customer/<?=$value['gallery_img']?>" style="width:100px;height:100px;"></a></td>
					<td>
						<?php if($value['active']==1){
							echo 'Yes';
						}else{
							echo 'No';
						} ?>
					</td>
					
					<td>
						<a href="<?=base_url().'/index.php/Master/Master_gallery/edit_form_gc/'.$value['gc_id']?>" class="btn btn-info btn-sm sm-new tooltip-primary" data-toggle="tooltip" data-placement="top" data-original-title="update">
							<i class="entypo-pencil"></i>
						</a>
						<?php if($value['active']==1){ ?>
							<a href="javascript:;" onclick="del_gc('<?= $value['gc_id']?>');" class="btn btn-danger btn-sm sm-new tooltip-primary" data-toggle="tooltip" data-placement="top" data-original-title="InActive">
								<i class="entypo-cancel-circled"></i>
							</a>
						<?php }else{ ?>
							<a href="javascript:;" onclick="active_gc('<?= $value['gc_id']?>');" class="btn btn-success btn-sm sm-new tooltip-primary" data-toggle="tooltip" data-placement="top" data-original-title="Active">
								<i class="entypo-check"></i>
							</a>
						<?php } ?>
					</td>
				</tr>
			<?php } ?>
		</tbody>

	</table>
</div>
<h1>Gallery Business</h1>
<a href="<?=base_url('/index.php/Master/Master_gallery/add_form_gb') ?>"><button class="btn btn-info pull-right link" style="margin-right:10px;"><i class="entypo-plus"> &nbsp Add Gallery Business</i></button></a>
<br>
<br>
<div id="table-2_wrapper" class="dataTables_wrapper form-inline" role="grid">
	
	<table class="table table-bordered table-striped datatable " id="myTable1">
		<thead>
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Image Gallery</th>
				<th>Active</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$status="";
			foreach ($gallery_business as $key=>$value) {
				
				?>
				<tr>
					<td><?=$key+1 ?></td>
					<td><?= $value['gallery_name'] ?></td>
					<td><a target="_blank" href="<?= base_url().'/public/resto_assets'?>/assets/img/gallery_business/<?=$value['gallery_img']?>"> <img src="<?= base_url().'/public/resto_assets'?>/assets/img/gallery_business/<?=$value['gallery_img']?>" style="width:100px;height:100px;"></a></td>
					<td>
						<?php if($value['active']==1){
							echo 'Yes';
						}else{
							echo 'No';
						} ?>
					</td>
					
					<td>
						<a href="<?=base_url().'/index.php/Master/Master_gallery/edit_form_gb/'.$value['gb_id']?>" class="btn btn-info btn-sm sm-new tooltip-primary" data-toggle="tooltip" data-placement="top" data-original-title="update">
							<i class="entypo-pencil"></i>
						</a>
						<?php if($value['active']==1){ ?>
							<a href="javascript:;" onclick="del_gb('<?= $value['gb_id']?>');" class="btn btn-danger btn-sm sm-new tooltip-primary" data-toggle="tooltip" data-placement="top" data-original-title="InActive">
								<i class="entypo-cancel-circled"></i>
							</a>
						<?php }else{ ?>
							<a href="javascript:;" onclick="active_gb('<?= $value['gb_id']?>');" class="btn btn-success btn-sm sm-new tooltip-primary" data-toggle="tooltip" data-placement="top" data-original-title="Active">
								<i class="entypo-check"></i>
							</a>
						<?php } ?>
					</td>
				</tr>
			<?php } ?>
		</tbody>

	</table>
</div>

<h1>Gallery Resto</h1>
<a href="<?=base_url('/index.php/Master/Master_gallery/add_form_gr') ?>"><button class="btn btn-info pull-right link" style="margin-right:10px;"><i class="entypo-plus"> &nbsp Add Gallery Resto</i></button></a>
<br>
<br>
<div id="table-2_wrapper" class="dataTables_wrapper form-inline" role="grid">
	
	<table class="table table-bordered table-striped datatable " id="myTable2">
		<thead>
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Restaurant</th>
				<th>Type</th>
				<th>Image Gallery</th>
				<th>Active</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$status="";
			foreach ($gallery_resto as $key=>$value) {
				
				?>
				<tr>
					<td><?=$key+1 ?></td>
					<td><?= $value['gallery_name'] ?></td>
					<td><?= $value['name']?></td>
					<td><?= $value['type_gallery']?></td>
					<td><?php if($value['type_gallery']=='header'){ ?>
						<a target="_blank" href="<?= base_url().'/public/resto_assets'?>/assets/img/gallery_header/<?=$value['gallery_img']?>"> <img src="<?= base_url().'/public/resto_assets'?>/assets/img/gallery_header/<?=$value['gallery_img']?>" style="width:100px;height:100px;"></a>
					<?php }else{ ?>
						<a target="_blank" href="<?= base_url().'/resto_assets'?>/assets/img/gallery_detail/<?=$value['gallery_img']?>"> <img src="<?= base_url().'/public/resto_assets'?>/assets/img/gallery_detail/<?=$value['gallery_img']?>" style="width:100px;height:100px;"></a>
					<?php } ?>
					</td>
					<td>
						<?php if($value['ac']==1){
							echo 'Yes';
						}else{
							echo 'No';
						} ?>
					</td>
					
					<td>
						<a href="<?=base_url().'/index.php/Master/Master_gallery/edit_form_gr/'.$value['gr_id']?>" class="btn btn-info btn-sm sm-new tooltip-primary" data-toggle="tooltip" data-placement="top" data-original-title="update">
							<i class="entypo-pencil"></i>
						</a>
						<?php if($value['ac']==1){ ?>
							<a href="javascript:;" onclick="del_gr('<?= $value['gr_id']?>');" class="btn btn-danger btn-sm sm-new tooltip-primary" data-toggle="tooltip" data-placement="top" data-original-title="InActive">
								<i class="entypo-cancel-circled"></i>
							</a>
						<?php }else{ ?>
							<a href="javascript:;" onclick="active_gr('<?= $value['gr_id']?>');" class="btn btn-success btn-sm sm-new tooltip-primary" data-toggle="tooltip" data-placement="top" data-original-title="Active">
								<i class="entypo-check"></i>
							</a>
						<?php } ?>
					</td>
				</tr>
			<?php } ?>
		</tbody>

	</table>
</div>

<script type="text/javascript">
	function del_gc(id){

		swal({
			title: "Are you sure?",
			text: "Delete this Image,\n    No: "+id,
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {

				$.ajax({

					url : '<?php echo base_url();?>/index.php/Master/Master_gallery/delete_gc/'+id,
					type: "POST",
					success : function(e){
						var data = JSON.parse(e);
						if(data.message == 'success'){
							swal({
								title: "Success",
								text: "Sudah Terdelete !!",
								icon: "success",
								button: "Ok",
							}).then(function(){
								location.reload();
							});
						}else if(data.message == 'failed' ){
							swal("Failed!", "Your file is not exist!", "warning");
						}else{
							swal("Error!", "You clicked the button!", "warning");
						}
					},error : function(e){
						swal("Error!\n"+e, "Try again!", "error")
					}
				});
			} else {
				swal("Cancelled!", "Deletion Aborted!", "error");
			}
		});
	}

	function active_gc(id){

		swal({
			title: "Are you sure?",
			text: "activate this Image,\n    No: "+id,
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {

				$.ajax({

					url : '<?php echo base_url();?>/index.php/Master/Master_gallery/active_gc/'+id,
					type: "POST",
					success : function(e){
						var data = JSON.parse(e);
						if(data.message == 'success'){
							swal({
								title: "Success",
								text: "Sudah aktif !!",
								icon: "success",
								button: "Ok",
							}).then(function(){
								location.reload();
							});
						}else if(data.message == 'failed' ){
							swal("Failed!", "Your file is not exist!", "warning");
						}else{
							swal("Error!", "You clicked the button!", "warning");
						}
					},error : function(e){
						swal("Error!\n"+e, "Try again!", "error")
					}
				});
			} else {
				swal("Cancelled!", "Deletion Aborted!", "error");
			}
		});
	}

	function del_gb(id){

		swal({
			title: "Are you sure?",
			text: "Delete this Image,\n    No: "+id,
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {

				$.ajax({

					url : '<?php echo base_url();?>/index.php/Master/Master_gallery/delete_gb/'+id,
					type: "POST",
					success : function(e){
						var data = JSON.parse(e);
						if(data.message == 'success'){
							swal({
								title: "Success",
								text: "Sudah Terdelete !!",
								icon: "success",
								button: "Ok",
							}).then(function(){
								location.reload();
							});
						}else if(data.message == 'failed' ){
							swal("Failed!", "Your file is not exist!", "warning");
						}else{
							swal("Error!", "You clicked the button!", "warning");
						}
					},error : function(e){
						swal("Error!\n"+e, "Try again!", "error")
					}
				});
			} else {
				swal("Cancelled!", "Deletion Aborted!", "error");
			}
		});
	}

	function active_gb(id){

		swal({
			title: "Are you sure?",
			text: "activate this Image,\n    No: "+id,
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {

				$.ajax({

					url : '<?php echo base_url();?>/index.php/Master/Master_gallery/active_gb/'+id,
					type: "POST",
					success : function(e){
						var data = JSON.parse(e);
						if(data.message == 'success'){
							swal({
								title: "Success",
								text: "Sudah aktif !!",
								icon: "success",
								button: "Ok",
							}).then(function(){
								location.reload();
							});
						}else if(data.message == 'failed' ){
							swal("Failed!", "Your file is not exist!", "warning");
						}else{
							swal("Error!", "You clicked the button!", "warning");
						}
					},error : function(e){
						swal("Error!\n"+e, "Try again!", "error")
					}
				});
			} else {
				swal("Cancelled!", "Deletion Aborted!", "error");
			}
		});
	}


	function del_gr(id){

		swal({
			title: "Are you sure?",
			text: "Delete this Image,\n    No: "+id,
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {

				$.ajax({

					url : '<?php echo base_url();?>/index.php/Master/Master_gallery/delete_gr/'+id,
					type: "POST",
					success : function(e){
						var data = JSON.parse(e);
						if(data.message == 'success'){
							swal({
								title: "Success",
								text: "Sudah Terdelete !!",
								icon: "success",
								button: "Ok",
							}).then(function(){
								location.reload();
							});
						}else if(data.message == 'failed' ){
							swal("Failed!", "Your file is not exist!", "warning");
						}else{
							swal("Error!", "You clicked the button!", "warning");
						}
					},error : function(e){
						swal("Error!\n"+e, "Try again!", "error")
					}
				});
			} else {
				swal("Cancelled!", "Deletion Aborted!", "error");
			}
		});
	}

	function active_gr(id){

		swal({
			title: "Are you sure?",
			text: "activate this Image,\n    No: "+id,
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {

				$.ajax({

					url : '<?php echo base_url();?>/index.php/Master/Master_gallery/active_gr/'+id,
					type: "POST",
					success : function(e){
						var data = JSON.parse(e);
						if(data.message == 'success'){
							swal({
								title: "Success",
								text: "Sudah aktif !!",
								icon: "success",
								button: "Ok",
							}).then(function(){
								location.reload();
							});
						}else if(data.message == 'failed' ){
							swal("Failed!", "Your file is not exist!", "warning");
						}else{
							swal("Error!", "You clicked the button!", "warning");
						}
					},error : function(e){
						swal("Error!\n"+e, "Try again!", "error")
					}
				});
			} else {
				swal("Cancelled!", "Deletion Aborted!", "error");
			}
		});
	}
</script>



<?= $this->endSection(); ?>