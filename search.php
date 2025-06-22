<?php
session_start();
error_reporting(0);

include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="zxx">
   <head>
      <title>Cronobus | busca</title>
      
      <script>
         addEventListener("load", function () {
         	setTimeout(hideURLbar, 0);
         }, false);
         
         function hideURLbar() {
         	window.scrollTo(0, 1);
         }
      </script>
      <!--//meta tags ends here-->
      <!--booststrap-->
      <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
      <!--//booststrap end-->
      <!-- font-awesome icons -->
      <link href="css/fontawesome-all.min.css" rel="stylesheet" type="text/css" media="all">
      <!-- //font-awesome icons -->
      <!--Shoping cart-->
      <link rel="stylesheet" href="css/shop.css" type="text/css" />
      <!--//Shoping cart-->
      <!--price range-->
      <link rel="stylesheet" type="text/css" href="css/jquery-ui1.css">
      <!--//price range-->
      <!--stylesheets-->
      <link href="css/style.css" rel='stylesheet' type='text/css' media="all">
      <!--//stylesheets-->
      <link href="//fonts.googleapis.com/css?family=Sunflower:500,700" rel="stylesheet">
      <link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   </head>

   <body>
      <!--headder-->
      <?php include_once('includes/header.php');?>
      <!-- banner -->
      <div class="inner_page-banner one-img">
      </div>
      <!--//banner -->
      <!-- short -->
      <div class="using-border py-3">
         <div class="inner_breadcrumb  ml-4">
            <ul class="short_ls">
               <li>
                  <a href="index.php">inicio</a>
                  <span>/ </span>
               </li>
               <li>Linhas</li>
            </ul>
         </div>
      </div>
      <!-- //short-->
      <!--barra de busca-->  
      
      <section class="contact py-lg-4">
         <div class="container-fluid py-lg-5">
            <h3 class="title text-center mb-lg-5">
               <h2 class="head" align="center">
                  Resultados contendo <span style="color:red">"<?php echo $_POST['search'];?>"</span>
               </h2>
               <hr/>
            <div class="row">
               <div class="side-bar col-lg-3">
                  <div class="search-hotel">
                     <h3 class="agileits-sear-head">Busque aqui...</h3>
                     <form action="#" method="post">
                        <input type="search" placeholder="Nome da linha..." name="search" required="">
                        <input type="submit" value=" ">
                     </form>
                  </div>
							
                  <!--preference -->
                  <div class="left-side">
                     <h3 class="agileits-sear-head">Empresa</h3>
                     <ul>
                        <li>
                           <?php
                                    $ret=mysqli_query($con,"select * from tblarttype");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                           <a class="nav-link" href="line.php?cid=<?php  echo $row['ID'];?>&&artname=<?php  echo $row['ArtType'];?>"><span class="span"><?php  echo $row['ArtType'];?></span></a> <?php } ?>
                        </li>
                       
                     </ul>
                  </div>
                  <!-- // preference -->
            
               
               </div>
               <div class="left-ads-display col-lg-9">
                  <div class="row">
                  <?php
                  $searchinput=$_POST['search'];
$ret=mysqli_query($con,"select tblarttype.ID as atid,tblarttype.ArtType as typename,tblartproduct.ID as apid,tblartproduct.Size, tblartproduct.Dimension,tblartproduct.Orientation,tblartproduct.Description, tblartproduct.Title,tblartproduct.Image,tblartproduct.ArtType from tblartproduct join tblarttype on tblarttype.ID=tblartproduct.ArtType where tblartproduct.Title like '%$searchinput%'");
$cnt=1;
$count=mysqli_num_rows($ret);
if($count>0){ 
while ($row=mysqli_fetch_array($ret)) {

?>
                     <div class="col-lg-4 col-md-6 col-sm-6 product-men women_two">
                        <div class="product-toys-info">
                           <div class="men-pro-item">
                              <div class="men-thumb-item">
                                 <img src="admin/images/<?php echo $row['Image'];?>" class="img-thumbnail" alt="">
                                 <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                       <a href="single-line.php?pid=<?php  echo $row['apid'];?>" class="link-product-add-cart"> Ver detalhes</a>
                                    </div>
                                 </div>
                                 <!-- <span class="product-new-top">New</span> -->
                              </div>
                              <div class="item-info-product">
                                 <div class="info-product-price">
                                    <div class="grid_meta">
                                       <div class="product_price">
                                          <h4 >
                                             <a href="single-line.php?pid=<?php  echo $row['apid'];?>" style="color:#000"><?php  echo $row['Title'] ;?></a>
                                          </h4>
                                       </div>

                              <div class="color-quality-right">
                           
                           <h5>Tamanho : <?php echo $row['Size'];?></h5>                           
                           <h5>Acessibilidade : <?php echo $row['Orientation'];?></h5>
                           <h5><i class="fa-solid fa-shop"></i><?php echo $row['Description'];?></h5>
                          
                              </div>
                                     
                                    </div>                       
                                 </div>
                                 <div class="clearfix"></div>
                              </div>
                           </div>
                        </div>
                     </div><?php } } else { ?>
<h3 align="center" style="color:red;">Nenhum resultado encontrado</h3>
                     <?php } ?>
                
               
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- //show Now-->
     <?php include_once('includes/footer.php');?>
    
    
      <!--js working-->
      <script src='js/jquery-2.2.3.min.js'></script>
      <!--//js working-->
      <!-- cart-js -->
      <script src="js/minicart.js"></script>
      
      <!-- //cart-js -->
     
      <!-- //here ends scrolling icon -->
      <!--bootstrap working-->
      <script src="js/bootstrap.min.js"></script>
      <!-- //bootstrap working-->      <!-- //OnScroll-Number-Increase-JavaScript -->
   </body>
</html>
