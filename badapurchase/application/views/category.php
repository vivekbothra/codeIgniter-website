
<!-- Header End -->

<div id="maincontainer">
  <section id="product">
    <div class="container">
     
      <div class="row">        
        <!-- Sidebar Start-->
        <aside class="span2">
         <!-- Sub category list-->  
         <?php  if(empty($hide)){?>
         <div class="span2 ">
          <div class="sidewidt">
            <h2 class="heading2" Style="font-size:17px;"><span>Categories</span></h2>
           
            <ul class="nav  categories ScrollStyle" >
             <?php foreach ($categorydetails as $row)
            {
            	$subcategoryname=$row->subcategory_name;?>
              
              <li>
                <a href="<?php echo site_url('tv/category')?>"><?php echo $subcategoryname ?></a>
               
                 
              </li>
              
               <?php }?>
              
            </ul>
          </div>
          </div>
          <?php }?>
          <!-- end of subcategory list -->
<!--  <input list="producttype" name="producttype" style="width:60%;" class="controls">-->
          <!--  filter by product -->
          <form action="<?php echo site_url('tv/search/1/'.$var)?>" method="post" name="product">
          <div class="span3 " style="height:160px;"> 
          <div class="sidewidt controls">
         <h2 class="heading2" Style="font-size:17px;"><span>Filter By Product</span></h2>
         
            
           
           <div >
                <div class="controls" style="margin-bottom:8px;">
                     
                
          							<input type="text" list="agriproduct" style="width:60%;" name="search1">
									<datalist id="agriproduct">
									<?php foreach($agricultureproduct as $pro){?>
  										<option value="<?php echo $pro->producttype_name?>">
  										<?php }?>
									</datalist>
          <a href="#"> <img  style="width:35px; height:35px; margin-top:-10px;" src="<?php echo base_url('img/search.png')?>" onclick="document.forms['product'].submit();" ></a>
          </div>
            </div>
           
            
           
           
          </div>
          </div>
          </form>
          <!--end  filter by product -->
    <!--       <input list="brand" name="brand" style="width:60%;">-->  
          <!-- filter by brand -->  
       <form action="<?php echo site_url('tv/search/2/'.$var)?>" method="post"  name="brand"> 
           <div class="span3 " style="height:160px;"> 
          <div class="sidewidt">
            <h2 class="heading2" Style="font-size:17px;"><span>Filter By Brand </span></h2>
             
          <div >
                <div class="controls" style="margin-bottom:8px;">
                     <input type="text"  list="brand" style="width:60%;" name="search2">
           <datalist id="brand">
         
           <?php foreach($allbrand as $ag){?>
           
         <option value="<?php echo $ag->brand_name?>">
         <?php } ?>
           </datalist>
           <a href="#"> <img  style="width:35px; height:35px; margin-top:-10px;" src="<?php echo base_url('img/search.png')?>" onclick="document.forms['brand'].submit();" ></a>
           </div>
           </div>
          
          </div>
          </div>
          </form> 
          <!-- end of filter by brand  -->
        </aside>
        
        <!-- Sidebar End-->
        
        <div class="span1"></div>
        
        <!-- Category-->
        <div class="span8">          
          <!-- Category Products-->
          <section id="category">
            <div class="row">
              <div class="span8">
               <!-- Sorting-->
                <div class=" well" style="height:60px;">
                 
          
                   <p style="color:#fe980f; font-weight:700; font-size:20px; text-align:center;">PRODUCTS</p>
                 
                </div>
               <!-- Category-->
               
               <div  id="containerloadmore">
                <section id="categorygrid">
                  <ul class="thumbnails grid">
                 <?php if(!empty($productdetails))
                  {?> 
                  <?php foreach($productdetails as $row)
                  {  
                  $productid=$row->product_id;
                  $productname=$row->product_name;
                  $productimage=$row->product_image;
                  $price=$row->price;
                  
                  	?>
                    <li class="span2">
                      <a class="prdocutname" href="<?php echo site_url('tv/product/'.$productid)?>"><?php echo $productname ?></a>
                      <div class="thumbnail">
                        <span class="sale tooltip-test">Sale</span>
                        <a href="<?php echo site_url('tv/product/'.$productid)?>"><img  style="width:200px;height:200px;"src="<?php echo $productimage ?>"></a>
                       
                        <div class="pricetag" style="margin-left:-85px;">
                         
                          <div class="price">
                            <div class="pricenew"><?php echo "Rs";?>&nbsp;<?php echo $price ?></div>
                          <a href="<?php echo site_url('tv/product/'.$productid)?>" class="" style="margin-right:-20px;">ADD TO CART</a>
                          </div>
                        </div>
                      </div>
                    </li>
               <?php  }} else{ ?>
               	<p style="color:red;"> NO RESULT FOUND....</p>
               <?php }?>  
                  </ul>
                
                  </section>
                  </div>
                  <div class="span8" style="margin-top:50px;">
                  <div class="span3">
                  </div>
                  <div class="span3" id="divload"> 
                  <input type="button" id="btnloadmore" value="Loadmore" onclick="loadmore()" class="btn btn-orange"  />
                  </div>
                 <div class="span3">
                  </div>
                  </div>
                  
                 <form name="valueload" id="valueload">
					<input type="hidden" id="position" name="position" value="0" />
	
				</form>
				<div id="diverror" class="" align="center">
					<input type="image" src="<?php echo site_url('img/foolimage.gif');?>" height="40" width="40" />
				</div>
                
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </section>
</div>

            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script type="text/javascript">

		$(document).ready(function()                      
				{
			$("#diverror").hide();
			
				});
		function loadmore()
					{
						var v= document.getElementById('position');
						var position= parseInt(v.value);
						position ++;
						v.value = position;	
						
						
						$.ajax({

							type: "post",
							url: "<?php echo site_url('tv/loadmore/'.$category);?>",
							cache: false,				
							data: $('#valueload').serialize(),
							success: function(data)
							{
								if(data=="error")
								{	
									$('#containerloadmmore').append("");
									$('#btnloadmore').attr('disabled',true);
								}
								else
								{
									$('#containerloadmore').append(data);
								}	
							}
						});
					}
</script>

