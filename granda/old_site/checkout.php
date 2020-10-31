<script src="https://maps.google.com/maps?file=api&v=2&key=AIzaSyBbTNMsngbVYEmyVC1qLIKNarSaDblFGUo" type="text/javascript"></script>
<script src="js/calc_distance_v1.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready( function(){
	var individual = true;
	var address_verified = true;
	
	var delivery_radius = <?PHP echo $_SESSION['MISC_SETTINGS']['delivery_radius'];?>;		
	var centers_array = new Array (<?PHP echo $_SESSION['DELIVERY_CENTERS_JS'];?>);
	

	var delivery_locations = new Array();
	
	for(var i=0; i<centers_array.length; i=i+3)
	{
		var id = centers_array[i];
		var address = centers_array[i+2];
		getLocation(id, address, save_loc_callback);
	}
	
	function save_loc_callback(status, id)
	{
		delivery_locations.push(id);
		delivery_locations.push(status);
	}

	
	var destination_location = null;
	
	function showLocation(destination_address) 
	{
		getLocation(-1, destination_address, save_dest_callback);
	}
	

	function save_dest_callback(status, id)
	{
			destination_location = status;
			shortest();
	}
	
	function shortest()
	{
		
		var distances = new Array();
		if(destination_location!='error')
		{
			for(var i=0; i<delivery_locations.length; i=i+2)
			{		
				status = calcMileDistance(destination_location, delivery_locations[i+1]);
				if(status!='error')
				{
					distances.push(delivery_locations[i], status);
				}
			}
				
				var shortest = getShortest(distances, delivery_radius);
				
				if(shortest!='error')
				{
					
					$('.delivery_center_id').val(shortest);
					$('#verify_catering').submit();
				}
				else
				{
					$('.results').html('<h2 style="font-size:14px; margin-top:0; color:#EFAC00;">Unfortunately our online ordering service is not available at your location. Please call 949-945-7702 or email us at <a href="mailto:info@corporatecateringonline.com">info@corporatecateringonline.com</a> to find out more or to place an order.</h2>');
		$('.corporate_register').hide();
		address_verified =  false;	
				}
	
		}
		else
		{
			alert ('Error getting destination location');
		}	
	}
	
	
	$('#verify_location').click( function(event)
	{	
		event.preventDefault();
		if($('#verify_catering').valid())
		{
			
			var destination_address = $('#companyNameCorporate').val()+', '+$('#adressCorporate').val()+', '+$('#cityCorporate').val()+', '+$('#zipCodeCorporate').val()+', USA';
			showLocation(destination_address);
		}
	});
	$('#zipCodeCorporate').keypress(function(event) {
		
		  if ( event.which == 13 ) {
			event.preventDefault();  
			if($('#verify_catering').valid())
			{
				var destination_address = $('#companyNameCorporate').val()+', '+$('#adressCorporate').val()+', '+$('#cityCorporate').val()+', '+$('#zipCodeCorporate').val()+', USA';
				showLocation(destination_address);
			}
		  }
	});
});
</script>	

<script type="text/javascript">
	$(document).ready(function(){
		$('#agree').click(function() {
			var satisfied = $('#agree:checked').val();
			if (satisfied != undefined) 
			{
				$('#continue').removeAttr('disabled');
			}
			else 
			{
				$('#continue').attr('disabled', 'disabled');
			}
		});
		
		$("#checkout_form").validate({
			messages: {
				fname: {
					required: ' Required field'
				},
				lname: {
					required: ' Required field'
				},
				email: {
					required: ' Required field'
				},
				deliveryTimeCorp: {
					required: ' Required field'
				}
			}		
		});
		$("#verify_catering").validate({
			messages: {
				companyNameCorporate: {
					required: ' *'
				},
				adressCorporate: {
					required: ' *'
				},
				cityCorporate: {
					required: ' *'
				},
				zipCodeCorporate: {
					required: ' *'
				}
			}		
		});
		
		$('#specialInstructionsDelivery').focus(function(){
			if($(this).val()=='Special Instructions/Notification Messages for Delivery Personnel, please enter it here:')
			{
				$(this).val('');
				$(this).removeClass('light');	
			}
		});
		$('#specialInstructionsDelivery').blur(function(){
			if($(this).val()=='')
			{
				$(this).val('Special Instructions/Notification Messages for Delivery Personnel, please enter it here:');	
				$(this).addClass('light');
			}
		});
	});
	<?PHP
	if($_SESSION['UserData']['delivery_option']==NULL)
	{
		echo 'window.location.replace("index.php")';	
	}
	?>
