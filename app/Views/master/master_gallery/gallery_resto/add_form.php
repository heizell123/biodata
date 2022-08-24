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

		<form method="post" id="input_form" action="/index.php/Master/Master_gallery/save_gr" class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-sm-offset-3 col-sm-5">
					<button type="submit" class="btn btn-success">Save</button>
					<a href="<?php echo base_url()."/index.php/Master/Master_gallery" ?>" class="btn btn-danger" name="btn_close" id="btn_close">Cancel</a>
				</div>
				<div class="col-md-2"></div>
			</div>

			<div class="panel panel-primary" data-collapsed="0">

				<div class="panel-heading">
					<div class="panel-title">
						Menu
					</div>

					<!-- <div class="panel-options">
						<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					</div> -->
				</div>

				<div class="panel-body">
					<div class="form-group">
						<label class="col-sm-3 control-label">Gallery Name </label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" name="gallery_name" id="gallery_name" required="true" placeholder="Gallery Name" >
							
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Gallery Type</label>
						
						<div class="col-sm-5">
							<select name="type_gallery" id="type_gallery" class="form-control" required="true">
								<option value="">==Select Type Gallery==</option>
								<option value="detail">Detail</option>
								<option value="header">Header</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Restaurant</label>
						
						<div class="col-sm-5">
							<select name="r_id" id="r_id" class="form-control" required="true">
								<option value="">==Select Restaurant==</option>
								<?php foreach ($resto as $value) { ?>
									<option value="<?= $value['r_id']?>"><?= $value['name']?></option>
								<?php } ?>
							</select>
						</div>
					</div>


					<div class="form-group">
						<label class="col-sm-3 control-label">Image</label>
						
						<div class="col-sm-5">
							<input type="file" class="form-control" name="img" id="img" required="true" accept="image/*">
							
						</div>
					</div>



				</div>
			</div>

		</form>
	</div>
</div>	

<?= $this->endSection(); ?>