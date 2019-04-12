<?php include 'header.php'?>
<?php include 'sidebar.php'?>



<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Admin</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h2 class="page-header">Module</h2>
			</div>
		</div><!--/.row-->



<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$pdo = new PDO('mysql:dbname=group;host=localhost','root','root');

if(isset($_POST['submit'])) {
  $insert_query = 'INSERT INTO modules(module_name, module_level, exam_structure, merits_point, staff_id )VALUES(:module_name, :module_level, :exam_structure, :merits_point, :staff_id)';


  
  $add = $pdo->prepare($insert_query);

  
  unset($_POST['submit']);
  if($add->execute($_POST)){
    echo "<h2> Course added successful</h2>" ;
  }  
  else{
    echo "<h1>Oops..! error in adding data</h1>" ;
    }
  }
?>



		
	<div>
		  <form action="admin-addmodule.php" method="POST" enctype="multipart/form-data">
			  <div class="container">
			        <label><b>Module Name</b></label>
			        <input type="text" placeholder="Course name" name="module_name" ><br><br>

			        <label><b>Module level</b></label>
			        <input  type="text" placeholder="Details " name="module_level" ><br><br>

			        
						

			        <label><b >Module structure</b></label>
			        <input  type="text" placeholder="structure " name="exam_structure" ><br><br>

			        <label><b>Merits points</b></label>
			        <input type="text" placeholder="merits point" name="merits_point"><br><br>

			        <label><b>staff </b></label>
			        <select name="staff_id">//<!-- review table -->
						<?php
						//<!-- review table -->
						$tmt=$pdo->prepare("SELECT * FROM module_leaders");
						$tmt->execute();
						foreach ($tmt as $key ) {?>
					
						<option value="<?php echo $key['staff_id'];?>"> <?php echo $key['staff_id']; ?></option>
						<?php
						}
						?>
						
					</select>


			  

			        <button type="submit" name="submit">Add Module</button>
			    </div>
		 </form>
	</div>


	 <div class="row">
			<div class="col-md-12">
				<div class="panel panel-default chat">
					<div class="panel-heading">
						Assignment List
						
						<span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
					<div class="panel-body">

						<ul>

						<?php 

						$stmt=$pdo->prepare("SELECT * FROM modules");  // <!-- dsipaly rewview table -->

								$stmt->execute(); 

						foreach ($stmt as $key) { ?><!-- dsipaly rewview table -->
							
							

						<a href="#"><li> <?php echo $key["module_name"]; ?></li> </a>
							

							
						
						

						
							<?php 
							

						}


						 ?>
						 	</ul>
					</div>
					
				</div>
				
			</div>



</div>



