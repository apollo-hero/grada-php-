<?PHP
	include('include/cateringOrder/jcart/jcart.php');	
	include("admin/include/confing.php");
	include("admin/include/dbconnect.php");
	include("include/user.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Delivery Options</title>

<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<?PHP 
		include_once('styles.php');
?>
<link rel="stylesheet" href="slider/themes/default/default.css" type="text/css" media="screen" />
<script type="text/javascript" src="js/jquery.validate.js"></script>

</head>

<body>
	<div id="options" class="clearfix">
    	<h2>SELECT YOUR DELIVERY OPTION</h2>
        <ul class="clearfix">
			 <li class="first">
             	<div class="clearfix">
                    <div class="option_image">
                        <a href="pdf-menu-v-3.pdf" target="_blank"><img src="images/footer-icon-catering.png" /></a>
                    </div>
                    <div class="option_text">
                        <h2><a href="javascript:void(0);" class="cat_click" style="">CATERING</a></h2>
                        <ul class="list">
                                <li>Min. order $250 or 25pp. for some items</li>
                                <li>24h advanced ordering required</li>
                                <li>With any questions please call (949) 945 7702</li>
                                <!--<li><a href="index.php?page=request-a-quote" target="_parent">Corporate Accounts</a> &amp; Pay by company check</li>-->                            
                        </ul>
                    </div>
                    <div class="clearfix menu_btn_box">
						<script type="text/javascript">
                            $(document).ready( function(){
                                $('.cat_click').click(function(){
                                    $('#frm_cat').submit();
                                });
                            });
                        </script>
                        <form action="index.php" method="get" id="frm_cat" target="_parent">
                            <input type="hidden" value="choose" name="order_option" />
                            <input type="hidden" value="catering" name="cat" />
                            <input type="submit" value="SEE OUR MENU" class="myButton" />
                        </form>
                    </div>
                </div>
            </li>
           
            <li>
            	<div class="clearfix">
                    <div class="option_image">
                        <a href="pdf-menu-v-3.pdf" target="_blank"><img src="images/footer-icon-open.png" /></a>
                    </div>
                    <div class="option_text">     
                        <h2><a href="pdf-menu-v-3.pdf" target="_blank">POP-UP CAFÉ</a></h2>
                        <ul class="list">
                            <li>Daily, Weekly, Short or Long Term</li>
                            <li>Variety of Menu Items</li>
                            <li>Accepting Credit Cards and Cash Payments</li>
                            <li>Call Us To Set up your first POP UP <br>Tel. (949) 945-7702</li>
                        </ul>


                        
                        <!--<a href="javascript:void(0);" class="pickup">for PICKUP click here</a>-->
                        
                  	</div>
                    <div class="clearfix menu_btn_box">
						<?PHP 
                            $url = 'page=lunch-box-menu';
                            
                        ?>
                        <script type="text/javascript">
                            $(document).ready( function(){
                                $('.same_day_click').click(function(){
                                    $('#frm_same_day').submit();
                                });
                                $('.pickup').click(function(){
                                    //$('#frm_pickup').submit();
                                });
                            });
                        </script>
                        <form action="index.php?<?PHP echo $url;?>" method="post" id="frm_same_day" target="_parent">
                            <input type="hidden" value="same_day" name="delivery_option" />
                            <input type="hidden" value="1" name="clear" />
                            <input type="hidden" value="same_day" name="set_same_day" />
                            <input type="submit" value="ORDER NOW" class="myButton" />
                        </form>
                        <form action="index.php?<?PHP echo $url;?>" method="post" id="frm_pickup" target="_parent">
                            <input type="hidden" value="pickup" name="delivery_option" />
                            <input type="hidden" value="1" name="clear" />
                            <input type="hidden" value="same_day" name="set_same_day" />
                        </form>
                    </div>
              	</div>            
            </li>
            
            <li class="last">
            	<div class="clearfix">
                    <div class="option_image">
                		<a href="javascript:void(0);" class="free_click"><img style="margin-left:0;" src="images/footer-icon-delivery.png" /></a>
                  	</div>
                	<div class="option_text">          
                		<h2><a href="javascript:void(0);" class="free_click" style="padding-left:0;">EMPLOYEES MEAL PREP</a></h2>
                        <ul class="list">
                            <li>NO MINIMUM ORDER REQUIREMENT</li>
                            <li>24/7 online ordering, midnight cut off time</li>
                            <li>Delivery next day at your office/locations prearranged delivery times</li>
                            <li><a href="/index.php?page=why-ccol" target="_parent">Find out more</a> &amp; <a href="/index.php?page=request-a-service" target="_parent">Apply for this Service</a></li>
                        </ul>
                	</div>
                    <div class="clearfix menu_btn_box">
						<script type="text/javascript">
                            $(document).ready( function(){
                                $('.free_click').click(function(){
                                    $('#frm_free').submit();
                                });
                            });
                        </script>
                        
                        <form action="index.php?page=lunch-box-menu&cat=Salads" method="post" id="frm_free" target="_parent">
                            <input type="hidden" value="free" name="delivery_option" />
                            <input type="hidden" value="same_day" name="set_same_day" />
                            <input type="hidden" value="1" name="clear" />
                            <input type="submit" value="ORDER HERE" class="myButton" />
                        </form>
                    </div>
              	</div>              
            </li>
        </ul>
    </div>
</body>
</html>