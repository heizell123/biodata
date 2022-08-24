<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<?php 
$timestamp = strtotime('next Sunday');
$days = array();
$opt =[
		0=>'yes',
		1=>'no'
	];
for ($i = 0; $i < 7; $i++) {
    $days[] = strftime('%A', $timestamp);
    $timestamp = strtotime('+1 day', $timestamp);
}
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

		<form method="post" id="input_form" action="/index.php/Master/Master_restaurant/logo" class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
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
					
					</div>

					<!-- <div class="panel-options">
						<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					</div> -->
				</div>

				<input type="hidden" name="r_id" value="<?= $resto[0]['r_id']?>">
					<table class="table table-condensed table-bordered table-hover table-striped" id="teamtable">
						<thead>
							<tr>
								<td>No</td>
								<td>Logo</td>
								<td>Link</td>
								<td>Show Option</td>
								<td><img id="img" src="<?= base_url()?>/public/assets/images/add.jpg" width="16" height="16" border="0" onclick="AddRow();"></td>
							</tr>
						</thead>
						<tbody>

							<?php 
							if(!empty($logo)){
								foreach ($logo as $key=>$value) {?>
									<tr id="<?= $key+1?>">
										<td><?= $key+1?></td>
										<td>
											<input type="file" name="img[]" id="img<?= $key+1?>" class="form-control" accept=".jpg, .png, .pdf">
											<input type="hidden" name="img_old[]" value="<?= $value['img']?>">
											<a target="_blank" href="<?= base_url()?>/public/resto_assets/assets/img/icon/<?= $value['img']?>">
												<?= $value['img']?>
											</a>
										</td>
										<td>
											<textarea name="link[]" id="link<?= $key+1?>" class="form-control"><?= $value['link']?></textarea>
										</td>
										<td>
											<select name="show[]" id="show<?= $key+1?>" class="form-control">
												<?php foreach ($opt as $val) { 
													$select = $val==$value['show']?'selected':'';
													?>
													<option value="<?= $val?>" <?= $select?>><?= $val?></option>
												<?php } ?>
											</select>
										</td>
										<td>
											<img src="<?= base_url()?>/public/assets/images/del.png" width="16" height="16" border="0" onclick="DeleteRow('<?= $key+1?>');">
										</td>
									</tr>
								<?php } 
							}else{ ?>
								<tr id="1">
										<td>1</td>
										<td>
											<input type="file" name="img[]" id="img1" class="form-control" required="true" accept=".jpg, .png, .pdf">
										</td>
										<td>
											<textarea name="link[]" id="link1" class="form-control"></textarea>
										</td>
										<td>
											<select name="show[]" id="show1" class="form-control">
												<?php foreach ($opt as $val) { 
													?>
													<option value="<?= $val?>"><?= $val?></option>
												<?php } ?>
											</select>
										</td>
										<td>
											<img src="<?= base_url()?>/public/assets/images/del.png" width="16" height="16" border="0" onclick="DeleteRow(1);">
										</td>
									</tr>
							<?php } ?>
						</tbody>
					</table>

				</div>
			</div>

		</form>
	</div>
</div>

<script type="text/javascript">
	function AddRow(){
	var tbl                  	= document.getElementById('teamtable');
	var theBodyTable 		 	= tbl.tBodies[0];
	var RowsLength           	= theBodyTable.rows.length;
	var row                  	= theBodyTable.insertRow(RowsLength);		
	var LastIteration 			= RowsLength +1 ;

	row.setAttribute('align','left');
	row.setAttribute('id' , LastIteration);

	var cellRight = row.insertCell(0);
	var el1 = document.createTextNode(LastIteration);	
	cellRight.appendChild(el1);

	var cellRightSel = row.insertCell(1);
	cellRightSel.setAttribute('align','left');
	var el1 = document.createElement('input');
	el1.type= 'file';
	el1.name = 'img[]';
	el1.accept = '.jpg, .png, .pdf';
	el1.className='form-control';
	el1.required = true;
	el1.id = 'img'+ LastIteration;
	cellRightSel.appendChild(el1);


	var cellRight = row.insertCell(2);
	cellRight.setAttribute('align','left');
	var el1 = document.createElement('textarea');
	el1.name = 'link[]';
	el1.id = 'link' + LastIteration;
	el1.className = "form-control";
	el1.required= true;
	cellRight.appendChild(el1);

	var cellRight = row.insertCell(3);
	cellRight.setAttribute('align','left');
	var el1 = document.createElement('select');
	el1.name = 'show[]';
	el1.id = 'show' + LastIteration;
	el1.className = "form-control";
	el1.required= true;
	el1.options[0] = new Option('yes','yes');
	el1.options[1] = new Option('no','no');
	cellRight.appendChild(el1);



	var cellRight = row.insertCell(4);
	var el1 = document.createElement('img');
	el1.src = "<?=base_url();?>/public/assets/images/del.png";
	el1.onclick = function()
	{
		DeleteRow(LastIteration);
	};
	cellRight.appendChild(el1);	



	$('#start_hour'+LastIteration).attr('data-template', 'dropdown');
	$('#start_hour'+LastIteration).attr('data-show-seconds', true);
	$('#start_hour'+LastIteration).attr('data-default-time', '11:25 AM');
	$('#start_hour'+LastIteration).attr('data-show-meridian', true);
	$('#start_hour'+LastIteration).attr('data-minute-step', '5');
	$("#start_hour"+LastIteration).timepicker();

	$('#end_hour'+LastIteration).attr('data-template', 'dropdown');
	$('#end_hour'+LastIteration).attr('data-show-seconds', true);
	$('#end_hour'+LastIteration).attr('data-default-time', '10:00 PM');
	$('#end_hour'+LastIteration).attr('data-show-meridian', true);
	$('#end_hour'+LastIteration).attr('data-minute-step', '5');
	$("#end_hour"+LastIteration).timepicker();
}
function DeleteRow(rw){
		try{
			var row     = document.getElementById(rw).rowIndex;
			var tbl     = document.getElementById('teamtable');
			var RowsLength           	= tbl.tBodies[0].rows.length;
			if (RowsLength > 1) {alert("Data terhapus");
			tbl.deleteRow(row);
		}	

	}catch(err){
		txt  = "There was an error on this page.\n\n";
		txt += "Error description : DeleteRow "+ err.message +"\n\n";
		txt += "Click OK to continue\n\n";
		alert(txt);
	}
}
</script>


<?= $this->endSection(); ?>