<?= $this->extend('layout/template_utama'); ?>

<?= $this->section('content'); ?>

<div class="row">
	<div class="col-md-12">
		<div class="tabs-vertical-env">
			<ul class="nav tabs-vertical">
				<?= view('my_account/menu_account'); ?>
			</ul>

			<div class="tab-content">
				<div class="tab-pane active" id="tab-1">
					
					<div class="row">
						<div class="col-md-8">
							<h3>My Application</h3>
							<table class="table table-condensed table-bordered table-hover table-striped" id="table-1">
								<thead>
									<tr>
										<th>TITLE</th>
										<th>LEVEL</th>
										<th>CLOSING DATE</th>
										<th>LOCATION</th>
										<th>STATUS</th>
										<th>&nbsp;</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($application as $value) { ?>
										<tr>
											<td><?= $value['job_position']?></td>
											<td><?= $value['level_name']?></td>
											<td><?= $value['expired_date']?></td>
											<td><?= $value['location_name']?></td>
											<td><?= $value['flag_name']?></td>
											<td>
												<a href="<?= base_url()?>/My_account/appDetail/<?=$value['noapp']?>" class="btn btn-info">Detail</a>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

		var responsiveHelper;
		var breakpointDefinition = {
			tablet: 1024,
			phone : 480
		};
		var tableContainer;

		jQuery(document).ready(function($)
		{
			tableContainer = $("#table-1");
			
			tableContainer.dataTable({
				"sPaginationType": "bootstrap",
				"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"bStateSave": true,
				

				bAutoWidth     : false,
				fnPreDrawCallback: function () {
					
					if (!responsiveHelper) {
						responsiveHelper = new ResponsiveDatatablesHelper(tableContainer, breakpointDefinition);
					}
				},
				fnRowCallback  : function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
					responsiveHelper.createExpandIcon(nRow);
				},
				fnDrawCallback : function (oSettings) {
					responsiveHelper.respond();
				}
			});
			
			$(".dataTables_wrapper select").select2({
				minimumResultsForSearch: -1
			});
		});
	
</script>

<?= $this->endSection(); ?>