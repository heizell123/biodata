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

		<form method="post" id="input_form" action="/index.php/Master/Master_gallery/update_gc" class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
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
							<input type="hidden" name="gc_id" value="<?= $gallery[0]['gc_id']?>">
							<input type="text" class="form-control" name="gallery_name" id="gallery_name" required="true" placeholder="Gallery Name" value="<?= $gallery[0]['gallery_name']?>">
							
						</div>
					</div>


					<div class="form-group">
						<label class="col-sm-3 control-label">Image</label>
						
						<div class="col-sm-5">
							<input type="file" class="form-control" name="img" id="img" accept="image/*">
							<input type="hidden" name="img_old" value="<?= $gallery[0]['gallery_img']?>">
							<a target="_blank" href="<?= base_url().'/public/resto_assets'?>/assets/img/gallery_customer/<?=$gallery[0]['gallery_img']?>"><?=$gallery[0]['gallery_img']?></a>
							
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Gallery Link</label>
						
						<div class="col-sm-5">
							<textarea id="gallery_link" name="gallery_link" required="true" class="form-control" placeholder="Link Instagram"><?= $gallery[0]['gallery_link']?></textarea>
							
						</div>
					</div>


				</div>
			</div>

		</form>
	</div>
</div>	

<?= $this->endSection(); ?>