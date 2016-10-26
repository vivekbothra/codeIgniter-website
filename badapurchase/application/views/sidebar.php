
<div style="margin-top:50px;">
<?php foreach($data as $row)
{
$roleid=$row->role_id;
}
if($roleid==2)
{
?>
<!-- user side bar -->
   <div class="span1"></div>
         <div class="span2">
        
          
            <div class="sidewidt">
              <h2 class="heading2"><span> My Account</span></h2>
              <ul class="nav nav-list categories">
                <li>
                  <a class="active" href="<?php echo site_url('tv/profile/')?>"> Profile Details</a>
                  
                </li>
                <li>
                  <a href="#" onclick="profilechange()">Edit Profile</a>
                </li>
                <li>
                  <a href="#" onclick="updateprofilechange()">Change Password</a>
                </li>
                <li>
                  <a href="<?php echo base_url('tv/productform')?>">Upload Product</a>
                </li>
                <li><a href="#" onclick ="passwordchange()">Product Status</a>
               <?php foreach($notify as $row)
              	$variable=$row->count;
              	?>
                
                <li>
                <a href="<?php echo site_url('tv/notification')?>"> 
                <span style="margin-right:22%;">Notifications</span>
                <span style="color:#FF0000;"><?php echo $variable  ?></span></a>
                
                </li>
                <li>
                  <a href="#" onclick ="purchasehistory()">Purchase History</a>
                </li>
                <li>
                  <a href="<?php echo site_url('tv/logout')?>">Logout</a>
                </li>
              </ul>
              
            </div>
             </div>
<?php 
}
if($roleid==1)
{ 
?>
<!-- adminsidebar -->

 <div class="span1"></div>
 <div class="span2">
   
            <div class="sidewidt">
              <h2 class="heading2"><span> My Account</span></h2>
              <ul class="nav nav-list categories">
                <li>
                  <a class="active" href="<?php echo site_url('tv/profile/')?>"> Profile Details</a>
                  
                </li>
                <li>
                  <a href="#" onclick="profilechange()">Edit Profile</a>
                </li>
                <li>
                  <a href="#" onclick="updateprofilechange()">Change Password</a>
                </li>
                <li>
                  <a href="#" onclick="productchange()">View All Products</a>
                </li>
                <li><a href="#" onclick ="userchange()">View All Users</a>
                </li>
                <li>
                  <a href="#" >User Queries</a>
                </li>
                
                <li>
                  <a href="<?php echo site_url('tv/logout')?>">Logout</a>
                </li>
              </ul>
              
            </div>
             </div>

<?php }?>

 <div id="maincontainer" style="margin-top:50px;">
  <div id="product">
    <div class="container">
    
      <div class="row">        
        
        <div class="">
         
          <div class="checkoutsteptitle"></div>
          <div class="checkoutstep ">
  
  
   
   