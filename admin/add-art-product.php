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
    $aid=$_SESSION['agmsaid'];
    $title=$_POST['title'];
    $dimension=$_POST['dimension'];
    $orientation=$_POST['orientation'];
    $size=$_POST['size'];
    $artist=$_POST['artist'];
    $arttype=$_POST['arttype'];
    $artmed=$_POST['artmed'];
    $sprice=$_POST['sprice'];
    $description=$_POST['description'];
    $refno=mt_rand(100000000, 999999999);

//featured Image
$pic=$_FILES["images"]["name"];
$extension = substr($pic,strlen($pic)-4,strlen($pic));
//Image 1
$pic1=$_FILES["image1"]["name"];
$extension1 = substr($pic1,strlen($pic1)-4,strlen($pic1));
//Image 2
$pic2=$_FILES["image2"]["name"];
$extension2 = substr($pic2,strlen($pic2)-4,strlen($pic2));
//Image 3
$pic3=$_FILES["image3"]["name"];
$extension3 = substr($pic3,strlen($pic3)-4,strlen($pic3));
//Image 4
$pic4=$_FILES["image4"]["name"];
$extension4 = substr($pic4,strlen($pic4)-4,strlen($pic4));

// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Formato inválido, apenas jpg / jpeg/ png /gif são permitidos');</script>";
}
//if(!in_array($extension1,$allowed_extensions))
//{
//echo "<script>alert('Image 1 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
//}
//if(!in_array($extension2,$allowed_extensions))
//{
//echo "<script>alert('Image 2 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
//}
//if(!in_array($extension3,$allowed_extensions))
//{
//echo "<script>alert('Image 3 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
//}
//if(!in_array($extension4,$allowed_extensions))
//{
//echo "<script>alert('Image 4 has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
//}
else
{
//rename art images
$pic=md5($pic).time().$extension;
//$pic1=md5($pic1).time().$extension1;
//$pic2=md5($pic2).time().$extension2;
//$pic3=md5($pic3).time().$extension3;
//$pic4=md5($pic4).time().$extension4;
     move_uploaded_file($_FILES["images"]["tmp_name"],"images/".$pic);
     //move_uploaded_file($_FILES["image1"]["tmp_name"],"images/".$pic1);
     //move_uploaded_file($_FILES["image2"]["tmp_name"],"images/".$pic2);
     //move_uploaded_file($_FILES["image3"]["tmp_name"],"images/".$pic3);
     //move_uploaded_file($_FILES["image4"]["tmp_name"],"images/".$pic4);
    $query=mysqli_query($con, "insert into tblartproduct(Title,Dimension,Orientation,Size,Artist, ArtType,ArtMedium,SellingPricing,Description,Image,Image1,Image2,Image3,Image4,RefNum) value('$title','$dimension','$orientation','$size','$artist','$arttype','$artmed','$sprice','$description','$pic','$pic1','$pic2','$pic3','$pic4','$refno')");
    if ($query) {
echo "<script>alert('Dados de linha foram adicionados.');</script>";
echo "<script>window.location.href ='add-art-line.php'</script>";
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
  
  <title>Adicionar linha | Cronobus</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link href="css/daterangepicker.css" rel="stylesheet" />
  <link href="css/bootstrap-datepicker.css" rel="stylesheet" />
  <link href="css/bootstrap-colorpicker.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
</head>
<body>
  <section id="container" class="">
    <!--header start-->
    <?php include_once('includes/header.php');?>
    <!--header end-->

    <!--sidebar start-->
   <?php include_once('includes/sidebar.php');?>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content" style="color:#000">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-file-text-o"></i>Adicionar detalhes de linha</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="dashboard.php">Inicio</a></li>
              <li><i class="icon_document_alt"></i>Linha</li>
              <li><i class="fa fa-file-text-o"></i>Detalhes de linha</li>
            </ol>
          </div>
        </div>
        <div class="row">      
          <form class="form-horizontal " method="post" action="" enctype="multipart/form-data">
          <div class="col-lg-6">
            <section class="panel">
              <header class="panel-heading">
                Adicionar detalhes de linha
              </header>
              <div class="panel-body">
                  
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-10">
                      <input class="form-control" id="title" name="title"  type="text" required="true" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Tabela de horários</label>
                    <div class="col-sm-10">
                       <input type="file" class="form-control" name="images" id="images" value="" required="true">
                    </div>
                  </div>

    <div class="form-group">
                    <label class="col-sm-2 control-label">Linha Imagem 1</label>
                    <div class="col-sm-10">
                       <input type="file" class="form-control" name="image1" id="image1" value="">
                    </div>
                  </div>

  <div class="form-group">
                    <label class="col-sm-2 control-label">Linha Imagem 2</label>
                    <div class="col-sm-10">
                       <input type="file" class="form-control" name="image2" id="image2" value="">
                    </div>
                  </div>

                    <div class="form-group">
                    <label class="col-sm-2 control-label">Linha Imagem 3</label>
                    <div class="col-sm-10">
                       <input type="file" class="form-control" name="image3" id="image3" value="">
                    </div>
                  </div>

                    <div class="form-group">
                    <label class="col-sm-2 control-label">Linha Imagem 4</label>
                    <div class="col-sm-10">
                       <input type="file" class="form-control" name="image4" id="image4" value="">
                    </div>
                  </div>

<div class="form-group">
                    <label class="col-sm-2 control-label">Distância de percurso</label>
                    <div class="col-sm-10">
                      <input class="form-control" id="dimension" name="dimension"  type="text" required="true">
                    </div>
                  </div>
 </div>
</section>
</div>
                  <div class="col-lg-6">
                        <section class="panel">
                     <div class="panel-body">

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Acesso</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="orientation" name="orientation"  required="true">
                        <option value="acessível a cadeirantes">Acessivel a cadeirantes</option>
                        <option value="NÃO acessivel">Não acessivel a cadeirantes</option>
                        
                      </select>
                    </div>
                  </div>
                   
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Tamanho</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="size" name="size"  required="true">
                        <option value="">Defina tamanho do veículo</option>
                        <option value="Pequeno-10 passageiros">Pequeno-10 passageiros</option>
                        <option value="Médio-25 passageiros">Médio-25 passageiros</option>
                        <option value="Grande-50 passageiros">Grande-50 passageiros</option>
                      </select>
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-sm-2 control-label">Motorista</label>
                    <div class="col-sm-10">
                      <select class="form-control m-bot15" name="artist" id="artist">
                                <option value="">Defina o motorista</option>
                                <?php $query=mysqli_query($con,"select * from tblartist");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $row['ID'];?>"><?php echo $row['Name'];?></option>
                  <?php } ?> 
                            </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Empresa</label>
                    <div class="col-sm-10">
                      <select class="form-control m-bot15" name="arttype" id="arttype">
                                <option value="">Defina Empresa</option>
                                <?php $query=mysqli_query($con,"select * from tblarttype");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $row['ID'];?>"><?php echo $row['ArtType'];?></option>
                  <?php } ?> 
                            </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Marca do veículo</label>
                    <div class="col-sm-10">
                      <select class="form-control m-bot15" name="artmed" id="artmed">
                                <option value="">Defina a marca do veículo</option>
                                <?php $query=mysqli_query($con,"select * from tblartmedium");
              while($row=mysqli_fetch_array($query))
              {
              ?>    
              <option value="<?php echo $row['ID'];?>"><?php echo $row['ArtMedium'];?></option>
                  <?php } ?> 
                            </select>
                    </div>
                  </div>
                  
                  
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Tarifa</label>
                    <div class="col-sm-10">
                      <input class="form-control " id="sprice" type="text" name="sprice" required="true">
                    </div>
                  </div>
                
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Paradas e cronograma</label>
                    <div class="col-sm-10">
                      <textarea class="form-control " id="description" type="text" name="description" rows="12" cols="4" required="true"></textarea>
                    </div>
                  </div>
              </div>
            </section>
            
          </div>
               <p style="text-align: center;"> <button type="submit" name='submit' class="btn btn-primary">Enviar</button></p>
              </form>
        </div>
      
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