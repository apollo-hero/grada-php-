<?php
include('include/setUnregisteredUser.php');
if(isset($_SESSION['email']))
{
	
	$userlog=1;
}
else 
{

	$userlog=0;
}

if(!isset($_SESSION['UserData']))
{	
	setUnregisteredUser();
}

if(!isset($_SESSION['CompanyData']))
{
	$_SESSION['CompanyData']=array();
		$company['id'] = NULL;
		$company['name'] = NULL;
		$company['address'] = NULL;
		$company['city'] = NULL;
		$company['zip_code'] = NULL;
		$company['suite'] = NULL;
		$company['contact_person'] = NULL;
		$company['verified'] = false;
		$times = array();
		$_SESSION['CompanyData'] = $company;
		$_SESSION['CompanyData']['delivery_times'] = $times;
}
if(isset($_POST['set_same_day']) && isset($_POST['delivery_option']))
{
	$_SESSION['UserData']['delivery_option'] =  trim(strip_tags($_POST['delivery_option']));
	switch($_SESSION['UserData']['delivery_option'])
	{
		case NULL:
			$individual_url="order_option=choose";
			$catering_url="order_option=choose";
		break;
		case 'free':
			$_SESSION['UserData']['type']='individual';
		break;
		case 'same_day':	
			$_SESSION['UserData']['type']='corporate';
		break;
		case 'catering':
			$_SESSION['UserData']['type']='corporate';
		break;
		
	}
}

if(isset($_GET['set_same_day']) && isset($_GET['delivery_option']))
{
	$_SESSION['UserData']['delivery_option'] =  trim(strip_tags($_GET['delivery_option']));
	$_SESSION['UserData']['type']='individual';
}

function logout()
{
	session_destroy();
	exit("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\"><META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=".$_SERVER['PHP_SELF']."?logout=1\">");
}

function login($email, $password)
{
	
	$query = "SELECT * FROM `usersFE` WHERE `email` = '$email' AND `password` = '$password'";
	$result = mysql_query($query) or die ('Error: '.mysql_error());
	$affected_rows = mysql_num_rows ($result);
	if ($affected_rows == 1) 
	{
		
		$_SESSION['email']=$email;
		//echo '<pre>';
		//print_r($_SESSION['UserData']);
		//echo '</pre>';
		setUser();
		
		//echo '<br />---------------------<pre>';
		//print_r($_SESSION['UserData']);
		//echo '</pre>';
		if(isset($_POST['checkoutLogin']))
		{
			if($_SESSION['UserData']['delivery_option']=='free' && ($_SESSION['UserData']['company_id']==0 || $_SESSION['UserData']['company_id']==NULL) )
			{
				echo "<div style=\"display:none;\">";
	 			//header ("Location: index.php?page=checkout");
	 			echo "</div><meta http-equiv=\"refresh\" content=\"0;url=index.php?page=request-a-service\"> Your company is not registered for FREE DELIVERY PROGRAM<br />Redirecting...";
			}
			else
			{
				echo "<div style=\"display:none;\">";
	 			//header ("Location: index.php?page=checkout");
	 			echo "</div><meta http-equiv=\"refresh\" content=\"0;url=index.php?page=checkout\"> You are logged in with E-Mail/username: ".$_SESSION['email']."<br />Redirecting...";
			}
		}
		else
		{
	 		echo "<div style=\"display:none;\">";
	 		//header ("Location: index.php");
			
		
			/*if($_SESSION['UserData']['type']=='individual')
			{
				
				$url="index.php?page=lunch-box-menu";
			}
			elseif($_SESSION['UserData']['type']=='corporate')
			{
				$url="index.php?page=catering-menu";
			}
					
	 		echo "</div><meta http-equiv=\"refresh\" content=\"0;url=".$url."\"> ";
			*/
			
			$url="index.php?order_option=choose";
			echo "</div><meta http-equiv=\"refresh\" content=\"0;url=".$url."\"> ";
		}
	} 
	else 
	{
		$messageLogin="E-Mail or password is incorrect.";
		echo "<div class=\"warningbox\">".$messageLogin."</div>";
	}
}

