<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main');
?>
<div class="table_content">
	<div class="btn_30_blue right-position">
		<a href="<?php echo site_url();?>/admin/branch"><span>Add Branch</span></a>
	</div>
    <table class="display data_tbl_search dataTable" id="DataTables_Table_4">
    	<thead>
        	<tr role="row">
        		<th class="" role="columnheader" rowspan="1" colspan="1">
        			#Id
        		</th>
        		<th class="" role="columnheader" rowspan="1" colspan="1">
        			Branch Name
        		</th>
        		<th class="" role="columnheader" rowspan="1" colspan="1">
        			Branch Code
        		</th>
        		<th class="" role="columnheader" rowspan="1" colspan="1">
        			Email
        		</th>
        		<th class="" role="columnheader" rowspan="1" colspan="1">
        			Phone
        		</th>
        		<th class="" role="columnheader" rowspan="1" colspan="1">
        			Branch Head
        		</th>
        		<th class="" role="columnheader" rowspan="1" colspan="1">
        			Location
        		</th>
        		<th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1">
        			 Action
        		</th>
        	</tr>
    	</thead>
    						
    	<tbody role="alert" aria-live="polite" aria-relevant="all">
    	<?php 
    	   $i=0;
    	   foreach($records As $data) {
    	       if($i%2==0) $class="odd"; else $class="even";
    	    
    	?>
    	<tr class="gradeA <?php echo $class;?>">
			<td class="">
				<?php echo $data['id'];?>
			</td>
			<td class=" ">
				<?php echo $data['name'];?>
			</td>
			<td class="">
				 <?php echo $data['branch_code'];?>
			</td>
			<td class="">
				 <?php echo $data['mobile_number'];?>
			</td>
			<td class="center ">
				<?php echo $data['email'];?>
			</td>
			<td class="center ">
				<?php echo $data['branch_head_id'];?>
			</td>
			<td class="center ">
				<?php echo $data['user_group_id'];?>
			</td>
			<td class="center ">
				<?php echo $data['location'];?>
			</td>
			<td class="center ">
				<span><a class="action-icons c-edit" href="#" original-title="Edit">Edit</a></span>
				<span><a class="action-icons c-delete" href="#" original-title="delete">Delete</a></span>
				<span><a class="action-icons c-approve" href="#" original-title="Approve">Approve</a></span>
			</td>
		</tr>
		<?php } ?>
    	</tbody>
    </table>
    <?php 
    $pages = ceil($total/$limit);
    if(isset($_GET['page'])) {
        $current = $_GET['page'];
    }
    if($pages > 1) {
    ?>
    <div class="table_bottom">
    	<div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_0_paginate">
    		<a  href="<?php echo site_url();?>/admin/branches?page=1" class="first paginate_button paginate_button_disabled" id="DataTables_Table_0_first">First</a>
    		<?php if($current > 1) {?>
    		<a   href="<?php echo site_url();?>/admin/branches?page=<?php echo $current-1;?>" class="previous paginate_button paginate_button_disabled" id="DataTables_Table_0_previous">Previous</a>
    		<?php } ?>
    		<?php 
    		for($i=1;$i<=$pages;$i++) {
    		    if($current==$i) $class = 'paginate_active'; else $bg = 'paginate_button';
    		?>
    		<a  href="<?php echo site_url();?>/admin/branches?page=<?php echo $i;?>" class="<?php echo $class; ?>"><?php echo $i;?></a>
    		<?php } ?>
    		<a href="<?php echo site_url();?>/admin/branches?page=<?php echo $pages;?>" class="last paginate_button" id="DataTables_Table_0_last">Last</a>
    		<a href="<?php echo site_url();?>/admin/branches?page=<?php echo $current+1;?>" class="next paginate_button" id="DataTables_Table_0_next">Next</a>
    	</div>
    	<div class="clear"></div>
    </div>
   <?php } ?>      
</div>
<?= $this->endSection() ?>