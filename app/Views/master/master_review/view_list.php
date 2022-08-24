<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<h1>Review</h1>
<a href="<?=base_url('/index.php/Master/Master_review/add_form') ?>"><button class="btn btn-info pull-right link" style="margin-right:10px;"><i class="entypo-plus"> &nbsp Add review</i></button></a>
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
				<th>Active</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$status="";
			foreach ($review as $key=>$value) {
				
			 ?>
				<tr>
					<td><?=$key+1 ?></td>
					<td><?= $value['name'] ?></td>
					<td>
						<?php if($value['active']==1){
							echo 'Yes';
						}else{
							echo 'No';
						} ?>
					</td>
					
					<td>
						<a href="<?=base_url().'/index.php/Master/Master_review/edit_form/'.$value['rev_id']?>" class="btn btn-info btn-sm sm-new tooltip-primary" data-toggle="tooltip" data-placement="top" data-original-title="update">
							<i class="entypo-pencil"></i>
						</a>
						<?php if($value['active']==1){ ?>
							<a href="javascript:;" onclick="del('<?= $value['rev_id']?>');" class="btn btn-danger btn-sm sm-new tooltip-primary" data-toggle="tooltip" data-placement="top" data-original-title="InActive">
								<i class="entypo-cancel-circled"></i>
							</a>
						<?php }else{ ?>
							<a href="javascript:;" onclick="active('<?= $value['rev_id']?>');" class="btn btn-success btn-sm sm-new tooltip-primary" data-toggle="tooltip" data-placement="top" data-original-title="Active">
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
	function del(id){

    swal({
        title: "Are you sure?",
            text: "Delete this testimonials,\n    No: "+id,
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {

                $.ajax({

                    url : '<?php echo base_url();?>/index.php/Master/Master_review/delete/'+id,
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

    function active(id){

    swal({
        title: "Are you sure?",
            text: "activate this testimonials,\n    No: "+id,
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {

                $.ajax({

                    url : '<?php echo base_url();?>/index.php/Master/Master_review/active/'+id,
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