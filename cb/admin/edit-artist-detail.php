<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['agmsaid']==0)) {
  header('location:logout.php');
  }
  else{

if(isset($_POST['submit']))
  {
    
    $name=$_POST['name'];
    $mobnum=$_POST['mobnum'];
    $email=$_POST['email'];
    $edudetails=$_POST['edudetails'];
    $awarddetails=$_POST['awarddetails'];
  $eid=$_GET['editid'];
   
    $query=mysqli_query($con, "update tblartist set Name='$name',MobileNumber='$mobnum',Email='$email',Education='$edudetails',Award='$awarddetails' where ID='$eid'");
    if ($query) {
  
    echo "<script>alert('Artist details has been updated.');</script>";
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again.');</script>";
    }

  }

  ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  
  <title>Modificar Motorista| Cronobus</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link href="css/daterangepicker.css" rel="stylesheet" />
  <link href="css/bootstrap-datepicker.css" rel="stylesheet" />
  <link href="css/bootstrap-colorpicker.css" rel="stylesheet" />
  <!-- date picker -->

  <!-- color picker -->

  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

</head>

<body>

  <!-- container section start -->
  <section id="container" class="">
    <!--header start-->
    <?php include_once('includes/header.php');?>
    <!--header end-->

    <!--sidebar start-->
   <?php include_once('includes/sidebar.php');?>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-file-text-o"></i>Modificar Motorista</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="dashboard.php">inicio</a></li>
              <li><i class="icon_document_alt"></i>Motorista</li>
              <li><i class="fa fa-file-text-o"></i>Detalhes do motorista</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
               Atualizar dados do Empregado
              </header>
              <div class="panel-body">
                <form class="form-horizontal " method="post" action="">
                  <p style="font-size:16px; color:red" align="left"> <?php if($msg){
    echo $msg;
  }  ?> </p>

  <?php
 $cid=$_GET['editid'];
$ret=mysqli_query($con,"select * from tblartist where ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-10">
                      <input class="form-control" id="name" name="name"  type="text" required="true" value="<?php  echo $row['Name'];?>">
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-sm-2 control-label">Número de celular</label>
                    <div class="col-sm-10">
                      <input class="form-control" id="mobnum" maxlength="10" name="mobnum"  type="text" required="true" pattern="[0-9]+" value="<?php  echo $row['MobileNumber'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input class="form-control" id="email" name="email"  type="email" required="true" value="<?php  echo $row['Email'];?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nivel de instrução</label>
                    <div class="col-sm-10">
                     
                      <textarea class="form-control" name="edudetails" required="true"><?php  echo $row['Education'];?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Detalhes de formação</label>
                    <div class="col-sm-10">
                    
                      <textarea class="form-control" name="awarddetails" required="true"><?php  echo $row['Award'];?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Foto de perfil</label>
                    <div class="col-sm-10">
                      <img src="images/<?php echo $row['Profilepic'];?>" width="200" height="150" value="<?php  echo $row['Profilepic'];?>"><a href="changepropic.php?imageid=<?php echo $row['ID'];?>" class="btn btn-success">  Editar imagem</a>
                    </div>
                   
                  </div>
                <?php } ?>
                 <p style="text-align: center;"> <button type="submit" name='submit' class="btn btn-primary">Atualizar</button></p>
                </form>
              </div>
            </section>
            
          </div>
        </div>
        <!-- Basic Forms & Horizontal Forms-->

        
         
      
        <!-- page end-->
      </section>
    
  <!-- container section end -->
  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>

  <!-- jquery ui -->
  <script src="js/jquery-ui-1.9.2.custom.min.js"></script>

  <!--custom checkbox & radio-->
  <script type="text/javascript" src="js/ga.js"></script>
  <!--custom switch-->
  <script src="js/bootstrap-switch.js"></script>
  <!--custom tagsinput-->
  <script src="js/jquery.tagsinput.js"></script>

  <!-- colorpicker -->

  <!-- bootstrap-wysiwyg -->
  <script src="js/jquery.hotkeys.js"></script>
  <script src="js/bootstrap-wysiwyg.js"></script>
  <script src="js/bootstrap-wysiwyg-custom.js"></script>
  <script src="js/moment.js"></script>
  <script src="js/bootstrap-colorpicker.js"></script>
  <script src="js/daterangepicker.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <!-- ck editor -->
  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
  <!-- custom form component script for this page-->
  <script src="js/form-component.js"></script>
  <!-- custome script for all page -->
  <script src="js/scripts.js"></script>


</body>

</html>
<?php  } ?>