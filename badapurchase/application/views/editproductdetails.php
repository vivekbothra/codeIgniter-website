<?php 
foreach($productdetails as $pvar)
	{	
		$pid=$pvar->product_id;
		$pimage=$pvar->product_image;
		$pname=$pvar->product_name;
		$mno=$pvar->modelno;
		$price=$pvar->price;
		$offer=$pvar->offer;
	}	
	foreach($sizedetails as $pvar)
	{
	
		$size1=$pvar->size1;
		$maximumquantity1=$pvar->maximumquantity1;
		$minpurchase1=$pvar->minpurchase1;
		$size2=$pvar->size2;
		$maximumquantity2=$pvar->maximumquantity2;
		$minpurchase2=$pvar->minpurchase2;
		$size3=$pvar->size3;
		$maximumquantity3=$pvar->maximumquantity3;
		$minpurchase3=$pvar->minpurchase3;
		$size4=$pvar->size4;
		$maximumquantity4=$pvar->maximumquantity4;
		$minpurchase4=$pvar->minpurchase4;
	}	
	foreach($categorydetails as $pvar)
	{
		$categoryname=$pvar->category_name;
	}
	foreach($subcategorydetails as $pvar)
	{
		$subcategoryname=$pvar->subcategory_name;
	}
	foreach($producttypedetails as $pvar)
	{
		$producttypename=$pvar->producttype_name;
	}
	foreach($branddetails as $pvar)
	{
		$brandname=$pvar->brand_name;
	}

?> 
<div id="maincontainer" style="margin-top:30px;">
 	<div id="product">
    	<div class="container">
    		<div class="row">        
        		<div class="">
         			<div class="checkoutsteptitle"></div>
         				<div class="checkoutstep ">
         				<form  action="<?php echo site_url('tv/updateproductdetails')?>" method="post" enctype="multipart/form-data">
         				<h6 style="margin-left:40px; color:#880000 ; ">* fields are mandatory</h6>
                        	
           
            
            				 <div class="productdetails "  >
              				 	<h3 class="heading3" style="margin-bottom:10px;">Edit Product Details </h3><hr>
              						<div class="loginbox">
              						
              						<div style="margin-bottom:12px;" >
              							
											<div class="controls">
												<?php echo "<img style='height:100px; width:100px;' src='$pimage' name='productpicture'>" ?>
												
											 </div>
											<input type="file" name="productimage" class="span3"  value="$pimage">	
										</div>
									                  
										<div style="margin-bottom:8px;" >
                          					<div class="controls" >
                           						
                          							<?php echo "<h5>Category Name : $categoryname</h5>";?>
		                     				
                          					</div>
                          					</div>
                          					<div style="margin-bottom:8px;">
                          					<div class="controls"  >
                      							<?php echo "<h5>Sub Category Name : $subcategoryname</h5>";?>
                      						</div>
                        				</div>
                        
                     					<div style="margin-bottom:8px;">
                  							<div class="controls" >
                      							<?php echo "<h5> Product Type : $producttypename </h5>";?>
                      						</div>
                      						
                    					</div>
                    					<div style="margin-bottom:8px;">
                    						<div class="controls"   >
                     							<?php echo "<h5>Brand : $brandname</h5>";?>
                     						</div>
                     						
                    					</div>
                    
                    					<div style="margin-bottom:12px;" id="product">
                    						<div class="controls" >
                     							 <input type="text" name="productname" value="<?php echo $pname ?>"  style="width:220px;"> &nbsp;&nbsp;
                     							 <input type="text" name="modelno" value="<?php echo $mno ?>"  style="width:220px;"> 
                        					</div>           		
                    					</div>
                    					
                    					
                    
                    					<div>
                    						<div class="controls" style="margin-bottom:12px;" id="price" >
                     							 <input type="text" name="price" value="<?php  echo $price?>"  style="width:220px;"> &nbsp;&nbsp;
                     							 <input type="text" name="offer" value="<?php echo $offer ?>"  style="width:220px;"> 
                        					</div>
                    					</div>
                    					<h5 style="color:#880000;">Sizes/Packets Weight/Capacity</h5>
                    					
                    					<div>
                    					
                    				
                    						<div class="controls" style="margin-bottom:12px;" id="quantity" >
                    							<input type="text" name="size1" id="size1" value="<?php echo $size1 ?>"  style="width:220px;"> &nbsp;&nbsp;
                     							 <input type="text" name="maximumquantity1" id="maximumquantity1" value="<?php echo $maximumquantity1 ?>"  style="width:220px;"> &nbsp;&nbsp;
                     							 <input type="text" name="minpurchase1" id="minpurchase1" value="<?php echo $minpurchase1 ?>"  style="width:220px;">
                     							 <a class="btn btn-orange" id="delete" style="margin-top:-10px;text-decoration:none;">Delete</a>
                     							 
                        					</div>
                        					
                    					</div>
                    					 	<?php if(!empty ($size2)) {?>
                    					<div>
                    						<div class="controls" style="margin-bottom:12px;" id="quantity1" >
                    							<input type="text" name="size2" id="size2" value="<?php echo $size2 ?>"  style="width:220px;"> &nbsp;&nbsp;
                     							 <input type="text" name="maximumquantity2" id="maximumquantity2" value="<?php echo $maximumquantity2 ?>" style="width:220px;"> &nbsp;&nbsp;
                     							 <input type="text" name="minpurchase2" id="minpurchase2" value="<?php echo $minpurchase2 ?>"  style="width:220px;">
                     							 <a class="btn btn-orange" id="delete1" style="margin-top:-10px;text-decoration:none;">Delete</a>
 											</div>
                    					</div>
                    					<?php }?>
                    						<?php if(!empty ($size3)) {?>
                    					<div>
                    						<div class="controls" style="margin-bottom:12px;" id="quantity2" >
                    							<input type="text" name="size3" id="size3" value="<?php echo $size3 ?>"  style="width:220px;"> &nbsp;&nbsp;
                     							 <input type="text" name="maximumquantity3" id="maximumquantity3" value="<?php echo $maximumquantity3 ?>"  style="width:220px;"> &nbsp;&nbsp;
                     							 <input type="text" name="minpurchase3" id="minpurchase3" value="<?php echo $minpurchase3 ?>"  style="width:220px;">
                     							 <a class="btn btn-orange" id="delete2" style="margin-top:-10px;text-decoration:none;">Delete</a>
 											</div>
                        					
                    					</div>
                    					<?php }?>
                    						<?php if(!empty ($size4)) {?>
                    					<div>
                    						<div class="controls" style="margin-bottom:12px;" id="quantity3" >
                    							<input type="text" name="size4" id="size4" value="<?php echo $size4 ?>"  style="width:220px;"> &nbsp;&nbsp;
                     							 <input type="text" name="maximumquantity4" id="maximumquantity4" value="<?php echo $maximumquantity4 ?>" style="width:220px;"> &nbsp;&nbsp;
                     							 <input type="text" name="minpurchase4" id="minpurchase4" value="<?php echo $minpurchase4 ?>"  style="width:220px;">
                     							 <a class="btn btn-orange" id="delete3" style="margin-top:-10px;text-decoration:none;">Delete</a>
                     							 
                        					</div>
                    					</div>
                    					<?php }?>
                                     </div>
                    				</div>
                    			
                   	 			<div>
                   	 				
                   	 			</div>
                   	 			<input type="submit" Value="Update" class="btn btn-orange" style="margin-left:40px; width:100px;">
                  			</form>
                  		</div>
            		</div>
            	</div>
            </div>
       </div>
  </div>
            
           