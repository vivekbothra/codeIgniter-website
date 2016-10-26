<div id="maincontainer" style="margin-top:50px;">
  <section id="product">
    <div class="container">
    
      
      <div class="row">
       <div class="checkoutsteptitle"></div>
          <div class="checkoutstep ">     
        <div class="span3">
          <aside>
            <div class="sidewidt">
              <h4 class="heading2"><span>Payment Options</span></h4>
              <ul class="nav nav-list categories">
                <li>
                  <a class="active" href="#" onclick="cod()">Cash On Delivery</a>
                </li>
                <li>
                  <a href="#" onclick="cc()">Credit Card</a>
                </li>
                <li>
                  <a href="#" onclick="nb()">Net Banking</a>
                </li>
                <li>
                  <a href="#" onclick="dc()">Debt Card</a>
                </li>
               
              </ul>
            </div>
          </aside>
        </div>  
        
        <div class="span6 payment" id="zero" >
        <p>Please choose your payment option for Purchase</p>
        </div> 
        
        <div class="span6 payment" id="cod" >
        <p>cash on delivery</p>
        <a class="btn btn-orange pull-right"  href="<?php echo site_url('tv/phistory')?>">Pay</a>
        </div> 
        <div class="span6 payment" id="cc" >
        <p>Credit Card</p>
        <a class="btn btn-orange pull-right"  href="<?php echo site_url('tv/phistory')?>">Pay</a>
        </div> 
        <div class="span6 payment" id="nb" >
        <p>Net Banking</p>
        <a class="btn btn-orange pull-right"  href="<?php echo site_url('tv/phistory')?>">Pay</a>
        </div> 
        <div class="span6 payment" id="dc" >
        <p>Debit Card</p>
        <a class="btn btn-orange pull-right"  href="<?php echo site_url('tv/phistory')?>">Pay</a>
        </div> 
        
       </div>
       </div>
       </div>
       </section>
       </div>
       
       <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script type="text/javascript">
       	$(document).ready(function()                      
				{
			$("#zero").show();
			$("#cod").hide();
			$("#cc").hide();
			$("#nb").hide();
			$("#dc").hide();
			
				});

				function cod()
				{
					$("#zero").hide();
					$("#cod").show();
					$("#cc").hide();
					$("#nb").hide();
					$("#dc").hide();
				
				
				}
				function cc()
				{
					$("#zero").hide();
					$("#cod").hide();
					$("#cc").show();
					$("#nb").hide();
					$("#dc").hide();
				
				
				}
				function nb()
				{
					$("#zero").hide();
					$("#cod").hide();
					$("#cc").hide();
					$("#nb").show();
					$("#dc").hide();
				
				
				}

				function dc()
				{
					$("#zero").hide();
					$("#cod").hide();
					$("#cc").hide();
					$("#nb").hide();
					$("#dc").show();
				
				
				}
				</script>
       