<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tv extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		
		$this->load->model('database');
		$this->load->library('session');
		
		$this->no_cahce();
	}
	
	public function no_cahce()
	{
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	}
	
	public function index($msg=null)
	{	
		
		$cart=$this->database->cartvalue();
		$count=$this->database->count();
		$data['cart']=$cart;
		$data['count']=$count;
		$data['msg']=urldecode($msg);
		$userid=$this->session->userdata('UserID');
		$data['landingdetails']=$this->database->getlandingpage();
		$data['userid']=$userid;
		$data['data']=$this->database->profile($userid);
		$data['var']="home";
		
		$this->load->view('header',$data);
		$this->load->view('header1');
		$this->load->view('index');
		$this->load->view('footer');
		$this->load->view('footer2');
	
		
	}
	
	public function checkout()
	{
		$userid=$this->session->userdata('UserID');
		
		$data['userid']=$userid;
		$data['data']=$this->database->profile($userid);
		if(!empty($userid))
		{
		$data['address']=$this->database->selectaddress($userid);
		$cart=$this->database->cartvalue();
		$count=$this->database->count();
		$data['cart']=$cart;
		$data['count']=$count;
		$data['var']=null;
		$this->load->view('header',$data);
		$this->load->view('header1');
		$this->load->view('checkout');
		$this->load->view('footer2');
		}
		else
		{
			redirect('tv/register');
		}
	}
	
	
	public function register($msg=null,$pid=null,$var=null)
	{
	
		$data['msg']=urldecode($msg);
		$data['pid']=$pid;
		$data['var']=$var;
		$this->load->view('header',$data);		
		$this->load->view('register');
		$this->load->view('footer');
		$this->load->view('footer2');
	}
	
	public function insert($pid=null)
	{
	$type=$this->input->post('type');
		if(($type==2) || ($type==3))
		{
			$mvalue= $this->input->post('password');
			$cvalue= $this->input->post('cpassword');
			if (($mvalue)==($cvalue))
			{
				
				$fname=$this->input->post('fname');
				$email=$this->input->post('email');
				$contact_no=$this->input->post('contact_no');
				$address=$this->input->post('address');
				if(!empty($fname)&&(!empty($contact_no))&&(!empty($address))&&(!empty($email)&&(!empty($mvalue))))
				{
					$details=$this->database->get_email($email);
				if(empty($details))
				{
					$this->database->insert();
					$msg=urlencode("Registration&nbspSuccessful");
					redirect('tv/register/'.$msg.'/'.$pid);
					
				}
				else
				{
					$msg=urlencode("Email&nbspAlready&nbspExists");
					redirect('tv/register/'.$msg);
				}
				
				}
				else
				{
					$msg=urlencode("Please&nbspFill&nbspAll&nbspThe&nbspDetails");
					redirect('tv/register/'.$msg);
				}
			}
			else 
			{
				echo "<script> alert('Password And Confirm Password mismatch');
				history.go(-1);</script>";
			}
		}
		
				else
				{
					$msg=urlencode("Please&nbspSelect&nbspRegistration&nbspType");
					redirect('tv/register/'.$msg);
				}
	}
	
	public function authenticate($pid=null)
 		{
			$get=$this->database->authenticate();
			
			if(!empty($get))
			{
				foreach($get as $row)
				{
					$uid=$row->user_id;
					$rid=$row->role_id;
					$is_verified=$row->is_verified;
				}
				
				if($is_verified==1)
					{
						echo "successfully logined";
						$this->session->set_userdata('UserID',$uid);
						$this->session->set_userdata('RoleID',$rid);
						if(!empty($pid))
						{
							redirect('tv/product/'.$pid);
						}
						else
						{
							$userid=$this->session->userdata('UserID');
							redirect('tv/landingpage');
							
						}
					}
				else 
					
					{
						$msg=urlencode("Your&nbspAccount&nbspIs&nbspNot&nbspVerified");
						redirect('tv/register/'.$msg);
					}
				}
				
				else 
					{
						$msg=urlencode("Incorrect&nbspEmail&nbspOr&nbspPassword");
						redirect('tv/register/'.$msg);
					}
	
	
	
			}
	
	public function profile($msg=null,$var=null)
	{
		$userid=$this->session->userdata('UserID');
		$roleid=$this->session->userdata('RoleID');
		$vars['msg']=urldecode($msg);
	
		if(!empty($userid))
		{	
				$vars['var']=$var;
				$vars['userid']=$userid;
				$vars['data']=$this->database->profile($userid);
				$vars['getalluser']=$this->database->getalluser();
				$vars['getallproduct']=$this->database->getallproduct();
				$vars['purchasehistory']=$this->database->purchasehistory($userid);
				$vars['product']=$this->database->getp($userid);
				$vars['category']=$this->database->getc();
				$vars['subcategory']=$this->database->gets();
				$vars['producttype']=$this->database->getpr();
				$vars['brand']=$this->database->getb();
				$vars['notify']=$this->database->getnotification($userid);
				$cart=$this->database->cartvalue();
				$count=$this->database->count();
				$vars['cart']=$cart;
				$vars['count']=$count;
				$this->load->view('header',$vars);
				$this->load->view('sidebar');
				$this->load->view('profile');
				$this->load->view('footer');
				
			
		}
			else 
			redirect('tv/register');
		
		
	}
	
	
	
	public function updatequery()
	{
		$userid=$this->session->userdata('UserID');
		
		if(!empty($userid))
		{
		$this->database->updatequery($userid);
		}
		$msg=urlencode("Profile&nbspUpdated&nbspSuccesfully");
		redirect('tv/profile/'.$msg);
	}
	
	
	public function changepasswordquery()
	{
		$userid=$this->session->userdata('UserID');
		$mvalue= $this->input->post('password');
		$cvalue= $this->input->post('cpassword');
	if (($mvalue)==($cvalue))
		{
			if(!empty($userid))
			{
			$this->database->changepasswordquery($userid);
			$msg=urlencode("Password&nbspChanged&nbspSuccesfully");
			redirect('tv/profile/'.$msg);
			}
			else 
			{
				$msg=urlencode("Stay&nbspAway");
				redirect('tv/landingpage/'.$msg);
			}	
		}
		else 
		{
			echo "<script> alert('Password And Confirm Password mismatch');
			history.go(-1);</script>";
		}
	}
	
