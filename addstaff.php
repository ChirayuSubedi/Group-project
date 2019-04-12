 <?php include 'header.php'?>
<?php include 'sidebar.php'; ?>



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
        <h2 class="page-header">Add Staff</h2>
      </div>
    </div><!--/.row-->

  </div>
<?php





ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$pdo = new PDO('mysql:dbname=group;host=localhost','root','root');

if(isset($_POST['submit'])) {
  $insert_query = 'INSERT INTO module_leaders(staff_firstname, staff_surname)VALUES(:staff_firstname, :staff_surname)';


  
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
      <form action="addstaff.php" method="POST" enctype="multipart/form-data">
        <div class="container">

        <label><b>Firstname</b></label>
        <input type="text" placeholder="enter firstname" name="staff_firstname" ><br><br>

        <label><b>Lastname</b></label>
        <input type="text" placeholder="enter lastname" name="staff_surname" ><br><br>

        

        

      

               

              <button type="submit" name="submit">Add Course</button>
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

            $stmt=$pdo->prepare("SELECT * FROM module_leaders");  // <!-- dsipaly rewview table -->

                $stmt->execute(); 

            foreach ($stmt as $key) { ?><!-- dsipaly rewview table -->
              
              

            <a href="#"><li> <?php echo $key["staff_id"]; ?></li> </a>
              

              
            
            

            
              <?php 
              

            }


             ?>
              </ul>
          </div>
          
        </div>
        
      </div>



</div>


   


     

       


<?php include 'footer.php' ?>
