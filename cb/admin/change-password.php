<?php
session_start();
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['agmsaid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
{
$adminid=$_SESSION['agmsaid'];
$cpassword=md5($_POST['currentpassword']);
$newpassword=md5($_POST['newpassword']);
$query=mysqli_query($con,"select ID from tbladmin where ID='$adminid' and   Password='$cpassword'");
$row=mysqli_fetch_array($query);
if($row>0){
$ret=mysqli_query($con,"update tbladmin set Password='$newpassword' where ID='$adminid'");
echo '<script>alert("Senha mudada com sucesso.")</script>';
} else {

echo '<script>alert("A senha está errada.")</script>';
}



}

  
  ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  
  

  <title>Mudar senha | Cronobus</title>

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
<script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
} 

</script>
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
            <h3 class="page-header"><i class="fa fa-files-o"></i> Mudar senha</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="dashboard.php">inicio</a></li>
              <li><i class="icon_document_alt"></i>Mudar senha</li>
              <li><i class="fa fa-files-o"></i>Mudar senha</li>
            </ol>
          </div>
        </div>
        <!-- Form validations -->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Mudar senha
              </header>
              
            </section>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
             
              <div class="panel-body">
                <div class="form">
                  
                  <form class="form-validate form-horizontal" method="post" action="" name="changepassword" onsubmit="return checkpass();">
                    <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2">Senha atual <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input type="password" name="currentpassword" class=" form-control" required= "true" value="">
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="address" class="control-label col-lg-2">Nova senha <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input type="password" name="newpassword" class="form-control" value="">
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="username" class="control-label col-lg-2">Confirmar senha <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input type="password" name="confirmpassword" class="form-control" value="">
                      </div>
                    </div>
                  
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit" name="submit">Mudar</button>
                       
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