<?php
    //session_start();
include('include/cateringOrder/jcart/jcart.php');
	
	include("admin/include/confing.php");
	include("admin/include/dbconnect.php");
	include("include/user.php");
	
	include("include/staticPages.php");
    $states = array('AL'=>"AL",'AK'=>"AK",'AZ'=>"AZ",'AR'=>"AR",'CA'=>"CA",'CO'=>"CO",'CT'=>"CT"
                   ,'DE'=>"DE",'DC'=>"DC",'FL'=>"FL",'GA'=>"GA",'HI'=>"HI",'ID'=>"ID",'IL'=>"IL"
                   ,'IN'=>"IN",'IA'=>"IA",'KS'=>"KS",'KY'=>"KY",'LA'=>"LA",'ME'=>"ME",'MD'=>"MD"
                   ,'MA'=>"MA",'MI'=>"MI",'MN'=>"MN",'MS'=>"MS",'MO'=>"MO",'MT'=>"MT"
                   ,'NE'=>"NE",'NV'=>"NV",'NH'=>"NH",'NJ'=>"NJ",'NM'=>"NM",'NY'=>"NY"
                   ,'NC'=>"NC",'ND'=>"ND",'OH'=>"OH",'OK'=>"OK",'OR'=>"OR",'PA'=>"PA"
                   ,'RI'=>"RI",'SC'=>"SC",'SD'=>"SD",'TN'=>"TN",'TX'=>"TX",'UT'=>"UT"
                   ,'VT'=>"VT",'VA'=>"VA",'WA'=>"WA",'WV'=>"WV",'WI'=>"WI",'WY'=>"WY");
    $errors = array();
	
	$cardholder_first_name = $_SESSION['UserData']['first_name'];
	$cardholder_last_name = $_SESSION['UserData']['last_name'];
    if ('POST' === $_SERVER['REQUEST_METHOD'])
    {
        require('include/payment-functions.php');
		putenv("TZ=America/Los_Angeles");
		$date_ordered = date('Y-m-d');
		$time_ordered = date('H:i:s ');
		
			
			
        $credit_card           = sanitize($_POST['credit_card']);
		$coded_card			   = codeCreditCard($credit_card);
        $expiration_month      = (int) sanitize($_POST['expiration_month']);
        $expiration_year       = (int) sanitize($_POST['expiration_year']);
        $cvv                   = sanitize($_POST['cvv']);
        $cardholder_first_name = sanitize($_POST['cardholder_first_name']);
        $cardholder_last_name  = sanitize($_POST['cardholder_last_name']);
        $billing_address       = sanitize($_POST['billing_address']);
        $billing_address2      = sanitize($_POST['billing_address2']);
        $billing_city          = sanitize($_POST['billing_city']);
        $billing_state         = sanitize($_POST['billing_state']);
        $billing_zip           = sanitize($_POST['billing_zip']);
        $telephone             = sanitize($_POST['telephone']);
        $email                 = sanitize($_POST['email']);
        $recipient_first_name  = sanitize($_POST['recipient_first_name']);
        $recipient_last_name   = sanitize($_POST['recipient_last_name']);
        $shipping_address      = sanitize($_POST['shipping_address']);
        $shipping_address2     = sanitize($_POST['shipping_address2']);
        $shipping_city         = sanitize($_POST['shipping_city']);
        $shipping_state        = sanitize($_POST['shipping_state']);
        $shipping_zip          = sanitize($_POST['shipping_zip']);
        $honeypot              = sanitize($_POST['ssn']);
        $token                 = sanitize($_POST['token']);

        if ($token !== $_SESSION['token'])
        {
            $errors['token'] = "This form submission is invalid. Please try again or contact support for additional assistance.";
        }
        if (!empty($honeypot))
        {
            $errors['hp'] = "This form submission is invalid. Please try again or contact support for additional assistance.";
        }
        if (!validateCreditcard_number($credit_card))
        {
            $errors['credit_card'] = "Please enter a valid credit card number";
        }
        if (!validateCreditCardExpirationDate($expiration_month, $expiration_year))
        {
            $errors['expiration_month'] = "Please enter a valid expiration date for your credit card";
        }
        if (!validateCVV($credit_card, $cvv))
        {
            $errors['cvv'] = "Please enter the security code (CVV number) for your credit card";
        }
        if (empty($cardholder_first_name))
        {
            $errors['cardholder_first_name'] = "Please provide the card holder's first name";
        }
        if (empty($cardholder_last_name))
        {
            $errors['cardholder_last_name'] = "Please provide the card holder's last name";
        }
        if (empty($billing_address))
        {
            $errors['billing_address'] = 'Please provide your billing address.';
        }
        if (empty($billing_city))
        {
            $errors['billing_city'] = 'Please provide the city of your billing address.';
        }
        if (empty($billing_state))
        {
            $errors['billing_state'] = 'Please provide the state for your billing address.';
        }
        if (!preg_match("/^\d{5}$/", $billing_zip))
        {
            $errors['billing_zip'] = 'Make sure your billing zip code is 5 digits.';
        }
        if (empty($telephone) || strlen($telephone) > 20)
        {
           // $errors['billing_city'] = 'Please provide a telephone number where we can reach you if necessary.';
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $errors['email'] = "Please provide a valid email address";
        }
        
		/*if (empty($recipient_first_name))
        {
            $errors['recipient_first_name'] = "Please provide the recipient's first name";
        }
        if (empty($recipient_last_name))
        {
            $errors['recipient_last_name'] = "Please provide the recipient's last name";
        }
        if (empty($shipping_address))
        {
            $errors['shipping_address'] = 'Please provide your shipping address.';
        }
        if (empty($shipping_city))
        {
            $errors['shipping_city'] = 'Please provide the city of your shipping address.';
        }
        if (empty($shipping_state))
        {
            $errors['shipping_state'] = 'Please provide the state for your shipping address.';
        }
        if (!preg_match("/^\d{5}$/", $shipping_zip))
        {
            $errors['shipping_zip'] = 'Make sure your shipping zip code is 5 digits.';
        }
		*/
        // If there are no errors let's process the payment
        if (count($errors) === 0)
        {
			$total =  $jcart->get_total();
			$_SESSION['UserData']['telephone'] = $telephone;
            // Format the expiration date
            $expiration_date = sprintf("%04d-%02d", $expiration_year, $expiration_month);

            // Include the SDK
            require_once('authorizenet/config.php');

            // Process the transaction using the AIM API
           /* $transaction = new AuthorizeNetAIM;
            $transaction->setSandbox(AUTHORIZENET_SANDBOX);
            $transaction->setFields(
                array(
                'amount' => $total,
                'card_num' => $credit_card,
                'exp_date' => $expiration_date,
                'first_name' => $cardholder_first_name,
                'last_name' => $cardholder_last_name,
                'address' => $billing_address,
                'city' => $billing_city,
                'state' => $billing_state,
                'zip' => $billing_zip,
                'email' => $email,
                'card_code' => $cvv,
                'ship_to_first_name' => $recipient_first_name,
                'ship_to_last_name' => $recipient_last_name,
                'ship_to_address' => $shipping_address,
                'ship_to_city' => $shipping_city,
                'ship_to_state' => $shipping_state,
                'ship_to_zip' => $shipping_zip,
                )
            );
            
			$response = $transaction->authorizeAndCapture();	*/
			/*
            if ($response->approved)
			*/
			if(true)
            {
				
				
					$transaction_id     = $response->transaction_id;
					$authorization_code = $response->authorization_code;
					$avs_response       = $response->avs_response;
					$cavv_response      = $response->cavv_response;
				
				/*
				echo $transaction_id.'<br />';
                echo $authorization_code.'<br />';
                echo $avs_response.'<br />';
                echo $cavv_response.'<br />';
				*/
                // Put everything in a database for later review and order processing
                // How you do this depends on how your application is designed
                // and your business needs.

                //unset our PRG session variable if it exists
                if (isset($_SESSION['prg']))
                {
                    unset($_SESSION['prg']);
                }
				
				$message ='';
				if (isset($_SESSION['message']))
				{
					$message = $_SESSION['message'];
				}

				$items_count = count($jcart->get_contents());
					if($items_count!=0)
					{
						if (count($errors) === 0)
						{
						mysql_query('begin');
						$customer_name = $orderByFname.' '.$orderByLname;
						
						if($_SESSION['UserData']['type']=='individual')
						{
							$typeOrder=0;
						}
						else
						{
							$typeOrder=1;	
						}
						
						$delivery_time_corp='';
						if(isset($_SESSION['delivery_time_corp']))
						{
							$delivery_time_corp=$_SESSION['delivery_time_corp'];
						}
						$customer_name = $_SESSION['UserData']['first_name'].' '.$_SESSION['UserData']['last_name'];
						
						$sql="INSERT INTO orders (order_type_id, company_id, customer_name, customer_email, routecomp_id, date, message, payed, order_total, transaction_id, notification_type, customer_phone, delivery_time, payed_with, date_ordered, time_ordered) VALUES ('{$typeOrder}', '{$_SESSION['UserData']['company_id']}', '{$customer_name}', '{$_SESSION['UserData']['email']}', '{$_SESSION['UserData']['routecomp_id']}', '{$_SESSION['delivery_date']}', '{$message}', 1, '{$total}', '{$transaction_id}', '{$_SESSION['UserData']['notification']}', '{$telephone}', '{$delivery_time_corp}', '{$coded_card}', '{$date_ordered}', '{$time_ordered}');";
						
						$query_order = mysql_query($sql);
				
						$id = mysql_insert_id(); 
							
							$sqlContents = "INSERT INTO order_content ( order_id, item_id, item_name, item_price, quantity, parent_id, subtotal, type, lunch_box_id, lunch_box_item_id, drop_down_item_id, catering_id, catering_addon_id, full_catering_id, full_catering_addon_id) VALUES ";
							
							$counter = 0;
							foreach ($jcart->get_contents() as $item) 
							{
								$counter++;
								$idOrder   		= $id;
								$itemID   		= trim(strip_tags($item['Id'])); //=> lunch-box-menu-item-6-1 
								$itemName 		= trim(strip_tags($item['Name']));// => Chocolate chip Cookies 
								$itemPrice		= trim(strip_tags($item['Price']));// => 1.25 
								$qty			= trim(strip_tags($item['Qty']));// => 1 
								$ParentId 		= trim(strip_tags($item['ParentId']));// => -1 
								$Subtotal		= trim(strip_tags($item['Subtotal']));// => 1.25 
								$Type			= trim(strip_tags($item['Type']));// => meal 
								$lunchBoxId		= trim(strip_tags($item['LunchBoxId']));// => 
								$lunchBoxItemId	= trim(strip_tags($item['LunchBoxItemId']));// => 6 
								$dropDownItemId	= trim(strip_tags($item['DropDownItemId']));// => 
								$CateringItemId	= trim(strip_tags($item['CateringItemId']));// => 6 
								$CateringDropDownItemId	= trim(strip_tags($item['CateringDropDownItemId']));// => 
								$FullCateringItemId	= trim(strip_tags($item['FullCateringItemId']));// => 6 
								$FullCateringDropDownItemId	= trim(strip_tags($item['FullCateringDropDownItemId']));// =>
								
								
								$sep_string = $items_count>$counter?', ':'';
								
								
								$sqlContents.="('{$idOrder}', '{$itemID}', '{$itemName}', '{$itemPrice}', '{$qty}', '{$ParentId}', '{$Subtotal}', '{$Type}', '{$lunchBoxId}', '{$lunchBoxItemId}', '{$dropDownItemId}', '{$CateringItemId}', '{$CateringDropDownItemId}', '{$FullCateringItemId}', '{$FullCateringDropDownItemId}' )".$sep_string;
							}//kraj foreach
							
							$sqlContents.=';';
							
							$query_order_content = mysql_query($sqlContents);
							
							
							$sqlCoupon="INSERT INTO users_coupons (id_user, id_coupon) VALUES ('{$_SESSION['UserData']['id']}', '{$_SESSION['CouponId']}');";
							$qryCoupon=mysql_query($sqlCoupon);
							
							
							if ($query_order_content && $query_order && $qryCoupon)
							{
								mysql_query('commit');
								
							}
							else
							{
								mysql_query('rollback');
								$errors['mysql'] = 'There was an error while saving your order to database. Please try again. Thank you.';
							}
						}
					}
					else
					{
						echo "<p>Your shopping cart is empty</p>";	
					}

				require_once('include/mail_receipt.php');
				require_once('include/mail_order.php');
				$_SESSION['ready_to_mail']=true;
				$cart = $jcart->display_cart();
				unset($_SESSION['ready_to_mail']);
				
				
				if($_SESSION['UserData']['type']=='individual')
				{
					if(mail_receipt($_SESSION['UserData']['email'],$cart, $transaction_id, $message))
					{
						
						 $jcart->empty_cart();
						 $_SESSION['jcart']->delete_coupon();
						header('Location: thank-you-page.php');
						exit;
					}
					else
					{
						$errors['send_email'] = 'There was an error while sending confirmation email. Please call us to confirm your order. Thank you.';
					}
				}
				else
				{
					if(mail_receipt($_SESSION['UserData']['email'],$cart, $transaction_id, $message) && mail_order($_SESSION['UserData']['email'],$cart, $transaction_id, $message))
					{
						 $jcart->empty_cart();
						 $_SESSION['jcart']->delete_coupon();
						header('Location: thank-you-page.php');
						exit;
					}
					else
					{
						$errors['send_email'] = 'There was an error while sending confirmation email. Please call us to confirm your order. Thank you.';
					}
				}
				
				
				
				
                // Once we're finished let's redirect the user to a receipt page
                
            }
            else if ($response->declined)
            {
                // Transaction declined. Set our error message.
                $errors['declined'] = 'Your credit card was declined by your bank. Please try another form of payment.';
            }
            else
            {
                // And error has occurred. Set our error message.
                $errors['error'] = 'We encountered an error while processing your payment. Your credit card was not charged. Please try again or contact customer service to place your order.';

                // Collect transaction response information for possible troubleshooting
                // Since our application won't be doing this we'll comment this out for now.
                //
                 $response_subcode     = $response->response_subcode;
                 $response_reason_code = $response->response_reason_code;
				 
            }
        }
        else
        {
            // Create an array in our session for use to store their variables
            $_SESSION['prg'] = array();

            // Put their information into the array
            $_SESSION['prg']['credit_card']           = $credit_card;
            $_SESSION['prg']['expiration_month']      = $expiration_month;
            $_SESSION['prg']['expiration_year']       = $expiration_year;
            $_SESSION['prg']['cvv']                   = $cvv;
            $_SESSION['prg']['cardholder_first_name'] = $cardholder_first_name;
            $_SESSION['prg']['cardholder_last_name']  = $cardholder_last_name;
            $_SESSION['prg']['billing_address']       = $billing_address;
            $_SESSION['prg']['billing_address2']      = $billing_address2;
            $_SESSION['prg']['billing_city']          = $billing_city;
            $_SESSION['prg']['billing_state']         = $billing_state;
            $_SESSION['prg']['billing_zip']           = $billing_zip;
            $_SESSION['prg']['telephone']             = $telephone;
            $_SESSION['prg']['email']                 = $email;
            $_SESSION['prg']['recipient_first_name']  = $recipient_first_name;
            $_SESSION['prg']['recipient_last_name']   = $recipient_last_name;
            $_SESSION['prg']['shipping_address']      = $shipping_address;
            $_SESSION['prg']['shipping_address2']     = $shipping_address2;
            $_SESSION['prg']['shipping_city']         = $shipping_city;
            $_SESSION['prg']['shipping_state']        = $shipping_state;
            $_SESSION['prg']['shipping_zip']          = $shipping_zip;

			$_SESSION['UserData']['telephone'] = $telephone;
			
            // Don't forget the $errors array!
            $_SESSION['prg']['errors']                = $errors;

            // Do our redirect. Make sure it sends the 303 header
            header('Location: payment-form.php', true, 303);
            exit;
        }
    }
    else if (isset($_SESSION['prg']) && is_array($_SESSION['prg']))
    {
        // Retreive the user's information and our error messages
        // Don't store the credit card information unless you are 100% sure your
        // server and website is PCI compliant!
         $credit_card           = $_SESSION['prg']['credit_card'];
         $expiration_month      = $_SESSION['prg']['expiration_month'];
         $expiration_year       = $_SESSION['prg']['expiration_year'];
        $cvv                   = $_SESSION['prg']['cvv'];
        $cardholder_first_name = $_SESSION['prg']['cardholder_first_name'];
        $cardholder_last_name  = $_SESSION['prg']['cardholder_last_name'];
        $billing_address       = $_SESSION['prg']['billing_address'];
        $billing_address2      = $_SESSION['prg']['billing_address2'];
        $billing_city          = $_SESSION['prg']['billing_city'];
        $billing_state         = $_SESSION['prg']['billing_state'];
        $billing_zip           = $_SESSION['prg']['billing_zip'];
        $telephone             = $_SESSION['prg']['telephone'];
		//SETOVATI NA PRETHODNOJ STRANI
        $email                 = $_SESSION['prg']['email'];
        $recipient_first_name  = $_SESSION['prg']['recipient_first_name'];
        $recipient_last_name   = $_SESSION['prg']['recipient_last_name'];
        $shipping_address      = $_SESSION['prg']['shipping_address'];
        $shipping_address2     = $_SESSION['prg']['shipping_address2'];
        $shipping_city         = $_SESSION['prg']['shipping_city'];
        $shipping_state        = $_SESSION['prg']['shipping_state'];
        $shipping_zip          = $_SESSION['prg']['shipping_zip'];
        $errors                = $_SESSION['prg']['errors'];
    }

    $_SESSION['token'] = md5(uniqid(rand(), true));
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <title>Corporate Catering Online - Payment Form</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <meta http-equiv="Content-Language" content="en-us">
    <script type="text/javascript" src="./js/jquery-1.7.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="include/authorizenet/stylesheet.css">
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>	
<?php   include("include/header.php");
		include("include/menu.php");
