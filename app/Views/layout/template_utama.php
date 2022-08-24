<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />
	
	<title><?=$title?></title>
	
	<link rel="shortcut icon" href="<?= base_url()?>/assets/images/vci.png">

	<link rel="stylesheet" href="<?= base_url()?>/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="<?= base_url()?>/assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="<?= base_url()?>/assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url()?>/assets/css/neon-core.css">
	<link rel="stylesheet" href="<?= base_url()?>/assets/css/neon-theme.css">
	<link rel="stylesheet" href="<?= base_url()?>/assets/css/neon-forms.css">
	<link rel="stylesheet" href="<?= base_url()?>/assets/css/custom.css">

	<script src="<?= base_url()?>/assets/js/jquery-1.11.0.min.js"></script>
	<script type="text/javascript">
		var baseUrl = "<?= base_url()?>" ;
	</script>
	

	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->


	</head>
	<body class="page-body" data-url="http://neon.dev">

		<div class="page-container horizontal-menu">


			<header class="navbar navbar-fixed-top"><!-- set fixed position by adding class "navbar-fixed-top" -->

				<div class="navbar-inner">

					<!-- logo -->
					<div class="navbar-brand">
						<a href="index.html">
							<img src="<?= base_url()?>/assets/images/vci.png" width="30" alt="" />
						</a>
					</div>


					<!-- main menu -->

					<ul class="navbar-nav">
						<li>
							<a href="<?= base_url()?>/Front_end">
								<span>Home</span>
							</a>

						</li>
						<li>
							<a href="<?= base_url()?>/Front_end/jobVacancy">
								<span>Job Vacancy</span>
							</a>

						</li>
						<li>
							<a href="<?= base_url()?>/Front_end#category">
								<span>Category</span>
							</a>

						</li>

					</ul>


					<!-- notifications and other links -->
					<ul class="nav navbar-right pull-right">


						<!-- raw links -->
						<?php if(! session()->get('is_login')){ ?>
							<li class="dropdown">
								<li>
									<a href="#" onclick="jQuery('#modal-1').modal('show');">Login</a>
								</li>
							</li>
							<li class="dropdown">
								<li>
									<a href="<?= base_url()?>/register">Register</a>
								</li>
							</li>
						<?php }else{ ?>
							<li>
								<a href="<?= base_url()?>/my-account">
									<i class="entypo-user right"></i> Account Setting 
								</a>
							</li>
							<li>
								<a href="<?= base_url()?>/Front_end/logout">
									<i class="entypo-logout right"></i> Log Out 
								</a>
							</li>
						<?php } ?>

						<!-- mobile only -->
						<li class="visible-xs">	

							<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
							<div class="horizontal-mobile-menu visible-xs">
								<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
									<i class="entypo-menu"></i>
								</a>
							</div>

						</li>

					</ul>

				</div>

			</header>	
			<div class="main-content">

				<div class="row">
					<?php if (!empty(session()->getFlashdata('success'))) { ?>
						<div class="form-group"> <div class="alert alert-success"><strong>Well Done!</strong>
							<?php echo session()->getFlashdata('success'); ?></div>
						</div>
					<?php } ?>
					<?php if (!empty(session()->getFlashdata('error'))) { ?>
						<div class="form-group"> <div class="alert alert-danger"><strong>Alert!</strong>
							<?php echo session()->getFlashdata('error'); ?></div>
						</div>
					<?php } ?>
					<?php if (!empty(session()->getFlashdata('info'))) { ?>
						<div class="form-group"> <div class="alert alert-info"><strong>Info!</strong>
							<?php echo session()->getFlashdata('info'); ?></div>
						</div>
					<?php } ?>
					<?php if (!empty(session()->getFlashdata('warning'))) { ?>
						<div class="form-group"> <div class="alert alert-warning"><strong>Warning!</strong>
							<?php echo session()->getFlashdata('warning'); ?></div>
						</div>
					<?php } ?>	
				</div>

				<?= $this->renderSection('content'); ?>
				<!-- Footer -->
				<footer class="main">


					&copy; 2022 <strong>VCI</strong>

				</footer>		
			</div>


			<div id="chat" class="fixed" data-current-user="Art Ramadani" data-order-by-status="1" data-max-chat-history="25">

				<div class="chat-inner">


					<h2 class="chat-header">
						<a href="#" class="chat-close" data-animate="1"><i class="entypo-cancel"></i></a>

						<i class="entypo-users"></i>
						Chat
						<span class="badge badge-success is-hidden">0</span>
					</h2>


					<div class="chat-group" id="group-1">
						<strong>Favorites</strong>

						<a href="#" id="sample-user-123" data-conversation-history="#sample_history"><span class="user-status is-online"></span> <em>Catherine J. Watkins</em></a>
						<a href="#"><span class="user-status is-online"></span> <em>Nicholas R. Walker</em></a>
						<a href="#"><span class="user-status is-busy"></span> <em>Susan J. Best</em></a>
						<a href="#"><span class="user-status is-offline"></span> <em>Brandon S. Young</em></a>
						<a href="#"><span class="user-status is-idle"></span> <em>Fernando G. Olson</em></a>
					</div>


					<div class="chat-group" id="group-2">
						<strong>Work</strong>

						<a href="#"><span class="user-status is-offline"></span> <em>Robert J. Garcia</em></a>
						<a href="#" data-conversation-history="#sample_history_2"><span class="user-status is-offline"></span> <em>Daniel A. Pena</em></a>
						<a href="#"><span class="user-status is-busy"></span> <em>Rodrigo E. Lozano</em></a>
					</div>


					<div class="chat-group" id="group-3">
						<strong>Social</strong>

						<a href="#"><span class="user-status is-busy"></span> <em>Velma G. Pearson</em></a>
						<a href="#"><span class="user-status is-offline"></span> <em>Margaret R. Dedmon</em></a>
						<a href="#"><span class="user-status is-online"></span> <em>Kathleen M. Canales</em></a>
						<a href="#"><span class="user-status is-offline"></span> <em>Tracy J. Rodriguez</em></a>
					</div>

				</div>

				<!-- conversation template -->
				<div class="chat-conversation">

					<div class="conversation-header">
						<a href="#" class="conversation-close"><i class="entypo-cancel"></i></a>

						<span class="user-status"></span>
						<span class="display-name"></span> 
						<small></small>
					</div>

					<ul class="conversation-body">	
					</ul>

					<div class="chat-textarea">
						<textarea class="form-control autogrow" placeholder="Type your message"></textarea>
					</div>

				</div>

			</div>


			<!-- Chat Histories -->
			<ul class="chat-history" id="sample_history">
				<li>
					<span class="user">Art Ramadani</span>
					<p>Are you here?</p>
					<span class="time">09:00</span>
				</li>

				<li class="opponent">
					<span class="user">Catherine J. Watkins</span>
					<p>This message is pre-queued.</p>
					<span class="time">09:25</span>
				</li>

				<li class="opponent">
					<span class="user">Catherine J. Watkins</span>
					<p>Whohoo!</p>
					<span class="time">09:26</span>
				</li>

				<li class="opponent unread">
					<span class="user">Catherine J. Watkins</span>
					<p>Do you like it?</p>
					<span class="time">09:27</span>
				</li>
			</ul>




			<!-- Chat Histories -->
			<ul class="chat-history" id="sample_history_2">
				<li class="opponent unread">
					<span class="user">Daniel A. Pena</span>
					<p>I am going out.</p>
					<span class="time">08:21</span>
				</li>

				<li class="opponent unread">
					<span class="user">Daniel A. Pena</span>
					<p>Call me when you see this message.</p>
					<span class="time">08:27</span>
				</li>
			</ul></div>



			<link rel="stylesheet" href="<?= base_url()?>/assets/js/select2/select2-bootstrap.css">
			<link rel="stylesheet" href="<?= base_url()?>/assets/js/select2/select2.css">
			<link rel="stylesheet" href="<?= base_url()?>/assets/js/jvectormap/jquery-jvectormap-1.2.2.css">
			<link rel="stylesheet" href="<?= base_url()?>/assets/js/rickshaw/rickshaw.min.css">
			<link rel="stylesheet" href="<?= base_url()?>/assets/js/datatables/responsive/css/datatables.responsive.css">

			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

			<!-- Bottom Scripts -->
			<script src="<?= base_url()?>/assets/js/gsap/main-gsap.js"></script>
			<script src="<?= base_url()?>/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
			<script src="<?= base_url()?>/assets/js/bootstrap.js"></script>
			<script src="<?= base_url()?>/assets/js/joinable.js"></script>
			<script src="<?= base_url()?>/assets/js/resizeable.js"></script>
			<script src="<?= base_url()?>/assets/js/neon-api.js"></script>

			<script src="<?= base_url()?>/assets/js/jquery.dataTables.min.js"></script>
			<script src="<?= base_url()?>/assets/js/datatables/TableTools.min.js"></script>
			<script src="<?= base_url()?>/assets/js/dataTables.bootstrap.js"></script>
			<script src="<?= base_url()?>/assets/js/datatables/jquery.dataTables.columnFilter.js"></script>
			<script src="<?= base_url()?>/assets/js/datatables/lodash.min.js"></script>
			<script src="<?= base_url()?>/assets/js/datatables/responsive/js/datatables.responsive.js"></script>

			<script src="<?= base_url()?>/assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
			<script src="<?= base_url()?>/assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js"></script>
			<script src="<?= base_url()?>/assets/js/jquery.sparkline.min.js"></script>
			<script src="<?= base_url()?>/assets/js/rickshaw/vendor/d3.v3.js"></script>
			<script src="<?= base_url()?>/assets/js/rickshaw/rickshaw.min.js"></script>
			<script src="<?= base_url()?>/assets/js/select2/select2.min.js"></script>
			<script src="<?= base_url()?>/assets/js/raphael-min.js"></script>
			<script src="<?= base_url()?>/assets/js/morris.min.js"></script>
			<script src="<?= base_url()?>/assets/js/toastr.js"></script>
			<script src="<?= base_url()?>/assets/js/neon-chat.js"></script>
			<script src="<?= base_url()?>/assets/js/neon-custom.js"></script>
			<script src="<?= base_url()?>/assets/js/neon-demo.js"></script>
			<script src="<?= base_url()?>/assets/js/jquery.validate.min.js"></script>


			<script src="<?= base_url()?>/assets/js/bootstrap-tagsinput.min.js"></script>
			<script src="<?= base_url()?>/assets/js/typeahead.min.js"></script>
			<script src="<?= base_url()?>/assets/js/selectboxit/jquery.selectBoxIt.min.js"></script>
			<script src="<?= base_url()?>/assets/js/bootstrap-datepicker.js"></script>
			<script src="<?= base_url()?>/assets/js/bootstrap-timepicker.min.js"></script>
			<script src="<?= base_url()?>/assets/js/bootstrap-colorpicker.min.js"></script>
			<script src="<?= base_url()?>/assets/js/daterangepicker/moment.min.js"></script>
			<script src="<?= base_url()?>/assets/js/daterangepicker/daterangepicker.js"></script>
			<script src="<?= base_url()?>/assets/js/jquery.multi-select.js"></script>
			<script src="<?= base_url()?>/assets/js/icheck/icheck.min.js"></script>


		</body>

		<form id="form_login" role="form" method="post" class="form-horizontal form-groups-bordered validate" enctype="multipart/form-data">
			<div class="modal fade-scale" id="modal-1">
				<div class="modal-dialog">
					<div class="modal-content">

						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">LOGIN</h4>
						</div>

						<div class="modal-body">
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Email</label>

								<div class="col-sm-7">
									<input type="email" name="email" id="email_login" class="form-control" data-validate="email" data-message-required="Email Required" autocomplete="off">
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Password</label>

								<div class="col-sm-7">
									<input type="password" name="password" id="password_login" class="form-control" data-validate="required" data-message-required="Password Required" autocomplete="off">
								</div>
							</div>
							<br>
							<div class="form-group">
								<div class="col-sm-12">
									<button type="button" class="btn btn-info btn-lg btn-block" id="login_button">Login</button>
								</div>
							</div>

						</div>
					</div>
				</div>
			</form>

			<script type="text/javascript">

				var siteUrl ="<?= base_url()?>";

				$("#login_button").click(function(){
					if($(".validate").valid()){
						$("#form_login").submit();
					}
					
				});

				$("#form_login").submit(function(e){
					e.preventDefault();
					$.ajax({
						url : siteUrl + '/Front_end/login',
						type : 'POST',
        				data : new FormData(this),
						processData : false, 
						contentType : false, 
						beforeSend: function(){
							Swal.fire("Please Wait ...");
						},
						success: function(response){

							res = JSON.parse(response);
							var status = res.status;
							if(status == "failed"){
								Swal.fire({
									icon: 'error',
									title: 'Oops...',
									text: 'Incorrect Email Or Password!'
								});
							}else if(status == "success"){
								Swal.fire({
									icon: 'success',
									title: 'Success'
								}).then((result)=>{
									window.location = siteUrl+"/my-account";
								});
							}else if(status == "not_verify"){
								Swal.fire({
									icon: 'error',
									title: 'Account Not Verify',
									text: 'Account not verify, Please check inbox email or spam email'
								});
							}else{
								Swal.fire({
									icon: 'error',
									title: 'Contact IT'
								});
							}
							
								    
							},
							error: function(){      

							}
						});
				});	

				
				

				
			</script>
			</html>