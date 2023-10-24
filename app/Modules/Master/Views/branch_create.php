<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main');?>
	<?= view('Auth\Views\_notifications') ?>
	<?php if($success !='') {?>
    	<ul class="noty_elem">
        	<li class="i_noty">
        	<p>
        		<?php echo $success;?>
        	</p>
        	</li>
    	</ul>
	<?php } ?>
	<form method="POST" action="<?= site_url('admin/user/create'); ?>" accept-charset="UTF-8" id="regitstraion_form" class="form_container left_label">
		<?= csrf_field() ?>
		<input type="hidden" name="eid" value="<?php echo $eid;?>" >
		<ul>
			<li>
				<div class="form_grid_12">
					<label class="field_title">Branch Details</label>
					<div class="form_input">
						<div class="form_grid_6 alpha">
							<input name="name" type="text" tabindex="1" class="required error">
							<span class=" label_intro">Branch Name*</span>
						</div>
						<div class="form_grid_6 ">
							<input name="branch_code" type="text"  tabindex="2" class="required error">
							<span class=" label_intro">Branch Code*</span>
						</div>
						<div class="form_grid_6 alpha">
							<input name="location" type="text" tabindex="3" class="required error">
							<span class=" label_intro">Location*</span>
						</div>
						<div class="form_grid_6 ">
							<input name="mobile_number" type="text"  tabindex="4" class="required error">
							<span class=" label_intro">Phone*</span>
						</div>
						<div class="form_grid_6 alpha">
							<input name="fax" type="text"  tabindex="4" class="required error">
							<span class=" label_intro">Fax</span>
						</div>
						<div class="form_grid_6 ">
							<input name="email" type="text"  tabindex="4" class="error">
							<span class=" label_intro">email</span>
						</div>
						<div class="form_grid_6 alpha">
							<input name="currency_id" type="text"  tabindex="4" class="required error">
							<span class=" label_intro">Currency*</span>
						</div>
						<span class="clear"></span>
					</div>
				</div>
			</li>
			<li>
				<div class="form_grid_12">
					<label class="field_title">Job Details</label>
					<div class="form_input">
						<div class="form_grid_6 alpha">
							<input name="branch_id" type="text" tabindex="5" class="required error">
							<span class=" label_intro">Branch</span>
						</div>
						<div class="form_grid_6 ">
							<input name="user_group_id" type="text"  tabindex="6" class="required error">
							<span class=" label_intro">User Group</span>
						</div>
						<div class="form_grid_6 alpha">
							<input name="designation" type="text" tabindex="7" class="required error">
							<span class=" label_intro">Designation</span>
						</div>
						<div class="form_grid_6 ">
							<select data-placeholder="Your Favorite Football Team" class="chzn-select mid" tabindex="-1" id="selEJZ" name="is_lead_owner">
								<option value=""></option>
								<!--  <optgroup label="NFC EAST">-->
								<option value="1">Yes</option>
								<option value="0">No</option>
								<!--</optgroup>-->
							</select>
							<span class=" label_intro">Is lead owner</span>
						</div>
						<span class="clear"></span>
					</div>
				</div>
			</li>
			<li>
				<div class="form_grid_12">
					<label class="field_title">Login Credientials</label>
					<div class="form_input">
						<div class="form_grid_6 alpha">
							<input name="username" type="text" tabindex="9" class="required error">
							<span class=" label_intro">Username</span>
						</div>
						<div class="form_grid_6 ">
							<input name="password" type="password"  tabindex="10" class="required error">
							<span class=" label_intro">Password</span>
						</div>
						<span class="clear"></span>
					</div>
				</div>
			</li>
			<li>
			<div class="form_grid_12">
				<div class="form_input">
					<button type="submit" class="btn_small btn_blue"><span>Submit</span></button>
					<button type="reset" class="btn_small btn_blue"><span>Reset</span></button>
				</div>
			</div>
			</li>
		</ul>
	</form>
<?= $this->endSection() ?>