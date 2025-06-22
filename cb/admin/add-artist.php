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
   $img=$_FILES["images"]["name"];
     $extension = substr($img,strlen($img)-4,strlen($img));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Formato inválido, apenas formato jpg / jpeg/ png /gif permitidos');</script>";
}
else
{

$proimg=md5($img).$extension;
     move_uploaded_file($_FILES["images"]["tmp_name"],"images/".$proimg);
    $query=mysqli_query($con, "insert into tblartist(Name,MobileNumber,Email,Education,Award,Profilepic) value('$name','$mobnum','$email','$edudetails','$awarddetails','$proimg')");
    if ($query) {
echo "<script>alert('Dados do motorista adicionados.');</script>";
echo "<script>window.location.href ='manage-artist.php'</script>";
  }
  else
    {      
      echo "<script>alert('Algo deu errado. Tente de novo mais tarde.');</script>";
    }

  }

}
  ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Adicionar Motorista| Cronobus</title>

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
            <h3 class="page-header"><i class="fa fa-file-text-o"></i>Adicionar dados do Motorista</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="dashboard.php">Inicio</a></li>
              <li><i class="icon_document_alt"></i>Motorista</li>
              <li><i class="fa fa-file-text-o"></i>Adicionar dados do Motorista</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
             Adicionar dados do Motorista
              </header>
              <div class="panel-body">
                <form class="form-horizontal " method="post" action="" enctype="multipart/form-data">
                  
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-10">
                      <input class="form-control" id="name" name="name"  type="text" required="true">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Numero de celular</label>
                    <div class="col-sm-10">
                      <input class="form-control" id="mobnum" maxlength="10" name="mobnum"  type="text" required="true" pattern="[0-9]+">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input class="form-control" id="email" name="email"  type="email" required="true">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nivel de instrução</label>
                    <div class="col-sm-10">
                     
                      <textarea class="form-control" name="edudetails" required="true"></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Detalhes de formação</label>
                    <div class="col-sm-10">
                    
                      <textarea class="form-control" name="awarddetails" required="true"></textarea>
                    </div>
                  </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Foto</label>
                    <div class="col-sm-10">
                       <input type="file" class="form-control" name="images" id="images" value="" required="true">
                    </div>
                  </div>
                 <p style="text-align: center;"> <button type="submit" name='submit' class="btn btn-primary">Enviar</button></p>
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