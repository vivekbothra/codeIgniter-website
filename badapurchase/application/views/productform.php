<div id="maincontainer" style="margin-top:30px;">
 	<div id="product">
    	<div class="container">
    		<div class="row">        
        		<div class="">
         			<div class="checkoutsteptitle"></div>
         				<div class="checkoutstep ">
         				<form class="form-vertical" action="<?php echo site_url('tv/productdatabase')?>" method="post" enctype="multipart/form-data">
         				<h6 style="margin-left:40px; color:#880000 ; ">* fields are mandatory</h6>
                        	
           
            
            				 <div class="productdetails "  >
              				 	<h3 class="heading3" style="margin-bottom:10px;">Product Details </h3><hr>
              						<div class="loginbox">
              						
              						<div style="margin-bottom:12px;" >
              							
											<div class="controls">
											 <img style="height:100px; width:100px;" src="" id="blah">
												<input type="file" name="productimage" class="span3"  onchange="readURL(this)">
											 </div>
												
										</div>
									                  
										<div style="margin-bottom:12px;" >
                          					<div class="controls" >
                           						<select name="category" onchange="oncategorychange()" id="category" >
                          							<option disabled selected>Select Category</option>
                          							<?php foreach($categorydetails as $row){
		                     						echo "<option value='$row->category_id'>$row->category_name</option>";
						 							}?>
					   							</select>
                          					</div>
                          					<div class="controls" style="margin-left:235px; margin-top:-30px;" >
                      							<select name="subcategory" onchange="onsubcategorychange()" id="subcategory" >
                          							<option disabled selected>Select SubCategory</option>
                          							
												</select>
                      						</div>
                        				</div>
                        
                     					<div style="margin-bottom:12px;">
                  							<div class="controls" >
                      							<select name="producttype" onchange="onproducttypechange()" id="producttype" >
                      								<option disabled selected>Select Product Type</option>
                     							</select>
                      						</div>
                      						<div class="controls"  style="margin-left:235px; margin-top:-30px;" id="addproducttype" >
                     							 <input type="text" name="addproducttype" value="" placeholder="Add New Type" style="width:220px;"> 
                     							  
                        					</div>
                    					</div>
                    
                    					<div style="margin-bottom:12px;" id="product">
                    						<div class="controls" >
                     							 <input type="text" name="productname" value="" placeholder="Product Name" style="width:220px; text-transform: capitalize;" required> &nbsp;&nbsp;
                     							 <input type="text" name="modelno" value="" placeholder="Model/ Quality No." style="width:220px; text-transform: capitalize;" required> 
                        					</div>           		
                    					</div>
                    					
                    					<div style="margin-bottom:12px;">
                    						<div class="controls"   >
                     							<select name="brand" onchange="onbrandchange()" id="brand" >
                     								<option disabled selected>Select Brand</option>
                     							</select>
                     						</div>
                     						<div class="controls" style="margin-left:235px; margin-top:-30px;" id="addnewbrand" >
                     							 <input type="text" name="addnewbrand" value="" placeholder="Add New Brand" style="width:220px; text-transform: capitalize;"> 
                     							  
                        					</div>
                    					</div>
                    
                    					<div>
                    						<div class="controls" style="margin-bottom:12px;" id="price" >
                     							 <input type="text" name="price" value="" placeholder="Price/Unit" style="width:220px;" required> &nbsp;&nbsp;
                     							 <input type="text" name="offer" value="" placeholder="If Any Offer " style="width:220px; text-transform: capitalize;"> 
                        					</div>
                    					</div>
                    					
                    					<div>
                    					<h5 style="color:#880000;">Sizes/Packets Weight/Capacity</h5>
                    						<div class="controls" style="margin-bottom:12px;" id="quantity" >
                    							<input type="text" name="size1" value="" placeholder="size/weight/capacity" style="width:220px;text-transform: capitalize;" required> &nbsp;&nbsp;
                     							 <input type="text" name="maximumquantity1" value="" placeholder="Pieces/Quantity Available" style="width:220px;" required> &nbsp;&nbsp;
                     							 <input type="text" name="minpurchase1" value="" placeholder="Minmum Selling Pieces/Quantity" style="width:220px;" required>
                     							 <a class="btn btn-orange" onclick="addnew()" id="addnew" style="margin-top:-10px;text-decoration:none;">ADD Another</a>
                        					</div>
                    					</div>
                    					 
                    					<div>
                    						<div class="controls" style="margin-bottom:12px;" id="quantity1" >
                    							<input type="text" name="size2" value="" placeholder="size/weight/capacity" style="width:220px; text-transform: capitalize;"> &nbsp;&nbsp;
                     							 <input type="text" name="maximumquantity2" value="" placeholder="Pieces/Quantity Available" style="width:220px;"> &nbsp;&nbsp;
                     							 <input type="text" name="minpurchase2" value="" placeholder="Minmum Selling Pieces/Quantity" style="width:220px;">
 												<a class="btn btn-orange" onclick="addnew1()" id="addnew1" style="margin-top:-10px;text-decoration:none;">ADD Another</a>                        					</div>
                    					</div>
                    					
                    					<div>
                    						<div class="controls" style="margin-bottom:12px;" id="quantity2" >
                    							<input type="text" name="size3" value="" placeholder="size/weight/capacity" style="width:220px; text-transform: capitalize;"> &nbsp;&nbsp;
                     							 <input type="text" name="maximumquantity3" value="" placeholder="Pieces/Quantity Available" style="width:220px;"> &nbsp;&nbsp;
                     							 <input type="text" name="minpurchase3" value="" placeholder="Minmum Selling Pieces/Quantity" style="width:220px;">
 												<a class="btn btn-orange" onclick="addnew2()" id="addnew2" style="margin-top:-10px;text-decoration:none;">ADD Another</a>                        					</div>
                        					
                    					</div>
                    					
                    					<div>
                    						<div class="controls" style="margin-bottom:12px;" id="quantity3" >
                    							<input type="text" name="size4" value="" placeholder="size/weight/capacity" style="width:220px; text-transform: capitalize;"> &nbsp;&nbsp;
                     							 <input type="text" name="maximumquantity4" value="" placeholder="Pieces/Quantity Available" style="width:220px;"> &nbsp;&nbsp;
                     							 <input type="text" name="minpurchase4" value="" placeholder="Minmum Selling Pieces/Quantity" style="width:220px;">
                     							 <a class="btn btn-orange" onclick="addnew3()" id="addnew3" style="margin-top:-10px;text-decoration:none;">ADD Another</a>
                        					</div>
                    					</div>
                                     </div>
                    				</div>
                    			
                   	 			<div>
                   	 				
                   	 			</div>
                   	 			<input type="submit" Value="save" class="btn btn-orange" style="margin-left:40px; width:100px;">
                  			</form>
                  		</div>
            		</div>
            	</div>
            </div>
       </div>
  </div>
            
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script type="text/javascript">

		$(document).ready(function()                      
				{
			$("#owner").show();
			$("#category").show();
			$("#subcategory").show();
			$("#producttype").show();
			$("#addproducttype").hide();
			$("#brand").show();
			$("#addnewbrand").hide();
			$("#quantity1").hide();
			$("#quantity2").hide();
			$("#quantity3").hide();
			
			$("#bank").show();
				});

				function oncategorychange()
				{
				
				$.ajax({
					type: "post",
					url: "<?php echo site_url('tv/get_subcategory');?>",
					cache: false,
					data: $('#category').serialize(),
					success: function(subcategory)
					{
						try
						{
							$('#subcategory').html(subcategory);
						}
						catch(e)
						{
							alert(e);
						}
					}
				});
				}


				function onsubcategorychange()
				{
				
				
				
				$.ajax({
					type: "post",
					url: "<?php echo site_url('tv/get_producttype');?>",
					cache: false,
					data: $('#subcategory').serialize(),
					success: function(producttype)
					{
						try
						{
							$('#producttype').html(producttype);
						}
						catch(e)
						{
							alert(e);
						}
					}


				
				});
				
				}


				function onproducttypechange()
				{
				

				var selectoption=document.getElementById('producttype');

				if(selectoption.value=="addnewproduct")
				{
					$("#category").show();
					$("#subcategory").show();
					$("#producttype").show();
					
					$("#addproducttype").show();
					$("#brand").show();
					$("#addnewbrand").hide();
				}
				else
				{

					$("#category").show();
					$("#subcategory").show();
					$("#producttype").show();
					$("#addproducttype").hide();
					$("#brand").show();
					$("#addnewbrand").hide();


				}
				$.ajax({
					type: "post",
					url: "<?php echo site_url('tv/get_brand');?>",
					cache: false,
					data: $('#producttype').serialize(),
					success: function(brand)
					{
						try
						{
							$('#brand').html(brand);
						}
						catch(e)
						{
							alert(e);
						}
					}
				});
				}

				function onbrandchange()
				{
				

				var selectoption=document.getElementById('brand');
				var variable=document.getElementById('producttype');
				if(variable.value=="addnewproduct")
				{
					if(selectoption.value=="addnewbrand")  
					{
					
						$("#category").show();
						$("#subcategory").show();
						$("#producttype").show();
						$("#addproducttype").show();
						$("#brand").show();
						$("#addnewbrand").show();
					
					}
					else
					{
						$("#category").show();
						$("#subcategory").show();
						$("#producttype").show();
						$("#addproducttype").show();
						$("#brand").show();
						$("#addnewbrand").hide();
								
					}
					
				}
				else
				{      
					if(selectoption.value=="addnewbrand")  
					{ 
						$("#category").show();
						$("#subcategory").show();
						$("#producttype").show();
						$("#addproducttype").hide();
						$("#brand").show();
						$("#addnewbrand").show();
					}
					else
					{	
						$("#category").show();
						$("#subcategory").show();
						$("#producttype").show();
						$("#addproducttype").hide();
						$("#brand").show();
						$("#addnewbrand").hide();
					}

				}
				
				}

				function addnew()
				{
				
					$("#addnew").hide();
					$("#quantity1").show();	
				}

				function addnew1()
				{
				
					$("#addnew1").hide();
					$("#quantity2").show();	
				}

				function addnew2()
				{
				
					$("#addnew2").hide();
					$("#quantity3").show();	
				}

				function readURL(input) 
			     {
			            if (input.files && input.files[0]) 
				            {
			                var reader = new FileReader();

			                reader.onload = function (e)
			                {
			                    $('#blah')
			                        .attr('src', e.target.result)
			                        
			                };

			                reader.readAsDataURL(input.files[0]);
			            }
			        }

				
			
				</script>