function setCompany($companyId)
{
	
	$email = $_SESSION['email'];
	$sql = "SELECT `idComp`, `companyName`, `adress`, `city`, `suite`, `zipCode`, `contactPerson` FROM `company` WHERE `idComp`='{$companyId}'";
	$query=mysql_query($sql);
	
	$company = array();
	while ($row = mysql_fetch_array($query)) {
		$company['id'] = $row['idComp'];
		$company['name'] = $row['companyName'];
		$company['address'] = $row['adress'];
		$company['city'] = $row['city'];
		$company['zip_code'] = $row['zipCode'];
		$company['suite'] = $row['suite'];
		$company['contact_person'] = $row['contactPerson'];
	}
	
	$sql = "SELECT routecomp.`routeCompId`, routecomp.`timeIn`, routecomp.`timeOut` FROM routecomp WHERE routecomp.`companyId` = '{$companyId}' ORDER BY routecomp.`timeIn`";
	
	$query=mysql_query($sql);
	$times = array();
	while ($row = mysql_fetch_array($query)) 
	{
		array_push($times , array ('routecomp_id'=>$row['routeCompId'], 'time_in'=>$row['timeIn'], 'time_out'=>$row['timeOut']));
	}

	$_SESSION['CompanyData'] = $company;
	$_SESSION['CompanyData']['delivery_times'] = $times;
}

function reset_password($email)
{
	
	$sql = "SELECT `idUser` FROM `usersFE` WHERE `email` = '{$email}'";
	$query=mysql_query($sql);
	$num=mysql_num_rows($query);
	if($num==0)
	{
		$errors['email']="Account with provided email address does not exist.";
	}
	elseif($num==1)
	{
		$user=mysql_fetch_array($query);	
		$id = $user['idUser'];
		
		require_once('include/pass_gen.php');	
		$password = GeneratePassword();
		$password_pure = $password;
		$password = md5($password);

		$sqlE="UPDATE usersFE SET password = '{$password}' WHERE idUser = '{$id}'";
		 
		$myqry=mysql_query($sqlE);
		if($myqry==true)
		{
			require_once('include/mail_password.php');
			mail_password($email,$password_pure,'reset');
			echo '<div class="form"><div class="form_header"><h2 style="text-align:center;">PASSWORD RESET</h2></div><p style="text-align:center;">Your account has been updated successfully.</p><p style="text-align:center;">An email with your temporary password was sent to your email address.</p><p style="text-align:center;"><a href="index.php">Back to home page</a></p></div>';
		}
		if($myqry==false)
		{
		
			$errors['mysql'] ="There was an error connecting to datebase";
		}	 

	}
	
	
	if (count($errors))
	{
	?>
		<div id="errormessage" class="warningbox">
			<p>
				There was an error with your submission. Please make the necessary corrections and try again.
			</p>
			<ul>
	<?php
			foreach ($errors as $error)
			{
	?>
				<li><?php echo $error; ?></li>
	<?php
			}
	?>
			</ul>
		</div>
	<?php
	}
}

