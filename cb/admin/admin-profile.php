<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['agmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $adminid=$_SESSION['agmsaid'];
    $aname=$_POST['adminname'];
  $mobno=$_POST['contactnumber'];
  
     $query=mysqli_query($con, "update tbladmin set AdminName ='$aname', MobileNumber='$mobno' where ID='$adminid'");
    if ($query) {
    echo "<script>alert('Perfil do administrador atualizado.');</script>";
    echo "<script>window.location.href='admin-profile.php'</script>";
  }
  else
    {
      echo "<script>alert('Algo deu errado, tente de novo mais tarde.');</script>";
    }
  }
  ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Perfil de Administrador | Cronobus</title>

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
            <h3 class="page-header"><i class="fa fa-user-md"></i> Perfil</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="dashboard.php">Inicio</a></li>
              <li><i class="icon_documents_alt"></i>Paginas</li>
              <li><i class="fa fa-user-md"></i>Perfil</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <!-- profile-widget -->
       
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading tab-bg-info">
                <ul class="nav nav-tabs">
                 
                 
                  <li class="">
                    <a data-toggle="tab" href="#edit-profile">
                                          <i class="icon-envelope"></i>
                                          Editar Perfil
                                      </a>
                  </li>
                </ul>
              </header>
              <div class="panel-body">
                <div >
                 
                  
                  <div id="edit-profile" class="tab-pane">
                    <section class="panel">
                      <div class="panel-body bio-graph-info">
                        <h1> Informações de perfil</h1>
                        <form class="form-horizontal" role="form" method="post" action="">
                          

   <?php
$adminid=$_SESSION['agmsaid'];
$ret=mysqli_query($con,"select * from tbladmin where ID='$adminid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Nome de admin</label>
                            <div class="col-lg-6">
                              <input class=" form-control" id="adminname" name="adminname" type="text" value="<?php  echo $row['AdminName'];?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Nome usuário</label>
                            <div class="col-lg-6">
                              <input class=" form-control" id="username" name="username" type="text" value="<?php  echo $row['UserName'];?>"  readonly='true'>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Número de contato</label>
                            <div class="col-lg-6">
                              <input class="form-control " id="contactnumber" name="contactnumber" type="text" value="<?php  echo $row['MobileNumber'];?>" required="true">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-6">
                              <input class="form-control " id="email" name="email" type="email" value="<?php  echo $row['Email'];?>" required="true" readonly='true'>
                            </div>
                          </div>
                         
                          <?php } ?>

                          <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                              <button type="submit" class="btn btn-primary" name="submit">Atualizar</button>
                              
                            </div>
                          </div>
                        </form>
                      </div>
                    </section>
                  </div>
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
  <!-- jquery knob -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <!--custome script for all page-->
  <script src="js/scripts.js"></script>

  <script>
    //knob
    $(".knob").knob();
  </script>


</body>

</html>
<?php }  ?>