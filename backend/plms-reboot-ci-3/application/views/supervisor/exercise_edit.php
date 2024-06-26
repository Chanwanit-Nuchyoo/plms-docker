<!-- nav_body -->
<div class="col-lg-10 col-md-10 col-sm-10 "><div class="container-fluid">
	<?php
            $exercise_id		= $_SESSION['lab_2b_edit']['exercise_id'];
            $lab_chapter		= $_SESSION['lab_2b_edit']['lab_chapter'];
            $lab_level			= $_SESSION['lab_2b_edit']['lab_level']; 
            $lab_name			= $_SESSION['lab_2b_edit']['lab_name'];
            $lab_content		= $_SESSION['lab_2b_edit']['lab_content'];
            $testcase			= $_SESSION['lab_2b_edit']['testcase'];
            $sourcecode_name	= $_SESSION['lab_2b_edit']['sourcecode'];
			$sourcecode_content	= $_SESSION['sourcecode_content'];
            $full_mark			= $_SESSION['lab_2b_edit']['full_mark'];
            $added_date			= $_SESSION['lab_2b_edit']['added_date'];
            $added_by			= $_SESSION['lab_2b_edit']['added_by'];
            $lab_constrain		= $_SESSION['lab_2b_edit']['lab_constrain'];
			

    ?>
	<div class="container-fluid"><div class="row"><div class="col-sm-12">
		<form action="<?php echo site_url('supervisor/exercise_edit')?>" id="exercise_edit" method="post" name="exercise_edit" accept-charset="utf-8" enctype="multipart/form-data"  onsubmit="return postForm()">
		
			<div class="row" style="display:inline-block;">
				<!-- <span><div class="form-group col-md-2">
					
					<!-- <div>
						<button class="btn btn-lg" name="exercise_id" hidden>Exercise ID : <?php echo $exercise_id ?></button>
					</div> -->
				</div></span> -->

				<span><div class="form-group col-md-2">
					<label for="lab_chapter" hidden>Chapter</label>
					<select class="form-control" id="lab_chapter" name="lab_chapter" form="exercise_edit" value="" style="">
						<option value="01" <?php if ($lab_chapter==1) echo "selected"; ?>>Chapter 01 Introduction</option>
						<option value="02" <?php if ($lab_chapter==2) echo "selected"; ?>>Chapter 02 printf() </option>
						<option value="03" <?php if ($lab_chapter==3) echo "selected"; ?>>Chapter 03 variable & scanf() </option>
						<option value="04" <?php if ($lab_chapter==4) echo "selected"; ?>>Chapter 04 if statement </option>
						<option value="05" <?php if ($lab_chapter==5) echo "selected"; ?>>Chapter 05 Loop statement</option>
						<option value="06" <?php if ($lab_chapter==6) echo "selected"; ?>>Chapter 06 Loop + if </option>
						<option value="07" <?php if ($lab_chapter==7) echo "selected"; ?>>Chapter 07 Array</option>
						<option value="08" <?php if ($lab_chapter==8) echo "selected"; ?>>Chapter 08 Structure</option>
						<option value="09" <?php if ($lab_chapter==9) echo "selected"; ?>>Chapter 09 Pointer</option>
						<option value="10" <?php if ($lab_chapter==10) echo "selected"; ?>>Chapter 10 Function</option>
						<option value="11" <?php if ($lab_chapter==11) echo "selected"; ?>>Chapter 11 File</option>
						<option value="12" <?php if ($lab_chapter==12) echo "selected"; ?>>Quiz #1</option>
						
					</select>
				</div></span>

				<span><div class="form-group  col-md-2">
					<label for="lab_level" hidden>Level</label>
					<select class="form-control" id="lab_level" name="lab_level" form="exercise_edit" value="" style="">
						<option value="0">Level-00 Undefined</option>

						<option value="1" <?php if ($lab_level==1) echo "selected"; ?>>Level-01 Basic</option>
						<option value="2" <?php if ($lab_level==2) echo "selected"; ?>>Level-02 Middle</option>
						<option value="3" <?php if ($lab_level==3) echo "selected"; ?>>Level-03 Intermediate</option>
						<option value="4" <?php if ($lab_level==4) echo "selected"; ?>>Level-04 Expert</option>
						<option value="5" <?php if ($lab_level==5) echo "selected"; ?>>Level-05 Professtional</option>
														
					</select>
				</div></span>
				

				<span><div class="form-group col-md-6" ">
					<label for="lab_name">Lab name : </label>
					<input type="text" name="lab_name" form="exercise_edit" style="width:300px;height:40px"  value="<?php echo $_SESSION['lab_2b_edit']['lab_name']; ?>"></input>
				</div></span>

			</div>

			<div class="row" style="display:inline-block;">
				<div class="col-8">
					<div class="panel-heading" >
						<div class="panel">
							<div class="panel-heading">
								<span><h3 class="pull-left">CONTENT : </h3></span>
								<span><h4 style="color:red;">ข้อมูลโจทย์</h4></span>
							</div>
							<div class="panel-body">
								<textarea class="summernote" id="summernote" type="textarea" name="lab_content" form="exercise_edit"><?php echo $lab_content; ?></textarea>
							</div>
						</div>
					</div>
					<div class="panel-body" style="text-align:left;tab-size:4;">
						<div class="panel">
							<div class="panel-heading">
								<span><h3  class="pull-left">Source code : </h3></span>
								<span><h4 class="text-center" style="color:red;">student will not see sourcecode.</h4></span>
							</div>
							<div class="panel-body" style="text-align:left;tab-size:4; font-family: Courier;">
								<textarea class="sourcecode_content" cols="120" rows="25" id="sourcecode_content" name="sourcecode_content" ><?php echo $sourcecode_content; ?></textarea>
							</div>
						</div>

						
						
					</div>
					<div class="panel-footer pull-left" style="text-align:left;">
						<h3>Output : </h3>
						<!-- <div style="font-family: Courier, monospace;font-style: normal;font-size: 16px;font-variant: normal;text-align: left; white-space:pre-wrap; width:770px; background-color:rgb(100,100,100); color:white; align:center;" ></div>20/1/2560 -->
						<div  style="font-family: Courier;font-size: 16px;border:2px blue;">
						<?php echo '<code><textarea cols="80" rows="25" style="background:black;color:white;">'.$_SESSION['sourcecode_output'].'</textarea></code>'; ?>
						</div>
							
					</div>
				</div>
				<div class="col-4">
				</div>
			</div>
			
			<!-- <div class="form-group pull-left">
				<label>New source code file : </label>
				<input id="userfile" type="file" name="usercode">
			</div> -->
				
			<div class="row" style="display:inline-block;">
				<div class="form-group ">
					<!-- <button type="reset" class="btn btn-default">Reset Button</button> -->
					<button type="submit" form="exercise_edit" onclick="checkSourceCode()">Submit Button</button> 
				
				</div>
			<div class="row" style="display:inline-block;">
			<input type="text" name="exercise_id" form="exercise_edit" value="<?php echo $exercise_id; ?>" hidden ></input>
			<input type="text" name="testcase" form="exercise_edit" value="<?php echo $testcase; ?>" hidden ></input>
			<input type="text" name="lab_constrain" form="exercise_edit" value="<?php echo $lab_constrain; ?>" hidden ></input>
			
		
		</form>
	</div></div></div>
	
	
	<script src="<?php echo base_url('assets/jquery/jquery-3.1.1.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/bootstrap-3.3.7/js/bootstrap.min.js') ?>"></script>	
	<script src="<?php echo base_url('assets/summernote/summernote.js') ?>"></script>	
	<script type="text/javascript" src="<?php echo base_url('assets/codemirror-5.22.0/lib/codemirror.js')?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/codemirror-5.22.0/mode/clike/clike.js')?>"></script>
	<!-- <script type="text/javascript" src="<?php echo base_url('assets/codemirror-5.22.0/mode/xml/xml.js')?>"></script> -->
	<!-- <script type="text/javascript" src="<?php echo base_url('assets/codemirror-5.22.0/formatting.js')?>"></script> -->
	<script>
		$(document).ready(function() {
			$('#summernote').summernote({
						
					toolbar: [
								// [groupName, [list of button]]
								['fontname', ['fontname']],
								['fontsize', ['fontsize']],
								['style', ['bold', 'italic', 'underline', 'clear']],
								['font', ['strikethrough', 'superscript', 'subscript']],
								
								['color', ['color']],
								['para', ['ul', 'ol', 'paragraph']],
								['height', ['height']]
							  ],
					height: 300,                 // set editor height
					width: 768,
					minHeight: null,             // set minimum height of editor
					maxHeight: null,             // set maximum height of editor
					focus: true,                  // set focus to editable area after initializing summernote

					//placeholder: '123',
					airmode: true
				});
			//$(document).getElementById('summernote').innerHTML=lab_content;
			
		});
	</script>

	<script>
		$(document).ready(function() {
		  $('.summernote').summernote();
		});
		var postForm = function() {
				var content = $('textarea[name="lab_content"]').html($('#summernote').code());
		}
	</script>

	<script type="text/javascript">
		function checkSourceCode(){
			var sourceCodeName = document.getElementById("userfile").value;
			if(sourceCodeName==""){
				alert("ไม่มี New Source Code");
				return true;
			}
			var extension = sourceCodeName.split(".");
			var fileName = extension[0].split('\\');
			if(/^[a-zA-Z0-9]+/.test(fileName[2]) == true)
			{

			}
			else{
				alert("ชื่อไฟล์สามารถประกอบด้วย a-z,A-Z,0-9 เท่านั้น");
				return false;
			}
			if(extension[1]!=document.getElementById("id_extension").value){
				alert("อนุญาตให้ส่งไฟล์สกุล ."+document.getElementById("id_extension").value+"เท่านั้น");
				return false;
			}
		}
	</script>
	<script>
		var editor = CodeMirror.fromTextArea(document.getElementById("sourcecode_content"), {
					lineNumbers: true,
					matchBrackets: true,
					mode: "text/x-csrc"
			});
	</script>
</div></div>