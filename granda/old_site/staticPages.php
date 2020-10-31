<?PHP
if(!session_id()) session_start();
  header('Cache-control: private, no-cache, must-revalidate');
  header('Expires: 0');
	function staticPages($page){
		
		if($page=='request-a-service')
		{
?>	
		<div id="request_service_page">
        	
        	 <div id="content" class="clearfix">
			 		<?php getPage($page);?>
                    <form action="../send-request.php" method="post" enctype="multipart/form-data" name="requestLocation" target="_parent" class="clearfix request_servie" id="request_a_service">
                        <div id="left">
                            <div class="row">
                                <div class="text">
                                    <label>Company name: *</label>
                                    <span id="request1">
                                        <input name="companyName" class="full required" value="<?php echo $companyName; ?>" type="text" />
                                    </span>
                                </div>
                            </div>       
                            <div class="row">
                                <div class="text">
                                    <label>Email: *</label>
                                    <span id="request2">
                                        <input name="email" class="full required" value="<?php echo $email; ?>" type="text" />
                                    </span>
                                </div>
                            </div>    
                            <div class="floated">  
                                <div class="row">
                                    <div class="text">
                                        <label>Address: *</label>
                                        <span id="request3">
                                            <input name="adress" class="twothird required" type="text" />
                                        </span>
                                    </div>
                                </div>
                                
                                <div class="row last">
                                    <div class="text">
                                        <label>Suite: *</label>
                                        <span id="request4">
                                            <input name="suite" class="third required" type="text" />
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="floated">
                                <div class="row">
                                    <div class="text">
                                        <label>City: *</label>
                                        <span id="request5">
                                            <input name="city" type="text" class="twothird required" />
                                        </span>
                                    </div>
                                </div>
                            
                                <div class="row last">
                                    <div class="text">
                                        <label>Zip: *</label>
                                        <span id="request6">
                                            <input name="zipCode" type="text" class="third required" />
                                        </span>  
                                    </div>
                                </div>
                            </div>       
                        </div>
                        
                        <div id="right">
                            <div class="row">
                                <div class="text">
                                    <label>Contact person: *</label>
                                    <span id="request7">
                                        <input name="contactPerson" class="full required" type="text" />
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="text">
                                   <label>Phone number: *</label>
                                    <span id="request8">
                                        <input name="phone" class="full required" type="text" />
                                    </span> 
                                </div>
                            </div>
                            
                                <div class="row">
                                    <div class="text">
                                       <label>Number of employees:*</label>
                                        <span id="request9">
                                            <input name="numbEmpl" type="text" class="third required" />
                                        </span>  
                                    </div>
                                </div>
                             
                                <div class="row">
                                    <div class="text">
                                        <label>Prefered delivery time:*</label>
                                        <span id="request10">	
                                            <em>From:</em><input name="preferedDelT" type="text" class="third required" />
                                        </span> 
                                        <span id="request12">	
                                            <em>To:</em><input name="preferedDelT1" type="text" class="third required" />
                                        </span>  
                                    </div>
                                </div>
                       
                        </div>
                        <div class="row" style="margin-bottom:10px;">
                            <div class="text">
                                <label>Additional requests:</label>
                                <span id="request11">
                                    <textarea id="additional_requests" style="height:100px; width:538px;" name="additional_request"  autocomplete="off" class="light">Enter additional notes here</textarea>
                                    <script type="text/javascript">
                                        $('#additional_requests').focus(function(){
                                            if($(this).val()=='Enter additional notes here')
                                            {
                                                $(this).removeClass('light');
                                                $(this).val('');	
                                            }	
                                        });
                                    </script>
                                </span>
                            </div>
                        </div>
                        <div  style="clear:both; margin-bottom: 10px; text-align: center;" id="row">
                        	Enter verification code from the image: <img src="seccode/seccode.php" width="71" height="21" align="absmiddle"> <input type="text" name="secCode" style="vertical-align:bottom;" class="required"/>
                        </div>
                        <div  style="clear:both;" id="row">
                        	<input type="submit" id="submit" name="submit" value="Submit Request" class="myButton" />
                        </div>
                    </form>
                    <div id="row" align="center"><h1>Or you can call us any time at: <span>(949) 945-7702</span></h1></div>
            <script type="text/javascript">
                $('#request_a_service').validate({
			messages: {
				companyName: {
					required: ' *'
				},
				adress: {
					required: ' *'
				},
				city: {
					required: ' *'
				},
				zipCode: {
					required: ' *'
				},
				suite: {
					required: ' *'
				},
				contactPerson: {
					required: ' *'
				},
				email: {
					required: ' *'
				},
				numbEmpl: {
					required: ' *'
				},
				preferedDelT: {
					required: ' *'
				},
				preferedDelT1: {
					required: ' *'
				},
				phone: {
					required: ' *'
				},
				secCode: {
					required: ' *'
				}
				
				
				
			}		
		});
            </script>
        	</div>
        </div>
<?PHP	
		}			
		
		
		if($page=="contact-us"){
			?>
			<div id="contact">
            	<div id="contactLft">
                <h3 class="contactPerson">CDC CATERING<br />
                350 CLINTON STREET<br />
                COSTA MESA, CA 92626<br />
				TEl. (949) 945-7702<br />
                
                </h3>
                <h3 class="contactMail"><a href="mailto:info@CorporateCateringOnline.com"><span>info</span>@CorporateCateringOnline.com</a></h3>
                
                <h3 class="contactFacebook"><a href="https://www.facebook.com/HealthyOption" target="_blank"><span>facebook.com/</span>HealthyOption</a></h3>
                
            </div>
                <div id="contactRght">
                   
                    
                    <iframe width="577" height="401" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=2148+Michelson+Drive,+Irvine,+CA+92612&amp;aq=0&amp;oq=2148+Michelson+Drive%2BIRVINE%2BCA%2B92612&amp;sll=34.020479,-118.411732&amp;sspn=0.951555,2.113495&amp;t=m&amp;ie=UTF8&amp;hq=&amp;hnear=2148+Michelson+Dr,+Irvine,+California+92612&amp;ll=33.676942,-117.858643&amp;spn=0.0597,0.132093&amp;z=14&amp;output=embed">
                    </iframe>
                    
                    <br />
                    <small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=2148+Michelson+Drive,+Irvine,+CA+92612&amp;aq=0&amp;oq=2148+Michelson+Drive%2BIRVINE%2BCA%2B92612&amp;sll=34.020479,-118.411732&amp;sspn=0.951555,2.113495&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=2148+Michelson+Dr,+Irvine,+California+92612&amp;ll=33.676942,-117.858643&amp;spn=0.0597,0.132093&amp;z=14" style="color:#0000FF;text-align:left">View Larger Map</a></small>
                    
                </div>
            </div>
			<?php
		}//contact us page

		
		$result = false;
        if($page=="request-a-quote")
		{
			echo '<div id="request_service_page">';
				
			if(isset($_POST['submit_request']))
			{
				if($_POST['secCodeQuote'] == $_SESSION['secCode']) 
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
					$secCode = $_SESSION['secCodeQuote'];
					$result = send_quote_request($company, $address, $city, $zip_code, $number_of_people, $budget, $contact_person, $phone, $email, $date, $delivary_time, $setup_time, $serving_time, $description, $secCode);

				}else
				{
					$result = 'codeError';
				}
			}
			
	
        if($result==true)
		{
		?>
        	<div class="form authorize checkout_wrapper">
				<h1>Thank you for being interested in our services!</h1>
                <p>
                	Your request has been submitted successfully and one of our representatives will contact you as soon as possible.
                </p>
                <p style="text-align:center;">
                	<?PHP 
					if($_SESSION['UserData']['type']=='individual')
					{
                		$url = 'index.php?page=lunch-box-menu';
					}else
					{
						$url = 'index.php?page=catering-menu';
					}
					?>
					<a href="<?PHP echo $url; ?> ">&lt;&lt; Continue Shopping</a>
                </p>
            </div>
        <?PHP
		}
		elseif($result=='codeError')
		{
		?>
			<div class="form authorize checkout_wrapper">
				<h1>Error/h1>
                <p>
                	Your request has not been submitted successfully. Please go back to previous page and enter valid verification code.
                </p>
                <p style="text-align:center;">

					<a href="">&lt;&lt; Back to Open Account page</a>
                </p>
            </div>
        <?PHP
		}
		else
		{
    	getPage($page);
		?>
	    <form action="index.php?page=request-a-quote&act=1" method="post" enctype="multipart/form-data" name="request-a-quote" id="request_a_quote" class="request_servie">
			<div id="quote">
            	<div id="row">
                	<div id="left">
                    	<div id="row2nd">
                    		Company name: *<br />
                            <span id="sprytextfield1">
								<input type="text" name="companyName" id="companyName" value="" class="inputQuote required" />
                            </span>
                        </div>
                    	<div id="row2nd">
                        	Address: *<br />
                            <span id="sprytextfield2">
							<input type="text" name="adressQ" id="adressQ" value="" class="inputQuote required" />
                            </span>
                        </div>
                    	<div id="row2nd">
	                        <div id="quotetdl">
                    			City: *<br />
                                <span id="sprytextfield3">
									<input type="text" name="cityQ" id="cityQ" value="" class="inputQuoteU required" />
                                </span>    
                    		</div>
                            <div id="quotetdr">
                            	Zip code: *<br />
                                <span id="sprytextfield4">
                                <input type="text" name="zipQ" id="zipQ" value="" class="inputQuoteU required" />
                                </span>
							</div>
                        </div>
                    	<div id="row2nd">
	                        <div id="quotetdl">
                    			Number of people: *<br />
                                <span id="sprytextfield5">
								<input type="text" name="numbOfPeople" id="numbOfPeople" class="inputQuoteU required" />
                                </span>
                    		</div>
                            <div id="quotetdr">
                                Approximate Budget: *<br />
                                <span id="sprytextfield6">
                                <input type="text" name="budget" id="budget" class="inputQuoteU required" />
                                </span>
                            </div>
                        </div>
                    </div>
                    <div id="right">
                        <div id="row2nd">
	                        <div id="quotetdl">
    	                    	Contact person name: *<br />
                                <span id="sprytextfield7">
									<input type="text" name="contactQ" id="contactQ" value="" class="inputQuoteU required" />
                                </span>
                    		</div>
                             <div id="quotetdr">
                                    Phone number: *<br />
                                    <span id="sprytextfield8">
                                    <input type="text" name="contactQNumb" id="contactQNumb" value="" class="inputQuoteU required" />
                                    </span>
                              </div>
                        </div>
                        <div id="row2nd">
                        	Contact person E-Mail: *<br />
                            <span id="sprytextfield9">
								<input type="text" name="emailQ" id="emailQ" value="" class="inputQuote required" />
                        	</span>
                        </div>
                        <div id="row2nd">
	                        <div id="quotetdl">
                        	Date: *<br />
								<span id="sprytextfield10">
                            		<input type="text" name="dateQ" id="dateQ" value="" class="inputQuoteU required" />
								</span>
                    		</div>
                             <div id="quotetdr">
                        		Delivery time: *<br />
                                <span id="sprytextfield11">
								<input type="text" name="deliveryQ" id="deliveryQ" value="" class="inputQuoteU required" />
                                </span>
                      	  </div>
                        </div>
                        <div id="row2nd">
	                        <div id="quotetdl">
                        		Setup time: *<br />
                                <span id="sprytextfield12">
								<input type="text" name="timeQ" id="timeQ" value="" class="inputQuoteU required" />
                                </span>
                    		</div>
                             <div id="quotetdr">
                                Serving time: *<br />
                                <span id="sprytextfield13">
                                    <input type="text" name="servingQ" id="servingQ" value="" class="inputQuoteU required" />
                                    </span>
                      	  </div>
                        </div>
                    </div>
                </div>
                <div id="row">
                
                	Description of the event, or your questions, please enter it here: *<br />
                    <span id="sprytextfield14">
					<textarea id="descQ" name="descQ" style="height:50px;" class=" required"></textarea>
                   	</span>
                </div>
                
                <div  style="clear:both; margin-bottom: 10px; text-align: center;" id="row">
                    Enter verification code from the image: <img src="seccode/seccode.php" width="80" height="30" align="absmiddle"> <input type="text" name="secCodeQuote" style="vertical-align:bottom;" class="required"/>
                </div>
                <div id="row">
                	<input class="myButton" type="submit" value="Submit Request" name="submit_request" />
                </div>
                <div id="row" align="center"><h1>Or you can call us any time at: <span>949-945-7702</span></h1></div>
            </div>
            <script type="text/javascript">
            	$('#request_a_quote').validate(
				{
					messages: {
						companyName: {
						required: ' *'
					},
					adressQ: {
						required: ' *'
					},
					cityQ: {
						required: ' *'
					},
					zipQ: {
						required: ' *'
					},
					numbOfPeople: {
						required: ' *'
					},
					contactQ: {
						required: ' *'
					},
					emailQ: {
						required: ' *'
					},
					deliveryQ: {
						required: ' *'
					},
					dateQ: {
						required: ' *'
					},
					timeQ: {
						required: ' *'
					},
					contactQNumb: {
						required: ' *'
					},
					servingQ: {
						required: ' *'
					},
					budget: {
						required: ' *'
					},
					descQ: {
						required: ' *'
					},
					secCodeQuote: {
						required: ' *'
					}
					
					}
				});         
           	</script>
            </form>
			<?php
			}
			echo '</div>';
	
		}//Request a quote
	}
?>