</script>
<?PHP
		
	
		if(isset($_GET['step']))
		{
			$step=$_GET['step'];
		}
		if(!isset($_GET['step']))
		{
			$step=1;
		}
        $queryString = "";
        $count = 0;
        $sum = 0;
		
        if($_SESSION['UserData']['logged_in'])
        {
			
            if(!isset($_GET['step']))
            {
                $step=2;
				
            }
            $idComp = $_SESSION['UserData']['company_id'];
			
			if($_SESSION['UserData']['delivery_option']=='free' && ($_SESSION['UserData']['company_id']==0 || $_SESSION['UserData']['company_id']==NULL) )
			{
				echo "<div style=\"display:none;\">";
	 			//header ("Location: index.php?page=checkout");
	 			echo "</div><meta http-equiv=\"refresh\" content=\"0;url=index.php?page=request-a-service\"> Your company is not registered for FREE DELIVERY PROGRAM<br />Redirecting...";
			}
			
        }
        
		/*
		proverava da li je submitovana forma za trazenje kompanije	
		
		
		*/
		if($_GET['companyId']){
			$companyId = $_GET['companyId'];
		}
		if($_GET['companyName']){
			$companyName = $_GET['companyName'];
		}
		if($_GET['adress']){
			$adress = $_GET['adress'];
		}
		if($_GET['zipCode']){
			$zipCode = $_GET['zipCode'];
		}
		if(strlen($companyName)>0){
			$walk=1;
		}
        switch($step)
        {
            default:
            break;
            case 2:
		
		
		if(isset($_GET['delivery_center_id']))
		{
			$_SESSION['delivery_center_id'] = trim(strip_tags($_GET['delivery_center_id']));
			$sql = "SELECT * FROM `delivery_center` WHERE `id`='".$_SESSION['delivery_center_id']."'";
			$result=$result=mysql_query($sql)  or die ("An error occurred when getting saved settings.");
			
			while ($row = mysql_fetch_array($result))
			{
				$_SESSION['delivery_center'] = $row['name'];
				$_SESSION['delivery_center_address'] = $row['address'];	
			}
			 
		}
		
		if(isset($_GET['deliveryTime']))
		{
			$_SESSION['UserData']['routecomp_id'] =  trim(strip_tags($_GET['deliveryTime']));
			
			foreach($_SESSION['CompanyData']['delivery_times'] as $delivery_time)
			{
				if($delivery_time['routecomp_id'] == $_SESSION['UserData']['routecomp_id'])
				{
					$_SESSION['delivery_time'] = date('g:iA',strtotime($delivery_time['time_in'])).' - '.date('g:iA',strtotime($delivery_time['time_out']));
				}
			}
		}
		
		if(isset($_POST['email']) && isset($_POST['fname']) && isset($_POST['lname']))
		{	
			$email = trim(strip_tags(urldecode($_POST['email'])));
			$fname = trim(strip_tags(urldecode($_POST['fname'])));	
			$lname = trim(strip_tags(urldecode($_POST['lname'])));

			$userArray = array
			(	
				'id'				=> NULL,
				'email'				=> $email,
				'first_name'		=> $fname,
				'last_name'			=> $lname,
				'type'				=> $_SESSION['UserData']['type'],
				'company_name'		=> $_SESSION['CompanyData']['name'],	
				'address'			=> $_SESSION['CompanyData']['address'],
				'zip_code'			=> $_SESSION['CompanyData']['zip_code'],
				'company_id'		=> $_SESSION['CompanyData']['id'],
				'telephone'			=> $_SESSION['UserData']['telephone'],
				'fax'				=> '',		
				'city'				=> $_SESSION['CompanyData']['city'],
				'suite'				=> $_SESSION['CompanyData']['suite'],
				'notification'		=> $_SESSION['UserData']['notification'],
				'routecomp_id'      => $_SESSION['UserData']['routecomp_id'],
				'delivery_option'      => $_SESSION['UserData']['delivery_option'],
				'logged_in'			=> false
			);
			$_SESSION['UserData'] = $userArray;
		}	
?>
    <link rel="stylesheet" type="text/css" media="screen, projection" href="include/cateringOrder/jcart/css/jcart.css" />

    
	<?php
	if(isset($_GET['companyId']) && $_GET['companyId']!='' && is_numeric($_GET['companyId']))
	{
		$idComp=$_GET['companyId'];
		setCompany($idComp);
	}
	
	if(isset($_GET['idComp']) && $_GET['idComp']!='' && is_numeric($_GET['idComp']))
	{
		$idComp=$_GET['idComp'];
		setCompany($idComp);
	}
	?>

<div class="form checkout_wrapper">
    <div class="checkout_form_wrapper">
        <form action="index.php?page=checkout&step=4&idComp=<?php echo $idComp; ?>" method="post" enctype="multipart/form-data" id="checkout_form">
         <!--datepicker-->
            <input type="hidden" id="jcart-is-checkout" value="true" />	
            <script type="text/javascript">
                $(document).ready(function() {
                    
					
					<?PHP
					if($_SESSION['UserData']['delivery_option']=='catering' || $_SESSION['UserData']['delivery_option']=='free')
					{
					?>  
						$("#dateDelivery" ).datepicker({
							inline: true,
							dateFormat: 'DD, d MM yy',
							showOn:'both',
							minDate: 2, maxDate: "+1M +10D",
							beforeShowDay: function(date) {
								return [(date.getDay() == 1 || date.getDay() == 2 || date.getDay() == 3 || date.getDay() == 4 || date.getDay() == 5 || date.getDay() == 6), ''];
							}//beforeShowDay
						});
					<?PHP
					}
					?>
					$('#radio_breakroom, #radio_email').click( function(){
						if($(this).is(':checked'))
						{
							$('#phone_wrapper').hide();
							$('#other_wrapper').hide();
						}
					});
					

					$('#radio_phone').click( function(){
						if($(this).is(':checked'))
						{
							$('#phone_wrapper').show();
							$('#other_wrapper').hide();
						}
					});
					
					$('#radio_other').click( function(){
						if($(this).is(':checked'))
						{
							$('#other_wrapper').show();
							$('#phone_wrapper').hide();
						}
					});
					
					
					
					
                });
				
				
            </script>
           <?php
                        
                //ako postoji routeId pravim upit za MySQL da vidim da li i tamo postoji
			
				
            ?>
            <div class="half_form_wrapper">
            	<div class="form_header">
                	<h3><strong>ORDERED BY:</strong></h3>
                </div>
                <div class="form_body">
                        <div class="row">
                            <div class="text">
                                <label>First Name:</label>
                                <span id="checkout_first_name_required">
                                	<input style="width:210px;" type="text" id="fname" name="fname" value="<? echo $_SESSION['UserData']['first_name'];?>" class="required" />
                              	</span>      
                            </div>
                        </div>
                        <div class="row">
                            <div class="text">
                                <label>Last Name:</label>
                                <span id="checkout_last_name_required">
                                	<input style="width:210px;" type="text" id="lname" name="lname" value="<? echo $_SESSION['UserData']['last_name'];?>" class="required"/>
                                </span>    
                            </div>
                        </div>
                        <div class="row">
                            <div class="text">
                                <label>E-mail:</label>
                                <span id="checkout_email_required">
                                	<input style="width:210px;" type="text" id="emailchkout" name="email" value="<? echo $_SESSION['UserData']['email'];?>" class="required email"/>
                                </span>
                            </div>
                        </div>
                        
                        
                    <?PHP 

					if($_SESSION['UserData']['type']=="individual")
					{
					?>
                    
                   			<div class="row">
                            	<div class="text">&nbsp;</div>
                            </div>
                            <div class="row">
                                <h3>Delivery notification options:</h3>
                                <?PHP
                                if($_SESSION['UserData']['notification']=='e-mail')
                                {
                                    $chek1='checked';	
                                    $chek2='';
									$chek3='';
									$chek4='';
									$style ='display:none;';
									$style1 ='display:none;';
                                }
                                else if($_SESSION['UserData']['notification']=='phone')
                                {
                                    $chek3='checked';
                                    $chek1='';
									$chek2='';
									$chek4='';
									$style ='';
									$style1 ='display:none;';
                                }else if($_SESSION['UserData']['notification']=='break_room')
                                {
                                    $chek2='checked';
                                    $chek1='';
									$chek3='';
									$style ='display:none;';
									$style1 ='display:none;';
                                }else if($_SESSION['UserData']['notification']=='other')
                                {
                                    $chek4='checked';
                                    $chek3='';
									$chek2='';
									$chek1='';
									$style ='display:none;';
									$style1 ='';
                                }else
                                {
                                    $chek1='checked';
                                    $chek3='';
									$chek2='';
									$chek4='';
									$style ='display:none;';
									$style1 ='display:none;';
                                }
                                ?>
                   			</div>
                    		<div class="row">             
                                <div class="radio">
                                    <label for="radio_email" style="font-size:13px;"><input name="notification" type="radio" value="E-mail" class="radio" id="radio_email" <?PHP echo $chek1;?>/>My company's internal E-mail system</label>
                                </div>
							</div>
                    		<div class="row">
                                <div class="radio">
									<label for="radio_breakroom" style="font-size:13px;"><input name="notification" type="radio" value="Break room" class="radio" id="radio_breakroom" <?PHP echo $chek2;?>/>Pre-arranged delivery spot pickup</label>
                                </div>
							</div>
                            <div class="row">
                                <div class="radio">
									<label for="radio_phone" style="font-size:13px;"><input name="notification" type="radio" value="Phone" class="radio" id="radio_phone" <?PHP echo $chek3;?>/>By phone</label>
                                </div>
							</div>
                            <div class="row" id="phone_wrapper" style=" <?php echo $style;?> ">    
                                <div class="text">
                                    <span id="sprytextfieldphone">
                                        <label>Phone number:</label>
                                        <input name="telephone" id="telephone" type="text" value="<?PHP echo $_SESSION['UserData']['telephone'];?>" />
                                        
                                    </span>
                                </div>
                            </div><!-- row -->
                            <div class="row">
                                <div class="radio">
									<label for="radio_other" style="font-size:13px;"><input name="notification" type="radio" value="Other" class="radio" id="radio_other" <?PHP echo $chek3;?>/>Other</label>
                                </div>
							</div>
                            
                            <div class="row" id="other_wrapper" style=" <?php echo $style1;?> ">    
                                <div class="text">
                                    <span id="sprytextfieldphone">
                                        <label>Enter delivery request:</label>
                                        <input name="other_delivery_option" id="other_delivery_option" type="text" value="" size="20" />
                                    </span>
                                </div>
                            </div><!-- row -->
                 	<?PHP
					}
					else if($_SESSION['UserData']['type']=='corporate')
					{
					
						if($_SESSION['UserData']['delivery_option']=='pickup')
						{
					?>		
							<div style="clear:both; padding:10px 0 0 0;">
                            	<div class="form_header">
                                	<h3>YOUR PICKUP LOCATION ADDRESS:</h3>
                                </div>
                                <div class="row" style="margin-bottom:0;">
                                    
                                    <h3 style="font-size:15px; padding:10px;"><?PHP echo $_SESSION['delivery_center'];?><br />
									<?PHP echo str_replace(',','<br />', $_SESSION['delivery_center_address']);?></h3>
                                </div>
                            </div>
                  	<?PHP      
						}
						else
						{												
					?>
                        <div style="clear:both; padding:10px 0 0 0;">
                            <div class="row" style="margin-bottom:0;">
                                <textarea name="message" cols="" rows="" style="height:110px; padding:3px; width:299px;" id="specialInstructionsDelivery" class="light">Special Instructions/Notification Messages for Delivery Personnel, please enter it here:</textarea>
                            </div>
                        </div>
                    <?php
						}
                    }?>
                   <input type="hidden" name="first" value="1" />
					            
                            
                </div><!--form_body-->
             </div>
             <div class="half_form_wrapper">
                    <div class="form_header">
                    	<h3><strong>DELIVER TO:</strong></h3>
                    </div>
                    <div class="form_body">
                    	 <h3><?PHP echo htmlspecialchars_decode($_SESSION['CompanyData']['name']);?></h3>	
                    	 <div class="">
                            <div class="row">    
                                <h3 style="font-size:15px;"><?PHP echo $_SESSION['CompanyData']['address'];?>, Suite <?PHP echo $_SESSION['CompanyData']['suite'];?></h3>
                            </div>	 
                            <div class="row">    
                                <h3 style="font-size:15px;"><?PHP echo $_SESSION['CompanyData']['city'];?>, <?PHP echo $_SESSION['CompanyData']['zip_code'];?></h3>
                            </div>
						</div>
                    	<div class="row">
                            <div class="text">
                                &nbsp;<br />
                            </div>
                        </div>
                    	
                    
                        
                        <div class="row">
                        	<?PHP
								if( $_SESSION['UserData']['delivery_option']=='same_day')
								{
							?>
                            	<h3>DELIVERY DATE:</h3>
                            <?PHP		
								}
							?>
                            <?PHP
								if( $_SESSION['UserData']['delivery_option']=='pickup')
								{
							?>
                            	<h3>PICKUP DATE:</h3>
                            <?PHP		
								}
							?>
                            <?PHP
								if($_SESSION['UserData']['delivery_option']=='free' || $_SESSION['UserData']['delivery_option']=='catering')
								{
							?>
                            	<h3>SELECT DELIVERY DATE:</h3>
                            <?PHP		
								}
							?>
                       	</div>
                            
                        <div class="upsale_checkout">
                            <div class="row">    
                                <div class="text">
                                    <span id="sprytextfield1">
                                            <?PHP
                                            if($_SESSION['UserData']['delivery_option']=='same_day' || $_SESSION['UserData']['delivery_option']=='pickup')
                                            {
                                                if(date('N')!='7' || date('N')!='6')
                                                {
                                                    $myDate =date('Y/m/d');
                                            ?>
                                                    <input name="dateDelivery" id="dateDelivery" type="text" readonly="readonly" class="deliveryDate" value="<?PHP echo date("l, F j, Y", strtotime($myDate));?>" />
                                            <?PHP
                                                }
                                                else
                                                {
                                                    echo 'Delivery is not available on Saturday or Sunday';	
                                                }
                                            }
                                            else
                                            {
                                                $myDate =date('Y/m/d');
                                            ?>
                                                <input name="dateDelivery" id="dateDelivery" type="text" readonly="readonly" class="deliveryDate" value="<?PHP echo date("l, F j, Y", strtotime($myDate . ' +2 Weekday'));?>" />
                                            <?PHP
                                            }
                                            ?>
                                    </span>
                                </div>
                            </div><!-- row -->
                        </div>
                        <div class="row">
                        		<?PHP
									if($_SESSION['UserData']['type']=='individual')
									{
								?>
                                		<h3>YOUR DAILY DELIVERY TIME</h3>
                                <?PHP			
									}
									else
									{
										if($_SESSION['UserData']['delivery_option']=='same_day' || $_SESSION['UserData']['delivery_option']=='catering')
										{
								?>
                                			<h3>SELECT DELIVERY TIME:</h3>
                        		<?PHP	
										}
										
										if($_SESSION['UserData']['delivery_option']=='pickup')
										{
								?>
                                			<h3>SELECT PICKUP TIME:</h3>
                                <?PHP				
										}
									}
								?>
                       	</div>
                           
                                
                    
								<?php
                                if($_SESSION['UserData']['type']=='corporate')
								{
									if((date('N')=='7' || date('N')=='6') && ($_SESSION['UserData']['delivery_option']=='same_day' || $_SESSION['UserData']['delivery_option']=='pickup'))
									{
										$disabled_sel = 'disabled="disabled"';
										$no_service_msg = 'Same Day or Pickup service is available Mon-Fri 9am - 5pm';
									}else
									{
										$disabled_sel = '';
										$no_service_msg='';
									}
									?>
                                    	<div class="upsale_checkout">
											<div class="row">
												<div class="text">
													
                                                    <?PHP
													if($_SESSION['UserData']['delivery_option']=='same_day' || $_SESSION['UserData']['delivery_option']=='catering')
													{
													?>
                                                    	<label for="deliveryTimeCorp" style="font-size:14px; width:98px;"><strong>Delivery time:</strong></label>
                                                    <?PHP
													}
													if($_SESSION['UserData']['delivery_option']=='pickup')
													{
													?>
                                                    	<label for="deliveryTimeCorp" style="font-size:14px; width:98px;"><strong>Pickup time:</strong></label>
                                      				<?PHP
													}
                                                        if($_SESSION['UserData']['delivery_option']=='catering')
														{
														?>
                                                        <select name="deliveryTimeCorp" id="deliveryTimeCorp" <?PHP echo $disabled_sel;?> class="required" validate="required:true">
															<option value="">Select time</option>	
                                                            <option value="7:00 AM">7:00 AM</option>
                                                            <option value="7:30 AM">7:30 AM</option>
                                                            <option value="8:00 AM">8:00 AM</option>
                                                            <option value="8:30 AM">8:30 AM</option>
                                                            <option value="9:00 AM">9:00 AM</option>
                                                            <option value="9:30 AM">9:30 AM</option>
                                                            <option value="10:00 AM">10:00 AM</option>
                                                            <option value="10:30 AM">10:30 AM</option>
                                                            <option value="11:00 AM">11:00 AM</option>
                                                            <option value="11:30 AM">11:30 AM</option>
                                                            <option value="12:00 PM">12:00 PM</option>
                                                            <option value="12:30 PM">12:30 PM</option>
                                                            <option value="1:00 PM">1:00 PM</option>
                                                            <option value="1:30 PM">1:30 PM</option>
                                                            <option value="2:00 PM">2:00 PM</option>
                                                            <option value="2:30 PM">2:30 PM</option>
                                                            <option value="3:00 PM">3:00 PM</option>
                                                            <option value="3:30 PM">3:30 PM</option>
                                                            <option value="4:00 PM">4:00 PM</option>
                                                            <option value="4:30 PM">4:30 PM</option>
                                                            <option value="5:00 PM">5:00 PM</option>
                                                            <option value="5:30 PM">5:30 PM</option>
                                                            <option value="6:00 PM">6:00 PM</option>
                                                            <option value="6:30 PM">6:30 PM</option>
                                                            <option value="7:00 PM">7:00 PM</option>
                                                       	</select>     
                                                        <?PHP
                                                        }
														if($_SESSION['UserData']['delivery_option']=='same_day' || $_SESSION['UserData']['delivery_option']=='pickup')
														{
															$time = time();
															
															$rounded_time = $time % 1800 > 900 ? $time += (1800 - $time % 1800):  $time -= $time % 1800;
															
															if($time<=strtotime('5:00pm') && $time>=strtotime('8:00am'))
															{
																$start = strtotime( date('g:i a', $time+7200));
															
																$end = strtotime('5:00pm');
																
																
																if($start>=$end)
																{
																	$no_service_msg = 'Same Day or Pickup service is available Mon-Fri 9am-5pm. Order has to be placed 2 hours in advance.';
																}
																else
																{
											 						$no_service_msg = '';
																?>
                                                                
                                                                <select name="deliveryTimeCorp" id="deliveryTimeCorp" <?PHP echo $disabled_sel;?> class="required" validate="required:true">	
                                                                <?PHP
																for( $i = $start; $i <= $end; $i += 1800) 
																{
																	echo '<option value="'.date('g:i a', $i).'">' . date('g:i a', $i) . '</option>';
																}
																?>
                                                                </select> 
                                                                <?PHP
																}
																echo '<span style="color:red">'.$no_service_msg.'</span>';
															}elseif($time<=strtotime('8:00am'))
															{
																$start = strtotime('8:00am');
															
																$end = strtotime('5:00pm');
															
																?>
                                                                <select name="deliveryTimeCorp" id="deliveryTimeCorp" <?PHP echo $disabled_sel;?> class="required" validate="required:true">	
                                                                <?PHP
																for( $i = $start; $i <= $end; $i += 1800) 
																{
																	echo '<option value="'.date('g:i a', $i).'">' . date('g:i a', $i) . '</option>';
																}
																?>
                                                                </select>
                                                                <?PHP
																echo '<span style="color:red">'.$no_service_msg.'</span>';
															}
															else
															{
																$disabled_sel = 'disabled="disabled"';
																?>
                                                                
                                                                <select name="deliveryTimeCorp" id="deliveryTimeCorp" <?PHP echo $disabled_sel;?> style="display:none;">
                                                                	<option value="-1">no</option>
                                                                </select>
                                                                <script type="text/javascript">
																	$(document).ready(function(){
                                                                		unlock_checkout(false);	
																	});
																</script>
                                                                <?PHP	
																echo '<span style="color:red">Same day delivery is available untill 5pm</span>';	
															}
														}
														?>
													
												</div>
											</div>  
                                       	</div>          
									<?php
								}
                        ?>
                       
                        
						<?php
                        if($_SESSION['UserData']['type']=="individual")
                        {
                        ?>
                        	
                            <div class="row upsale_checkout">
                            	<div class="radio delivery_time">
                                	<?PHP 	
									
											if(count($_SESSION['CompanyData']['delivery_times'])==1)
											{
												$checked_1 = 'checked';
												$_SESSION['UserData']['routecomp_id'] = $_SESSION['CompanyData']['delivery_times'][0]['routecomp_id'];
											}
											else
											{
												if($_SESSION['UserData']['routecomp_id'] == $_SESSION['CompanyData']['delivery_times'][0]['routecomp_id'])
												{
													$checked_1 = 'checked';
												}
												elseif($_SESSION['UserData']['routecomp_id'] == $_SESSION['CompanyData']['delivery_times'][1]['routecomp_id'])
												{
													$checked_1 = '';
												}else
												{
													$checked_1 = 'checked';
													$_SESSION['UserData']['routecomp_id'] = $_SESSION['CompanyData']['delivery_times'][0]['routecomp_id'];
												}
											}
	
									?>
                            		<label style="font-weight:bold;"><input name="deliveryTime" type="radio" value="<?php echo $_SESSION['CompanyData']['delivery_times'][0]['routecomp_id'];?>" <?PHP echo $checked_1;?> class="radio" /> <?php echo date('g:iA',strtotime($_SESSION['CompanyData']['delivery_times'][0]['time_in'])).' - '.date('g:iA',strtotime($_SESSION['CompanyData']['delivery_times'][0]['time_out'])); ?></label>
                                </div>
                           	</div>     
							<?php 
                            if(isset($_SESSION['CompanyData']['delivery_times'][1]['routecomp_id']))
                            { 
								if($_SESSION['UserData']['routecomp_id'] == $_SESSION['CompanyData']['delivery_times'][1]['routecomp_id'])
								{
									$checked_2 = 'checked';
								}
								else
								{
									$checked_2 = '';
								}
								
                            ?>
                                <div class="row upsale_checkout">
                            		<div class="radio delivery_time">
                                		<label style="font-weight:bold;"><input name="deliveryTime" type="radio" value="<?php echo $_SESSION['CompanyData']['delivery_times'][1]['routecomp_id'];?>" <?PHP echo $checked_2;?> class="radio" /><?php echo date('g:iA',strtotime($_SESSION['CompanyData']['delivery_times'][1]['time_in'])).' - '.date('g:iA',strtotime($_SESSION['CompanyData']['delivery_times'][1]['time_out'])); ?></label>
                            		</div>
                              	</div>      
							<?php 
                            } 
						}
                    ?>   
                            
			
                	
                    </div><!--form_body-->
                </div><!--half_form_wrapper-->
              
    <!----datepicker-->
    
    				 
               
          	</form>
             	<script type="text/javascript" src="include/cateringOrder/jcart/js/jcart.js"></script> 
                <div class="checkout_cart_wrapper">
                    <div id="checkCart">
                        <div id="jcart">
                            <?php $isCheckout=true; $jcart->display_cart();?>
                        </div>
                    </div>
                </div>    
    
     			<div style="clear:both;">        
                    <div class="row" style="padding:10px 0 0 0;">
                    	<div class="submit"> 
                        	<script type="text/javascript">
								function unlock_checkout(val)
								{	
									if(val)
									{
										$('#submit_checkout_form, #submit_checkout_delayed_form').removeAttr('disabled');
										$('#submit_checkout_form, #submit_checkout_delayed_form').removeClass('disabled');
										$('#select_delivery_time_info').css('display','none');
									}
									else
									{
										$('#submit_checkout_form, #submit_checkout_delayed_form').attr('disabled','disabled');
										$('#submit_checkout_form, #submit_checkout_delayed_form').addClass('disabled');
										$('#select_delivery_time_info').css('display','block');
									}
								}
                            	$(document).ready(function(){		
									$('#submit_checkout_delayed_form').click( function(e)
									{	
										if(!$(this).hasClass('disabled'))
										{
											if(!$(this).hasClass('minimum_odred_popup'))
											{
												e.preventDefault();
												
												var code = $('#delayed_billing_code').val();
												if(code.length<1)
												{
													$('#delayed_billing_message').addClass('error');	
													$('#delayed_billing_message').html('Invalid COMPANY CODE code. Please enter the valid code.');
												}
												else
												{
													$.ajax({
														url: 'include/verify_delayed_billing_code.php',
														method: 'POST',
														data: 	{
																	'code':code,
																	'id': '<?PHP echo $idComp;?>',
																},
														success: function(response) {
															if(response == 'ok')
															{	
																$('#submit_checkout_delayed_form').show();
																$('#delayed_billing_message').removeClass('error');	
																$('#delayed_billing_message').html('Your Delayed Billing code is valid.');	
																
																$('#checkout_form').attr('action','index.php?page=checkout&step=5&idComp=<?php echo $idComp; ?>');
																$('#checkout_form').submit();
															}
															else
															{ 

																$('#delayed_billing_message').addClass('error');	
																$('#delayed_billing_message').html(response);
																$('#delayed_billing_code').val('');
																$('#delayed_billing_code').focus();
															}
														},
														fail: function(response) 
														{
															alert(response);
														}
													});
												}
											}
										}
									});
											
									
								
									$('#submit_checkout_form').click( function(e)
									{
										e.preventDefault();
										if(!$(this).hasClass('disabled'))
										{
											if(!$(this).hasClass('minimum_odred_popup'))
											{
												if($('#checkout_form').valid())
												{
													$('.upsale_checkout').removeClass('time_error');
													$('#checkout_form').attr('action','index.php?page=checkout&step=4&idComp=<?php// echo $idComp; ?>');
													$('#checkout_form').submit();
												}
												else
												{
													$('.required.error:first').focus();
													if($('#deliveryTimeCorp').hasClass('error'))
													{
														$('#deliveryTimeCorp').parents('.upsale_checkout').addClass('time_error');
													}
													else
													{
														$('.upsale_checkout').removeClass('time_error');
													}
												}
											}
										}
	
									});	
									$('#deliveryTimeCorp').change(function(){
										if($('#deliveryTimeCorp').val()=='')
										{
											$('#deliveryTimeCorp').parents('.upsale_checkout').addClass('time_error');
										}
										else
										{
											$('.upsale_checkout').removeClass('time_error');
										}
									});
								});
                            </script>
                            <?PHP 
								
								if($jcart->get_total()>=$jcart->get_min_order())
								{
									$class_min_order="minimum_odred_popup_info";
									$minimum_odred_popup='';
									$disabled='';
								}else
								{
									$class_min_order='';
									$disabled='disabled="disabled"';
									$minimum_odred_popup='minimum_odred_popup';
								}
								
								if(count($jcart->get_contents())==0)
								{
									$disabled='disabled="disabled"';
								}
							?>
                            <!--p style="text-align:center;"-->
                            <div class="row" style="text-align:right;">
								<?PHP 
                                    if($_SESSION['UserData']['type']=='individual')
                                    {	
                                        $back_url='index.php?page=lunch-box-menu&user_type=individual';
                                    }
                                    elseif($_SESSION['UserData']['type']=='corporate')
                                    {
										if($_SESSION['UserData']['delivery_option']=='catering')
										{
                                        	$back_url='index.php?page=catering-full-menu';
										}
										elseif($_SESSION['UserData']['delivery_option']=='same_day')
										{
											$back_url='index.php?page=lunch-box-menu&user_type=corporate';
										}
                                    }
                                ?>
                                <a href="<?PHP echo $back_url;?>" style="margin-right:80px;">&lt; Continue shopping</a>
                            <!--/p-->
                        	<span id="minimum_odred_popup_info" class="<?PHP echo $class_min_order;?>">MINIMUM ORDER is $<?PHP echo $jcart->get_min_order();?></span>
                    		<a href="javascript:void(0);" style="padding:4px 10px; height:28px; line-height:30px;margin-right:50px;" <?PHP echo $disabled;?> class="myButton  <?PHP echo count($jcart->get_contents())==0 ? 'disabled':'';?> <?PHP echo $minimum_odred_popup;?>" id="submit_checkout_form">CHECKOUT AND PAY<!--br /><span style="text-align:center; font-size:10px;"></span--></a>
                          </div>
                          
                                    <div style="margin:20px 3px 5px 3px; padding:10px; background:#F0F0F0;">
                                    	
										<label style="font-size:12px; color:#333;"><strong>PAY BY CHECK, DELAYED BILLING AND CORPORATE ACCOUNT</strong><br />please enter your company code and checkout here</label>
                                    	<br />
                                    	<input type="password" maxlength="100" name="delayed_billing_code" id="delayed_billing_code" style="width:168px; margin-right:0; padding:0;" class="applyCouponInput"/>
                                        
                                        
                                        	 <a href="javascript:void(0);" style="height: 28px; line-height: 12px; margin: 0; padding: 4px 10px;" <?PHP echo $disabled;?> class="myButton  <?PHP echo count($jcart->get_contents())==0 ? 'disabled':'';?> <?PHP echo $minimum_odred_popup;?>" id="submit_checkout_delayed_form">CHECKOUT<br/><span style="text-align:center; font-size:10px;">With Unique COMPANY CODE</span></a>
                                       
                                        <p id="delayed_billing_message" class="" style="margin:5px 0;"><br /></p>
                                       	<div class="coupons_wrapper">
                                        	<p style="margin:0; color:#888;">
                                            	To use this option you would need to have Corporate Account(s) open and active<br />
												<a href="index.php?page=request-a-quote">Click here to request Delayed billing & open Corporate Account</a>, or call (949) 945-7702
											</p>	
										</div>
                                    </div>
							
                            
                            
                        </div>
                	</div>
                </div>         
	</div><!-- checkout_form_wrapper -->
	
    
</div><!-- checkout_wrapper -->


<?
            break;
            case 4:
			
				if(isset($_POST['email']) && isset($_POST['fname']) && isset($_POST['lname']) && $_SESSION['UserData']['logged_in']==false)
				{
					
					$email = trim(strip_tags(urldecode($_POST['email'])));
					$fname = trim(strip_tags(urldecode($_POST['fname'])));	
					$lname = trim(strip_tags(urldecode($_POST['lname'])));
		
					$userArray = array
					(	
						'id'				=> NULL,
						'email'				=> $email,
						'first_name'		=> $fname,
						'last_name'			=> $lname,
						'type'				=> $_SESSION['UserData']['type'],
						'company_name'		=> $_SESSION['CompanyData']['name'],	
						'address'			=> $_SESSION['CompanyData']['address'],
						'zip_code'			=> $_SESSION['CompanyData']['zip_code'],
						'company_id'		=> $_SESSION['CompanyData']['id'],
						'telephone'			=> $_SESSION['UserData']['telephone'],
						'fax'				=> '',		
						'city'				=> $_SESSION['CompanyData']['city'],
						'suite'				=> $_SESSION['CompanyData']['suite'],
						'notification'		=> $_SESSION['UserData']['notification'],
						'routecomp_id'      => $_SESSION['UserData']['routecomp_id'],
						'delivery_option'      => $_SESSION['UserData']['delivery_option'],
						'logged_in'			=> false
					);
					$_SESSION['UserData'] = $userArray;
				}	
				
				unset($_SESSION['prg']);
				if(isset($_POST['deliveryTime']))
				{
					$_SESSION['UserData']['routecomp_id'] =  trim(strip_tags($_POST['deliveryTime']));
					
					foreach($_SESSION['CompanyData']['delivery_times'] as $delivery_time)
					{
						if($delivery_time['routecomp_id'] == $_SESSION['UserData']['routecomp_id'])
						{
							$_SESSION['delivery_time'] = date('g:iA',strtotime($delivery_time['time_in'])).' - '.date('g:iA',strtotime($delivery_time['time_out']));
						}
					}
					
				}
				
				if(isset($_POST['notification']))
				{
					$notification = trim(strip_tags($_POST['notification']));
					$_SESSION['UserData']['notification'] = trim(strip_tags($_POST['notification']));
				}
				
				if(isset($_POST['other_delivery_option']) && $notification=='Other')
				{
					$_SESSION['UserData']['notification'] = trim(strip_tags($_POST['other_delivery_option']));
				}
				
				
				if(isset($_POST['dateDelivery']))
				{
					$_SESSION['delivery_date'] = date('Y-m-d',strtotime(trim(strip_tags($_POST['dateDelivery']))));
				}
				
				if(isset($_POST['deliveryTimeCorp']))
				{
					$_SESSION['delivery_time_corp'] = trim(strip_tags($_POST['deliveryTimeCorp']));
				}
				
				if(isset($_POST['message'])){
					$message=trim(strip_tags($_POST['message']));
				}
				else
				{
					$message='';
				}
				$_SESSION['message'] = $message;
				
				echo "<meta http-equiv=\"refresh\" content=\"0;url=payment-form.php\">Redirecting...";
            break;
          	case 5:
                if(isset($_POST['email']) && isset($_POST['fname']) && isset($_POST['lname']) && $_SESSION['UserData']['logged_in']==false)
				{
					
					$email = trim(strip_tags(urldecode($_POST['email'])));
					$fname = trim(strip_tags(urldecode($_POST['fname'])));	
					$lname = trim(strip_tags(urldecode($_POST['lname'])));
		
					$userArray = array
					(	
						'id'				=> NULL,
						'email'				=> $email,
						'first_name'		=> $fname,
						'last_name'			=> $lname,
						'type'				=> $_SESSION['UserData']['type'],
						'company_name'		=> $_SESSION['CompanyData']['name'],	
						'address'			=> $_SESSION['CompanyData']['address'],
						'zip_code'			=> $_SESSION['CompanyData']['zip_code'],
						'company_id'		=> $_SESSION['CompanyData']['id'],
						'telephone'			=> $_SESSION['UserData']['telephone'],
						'fax'				=> '',		
						'city'				=> $_SESSION['CompanyData']['city'],
						'suite'				=> $_SESSION['CompanyData']['suite'],
						'notification'		=> $_SESSION['UserData']['notification'],
						'routecomp_id'      => $_SESSION['UserData']['routecomp_id'],
						'delivery_option'   => $_SESSION['UserData']['delivery_option'],
						'logged_in'			=> false
					);
					$_SESSION['UserData'] = $userArray;
				}	
				
				unset($_SESSION['prg']);
				if(isset($_POST['deliveryTime']))
				{
					$_SESSION['UserData']['routecomp_id'] =  trim(strip_tags($_POST['deliveryTime']));
					
					foreach($_SESSION['CompanyData']['delivery_times'] as $delivery_time)
					{
						if($delivery_time['routecomp_id'] == $_SESSION['UserData']['routecomp_id'])
						{
							$_SESSION['delivery_time'] = date('g:iA',strtotime($delivery_time['time_in'])).' - '.date('g:iA',strtotime($delivery_time['time_out']));
						}
					}
					
				}
				
				if(isset($_POST['notification']))
				{
					$notification = trim(strip_tags($_POST['notification']));
					$_SESSION['UserData']['notification'] = trim(strip_tags($_POST['notification']));
				}
				
				if(isset($_POST['other_delivery_option']) && $notification=='Other')
				{
					$_SESSION['UserData']['notification'] = trim(strip_tags($_POST['other_delivery_option']));
				}
				
				
				if(isset($_POST['dateDelivery']))
				{
					$_SESSION['delivery_date'] = date('Y-m-d',strtotime(trim(strip_tags($_POST['dateDelivery']))));
				}
				
				if(isset($_POST['deliveryTimeCorp']))
				{
					$_SESSION['delivery_time_corp'] = trim(strip_tags($_POST['deliveryTimeCorp']));
				}
				
				if(isset($_POST['message'])){
					$message=trim(strip_tags($_POST['message']));
				}
				else
				{
					$message='';
				}
				$_SESSION['message'] = $message;
				
				echo "<meta http-equiv=\"refresh\" content=\"0;url=delayed-billing-form.php\">Redirecting...";
           
		    break;
        } 
    ?>
