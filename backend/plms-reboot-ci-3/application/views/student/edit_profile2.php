<!-- nav_body -->
<div class="col-sm-10"> 	
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Edit Student Information</h3>
				</div>
				
			</div>
		</div>
	</div>
	<!-- /.row -->

	<div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xm-12" >
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i>Personal Information</h3>
					</div>
					<div class="panel-body">
						
						

						<label for="stu_firstname">First Name</label> 
						<div class="input-group">								
								<input  form="student_editprofile_form" type="text" name="stu_firstname" value="" id="stu_firstname" class="form-control" placeholder="ชื่อ" required></input>
								<span class="input-group-addon">
									<i class="glyphicon glyphicon-user"></i>
								</span>
						</div>  

						<div class="form-group ">
							<label for="stu_lastname">Last Name</label>
							<div class="input-group">
								
								<input  form="student_editprofile_form" type="text" name="stu_lastname" value="" id="stu_lastname" class="form-control" placeholder="นามสกุล" required>
								<span class="input-group-addon">
									<i class="glyphicon glyphicon-user"></i>
								</span>
							</div>  
						</div>

						<div class="form-group ">
							<label for="stu_nickname" >Nick Name</label>
							<div class="input-group">								
								<input  form="student_editprofile_form" type="text" name="stu_nickname" value="" id="stu_nickname" class="form-control" placeholder="ชื่อเล่น">
								<span class="input-group-addon">
									<i class="glyphicon glyphicon-user"></i>
								</span>
							</div>  
						</div>

						<div class="form-group ">
							<label for="stu_dob" >Date of Birth</label>
							<div class="input-group">								
								<input  form="student_editprofile_form" type="date" name="stu_dob" value="" id="stu_dob" class="form-control">
								<span class="input-group-addon">
									<i class="glyphicon glyphicon-time"></i>
								</span>
							</div>  
						</div>
	<!--
						<div></span>
						<div class="form-group">
							<div class="radio-inline">
							<input form="student_editprofile_form" type="radio" name="gender" value="Male" > Male</input>
							</div>
						</div>

						<div class="form-group">
							<div class="radio-inline">
							<input form="student_editprofile_form" type="radio" name="gender" value="Female" > Female</input>
						</div>	
						</div></span>
-->

						

						<label>Upload your picture</label>
						<input type="file" form="student_editprofile_form" name="stu_avartar"></input>				
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-4 col-md-4 col-sm-4 col-xm-12" >
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Education & Contact Info.</h3>
				</div>
				<div class="panel-body">
					<div class="form-group ">
						<label for="stu_email">Email</label>
						<div class="input-group">
							<span class="input-group-addon">
							<i class="glyphicon glyphicon-envelope"></i>
							</span>
							<input form="student_editprofile_form" type="email" name="stu_email" value="" id="stu_email" class="form-control" placeholder="email">
						</div>  
					</div>

					<div class="form-group ">
						<label for="stu_tel">Telephone</label>
						<div class="input-group">
						<span class="input-group-addon">
							<i class="glyphicon glyphicon-phone"></i>
						</span>
						<input form="student_editprofile_form" type="text" name="stu_tel" value="" id="stu_tel" class="form-control" placeholder="เบอร์โทรศัพท์">
						</div>  
					</div>

					<div class="form-group">
						<label for="stu_department"></label>
						<select class="form-control" id="stu_departmnet" name="stu_department">
							<option>วิศวกรรมคอมพิวเตอร์</option>
							<option>วิศวกรรมเครื่องกล</option>
							<option>วิศวกรรมเคมี</option>
							<option>วิศวกรรมอาหาร</option>
							<option>วิศวกรรมไฟฟ้า</option>
						</select>
					</div>

					<div class="form-group ">
						<label for="stu_group">Group number</label>
						
							
						<select form="student_editprofile_form" type="text" name="stu_group" value="" id="stu_group" class="form-control">
							<option value="15">กลุ่มที่ 15</option>
							<option value="27">กลุ่มที่ 27</option>
							<option value="29">กลุ่มที่ 29</option>
							<option value="32">กลุ่มที่ 32</option>
							<option value="38">วิกลุ่มที่ 38</option>
						</select>						
					</div>

					<!--<div class="form-group">
							<label class="control-label">Gender</label>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div id="gender" class="btn-group" data-toggle="buttons">
									<label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
										<input form="student_editprofile_form" type="radio" name="gender" value="male"> &nbsp; Male &nbsp;
									</label>
									<label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
										<input form="student_editprofile_form" type="radio" name="gender" value="female"> Female
									</label>
								</div>
							</div>
						</div>
						-->

				</div>
			</div>
		</div>


		<div class="col-lg-4 col-md-4 col-sm-4 col-xm-12" >
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Submit</h3>
				</div>
				<div class="panel-body">
					<form action="<?php echo site_url('student/edit_profile_action'); ?>" method="post" accept-charset="utf-8" id="student_editprofile_form">

						<div class="form-group " >
							<label for="stu_id" >Student ID</label> 
							<div class="input-group">
								<span class="input-group-addon">
									<i class="glyphicon glyphicon-user"></i>
								</span>
								<input type="text" name="stu_id" value="<?php echo $_SESSION['stu_id'] ; ?>" id="stu_id" class="form-control" disabled >
							</div>  
						</div>

						

						<div class="form-group ">
							<label for="password">Password</label>
							<div class="input-group">
								<span class="input-group-addon">
								<i class="glyphicon glyphicon-lock"></i>
								</span>
								<input type="password" name="password" id="password" class="form-control" placeholder="New Password">
							</div> 
						</div>


						<div class="form-group ">
							<label for="password2">Password re-enter</label>
							<div class="input-group">
								<span class="input-group-addon">
								<i class="glyphicon glyphicon-lock"></i>
								</span>
								<input type="password" name="password2" id="password2" class="form-control" placeholder="Password re-enter">
							</div> 
						</div>


						<input type="submit" value="Submit" class="btn btn-primary" form="student_editprofile_form">

					</form>
						

					
					
				</div>
			</div>
		</div>
		<!-- /.row -->
</div>
<!-- /.row -->

