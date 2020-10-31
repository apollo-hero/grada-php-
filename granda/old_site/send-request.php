<?php
    //session_start();

	
	include("admin/include/confing.php");
	include("admin/include/dbconnect.php");
	include("include/user.php");
	
	include("include/staticPages.php");
	
	$back_link='index.php/index.php?clear=true&home=yes';
	
	// REQUEST A SERVICE
	if(isset($_POST['request_a_service']))
	{
		if(isset($_POST['companyName']))
		{
			$company = trim(strip_tags($_POST['companyName']));
		}
		if(isset($_POST['adress']))
		{
			$address = trim(strip_tags($_POST['adress']));
		}
		if(isset($_POST['suite']))
		{
			$suite = trim(strip_tags($_POST['suite']));
		}
		if(isset($_POST['city']))
		{
			$city = trim(strip_tags($_POST['city']));
		}
		if(isset($_POST['zipCode']))
		{
			$zip = trim(strip_tags($_POST['zipCode']));
		}
		if(isset($_POST['contactPerson']))
		{
			$contact = trim(strip_tags($_POST['contactPerson']));
		}
		if(isset($_POST['phone']))
		{
			$phone = trim(strip_tags($_POST['phone']));
		}
		if(isset($_POST['numbEmpl']))
		{
			$empl = trim(strip_tags($_POST['numbEmpl']));
		}
		if(isset($_POST['preferedDelT']))
		{
			$time = trim(strip_tags($_POST['preferedDelT']))."-".trim(strip_tags($_POST['preferedDelT1']));
		}
		if(isset($_POST['additional_request']))
		{
			if($_POST['additional_request']!='Enter additional notes here')
			{
				$desc = trim(strip_tags($_POST['additional_request']));
			}
			else
			{
				$desc='';
			}
		}
		if(isset($_POST['email']))
		{
			$email = trim(strip_tags($_POST['email']));
		}
		
		require_once('include/mail_request.php');
		$back_link ="index.php?page=request-a-service";
	}
	
	
	// REQUEST A QUOTE
	
	if(isset($_POST['request_a_quote']))
	{
					
		if(isset($_POST['companyName']))
		{
			$company = trim(strip_tags($_POST['companyName']));
		}
		
		if(isset($_POST['adressQ']))
		{
			$address = trim(strip_tags($_POST['adressQ']));
		}
		
		if(isset($_POST['cityQ']))
		{
			$city = trim(strip_tags($_POST['cityQ']));
		}
		
		if(isset($_POST['zipQ']))
		{
			$zip_code = trim(strip_tags($_POST['zipQ']));
		}
		if(isset($_POST['numbOfPeople']))
		{
			$number_of_people = trim(strip_tags($_POST['numbOfPeople']));
		}
		
		if(isset($_POST['budget']))
		{
			$budget = trim(strip_tags($_POST['budget']));
		}
		
		if(isset($_POST['contactQ']))
		{
			$contact_person = trim(strip_tags($_POST['contactQ']));
		}
		
		if(isset($_POST['contactQNumb']))
		{
			$phone = trim(strip_tags($_POST['contactQNumb']));
		}
		
		if(isset($_POST['emailQ']))
		{
			$email = trim(strip_tags($_POST['emailQ']));
		}
		
		if(isset($_POST['dateQ']))
		{
			$date = trim(strip_tags($_POST['dateQ']));
		}
		
		if(isset($_POST['deliveryQ']))
		{
			$delivary_time = trim(strip_tags($_POST['deliveryQ']));
		}
		
		if(isset($_POST['timeQ']))
		{
			$setup_time = trim(strip_tags($_POST['timeQ']));
		}
		
		if(isset($_POST['servingQ']))
		{
			$serving_time = trim(strip_tags($_POST['servingQ']));
		}
		
		if(isset($_POST['descQ']))
		{
			$description = trim(strip_tags($_POST['descQ']));
		}
		$back_link ="index.php?page=request-a-quote";
		require_once('include/mail_quote.php');
					
	}
	
	
	
	
	
	
	

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <title>Request Lunch Box Services</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <meta http-equiv="Content-Language" content="en-us">
    <script type="text/javascript" src="./js/jquery-1.7.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="include/authorizenet/stylesheet.css">
    <link href='https://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
	<link href="style_1.css" rel="stylesheet" type="text/css" />
    <link href="css/menu.css" rel="stylesheet" type="text/css" />
</head>
<body>	
<?php   include("include/header.php");
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
            <div class="form authorize checkout_wrapper">
            	<?PHP
				
				$send_request_result = false;
		
				if($_POST['secCode'] == $_SESSION['secCode']) 
				{	
					if(isset($_POST['submit']) && isset($_POST['request_a_service']))
					{
						
						if(send_request_service($company, $address, $suite, $city, $zip, $contact, $phone, $empl, $time, $email, $desc))
						{
							$send_request_result=true;
							
						}
					}
					
					
					if(isset($_POST['submit_request']) && isset($_POST['request_a_quote']))
					{
						
						
						if(send_quote_request($company, $address, $city, $zip_code, $number_of_people, $budget, $contact_person, $phone, $email, $date, $delivary_time, $setup_time, $serving_time, $description, $secCode))
						{
							
							$send_request_result=true;
							
						}
					}
					
					if($send_request_result)
					{
						$back_link='index.php/index.php?clear=true&home=yes';
					?>
                        <h1>Thank you!</h1>
                        <p>
                            Your request has been submitted and one of our Sales Team members will contact you shortly. You can always call us at (949) 945-7702 for more information.
                        </p>
                        <p>
                            <a href="<?PHP echo $back_link; ?>">Back to home page</a>
                        </p>
                    <?PHP
					}
					else
					{
						?>
                        <h1>Error</h1>
                        <p>
                            Your request has not been submitted. Plesee go back to previous page and try again.
                        </p>
                        <p>
                            <a href="<?PHP echo $back_link; ?>">Back to Request Service page</a>
                        </p>
					<?PHP
					}
				}
				else
				{
				?>
					<h1>Error</h1>
					<p>
						Your request has not been submitted. Plesee go back to previous page and enter valid verification code.
					</p>
					<p>
						<a href="<?PHP echo $back_link; ?>">Back to Request Service page</a>
					</p>
				<?PHP	
				}

				?>
            </div>
        </div>
    </div> 
</div>
<?php
include('include/footer.php');
?>    
</body>
</html>