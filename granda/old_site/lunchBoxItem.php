<?php
if(isset($_GET["idLunchBox"])){
	$idLunchBox=$_GET["idLunchBox"];
	include_once('include/cateringOrder/jcart/jcart.php');
	include("admin/include/confing.php");
	include("admin/include/dbconnect.php");
	include("include/user.php");
	include("include/lunchBoxDropDown.php");
	include("include/lunchBoxaddons.php");	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lunch Box - CorporatelunchBox online</title>
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="fancybox/jquery.easing-1.3.pack.js"></script>
	<script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<script type="text/javascript" src="include/cateringOrder/jcart/js/jcart.js"></script>
	<script type="text/javascript" src="js/jCartItemManager.js"></script>
    <link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.4.css" media="screen" />
    <link href="style_1.css" rel="stylesheet" type="text/css" />
    <link href="include/cateringOrder/jcart/css/jcart.css" rel="stylesheet" type="text/css" />
    

<script type="text/javascript">

$(document).ready( function(){
	$('.myButton:disabled').addClass('disabled');	
});

</script>
</head>
<body style="padding:0; margin:0;">
			 
    <div id="cateringPopup">
	<?php
	if(strlen($idLunchBox)>0)
	{
		$sql="SELECT `idLunchBox`, `lunchBoxName`, `lunchBoxDesc`, `lunchBoxImg`, `lunchBoxPrice`, `lunchBoxStatus`, `lunchBoxCategory` FROM `lunchbox` WHERE `idLunchBox`= '".$idLunchBox."'";
		$qry=mysql_query($sql) or die ("An error occurred when performing queries. Error is:".mysql_error());
		$num=mysql_num_rows($qry);
		if($num==0){
			echo "<div class=\"noticebox\">No results.</div>";
		}
		if($num!=0){
			//ima rezultata
			
			
			$dis=mysql_fetch_array($qry);
			//$imageBg=ROOT_URL.UPLOAD_DIR_PHOTOS.'mediums/'.$dis["lunchBoxImg"];
			$imageBg=ROOT_URL.UPLOAD_DIR_PHOTOS."customize_imgs/".$dis["lunchBoxImg"];
			
			 if($dis["lunchBoxStatus"]=="new")
			{
				$out=0;
			}
			if($dis["lunchBoxStatus"]=="out")
			{
				$out=1;
			}
			if($dis["lunchBoxStatus"]=="special")
			{
				$out=0;
			}
			if($dis["lunchBoxStatus"]=="")
			{
				$out=0;
			}
	?>
            
            
            <div id="customizeLunchBoxMenuItem">
                <form class="jcart main" action="" method="post">
                    <fieldset>
                        <input type="hidden" name="jcartToken" value="<?php echo $_SESSION['cateringOrder'];?>" class="jcartToken" />
                        <input type="hidden" name="typeUser" value="<?PHP echo $_SESSION['UserData']['type'];?>" id="typeUserField" />
                        <input type="hidden" name="my_item_id" value="lunch-box-menu-item-<? echo $dis["idLunchBox"];?>" class="my-item-id" />
                        <input type="hidden" name="my_item_qty" class="my-item-qty" value="1" />
                        <input type="hidden" name="my_item_name" value="<?php echo $dis["lunchBoxName"];?>" class="my-item-name" />
                        <input type="hidden" name="my_item_price" value="<?php echo $dis["lunchBoxPrice"];?>" class="my-item-price" />
                        <input type="hidden" name="my_item_type" value="meal" class="my-item-type" />
                        <input type="hidden" name="my_item_parent_id" value="-1" class="my-item-parent-id" />
                        <input type="hidden" name="my_item_add" class="my-item-add" value="1" /> 
                        <input type="hidden" name="lunch_box_id" class="lunch-box-id" value="<?PHP echo $dis["idLunchBox"];?>" />
                    </fieldset>
                </form>
            
                <div class="customize_wrapper_left">
                    <div class="item_info_wrapper">
                    	
                        <h2><?php echo $dis["lunchBoxName"];?><span class="price_wrapper"><?php echo $dis["lunchBoxPrice"]==0 ? ' - various' : '- $ '.$dis["lunchBoxPrice"] ;?> </span></h2>
                      
                        <p><?php echo $dis["lunchBoxDesc"];?></p>
                    </div>
                    <div class="clearfix">
                    <div class="first">
                        <?php
						if($dis["lunchBoxCategory"]=='Sandwiches')
						{
                        	showDD('sandwich', $dis["idLunchBox"]);
						}
						else
						{
							showDD(1, $dis["idLunchBox"]);
						}
						?>
                    </div>
                    <div class="second">
                        <?php
                        showDD(2, $dis["idLunchBox"]);
                        ?>
                    </div>
                    </div>
                    <div id="customizeOrder">
                        <div class="customize_form_wrapper">
                            <form class="jcart" action="" method="post">
                                <fieldset>
                                	<label>Custom kitchen message: </label><input name="customizeOrderB" type="text" id="customizeOrderB" value="e.g. light on mayo, no onion" maxlength="30" class="light" style="width:180px;"/>
                                    
                                       <!-- <span class="custom_price">* Using this option will automatically add $1.00 to your total.</span> -->
                                    
                                    <input type="hidden" name="jcartToken" value="<?php echo $_SESSION['cateringOrder'];?>" class="jcartToken" />
                                    <input type="hidden" name="my_item_id" value="custom-kitchen-messsage-<? echo $dis["idLunchBox"];?>" class="my-item-id" />
                                    <input type="hidden" name="my_item_qty" class="my-item-qty" value="0" />
                                    <input type="hidden" name="my_item_name" value="Custom Kitchen Message" class="my-item-name" />
                                    <input type="hidden" name="my_item_price" value="0" class="my-item-price" />
                                    <input type="hidden" name="my_item_type" value="addon" class="my-item-type" />
                                    <input type="hidden" name="my_item_parent_id" value="lunch-box-menu-item-<? echo $dis["idLunchBox"];?>" class="my-item-parent-id" /> 
                                    <input type="hidden" name="my_item_add" class="my-item-add" value="0" /> 
                                </fieldset>
                            </form>
                        </div><!--customize_form_wrapper-->
                        
                    </div><!--customizeOrder-->
                    <?
                    	if($dis["lunchBoxCategory"]=='Salads')
						{
					?>
                    <div id="makeItMeal">
                        <div class="customize_form_wrapper">
                            <form class="jcart" action="" method="post">
                                <fieldset>
                                	<input type="hidden" id="my-item-price-settings" value="<?PHP echo $_SESSION['MISC_SETTINGS']['make_it_a_meal_price'];?>" />

                                	<input type="checkbox" id="chkMakeItMeal" /><label for="chkMakeItMeal">Make it a meal size (+$<?PHP echo $_SESSION['MISC_SETTINGS']['make_it_a_meal_price'];?>)</label>
                                   	<span class="custom_price">Meal size salad includes larger serving size box, and 8oz. of selected protein, and side of bread and butter.</span>
                                    
                                    <input type="hidden" name="jcartToken" value="<?php echo $_SESSION['cateringOrder'];?>" class="jcartToken" />
                                    <input type="hidden" name="my_item_id" value="make-it-meal-<? echo $dis["idLunchBox"];?>" class="my-item-id" />
                                    <input type="hidden" name="my_item_qty" class="my-item-qty" value="0" />
                                    <input type="hidden" name="my_item_name" value="Make it a meal size" class="my-item-name" />
                                    <input type="hidden" name="my_item_price" value="0" class="my-item-price" />
                                    <input type="hidden" name="my_item_type" value="addon" class="my-item-type" />
                                    <input type="hidden" name="my_item_parent_id" value="lunch-box-menu-item-<? echo $dis["idLunchBox"];?>" class="my-item-parent-id" /> 
                                    <input type="hidden" name="my_item_add" class="my-item-add" value="0" /> 
                                </fieldset>
                            </form>
                        </div><!--customize_form_wrapper-->
                        
                    </div><!--customizeOrder-->
                    <?
						}
					?>
                    
                    <?
                    	if($dis["lunchBoxCategory"]=='Sandwiches')
						{
					?>
                    <div id="makeItMeal">
                    	<div class="first">
                        
                            <div class="customize_form_wrapper">
                                <form class="jcart" action="" method="post">
                                    <fieldset>
                                    	<input type="hidden" id="my-item-price-settings-wrap" value="<?PHP echo $_SESSION['MISC_SETTINGS']['wrap_my_sandwich_price'];?>" />
                                        <label for="chkWrapMySandwich" style="width:200px;"><input type="checkbox" id="chkWrapMySandwich" />Wrap my sandwich (+$<?PHP echo str_replace('.00','',$_SESSION['MISC_SETTINGS']['wrap_my_sandwich_price']);?>)</label>
                                        <input type="hidden" name="jcartToken" value="<?php echo $_SESSION['cateringOrder'];?>" class="jcartToken" />
                                        <input type="hidden" name="my_item_id" value="wrap-my-sandwich-<? echo $dis["idLunchBox"];?>" class="my-item-id" />
                                        <input type="hidden" name="my_item_qty" class="my-item-qty" value="0" />
                                        <input type="hidden" name="my_item_name" value="Wrap my sandwich" class="my-item-name" />
                                        <input type="hidden" name="my_item_price" value="0" class="my-item-price" />
                                        <input type="hidden" name="my_item_type" value="addon" class="my-item-type" />
                                        <input type="hidden" name="my_item_parent_id" value="lunch-box-menu-item-<? echo $dis["idLunchBox"];?>" class="my-item-parent-id" /> 
                                        <input type="hidden" name="my_item_add" class="my-item-add" value="0" /> 
                                    </fieldset>
                                </form>
                            </div><!--customize_form_wrapper-->
                        </div>
                        <div class="second">
                            <?php
                                showDD('wrap', $dis["idLunchBox"]);
                            ?>
                        </div>
                    </div>    
                    <?
						}
					?>
                    <div id="makeItMeal">
                        <h3 margin:10px 0 0 0;">Add-ons:</h3>
                    </div>
					<div class="upsale clearfix">
                        <div class="first">
                            <?php
                            showDD(3, $dis["idLunchBox"]);
                            ?>
                        </div>
                        <div class="second">
                            <?php
                            showDD(4, $dis["idLunchBox"]);
                            ?>
                        </div>
                        <div class="first">
                            <?php
                            showDD(5, $dis["idLunchBox"]);
                            ?>
                        </div>
                        <div class="second">
                            <?php
                            showDD(6, $dis["idLunchBox"]);
                            ?>
                        </div>
                    </div>
                    <div class="customize_form_submit">
  	                     <div style="width:220px; margin:0 auto;" class="clearfix">
                             <div style="float:left;"><label>Quantity: </label><a class="decrease" id="decreaseLunchBox" href="javascript:void(0);">-</a><input type="text" value="1" id="package_quantity" class="lunchBoxQuantity" size="3"/><a class="increase" id="increaseLunchBox" href="javascript:void(0);">+</a></div><div style="float:left;"> 
                             <!--<div class="customLunchBoxDivider"></div>-->
                             <a class="submit_customization myButton" <?php echo $out==1 ? " disabled=disabled" : ""; ?> href="javascript:void(0);" >Add to order</a></div>
                         </div>
                    </div>
                    <div class="thanks">
                        <h3>Thank you for being our customer!</h3>
                    </div>
                </div><!--customize_wrapper_left-->
                <div class="customize_wrapper_right" style="background:url(<?php echo $imageBg; ?>) no-repeat top left;">
                    <div class="disclamer">
                        <p>Disclaimer: All pictures are representing actual food that you are purchasing. All food items are delivered in disposable containers or paper bags. Pictures are staged and photo-shopped for overall website presentation. For the most accurate product description please refer to the ingredients list.</p>
                    </div>
                </div>
            </div><!-- customizeLunchBoxMenuItem-->
				<?php 
			}//ima rezultata
	}
	else 
	{ 
		echo "<div class=\"warningbox\">You did not choose a Lunch Box Packgage to edit.</div>";
	}

?>
</div><div id='jcart-tooltip'></div>
</body>
</html>
<?php } ?>