<?php
    //session_start();
include('include/cateringOrder/jcart/jcart.php');
	
	include("admin/include/confing.php");
	include("admin/include/dbconnect.php");
	include("include/user.php");
	
	include("include/staticPages.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <title>Thank you for shopping with Corporate Catering Online</title>
    <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
	
	<script type="text/javascript" src="fancybox/jquery.easing-1.3.pack.js"></script>
    <script type="text/javascript" src="js/jquery.cycle.js"></script>
	<script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    
	<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.5.css" media="screen" />
    <link rel="stylesheet" href="slider/themes/default/default.css" type="text/css" media="screen" />

    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/additional-methods.min.js"></script>

	<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
	<link href="style_1.css" rel="stylesheet" type="text/css" />
    <link href="css/menu.css" rel="stylesheet" type="text/css" />
    
    <link rel="stylesheet" type="text/css" href="include/authorizenet/stylesheet.css">
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
				<h1>Thank you for shopping with us!</h1>
                <p>
                	Your order has been submitted successfully and confirmation with your receipt was sent to your email address.
                </p>
                <p style="text-align:center;">
                	<?PHP 
					if($_SESSION['UserData']['type']=='individual')
					{
                		$url = 'index.php?page=lunch-box-menu';
					}else
					{
						if($_SESSION['UserData']['delivery_option']=='catering')
						{
							$url = 'index.php?page=catering-menu';	
						}
						else
						{
							$url = 'index.php?page=lunch-box-menu';
						}
					}
					?>
					<a href="<?PHP echo $url; ?> ">&lt;&lt; Continue Shopping</a>
                </p>
            </div>
        </div>
    </div> 
	
<?PHP
	include('include/footer.php');
?>  
</body>
</html>