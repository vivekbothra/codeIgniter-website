<div id="maincontainer" style="margin-top:50px;">
  <div id="product">
    <div class="container">
    
      <div class="row">        
        <!-- Account Login-->
        <div class="">
         
          <div class="checkoutsteptitle"></div>
          <div class="checkoutstep ">
           <div class="newcustomer "  >
              <h3 class="heading3" style="margin-bottom:20px;">Address Details </h3>
              <div class="loginbox">
                  <form class="form-vertical" action="<?php echo site_url('tv/addressinsert')?>" method="post">
                          <div >
                          <div class="controls" style="margin-bottom:12px;" id="country">
                          <select name="country">
                          <option value="India" >India</option>
                          </select>
                          </div>
                        </div>
                        
                    <div>
                  
                      <div class="controls" style="margin-bottom:12px;">
                      <select name="state" onchange="onstatechange()" id="state" >
                          <option disabled selected>Select state</option>
                          <?php foreach($statedetails as $row){
		                     echo "<option value='$row->state_id'>$row->state_name</option>";
						 }?>
						 
						 
						 
						
                       </select>
                      </div>
                    </div>
                    
                    <div>
                    <div class="controls" style="margin-bottom:12px;" >
                     <select name="districts" onchange="onstatechange1()" id="district" >
                     </select>
                        </div>
                    </div>
                    
                     <div>
                    <div class="controls" style="margin-bottom:12px;" id="id1"  >
                     <input type="text" name="newd" value="" placeholder="Add Your District"> 
                     
                        </div>
                    </div>
                    
                     
                    <div>
                    <div class="controls" style="margin-bottom:12px;"  >
                     <select name="pincode" id="pincode" onchange="onstatechange2()">
                          </select>
                        </div>
                    </div>
                   
                   <div>
                    <div class="controls" style="margin-bottom:12px;" id="id2"  onclick="adddistrict()">
                     <input type="text" name="newp" value="" placeholder="Add Your pincode"> 
                     
                        </div>
                    </div>
                    
                    
                    <br>
                    <input type="submit" Value="save" class="btn btn-orange">
                    
            </form>
                  
               
              </div>
            </div>
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
				$("#country").show();                
				$("#state").show();
				$("#district").hide();
				$("#pincode").hide();
				$("#id1").hide();
				$("#id2").hide();
				});

				function onstatechange()
				{
				$("#country").show();
				$("#state").show();
				$("#district").show();
				$("#pincode").hide();
				$("#id1").hide();
				$("#id2").hide();
				

				$.ajax({
					type: "post",
					url: "<?php echo site_url('tv/to_district');?>",
					cache: false,
					data: $('#state').serialize(),
					success: function(district)
					{
						try
						{
							$('#district').html(district);
						}
						catch(e)
						{
							alert(e);
						}
					}
				});
				}

				function onstatechange1()
				{

					var selectoption=document.getElementById('district');
					if(selectoption.value=="addnewdistrict")
					{
						
						$("#district").show();
						$("#pincode").hide();
						$("#id1").show();
						$("#id2").show();	

					}
					else
					{
				
				$("#district").show();
				$("#pincode").show();
				$("#id1").hide();
				$("#id2").hide();	
        
				
					}

				$.ajax({
					type: "post",
					url: "<?php echo site_url('tv/to_pincode');?>",
					cache: false,
					data: $('#district').serialize(),
					success: function(pincodes)
					{
						try
						{
							$('#pincode').html(pincodes);
						}
						catch(e)
						{
							alert(e);
						}
					}
				});
				}

				function onstatechange2()
				{

					var selectoption=document.getElementById('pincode');
					if(selectoption.value=="addnewpincode")
					{
						
						$("#district").show();
						$("#pincode").show();
						$("#id1").hide();
						$("#id2").show();	

					}else
					{
						
						$("#district").show();
						$("#pincode").show();
						$("#id1").hide();
						$("#id2").hide();	

					}
				}
					
				

				

				</script>