?>
  	<script type="text/javascript">
		$(document).ready( function(){
  			$(".signin").click(function(){
    			$("#singin").fadeToggle("slow");
  			});
		});
	</script>	
    <div id="contentMain">
        <div id="main" style="padding-bottom:50px;">
            <div style="text-align:center;">
                <!--<h3 style="font-size:24px; margin:0px;">THANK YOU FOR SHOPPING WITH US</h3>
                <p style="margin:5px 0;">Please provide your payment info below and complete order</p>-->
            </div>
            <div class="form authorize checkout_wrapper">
        
                <?php
                    if (count($errors))
                    {
                ?>
                        <div id="errormessage">
                            <h2>
                                There was an error with your submission. Please make the necessary corrections and try again.
                            </h2>
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
                ?>
            
            	
                <form action="payment-form.php" method="post">
                	 <p class="hp">
                        <input type="text" name="ssn" id="ssn" value="">
                    </p>
                    <div class="form_header">
                    		
                            <h3 style="text-align:center;">Payment and Billing Information</h3>
                        </div>
                    <div class="half_form_wrapper">
                        
                        <fieldset>
                                <p>
                                    <label for="cardholder_first_name"<?php if (array_key_exists('cardholder_first_name', $errors)) echo ' class="labelerror"'; ?>>First Name</label>
                                    <input type="text" name="cardholder_first_name" id="cardholder_first_name" maxlength="30" value="<?php if (isset($cardholder_first_name)) echo $cardholder_first_name; ?>" /><span class="required">*</span>
                                </p>
                                <p>
                                    <label for="cardholder_last_name"<?php if (array_key_exists('cardholder_last_name', $errors)) echo ' class="labelerror"'; ?>>Last Name</label>
                                    <input type="text" name="cardholder_last_name" id="cardholder_last_name" maxlength="30" value="<?php if (isset($cardholder_last_name)) echo $cardholder_last_name; ?>" /><span class="required">*</span>
                                </p>
                            <p>
                                <label for="credit_card"<?php if (array_key_exists('credit_card', $errors)) echo ' class="labelerror"'; ?>>Card Number</label>
                                <input type="text" name="credit_card" id="credit_card" autocomplete="off" maxlength="19" value="" /><span class="required">*</span>
                                
                                
                            </p>
                            <p>
                                <label for="expiration_month"<?php if (array_key_exists('expiration_month', $errors)) echo ' class="labelerror"'; ?>>Expiration Date</label>
                                <select name="expiration_month" id="expiration_month">
                                    <option value="0"> </option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                                <select name="expiration_year" id="expiration_year">
                                    <option value="0"> </option>
                                    <?php
                                        $current_year = date("Y");
                                        $stop_year = $current_year + 12;
                                        for ($year = $current_year; $year <= $stop_year; $year++)
                                        {
                                    ?>
                                                            <option value="<?php echo $year ?>"><?php echo $year ?></option>
                                    <?php
                                        }
                                    ?>
                                </select><span class="required">*</span>
                            </p>
                            <p>
                                <label for="cvv"<?php if (array_key_exists('cvv', $errors)) echo ' class="labelerror"'; ?>>Security Code</label>
                                <input type="text" name="cvv" id="cvv" style="width:40px;" autocomplete="off" value="" maxlength="4" /><span class="required">*</span>
                            </p>
                    
                        </fieldset>
                    </div>
                    <div class="checkout_cart_wrapper">      
                        <div class="half_form_wrapper">
                           
                            <fieldset>
    
                                <p>
                                    <label for="billing_address"<?php if (array_key_exists('billing_address', $errors)) echo ' class="labelerror"'; ?>>Address line 1</label>
                                    <input type="text" name="billing_address" id="billing_address" maxlength="45" value="<?php if (isset($billing_address)) echo $billing_address; ?>" /><span class="required">*</span>
                                </p>
                                <p>
                                    <label for="billing_address2"<?php if (array_key_exists('billing_address2', $errors)) echo ' class="labelerror"'; ?>>Address line 2</label>
                                    <input type="text" name="billing_address2" id="billing_address2" maxlength="45" value="<?php if (isset($billing_address2)) echo $billing_address2; ?>" />
                                </p>
                                <p>
                                    <label for="billing_city"<?php if (array_key_exists('billing_city', $errors)) echo ' class="labelerror"'; ?>>City</label>
                                    <input type="text" name="billing_city" id="billing_city" maxlength="25" value="<?php if (isset($billing_city)) echo $billing_city; ?>" style="width:110px;" /><span class="required">*</span>
                                    <label for="billing_state"<?php if (array_key_exists('billing_state', $errors)) echo ' class="labelerror"'; ?> style="width:30px;">State</label>
                                    <select id="billing_state" name="billing_state" style="width:50px;">
                                        <option value="CA">CA</option>
                                        <?php
                                            foreach ($states as $state_abbr => $state_name)
                                            {
                                                $selected = (isset($billing_state) && $billing_state === $state_abbr) ? ' selected="selected"' : '';
                                        ?>
                                                                <option value="<?php echo $state_abbr; ?>"<?php echo $selected; ?>><?php echo $state_name; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </p>
                                <p>
                                    <label for="billing_zip"<?php if (array_key_exists('billing_zip', $errors)) echo ' class="labelerror"'; ?>>Zip Code</label>
                                    <input type="text" name="billing_zip" id="billing_zip" maxlength="5" value="<?php if (isset($billing_zip)) echo $billing_zip; ?>"><span class="required">*</span>
                                </p>
                              
                                <p>
                                    <label for="email"<?php if (array_key_exists('email', $errors)) echo ' class="labelerror"'; ?>>Email Address</label>
                                    <input type="text" name="email" id="email" maxlength="100" value="<?php if (isset($email)) echo $email; else echo $_SESSION['UserData']['email']; ?>">
                                </p>
                            </fieldset>
                        </div>
                        <div class="seal">
                        	<div class="viza"></div>
                            <div class="auth">
                            	<!-- (c) 2005, 2012. Authorize.Net is a registered trademark of CyberSource Corporation --> 
                                <div class="AuthorizeNetSeal"> <script type="text/javascript" language="javascript">var ANS_customer_id="5bbe2707-31dd-4622-9963-a47b5bd7217f";</script> <script type="text/javascript" language="javascript" src="//verify.authorize.net/anetseal/seal.js" ></script> <a href="http://www.authorize.net/" id="AuthorizeNetText" target="_blank">Merchant Services</a> </div>
                            </div>
                        </div> 
                        <div class="submit" style="clear:both;">
                            <p style="text-align:center;">
                                <input type="hidden" name="token" id="token" value="<?php echo $_SESSION['token']; ?>" />
                                <input type="submit" value="COMPLETE ORDER" class="myButton" style="padding:5px 20px;">
                            </p>
                        </div> 
                    </div>
                    
                    <!-- half_form_wrapper--> 
                       
                    <fieldset style="display:none;">
                        <legend>Shipping Information</legend>
                        <p>
                            <label for="recipient_first_name"<?php  if (array_key_exists('recipient_first_name', $errors)) echo ' class="labelerror"'; ?>>Recipient's First Name</label>
                            <input type="text" name="recipient_first_name" id="recipient_first_name" maxlength="30" value="<?php if (isset($recipient_first_name)) echo $recipient_first_name; ?>" />
                        </p>
                        <p>
                            <label for="recipient_last_name"<?php if (array_key_exists('recipient_last_name', $errors)) echo ' class="labelerror"'; ?>>Recipient's Last Name</label>
                            <input type="text" name="recipient_last_name" id="recipient_last_name" maxlength="30" value="<?php if (isset($recipient_last_name)) echo $recipient_last_name; ?>" />
                        </p>
                        <p>
                            <label for="shipping_address"<?php if (array_key_exists('shipping_address', $errors)) echo ' class="labelerror"'; ?>>Shipping Address</label>
                            <input type="text" name="shipping_address" id="shipping_address" maxlength="45" value="<?php if (isset($shipping_address)) echo $shipping_address; ?>" />
                        </p>
                        <p>
                            <label for="shipping_address2"<?php if (array_key_exists('shipping_address2', $errors)) echo ' class="labelerror"'; ?>>Suite/Apt #</label>
                            <input type="text" name="shipping_address2" id="shipping_address2" maxlength="45" value="<?php if (isset($shipping_address2)) echo $shipping_address2; ?>" />
                        </p>
                        <p>
                            <label for="shipping_city"<?php if (array_key_exists('shipping_city', $errors)) echo ' class="labelerror"'; ?>>City</label>
                            <input type="text" name="shipping_city" id="shipping_city" maxlength="30" value="<?php if (isset($shipping_city)) echo $shipping_city; ?>" />
                        </p>
                        <p>
                            <label for="shipping_state"<?php if (array_key_exists('shipping_state', $errors)) echo ' class="labelerror"'; ?>>State</label>
                            <select id="shipping_state" name="shipping_state">
                                <option value="0"> </option>
                                <?php
                                    foreach ($states as $state_abbr => $state_name)
                                    {
                                        $selected = (isset($shipping_state) && $shipping_state === $state_abbr) ? ' selected="selected"' : '';
                                ?>
                                                        <option value="<?php echo $state_abbr; ?>"<?php echo $selected; ?>><?php echo $state_name; ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </p>
                        <p>
                            <label for="shipping_zip"<?php if (array_key_exists('shipping_zip', $errors)) echo ' class="labelerror"'; ?>>Zip Code</label>
                            <input type="text" name="shipping_zip" id="shipping_zip" maxlength="5" value="<?php if (isset($shipping_zip)) echo $shipping_zip; ?>" />
                        </p>
                    </fieldset>
                </form>
            </div>
            <div style="text-align:justify; width:680px; margin:0 auto;">
            	<p style="font-style:italic; font-size:12px;">Thank you for shopping with us, your confirmation receipt will be sent shortly to the email address provided. All orders are delivered daily in exact time selected, or time window assigned to your company location. If from any reason you are not able to receive your order, please have someone else take your order for you, or provide us with additional instructions trough the Delivery Notification options. </p>
                <p style="font-style:italic; font-size:12px;">
                Catering and Same Day delivery orders will be delivered as originally prepared (not necessarily cold)<br /><br />
                	FREE DELIVERY – NEXT DAY DELIVERIES ONLY: All items are delivered in properly inspected delivery equipment and will be delivered cooled - by the O.C. Health Department these items are required to be delivered cold, at or under 41&deg;F 
                    <br /><br />
For all additional questions or information please contact us at 949-945-7702 or info@corporatecateringonline.com 




                </p>
            </div>	
        </div>
    </div> 
	<div id="footerAll" style="margin-top:-14px; padding:none;">
    	<div id="footer">
        <ul id="menuFooter">
            <li><a href="index.php" class="active">Home</a> | </li>
            <li><a href="index.php?page=lunch-box-menu&cat=0">Lunch box menu</a> | </li>
            <li><a href="index.php?page=catering-menu">Catering orders</a> | </li>
            <li><a href="index.php?page=request-a-quote">Request a quote</a> | </li>
            <li><a href="index.php?page=why-ccol">Why ccol</a> | </li>
            <li><a href="index.php?page=faq">F.A.Q.</a> | </li>
            <li><a href="index.php?page=contact-us">Contact us</a> | </li>
            <li><a href="index.php?page=terms-and-policies">"BORING STUFF"</a></li>
        </ul>
		<div id="text">COPYRIGHT © 2012, Corporate Catering Online<br /></div>
	</div>
</div>    
</body>
</html>