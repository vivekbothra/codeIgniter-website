

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class database extends CI_Model 
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();

	}
	
	public function insert()
	{  
		$type=$this->input->post('type');
		
		if($type==2)
			{
				$data['role_id']=2;
			}
			if($type==3)
			{
				$data['role_id']=3;
			}
		
			$data['fname']= $this->input->post('fname');
			$data['lname']= $this->input->post('lname');
			$data['email']= $this->input->post('email');
			$data['password']= md5($this->input->post('password'));
			$data['contact_no']= $this->input->post('contact_no');
			$data['address']= $this->input->post('address');
			$this->db->insert('user_table',$data);
			return;
			
			
	}
	
	public function authenticate()
	{
		$email= $this->input->post('email');
		$password= md5($this->input->post('password'));
		
		 return $this->db->query("select * from user_table where email='$email' and password='$password' ")->result();
		
		
	}
	
	public function get_email($email)
	{
	
		return $this->db->query("select * from user_table where email='$email' ")->result();
	}
	
	public function profile($id)
	{
	
		return $this->db->query("select * from user_table where user_id='$id' ")->result();
	}
	
	public function updatequery($userid)
	{
		$data['fname']= $this->input->post('fname');
		$data['lname']= $this->input->post('lname');
		$data['email']= $this->input->post('email');
		
		$data['contact_no']= $this->input->post('contact_no');
		$data['address']= $this->input->post('address');
	
		$this->db->where('user_id',$userid);
		$this->db->update('user_table',$data);
		return;
	}
	
	public function changepasswordquery($userid)
	{
		$password= md5($this->input->post('npassword'));
		return $this->db->query("update user_table set password='$password' where user_id='$userid' ");
	}
	
	public function upload($userid)
	{
		$dat0a['image']=$this->input->post('user_image');
		$config['upload_path']='./img/';
		$config['max_size']='0';
		$config['allowed_types']='PNG|JPG|png|jpg|gif|jpeg|JPEG';
		$this->load->library('upload',$config);
		$upload=$this->upload->do_upload('user_image');
		$doc=$this->upload->data();
		$data['image']=base_url("img//".$doc['file_name']);
		$this->db->where('user_id',$userid);
		return $this->db->update("user_table",$data);
	}
	
	public function address()
	{
		$data['country']=$this->input->post('country');
		$data['district']=$this->input->post('districts');
		$district=$data['district'];
		if($district=='addnewdistrict')
		{
			$dis['district_name']=$this->input->post('newd');
			$dis['state_id']=$this->input->post('state');
			$this->db->insert('district_table',$dis);
			$dname= $dis['district_name'];
			$result=$this->db->query("select * from district_table where district_name='$dname' ")->result();
			foreach($result as $row)
			$newp['district_id']=$row->district_id;
			$newp['pincode']=$this->input->post('newp');
			$this->db->insert('pincode_table',$newp);
			$newpin=$newp['pincode'];
			$variable= $this->db->query("select * from pincode_table where pincode='$newpin'")->result();
			foreach ($variable as $pin)
				$npinid=$pin->pincode_id;
			$data['district']=$newp['district_id'];
			$data['pincode']=$npinid;
			$data['product_name']= $this->input->post('product_name');
			$data['state']= $this->input->post('state');
			$this->db->insert('product_table',$data);
			return;
			
		}
		else 
		{
			$data['pincode']=$this->input->post('pincode');
			$varpin=$data['pincode'];
			if($varpin=='addnewpincode')
			{
				$array['district_id']=$this->input->post('districts');
				$array['pincode']=$this->input->post('newp');
				$this->db->insert('pincode_table',$array);
				$newpinid=$array['pincode'];
				$newvar=$this->db->query("select * from pincode_table where pincode='$newpinid'")->result();
				
				foreach($newvar as $newpin)
					$newvariable=$newpin->pincode_id;
				$value['country']= $this->input->post('country');
				$value['state']= $this->input->post('state');
				$value['district']=$array['district_id'];
				$value['pincode']=$newvariable;
				//print_r($value);
				$this->db->insert('product_table',$value);
				return;
				
			}
			
			
			$data['state']= $this->input->post('state');
			$data['district']=$this->input->post('districts');
			
			$this->db->insert('product_table',$data);
			return;
		}	
	}
	
		
	
	
