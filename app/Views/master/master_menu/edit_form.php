<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<?php 
$step =[
	1=>'subordinate',
	2=>'supervisor'
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

		<form method="post" id="input_form" action="/index.php/Master/Master_menu/update" class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-sm-offset-3 col-sm-5">
					<button type="submit" class="btn btn-green btn-icon btn-sm icon-left">Save <i class="entypo-check"></i></button>
					<a href="<?php echo base_url()."/index.php/Master/Master_menu" ?>" class="btn btn-danger btn-icon btn-sm icon-left" name="btn_close" id="btn_close">Cancel<i class="entypo-cancel"></i></a>
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
						<label class="col-sm-3 control-label">Menu Name</label>
						
						<div class="col-sm-5">
							<input type="hidden" name="m_id" value="<?= $menus[0]['m_id']?>">
							<input type="text" class="form-control" name="name" id="name" required="true" placeholder="Menu Name" value="<?= $menus[0]['menu_name']?>">
							
						</div>
					</div>



					<div class="form-group">
						<label class="col-sm-3 control-label">Type Menu</label>
						
						<div class="col-sm-5">
							<select name="type_menu_id" id="type_menu_id" class="form-control" required="true">
								<option value="0">==Select==</option>
								<?php foreach ($type_menu as $value) {
									$select = $value['type_menu_id']==$menus[0]['type_menu_id']?'selected':'';
									?>
									<option value="<?= $value['type_menu_id'] ?>" <?= $select?>><?= $value['name'] ?></option>
								<?php } ?>

							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Ingredients</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" name="ingredients" id="ingredients" required="true" placeholder="Ingredients" value="<?= $menus[0]['ingredients']?>">
							
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Order Menu</label>
						
						<div class="col-sm-5">
							<input type="number" class="form-control" name="menu_order" id="menu_order" required="true" placeholder="Order Menu" value="<?= $menus[0]['menu_order']?>">
							
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Image</label>
						
						<div class="col-sm-5">
							<input type="file" class="form-control" name="img" id="img" accept="image/*">
							<input type="hidden" name="img_old" value="<?= $menus[0]['img_menu']?>">
							<a target="_blank" href="<?= base_url().'/public/resto_assets'?>/assets/img/menu/<?=$menus[0]['img_menu']?>"><?=$menus[0]['img_menu']?></a>
						</div>
					</div>

				</div>
			</div>

		</form>
	</div>
</div>	

<?= $this->endSection(); ?>