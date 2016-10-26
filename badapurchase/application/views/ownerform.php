<div id="maincontainer" style="margin-top:30px;">
 	<div id="product">
    	<div class="container">
    		<div class="row">        
        		<div class="">
         			<div class="checkoutsteptitle"></div>
         				<div class="checkoutstep ">
         				<form class="form-vertical" action="<?php echo site_url('tv/owner_bank_db')?>" method="post" enctype="multipart/form-data">
         				<h6 style="margin-left:40px; color:#880000 ; ">* fields are mandatory</h6>
                        	<div class="ownerdetails" id="owner" >
                            	<h3 class="heading3" style="margin-bottom:10px;">Owner Details </h3><hr>
              						<div class="loginbox">
                  						<div >
                          					<div class="controls" style="margin-bottom:12px;">
                           						<input type="text" name="fname" value="" placeholder="*Firm Name"  style="text-transform: capitalize;" pattern="[a-zA-Z]+" required> &nbsp;&nbsp;
                          			   			<input type="text" name="oname" value="" placeholder="*Firm Owner Name" style="text-transform: capitalize;" pattern="[a-zA-Z]+" required> 
                          					</div>
                        				</div>
                        				
                        				<div>
                  							<div class="controls" style="margin-bottom:12px;">
                                        	<input type="text" name="mno" value="" placeholder="*Mobile Number"  pattern="[\b(7\8\9)]\d{9,9}" required> &nbsp;&nbsp;
                      						<input type="text" name="lno" value="" placeholder="*Landline Number" required > 
                      						</div>
                    					</div>
                        
                                     	<div>
                  							<div class="controls" style="margin-bottom:12px;" >
                                        	<input type="text" name="sno" value="" placeholder="*shop/factory/office No."  required> &nbsp;&nbsp;
                      						
                      						</div>
                    					</div>
                    					
                    					<div>
                  							<div class="controls" style="margin-bottom:12px;"  >
                                        	<textarea placeholder="*Firm Address" name="address" style="width:50%;" required ></textarea>
                      						</div>
                    					</div>
               				 		</div>
            				</div>
           
            
            				
                    			
                    			<div class="bankdetails"  id="bank">
              				 	<h3 class="heading3" style="margin-bottom:10px;">Bank Details </h3><hr>
              						<div class="loginbox">
                  						<div >
                          					<div class="controls" style="margin-bottom:12px;" id="bankname">
                           						<select name="bank"  >
                          							<option disabled selected>*Bank Name</option>
                          							<?php foreach($bankdetails as $row){
		                     						echo "<option value='$row->bank_id'>$row->bank_name</option>";
						 							}?>
                    					   		</select>
                          					</div>
                        				</div>
                        
                     					<div>
                  							<div class="controls" style="margin-bottom:10px;" id="ean">
                      							 <input type="text" name="ean" value="" placeholder="*Enter Account No." style="width:220px;" pattern="[\b(1\0\9)]\d{13,13}" required> 
                      						</div>
                    					</div>
                    
                    					<div>
                    						<div class="controls" style="margin-bottom:10px;" id="ahn" >
                     							<input type="text" name="ahn" value="" placeholder="*Account Holder Name" style="width:220px;"  pattern="[a-zA-Z]+" required> 
                        					</div>
                    					</div>
                    					
                    					<div>
                    						<div class="controls" style="margin-bottom:10px;" id="ifc"  >
                     							 <input type="text" name="ifc" value="" placeholder="*Ifc Code" style="width:220px;" pattern="[\b(1\2\3\4\5\6\7\8\0\9)]\d{5,5}" required> 
                     							  
                        					</div>
                    					</div>
                    					
                    				</div>
                    			
                    			</div>
                    			
                   	 			<div>
                   	 				
                   	 			</div>
                   	 			<input type="submit" Value="Save & Continue" class="btn btn-orange" style="margin-left:40px; width:150px;">
                  			</form>
                  		</div>
            		</div>
            	</div>
            </div>
       </div>
  </div>
	