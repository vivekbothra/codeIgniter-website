<?php $subtotal=0;
 $vat=0;?>
<div id="maincontainer">
  <section id="product">
    <div class="container">
           
      <h1 class="heading1"><span class="maintext"> Shopping Cart</span><span class="subtext"> All items in your  Shopping Cart</span></h1>
      <!-- Cart-->
      <div class="cart-info">
        <table class="table table-striped table-bordered">
          <tr>
            <th class="image">Image</th>
            <th class="name">Product Name</th>
            <th class="model">Model</th>
            <th class="quantity">Qty</th>
             <th class="quantity">Size</th>
              <th class="total">Action</th>
            <th class="price">Unit Price</th>
            <th class="total">Total</th>
           
          </tr>
           
     <?php foreach($cartdetails as $row)
	{
		$pid=$row->product_id;
		$cartid=$row->cart_id;
	$productimage=$row->product_image;
	$productname=$row->product_name;
	$modelno=$row->modelno;
	$price=$row->price;
	$quantity=$row->quantity;
	$size=$row->size;
	?>
           
          <tr>
          <form method="post" id="formName" name="formName" action="<?php echo site_url('tv/updatecart/'.$cartid) ?>">
            <td class="image"><a href="#"><img title="product" alt="product" src="<?php echo $productimage ?>" height="50" width="50"></a></td> 
            <td  class="name"><a href="<?php echo site_url('tv/product/'.$pid)?>"><?php echo $productname ?></a></td>
            <td class="model"><?php echo $modelno ?></td>
           
            <td class="quantity"><input type="text" name="quantity" value="<?php echo $quantity ?>"  class="span1"></td>
              <td  class="model"><?php echo $size ?></td>
            
             <td class="total"><img class="tooltip-test" data-original-title="Update" src="<?php echo base_url('img/update.png')?>" onclick="document.forms['formName'].submit();" alt="">
             
              <a href="<?php echo site_url('tv/deletecart/'.$cartid) ?>"><img class="tooltip-test" data-original-title="Remove"  src="<?php echo base_url('img/remove.png')?>" alt=""></a></td>
           
             
            <td class="price"><?php echo "Rs";?>&nbsp;<?php echo $price ?></td>
            <td class="total"><?php echo "Rs";?>&nbsp;<?php echo $quantity * $price ?></td>
             </form>
          </tr>
          <?php 
          
          $subtotal=$subtotal+ ($quantity * $price);
          ?>
        <?php }?>
        </table>
      </div>
      
      <div class="container">
      <div class="pull-right">
          <div class="span4 pull-right">
            <table class="table table-striped table-bordered ">
              <tr>
                <td><span class="extra bold">Sub-Total :</span></td>
                <td><span class="bold"><?php echo "Rs";?>&nbsp;<?php echo $subtotal ?></span></td>
              </tr>
             <tr>
                <td><span class="extra bold">VAT :</span></td>
                <td><span class="bold"><?php echo "Rs";?>&nbsp;<?php  $vat=$subtotal *(14.5/100); echo $vat ?></span></td>
              </tr>
              <tr>
                <td><span class="extra bold totalamout">Total :</span></td>
                <td><span class="bold totalamout"><?php echo "Rs";?>&nbsp;<?php echo $subtotal + $vat ?></span></td>
              </tr>
            </table>
            <?php 
            	if(empty($confirmcart)){?>
            <a class="btn btn-orange pull-right"  href="<?php echo site_url('tv/checkout')?>">CheckOut</a>
            <?php } else {?>
            <a class="btn btn-orange pull-right"  href="<?php echo site_url('tv/payment')?>">confirm</a><?php }?>
            <a class="btn btn-orange pull-right mr10"  href="<?php echo site_url('tv/index')?>">Continue Shopping</a>
            
          </div>
        </div>
        </div>
    </div>
  </section>
</div>