public function getstate()
	{
		
		return $this->db->query("select * from state_table ")->result();
	}
	
public function to_district($stateid)
	{
	
		return $this->db->query("select * from district_table where state_id='$stateid' ")->result();
	}
	
    public function to_pincode($districtid)
	{
		return $this->db->query("select * from pincode_table where district_id='$districtid' ")->result();
	
	}
	

	public function getbank()
	{
		return $this->db->query("select * from bank_table ")->result();
	}
	
	public function getcategory()
	{
	
		return $this->db->query("select * from category_table ")->result();
	}
	public function get_subcategory($categoryid)
	{
	
		return $this->db->query("select * from subcategory_table where category_id='$categoryid' ")->result();
	}
	
	public function get_producttype($subcategoryid)
	{
	
		return $this->db->query("select * from producttype_table where subcategory_id='$subcategoryid' ")->result();
	}
	public function get_brand($producttypeid)
	{
	
		return $this->db->query("select * from brand_table where producttype_id='$producttypeid' ")->result();
	}
	
	
	public function suppliername($userid)
	{
					$data['user_id']=$userid;
				    $data['firm_name']=$this->input->post('fname');
					$data['owner_name']=$this->input->post('oname');
					$data['mobile_no']=$this->input->post('mno');
					$data['landline_no']=$this->input->post('lno');
					
					$data['firm_address']=$this->input->post('address');
				$this->db->insert('supplier_name',$data);
					
	
	}
	
	public function supplierbank($userid)
	{
		$data['bank_name']=$this->input->post('bank');
		$data['user_id']=$userid;
		$data['ean']=$this->input->post('ean');
		$data['ahn']=$this->input->post('ahn');
		$data['ifc']=$this->input->post('ifc');
		
		$this->db->insert('bank_details',$data);
		
	
	}

	
