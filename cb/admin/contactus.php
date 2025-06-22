<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['agmsaid']==0)) {
 header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$agmsaid=$_SESSION['agmsaid'];
 $pagetitle=$_POST['pagetitle'];
$pagedes=$_POST['pagedes'];

$email=$_POST['email'];
$phonenum=$_POST['phonenum'];
$timing=$_POST['timing'];
  $query=mysqli_query($con,"update tblpage set PageTitle='$pagetitle', PageDescription='$pagedes',Email='$email',MobileNumber='$phonenum', Timing='$timing' where  PageType='contactus'");

    if ($query) {
  
    echo "<script>alert('Entre em contato foi atualizado.');</script>";
  }
  else
    {
      echo "<script>alert('Algo deu errado.');</script>";
    }

  
}
  ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Contate nos | Cronobus</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
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
            <h3 class="page-header"><i class="fa fa-files-o"></i> Entre em contato</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="dashboard.php">inicio</a></li>
              <li><i class="icon_document_alt"></i>Entre em contato</li>
              <li><i class="fa fa-files-o"></i>Entre em contato</li>
            </ol>
          </div>
        </div>
        <!-- Form validations -->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Entre em contato
              </header>
              
            </section>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
             
              <div class="panel-body">
                <div class="form">
                  
  <?php
 
$ret=mysqli_query($con,"select * from  tblpage where PageType='contactus'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                  <form class="form-validate form-horizontal" method="post" action="">
                    <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2">Título da página <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input type="text" name="pagetitle" class=" form-control" required= "true" value="<?php  echo $row['PageTitle'];?>">
                      </div>
                    </div>
                  
                    
                    <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2">Email <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input type="text" name="email" class=" form-control" required= "true" value="<?php  echo $row['Email'];?>">
                      </div>
                    </div>
                      <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2">Número de celular <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input type="text" name="phonenum" class=" form-control" required= "true" value="<?php  echo $row['MobileNumber'];?>">
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2">Horário de atividade <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input type="text" name="timing" class=" form-control" required= "true" value="<?php  echo $row['Timing'];?>">
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="address" class="control-label col-lg-2">Descrição da página <span class="required">*</span></label>
                      <div class="col-lg-10">
                         <textarea class=" form-control" id="pagedes" name="pagedes" type="text" required="true" value=""><?php  echo $row['PageDescription'];?></textarea>
                      </div>
                    </div>
                   
                   <?php } ?>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit" name="submit">Atualizar</button>
                       
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </section>
          </div>
        </div>
        <!-- page end-->
      </section>
    
  <!-- container section end -->

  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- jquery validate js -->
  <script type="text/javascript" src="js/jquery.validate.min.js"></script>

  <!-- custom form validation script for this page-->
  <script src="js/form-validation-script.js"></script>
  <!--custome script for all page-->
  <script src="js/scripts.js"></script>


</body>

</html>
<?php }  ?>