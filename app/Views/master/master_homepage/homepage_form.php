<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<div class="row">
	<div class="col-md-12">
		<div class="row">
			<?php if (!empty(session()->getFlashdata('error'))) { ?>
				<div class="form-group"> <div class="alert alert-danger"><strong>Alert!</strong>
					<?php echo session()->getFlashdata('error'); ?></div>
				</div>
			<?php } ?>
		</div>

		<form method="post" id="input_form" action="/index.php/Master/Master_homepage/update" class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-sm-offset-3 col-sm-5">
					<button type="submit" class="btn btn-success">Save</button>
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
						<label class="col-sm-3 control-label">Name </label>
						
						<div class="col-sm-5">
							<input type="hidden" name="b_id" value="<?= $home[0]['b_id']?>">
							<input type="text" class="form-control" name="name" id="name" required="true" placeholder="Whats On" value="<?= $home[0]['name']?>">
							
						</div>
					</div>


					<div class="form-group">
						<label class="col-sm-3 control-label">About</label>
						
						<div class="col-sm-5">
							<textarea id="summernote" name="about" required="true"><?= $home[0]['about']?></textarea>
							
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Menu Description</label>
						
						<div class="col-sm-5">
							<textarea class="form-control" name="menu_dsc" required="true"><?= $home[0]['menu_dsc']?></textarea>
							
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Tagline</label>
						
						<div class="col-sm-5">
							<textarea class="form-control" name="tagline"><?= $home[0]['tagline']?></textarea>
							
						</div>
					</div>

				</div>
			</div>

		</form>
	</div>
</div>


<script type="text/javascript">
	$(document).ready(function() {
		$('#summernote').summernote({
			placeholder: 'Fill Content',
			tabsize: 2,
			height: 500
		});
	});
</script>	

<?= $this->endSection(); ?>