public function product($supplierid,$bankid,$size)
	{
		$userid=$this->session->userdata('UserID');
		$data['product_image']=$this->input->post('productimage');
		$config['upload_path']='./img/';
		$config['max_size']='0';
		$config['allowed_types']='PNG|JPG|png|jpg|gif|jpeg|JPEG';
		$this->load->library('upload',$config);
		$upload=$this->upload->do_upload('productimage');
		$doc=$this->upload->data();
		$data['product_image']=base_url("img//".$doc['file_name']);
		$image=$data['product_image'];
		
		$data['supplier_id']=$supplierid;
		$data['bank_id']=$bankid;
		$data['size']=$size;
		$data['userid']=$userid;
		$data['category']=$this->input->post('category');
		$data['subcategory']=$this->input->post('subcategory');
		$data['producttype']=$this->input->post('producttype');
		$data['product_name']=$this->input->post('productname');
		$data['modelno']=$this->input->post('modelno');
		$data['price']=$this->input->post('price');
		$data['offer']=$this->input->post('offer');
		$ptype=$data['producttype'];
		if($ptype=='addnewproduct')
		{
			$dis['producttype_name']=$this->input->post('addproducttype');
			$dis['subcategory_id']=$this->input->post('subcategory');
			$this->db->insert('producttype_table',$dis);
			$dname= $dis['producttype_name'];
			$result=$this->db->query("select *  from producttype_table where producttype_name='$dname' ")->result();
			foreach($result as $row)
				$p['producttype_id']=$row->producttype_id;
			$nb=$p['producttype_id'];
			$data['brand']=$this->input->post('brand');
			$brand=$data['brand'];
			if($brand=='addnewbrand')
			{
				$nbrand['brand_name']=$this->input->post('addnewbrand');
				
				$nbrand['producttype_id']=$nb;
				$this->db->insert('brand_table',$nbrand);
				$nbrandname= $nbrand['brand_name'];
				$result=$this->db->query("select *  from brand_table  where brand_name='$nbrandname' ")->result();
				foreach($result as $row)
					$value['brand']=$row->brand_id;
				$ptype=$nbrand['producttype_id'];
				$value['producttype']=$ptype;
				$value['supplier_id']=$supplierid;
				$value['bank_id']=$bankid;
				$value['size']=$size;
				$value['userid']=$userid;
				$value['product_image']=$image;
				$value['category']=$this->input->post('category');
				$value['subcategory']=$this->input->post('subcategory');
				
				$value['product_name']=$this->input->post('productname');
				$value['modelno']=$this->input->post('modelno');
				$value['price']=$this->input->post('price');
				$value['offer']=$this->input->post('offer');
				$this->db->insert('product_table',$value);
				return;
			}
			else
			{
				$pb=$p['producttype_id'];
				$bn=$data['brand'];
				$second['producttype']=$pb;
				$second['brand']=$bn;
				$second['supplier_id']=$supplierid;
				$second['bank_id']=$bankid;
				$second['size']=$size;
				$second['product_image']=$image;
				$second['category']=$this->input->post('category');
				$second['subcategory']=$this->input->post('subcategory');
				$second['userid']=$userid;
				$second['product_name']=$this->input->post('productname');
				$second['modelno']=$this->input->post('modelno');
				$second['price']=$this->input->post('price');
				$second['offer']=$this->input->post('offer');
				$this->db->insert('product_table',$second);
				
				return;
	
			}
		}
		else
		{
			$data['brand']=$this->input->post('brand');
			$nbrand=$data['brand'];
			if($nbrand=='addnewbrand')
			{
				$nbrandn['brand_name']=$this->input->post('addnewbrand');
				$nbn=$data['producttype'];
				$nbrandn['producttype_id']=$nbn;
				$this->db->insert('brand_table',$nbrandn);
				$nbrandname= $nbrandn['brand_name'];
				$result=$this->db->query("select *  from brand_table where brand_name='$nbrandname' ")->result();
				foreach($result as $row)
				$nvalue['brand']=$row->brand_id;
				$b=$nbrandn['producttype_id'];
				$nvalue['producttype']=$b;
				$nvalue['supplier_id']=$supplierid;
				$nvalue['bank_id']=$bankid;
				$nvalue['size']=$size;
				$nvalue['product_image']=$image;
				$nvalue['category']=$this->input->post('category');
				$nvalue['subcategory']=$this->input->post('subcategory');
				$nvalue['userid']=$userid;
				$nvalue['product_name']=$this->input->post('productname');
				$nvalue['modelno']=$this->input->post('modelno');
				$nvalue['price']=$this->input->post('price');
				$nvalue['offer']=$this->input->post('offer');
				$this->db->insert('product_table',$nvalue);
				return;
			}
			else 
			{
				$this->db->insert('product_table',$data);
				return;
			}
	
		}
		
	}
	
	
	
	public function size($supplierid)
	
	{
	$data1['size1']=$this->input->post('size1');
	$data1['maximumquantity1']=$this->input->post('maximumquantity1');
	$data1['minpurchase1']=$this->input->post('minpurchase1');
	$data1['supplierid']=$supplierid;
	$data1['size2']=$this->input->post('size2');
	$data1['maximumquantity2']=$this->input->post('maximumquantity2');
	$data1['minpurchase2']=$this->input->post('minpurchase2');
	$data1['size3']=	$this->input->post('size3');
	$data1['maximumquantity3']=$this->input->post('maximumquantity3');
	$data1['minpurchase3']=$this->input->post('minpurchase3');
	$data1['size4']=$this->input->post('size4');
	$data1['maximumquantity4']=$this->input->post('maximumquantity4');
	$data1['minpurchase4']=$this->input->post('minpurchase4');
	if(!empty($data1))
	{
		$this->db->insert('size_table',$data1);
		
	}
	
}

public function ownerdetails($userid)
{
	return $this->db->query("select * from supplier_name where user_id='$userid'")->result();
}
	
public function supplierid($userid)
{
	return $this->db->query("select * from supplier_name where user_id='$userid'")->result();
}

