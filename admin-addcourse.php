<?php include 'header.php'?>
<?php include 'sidebar.php'?>




<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$pdo = new PDO('mysql:dbname=group;host=localhost','root','root');

if(isset($_POST['submit'])) {
  $insert_query = 'INSERT INTO assignments(assignment_name, details, issue_date, due_date )VALUES(:assignment_name, :details, :issue_date, :due_date)';


  
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
				<h2 class="page-header">Assignment</h2>
			</div>
		</div><!--/.row-->


		
	<div>
		  <form action="admin-addcourse.php" method="POST" enctype="multipart/form-data">
			  <div class="container">
			        <label><b>Assignment Name</b></label>
			        <input type="text" placeholder="Course name" name="assignment_name" ><br><br>

			        <label><b>Assignment Name</b></label>

			        <?php 

						$stmt=$pdo->prepare("SELECT * FROM modules");  // <!-- dsipaly rewview table -->

								$stmt->execute(); 
					foreach ($stmt as $key) { ?><!-- dsipaly rewview table -->

					?>

			        <select><?php echo $key["module_id"]; ?></select>

			        <?php 
							

						}


						 ?>

			        <label><b >Details</b></label>
			        <input  type="text" placeholder="Details " name="details" ><br><br>

			        <label><b>Issue date</b></label>
			        <input type="date" placeholder="Enter the birth date" name="issue_date"><br><br>

			        <label><b>due date</b></label>
			        <input type="date" placeholder="Enter the birth date" name="due_date"><br><br>

			        

			         

			        <button type="submit" name="submit">Asssignment list</button>
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

						$stmt=$pdo->prepare("SELECT * FROM assignments");  // <!-- dsipaly rewview table -->

								$stmt->execute(); 

						foreach ($stmt as $key) { ?><!-- dsipaly rewview table -->
							
							

						<a href="#"><li> <?php echo $key["assignment_name"]; ?></li> </a>
							

							
						
						

						
							<?php 
							

						}


						 ?>
						 	</ul>
					</div>
					
				</div>
				
			</div>



</div>



