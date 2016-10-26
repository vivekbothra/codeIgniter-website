<div id="maincontainer">
  <!-- Slider Start-->
  <section class="slider">
    <div class="container">
      <div class="flexslider" id="mainslider">
        <ul class="slides">
          <li>
            <img src="<?php echo base_url('img/3.jpg')?>" alt="" />
          </li>
          <li>
            <img  src="<?php echo base_url('img/Vegetables.jpg')?>" alt="" />
          </li>
          <li>
            <img  src="<?php echo base_url('img/electronics.jpg')?>" alt="" />
          </li>
          <li>
            <img  src="<?php echo base_url('img/cricket.jpg')?>" alt="" />
          </li>
           <li>
            <img  src="<?php echo base_url('img/purse.jpg')?>" alt="" />
          </li>
        </ul>
      </div>
    </div>
  </section>
 
  
  <!-- Latest Product-->
  <section id="latest" class="row" style="margin-top:70px;">
  <div class="container">
  <h1 class="heading1"><span class="maintext">Latest Products</span><span class="subtext"> See Our  Latest Products</span></h1>
  <ul class="thumbnails" style=" margin-left:-3%; margin-right:-4%;">
  <?php foreach($landingdetails as $row)
  {	
  	$pid=$row->product_id;
  	$productname=$row->product_name;
  	$productimage=$row->product_image;
  	$productprice=$row->price;
  	?>
    
      
      
        <li class="span3">
       <div> <a class="prdocutname" href="<?php echo site_url('tv/product/'.$pid)?>"><?php echo $productname ?></a></div>  
          <div class="thumbnail" >
            <a href="<?php echo site_url('tv/product/'.$pid)?>">
            <img style="height:250px; width:300px" src="<?php echo $productimage ?>"></a>
           
            <div class="price" style="margin-top:27px;">
            <div class="pricenew" style="margin-right:90px;"><?php echo "Rs " ;?><?php echo $productprice?></div>
             <a href="<?php echo site_url('tv/product/'.$pid)?>" class="" style="margin-right:63px;">ADD TO CART</a>
                
                

            </div>
          </div>
        </li>
        <?php }?>
        
      </ul>
    </div>
   
  </section>
  
  
  <!-- Popular Brands-->
  <section id="popularbrands" class="container mt40">
    <h1 class="heading1"><span class="maintext">Popular Brands</span><span class="subtext"> See Our  Popular Brands</span></h1>
    <div class="brandcarousalrelative">
      <ul id="brandcarousal">
        <li><img src="<?php echo base_url('img/lg.jpg')?>" alt="" title=""/></li>
        <li><img src="<?php echo base_url('img/videocon.png')?>" alt="" title=""/></li>
        <li><img src="<?php echo base_url('img/rice.jpg')?>" alt="" title=""/></li>
        <li><img src="<?php echo base_url('img/furniture.jpg')?>" alt="" title=""/></li>
        <li><img src="<?php echo base_url('img/juice.jpg')?>" alt="" title=""/></li>
        <li><img src="<?php echo base_url('img/bag.jpg')?>" alt="" title=""/></li>
        <li><img src="<?php echo base_url('img/adidas.png')?>" alt="" title=""/></li>
       
      </ul>
      <div class="clearfix"></div>
      <a id="prev" class="prev" href="#"></a>
      <a id="next" class="next" href="#"></a>
    </div>
  </section>
  
  <!-- Newsletter Signup-->
  <section id="newslettersignup" class="mt40">
    <div class="container">
      <div class="pull-left newsletter">
        <h2> Newsletters Signup</h2>
        Sign up to Our Newsletter & get attractive Offers by subscribing to our newsletters. </div>
      <div class="pull-right">
        <form class="form-horizontal">
          <div class="input-prepend controls">
            <input type="text" placeholder="Subscribe to Newsletter" id="inputIcon" class="input-xlarge">
            <input value="Subscribe" class="btn btn-orange" type="submit" style="height:33px;">
             </div>
        </form>
      </div>
    </div>
  </section>
</div>