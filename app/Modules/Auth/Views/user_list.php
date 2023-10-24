<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main');
?>
<div class="grid_12 btnlinks">
	<div class="btn_40_blue ucase">
		<a href="<?php echo site_url();?>admin/user/create"><span>Add User</span></a>&nbsp;
		<a href="<?php echo site_url();?>admin/usergroups"><span>User Groups</span></a>
	</div>
</div>
<div class="grid_12">
	<div class="widget_wrap">
		<div class="widget_top">
			<span class="h_icon blocks_images"></span>
			<h6>Users</h6>
		</div>
		<div class="widget_content">
			<div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
				<div class="table_top"></div>
					<div class="table_content"><table class="display data_tbl dataTable" id="DataTables_Table_1">
						<thead>
						<tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 97px;" aria-sort="ascending" aria-label="
								 User Name
							: activate to sort column descending">
								 User Name
							</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 83px;" aria-label="
								 Name
							: activate to sort column ascending">
								 Name
							</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 111px;" aria-label="
								 Address
							: activate to sort column ascending">
								 Address
							</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 191px;" aria-label="
								 Email
							: activate to sort column ascending">
								 Email
							</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 87px;" aria-label="
								 Thumb
							: activate to sort column ascending">
								 Thumb
							</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 176px;" aria-label="
								 Status
							: activate to sort column ascending">
								 Status
							</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 149px;" aria-label="
								 Action
							: activate to sort column ascending">
								 Action
							</th></tr>
						</thead>
						<tbody role="alert" aria-live="polite" aria-relevant="all"><tr class="odd">
							<td class="  sorting_1">
								<a href="#">Jaman</a>
							</td>
							<td class=" ">
								<a href="#">Ui Jaman</a>
							</td>
							<td class=" ">
								 Address Line
							</td>
							<td class="center ">
								 jaman@hostname.com
							</td>
							<td class="center ">
								<div class="user-thumb">
									<a href="#"><img alt="User" src="images/user-thumb.png" width="40" height="40"></a>
								</div>
							</td>
							<td class="center ">
								<span class="badge_style b_suspend">Suspended</span>
							</td>
							<td class="center ">
								<span><a class="action-icons c-edit" href="#" original-title="Edit">Edit</a></span><span><a class="action-icons c-delete" href="#" original-title="delete">Delete</a></span><span><a class="action-icons c-approve" href="#" original-title="Approve">Approve</a></span><span><a class="action-icons c-suspend" href="#" original-title="Suspend">Suspend</a></span>
							</td>
						</tr><tr class="even">
							<td class="  sorting_1">
								<a href="#">Jhon</a>
							</td>
							<td class=" ">
								<a href="#">Jhon Doe</a>
							</td>
							<td class=" ">
								 Address Line
							</td>
							<td class="center ">
								 jhon@hostname.com
							</td>
							<td class="center ">
								<div class="user-thumb">
									<a href="#"><img alt="User" src="<?php echo site_url();?>assets/admin/images/user_thumb.png" width="40" height="40"></a>
								</div>
							</td>
							<td class="center ">
								<span class="badge_style b_done">New</span><span class="badge_style b_pending">Pending</span>
							</td>
							<td class="center ">
								<span><a class="action-icons c-edit" href="#" original-title="Edit">Edit</a></span><span><a class="action-icons c-delete" href="#" original-title="delete">Delete</a></span><span><a class="action-icons c-approve" href="#" original-title="Approve">Approve</a></span><span><a class="action-icons c-suspend" href="#" original-title="Suspend">Suspend</a></span>
							</td>
						</tr></tbody></table></div>
						<div class="table_bottom">
						</div>
					</div>
				</div>
			</div>
<?= $this->endSection() ?>