public function sizeid($supplierid)
{
	return $this->db->query("select * from size_table WHERE supplierid='$supplierid' order by size_table.size_id desc limit 1")->result();
}

public function bank($userid)
{
	return $this->db->query("select * from bank_details WHERE user_id='$userid'")->result();
}

public function getproductdetails()
{
	return $this->db->query("select * from product_table order by product_table.product_id asc limit 12")->result();
}

public function getproduct($pid)
{
	return $this->db->query("select * from product_table where product_id='$pid'")->result();
}

public function getsubcategorydetails($category)
{
	return $this->db->query("select * from subcategory_table where category_id='$category' ")->result();
}

public function productid($supplierid)
{
	return $this->db->query("select * from product_table WHERE supplier_id='$supplierid' order by product_table.product_id desc limit 1")->result();
}

public function pdetails($productid)
{
	return $this->db->query("select * from product_table where product_id='$productid' ")->result();

}

public function sdetails($sizeid)
{
	return $this->db->query("select * from size_table where size_id='$sizeid' ")->result();
}

public function cdetails($categoryid)
{
	return $this->db->query("select * from category_table where category_id='$categoryid' ")->result();
}

public function scdetails($subcategoryid)
{
	return $this->db->query("select * from subcategory_table where subcategory_id='$subcategoryid' ")->result();
}

public function ptdetails($producttypeid)
{
	return $this->db->query("select * from producttype_table where producttype_id='$producttypeid' ")->result();
}

public function bdetails($brandid)
{
	return $this->db->query("select * from brand_table where brand_id='$brandid' ")->result();
}

public function supplierdetails($supplierid)
{
	return $this->db->query("select * from supplier_name where supplier_id='$supplierid' ")->result();
}

public function relatedproduct($producttypeid)
{
	return $this->db->query("select * from product_table WHERE producttype='$producttypeid' order by product_table.product_id desc limit 4")->result();
}




public function updateproductdetails($pid,$sid)
{
	$data1['size1']=$this->input->post('size1');
	$data1['maximumquantity1']=$this->input->post('maximumquantity1');
	$data1['minpurchase1']=$this->input->post('minpurchase1');
	$data1['size2']=$this->input->post('size2');
	$data1['maximumquantity2']=$this->input->post('maximumquantity2');
	$data1['minpurchase2']=$this->input->post('minpurchase2');
	$data1['size3']=	$this->input->post('size3');
	$data1['maximumquantity3']=$this->input->post('maximumquantity3');
	$data1['minpurchase3']=$this->input->post('minpurchase3');
	$data1['size4']=$this->input->post('size4');
	$data1['maximumquantity4']=$this->input->post('maximumquantity4');
	$data1['minpurchase4']=$this->input->post('minpurchase4');
	if(!empty($data1))
	{

		$this->db->where('size_id',$sid);
		$this->db->update('size_table',$data1);

	}
	
	
    $i['product_image']=$this->input->post('productimage');
    $img= $i['product_image'];
	$config['upload_path']='./img/';
	$config['max_size']='0';
	$config['allowed_types']='PNG|JPG|png|jpg|gif|jpeg|JPEG';
	$this->load->library('upload',$config);
	$upload=$this->upload->do_upload('productimage');
	$doc=$this->upload->data();
	$i['product_image']=base_url("img/".$doc['file_name']);
	$image=$i['product_image'];
	
	$details=$this->db->query("select * from product_table where product_id='$pid' ")->result();
	foreach($details as  $row)
		$pimage=$row->product_image;
	
	$seperateimage=end(explode("/",$pimage));
	
	if (($seperateimage != $img) && (!empty($img)))
	{	
		$data['product_image']=$image;
		
		}
	
	$data['product_name']= $this->input->post('productname');
	$data['modelno']= $this->input->post('modelno');
	$data['price']= $this->input->post('price');
	$data['offer']= $this->input->post('offer');
	
	$this->db->where('product_id',$pid);
	$this->db->update('product_table',$data);

	return;
	
}
public function getlandingpage()
{
	return $this->db->query("select * from product_table order by product_table.product_id desc limit 12")->result();
}