</div>

<div style="display:none;">
	<div id="step0">	
        <div id="homePopup">
            <div id="content">
                <h1 class="ourFreeUA">Our FREE DELIVERY service is currently not available for your location.</h1>
                <h2 class="interUA">If you are interested to sign up for our service, please fill in form below.</h2>
                <h1 class="reqUA">Request a Service Form</h1>
                <form action="" method="post" enctype="multipart/form-data" name="requestLocation">
                    <div id="left">
                    <p>Company name: *</p>
                    <input name="companyName" class="full" value="<?php echo $companyName; ?>" type="text" /><br />
                    <p>Address: *</p>
                    <input name="adress" class="full" type="text" /><br />
                    <p>Suite: *</p>
                    <input name="suite" class="full" type="text" /><br />
                    <div id="shortBox120" style="margin-right:5px;"><p>City: *</p>
                    <input name="city" type="text" class="half" /></div>
                    <div id="shortBox120"><p>Zip code: *</p>
                    <input name="zipCode" type="text" class="half" />
                    </div>
                    </div>
                    <div id="right">
                    <p>Contact person: *</p>
                    <input name="contactPerson" class="full" type="text" /><br />
                    <p>Phone number: *</p>
                    <input name="phone" class="full" type="text" /><br />
                    <p>Number of employees: *</p>
                    <input name="numbEmpl" type="text" class="halfR" />
                     <p>Prefered delivery time: *</p>
                    <input name="preferedDelT" type="text" class="halfR" /><br />
                    </div>
                    <div align="center"><input type="submit" id="submit" name="submit_frm" value="Submit Request" class="submitRequest" /></div>
                </form>
            </div>
        </div>  
    </div>      
    <div id="step1">
        <div class="form checkout_popup">
            <div class="form_header">
                 <h3 style="color:#d42229;">NOT REGISTERED? NO PROBLEM.</h3>
            </div>
            <div class="half_form_wrapper left">
                <div class="form_body">
                    <form action="index.php" method="get" name="notRegisered" id="verify_lunch_box">
                    	<input type="hidden" name="page" value="checkout" />
                        <input type="hidden" name="step" value="1" />
                        <input type="hidden" name="corporate" value="0" />
                        <div class="row">
							<div class="something results">
                            <span style="color:#4F0502; font-weight:bold;font-size:18px">Please enter delivery address</span><br />
                            <span style="font-weight:bold; color:#4F0502; font-size:12px;">or type in your company name and<br />
 select it from the drop-down if listed</span><br />
							</div>
                        </div>
                        <?php
                            $notRegistered = 1; 
                            include("include/findLunchBox.php");
                        ?>
                        <div class="row">
                            <div class="submit">
                            	<label></label>
                                
                                <input name="submit_frm" type="submit" value="Next" class="myButton"/>&nbsp;&nbsp;<a href="javascript:void(0);" class="clear_address_form">Clear form</a>
                            </div>
                        </div>
                    </form>
                </div><!-- form_body -->        
            </div><!-- half_form_wrapper -->
            <div class="half_form_wrapper">
                <form id="loginForm" action="index.php?page=login" method="post">
                <div class="form_body">
                 
                    <div class="row" style="margin-bottom:0;">
                    	<div class="text">
							<div class="something"><span style="color:#4F0502; font-weight:bold;font-size:18px">Or log in to continue</span><br /><br /><br /></div>
                        </div>
                    </div>
                   
                    <div class="row">
                        <div class="text">
                            <label>E-mail:</label>
                            <span id="login_email_required">
                                <input type="text" id="email" name="email"   class="finderText"/> <span class="required">*</span>
							</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="text">
                            <label>Password:</label>
                            <span id="login_pass_required">
                            	<input type="password" id="password" name="password"   class="finderText"/> <span class="required">*</span>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="submit">
                        	<label></label>
                        	<input type="hidden" name="checkoutLogin" value="true" />
                            <input type="submit" value="Log in" class="myButton"/> 
                        </div>
                    </div>
                    <div class="row">
                    	<div class="text">
                    		<label></label>&nbsp;<a  href="index.php?page=register&checkoutLogin=true" target="_parent">Register</a>
                    	</div>
                    </div>
                </div>     
                </form> 
            </div><!-- half_form_wrapper -->
        </div><!-- form -->
    </div>
    
    <div id="step1Catering">
    	
        
        
        
        <div class="form checkout_popup">
            <div class="form_header">
                 <h3 style="color:#d42229;">NOT REGISTERED? NO PROBLEM.</h3>
            </div>
            <div class="half_form_wrapper left">
                <div class="form_body">
                    <form action="index.php" method="get" name="notRegisered" id="verify_catering">
                    	<input type="hidden" name="page" value="checkout" />
                        <input type="hidden" name="step" value="2" />
                        <input type="hidden" name="corporate" value="1" />
                        <input type="hidden" name="submit_frm" value="Next" />
                        <input type="hidden" name="delivery_center_id" class="delivery_center_id" value="" />
                       	<div class="something results">
                            <span style="color:#4F0502; font-weight:bold;font-size:18px">Please enter delivery address</span><br />
                            <span style="font-weight:bold; color:#4F0502; font-size:12px;">or type in your company name and<br />
 select it from the drop-down if listed</span><br />
							</div>
                        <?php
                            $notRegistered = 1;                             
                        ?>
						<div id="address_corporate">
                        
                            <div class="corporate_register" style=" <?PHP //echo $_SESSION['CompanyData']['verified']==true?'':'display:none;';?>"> 
                                
                             <?PHP include('include/findLunchCatering.php');?>   
                             <div class="row">
                                <div class="submit">
                                    <label></label>
                                    <input name="submit_frm" type="submit" value="Next" class="myButton" id="verify_location"/>&nbsp;&nbsp;<a href="javascript:void(0);" class="clear_address_form">Clear form</a> 
                                </div>
                            </div>
                            </div><!-- corporate_register -->
                            
                        </div>
                        
                    </form>
                </div><!-- form_body -->        
            </div><!-- half_form_wrapper -->
            <div class="half_form_wrapper">
                <form id="loginForm" action="index.php?page=login" method="post">
                <div class="form_body">
                    
                    <div class="row" style="margin-bottom:0;">
                    	<div class="text">
                        	<div class="something"><span style="color:#4F0502; font-weight:bold;font-size:18px">Or log in to continue</span><br /><br /><br /></div>
                        </div>
                    </div>
            
                    <div class="row">
                        <div class="text">
                            <label>E-mail:</label>
                            <span id="login_email_required">
                                <input type="text" id="email" name="email" class="finderText"/> <span class="required">*</span>
							</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="text">
                            <label>Password:</label>
                            <span id="login_pass_required">
                            	<input type="password" id="password" name="password" class="finderText"/> <span class="required">*</span>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="submit">
                        	<label></label>
                        	<input type="hidden" name="checkoutLogin" value="true" />
                            <input type="submit" value="Log in" class="myButton"/> 
                        </div>
                    </div>
                    <div class="row">
                    	<div class="text">
                    		<label></label>&nbsp;<a href="index.php?page=register&checkoutLogin=true" target="_parent">Register</a>
                    	</div>
                    </div>
                </div>     
                </form> 
            </div><!-- half_form_wrapper -->
        </div><!-- form -->
    </div>
    <div id="step2">
        <div class="form checkout_popup">
            <div class="form_header">
                <h3 style="color:#d42229;">THANK YOU</h3>
            </div>
            <div class="half_form_wrapper left">
            	<div class="form_body">
				
                	<div class="row"> 
						<h3><strong style="color:#333; font-size:17px; font-weight:normal;"><?php echo htmlspecialchars_decode($_SESSION["CompanyData"]['name']);?></strong></h3>
                    </div>
                    <div class="row" style="font-size:16px;"> 
                    	<?php echo $_SESSION["CompanyData"]['address'];?>, Suite: <?php echo $_SESSION["CompanyData"]['suite'];?>
                    </div>
                    <div class="row" style="font-size:16px;"> 
                    	<?php echo $_SESSION["CompanyData"]['city'];?>, <?php echo $_SESSION["CompanyData"]['zip_code'];?>
                    </div>

                    <?PHP 
					if($_SESSION['UserData']['type']=='individual')
					{
					?>
                        <div class="row" style="font-size:16px;"> 
                             CONTACT PERSON: 
                        </div> 
                        <div class="row"> 
                    		<?php echo $_SESSION["CompanyData"]['contact_person'];?>
                    	</div> 
                        
                    <?PHP
					}
					?>  
				</div><!-- form_body -->
            </div><!-- half_form_wrapper -->
            <div class="half_form_wrapper">
                <div class="form_body">
                 <?PHP 
					/*if($_SESSION['UserData']['type']=='individual')
					{
					?>
                                                <div class="row"><h3>TIME(S) available for Free Delivery and No Minimum Order at your location:</h3></div>
                        
                        
                        <!--<div class="row delivery_time upsale_checkout"> 
                            <label>1st Daily delivery time: </label><strong><?php echo date('g:iA',strtotime( $_SESSION["CompanyData"]["delivery_times"][0]['time_in'])).' - '.date('g:iA',strtotime($_SESSION["CompanyData"]["delivery_times"][0]['time_out']));?></strong>
                        </div>
                        <?PHP if(isset($_SESSION["CompanyData"]["delivery_times"][1]))
                        {
                        ?>
                        <div class="row delivery_time upsale_checkout"> 
                            <label>2nd Daily delivery time: </label><strong><?php echo  date('g:iA',strtotime($_SESSION["CompanyData"]["delivery_times"][1]['time_in'])).' - '.date('g:iA',strtotime($_SESSION["CompanyData"]["delivery_times"][1]['time_out'])); ?></strong>
                        </div>
						<?PHP
                        }
                        
					}
					 */?>

                
                    <form action="index.php" method="get" name="notRegisered" id="verify_step_same_day">
                    	<input type="hidden" name="page" value="checkout" />
                        <input type="hidden" name="step" value="2" />
                        <input type="hidden" name="idComp" value="<?php echo $_SESSION["CompanyData"]['id']; ?>" />
                        <input type="hidden" name="set_same_day" value="1" />
                        <input type="hidden" name="delivery_option" value="free" />
                     
                	
                	<?php
                        if($_SESSION['UserData']['type']=="individual")
                        {
                        ?>
                    <div class="row">
                    	&nbsp;
                    </div>
                        	<div class="row" style="text-align:center;"><h3 style="text-align:center; font-size:17px;" >YOUR DAILY DELIVERY TIME<br /></h3>*at this time we visit your location every day</div>
                            
                            <div class="row upsale_checkout">
                            	<div class="radio delivery_time">
                                	<?PHP 	
									
											if(count($_SESSION['CompanyData']['delivery_times'])==1)
											{
												$checked_1 = 'checked';
												$_SESSION['UserData']['routecomp_id'] = $_SESSION['CompanyData']['delivery_times'][0]['routecomp_id'];
											}
											else
											{
												if($_SESSION['UserData']['routecomp_id'] == $_SESSION['CompanyData']['delivery_times'][0]['routecomp_id'])
												{
													$checked_1 = 'checked';
												}
												elseif($_SESSION['UserData']['routecomp_id'] == $_SESSION['CompanyData']['delivery_times'][1]['routecomp_id'])
												{
													$checked_1 = '';
												}else
												{
													$checked_1 = 'checked';
													$_SESSION['UserData']['routecomp_id'] = $_SESSION['CompanyData']['delivery_times'][0]['routecomp_id'];
												}
											}
	
									?>
                            		<label style="font-weight:bold;"><input name="deliveryTime" type="radio" value="<?php echo $_SESSION['CompanyData']['delivery_times'][0]['routecomp_id'];?>" <?PHP echo $checked_1;?> class="radio" /> <?php echo date('g:iA',strtotime($_SESSION['CompanyData']['delivery_times'][0]['time_in'])).' - '.date('g:iA',strtotime($_SESSION['CompanyData']['delivery_times'][0]['time_out'])); ?></label>
                                </div>
                           	</div>     
							<?php 
                            if(isset($_SESSION['CompanyData']['delivery_times'][1]['routecomp_id']))
                            { 
								if($_SESSION['UserData']['routecomp_id'] == $_SESSION['CompanyData']['delivery_times'][1]['routecomp_id'])
								{
									$checked_2 = 'checked';
								}
								else
								{
									$checked_2 = '';
								}
								
                            ?>
                                <div class="row upsale_checkout">
                            		<div class="radio delivery_time">
                                		<label style="font-weight:bold;"><input name="deliveryTime" type="radio" value="<?php echo $_SESSION['CompanyData']['delivery_times'][1]['routecomp_id'];?>" <?PHP echo $checked_2;?> class="radio" /><?php echo date('g:iA',strtotime($_SESSION['CompanyData']['delivery_times'][1]['time_in'])).' - '.date('g:iA',strtotime($_SESSION['CompanyData']['delivery_times'][1]['time_out'])); ?></label>
                            		</div>
                              	</div>      
							<?php 
                            } 
						}
                    ?>   
                    	
                        <div class="row">
                            <div class="submit" style="text-align:center;">
                            	
                              	<!--<label></label><input name="reset" type="button" value="Reset" class="clearForm myButton" />-->
                                <input name="submit_frm" type="submit" value="Next" class="myButton"/>
                            </div>
                        </div>
                        <!--<div class="row">
                        	<h3 style="text-align:center; font-size:14px;">FOR SAME DAY DELIVERY <a href="javascript:void(0);" style="color:blue;" class="same_day_click">click here</a></h3>
                            <script type="text/javascript">
								$(document).ready( function(){
									$('.same_day_click').click(function(){
										$('#frm_same_day').submit();
									});
								});
							</script>
							
                        </div>-->
                        <div id="info_box" class="info_box">
                        	For your order to be delivered properly we need your name, and we would need to send you an order confirmation receipt. Our <a href="index.php?page=terms-and-policies">Terms of Use</a> guaranty that your email will be used for the purpose of this website transactions only.   
                        	<a href="javascript:void(0);" class="close_info">Close</a>
                        </div>
                        <script type="text/javascript">
                        	$(document).ready(function(){
								$('.info_link').click(function(){
									$('#info_box').fadeIn(300);
								});
								$('.close_info').click(function(){
									$('#info_box').hide();
								});
							});
                        </script>
                    </form>
                    <form action="index.php?page=lunch-box-menu" method="post" id="frm_same_day" >
                        <input type="hidden" value="same_day" name="delivery_option" />
                        <input type="hidden" value="same_day" name="set_same_day" />
                        <input type="hidden" value="clear" name="clear" />
                    </form>
                </div><!-- form_body -->        
            </div><!-- half_form_wrapper -->
        </div><!-- form -->
    </div>
</div>