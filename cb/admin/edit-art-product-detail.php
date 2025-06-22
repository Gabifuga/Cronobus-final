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
   
    $title=$_POST['title'];
    $dimension=$_POST['dimension'];
    $orientation=$_POST['orientation'];
    $size=$_POST['size'];
    $artist=$_POST['artist'];
    $arttype=$_POST['arttype'];
    $artmed=$_POST['artmed'];
    $sprice=$_POST['sprice'];
    $description=$_POST['description'];
    $eid=$_GET['editid'];
    $query=mysqli_query($con, "update tblartproduct set Title='$title',Dimension='$dimension',Orientation='$orientation',Size='$size',Artist='$artist',ArtType='$arttype',ArtMedium='$artmed',SellingPricing='$sprice',Description='$description' where ID='$eid'");
    if ($query) {
  
    echo "<script>alert('Linha atualizada.');</script>";
  }
  else
    {
      echo "<script>alert('Algo deu errado');</script>";
    }
  }

    ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  
  <title>Editar linha | Linha</title>
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
            <h3 class="page-header"><i class="fa fa-file-text-o"></i>Editar linha</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="dashboard.php">inicio</a></li>
              <li><i class="icon_document_alt"></i>Editar linha</li>
              <li><i class="fa fa-file-text-o"></i>Detalhes da linha</li>
            </ol>
          </div>
        </div>
        <div class="row">      
          <form class="form-horizontal " method="post" action="" enctype="multipart/form-data">
            <?php
 $cid=$_GET['editid'];
$ret=mysqli_query($con,"select tblarttype.ID as atid,tblarttype.ArtType as typename,tblartmedium.ID as amid,tblartmedium.ArtMedium as amname,tblartproduct.ID as apid,tblartist.ID as arid,tblartist.Name,tblartproduct.Title,tblartproduct.Dimension,tblartproduct.Orientation,tblartproduct.Size,tblartproduct.Artist,tblartproduct.ArtType,tblartproduct.ArtMedium,tblartproduct.SellingPricing,tblartproduct.Description,tblartproduct.Image,tblartproduct.Image1,tblartproduct.Image2,tblartproduct.Image3,tblartproduct.Image4,tblartproduct.RefNum,tblartproduct.ArtType from tblartproduct join tblarttype on tblarttype.ID=tblartproduct.ArtType join tblartmedium on tblartmedium.ID=tblartproduct.ArtMedium join tblartist on tblartist.ID=tblartproduct.Artist where tblartproduct.ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
          <div class="col-lg-6">
            <section class="panel">
              <header class="panel-heading">
                Atualizar detalhes da linha
              </header>
              <div class="panel-body">
                  
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                      <input class="form-control" id="title" name="title"  type="text" required="true" value="<?php  echo $row['Title'];?>" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Imagem do cronograma</label>
                    <div class="col-sm-10">
                     <img src="images/<?php echo $row['Image'];?>" width="200" height="150" value="<?php  echo $row['Image'];?>"><a href="changeimage.php?editid=<?php echo $row['apid'];?>"> &nbsp; Editar Imagem</a>
                    </div>
                  </div>

    <div class="form-group">
                    <label class="col-sm-2 control-label">Imagem da linha1</label>
                    <div class="col-sm-10">
                      <img src="images/<?php echo $row['Image1'];?>" width="200" height="150" value="<?php  echo $row['Image1'];?>"><a href="changeimage1.php?editid=<?php echo $row['apid'];?>"> &nbsp; Editar Imagem</a>
                    </div>
                  </div>

  <div class="form-group">
                    <label class="col-sm-2 control-label">Imagem da linha2</label>
                    <div class="col-sm-10">
                       <img src="images/<?php echo $row['Image2'];?>" width="200" height="150" value="<?php  echo $row['Image2'];?>"><a href="changeimage2.php?editid=<?php echo $row['apid'];?>"> &nbsp; Editar Imagem</a>
                    </div>
                  </div>

                    <div class="form-group">
                    <label class="col-sm-2 control-label">Imagem da linha3</label>
                    <div class="col-sm-10">
                       <img src="images/<?php echo $row['Image3'];?>" width="200" height="150" value="<?php  echo $row['Image3'];?>"><a href="changeimage3.php?editid=<?php echo $row['apid'];?>"> &nbsp; Editar Imagem</a>
                    </div>
                  </div>

                    <div class="form-group">
                    <label class="col-sm-2 control-label">Imagem da linha4</label>
                    <div class="col-sm-10">
                      <img src="images/<?php echo $row['Image4'];?>" width="200" height="150" value="<?php  echo $row['Image4'];?>"><a href="changeimage4.php?editid=<?php echo $row['apid'];?>"> &nbsp; Edit Image</a>
                    </div>
                  </div>

<div class="form-group">
                    <label class="col-sm-2 control-label">Link do mapa google</label>
                    <div class="col-sm-10">
                      <input class="form-control" id="dimension" name="dimension"  type="text" required="true" value="<?php  echo $row['Dimension'];?>">
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
                    <label class="col-sm-2 control-label">Tamanho do veículo</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="size" name="size"  required="true">
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
                                <option value="<?php  echo $row['arid'];?>"><?php  echo $row['Name'];?></option>
                                <?php $query1=mysqli_query($con,"select * from tblartist");
              while($row1=mysqli_fetch_array($query1))
              {
              ?>    
              <option value="<?php echo $row1['ID'];?>"><?php echo $row1['Name'];?></option>
                  <?php } ?> 
                            </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Empresa</label>
                    <div class="col-sm-10">
                      <select class="form-control m-bot15" name="arttype" id="arttype">
                                <option value="<?php  echo $row['atid'];?>"><?php  echo $row['typename'];?></option>
                                <?php $query2=mysqli_query($con,"select * from tblarttype");
              while($row2=mysqli_fetch_array($query2))
              {
              ?>    
              <option value="<?php echo $row2['ID'];?>"><?php echo $row2['ArtType'];?></option>
                  <?php } ?> 
                            </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Marca do veículo</label>
                    <div class="col-sm-10">
                      <select class="form-control m-bot15" name="artmed" id="artmed">
                                <option value="<?php  echo $row['amid'];?>"><?php  echo $row['amname'];?></option>
                                <?php $query3=mysqli_query($con,"select * from tblartmedium");
              while($row3=mysqli_fetch_array($query3))
              {
              ?>    
              <option value="<?php echo $row3['ID'];?>"><?php echo $row3['ArtMedium'];?></option>
                  <?php } ?> 
                            </select>
                    </div>
                  </div>
                  
                  
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Tarifa</label>
                    <div class="col-sm-10">
                      <input class="form-control " id="sprice" type="text" name="sprice" required="true" value="<?php  echo $row['SellingPricing'];?>">
                    </div>
                  </div>
                
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Descrição</label>
                    <div class="col-sm-10">
                      <textarea class="form-control " id="description" type="text" name="description" rows="12" cols="4" required="true"><?php  echo $row['Description'];?></textarea>
                    </div>
                  </div>
              </div>
            </section>
            
          </div>
          <?php } ?>
               <p style="text-align: center;"> <button type="submit" name='submit' class="btn btn-primary">Submit</button></p>
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