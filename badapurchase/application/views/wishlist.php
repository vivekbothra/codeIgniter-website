<div id="maincontainer" style="margin-bottom:10%;">
  <section id="product">
    <div class="container">
           
      <h1 class="heading1"><span class="maintext">Your Wishlist</span><span class="subtext"> All items in your  Wishlist</span></h1>
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
            <th class="total">Add To Cart</th>
           
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
          
          <tr id="tableshow">
            <td class="image"><a href="#"><img title="product" alt="product" src="<?php echo $productimage ?>" height="50" width="50"></a></td> 
            <td  class="name"><a href="<?php echo site_url('tv/product/'.$pid)?>"><?php echo $productname ?></a></td>
            <td class="model"><?php echo $modelno ?></td>
            <td class="quantity"><?php echo $quantity ?></td>
              <td  class="model"><a href="#"><?php echo $size ?></a></td>
            
             
             <td> <a href="#"><img class="tooltip-test" data-original-title="Remove"  src="<?php echo base_url('img/remove.png')?>" alt=""></a></td>
           
             
            <td class="price"><?php echo $price ?></td>
            <td class="total" ><a class="btn btn-orange" href="<?php echo site_url('tv/wishcart/'.$cartid)?>">Add To Cart</a></td>
             
          </tr>
        <?php }?>
        </table>
      </div>
     
    </div>
  </section>
</div>


