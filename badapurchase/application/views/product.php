<?php foreach($productdetails as $row)
        {
        	$productid=$row->product_id;
        	$productname=$row->product_name;
        	$producttypeid=$row->producttype;
        	$productmodel=$row->modelno;
        	$productimage=$row->product_image;
        	$price=$row->price;
        	$sizeid=$row->size;
        	
        }
        
        foreach($sizedetails as $row)
        {
        	$size1=$row->size1;
        	$size2=$row->size2;
        	$size3=$row->size3;
        	$size4=$row->size4;
        	$minq=$row->maximumquantity1;
        	$minp=$row->minpurchase1;
        }
        
        foreach($suppliertails as $row)
        {
        	$sfirm=$row->firm_name;
        	$sname=$row->owner_name;
        	$scontact=$row->landline_no;
        	$saddress=$row->firm_address;
        }
        	?>
<div id="maincontainer">
  <section id="product">
    <div class="container">      
      <!-- Product Details-->
      <div class="row">
       <!-- Left Image-->
        <div class="span5">
          <ul class="thumbnails mainimage">
            <li class="span5">
              <a  rel="position: 'inside' , showTitle: false, adjustX:10, adjustY:5" class="thumbnail cloud-zoom" href="<?php echo $productimage ?>">
                <img  style="width:450px; height:550px;" src="<?php echo $productimage ?>" alt="" title="">
              </a>
            </li>
          </ul>
          
          <ul class="thumbnails mainimage">
            <li class="producthtumb">
              <a class="thumbnail" >
                <img style="width:110px; height:110px;" src="<?php echo $productimage?>" >
              </a>
            </li>
            </ul>
        </div>
        
        
         <!-- Right Details-->
        <div class="span6">
          <div class="row">
            <div class="span6">
              <h1 class="productname"><span class="bgnone"><?php echo $productname ?></span></h1>
              <div class="productprice">
                <div class="span6">
                 <h4 style="font-weight:bold; font-size:30px; margin-left:-30px;">Price <?php echo "Rs $price " ?></h4> </div>
               
                
              </div>
              <form action="<?php echo site_url('tv/sizequantity/'.$productid)?>" method="post">
              <div class="quantitybox">
                <select class="selectsize" name="selectsize" onchange="onstatechange()" id="selectsize" style="width:120px;">
                  <option disabled selected>Select Size</option>
                 <option value="<?php echo $size1?>" ><?php echo $size1 ?></option>
                 <?php if(!empty($size2)){?>
                 <option value="<?php echo $size2?>" ><?php echo $size2 ?></option><?php }?>
                 <?php if(!empty($size3)){?>
                 <option value="<?php echo $size3?>" ><?php echo $size3 ?></option><?php }?>
                 <?php if(!empty($size4)){?><option value="<?php echo $size4?>" ><?php echo $size4 ?></option><?php } ?>
                </select>
               <div  id="quantity" style="margin-left:135px; margin-top:-15px;" > 
              </div >
              <div class="controls" >
                <input name="quantityinput" type="text" style="width:120px;"placeholder="Select Quantity" id="quantityinput" Required>
                </div>
                </div>
                
                
                
              <ul class="productpagecart">
                <li><input type="submit" name="addtocart" onclick="this.value=true" class="btn btn-orange"  style="width:120px;" value="Add to Cart" >
                </li>
                <li><input type="submit"  name="addtowishlist" onclick="this.value=true" class="btn btn-orange"  style="width:120px;" value="Add to Wishlist">
                </li>
                
              </ul>
              </form>
         <!-- Product Description tab & comments-->
           <div class="productdesc">
                <ul class="nav nav-tabs" id="myTab">
                  <li class="active"><a href="#description">Supplier Description</a>
                  </li>
                  <li><a href="#specification">Product Specification</a>
                  </li>
                  <li><a href="#review">Reviews</a>
                  </li>
                  <li><a href="#producttag">Feedback</a>
                  </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="description">
                     <table class="productinfo">
                      <tr>
                        <td class="supplierinfo"> Firm Name:</td><td> <?php echo $sfirm ?> </td></tr>
                      <tr>
                        <td class="supplierinfo"> Supplier Name:</td><td> <?php echo $sname ?> </td></tr>
                      <tr>
                        <td class="supplierinfo"> Contact No.: </td><td><?php echo $scontact ?> </td></tr>
                      <tr>
                        <td class="supplierinfo" valign="top"> Address: </td><td><?php echo $saddress ?></td> </tr>
                      
                    </table>
                  </div>
                  <div class="tab-pane " id="specification">
                   <ul class="productinfo">
                      <li>
                        <span class="productinfoleft"> Product Name:</span> <?php echo $productname ?> </li>
                      <li>
                        <span class="productinfoleft"> Model No.:</span><?php echo $productmodel ?> </li>
                        <?php if($minq > $minp){?>
                      <li>
                        <span class="productinfoleft"> Availability: </span> In Stock </li>
                        <?php } else {?>
                         <li>
                        <span class="productinfoleft"> Availability: </span> Out of Stock </li><?php }?>
                     </ul>
                      
                    
                  </div>
                  <div class="tab-pane ScrollStyle" id="review" class="ScrollStyle">
                    <h3>Write a Review</h3>
                     
                  <?php foreach($reviewdetails as $row)
                  {	$review=$row->review;
                  
                  echo "<p>$review</p>";    
                                	
                 }?>
                 
                    
                  </div>
                  <div class="tab-pane" id="producttag">
                    <h3>Write a Feedback</h3>
                    <form class="form-vertical" action="<?php echo site_url('tv/reviewinsert/'.$productid)?>" method="post">
                      <fieldset>
                       
                        <div class="control-group">
                          
                          <div class="controls">
                            <textarea rows="3" name="review" class="span3" placeholder="write your review"></textarea>
                          </div>
                        </div>
                      </fieldset>
                      <input type="submit" class="btn btn-orange" value="submit review">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--  Related Products-->
  
  <section id="related" class="row">
  
     
    <div class="container" style="margin-bottom:5%">
    <h1 class="heading1"><span class="maintext">Related Products</span></h1>
      <ul class="thumbnails" style=" margin-left:-4%; margin-right:-4%;">
      <?php foreach($relateddetails as $row)
                  {	
                  	$productid=$row->product_id;
                  	$pimage=$row->product_image;
                  	$productname=$row->product_name;
                  $price=$row->price;
                  $brand=$row->brand;
                     
                                	
                 ?>
        <li class="span3">
         
          <a class="prdocutname" href="<?php echo site_url('tv/product/'.$productid)?>"><?php echo $productname ?></a>
          
          <div class="thumbnail" style="height:280px;">
            <a href="<?php echo site_url('tv/product/'.$productid)?>"><img style="height:185px; width:300px"src="<?php echo $pimage ?>"></a>
            <div class="pricetag">
              
              <div class="price" style="margin-right:63px;margin-top:12px;">
                <div class="pricenew"><?php echo "Rs" ?>&nbsp;<?php echo $price ?></div>
              </div>
              <span class="spiral"></span><a href="<?php echo site_url('tv/product/'.$productid)?>" class="productcart" style="margin-right:25px;">ADD TO CART</a>
            </div>
          </div>

        </li>
                 <?php }?>
      </ul>
      
    </div>
    
  </section>
  

</div>

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script type="text/javascript">

		$(document).ready(function()                      
				{
			$("#selectsize").show();
			$("#quantity").hide();
			
				});

				function onstatechange()
				{
					$("#selectsize").show();
					$("#quantity").show();	
				
				$.ajax({
					type: "post",
					url: "<?php echo site_url('tv/get_size/'.$sizeid);?>",
					cache: false,
					data: $('#selectsize').serialize(),
					success: function(quantity)
					{
						try
						{
							$('#quantity').html(quantity);
						}
						catch(e)
						{
							alert(e);
						}
					}
				});
				}

</script>
