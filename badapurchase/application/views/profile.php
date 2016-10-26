
   </div>
  
<?php foreach($data as $row)
{
$roleid=$row->role_id;
}
if($roleid==2)
{
?>

<!-- user profile -->

<div class="span8">
<div class="span8" id="profile">
<div class="span8">
<div class="checkoutsteptitle"><h3><span class="maintext">Profile Details</span></h3> <hr></div>
<div class="span5">
<?php foreach($data as $row){
$id=$row->user_id;?>
<table >

<tr><td class="profile"> <b>First-Name :</b></td> <td><?php echo $row->fname?></td><tr>
<tr><td class="profile"> <b>Last-Name :</b></td> <td><?php echo $row->lname?></td><tr>
<tr><td class="profile"> <b>Email :</b></td> <td><?php echo $row->email?></td><tr>
<tr><td class="profile"> <b>Contact no :</b></td> <td><?php echo   $row->contact_no?></td><tr>
<tr><td class="profile"><b> Address :</b></td> <td><?php echo  $row->address ?></td><tr>
</tr>
</table>

<?php }?>
</div>
<div class="span2">

<?php foreach($data as $row){
	$image=$row->image;
	if(!empty($image))
	{
echo"<img style='height:150px;width:140px;' src=$image id='blah'>";
	}
else 
{?>
	<img style="height:150px;width:140px;" src="<?php echo site_url('img/download.png')?>" id="blah" />
<?php }

?>

<form action=<?php echo site_url('tv/upload_img/')?> method="post" enctype="multipart/form-data">
	<div class="controls">
		<input type="file" onchange="readURL(this);" name="user_image" class="span3">
	 </div>
		<button type="submit" class="btn btn-default">Upload</button>
	</form>


</div>
</div>
</div>

<!-- end of user profile -->

<!-- update user profile -->

<div class="span8" id="updateprofile">
	
	<?php foreach($data as $var){
$fname=$var->fname;
$lname=$var->lname;

$contact=$var->contact_no;
$address=$var->address;

} ?>
	<form action="<?php echo site_url('tv/updatequery/') ?>" method="post">
	<h3 style="margin-bottom:30px;">Edit your profile</h3><hr></hr>
	
	<div >
                              <div class="controls" style="margin-bottom:6px;">
                              <div><b>FirstName:</b></div>
                               <div> <input type="text" class="span3" name="fname" value="<?php echo $fname ?>" required></div> 
                             </div>
                        </div>
                        
                    <div>
                       
                      <div class="controls" style="margin-bottom:6px;">
                      <div><b>LastName:</b></div>
                      <div>  <input type="text"  class="span3" name="lname" value="<?php echo $lname ?>" required></div>
                      </div>
                    </div>
                   
                    <div>
                    <div class="controls" style="margin-bottom:6px;">
                   <div><b>  Contact no:</b></div>
                        <input type="tel"  class="span3" name="contact_no" value="<?php echo $contact ?>" required>
                      </div>
                    </div>
                    <div>
                    <div class="controls" style="margin-bottom:6px;">
                   <div><b> Address:</b></div>
                        <input type="text"  class="span3"  name="address" value="<?php echo $address ?>" required>
                      </div>
                    </div>
	
		<input type="submit" class="btn btn-orange " value="Save">
		</form>
		
	</div>
	
	<!-- end of user update profile -->
	
	<!-- user change password -->
	<div class="span6" id="changepassword">

<h4 style="margin-bottom:30px;">Change your Password</h4><hr></hr>
	
	<form action="<?php echo site_url('tv/changepasswordquery/') ?>" method="post">
	
	<div>
                    <div class="controls" style="margin-bottom:6px;">
                  <div><b> New password:</b></div>
                    <div>  <input type="text"  class="span3" name="password" required></div>  
                      </div>
                    </div>
                    
                    <div>
                    <div class="controls" style="margin-bottom:6px;">
                  <div><b>  Re-type password:</b></div>
                    <div>    <input type="text"  class="span3" name="cpassword" required></div> 
                      </div>
                    </div>
	
		 <input type="submit" class="btn btn-orange " value="Save">
		</form>
		
	
	</div>
	
	<!-- end of user change password -->
	
	<!-- product status -->

<div class="span8" id="productstatus">
	<div class="checkoutsteptitle"><h3><span class="maintext">Product uploaded details</span></h3> <hr>
	<table class="table table-striped table-bordered">
			<tr>
          
            <th class="image">Product Image</th>
            <th class="name">Product Name</th>
            <th class="model">Category</th>
            <th class="quantity">sub-Category</th>
            <th class="total">Product Type</th>
            <th class="total">Brand</th>
             <th class="action">Action</th>
           
          </tr>
    
	<?php foreach($product as $rowx)
	{
		$pid=$rowx->product_id;
	$productname=$rowx->product_name;
	$productimage=$rowx->product_image;
	$category1=$rowx->category;
	$subcategory1=$rowx->subcategory;
	$producttype1=$rowx->producttype;
	$brand1=$rowx->brand;
	
	?>
	
	
	<tr>
	<td class="image"><?php echo "<img src='$productimage' style='width:100px;height:100px;'>"  ?></td>
	<td class="name"><?php echo $productname ?></td>
	<td class="name">
	<?php foreach($category as $row1)
	{
		$categoryid=$row1->category_id;
		$categoryname=$row1->category_name;
		
	 	if ($category1==$categoryid){ 
	 	echo $categoryname ;	}}?>
	 	</td>
	<td class="name">
	<?php foreach($subcategory as $row2)
	{
		$subcategoryid=$row2->subcategory_id;
		$subcategoryname=$row2->subcategory_name;
		
	 if ($subcategory1==$subcategoryid){
		 echo $subcategoryname; }}?>
		 </td>
	<td class="model">
	<?php foreach($producttype as $row3)
	{
		$producttypeid=$row3->producttype_id;
		$producttypename=$row3->producttype_name;
	  if ($producttype1==$producttypeid){
	  	echo $producttypename;}} ?></td>
	<td class="quantity">
	
<?php	foreach($brand as $row4)
	{
		$brandid=$row4->brand_id;
		$brandname=$row4->brand_name;
	  if ($brand1==$brandid) echo $brandname;} ?></td>
	<td class="action"><a href="<?php echo site_url('tv/deleteproductstatus/'.$pid) ?>"><img class="tooltip-test" data-original-title="Remove"  src="<?php echo base_url('img/remove.png')?>" alt=""></a></td>
	</tr>
	
	<?php } ?>
	
	</table>
	
</div>

</div>

<!-- end of product status -->



<!-- Purchase history -->

<div class="span8" id="purchase">

<h1 class="heading1"><span class="maintext"> Purchase History</span></h1>
      <!-- Cart-->
      <div class="cart-info">
        <table class="table table-striped table-bordered">
        
          <tr>
          
            <th class="image">Product Image</th>
            <th class="name">product Name</th>
            
            <th class="model">Model N0</th>
             <th class="quantity">Quantity</th>
              <th class="model">Size</th>
              <th class="total">Action</th>
              <th class="total">Total(Incl. Vat)</th>
           
          </tr>
           
     <?php foreach($purchasehistory as $row)
	{
		
		$cartid=$row->cart_id;
	$productimage=$row->product_image;
	$productname=$row->product_name;
	$modelno=$row->modelno;
	$price=$row->price;
	$quantity=$row->quantity;
	$size=$row->size;
	
	
	?>
           
           
          <tr>
          
            <td class="image"><img title="product" alt="product" src="<?php echo $productimage ?>" height="50" width="50"></td> 
            <td  class="name"><?php echo $productname ?></td>
            <td class="model"><?php echo $modelno ?></td>
           
            <td class="quantity"><?php echo $quantity ?></td>
              <td  class="model"><?php echo $size ?></td>
            
             <td class="total">
       		<a href="<?php echo site_url('tv/purchasedelete/'.$cartid) ?>"><img class="tooltip-test" data-original-title="Remove"  src="<?php echo base_url('img/remove.png')?>" alt=""></a></td>
           
             
            
            <td class="total"><?php echo "Rs";?>&nbsp;<?php echo $quantity * $price *(14.5/100) ?></td>
             
          </tr>
          
        <?php } }?>
        </table>
         
      </div>
	
	</div>
	
<!-- end of purchase history -->
	
	
</div>
    </div>
  </div>
  </div>
   </div>  


   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script type="text/javascript">

		$(document).ready(function()                      
				{
			$("#profile").show();
			$("#updateprofile").hide();
			$("#changepassword").hide();
			$("#productstatus").hide();
			$("#purchase").hide();
				});

		function profilechange()
		{
			$("#profile").hide();
			$("#updateprofile").show();
			$("#changepassword").hide();
			$("#productstatus").hide();
			$("#purchase").hide();

			}

		function updateprofilechange()
		{
			$("#profile").hide();
			$("#updateprofile").hide();
			$("#changepassword").show();
			$("#productstatus").hide();
			$("#purchase").hide();

			}

		function passwordchange()
		{
			$("#profile").hide();
			$("#updateprofile").hide();
			$("#changepassword").hide();
			$("#productstatus").show();
			$("#purchase").hide();

			}

		function purchasehistory()
		{
			$("#profile").hide();
			$("#updateprofile").hide();
			$("#changepassword").hide();
			$("#productstatus").hide();
			$("#purchase").show();

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
		
		<!-- admin profile -->	

<?php 
}
if($roleid==1)
{ 
?>

  </div>
  
<div class="span8">
<div class="span8" id="profile">
<div class="span8">
<div class="checkoutsteptitle"><h3><span class="maintext">Profile Details</span></h3> <hr></div>
<div class="span5">
<?php foreach($data as $row){
$id=$row->user_id;?>
<table >

<tr><td class="profile"> <b>First-Name :</b></td> <td><?php echo $row->fname?></td><tr>
<tr><td class="profile"> <b>Last-Name :</b></td> <td><?php echo $row->lname?></td><tr>
<tr><td class="profile"> <b>Email :</b></td> <td><?php echo $row->email?></td><tr>
<tr><td class="profile"> <b>Contact no :</b></td> <td><?php echo   $row->contact_no?></td><tr>
<tr><td class="profile"><b> Address :</b></td> <td><?php echo  $row->address ?></td><tr>
</tr>
</table>

<?php }?>
</div>
<div class="span2">

<?php foreach($data as $row){
	$image=$row->image;
	if(!empty($image))
	{
echo"<img style='height:150px;width:140px;' src=$image id='blah'>";
	}
else 
{?>
	<img style="height:150px;width:140px;" src="<?php echo site_url('img/download.png')?>" id="blah" />
<?php }

?>

<form action=<?php echo site_url('tv/upload_img/')?> method="post" enctype="multipart/form-data">
	<div class="controls">
		<input type="file" onchange="readURL(this);" name="user_image" class="span3">
	 </div>
		<button type="submit" class="btn btn-default">Upload</button>
	</form>


</div>
</div>
</div>

<div class="span6" id="updateprofile">
	
	<?php foreach($data as $var){
$fname=$var->fname;
$lname=$var->lname;
$email=$var->email;
$contact=$var->contact_no;
$address=$var->address;

} ?>
	<form action="<?php echo site_url('tv/updatequery/') ?>" method="post">
	<h3 style="margin-bottom:30px;">Edit your profile</h3><hr></hr>
	
	<div >
                              <div class="controls" style="margin-bottom:6px;">
                              <div><b>FirstName:</b></div>
                               <div> <input type="text" class="span3" name="fname" value="<?php echo $fname ?>"></div> 
                             </div>
                        </div>
                        
                    <div>
                       
                      <div class="controls" style="margin-bottom:6px;">
                      <div><b>LastName:</b></div>
                      <div>  <input type="text"  class="span3" name="lname" value="<?php echo $lname ?>"></div>
                      </div>
                    </div>
                    
                    <div>
                    <div class="controls" style="margin-bottom:6px;">
                   <div><b> Email:</b></div>
                      <div>  <input type="text"  class="span3" name="email" value="<?php echo $email ?>"></div>
                      </div>
                    </div>
                    
                    <div>
                    <div class="controls" style="margin-bottom:6px;">
                   <div><b>  contact no:</b></div>
                        <input type="tel"  class="span3" name="contact_no" value="<?php echo $contact ?>">
                      </div>
                    </div>
                    <div>
                    <div class="controls" style="margin-bottom:6px;">
                   <div><b> Address:</b></div>
                        <input type="text"  class="span3"  name="address" value="<?php echo $address ?>">
                      </div>
                    </div>
	
		<input type="submit" class="btn btn-orange " value="Save">
		</form>
		
	</div>
	
	<div class="span6" id="changepassword">

<h4 style="margin-bottom:30px;">Change your Password</h4><hr></hr>
	
	<form action="<?php echo site_url('tv/changepasswordquery/') ?>" method="post">
	
	<div>
                    <div class="controls" style="margin-bottom:6px;">
                  <div><b> New password:</b></div>
                    <div>  <input type="text"  class="span3" name="npassword" ></div>  
                      </div>
                    </div>
                    
                    <div>
                    <div class="controls" style="margin-bottom:6px;">
                  <div><b>  Re-type password:</b></div>
                    <div>    <input type="text"  class="span3" name="rpassword" ></div> 
                      </div>
                    </div>
	
		 <input type="submit" class="btn btn-orange " value="Save">
		</form>
		
	</div>
	
	<!-- all users on badapurchase -->
	
	<div class="span8" id="allusers">
	<h1 class="heading1"><span class="maintext"> Users on BadaPurchase</span></h1>
      <!-- Cart-->
      <div class="cart-info">
      <form method="post" action="<?php echo site_url('tv/verifydeleteuser')?>">
        <table class="table table-striped table-bordered">
        <tr>
         <input type="submit" name="verifyall" onclick="this.value=true" class="btn btn-orange"  style="width:45%;margin-right:10%; font-weight:bold;" value="Verify All" >
         <input type="submit" name="deleteall" onclick="this.value=true" class="btn btn-orange"  style="width:45%; font-weight:bold;" value="Deactivate All" >
        </tr>
          <tr>
          <th class="name"><div>Select All</div><div><input type="checkbox" name="verify1[]" onchange="checkuser(this)"></div></th>
            <th class="image">User Image</th>
            <th class="name">User Name</th>
            
            <th class="quantity">Contact No</th>
             <th class="quantity">Address</th>
              <th class="total">Action</th>
           
          </tr>
           
     <?php foreach($getalluser as $row)
	{
		$uid=$row->user_id;
	$verify=$row->is_verified;	
	$image=$row->image;
	$fname=$row->fname;
	$lname=$row->lname;
	
	$contact=$row->contact_no;
	$address=$row->address;
	if(($verify==0) || ($verify==1))
	{
	?>
           
           
          <tr>
          <td class="name"><input type="checkbox" name="verify1[]" value="<?php $uid?>"></td> 
            <td class="image"><img   src="<?php echo $image ?>" height="100" width="100"></td> 
            <td  class="name"><?php echo $fname?>&nbsp;<?php echo  $lname ?></td>
            
           
            <td class="quantity"><?php echo $contact ?></td>
              <td  class="quantity"><?php echo $address ?></td>
            <?php if($verify==0){?>
             <td class="total"><div><a href="<?php echo site_url('tv/verifyuser/'.$uid) ?>"  style="text-decoration:none;  font-weight:bold;">Verify</a></div>
             
              <a href="<?php echo site_url('tv/deactivateuser/'.$uid) ?>" style="text-decoration:none; font-weight:bold; color:#FF0000;">Deactivate</a></td>
           <?php }
           if($verify==1){?>
           <td class="total"><div><img src=<?php echo site_url('img/images.jpg')?> style="width:25px; height:25px;" /></div>
           <a href="<?php echo site_url('tv/deactivateuser/'.$uid) ?>" style="text-decoration:none; font-weight:bold; color:#FF0000;">Deactivate</a></td>
          
          <?php }?>
          </tr>
         <?php }}?>  
          
        </table>
        </form>
      </div>
	</div>
	
	<!-- end of all users on badapurchase -->
	
	<!-- products on badapurchase -->
	
	<div class="span8" id="allproduct">
	<h1 class="heading1"><span class="maintext"> products on BadaPurchase</span></h1>
      <!-- Cart-->
      <div class="cart-info">
      <form method="post" action="<?php echo site_url('tv/verifydelete')?>">
        <table class="table table-striped table-bordered">
        <tr>
        <input type="submit" name="verifyall" onclick="this.value=true" class="btn btn-orange"  style="width:45%;margin-right:10%; font-weight:bold;" value="Verify" >
         <input type="submit" name="deleteall" onclick="this.value=true" class="btn btn-orange"  style="width:45%; font-weight:bold;" value="Deactivate" >
       
        </tr>
          <tr>
          <th class="name"><div>Select All</div><div><input type="checkbox" name="verify[]"  onchange="checkAll(this)" ></div></th>
            <th class="image">Product Image</th>
            <th class="name">Product Name</th>
            <th class="model">Model no</th>
            <th class="quantity">Price</th>
            <th class="total">Action</th>
           
          </tr>
           
     <?php foreach($getallproduct as $row)
	{
		$pid=$row->product_id;
		
	$verify=$row->is_verified;	
	$image=$row->product_image;
	$name=$row->product_name;
	$modelno=$row->modelno;
	$price=$row->price;
	
	?>
           
           
          <tr>
          <td class="name"><input type="checkbox"  name="verify[]" id="verify" value="<?php echo $pid ;?>"></td> 
            <td class="image"><img   src="<?php echo $image ?>" height="100" width="100"></td> 
            <td  class="name"><?php echo $name?></td>
            <td class="model"><?php echo $modelno ?></td>
           
            <td class="quantity"><?php echo $price ?></td>
              
            <?php if($verify==0){?>
             <td class="total"><div><a href="<?php echo site_url('tv/verifyproduct/'.$pid) ?>"   style="text-decoration:none; font-weight:bold;">Verify</a></div>
             
            <div>  <a href="<?php echo site_url('tv/deleteproduct/'.$pid) ?>" style="text-decoration:none; font-weight:bold; color:#FF0000;">Delete</a></div></td>
           <?php }
           if($verify==1){?>
           <td class="total"><div><img src=<?php echo site_url('img/images.jpg')?> style="width:25px; height:25px;" /></div>
          <a href="<?php echo site_url('tv/deleteproduct/'.$pid) ?>" style="text-decoration:none; font-weight:bold; color:#FF0000;">Delete</a></td>
          
          <?php }?>
          </tr>
         <?php }?>  
          
        </table>
        </form>
      </div>
	</div>
	<!--  end of products on badapurchase -->
  
</div>
<?php }?>
 </div>
    </div>
  </div>
  </div>
   </div>  


   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script type="text/javascript">

		$(document).ready(function()                      
				{
			$("#profile").show();
			$("#updateprofile").hide();
			$("#changepassword").hide();
			$("#allusers").hide();
			$("#allproduct").hide();
				});

		function profilechange()
		{
			$("#profile").hide();
			$("#updateprofile").show();
			$("#changepassword").hide();
			$("#allusers").hide();
			$("#allproduct").hide();

			}

		function updateprofilechange()
		{
			$("#profile").hide();
			$("#updateprofile").hide();
			$("#changepassword").show();
			$("#allusers").hide();
			$("#allproduct").hide();

			}

		function productchange()
		{
			$("#profile").hide();
			$("#updateprofile").hide();
			$("#changepassword").hide();
			$("#allproduct").show();
			$("#allusers").hide();
			}

		function userchange()
		{
			$("#profile").hide();
			$("#updateprofile").hide();
			$("#changepassword").hide();
			$("#allusers").show();
			$("#allproduct").hide();
			}

		function checkuser(ele) {
		     var checkboxes = document.getElementsByTagName('input');
		     if (ele.checked) 
			     {
		         for (var i = 0; i < checkboxes.length; i++) 
			         {
		             if (checkboxes[i].type == 'checkbox') 
			             {
		                 checkboxes[i].checked = true;
		             	}
		       		}
		     	} 
		     else 
			     {
		         for (var i = 0; i < checkboxes.length; i++) 
			         {
		             console.log(i)
		             if (checkboxes[i].type == 'checkbox') 
			             {
		                 checkboxes[i].checked = false;
		             	}
		         	}
		     	}
		}

		function checkAll(ele) {
		     var checkboxes = document.getElementsByTagName('input');
		     if (ele.checked) 
			     {
		         for (var i = 0; i < checkboxes.length; i++) 
			         {
		             if (checkboxes[i].type == 'checkbox') 
			             {
		                 checkboxes[i].checked = true;
		             	}
		       		}
		     	} 
		     else 
			     {
		         for (var i = 0; i < checkboxes.length; i++) 
			         {
		             console.log(i)
		             if (checkboxes[i].type == 'checkbox') 
			             {
		                 checkboxes[i].checked = false;
		             	}
		         	}
		     	}
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
<?php }?>
