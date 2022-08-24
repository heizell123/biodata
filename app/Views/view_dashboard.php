<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<script src="<?= base_url()?>/dist/gauge.js"></script>

<h1>Dashboard</h1>

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



<?= $this->endSection(); ?>