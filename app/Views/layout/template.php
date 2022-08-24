<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />
	<!-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> -->
	
	<title><?=$title?></title>
	<link rel="shortcut icon" href="<?= base_url().'/resto_assets/'?>assets/img/favicon.png">
	

	<link rel="stylesheet" href="<?= base_url()?>/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="<?= base_url()?>/assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="<?= base_url()?>/assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url()?>/assets/css/neon-core.css">
	<link rel="stylesheet" href="<?= base_url()?>/assets/css/neon-theme.css">
	<link rel="stylesheet" href="<?= base_url()?>/assets/css/neon-forms.css">
	<link rel="stylesheet" href="<?= base_url()?>/assets/css/custom.css">

	<link rel="stylesheet" href="<?= base_url()?>/assets/js/select2/select2-bootstrap.css">
	<link rel="stylesheet" href="<?= base_url()?>/assets/js/select2/select2.css">
	<link rel="stylesheet" href="<?= base_url()?>/assets/js/selectboxit/jquery.selectBoxIt.css">
	<link rel="stylesheet" href="<?= base_url()?>/assets/js/daterangepicker/daterangepicker-bs3.css">
	<link rel="stylesheet" href="<?= base_url()?>/assets/js/icheck/skins/minimal/_all.css">
	<link rel="stylesheet" href="<?= base_url()?>/assets/js/icheck/skins/square/_all.css">
	<link rel="stylesheet" href="<?= base_url()?>/assets/js/icheck/skins/flat/_all.css">
	<link rel="stylesheet" href="<?= base_url()?>/assets/js/icheck/skins/futurico/futurico.css">
	<link rel="stylesheet" href="<?= base_url()?>/assets/js/icheck/skins/polaris/polaris.css">

	<script src="<?= base_url()?>/assets/js/jquery-1.11.0.min.js"></script>
	<script src="<?= base_url()?>/assets/js/sweetalert.min.js"></script>
	
	
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>/dataTable/datatables.css">

	<script type="text/javascript" charset="utf8" src="<?=base_url()?>/dataTable/datatables.js"></script>
	<script type="text/javascript">
		$(document).ready( function () {
			$('#myTable').DataTable();
			$('#myTable1').DataTable();
			$('#myTable2').DataTable();
		} );
	</script>
	<script type="text/javascript">
		jQuery(document).ready(function($)
		{
			$('input.icheck').iCheck({
				checkboxClass: 'icheckbox_minimal',
				radioClass: 'iradio_minimal'
			});
			
			$('input.icheck-2').iCheck({
				checkboxClass: 'icheckbox_minimal-blue',
				radioClass: 'iradio_minimal-blue'
			});
		});
	</script>


	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	
</head>
<body class="page-body" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->	
	
	<div class="sidebar-menu">
		
			
		<header class="logo-env">
			
			<!-- logo -->
			<div class="logo">
				<a href="<?= base_url()?>/dashboard">
					<img src="<?= base_url().'/public/resto_assets/'?>assets/img/favicon.png" width="70" alt="" />
				</a>
			</div>
			
						<!-- logo collapse icon -->
						
			<div class="sidebar-collapse">
				<a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
					<i class="entypo-menu"></i>
				</a>
			</div>
			
									
			
			<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
			<div class="sidebar-mobile-menu visible-xs">
				<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
					<i class="entypo-menu"></i>
				</a>
			</div>
			
		</header>
				
		
		
				
		
				
		<ul id="main-menu" class="">
			<!-- add class "multiple-expanded" to allow multiple submenus to open -->
			<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
			<!-- Search Bar -->
			<!-- <li id="search">
				<form method="get" action="">
					<input type="text" name="q" class="search-input" placeholder="Search something..."/>
					<button type="submit">
						<i class="entypo-search"></i>
					</button>
				</form>
			</li> -->
			
			<?= $sidebar ?>
		</ul>
				
	</div>	
	<div class="main-content">
		<?= $this->renderSection('content'); ?>

<br />

<!-- lets do some work here... --><!-- Footer -->
<footer class="main">
	
		
	&copy; 2014 <strong>Neon</strong> Admin Theme by <a href="http://laborator.co" target="_blank">Laborator</a>
	
</footer>	</div>

	
		
	</div>




	<!-- Bottom Scripts -->
	<script src="<?= base_url()?>/assets/js/gsap/main-gsap.js"></script>
	<script src="<?= base_url()?>/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="<?= base_url()?>/assets/js/bootstrap.js"></script>
	<script src="<?= base_url()?>/assets/js/joinable.js"></script>
	<script src="<?= base_url()?>/assets/js/resizeable.js"></script>
	<script src="<?= base_url()?>/assets/js/neon-api.js"></script>
	<script src="<?= base_url()?>/assets/js/neon-custom.js"></script>
	<script src="<?= base_url()?>/assets/js/neon-demo.js"></script>
	<script src="<?= base_url()?>/assets/js/bootstrap-timepicker.min.js"></script>

	<script src="<?= base_url()?>/assets/js/select2/select2.min.js"></script>
	<script src="<?= base_url()?>/assets/js/bootstrap-datepicker.js"></script>
	<script src="<?= base_url()?>/assets/js/icheck/icheck.min.js"></script>
	<script src="<?= base_url()?>/assets/js/masmechael.js"></script>
	<script src="<?= base_url()?>/assets/js/jquery.inputmask.bundle.min.js"></script>


</body>
<?php 
	if(empty($bawahan)){
		$bawahan = [];
	}

 ?>
<form method="post" action="/personal/score_card/prosesInput" class="form-horizontal form-groups-bordered" enctype="multipart/form-data">
	<div class="modal fade-scale" id="modal-1">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Upload Excel</h4>
				</div>

				<div class="modal-body">
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">File Excel</label>
						
						<div class="col-sm-7">
							<input type="file" name="fileexcel" class="form-control" required accept=".xls, .xlsx">
						</div>
					</div>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Employee</label>
						
						<div class="col-sm-7">
							<select name="employee" id="employee" class="form-control" required="true" onchange="employeePositionUpload();">
								<option value="">==Select Employee==</option>
								<?php foreach ($bawahan as $value) { ?>
									<option value="<?= $value['employee_id']?>"><?= $value['employee_name']?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Employee Position</label>
						
						<div class="col-sm-7">
							<select class="form-control" name="ep_id_upload" id="ep_id_upload" required="true">
								
							</select>
						</div>
					</div>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Template Excel</label>
						
						<div class="col-sm-7">
							<a href="<?=base_url()?>/upload/Format_BSC_upload.xlsx" target="_blank">Click to Download</a>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-info">Upload</button>
				</div>
			</div>
		</div>
	</div>
</form>
<script type="text/javascript">
	
	function employeePositionUpload()
	{
		var employee_id = $('#employee').find(":selected").val();
		if(employee_id==''){
			$("#ep_id_upload").empty();
		}else{
			$("#ep_id_upload").empty();
			$.ajax({
				url:'<?php echo base_url();?>/personal/Score_card/get_ep/'+employee_id,
				type:"post",
				datatype:"json",
				data:{employee_id:employee_id},
				cahce:false,
				success:function(res){
					template="";
					var data = JSON.parse(res);
					emp = (data.employee_position);
					$.each( emp, function( key, value ) {
						template += "<option value='"+value.ep_id+"'>"+value.divisi_name+" - "+value.level_name+" - "+value.position_name+"</option>";
					});
					$('#ep_id_upload').append(template);
				},
				error:function(){
					swal({
						title: "Error",
						text: "You clicked the button!",
						icon: "error",
						button: "Ok",
					});
				}
			});
		}
	}
</script>
</html>
