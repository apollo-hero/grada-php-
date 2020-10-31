<?php
	//tomas
	
	
	if($_SERVER["HTTPS"] != "on") {
	   header("HTTP/1.1 301 Moved Permanently");
	   header("Location: https://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]);
	   exit();
	}
	
		
	include('include/cateringOrder/jcart/jcart.php');
	
	include("admin/include/confing.php");
	include("admin/include/dbconnect.php");
	include("include/user.php");
	//tomas
	include("include/getSettings.php");
	
	include("include/staticPages.php");
	
	if($_SESSION['UserData']['delivery_option']=='' && $_GET['page']=='catering-full-menu')
	{
		 header('Location:index.php?order_option=choose&cat=catering');	
	}
	
	if($_SESSION['UserData']['delivery_option']=='' && $_GET['page']=='catering-menu')
	{
		 header('Location:index.php?order_option=choose&cat=catering');	
	}
	
	if($_SESSION['UserData']['delivery_option']=='' && $_GET['page']=='lunch-box-menu' && !isset($_GET['order_option']))
	{
		 header('Location:index.php?page=lunch-box-menu&order_option=choose&cat=Breakfast');	
	}
	
	if(isset($_GET['page'])){
		$page=$_GET['page'];
	}
	if(!isset($_GET['page'])){
		$page="";
	}
    if(!isset($_GET['covid'])){
    	$covid="";
	}
    if(isset($_GET['covid'])){
    	$covid=$_GET['covid'];
	}
    
	if(isset($_GET['type'])){
		$type=trim(strip_tags($_GET['type']));
	}
	if(isset($_GET['cat'])){
		$cat=trim(strip_tags($_GET['cat']));
	}
	
	include("include/getPage.php");
	
	if(isset($_GET['companyId']) && is_numeric($_GET['companyId'])){
		$companyId = $_GET['companyId'];
		setCompany($companyId);
	}
	if(isset($_POST['deliveryTime']) && is_numeric($_POST['deliveryTime']))
	{
		$_SESSION['UserData']['routecomp_id'] = $_POST['deliveryTime'];
	}
	
	if(isset($_GET['companyName']) && !isset($_GET['page']))
	{
		if(isset($_GET['home_ver_individual']) && $_GET['home_ver_individual']==1)
		{
			$_SESSION['UserData']['type']='individual';
		}
		
		if(isset($_GET['companyName']) && !isset($_GET['page']) && $_SESSION['UserData']['type']=='individual')
		{
			if($_GET['companyId']){
				$companyId=$_GET['companyId'];
			}
			if($_GET['companyName']){
				$companyName=$_GET['companyName'];
			}
			if($_GET['adress']){
				$adress=$_GET['adress'];
			}
			if($_GET['zipCode']){
				$zipCode=$_GET['zipCode'];
			}
			
			//ako postoji routeId pravim upit za MySQL da vidim da li i tamo postoji
			$sql="SELECT `idComp`, `companyName`, `adress`, `city`, `suite`, `zipCode`, `contactPerson` FROM `company` WHERE `companyName` = '".$companyName."' AND `zipCode` = '".$zipCode."'";
			$query=mysql_query($sql);
			$numRow=mysql_num_rows($query);

			if($numRow==1){
				$CompanyResult=mysql_fetch_array($query);
				setCompany($CompanyResult['idComp']);
				$_SESSION['UserData']['type']='individual';
				$_SESSION['UserData']['delivery_option']='free';
				header('location:index.php?page=checkout');	
			}
		}
	}
	
	if($_GET['page']=='checkout' && $_GET['submit_frm']=='Next' && $_GET['step']==2 && !isset($_GET['corporate']))
	{
		if($_SESSION['jcart']->get_total()==0)
		{
			header('location:index.php?page=lunch-box-menu');	
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/png" href="images/favico.png" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Catering - CorporateCatering online</title>

	<script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
	
	
	<script type="text/javascript">
		//alert('Testing');
    	window.onerror=function(msg, url, linenumber)
		{
			alert('Error message: '+msg+'\nURL: '+url+'\nLine number:'+linenumber);
		}
    
    </script>
	
    

    <script type="text/javascript" src="js/jquery.cycle.js"></script>
	<script type="text/javascript" src="fancybox/jquery.easing-1.3.pack.js"></script>
	<script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    <script type="text/javascript" src="include/autocomplete/jquery.autocomplete.js"></script>
	
    <link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.5.css" media="screen" />
    <link rel="stylesheet" href="slider/themes/default/default.css" type="text/css" media="screen" />


    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/additional-methods.min.js"></script>



	<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
	<?PHP 
		include_once('styles.php');
	?>
    <link href="css/menu.css" rel="stylesheet" type="text/css" />
    
	<script type="text/javascript">
	
	/**
 * @author Alexander Farkas
 * v. 1.02
 */
(function($) {
	$.extend($.fx.step,{
	    backgroundPosition: function(fx) {
			
            if (fx.state === 0 && typeof fx.end == 'string') {
                var start = $.curCSS(fx.elem,'backgroundPosition');
                start = toArray(start);
                fx.start = [start[0],start[2]];
                var end = toArray(fx.end);
                fx.end = [end[0],end[2]];
                fx.unit = [end[1],end[3]];
			}
            var nowPosX = [];
            nowPosX[0] = ((fx.end[0] - fx.start[0]) * fx.pos) + fx.start[0] + fx.unit[0];
            nowPosX[1] = ((fx.end[1] - fx.start[1]) * fx.pos) + fx.start[1] + fx.unit[1];
            fx.elem.style.backgroundPosition = nowPosX[0]+' '+nowPosX[1];

           function toArray(strg){
               strg = strg.replace(/left|top/g,'0px');
               strg = strg.replace(/right|bottom/g,'100%');
               strg = strg.replace(/([0-9\.]+)(\s|\)|$)/g,"$1px$2");
               var res = strg.match(/(-?[0-9\.]+)(px|\%|em|pt)\s(-?[0-9\.]+)(px|\%|em|pt)/);
               return [parseFloat(res[1],10),res[2],parseFloat(res[3],10),res[4]];
           }
        }
	});
})(jQuery);
	
		function process(v, field){
			var value = parseInt(document.getElementById(field).value);
			value+=v;
				 if(value<0) { 
			document.getElementById(field).value = 0;
			}
			else {
			document.getElementById(field).value = value;
			}
		}


	$(document).ready(function(){
		
		 $("#chechkOutNotRegisteredCatering").fancybox({
			 'width' : 600,
			 'height' : 300,
			 'opacity' : true,
			 'autoDimensions' : false,
			 'scrolling':'no',
			 'modal' : false,
			 'enableEscapeButton' : false,
			 'autoScale' : false,
			 'easingIn' : 'swing',
			 'transitionIn': 'fade', 
			 'transitionOut': 'fade',
			 'speedIn' : 600,
			 'padding': 0,
			 'onClosed': function()
			 {
				 
			 }
		 });
		
		 $("#blocked_catering_info").fancybox({
		 	 'width' : 400,
			 'height' : 180,
			 'opacity' : true,
			 'autoDimensions' : false,
			 'autoScale' : false,
			 'easingIn' : 'swing',
			 'transitionIn': 'fade', 
			 'transitionOut': 'fade',
			 'speedIn' : 600,
			 'padding': 0,
			 'scrolling':'no',
			 'modal' : false,
			 'onClosed': function()
			 {
				 //window.location.replace('index.php?clear=true');
			 }
        });
		
		/* Login box */
		
		$("#login_link").fancybox({
		 	 'width' : 311,
			 'height' : 184,
			 'opacity' : true,
			 'autoDimensions' : false,
			 'autoScale' : false,
			 'easingIn' : 'swing',
			 'transitionIn': 'fade', 
			 'transitionOut': 'fade',
			 'speedIn' : 600,
			 'padding': 0,
			 'scrolling':'no',
			 'modal' : false,
			 'onClosed': function()
			 {
				 //window.location.replace('index.php?clear=true');
			 }
        });
		
		
		var ua = $.browser;
		if(( ua.msie && ua.version.slice(0,1) == "8" ) || ( ua.msie && ua.version.slice(0,1) == "7" )) {
		  	$('.submenu').addClass('ie');
		}
		else
		{
			$('.submenu').css( {backgroundPosition: "0 0"} ).mouseover(function(){
				$(this).stop().animate(
					{backgroundPosition:"(0 -35px)"}, 
					{duration:200});
				}).mouseout(function(){
				$(this).stop().animate(
				{backgroundPosition:"(0 0)"}, 
				{duration:200});
			}); 
		}
		  

		
		
		$('.myButton:disabled').addClass('disabled');
		
		$("a.fancybox").fancybox({
			'autoDimensions'	: true
		});
	
		$(".clearForm").click(function(){
			$(this).parents('form').find('input[type="text"]').each(function(){
				$(this).val('');
			});
		});
			
        $("#finderDiv").fancybox({
		 'width' : 700,
		 'height' : 462,
		 'opacity' : true,
		 'autoDimensions' : true,
		 'autoScale' : false,
		 'easingIn' : 'swing',
		 'transitionIn': 'fade', 
		 'transitionOut': 'fade',
		 'speedIn' : 600,
		 'padding': 0,
		 'scrolling':'no',
		 'onClosed': function()
		 {
		 }
        });
		
		 $("#delivery_options").fancybox({
		 	 'width' : 420,
			 'height' : 490,
			 'opacity' : true,
			 'autoDimensions' : true,
			 'autoScale' : false,
			 'easingIn' : 'swing',
			 'transitionIn': 'fade', 
			 'transitionOut': 'fade',
			 'speedIn' : 600,
			 'padding': 0,
			 'scrolling':'no',
			 'type' : 'iframe',
			 'modal' : false,
			 'onClosed': function()
			 {
				 window.location.replace('index.php?clear=true');
			 }
        });
		
		 $("#catering_delivery_options").fancybox({
		 	 'width' : 400,
			 'height' : 180,
			 'opacity' : true,
			 'autoDimensions' : true,
			 'autoScale' : false,
			 'easingIn' : 'swing',
			 'transitionIn': 'fade', 
			 'transitionOut': 'fade',
			 'speedIn' : 600,
			 'padding': 0,
			 'scrolling':'no',
			 'type' : 'iframe',
			 'modal' : false,
			 'onClosed': function()
			 {
				 window.location.replace('index.php?clear=true');
			 }
        });
	
		 $("#blocked_pickup").fancybox({
		 	 'width' : 400,
			 'height' : 180,
			 'opacity' : true,
			 'autoDimensions' : true,
			 'autoScale' : false,
			 'easingIn' : 'swing',
			 'transitionIn': 'fade', 
			 'transitionOut': 'fade',
			 'speedIn' : 600,
			 'padding': 0,
			 'scrolling':'no',
			 'type' : 'iframe',
			 'modal' : false,
			 'onClosed': function()
			 {
				 window.location.replace('index.php?clear=true');
			 }
        });
	
	
		 $("#chechkOutNotRegistered").fancybox({
		 'width' : 600,
		 'height' : 300,
		 'opacity' : true,
		 'autoDimensions' : false,
		 'scrolling':'no',
		 'modal' : false,
		 'enableEscapeButton' : false,
		 'autoScale' : false,
		 'easingIn' : 'swing',
		 'transitionIn': 'fade', 
		 'transitionOut': 'fade',
		 'speedIn' : 600,
		 'padding': 0,
		 'onClosed': function()
		 {
			<?PHP
			if($_SESSION['UserData']['type']=='individual')
			{
				echo'window.location.replace("index.php?page=lunch-box-menu&user_type=individual");';
			}
			else
			{
				if($_SESSION['UserData']['delivery_option']=='catering')
				{
					echo'window.location.replace("index.php?page=catering-full-menu&user_type=corporate");';
				}else if($_SESSION['UserData']['delivery_option']=='same_day')
				{
					echo'window.location.replace("index.php?page=lunch-box-menu&user_type=corporate");';
				}
			}
			?>
		 }
        });
        $("#chechkOutNotRegisteredCatering").fancybox({
		 'width' : 600,
		 'height' : 300,
		 'opacity' : true,
		 'autoDimensions' : false,
		 'scrolling':'no',
		 'modal' : false,
		 'enableEscapeButton' : false,
		 'autoScale' : false,
		 'easingIn' : 'swing',
		 'transitionIn': 'fade', 
		 'transitionOut': 'fade',
		 'speedIn' : 600,
		 'padding': 0,
		 'onClosed': function()
		 {
			<?PHP
			if($_SESSION['UserData']['type']=='individual')
			{
				echo'window.location.replace("index.php?page=lunch-box-menu&user_type=individual");';
			}
			else
			{
				if($_SESSION['UserData']['delivery_option']=='catering')
				{
					echo'window.location.replace("index.php?page=catering-full-menu&user_type=corporate");';
				}else if($_SESSION['UserData']['delivery_option']=='same_day')
				{
					echo'window.location.replace("index.php?page=lunch-box-menu&user_type=corporate");';
				}
			}
			?>
		 }
        });
		
        $("#foundCompany").fancybox({
		 'width' : 600,
		 'height' : 300,
		 'opacity' : true,
		 'autoDimensions' : false,
		 'scrolling':'no',
		 'modal' : false,
		 'enableEscapeButton' : false,
		 'autoScale' : false,
		 'easingIn' : 'swing',
		 'transitionIn': 'fade', 
		 'transitionOut': 'fade',
		 'speedIn' : 600,
		 'padding': 0,
		 'onClosed': function()
		 {
			<?PHP
			if($_SESSION['UserData']['type']=='individual')
			{
				echo'window.location.replace("index.php?page=lunch-box-menu&user_type=individual");';
			}
			else
			{
				if($_SESSION['UserData']['delivery_option']=='catering')
				{
					echo'window.location.replace("index.php?page=catering-full-menu&user_type=corporate");';
				}else if($_SESSION['UserData']['delivery_option']=='same_day')
				{
					echo'window.location.replace("index.php?page=lunch-box-menu&user_type=corporate");';
				}
			}
			?>
		 }
        });
		
    });
	
	function closeFancyboxAndRedirectToUrl(url){
    	$.fancybox.close();
    	window.location = url;
	}
</script>

</head>
<body>
<script type="text/javascript">


	$(document).ready( function(){
	<?php 
			if(isset($_GET['order_option']) && $_GET['order_option']=='choose')
			{
				if(isset($_GET['cat']) && $_GET['cat']=='catering')
				{
					$_SESSION['UserData']['type']=NULL;
					$_SESSION['UserData']['delivery_option']=NULL;
				
					?>
						$('#catering_delivery_options').trigger('click');
					<?PHP
				}
				else
				{
					$_SESSION['UserData']['type']=NULL;
					$_SESSION['UserData']['delivery_option']=NULL;
				
					?>
						$('#delivery_options').trigger('click');
					<?PHP
				}
			}
			if(isset($_GET['companyName']) & !isset($_GET['page']))
			{
				$_SESSION['first_time']=true;	
			?>
				window.location.replace('index.php?page=request-a-service&<?PHP echo $_SERVER['QUERY_STRING'];?>');
			<?PHP
			}
			
			if(isset($_GET['companyName']) && isset($_GET['page']) && $_GET['page']!='request-a-service' && isset($_GET['submit_frm']) && $_GET['step']==1 && $_GET['corporate']=='0' )
			{
				$_SESSION['first_time']=true;
				if($_GET['page']=='checkout' && $_GET['submit_frm']=='Next')
				{
					if(isset($_GET['companyName'])){
						$companyName=$_GET['companyName'];
					}
					if(isset($_GET['adress'])){
						$adress=$_GET['adress'];
					}
					if(isset($_GET['zipCode'])){
						$zipCode=$_GET['zipCode'];
					}
					if(isset($_GET['companyId'])){
						$companyId=$_GET['companyId'];
					}
					
					
					
					$sql="SELECT `idComp` FROM `company` WHERE `companyName` = '".htmlspecialchars($companyName)."' AND `zipCode` = '".$zipCode."'";
					$query=mysql_query($sql);
					$numRow=mysql_num_rows($query);
					if($numRow==0){
						?>
						window.location.replace('index.php?page=request-a-service&companyName=<?PHP echo $companyName;?>');
						<?PHP
					}
					if($numRow==1)
					{
						$CompanyResult=mysql_fetch_array($query);
						setCompany($CompanyResult['idComp']);	
						$step_2 = true;
					?> 
						$('#foundCompany').trigger('click');
					<?PHP
					}
				}
			}elseif(isset($_GET['page']) && $page=="checkout" && !$_SESSION['UserData']['logged_in'] && !isset($_GET['step']) && $_SESSION['CompanyData']['id']=='')
			{
				
					if(isset($_GET['companyName'])){
						$companyName=$_GET['companyName'];
					}
					if(isset($_GET['adress'])){
						$adress=$_GET['adress'];
					}
					if(isset($_GET['zipCode'])){
						$zipCode=$_GET['zipCode'];
					}
					if(isset($_GET['companyId'])){
						$companyId=$_GET['companyId'];
					}
					$sql="SELECT `idComp` FROM `company` WHERE `companyName` = '".htmlspecialchars($companyName)."' AND `zipCode` = '".$zipCode."'";
					$query=mysql_query($sql);
					$numRow=mysql_num_rows($query);
					if($numRow==0){
						if($_SESSION['UserData']['type']=='individual')
						{
							$step_1 = true;
						?>
							$('#chechkOutNotRegistered').trigger('click');
						<?php
						}else
						{
							$step_1_catering = true;
						?>
							$('#chechkOutNotRegisteredCatering').trigger('click');
						<?php	
						}
					}
					if($numRow==1)
					{
						$CompanyResult=mysql_fetch_array($query);
						setCompany($CompanyResult['idComp']);	
						$step_2 = true;
					?> 
						$('#foundCompany').trigger('click');
					<?PHP
					}
				
			}elseif(isset($_GET['page']) && $page=="checkout" && !$_SESSION['UserData']['logged_in'] && !isset($_GET['step']) && $_SESSION['CompanyData']['id']!='')
			{
				if($_GET['page']=='checkout' && $_SESSION['CompanyData']['id']!='')
				{
					$_SESSION['first_time']=true;
					?> 
						$('#foundCompany').trigger('click');
					<?PHP
				}
			}
			
			if($_GET['page']=='checkout' && $_GET['submit_frm']=='Next' && $_GET['step']==2 && $_GET['corporate']=='1')
			{
					if(isset($_GET['companyNameCorporate'])){
						$companyName=trim(strip_tags($_GET['companyNameCorporate']));
					}
					if(isset($_GET['adressCorporate'])){
						$address=trim(strip_tags($_GET['adressCorporate']));
					}
					if(isset($_GET['zipCodeCorporate'])){
						$zip_code=trim(strip_tags($_GET['zipCodeCorporate']));
					}
					if(isset($_GET['suiteCorporate'])){
						$suite=trim(strip_tags($_GET['suiteCorporate']));
					}
					if(isset($_GET['cityCorporate'])){
						$city=trim(strip_tags($_GET['cityCorporate']));
					}
					
					$sql="SELECT `idComp` FROM `company` WHERE `companyName` = '".$companyName."' AND `zipCode` = '".$zip_code."'";
					$query=mysql_query($sql);
					$numRow=mysql_num_rows($query);
					$_SESSION['DELIVERY_CENTER_ID'] = $_GET['delivery_center_id'];
					?>
					<?PHP
					if($numRow==1)
					{
						$CompanyResult=mysql_fetch_array($query);
						setCompany($CompanyResult['idComp']);
					}
					else
					{
						setUnregisteredCompany($companyName, $address, $city, $zip_code, $suite);
					}
					?>
					//$('#foundCompany').trigger('click');
					<?PHP
			}
		
	?>
	});
</script>
<div class="trace" style="display:none;">
	<pre>
    	<?PHP
			print_r($_SESSION['UserData']);
			echo '<br />----------<br />';
			echo $_SESSION['email'];
			echo '<br />----------<br />';
			print_r($_SESSION['CompanyData']);
			echo '<br />----------<br />';
			echo 'coupon';
			print_r($_SESSION['CouponCode']);
		?>
    </pre>
</div>	

<div style="display:none;"><a id="finderDiv" href="include/homePopup.php?<?php echo $_SERVER['QUERY_STRING']; ?>"></a></div>


<div style="display:none;"><a id="blocked_catering_info" href="#blocked_catering_popup"></a></div>

<div style="display:none;">
    <div class="blocked_catering_popup popup_content_wrapper" id="blocked_catering_popup">
    	<!-- <img src="images/footer-icon-catering.png"> -->
        <h2 style="text-align:center;text-transform:uppercase;margin:20px 0; font-size:18px;">OFFICE CATERING</h2>
        <p style="text-align:center;">
        	CATERING MENU is only available for 24 hours advanced ordering.
            To order CATERING SERVICE please go back to our
            <a href="index.php?clear=true&home=yes">&lt;&lt; Home page</a> and select OFFICE CATERING
        </p>
    </div>
</div>

<div style="display:none;"><a id="delivery_options" href="ordering_options_popup.php?<?php echo $_SERVER['QUERY_STRING']; ?>"></a></div>
<div style="display:none;"><a id="catering_delivery_options" href="catering_options_popup.php?<?php echo $_SERVER['QUERY_STRING']; ?>"></a></div>
<div style="display:none;"><a id="blocked_pickup" href="blocked_pickup.php"></a></div>
<div style="display:none;"><a id="chechkOutNotRegistered" href="#step1"></a></div>
<div style="display:none;"><a id="chechkOutNotRegisteredCatering" href="#step1Catering"></a></div>
<div style="display:none;"><a id="foundCompany" href="#step2"></a></div>

<?php   include("include/header.php"); ?>
		
<?php 

	if($page=="catering-menu" || $page=="catering-full-menu")
	{
	//include("include/lunchBoxFloatingMenu.php");
?>
    <div id="submenu">
        <div id="menu">	
            <a href="index.php?page=catering-full-menu" class="<?php if($page=="catering-full-menu"){echo "activated ";}else{echo "submenu";}?>">catering menu</a>
            <a href="index.php?page=catering-menu" class="<?php if($page=="catering-menu" && $type==""){echo "activated ";}else{echo "submenu";}?>">CATERING SPECIALS</a>  
            <a href="index.php?page=catering-menu&type=desserts" class="<?php if($page=="catering-menu" && $type=="desserts"){echo "activated ";}else{echo "submenu";}?>" >Desserts &amp; Snacks</a>
            <a href="index.php?page=catering-menu&type=beverages" class="<?php if($page=="catering-menu" && $type=="beverages"){echo "activated ";}else{echo "submenu";}?>">Beverage</a>
            <!--<a href="index.php?page=request-a-quote" <?php  //if($page=="request-a-quote"){echo "class=\"activated\"";} ?>>OPEN ACCOUNT</a> -->
            <a href="pdf-menu.pdf" target="_blank" class="submenu">Download pdf menu</a>

        </div>
    </div>
<?php 
	} 
?>
        <?php if($page=="lunch-box-menu"){
		//include("include/lunchBoxFloatingMenu.php");
		if($cat=="" && $type=="")
		{
			$cat = "Salads";
		}
			?>
        <div id="flo">
	<div id="submenu" class="float">
		<div id="menu">
            <a href="index.php?page=lunch-box-menu&cat=Breakfast" class="<?php if($page=="lunch-box-menu" && $cat=="Breakfast"){echo "activated ";}else{echo "submenu";} ?> first">BREAKFAST</a>
            <a href="index.php?page=lunch-box-menu&cat=Sandwiches" class="<?php if($page=="lunch-box-menu" && $cat=="Sandwiches"){echo "activated ";}else{echo "submenu";} ?>">SANDWICHES</a>
            <a href="index.php?page=lunch-box-menu&cat=Salads" class="<?php if($page=="lunch-box-menu" && $cat=="Salads"){echo "activated ";}else{echo "submenu";} ?>">SALADS</a>
            <a href="index.php?page=lunch-box-menu&cat=Entrées" class="<?php if($page=="lunch-box-menu" && $cat=="Entrées"){echo "activated ";}else{echo "submenu";} ?>">HOT LUNCH</a>
            <a href="index.php?page=lunch-box-menu&type=desserts"  class="<?php if($page=="lunch-box-menu" && $type=="desserts"){echo "activated ";}else{echo "submenu";} ?>">SWEETS &amp; Snacks</a>
            <a href="index.php?page=lunch-box-menu&type=beverages"  class="<?php if($page=="lunch-box-menu" && $type=="beverages"){echo "activated ";}else{echo "submenu";} ?>">DRINKS</a>

        </div>
    </div>
<?php } 

if($page!=""){
?>
<div id="contentMain">
<div id="main">
<?php
}
	switch($page){
		default:
?>

<!-- NOVI HOME TEMPLATE -->

<?php if($page==""){?>

	 <?PHP
				$catering_block='';
				switch($_SESSION['UserData']['delivery_option'])
				{
					case NULL:
						$individual_url="index.php?page=lunch-box-menu&order_option=choose";
						$catering_url="index.php?order_option=choose";
					break;
					case 'free':
						$individual_url='index.php?page=lunch-box-menu&user_type=individual';
						$catering_url="index.php?user_type=individual";
						$catering_block='disabled="disabled"';
					break;
					case 'same_day':
						$individual_url='index.php?page=lunch-box-menu&user_type=corporate';
						$catering_block='disabled="disabled"';
						$catering_url="index.php?user_type=corporate";
					break;
					case 'pickup':
						$individual_url='index.php?page=lunch-box-menu&user_type=corporate';
						$catering_block='disabled="disabled"';
						$catering_url="index.php?user_type=corporate";
					break;
					case 'catering':
						$individual_url='index.php?page=lunch-box-menu&user_type=corporate';
						$catering_url="index.php?user_type=corporate";
						$catering_block='';
					break;
					
					
					
				}
			?>	

    <?php } ?>






<div class="hr"></div>


<div class="section_wrapper tribox_wrapper clearfix">
	<div class="tri_box">
		<img class="click_catering" src="images/slika1.jpg" style="width:303px;height:364px; cursor: pointer;">
	</div>
	<div class="tri_box">
		<img class="click_touch" src="images/slika2.jpg" style="width:303px;height:364px; cursor: pointer;">
	</div>
	<div class="tri_box last">
		<a href="https://corporatecateringonline.com/index.php?page=lunch-box-menu&order_option=choose" style="color: #0000EE"><img src="images/slika3.jpg" style="width:303px;height:364px; cursor: pointer;"></a>
	</div>
</div>
	<br />
<div class="section_wrapper tribox_wrapper clearfix">
	<div class="tri_box">
    	<h2 style = "text-align: center;"><!--a href="https://corporatecateringonline.com/index.php?page=catering-menu" style="color: #0000EE">CATERING</a-->
        <a href="" style="color: #0000EE" class="click_catering">TRADITIONAL CATERING</a>
        <script>
            $(".click_catering").click(function(e){
                e.preventDefault();
                $("#frm_cat").submit();
            })
        </script>
        </h2>
        <a href="javascript:void(0);" class="cat_click">
            <div class="tri_box_text">
                <h4 style="color: #ffc000;">TRAYS PLATTERS BUFFET STYLE CATERING</h4>
                <ul class="first" style="margin-left: 5px;">
                    <li>Traditional Office Catering </li>
                    <li>Gourmet Breakfast and Lunch Buffet</li>
                    <li>Professional Setup and Presentation</li>
                </ul>
                <img src="images/home-catering-menu.png" alt="" />
            </div>
        </a>
        <p>
        	Great variety and delicious hot and cold breakfast. You will love how fast and easy it is to order right here online, or over the phone. Our food setup and delivery service is unrivaled in quality and reliability. Call today or order online where you can customize orders to exactly what your office needs!
       	</p>
        <a href="https://corporatecateringonline.com/index.php?order_option=choose&cat=catering" class="more cat_click" style="margin-top:47px;">See more</a>
    </div>
	<div class="tri_box">
    	<h2 style = "text-align: center;"><!--a href="https://corporatecateringonline.com/index.php?page=lunch-box-menu&order_option=choose" style="color: #0000EE">TOUCH-LESS DELIVERY MENU
            </a-->
            <a href="" style="color: #0000EE;margin-top: 0px;display: flex; margin-left:23px;;" class="click_touch"><div style="width:75%;">TOUCH-LESS Catering</div><div style="width:20%"><span><img id="" src="images/covid-19.jpg" alt="" style="
                width: 33px;
                margin-top: -12px;
                margin-right: 15px;
                vertical-align: middle;
                "></span></div>
            </a>
            <?PHP 
                $url = 'page=lunch-box-menu&cat=Breakfast';
            ?>
            <form action="index.php?<?PHP echo $url;?>" method="post" id="touch" target="_parent" style="margin-top:-11px;">
                <input type="hidden" value="catering" name="delivery_option" />
                <input type="hidden" value="same_day" name="set_same_day" />
                
            </form>
        </h2>
        <!--a href="https://corporatecateringonline.com/index.php?page=request-a-quote" class="same_day_click"-->
        <a href="" class="click_touch">
            <div class="tri_box_text">
                <h4 style="color: #ffc000;">NO TOUCH DELIVERY Covid-19 ServSafe</h4>
                <ul>
                    <li>Individually packed and labeled items</li>
                    <li>Sanitized and 100% TOUCH-LESS</li>
                    <li>Daily Deliveries </li>
                </ul>
                <img src="images/home-daily-service.png" alt="" />
            </div>
        </a>
        <p>
        	For your safety – order selection of individually packaged items. With COVID-19 we took extreme measures to meet CDC and Health authority guidelines and recommendations and implemented new standards with NO CONTACT while cooking, and 100% CONTACT-LESS delivery.  Click below to see available menu items or order your contact-less delivery by phone at (949) 945-77022
        </p>
        <!--a href="https://corporatecateringonline.com/index.php?page=lunch-box-menu&order_option=choose" class="more same_day_click">See more</a-->
        <a href="" class="more click_touch">See more</a>
        <script>
            $(".click_touch").click(function(e){
                e.preventDefault();
                $("#touch").submit();
            })
        </script>
    </div>
    <div class="tri_box last">
    	<h2 style = "text-align: center;"><a href="https://corporatecateringonline.com/index.php?page=lunch-box-menu&order_option=choose" style="color: #0000EE">EMPLOYEE MEAL PREP</a></h2>
        <a href="index.php?page=why-ccol" class="">
            <div class="tri_box_text">
                <h4 style="color: #ffc000;">HEALTHY ALTERNATIVE TO EATING OUT</h4>
                <ul class="last">
                    <li>Daily FREE Delivery</li>
                    <li>No minimum order requirements</li>
                    <li>Pre-arranged delivery times</li>
                </ul>
                <img src="images/home-same-day-delivery.png" alt="" />
            </div>
        </a>
        <p>Chef created fresh and tasty meals that you can customize and order from your PC or phone to be delivered to your office daily. Healthy alternative to everyday eating out! Great option for large corporations and office centers. Keep your team energized and motivated <a href="https://corporatecateringonline.com/index.php?page=request-a-quote">sing up</a>  your office for this amazing service today!
        
    


       	</p>
        <a href="https://corporatecateringonline.com/index.php?page=lunch-box-menu&order_option=choose" class="more free_click" style="margin-top:25px;">See more</a>
    </div>
</div><!-- section wrapper  -->

<!--<div class="hr_break"></div>

<div class="section_wrapper tribox_wrapper clearfix">
	<div class="tri_box2 testimonials-home">
		<h2 style="padding: 0 0 0 10px;">TESTIMONIALS</h2>
        <p>
        	<img src="images/fivestars.jpg"><br /> 
       		“The other caterer cancelled my order. CDC Catering stepped in quickly and provided a great spread” 
        <br />
        <br />    
            <em>Courtney<br />Costa Mesa, CA</em>
        </p>
        <p>
        	<img src="images/fivestars.jpg"><br />
       		“Everyone enjoyed the food. Great variety and quality!” 
        <br />
        <br />    
            <em>Leo<br />Orange, CA</em>
        </p>
        <p>
        	<img src="images/fivestars.jpg"><br />
       		“Very delicious food & timely service! Thank you!” 
        <br />
        <br />    
            <em>Amanda<br />Irvine, CA</em>
        </p>
        <p>
        	<img src="images/fivestars.jpg"><br />
       		“On time, great spread. Ordered from here all week and they were awesome!” 
        <br />
        <br />    
            <em>Beth<br />Anaheim, CA</em>
        </p>
		
    </div>--><!-- tri_box -->
    
    <!--<div class="tri_box2 centered">
    	<p>
        	<img src="images/fivestars.jpg"><br /> 
       		“We use Corporate Catering Online at least 1-2 times per week, and they’ve been nothing but great and consistent. We tried most of their Entrees, and our office simply enjoyed it each and every time. Their staff is very professional and deliveries are always on time!” 
        <br />
        <br />    
            <em>Dawid W.<br />Newport Beach</em>
        </p>
        <p>
        	<img src="images/fivestars.jpg"><br />
       		“Hired CDC events catering for our daughter’s wedding and they knocked it out of the park. From A to Z they were professional, patient and accommodating, and their food is delicious. Our guests raved about their food and they fed 300+. Chefs Lu and Chef Dominique can do it all. Highly recommended” 
        <br />
        <br />    
            <em>Al Lino<br />Diamond Bar, CA</em>
        </p>
        <p>
        	<img src="images/fivestars.jpg"><br />
       		“Always good, the breakfast burritos are so fresh and always come worm” 
        <br />
        <br />    
            <em>Lindsey<br />Irvine, CA</em>
        </p>
    	
        
    </div>--><!-- tri_box -->
    <!--<div class="tri_box last testimonials-home">
    	
        <img src="images/logo_new1.png" style="width: 303px;">
	</div>--><!-- tri_box -->
</div>

<!-- NOVI HOME TEMPLATE -->


	<?php 
	break;//homepage default
	case 404:
	include("include/404.php");	
	break;
	case "lunch-box-menu":
		echo '<div id="mainContent">';
		getPage($page);
	 	include("include/jcartTop.php");
		if(!isset($type)){
			include("include/lunchBoxMenu.php");
		}
		if(isset($type)){
			echo "<div id=\"lunchBoxMenuW\">";
			//Apetizers-and-Sides
			 include("include/lunchBoxItemW.php");
			include("include/lunchBoxCat.php");
			if($_GET['type']=="desserts"){
		
				lunchBoxCat("Desserts");
			
				lunchBoxCat("Apetizers-and-Sides");
			}
			if($_GET['type']=="beverages"){
			
				lunchBoxCat("Beverages-and-other");
			}
				echo "</div>";
		}
	include("include/jcartBottom.php");
	break;
	case "catering-menu":
	if(isset($type)){
		echo '<div id="mainContent">';

		//getPage('lunch-box-menu');
	 	include("include/jcartTop.php");
		echo '<div id="lunchBoxMenuW">';
		//Apetizers-and-Sides
		 include("include/lunchBoxItemW.php");
		include("include/lunchBoxCat.php");
		if($_GET['type']=="desserts"){
	
			lunchBoxCat("Desserts");
		
			lunchBoxCat("Apetizers-and-Sides");
		}
		if($_GET['type']=="beverages"){
		
			lunchBoxCat("Beverages-and-other");
		}
			echo "</div>";
			echo "</div>";
			include("include/jcartBottom.php");
	}else
	{
	echo '<div id="mainContent">';
		include("include/cateringPage.php");
	echo '</div>';
	}
	break;
	case "why-ccol":
	getPage($page);
	break;
	case "faq":
	getPage($page);
	break;
	case "contact-us":
	getPage($page);
	echo '<div id="mainContent">';
	staticPages($page);
	echo '</div>';
	break;
	case "terms-and-policies":
	getPage($page);
	break;
	case "request-a-quote":
		echo '<div id="mainContent">';
		staticPages($page);
		echo '</div>';
	break;
	case "request-a-service":
		echo '<div id="mainContent">';
		staticPages($page);
		echo '</div>';
	break;
	case "catering-full-menu":
	echo '<div id="mainContent">';
	include("include/cateringFullMenu.php");
	echo '</div>';
	break;
	case "checkout":
	echo '<div id="mainContent">';
	include("include/checkout.php");
	echo '</div>';
	break;
	case "register":
	echo '<div id="mainContent">';
	include("include/register.php");
	echo '</div>';
	break;
	case "login":
	if(isset($_GET['rel'])){
		$rel=$_GET['rel'];
		login($_GET['email'], $_GET['password']);
		}
	if(!isset($_GET['rel'])){
		login ($_POST['email'], md5($_POST['password']));
	}
	break;
	
	case "reset":
		
		if(isset($_POST['email']) && isset($_POST['submit-reset']) && is_numeric($_POST['submit-reset']) && isset($_POST['reset']) && is_numeric($_POST['reset']))
		{
			$email_reset = trim(strip_tags($_POST['email']));
			reset_password($email_reset);
		}
	break;
	
	case "logout":
	logout();
	break;
	case "myAccount":
	echo '<div id="mainContent">';
	include("include/myAccount.php");
	echo '</div>';
	break;
	case "billing":
	echo '<div id="mainContent">';
	include("include/myBillingInfo.php");
	echo '</div>';
	break;
	
	} ?>
  </div>
<?php 

if($page!=""){
?>
</div>
</div>
<?php
}

include('include/footer.php');
?>


</body>
</html>