public function get_size($sizeid)
{

	return $this->db->query("select * from size_table where size_id='$sizeid' ")->result();
}

public function reviewinsert($productid)
{
	$data['review']=$this->input->post('review');
	$data['product_id']=$productid;
	$this->db->insert('product_review_table',$data);

}

public function review($pid)
{
	
	return $this->db->query("select * from product_review_table where product_id='$pid' ")-> result();

}

public function sizequantity($pid,$userid,$roleid)
{
	$getproduct=$this->db->query("select * from product_table where product_id='$pid' ")-> result();
	foreach($getproduct as $row)
	{
		$data['product_image']=$row->product_image;
		$data['product_name']=$row->product_name;
		$data['modelno']=$row->modelno;
		$data['price']=$row->price;
	}
		$data['product_id']=$pid;
		$data['user_id']=$userid;
		$data['cart_role']=$roleid;
		$data['quantity']=$this->input->post('quantityinput');
		$data['size']=$this->input->post('selectsize');
		
	 $this->db->insert('shopping_cart_table',$data);
	 

}

public function shoppingcart($userid)
{
	return $this->db->query("select * from shopping_cart_table where user_id='$userid' and cart_role='1' ")-> result();
}

public function wishlist($userid)
{
	return $this->db->query("select * from shopping_cart_table where user_id='$userid' and cart_role='2' ")-> result();
}

public function contactform()
{	
	
		$data['email'] = $this->input->post('email');
		$data['contact_no'] = $this->input->post('contactno');
		$data['message'] = $this->input->post('message');
		$this->db->insert('contact_table',$data);
}

public function sortby1()
{
	return $this->db->query("select * from product_table  order by  product_table.price desc")->result();
}

public function sortby2()
{
	return $this->db->query("select * from product_table  order by  product_table.price asc")->result();
}

public function wishcart($cartid)
{
	
	 $this->db->query("update shopping_cart_table  SET cart_role=1 where cart_id='$cartid' ");
}


public function deletecart($cartid)
{
	
	$this->db->query(" delete from shopping_cart_table where cart_id='$cartid' ");
}

public function updatecart($cartid)
{
	$quantity=$this->input->post('quantity');
	$this->db->query("update shopping_cart_table  SET quantity='$quantity' where cart_id='$cartid' ");
}


public function loadmore($position=0)
{
	$position=$position*6;
	$sql="select * from product_table limit {$position},6;";
	$query=$this->db->query($sql)->result();
	return $query;
}

public function getalluser()
{
	return $this->db->query("select * from user_table where role_id='2' ")->result();
}

public function verifyuser($uid)
{
	
	$this->db->query("update user_table SET is_verified='1' where user_id='$uid' ");
	$data['user_id']=$uid;
	$data['message']="Congrulation!! your account is successfully verified, Enjoy";
	$this->db->insert('notification_table',$data);
}
public function deactivateuser($uid)
{

	$this->db->query("update user_table SET is_verified='2' where user_id='$uid' ");
}	

public function getallproduct()
{
	return $this->db->query("select * from product_table ")->result();
}

public function getuserid($pid)
{
	return $this->db->query("select * from product_table where product_id='$pid' ")->result();
}
public function verifyproduct($pid,$uid,$pname)
{

	$this->db->query("update product_table SET is_verified='1' where product_id='$pid' ");
	$data['user_id']=$uid;
	$data['message']="Congratulations!! Your product: $pname details are successfully verified and uploaded ";
	$this->db->insert('notification_table',$data);
}
public function deleteproduct($pid,$uid,$pname)
{

	$this->db->query(" delete from product_table  where product_id='$pid' ");
	$data['user_id']=$uid;
	$data['message']="Product:$pname is against our T & C, Sorry this product cannot be uploaded";
	$this->db->insert('notification_table',$data);
}

