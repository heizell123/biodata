<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="row">
	<div class="col-md-12">
		<div class="row">
			<?php if (!empty(session()->getFlashdata('error'))) { ?>
				<div class="form-group"> <div class="alert alert-danger"><strong>Alert!</strong>
					<?php echo session()->getFlashdata('error'); ?></div>
				</div>
			<?php } ?>
		</div>

		<form method="post" id="input_form" action="/index.php/Master/Master_review/save" class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-sm-offset-3 col-sm-5">
					<button type="submit" class="btn btn-success">Save</button>
					<a href="<?php echo base_url()."/index.php/Master/Master_review" ?>" class="btn btn-danger" name="btn_close" id="btn_close">Cancel</a>
				</div>
				<div class="col-md-2"></div>
			</div>

			<div class="panel panel-primary" data-collapsed="0">

				<div class="panel-heading">
					<div class="panel-title">
						Review
					</div>

					<!-- <div class="panel-options">
						<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					</div> -->
				</div>

				<div class="panel-body">
					<div class="form-group">
						<label class="col-sm-3 control-label">Name </label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" name="name" id="name" required="true" placeholder="Reviewer Name" >
							
						</div>
					</div>



					<div class="form-group">
						<label class="col-sm-3 control-label">Comment</label>
						
						<div class="col-sm-5">
							<textarea id="comment" name="comment" class="form-control" required="true"></textarea>
							
						</div>
					</div>



				</div>
			</div>

		</form>
	</div>
</div>	

<?= $this->endSection(); ?>