function setUser()
{
	
	$email = $_SESSION['email'];
	$sql = "SELECT `idUser`, `email`, `password`, `fname`, `lname`, `type`, `companyName`, `city`, `suite`, `address`, `zipCode`, `companyId`, `telephone`, `fax`, `newsletters`, `dateReg`, `delayed_payment_coupon` FROM `usersFE` WHERE `email` = '$email'";
	$query=mysql_query($sql);
	$num=mysql_num_rows($query);
	if($num==0){$errorMsg.="<p>Your account havn't finded in our database.<br />Please contact administrator and check your account.</p>";}
	if($num>1){$errorMsg.="<p>We have more than one accounts with your E-mail/username.<br />Please contact administrator and check your account.</p>";}
	
	if($num==1)
	{
		$user=mysql_fetch_array($query);	
		if($user['delayed_payment_coupon']!=NULL)
		{
			$delayed_billing = true;	
		}
		else
		{
			$delayed_billing = false;
		}
		$userArray = array
		(	
			'id'				=> $user['idUser'],
			'email'				=> $user['email'],
			'first_name'		=> $user['fname'],
			'last_name'			=> $user['lname'],
			'type'				=> $_SESSION['UserData']['type'],
			'company_name'		=> $user['companyName'],	
			'address'			=> $user['address'],
			'zip_code'			=> $user['zipCode'],
			'company_id'		=> $user['companyId'],
			'telephone'			=> $user['telephone'],
			'fax'				=> $user['fax'],		
			'city'				=> $user['city'],
			'suite'				=> $user['suite'],
			'notification'		=> '',
			'routecomp_id'		=> '',
			'logged_in'			=> true,
			'delivery_option'	=> $_SESSION['UserData']['delivery_option'],
			'delayed_billing' => $delayed_billing
		);
		
		$_SESSION['UserData'] = $userArray;
		//$_SESSION['UserData']['type']=$user['type'];
		
		if($_SESSION['UserData']['company_id']!=0 && $_SESSION['UserData']['company_id']!=NULL)
		{
			setCompany($user['companyId']);
		}
		else
		{
			$company['id'] = NULL;
			$company['name'] = $_SESSION['UserData']['company_name'];
			$company['address'] = $_SESSION['UserData']['address'];
			$company['city'] = $_SESSION['UserData']['city'];
			$company['zip_code'] = $_SESSION['UserData']['zip_code'];
			$company['suite'] = $_SESSION['UserData']['suite'];
			$company['contact_person'] = $_SESSION['UserData']['fname'];
			$times = array();
			
			$_SESSION['CompanyData'] = $company;
			$_SESSION['CompanyData']['delivery_times'] = $times;
		}
	}
}

if(isset($_GET['clear']) || isset($_POST['clear']))
{
	
		if(!$_SESSION['UserData']['logged_in'])
		{
			$company['id'] = NULL;
			$company['name'] = "";
			$company['address'] = "";
			$company['city'] = "";
			$company['zip_code'] = "";
			$company['suite'] = "";
			$company['contact_person'] = "";
			$times = array();
			
			$_SESSION['CompanyData'] = $company;
			$_SESSION['CompanyData']['delivery_times'] = $times;
			setUnregisteredUser();
		}
		
		if(isset($_SESSION['jcart']))
		{
			$jcart = $_SESSION['jcart'];
			$jcart->empty_cart();	
		}
	
		if(isset($_POST['clear']))
		{
			$_SESSION['UserData']['delivery_option']='same_day';
			$_SESSION['UserData']['type']='corporate';
				
		}
		
		unset($_SESSION['first_time']);
}

if(isset($_GET['user_type']))
{
	
	$_SESSION['first_time']=true;
	if($_GET['user_type']=='individual')
	{
		$_SESSION['UserData']['type']='individual';
	}
	if($_GET['user_type']=='corporate')
	{
		$_SESSION['UserData']['type']='corporate';
		/*$_SESSION['CompanyData']=array();
		if(isset($_GET['zip_code']))
		{
			$company['id'] = NULL;
			$company['name'] = NULL;
			$company['address'] = NULL;
			$company['city'] = NULL;
			$company['zip_code'] = trim(strip_tags($_GET['zip_code']));
			$company['suite'] = NULL;
			$company['contact_person'] = NULL;
			$company['verified'] = true;
			$times = array();
			
			$_SESSION['CompanyData'] = $company;
			$_SESSION['CompanyData']['delivery_times'] = $times;
		}*/
		
	}
}
?>