public function alluserdetails($row2)
{
	return $this->db->query("select * from product_table where product_id='$row2' ")->result();
}
public function verifydelete1($pro,$user,$pname)
{
	
	$this->db->query(" update product_table SET is_verified='1' where product_id='$pro' ");
	$data['user_id']=$user;
	$data['message']="Congrulation!! Your Product:$pname details are successfully verified and uploaded";
	$this->db->insert('notification_table',$data);
}

public function verifydelete2($pro,$user)
{

	$this->db->query(" delete from product_table  where product_id='$pro' ");
	$data['user_id']=$userid;
	$data['message']="product details are not trusted, sorry!! uploading not possible";
	$this->db->insert('notification_table',$data);
}

public function verifydeleteuser1($row2)
{

	$this->db->query(" update user_table SET is_verified='1' where user_id='$row2' ");
	$data['user_id']=$row2;
	$data['message']="Congrulation!! your account details are successfully verified,";
	$this->db->insert('notification_table',$data);
}

public function verifydeleteuser2($row2)
{

	$this->db->query("update user_table SET is_verified='2' where user_id='$row2' ");
	
}

public function shippingaddress($userid)
{
	$data['userid']=$userid;
	$data['fname']=$this->input->post('fname');
	$data['lname']=$this->input->post('lname');
	$data['email']=$this->input->post('email');
	$data['mno']=$this->input->post('mno');
	$data['altmno']=$this->input->post('altmno');
	$data['address1']=$this->input->post('address1');
	$data['address2']=$this->input->post('address2');
	$data['city']=$this->input->post('city');
	$data['postcode']=$this->input->post('postcode');
	$data['state']=$this->input->post('state');
	
	$this->db->insert('shipping_table',$data);
	
}

public function selectaddress($userid)
{
	return $this->db->query("select * from shipping_table where userid='$userid'")->result();
}

public function updateaddress($data,$userid)
{
	
	 $this->db->query("update shipping_table  SET fname=$f, lname=$l, email=$e, mno=$m, altmno= $a, address1=$a1, address2=$a2, city=$c, postcode=$p, state=$s where userid='$userid'");
}
public function pcart($userid)
{
 $this->db->query("update shopping_cart_table set cart_role='3' where user_id='$userid' and cart_role='1' ");
}

public function purchasehistory($userid)
{
	return $this->db->query("select * from shopping_cart_table where user_id='$userid' and cart_role='3' ")->result();
}

public function purchasedelete($userid,$cartid)
{
	$this->db->query("delete from shopping_cart_table where user_id='$userid' and cart_id='$cartid' ");
}

public function getp($userid)
{
	return $this->db->query("select * from product_table where userid='$userid' ")->result();
}

public function getc()
{
	return $this->db->query("select * from category_table ")->result();
}

public function gets()
{
	return $this->db->query("select * from subcategory_table ")->result();
}

public function getpr()
{
	return $this->db->query("select * from producttype_table ")->result();
}

public function getb()
{
	return $this->db->query("select * from brand_table ")->result();
}

public function getnotification($userid)
{
	return $this->db->query("select count(user_id) as count from notification_table where user_id='$userid' and is_seen='0' ")->result();
}

public function updateseen($userid)
{
	$this->db->query("update notification_table SET is_seen='1' where user_id='$userid' ");
}

public function getallmessages($userid)
{

	return $this->db->query("select * from notification_table where user_id='$userid' ")->result();
}


public function deletewish($userid)
{
	$this->db->query("delete from shopping_cart_table where user_id='$userid' and cart_role='2' ");
}

public function deleteproductstatus($userid,$pid)
{
	$this->db->query("delete from product_table where userid='$userid' and product_id='$pid' ");
}

public function deletenotification($userid,$notificationid)
{
	$this->db->query("delete from notification_table where user_id='$userid' and notification_id='$notificationid' ");
}

public function cartvalue()
{
	$userid=$this->session->userdata('UserID');
	return $this->db->query("select  sum(quantity*price) as sum from shopping_cart_table where user_id='$userid' and cart_role='1'; ")->result();
}

public function count()
{
	$userid=$this->session->userdata('UserID');
	return $this->db->query("select  count(cart_id) as count from shopping_cart_table where user_id='$userid;' and cart_role='1' ")->result();
}

