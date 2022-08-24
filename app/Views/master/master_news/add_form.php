<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<style type="text/css">
	.modal-backdrop {
 	display: none;
}
</style>

<div class="row">
	<div class="col-md-12">
		<div class="row">
			<?php if (!empty(session()->getFlashdata('error'))) { ?>
				<div class="form-group"> <div class="alert alert-danger"><strong>Alert!</strong>
					<?php echo session()->getFlashdata('error'); ?></div>
				</div>
			<?php } ?>
		</div>

		<form method="post" id="input_form" action="/index.php/Master/Master_news/save" class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-sm-offset-3 col-sm-5">
					<button type="submit" class="btn btn-success">Save</button>
					<a href="<?php echo base_url()."/index.php/Master/Master_news" ?>" class="btn btn-danger" name="btn_close" id="btn_close">Cancel</a>
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
						<label class="col-sm-3 control-label">Title </label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" name="title" id="title" required="true" placeholder="Title" >
							
						</div>
					</div>


					<div class="form-group">
						<label class="col-sm-3 control-label">Text Header</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" name="text_header" id="text_header" required="true" placeholder="Text Header">
							
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Image</label>
						
						<div class="col-sm-5">
							<input type="file" class="form-control" name="img" id="img" required="true" accept="image/*">
							
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Content</label>
						
						<div class="col-sm-5">
							<textarea id="summernote" name="content"></textarea>
							
						</div>
					</div>


				</div>
			</div>

		</form>
	</div>
</div>	


<script type="text/javascript">
	$(document).ready(function(){
		$('#summernote').summernote({
			height: "300px",
			placeholder: 'Fill Content',
			callbacks: {
				onImageUpload: function(image) {
					uploadImage(image[0]);
				},
				onMediaDelete : function(target) {
					deleteImage(target[0].src);
				}
			}
		});
		
		function uploadImage(image) {
			var data = new FormData();
			data.append("image", image);
			$.ajax({
				url: "<?php echo site_url('Api/upload_image_news')?>",
				cache: false,
				contentType: false,
				processData: false,
				data: data,
				type: "POST",
				success: function(url) {
					$('#summernote').summernote("insertImage", url);
				},
				error: function(data) {
					console.log(data);
				}
			});
		}
		
		function deleteImage(src) {
			$.ajax({
				data: {src : src},
				type: "POST",
				url: "<?php echo site_url('Api/delete_image')?>",
				cache: false,
				success: function(response) {
					console.log(response);
				}
			});
		}
		
	});
	
</script>
	
<?= $this->endSection(); ?>