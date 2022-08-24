<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<script src="<?= base_url()?>/dist/gauge.js"></script>

<h1>Data Pribadi Pelamar</h1>
<?php 
$gender =[
	0=>'Laki-laki',
	1=>'Perempuan'
];
$bersedia =[
	0=>'YA',
	1=>'TIDAK'
];
?>

<div class="panel panel-primary panel-collapse" data-collapsed="0">

	<div class="panel-heading">
		<div class="panel-title">Data Pribadi</div>

		<div class="panel-options">

			<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
		</div>
	</div>

	<div class="panel-body" >
		<form id="profile_2" role="form" method="post" class="form-horizontal form-groups" enctype="multipart/form-data" action="<?= base_url().'/Biodata/save'?>">

			<table class="table table-bordered">
				<tr>
					<td>Posisi Yang dilamar</td>
					<td>
						<input type="hidden" class="form-control" name="id_bio" id="id_bio" value="<?= $bio[0]['id']?>" required>
						<input type="hidden" class="form-control" name="user_id" id="user_id" value="<?= $bio[0]['user_id']?>" required>
						<input type="text" class="form-control" name="posisi" id="posisi" value="<?= $bio[0]['posisi']?>" required>
					</td>
				</tr>
				<tr>
					<td>Nama</td>
					<td>
						<input type="text" class="form-control" name="nama" id="nama" value="<?= $bio[0]['nama']?>" required>

					</td>
				</tr>
				<tr>
					<td>No KTP</td>
					<td>
						<input type="text" class="form-control" name="ktp" id="ktp" value="<?= $bio[0]['ktp']?>" required>
					</td>
				</tr>
				<tr>
					<td>Tanggal Lahir</td>
					<td>
						<input type="text" class="form-control datepicker" name="dob" id="dob" value="<?php if(!empty($bio[0]['dob'])){ echo date('d/m/Y',strtotime($bio[0]['dob'])); }?>" required data-start-view="2">
					</td>
				</tr>
				<tr>
					<td>Tempat Lahir</td>
					<td>
						<input type="text" class="form-control" name="pob" id="pob" value="<?= $bio[0]['pob']?>" required>
					</td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td>
						<select class="form-control" name="jk" id="jk"  required>
							<option value="">Pilih</option>
							<?php foreach ($gender as $value) {
								$select = $bio[0]['jk']==$value?'selected':'';
								?>
								<option value="<?= $value?>" <?= $select?>> <?= $value?></option>
							<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Agama</td>
					<td>
						<input type="text" class="form-control" name="agama" id="agama" value="<?= $bio[0]['agama']?>" required>
					</td>
				</tr>
				<tr>
					<td>Golongan Darah</td>
					<td>
						<input type="text" class="form-control" name="gol" id="gol" value="<?= $bio[0]['gol']?>" required>
					</td>
				</tr>
				<tr>
					<td>Status</td>
					<td>
						<input type="text" class="form-control" name="status" id="status" value="<?= $bio[0]['status']?>" required>
					</td>
				</tr>
				<tr>
					<td>Alamat Tinggal</td>
					<td>
						<input type="text" class="form-control" name="alamat" id="alamat" value="<?= $bio[0]['alamat']?>" required>
					</td>
				</tr>
				<tr>
					<td>Email</td>
					<td>
						<input type="email" class="form-control" name="email" id="email" value="<?= $bio[0]['email']?>" required>
					</td>
				</tr>
				<tr>
					<td>No Telep</td>
					<td>
						<input type="text" class="form-control" name="no_tlp" id="no_tlp" value="<?= $bio[0]['no_tlp']?>" required>
					</td>
				</tr>
				<tr>
					<td>Orang Terdekat yang dapat dihubungi</td>
					<td>
						<input type="text" class="form-control" name="orang_dekat" id="orang_dekat" value="<?= $bio[0]['orang_dekat']?>" required>
					</td>
				</tr>
				<tr>
					<td>Skill</td>
					<td>
						<input type="text" class="form-control" name="skill" id="skill" value="<?= $bio[0]['skill']?>" required>
					</td>
				</tr>
				<tr>
					<td>Bersedia bila di tempatkan di seluruh kantor perusahaan</td>
					<td>
						<select class="form-control" name="bersedia" id="bersedia"  required>
							<option value="">Pilih</option>
							<?php foreach ($bersedia as $value) {
								$select = $bio[0]['bersedia']==$value?'selected':'';
								?>
								<option value="<?= $value?>" <?= $select?>> <?= $value?></option>
							<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Ekspektasi Gaji</td>
					<td>
						<input type="text" class="form-control" name="expektasi_gaji" id="expektasi_gaji" value="<?= $bio[0]['expektasi_gaji']?>" required>
					</td>
				</tr>

			</table>
			<br>
			<h2>Pendidikan Terakhir</h2>
			<table class="table table-bordered" id="edu_table">
				<thead>
					<tr>
						<td width="10%">Jenjang Karir</td>
						<td width="10%">Nama Institusi</td>
						<td width="20%">Jurusan</td>
						<td>Tahun Lulus</td>
						<td>IPK</td>
						<td>
							<button type="button" class="btn btn-success" onclick="addRowE()"><i class="entypo-plus"></i></button>
						</td>
					</tr>
				</thead>
				<tbody>
					<?php if(empty($pendidikan)){ ?>
						<tr id="tr1">
							<td>
								<input type="text" name="jenjang[]" id="jenjang1" class="form-control" required>
							</td>
							<td>
								<input type="text" name="nama_institusi[]" id="nama_institusi1" class="form-control" required>
							</td>
							<td>
								<input type="text" name="jurusan[]" id="jurusan1" class="form-control" required>
							</td>
							<td>
								<input type="text" name="tahun_lulus[]" id="tahun_lulus1" class="form-control" required>
							</td>
							<td>
								<input type="text" name="ipk[]" id="ipk1" class="form-control" required>
							</td>
							<td>
								<button type="button" class="btn btn-danger">-</button>
							</td>
						</tr>
					<?php }else{ 
						foreach ($pendidikan as $key=>$value) {
							?>
							<tr id="tr<?= $key+1?>">
								<td>
									<input type="text" name="jenjang[]" id="jenjang<?= $key+1?>" value="<?= $value['jenjang']?>" class="form-control" required>
								</td>
								<td>
									<input type="text" name="nama_institusi[]" id="nama_institusi<?= $key+1?>" class="form-control" value="<?= $value['nama_institusi']?>" required>
								</td>
								<td>
									<input type="text" name="jurusan[]" id="jurusan<?= $key+1?>" class="form-control" value="<?= $value['jurusan']?>" required>
								</td>
								<td>
									<input type="text" name="tahun_lulus[]" id="tahun_lulus<?= $key+1?>" class="form-control" value="<?= $value['tahun_lulus']?>" required>
								</td>
								<td>
									<input type="text" name="ipk[]" id="ipk<?= $key+1?>" class="form-control" value="<?= $value['ipk']?>" required>
								</td>
								<td>
									<button type="button" onclick="delEdu('<?= $key+1?>')" class="btn btn-danger">-</button>
								</td>
							</tr>
						<?php }
					} ?>
				</tbody>
			</table>
			<br>
			<h2>Riwayat Pelatihan</h2>
			<table class="table table-bordered" id="pelatihan_table">
				<thead>
					<tr>
						<td>Nama Kursus</td>
						<td>Sertifikat(Ada/Tidak)</td>
						<td>Tahun</td>
						<td>
							<button type="button" class="btn btn-success" onclick="addRowP()"><i class="entypo-plus"></i></button>
						</td>
					</tr>
				</thead>
				<tbody>
					<?php if(empty($pelatihan)){ ?>
						<tr id="trp1">
							<td>
								<input type="text" name="nama_kursus[]" id="nama_kursus1" class="form-control" required>
							</td>
							<td>
								<input type="text" name="setifikat[]" id="setifikat1" class="form-control" required>
							</td>
							<td>
								<input type="text" name="tahun_pelatihan[]" id="tahun_pelatihan1" class="form-control" required>
							</td>
						</td>
						<td>
							<button type="button" class="btn btn-danger">-</button>
						</td>
					</tr>
				<?php }else{ 
					foreach ($pelatihan as $key=>$value) {
						?>
						<tr id="trp<?= $key+1?>">
							<td>
								<input type="text" name="nama_kursus[]" id="nama_kursus<?= $key+1?>" value="<?= $value['nama_kursus']?>" class="form-control" required>
							</td>
							<td>
								<input type="text" name="setifikat[]" id="setifikat<?= $key+1?>" class="form-control" value="<?= $value['setifikat']?>" required>
							</td>
							<td>
								<input type="text" name="tahun_pelatihan[]" id="tahun_pelatihan<?= $key+1?>" class="form-control" value="<?= $value['tahun_pelatihan']?>" required>
							</td>
							<td>
								<button type="button" onclick="delPel('<?= $key+1?>')" class="btn btn-danger">-</button>
							</td>
						</tr>
					<?php }
				} ?>
			</tbody>
		</table>

		<br>
		<h2>Riwayat Pekerjaan</h2>
		<table class="table table-bordered" id="pekerjaan_table">
			<thead>
				<tr>
					<td>Nama Perusahaan</td>
					<td>Posisi Terakhir</td>
					<td>Pendapatan Terakhir</td>
					<td>Tahun</td>
					<td>
						<button type="button" class="btn btn-success" onclick="addRowK()"><i class="entypo-plus"></i></button>
					</td>
				</tr>
			</thead>
			<tbody>
				<?php if(empty($pekerjaan)){ ?>
					<tr id="trpk1">
						<td>
							<input type="text" name="perusahaan[]" id="perusahaan1" class="form-control" required>
						</td>
						<td>
							<input type="text" name="posisi_terakhir[]" id="posisi_terakhir1" class="form-control" required>
						</td>
						<td>
							<input type="text" name="pendapatan[]" id="pendapatan1" class="form-control" required>
						</td>
						<td>
							<input type="text" name="tahun_pekerjaan[]" id="tahun_pekerjaan1" class="form-control" required>
						</td>
					</td>
					<td>
						<button type="button" class="btn btn-danger">-</button>
					</td>
				</tr>
			<?php }else{ 
				foreach ($pekerjaan as $key=>$value) {
					?>
					<tr id="trpk<?= $key+1?>">
						<td>
							<input type="text" name="perusahaan[]" id="perusahaan<?= $key+1?>" value="<?= $value['perusahaan']?>" class="form-control" required>
						</td>
						<td>
							<input type="text" name="posisi_terakhir[]" id="posisi_terakhir<?= $key+1?>" class="form-control" value="<?= $value['posisi_terakhir']?>" required>
						</td>
						<td>
							<input type="text" name="pendapatan[]" id="pendapatan<?= $key+1?>" class="form-control" value="<?= $value['pendapatan']?>" required>
						</td>
						<td>
							<input type="text" name="tahun_pekerjaan[]" id="tahun_pekerjaan<?= $key+1?>" class="form-control" value="<?= $value['tahun_pekerjaan']?>" required>
						</td>
						<td>
							<button type="button" onclick="delPek('<?= $key+1?>')" class="btn btn-danger">-</button>
						</td>
					</tr>
				<?php }
			} ?>
		</tbody>
	</table>

	<div class="row">
		<div class="col-md-12">
			<div class="col-md-4">

			</div>
			<div class="col-md-4">
				<button type="submit" class="btn btn-info btn-lg btn-block">Save</button>
			</div>
			<div class="col-md-4">

			</div>
		</div>
	</div>
</form>

</div>

</div>


<script type="text/javascript">
	function addRowK(){
		var tbl                     = document.getElementById('pekerjaan_table');
		var theBodyTable            = tbl.tBodies[0];
		var RowsLength              = theBodyTable.rows.length;
		var row                     = theBodyTable.insertRow(RowsLength);       
		var LastIteration           = RowsLength +1 ;

		row.setAttribute('align','left');
		row.setAttribute('id' ,'trpk' + LastIteration);


		var cellRight = row.insertCell(0);
		var el1 = document.createElement('input');
		el1.type = 'text';
		el1.name = 'perusahaan[]';
		el1.id = 'perusahaan'+LastIteration;
		el1.className = "form-control";
		el1.required = true;
		cellRight.appendChild(el1);

		var cellRight = row.insertCell(1);
		var el1 = document.createElement('input');
		el1.type = 'text';
		el1.name = 'posisi_terakhir[]';
		el1.id = 'posisi_terakhir'+LastIteration;
		el1.required = true;
		el1.className = "form-control";
		cellRight.appendChild(el1);


		
		var cellRight = row.insertCell(2);
		var el1 = document.createElement('input');
		el1.type = 'text';
		el1.name = 'pendapatan[]';
		el1.id = 'pendapatan'+LastIteration;
		el1.required = true;
		el1.className = "form-control";
		cellRight.appendChild(el1);

		var cellRight = row.insertCell(3);
		var el1 = document.createElement('input');
		el1.type = 'text';
		el1.name = 'tahun_pekerjaan[]';
		el1.id = 'tahun_pekerjaan'+LastIteration;
		el1.required = true;
		el1.className = "form-control";
		cellRight.appendChild(el1);


		var cellRight = row.insertCell(4);
		var el1 = document.createElement('button');
		el1.type='button';
		el1.className= 'btn btn-danger btn-sm';
		el1.id='removeBtnPk';
		el1.textContent="-";
		el1.onclick    = function(){delPek(LastIteration);};
		cellRight.appendChild(el1);



	}

	function addRowE(){
		var tbl                     = document.getElementById('edu_table');
		var theBodyTable            = tbl.tBodies[0];
		var RowsLength              = theBodyTable.rows.length;
		var row                     = theBodyTable.insertRow(RowsLength);       
		var LastIteration           = RowsLength +1 ;

		row.setAttribute('align','left');
		row.setAttribute('id' ,'tr' + LastIteration);


		var cellRight = row.insertCell(0);
		var el1 = document.createElement('input');
		el1.type = 'text';
		el1.name = 'jenjang[]';
		el1.id = 'jenjang'+LastIteration;
		el1.className = "form-control";
		el1.required = true;
		cellRight.appendChild(el1);

		var cellRight = row.insertCell(1);
		var el1 = document.createElement('input');
		el1.type = 'text';
		el1.name = 'nama_institusi[]';
		el1.id = 'nama_institusi'+LastIteration;
		el1.required = true;
		el1.className = "form-control";
		cellRight.appendChild(el1);


		
		var cellRight = row.insertCell(2);
		var el1 = document.createElement('input');
		el1.type = 'text';
		el1.name = 'jurusan[]';
		el1.id = 'jurusan'+LastIteration;
		el1.required = true;
		el1.className = "form-control";
		cellRight.appendChild(el1);

		var cellRight = row.insertCell(3);
		var el1 = document.createElement('input');
		el1.type = 'text';
		el1.name = 'tahun_lulus[]';
		el1.id = 'tahun_lulus'+LastIteration;
		el1.required = true;
		el1.className = "form-control";
		cellRight.appendChild(el1);

		var cellRight = row.insertCell(4);
		var el1 = document.createElement('input');
		el1.type = 'text';
		el1.name = 'ipk[]';
		el1.id = 'ipk'+LastIteration;
		el1.required = true;
		el1.className = "form-control";
		cellRight.appendChild(el1);


		var cellRight = row.insertCell(5);
		var el1 = document.createElement('button');
		el1.type='button';
		el1.className= 'btn btn-danger btn-sm';
		el1.id='removeBtnPk';
		el1.textContent="-";
		el1.onclick    = function(){delEdu(LastIteration);};
		cellRight.appendChild(el1);



	}

	function addRowP(){
		var tbl                     = document.getElementById('pelatihan_table');
		var theBodyTable            = tbl.tBodies[0];
		var RowsLength              = theBodyTable.rows.length;
		var row                     = theBodyTable.insertRow(RowsLength);       
		var LastIteration           = RowsLength +1 ;

		row.setAttribute('align','left');
		row.setAttribute('id' ,'trp' + LastIteration);


		var cellRight = row.insertCell(0);
		var el1 = document.createElement('input');
		el1.type = 'text';
		el1.name = 'nama_kursus[]';
		el1.id = 'nama_kursus'+LastIteration;
		el1.className = "form-control";
		el1.required = true;
		cellRight.appendChild(el1);

		var cellRight = row.insertCell(1);
		var el1 = document.createElement('input');
		el1.type = 'text';
		el1.name = 'setifikat[]';
		el1.id = 'setifikat'+LastIteration;
		el1.required = true;
		el1.className = "form-control";
		cellRight.appendChild(el1);


		
		var cellRight = row.insertCell(2);
		var el1 = document.createElement('input');
		el1.type = 'text';
		el1.name = 'tahun_pelatihan[]';
		el1.id = 'tahun_pelatihan'+LastIteration;
		el1.required = true;
		el1.className = "form-control";
		cellRight.appendChild(el1);


		var cellRight = row.insertCell(3);
		var el1 = document.createElement('button');
		el1.type='button';
		el1.className= 'btn btn-danger btn-sm';
		el1.id='removeBtnPk';
		el1.textContent="-";
		el1.onclick    = function(){delPel(LastIteration);};
		cellRight.appendChild(el1);



	}

	function delEdu(row){
		$("#tr"+row).remove();
	}
	function delPel(row){
		$("#trp"+row).remove();
	}
	function delPek(row){
		$("#trpk"+row).remove();
	}


</script>

<?= $this->endSection(); ?>