public function menubar($category,$position=0)
{
	$position=$position*8;
	if($category==1)
{
	return $this->db->query("select * from product_table where category='1' limit {$position},8 ")->result();
}

if($category==2)
{
	return $this->db->query("select * from product_table where category='2' limit {$position},8 ")->result();
}

if($category==3)
{
	return $this->db->query("select * from product_table where category='3' limit {$position},8 ")->result();
}

if($category==4)
{
	return $this->db->query("select * from product_table where category='4' limit {$position},8 ")->result();
}

if($category==5)
{
	return $this->db->query("select * from product_table where category='5' limit {$position},8 ")->result();
}

if($category==6)
{
	return $this->db->query("select * from product_table where category='6' limit {$position},8 ")->result();
}

if($category==7)
{
	return $this->db->query("select * from product_table where category='7' limit {$position},8 ")->result();
}

}

public function allproduct($category)
{
	if($category==1)
	{
		return $this->db->query("select producttype_name,producttype_id from subcategory_table,producttype_table where subcategory_table.subcategory_id=producttype_table.subcategory_id and subcategory_table.category_id='$category' ")->result();
	}
	
	if($category==2)
	{
		return $this->db->query("select producttype_name,producttype_id from subcategory_table,producttype_table where subcategory_table.subcategory_id=producttype_table.subcategory_id and subcategory_table.category_id='$category' ")->result();
	}
	
	if($category==3)
	{
		return $this->db->query("select producttype_name,producttype_id from subcategory_table,producttype_table where subcategory_table.subcategory_id=producttype_table.subcategory_id and subcategory_table.category_id='$category' ")->result();
	}
	
	if($category==4)
	{
		return $this->db->query("select producttype_name,producttype_id from subcategory_table,producttype_table where subcategory_table.subcategory_id=producttype_table.subcategory_id and subcategory_table.category_id='$category' ")->result();
	}
	
	if($category==5)
	{
		return $this->db->query("select producttype_name,producttype_id from subcategory_table,producttype_table where subcategory_table.subcategory_id=producttype_table.subcategory_id and subcategory_table.category_id='$category' ")->result();
	}
	
	if($category==6)
	{
		return $this->db->query("select producttype_name,producttype_id from subcategory_table,producttype_table where subcategory_table.subcategory_id=producttype_table.subcategory_id and subcategory_table.category_id='$category' ")->result();
	}
	
	if($category==7)
	{
		return $this->db->query("select producttype_name,producttype_id from subcategory_table,producttype_table where subcategory_table.subcategory_id=producttype_table.subcategory_id and subcategory_table.category_id='$category' ")->result();

	}
	
}

public function allbrand($category)
{
	if($category==1)
	{
	return $this->db->query("select brand_name,brand_id from subcategory_table,producttype_table,brand_table where subcategory_table.subcategory_id=producttype_table.subcategory_id and producttype_table.producttype_id=brand_table.producttype_id and subcategory_table.category_id='$category' ")->result();
	}
	
	if($category==2)
	{
		return $this->db->query("select brand_name,brand_id from subcategory_table,producttype_table,brand_table where subcategory_table.subcategory_id=producttype_table.subcategory_id and producttype_table.producttype_id=brand_table.producttype_id and subcategory_table.category_id='$category' ")->result();
	}
	
	if($category==3)
	{
		return $this->db->query("select brand_name,brand_id from subcategory_table,producttype_table,brand_table where subcategory_table.subcategory_id=producttype_table.subcategory_id and producttype_table.producttype_id=brand_table.producttype_id and subcategory_table.category_id='$category' ")->result();
	}
	
	if($category==4)
	{
		return $this->db->query("select brand_name,brand_id from subcategory_table,producttype_table,brand_table where subcategory_table.subcategory_id=producttype_table.subcategory_id and producttype_table.producttype_id=brand_table.producttype_id and subcategory_table.category_id='$category' ")->result();
	}
	
	if($category==5)
	{
		return $this->db->query("select brand_name,brand_id from subcategory_table,producttype_table,brand_table where subcategory_table.subcategory_id=producttype_table.subcategory_id and producttype_table.producttype_id=brand_table.producttype_id and subcategory_table.category_id='$category' ")->result();
	}
	
	if($category==6)
	{
		return $this->db->query("select brand_name,brand_id from subcategory_table,producttype_table,brand_table where subcategory_table.subcategory_id=producttype_table.subcategory_id and producttype_table.producttype_id=brand_table.producttype_id and subcategory_table.category_id='$category' ")->result();
	}
	
	if($category==7)
	{
		return $this->db->query("select brand_name,brand_id from subcategory_table,producttype_table,brand_table where subcategory_table.subcategory_id=producttype_table.subcategory_id and producttype_table.producttype_id=brand_table.producttype_id and subcategory_table.category_id='$category' ")->result();
	}
	
}

