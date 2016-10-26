<div class="span12" >
<div class="span3"></div>
<div class="span6" id="notification">
<div class="checkoutsteptitle"><h3><span class="maintext">Notification Details</span></h3> <hr>
<table class="table table-striped table-bordered">
<tr>
<th class="image">Sr. no</th>
<th class="name">Notifications</th>
<th class="action">Action</th>
</tr>
<?php
$a=0;
foreach($details as $row)
{	
	$notificationid=$row->notification_id;
	$msg=$row->message;
	 
	 $a=$a+1;
?>

	<tr>
	<td class="image"><?php  echo $a;?> </td>
	
	
	<td class="name"><?php echo $msg ?></td>
	<td class="action"><a href="<?php echo site_url('tv/deletenotification/'.$notificationid) ?>"><img class="tooltip-test" data-original-title="Remove"  src="<?php echo base_url('img/remove.png')?>" alt=""></a></td>
	</tr>
	
<?php }?>
</table>	
<a href="<?php echo site_url('tv/profile')?>" class="btn btn-orange" style="text-decoration:none; width:100%;">Back</a>
</div>


</div>
<div class="span3"></div>  
</div>