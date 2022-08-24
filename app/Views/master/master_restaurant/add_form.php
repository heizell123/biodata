<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<?php 
	$opt =[
		0=>'no',
		1=>'yes'
	];
 ?>
<div class="row">
	<div class="col-md-12">
		<div class="row">
			<?php if (!empty(session()->getFlashdata('error'))) { ?>
				<div class="form-group"> <div class="alert alert-danger"><strong>Alert!</strong>
					<?php echo session()->getFlashdata('error'); ?></div>
				</div>
			<?php } ?>
		</div>

		<form method="post" id="input_form" action="/index.php/Master/Master_restaurant/save" class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-sm-offset-3 col-sm-5">
					<button type="submit" class="btn btn-success">Save</button>
					<a href="<?php echo base_url()."/index.php/Master/Master_restaurant" ?>" class="btn btn-danger" name="btn_close" id="btn_close">Cancel</a>
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
						<label class="col-sm-3 control-label">Restaurant Name </label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" name="name" id="name" required="true" placeholder="Restaurant Name" >
							
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Email</label>
						
						<div class="col-sm-5">
							<input type="email" class="form-control" name="email" id="email" required="true" placeholder="Email" >
							
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">WhatsApp</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" name="wa" id="wa" required="true" placeholder="WhatsApp" >
							
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Opening Hours</label>
						
						<div class="col-sm-5">
							<textarea class="form-control" name="opening_hours" id="opening_hours" required="true"></textarea>
							
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Image</label>
						
						<div class="col-sm-5">
							<input type="file" class="form-control" name="img" id="img" required="true" accept="image/*">
							
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">About</label>
						
						<div class="col-sm-5">
							<textarea id="about" name="about" class="form-control" required="true"></textarea>
							
						</div>
					</div>


					<div class="form-group">
						<label class="col-sm-3 control-label">Tagline</label>
						
						<div class="col-sm-5">
							<textarea id="tagline" name="tagline" class="form-control" required="true"></textarea>
							
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Address</label>
						
						<div class="col-sm-5">
							<textarea id="address" name="address" class="form-control" required="true"></textarea>
							
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Link Facebook</label>
						
						<div class="col-sm-5">
							<textarea id="link_facebook" name="link_facebook" class="form-control" required="true"></textarea>
							
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Link Instagram</label>
						
						<div class="col-sm-5">
							<textarea id="link_instagram" name="link_instagram" class="form-control" required="true"></textarea>
							
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Link GoFood</label>
						
						<div class="col-sm-5">
							<textarea id="link_gofood" name="link_gofood" class="form-control" required="true"></textarea>
							
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Link Maps</label>
						
						<div class="col-sm-5">
							<textarea id="link_maps" name="link_maps" class="form-control" required="true"></textarea>
							
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Link Google</label>
						
						<div class="col-sm-5">
							<textarea id="link_google" name="link_google" class="form-control" required="true"></textarea>
							
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Link Tripadvisor</label>
						
						<div class="col-sm-5">
							<textarea id="link_tripadvisor" name="link_tripadvisor" class="form-control" required="true"></textarea>
							
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Link Tiktok</label>
						
						<div class="col-sm-5">
							<textarea id="link_tiktok" name="link_tiktok" class="form-control" required="true"></textarea>
							
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Link Youtube</label>
						
						<div class="col-sm-5">
							<textarea id="link_youtube" name="link_youtube" class="form-control" required="true"></textarea>
							
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Widget Tripadvisor</label>
						
						<div class="col-sm-5">
							<textarea id="widget_tripadvisor" name="widget_tripadvisor" class="form-control"></textarea>
							
						</div>
					</div>


				</div>
			</div>

		</form>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#about').summernote({
			placeholder: 'Fill Content',
			tabsize: 2,
			height: 500
		});
		$('#opening_hours').summernote({
			placeholder: 'Fill Content',
			tabsize: 2,
			height: 500
		});
	});
</script>	

<?= $this->endSection(); ?>