public function searchall()
{	
	$snoop=$this->input->post('inputsearch');
	$product=$this->db->query("select * from product_table where product_name='$snoop' ")->result();
	if(!empty($product))
	{
		return $product;
	}
	if(empty($product))
	{
		$category=$this->db->query("select * from category_table where category_name='$snoop'")->result();
		if(!empty($category))
		{
		foreach($category as $row)
		{
			$categoryid=$row->category_id;
		}
		$category_product=$this->db->query("select * from product_table where category='$categoryid' ")->result();
		}
		if(!empty($category_product))
		{
			return $category_product;
		}
		if(empty($category_product))
		{
			$sub_category=$this->db->query("select * from subcategory_table where subcategory_name='$snoop'")->result();
			if(!empty($sub_category))
			{
			foreach($sub_category as $row)
			{
				$subcategoryid=$row->subcategory_id;
			}
			$subcategory_product=$this->db->query("select * from product_table where subcategory='$subcategoryid'")->result();
			if(!empty($subcategory_product))
			{
				return $subcategory_product;
			}
			}
			if(empty($subcategory_product))
			{
				$producttype=$this->db->query("select * from producttype_table where producttype_name='$snoop'")->result();
				if(!empty($producttype))
				{
				foreach($producttype as $row)
				{
					$producttypeid=$row->producttype_id;
				}
				$producttype_product=$this->db->query("select * from product_table where producttype='$producttypeid'")->result();
				if(!empty($producttype_product))
				{
					return $producttype_product;
				}
				}
				if(empty($producttype_product))
				{
					$brand=$this->db->query("select * from brand_table where brand_name='$snoop'")->result();
					if(!empty($brand))
					{
					foreach($brand as $row)
					{
						$brandid=$row->brand_id;
					}
					$brand_product=$this->db->query("select * from product_table where brand='$brandid'")->result();
					if(!empty($brand_product))
					{
						return $brand_product;
					}
					}
				}
			}
		}
	}
					
}

public function forgetpassword()
{	
	$email=$this->input->post('email');
	return $this->db->query("select password from user_table where email='$email' ")->result();
}

public function search1($position=0)
{
	$position=$position*12;
	$producttypename=$this->input->post('search1');
	 $producttype=$this->db->query("select * from producttype_table where producttype_name='$producttypename' limit {$position},12 ")->result();
	 if(!empty($producttype))
	 {
	 foreach($producttype as $row)
	 	$producttypeid=$row->producttype_id;
	return $this->db->query("select * from product_table where producttype='$producttypeid' ")->result();
	 }
}


public function search2()
{
	$brandname=$this->input->post('search2');
	$brand_id=$this->db->query("select * from brand_table where brand_name='$brandname' ")->result();
	if(!empty($brand_id))
	{
		foreach($brand_id as $row)
			$brandid=$row->brand_id;
	return $this->db->query("select * from product_table where brand='$brandid' ")->result();
	}
}

	public function get_category_id($var)
	{
		 $cat_id=$this->db->query("select * from category_table where category_name='$var' ")->result();
		 foreach($cat_id as $row)
		 	$catid=$row->category_id;
		 return $catid;
	}

}