public function upload_img()
	{
		$userid=$this->session->userdata('UserID');
		if(!empty($userid))
		{
		$this->database->upload($userid);
		}
		redirect('tv/profile/');
	}

	
	
	public function addressinsert()
	{
		$this->database->address();
	
	}
	
	public function uploadaddress()
	{
		$this->load->view('header');
		$data['statedetails']=$this->database->getstate();
		$this->load->view('address',$data);
		$this->load->view('footer2');
	}
	
	public function logout ()
	{
		
		$this->session->sess_destroy();
		$msg=urlencode("Logged&nbspOut&nbspSuccessfully");
		redirect('tv/landingpage/'.$msg);
		
	}
	public function to_district()
	{
		$stateid=$this->input->post('state');
		$district = $this->database->to_district($stateid);
		$output = "<option selected disabled>Select District</option>";
		foreach ($district as $row)
		{	
			 $output.="<option value='$row->district_id'>$row->district_name</option>";
		}
		
		$output.="<option value='addnewdistrict'>Add New District</option>";
		echo $output;
	}
	
	public function to_pincode()
	{
		$districtid = $this->input->post('districts');
		$pincode = $this->database->to_pincode($districtid);
		$output = "<option selected disabled>Select pincode</option>";
		foreach ($pincode as $row)
		{
			$output .= "<option value='{$row->pincode_id}'>{$row->pincode}</option>";
		}
		$output.="<option value='addnewpincode'>Add New pincode</option>";
		echo $output;
	}
	
	public function get_subcategory()
	{
		$categoryid = $this->input->post('category');
		$subcategory = $this->database->get_subcategory($categoryid);
		$output = "<option selected disabled>Select SubCategory</option>";
		foreach ($subcategory as $row){
			$output .= "<option value='{$row->subcategory_id}'>{$row->subcategory_name}</option>";
		}
			
		echo $output;
	
	}
	
	public function get_producttype()
	{
		$subcategoryid = $this->input->post('subcategory');
		$producttype = $this->database->get_producttype($subcategoryid);
		$output = "<option selected disabled>Select Product Type</option>";
		foreach ($producttype as $row){
			$output .= "<option value='{$row->producttype_id}'>{$row->producttype_name}</option>";
		}
	
		$output .= "<option value='addnewproduct' > add new producttype </option>";
			
		echo $output;
	
	}
	
	public function get_brand()
	{
		$producttypeid = $this->input->post('producttype');
		$brand = $this->database->get_brand($producttypeid);
		$output = "<option selected disabled>Select Brand</option>";
		foreach ($brand as $row){
			$output .= "<option value='{$row->brand_id}'>{$row->brand_name}</option>";
		}
	
		$output .= "<option value='addnewbrand' > add new brand </option>";
			
		echo $output;
	
	}
	
	
	public function productdatabase()
	{
		$userid=$this->session->userdata('UserID');
		if(!empty($userid))
		{
			$sid=$this->database->supplierid($userid);
			foreach($sid as $row)
				$supplierid=$row->supplier_id;
			
			$bid=$this->database->bank($userid);
			foreach($bid as $row)
				$bankid=$row->bank_id;
			
			$this->database->size($supplierid);
			
			$id=$this->database->sizeid($supplierid);
			foreach($id as $row)
				$size=$row->size_id;
			
			
			$this->database->product($supplierid,$bankid,$size);
			
			
				redirect('tv/afterproductupload');
			
		}
	}
	
	public function owner_bank_reg($var=null)
	{
		$userid=$this->session->userdata('UserID');
		if(!empty($userid))
		{
			$cart=$this->database->cartvalue();
			$count=$this->database->count();
			$data['cart']=$cart;
			$data['count']=$count;
			$data['userid']=$userid;
			$data['$var']=$var;
			$data['data']=$this->database->profile($userid);
			$data['bankdetails']=$this->database->getbank();
			$this->load->view('header',$data);
			$this->load->view('ownerform');
			$this->load->view('footer2');
				
		}
		else
			redirect('tv/register');
	
	}

	
	public function owner_bank_db()
	{
		$userid=$this->session->userdata('UserID');
		if(!empty($userid))
		{
			$this->database->suppliername($userid);
			$this->database->supplierbank($userid);
			redirect('tv/productform');
		}
	
	}
	
	public function productform($var=null)
	{
		$userid=$this->session->userdata('UserID');
		if(!empty($userid))
		{	
			$cart=$this->database->cartvalue();
			$count=$this->database->count();
			$data['cart']=$cart;
			$data['count']=$count;
			$data['userid']=$userid;
			$data['var']=$var;
			$data['data']=$this->database->profile($userid);
			$ownerdetails=$this->database->ownerdetails($userid);
			if(!empty($ownerdetails))
			{
				foreach($ownerdetails as $row)
				{
					$firmname=$row->firm_name;
					$ownername=$row->owner_name;
					$mobileno=$row->Mobile_no;
					$landlineno=$row->landline_no;
					$firmaddress=$row->firm_address;
						
				}
				if(!empty($firmname) && ($ownername) && ($mobileno)&& ($landlineno) &&  ($firmaddress))
				{
					$data['categorydetails']=$this->database->getcategory();
	
					$this->load->view('header',$data);
					$this->load->view('productform');
					$this->load->view('footer2');
				}
				else
				{
					redirect('tv/owner_bank_reg');
				}
			}
			else
			{
				redirect('tv/owner_bank_reg');
			}
		}
		else
			redirect('tv/register');
	}
	
	public function afterproductupload($var=null)
	{	
			$data['var']=$var;
			$userid=$this->session->userdata('UserID');
			$data['userid']=$userid;
			$data['data']=$this->database->profile($userid);
			$cart=$this->database->cartvalue();
			$count=$this->database->count();
			$data['cart']=$cart;
			$data['count']=$count;
			$this->load->view('header',$data);
			$this->load->view('afterproductupload');
			$this->load->view('footer2');
			
	}
	
	public function editproductdetails($var=null)
	{
		$userid=$this->session->userdata('UserID');
		if(!empty($userid))
		{
			$cart=$this->database->cartvalue();
			$count=$this->database->count();
			$data['var']=$var;
			$data['cart']=$cart;
			$data['count']=$count;
			$data['userid']=$userid;
			$data['data']=$this->database->profile($userid);
			$sid=$this->database->supplierid($userid);
			foreach($sid as $row)
				$supplierid=$row->supplier_id;
	
			$get=$this->database->productid($supplierid);
			foreach($get as $row)
			{
				$productid=$row->product_id;
				$sizeid=$row->size;
				$categoryid=$row->category;
				$subcategoryid=$row->subcategory;
				$producttypeid=$row->producttype;
				$brandid=$row->brand;
			}
			$this->session->set_userdata('ProductID',$productid);
			$data['productdetails']=$this->database->pdetails($productid);
			$data['sizedetails']=$this->database->sdetails($sizeid);
			$data['categorydetails']=$this->database->cdetails($categoryid);
			$data['subcategorydetails']=$this->database->scdetails($subcategoryid);
			$data['producttypedetails']=$this->database->ptdetails($producttypeid);
			$data['branddetails']=$this->database->bdetails($brandid);
			$this->load->view('header',$data);
			$this->load->view('editproductdetails');
			$this->load->view('footer2');
			
		}
	}
	
	public function updateproductdetails()
	{
		$pid=$this->session->userdata('ProductID');
		$productdetails=$this->database->pdetails($pid);
		foreach($productdetails as $row)
		{
			$sid=$row->supplier_id;
		}
		$this->database->updateproductdetails($pid,$sid);
		redirect('tv/profile');
		
	}
	
	public function productui($var=null)
	{	
		$cart=$this->database->cartvalue();
		$count=$this->database->count();
		$data['cart']=$cart;
		$data['count']=$count;
		$userid=$this->session->userdata('UserID');
		$data['userid']=$userid;
		$data['data']=$this->database->profile($userid);
		$data['hide']='123456';
		$data['productdetails']=$this->database->searchall();
		
		$data['var']=$var;
		$data['categorydetails']='';
		$this->load->view('header',$data);
		$this->load->view('header1');
		$this->load->view('category');
		$this->load->view('footer');
		$this->load->view('footer2');
		
	
	}
	public function landingpage($msg=null)
	{	
		$cart=$this->database->cartvalue();
		$count=$this->database->count();
		$data['cart']=$cart;
		$data['count']=$count;
		$data['msg']=urldecode($msg);
		$userid=$this->session->userdata('UserID');
		$data['landingdetails']=$this->database->getlandingpage();
		$data['userid']=$userid;
		$data['data']=$this->database->profile($userid);
		$data['var']="home";
		
		$this->load->view('header',$data);
		$this->load->view('header1');
		$this->load->view('index');
		$this->load->view('footer');
		$this->load->view('footer2');
		
	}
	
	public function product($pid,$msg=null)
	{	
		$userid=$this->session->userdata('UserID');
		$data['userid']=$userid;
		$data['msg']=urldecode($msg);
		$data['data']=$this->database->profile($userid);
		$cart=$this->database->cartvalue();
		$count=$this->database->count();
		$data['cart']=$cart;
		$data['count']=$count;
		
		$productdetails=$this->database->getproduct($pid);
		if(!empty($productdetails))
		{
			foreach($productdetails as $row)
			{
				$categoryid=$row->category;
				$subcategoryid=$row->subcategory;
				$producttypeid=$row->producttype;
				$brandid=$row->brand;
				$sizeid=$row->size;
				$supplierid=$row->supplier_id;
			}
		$data['productdetails']=$productdetails;
		$data['reviewdetails']=$this->database->review($pid);
		$data['sizedetails']=$this->database->sdetails($sizeid);
		$data['categorydetails']=$this->database->cdetails($categoryid);
		$data['subcategorydetails']=$this->database->scdetails($subcategoryid);
		$data['producttypedetails']=$this->database->ptdetails($producttypeid);
		$data['branddetails']=$this->database->bdetails($brandid);
		$data['suppliertails']=$this->database->supplierdetails($supplierid);
		$data['relateddetails']=$this->database->relatedproduct($producttypeid);
		$cart=$this->database->cartvalue();
		$count=$this->database->count();
		$data['cart']=$cart;
		$data['count']=$count;
		$data['uid']=$userid;
		$data['var']="null";
		$this->load->view('header',$data);
		
		$this->load->view('header1');
		$this->load->view('product');
		$this->load->view('footer2');
	}
	else
		redirect('tv/error');
		
	}
	
	public function get_size($sizeid)
	{
		$size = $this->input->post('selectsize');
		$data['abcsize']=$size;
		$sizedetails=$this->database->sdetails($sizeid);
		foreach($sizedetails as $row)
		{
			$size1=$row->size1;
			$size2=$row->size2;
			$size3=$row->size3;
			$size4=$row->size4;
		}
	
		if($size1==$size)
		{
			$minmax1 = $this->database->get_size($sizeid);
			foreach($minmax1 as $row)
			{
				$maxquantity=$row->maximumquantity1;
				$minpurchase=$row->minpurchase1;
			}
			$output= "<h6>Maximum Units Available : $maxquantity Units</h6>";
			$output .= "<h6>Minimum Units Purchase : $minpurchase Units</h6>";
		}
		if($size2==$size)
		{
			$minmax2 = $this->database->get_size($sizeid);
			foreach($minmax2 as $row)
			{
				$maxquantity=$row->maximumquantity2;
				$minpurchase=$row->minpurchase2;
			}
			$output= "<h6>Maximum Units Available : $maxquantity Units</h6>";
			$output .= "<h6>Minimum Units Purchase : $minpurchase Units</h6>";
	
		}
		if($size3==$size)
		{
			$minmax3 = $this->database->get_size($sizeid);
			foreach($minmax3 as $row)
			{
				$maxquantity=$row->maximumquantity3;
				$minpurchase=$row->minpurchase3;
			}
			$output= "<h6>Maximum Units Available : $maxquantity Units</h6>";
			$output .= "<h6>Minimum Units Purchase : $minpurchase Units</h6>";
	
		}
		if($size4==$size)
		{
			$minmax4 = $this->database->get_size($sizeid);
			foreach($minmax4 as $row)
			{
				$maxquantity=$row->maximumquantity4;
				$minpurchase=$row->minpurchase4;
			}
			$output= "<h6>Maximum Units Available : $maxquantity Units</h6>";
			$output .= "<h6>Minimum Units Purchase : $minpurchase Units</h6>";
	
		}
	
		echo $output;
	}
	
	public function reviewinsert($productid)
	{
		$this->database->reviewinsert($productid);
		$msg=urlencode("Review&nbspInserted&nbspSuccessfully");
		redirect('tv/product/'.$productid.'/'.$msg);
	}
	
	public function review($pid)
	{
		$reviewdetails=$this->database->review($pid);
		redirect('tv/product/'.$pid);
	}
	
	public function sizequantity($pid)
	{	
		$userid=$this->session->userdata('UserID');
		if(!empty($userid))
		{
			if($this->input->post('addtocart')==true)
			{
				$roleid=1;
				$this->database->sizequantity($pid,$userid,$roleid);
			}
			elseif ($this->input->post('addtowishlist')==true)
			{
				$roleid=2;
				$this->database->sizequantity($pid,$userid,$roleid);
			}
			elseif ($this->input->post('addtocompare')==true)
			{
			
			}
		redirect('tv/product/'.$pid);
		}
		else
		{
			$msg=urlencode("Please&nbspLog&nbspIn&nbspTo&nbspContinue");
			redirect('tv/register/'.$msg.'/'.$pid);
		}
	}
	
	public function shoppingcart($cart=null)
	{
		$userid=$this->session->userdata('UserID');
		
		$data['userid']=$userid;
		$data['data']=$this->database->profile($userid);
		$cart1=$this->database->cartvalue();
		$count=$this->database->count();
		$data['cart']=$cart1;
		$data['count']=$count;
		if(!empty($userid))
		{
		$data['cartdetails']=$this->database->shoppingcart($userid);
		$data['confirmcart']=$cart;
		$data['var']=null;
		$this->load->view('header',$data);
		$this->load->view('header1');
		$this->load->view('shoppingcart');
		$this->load->view('footer');
		}
		else if(!empty($pid))
		{
			redirect('tv/product/'.$pid);
		}
		else
		{
			$msg=urlencode("It's&nbspEmpty&nbspPlease&nbspBuy&nbspSomething");
			redirect('tv/landingpage/'.$msg);
		}
	}
	
	public function contact($var=null)
	{
		$userid=$this->session->userdata('UserID');
		$data['userid']=$userid;
		$data['data']=$this->database->profile($userid);
		
		$cart=$this->database->cartvalue();
		$count=$this->database->count();
		$data['cart']=$cart;
		$data['count']=$count;
		$data['var']=$var;
		$this->load->view('header',$data);
		$this->load->view('contact');
		$this->load->view('footer');
		$this->load->view('footer2');
	}
	
	public function contactsubmit()
	{
		
		$this->database->contactform();
		$msg=urlencode("Message&nbspSent&nbspSuccessfully");
		redirect('tv/landingpage/'.$msg);
		
		
	}
	
	public function wishlist($msg=null,$var=null)
	{
		$userid=$this->session->userdata('UserID');
		
		$data['userid']=$userid;
		$data['msg']=$msg;
		$data['data']=$this->database->profile($userid);
		$cart=$this->database->cartvalue();
		$count=$this->database->count();
		$data['cart']=$cart;
		$data['count']=$count;
		$data['var']=$var;
		if(!empty($userid))
		{
			$data['cartdetails']=$this->database->wishlist($userid);
			$data['var']=null;
			$this->load->view('header',$data);
			$this->load->view('header1');
			$this->load->view('wishlist');
			$this->load->view('footer');
			$this->load->view('footer2');
		}
	}
	public function wishcart($cartid)
	{
		
		$this->database->wishcart($cartid);	
		redirect('tv/wishlist');
	}
	public function deletecart($cartid)
	{
		$this->database->deletecart($cartid);
		redirect('tv/shoppingcart');
	}
	
	public function updatecart($cartid)
	{
		
		

		$this->database->updatecart($cartid);
		redirect('tv/shoppingcart');
	}
	
	public function confirmorder()
	{
		redirect('tv/shoppingcart');
	}
	
	public function loadmore($category)
	{
			
		$position = $this->input->post('position');
		$load=$this->database->menubar($category,$position);
		
		
		$output = "";
		$output .="<div id='containerloadmore'>";
		$output .="<section id='categorygrid'>";
		$output = "<ul class='thumbnails grid'>";
		
		 foreach($load as $row)
		{
			$productid=$row->product_id;
			$productname=$row->product_name;
			$productimage=$row->product_image;
			$price=$row->price;
		
			
		                    $output .= "<li class='span2 '>";
		                      $output .= " <a class=' prdocutname ' href='tv/product/'.$productid> $productname</a>";
		                       $output .= " <div class='thumbnail'>";
		                         $output .= " <span class='sale tooltip-test'>Sale</span>";
		                       $output .= " <a href='tv/product/'.$productid><img  style='width:200px;height:200px;' src=' $productimage'></a>";
		                       
		                        $output .= "  <div class='pricetag' style='margin-left:-85px;'>";
		                         
		                         $output .= "  <div class='price'>";
		                           $output .= "  <div class='pricenew'> Rs&nbsp; $price</div>";
		                            $output .= "</span><a href='tv/product/'.$productid class='' style='margin-right:-20px;'>ADD TO CART</a>";
		                         $output .= " </div>";
		                      $output .= "  </div>";
		                     $output .= " </div>";
		                   $output .= " </li>";
		                   
			}
			$output .= "  </ul>";
			$output .= " </section>";
			
			$output .= " </div>";
			
			
			$output = $output == "" ? "error":$output;
			echo $output;
	}
	
	public function verifyuser($uid)
	{
		$this->database->verifyuser($uid);
		redirect('tv/profile');
	}
	
	public function deactivateuser($uid)
	{
		$this->database->deactivateuser($uid);
		redirect('tv/profile');
	}
	
	public function verifyproduct($pid)
	{	
		$u=$this->database->getuserid($pid);
		foreach($u as $row)
		{
			$uid=$row->userid;
		}
		$p=$this->database->getproduct($pid);
		foreach($p as $pow)
		{
			$pname=$pow->product_name;
		}
		$this->database->verifyproduct($pid,$uid,$pname);
		redirect('tv/profile');
	}
	
	public function deleteproduct($pid)
	{
		
		$u=$this->database->getuserid($pid);
		foreach($u as $row)
		{
			$uid=$row->userid;
		}
		$p=$this->database->getproduct($pid);
		foreach($p as $pow)
		{
			$pname=$pow->product_name;
		}
		$this->database->deleteproduct($pid,$uid,$pname);
		redirect('tv/profile');
	}
	
	public function verifydelete()
	{
		
		if($this->input->post('verifyall')==true)
		{	
			$data=$this->input->post('verify');
			foreach ($data as $row2)
			{
				$da=$this->database->alluserdetails($row2);
				foreach($da as $ad){
					$pro=$ad->product_id;
					$user=$ad->userid;
					$pname=$ad->product_name;
				}
				$this->database->verifydelete1($pro,$user,$pname);
			}
			redirect('tv/profile');
			
			
		}
		if ($this->input->post('deleteall')==true)
		{
		$data=$this->input->post('verify');
			foreach ($data as $row2)
			{
				$da=$this->database->alluserdetails($row2);
				foreach($da as $ad){
					$pro=$ad->product_id;
					$user=$ad->userid;
				}
				$this->database->verifydelete2($pro,$user);
			}
			
		}
		redirect('tv/profile');
		
	}
	
	public function verifydeleteuser()
	{
	
		if($this->input->post('verifyall')==true)
		{
			$data=$this->input->post('verify');
			foreach ($data as $row2)
			{
				$this->database->verifydelete1($row2);
			}
			redirect('tv/profile');
	
	
		}
		if ($this->input->post('deleteall')==true)
		{
			$data=$this->input->post('verify');
			foreach ($data as $row2)
			{
				$this->database->verifydelete2($row2);
			}
	
		}
		redirect('tv/profile');
	
	}
	
	public function shippingaddress()
	{
		$userid=$this->session->userdata('UserID');
		$cart=$this->database->cartvalue();
		$count=$this->database->count();
		$data['cart']=$cart;
		$data['count']=$count;
		if(!empty($userid))
		{
			
		
		$this->database->shippingaddress($userid);
		$cart='1';
		redirect('tv/shoppingcart/'.$cart);
		}
		
	}
	
	public function updateaddress()
	{
		$userid=$this->session->userdata('UserID');
		$cart=$this->database->cartvalue();
		$count=$this->database->count();
		$data['cart']=$cart;
		$data['count']=$count;
		if(!empty($userid))
		{
		
			$fname=$this->input->post('fname');
			$lname=$this->input->post('lname');
			$email=$this->input->post('email');
			$mno=$this->input->post('mno');
			$altmno=$this->input->post('altmno');
			$address1=$this->input->post('address1');
			$address2=$this->input->post('address2');
			$city=$this->input->post('city');
			$postcode=$this->input->post('postcode');
			$state=$this->input->post('state');
			
			if (!empty($fname) || ($lname) || ($email) || ($mno) || ($altmno) || ($address1) || ($address2) || ($city) || ($postcode) || ($state))
			{
				$data['f']=$fname;
				$data['l']=$lname;
				$data['e']=$email;
				$data['m']=$mno;
				$data['a']=$altmno;
				$data['a1']=$address1;
				$data['a2']=$address2;
				$data['c']=$city;
				$data['p']=$postcode;
				$data['s']=$state;
				
				$this->databse->upadateaddress($data,$userid);
				
			}
			$cart='1';
			redirect('tv/shoppingcart/'.$cart);
				
		}
		
	}
	
	public function payment($var=null)
	{
		$userid=$this->session->userdata('UserID');
	
		$data['userid']=$userid;
		$data['data']=$this->database->profile($userid);
		$cart=$this->database->cartvalue();
		$count=$this->database->count();
		$data['cart']=$cart;
		$data['count']=$count;
		$data['var']=$var;
		if(!empty($userid))
		{
			$this->load->view('header',$data);
			
			$this->load->view('payment');
			$this->load->view('footer2');
		}
		
	}
	
	public function phistory()
	{
		$userid=$this->session->userdata('UserID');
		if(!empty($userid))
		{
		$this->database->pcart($userid);
		}
		redirect('tv/index');
	}
	
	public function purchasedelete($cartid)
	{
		$userid=$this->session->userdata('UserID');
		if(!empty($userid))
		{
			$purchasedelete=$this->database->purchasedelete($userid,$cartid);
			redirect('tv/profile');
		}
	}
	
	
	
	public function notification($var=null)
	{
		$userid=$this->session->userdata('UserID');
		$data['var']=$var;
		$data['userid']=$userid;
		$data['data']=$this->database->profile($userid);
		$cart=$this->database->cartvalue();
		$count=$this->database->count();
		$data['cart']=$cart;
		$data['count']=$count;
		if(!empty($userid))
		{
			$this->database->updateseen($userid);
			$data['details']=$this->database->getallmessages($userid);
				
			$this->load->view('header',$data);
			$this->load->view('notification');
				
				
		}
	
	}
	
	public function deletewish()
	{
		$userid=$this->session->userdata('UserID');
		if(!empty($userid))
		{
			$this->database->deletewish($userid);
			$msg=urlencode("Wish&nbspdeleted&nbspSuccesfully");
			redirect('tv/wishlist/'.$msg);
		}
	
	}
	
	public function deleteproductstatus($pid)
	{
		$userid=$this->session->userdata('UserID');
		if(!empty($userid))
		{
			$this->database->deleteproductstatus($userid,$pid);
			$msg=urlencode("Product&nbspdeleted&nbspSuccesfully");
		redirect('tv/profile/'.$msg);
		}
	
	}
	
	public function deletenotification($notificationid)
	{
		$userid=$this->session->userdata('UserID');
		if(!empty($userid))
		{
			$this->database->deletenotification($userid,$notificationid);
			$msg=urlencode("Notification&nbspDeleted&nbspSuccesfully");
			redirect('tv/profile/'.$msg);
		}
	
	}
	
	public function agriculture()
	{
		$cart=$this->database->cartvalue();
		$count=$this->database->count();
		$data['cart']=$cart;
		$data['count']=$count;
		$userid=$this->session->userdata('UserID');
		$data['userid']=$userid;
		$data['data']=$this->database->profile($userid);
		$category='1';
		$data['productdetails']=$this->database->menubar(1);
		$data['category']=$category;
		$data['var']="agriculture";
		$data['categorydetails']=$this->database->getsubcategorydetails($category);
		$data['agricultureproduct']=$this->database->allproduct($category);
		$data['allbrand']=$this->database->allbrand($category);
		$this->load->view('header',$data);
		$this->load->view('header1');
		$this->load->view('category');
		$this->load->view('footer');
		$this->load->view('footer2');
	}
	
	public function clothing()
	{
		$cart=$this->database->cartvalue();
		$count=$this->database->count();
		$data['cart']=$cart;
		$data['count']=$count;
		$userid=$this->session->userdata('UserID');
		$data['userid']=$userid;
		$data['data']=$this->database->profile($userid);
		$data['productdetails']=$this->database->menubar(2);
		$category='2';
		$data['var']="clothing";
		$data['categorydetails']=$this->database->getsubcategorydetails($category);
		$data['agricultureproduct']=$this->database->allproduct($category);
		$data['allbrand']=$this->database->allbrand($category);
		$data['category']=$category;
		$this->load->view('header',$data);
		$this->load->view('header1');
		$this->load->view('category');
		$this->load->view('footer');
		$this->load->view('footer2');
	}
	
	public function electronics()
	{
		$cart=$this->database->cartvalue();
		$count=$this->database->count();
		$data['cart']=$cart;
		$data['count']=$count;
		$userid=$this->session->userdata('UserID');
		$data['userid']=$userid;
		$data['data']=$this->database->profile($userid);
		$data['productdetails']=$this->database->menubar(3);
		$category='3';
		$data['var']="electronics";
		$data['categorydetails']=$this->database->getsubcategorydetails($category);
		$data['agricultureproduct']=$this->database->allproduct($category);
		$data['allbrand']=$this->database->allbrand($category);
		$data['category']=$category;
		$this->load->view('header',$data);
		$this->load->view('header1');
		$this->load->view('category');
		$this->load->view('footer');
		$this->load->view('footer2');
	}
	
	public function sports()
	{
		$cart=$this->database->cartvalue();
		$count=$this->database->count();
		$data['cart']=$cart;
		$data['count']=$count;
		$userid=$this->session->userdata('UserID');
		$data['userid']=$userid;
		$data['data']=$this->database->profile($userid);
		$data['productdetails']=$this->database->menubar(4);
		$category='4';
		$data['var']="sports";
		$data['categorydetails']=$this->database->getsubcategorydetails($category);
		$data['agricultureproduct']=$this->database->allproduct($category);
		$data['allbrand']=$this->database->allbrand($category);
		$data['category']=$category;
		$this->load->view('header',$data);
		$this->load->view('header1');
		$this->load->view('category');
		$this->load->view('footer');
		$this->load->view('footer2');
	}
	
	public function plastics()
	{
		$cart=$this->database->cartvalue();
		$count=$this->database->count();
		$data['cart']=$cart;
		$data['count']=$count;
		$userid=$this->session->userdata('UserID');
		$data['userid']=$userid;
		$data['data']=$this->database->profile($userid);
		$data['productdetails']=$this->database->menubar(5);
		$category='5';
		$data['var']="plastics";
		$data['categorydetails']=$this->database->getsubcategorydetails($category);
		$data['agricultureproduct']=$this->database->allproduct($category);
		$data['allbrand']=$this->database->allbrand($category);
		$data['category']=$category;
		$this->load->view('header',$data);
		$this->load->view('header1');
		$this->load->view('category');
		$this->load->view('footer');
		$this->load->view('footer2');
	}
	
	public function bags()
	{
		$cart=$this->database->cartvalue();
		$count=$this->database->count();
		$data['cart']=$cart;
		$data['count']=$count;
		$userid=$this->session->userdata('UserID');
		$data['userid']=$userid;
		$data['data']=$this->database->profile($userid);
		$data['productdetails']=$this->database->menubar(6);
		$category='6';
		$data['var']="bags";
		$data['categorydetails']=$this->database->getsubcategorydetails($category);
		$data['agricultureproduct']=$this->database->allproduct($category);
		$data['allbrand']=$this->database->allbrand($category);
		$data['category']=$category;
		$this->load->view('header',$data);
		$this->load->view('header1');
		$this->load->view('category');
		$this->load->view('footer');
		$this->load->view('footer2');
	}
	
	public function furniture()
	{
		$cart=$this->database->cartvalue();
		$count=$this->database->count();
		$data['cart']=$cart;
		$data['count']=$count;
		$userid=$this->session->userdata('UserID');
		$data['userid']=$userid;
		$data['data']=$this->database->profile($userid);
		$data['productdetails']=$this->database->menubar(7);
		$category='7';
		$data['var']="furniture";
		$data['categorydetails']=$this->database->getsubcategorydetails($category);
		$data['agricultureproduct']=$this->database->allproduct($category);
		$data['allbrand']=$this->database->allbrand($category);
		$data['category']=$category;
		$this->load->view('header',$data);
		$this->load->view('header1');
		$this->load->view('category');
		$this->load->view('footer');
		$this->load->view('footer2');
	}
	
	public function forgetpassword($var=null)
	{	
		$userid=$this->session->userdata('UserID');
		$cart=$this->database->cartvalue();
		$count=$this->database->count();
		$data['cart']=$cart;
		$data['count']=$count;
		$data['var']=$var;
		$data['userid']=$userid;
		$data['data']=$this->database->profile($userid);
		
		
		$this->load->view('header',$data);
		$this->load->view('forgetpassword');
		$this->load->view('footer');
		$this->load->view('footer2');
	}
	
	public function forgetpasswordsubmit()
	{
		$this->databse->forgetpassword();
		$msg=urlencode("Your&nbspPassword&nbspSent&nbspTo&nbspYour&nbspMail");
		redirect('tv/landingpage/'.$msg);
		
	}
	
	
	
	public function search($search,$var=null)
	{
		$cart=$this->database->cartvalue();
		$count=$this->database->count();
		$data['cart']=$cart;
		$data['count']=$count;
		$userid=$this->session->userdata('UserID');
		$data['userid']=$userid;
		$data['data']=$this->database->profile($userid);
		
		$data['var']=$var;
		if($search==1)
		{
			$data['productdetails']=$this->database->search1();
			
		}
		
		if($search==2)
		{
			$data['productdetails']=$this->database->search2();
				
		}
		if($var=='agriculture')
			$category='1';
		if($var=='clothing')
			$category='2';
		if($var=='electronics')
			$category='3';
		if($var=='sports')
			$category='4';
		if($var=='plastics')
			$category='5';
		if($var=='bags')
			$category='6';
		if($var=='furniture')
			$category='7';
		$data['categorydetails']=$this->database->getsubcategorydetails($category);
		$data['agricultureproduct']=$this->database->allproduct($category);
		$data['allbrand']=$this->database->allbrand($category);
		$data['category']=$category;
		$this->load->view('header',$data);
		$this->load->view('header1');
		$this->load->view('category');
		$this->load->view('footer');
		$this->load->view('footer2');
		
	}
	
	public function searchloadmore()
	{
			
		$position = $this->input->post('position');
		$load=$this->database->loadmore($position);
	
	
		$output = "";
		$output .="<div id='containerloadmore'>";
		$output .="<section id='categorygrid'>";
		$output = "<ul class='thumbnails grid'>";
	
		foreach($load as $row)
		{
			$productid=$row->product_id;
			$productname=$row->product_name;
			$productimage=$row->product_image;
			$price=$row->price;
	
				
			$output .= "<li class='span2 '>";
			$output .= " <a class=' prdocutname ' href='tv/product/'.$productid> $productname</a>";
			$output .= " <div class='thumbnail'>";
			$output .= " <span class='sale tooltip-test'>Sale</span>";
			$output .= " <a href='tv/product/'.$productid><img  style='width:200px;height:200px;' src=' $productimage'></a>";
			 
			$output .= "  <div class='pricetag' style='margin-left:-85px;'>";
			 
			$output .= "  <div class='price'>";
			$output .= "  <div class='pricenew'> Rs&nbsp; $price</div>";
			$output .= " <span class='spiral'></span><a href='tv/product/'.$productid class='productcart' style='margin-right:-35px;'>ADD TO CART</a>";
			$output .= " </div>";
			$output .= "  </div>";
			$output .= " </div>";
			$output .= " </li>";
			 
		}
		$output .= "  </ul>";
		$output .= " </section>";
			
		$output .= " </div>";
			
			
		$output = $output == "" ? "error":$output;
		echo $output;
	}
	
	public function error()
	{
		$this->load->view('error');
	}
	
}
