<?php 
if(strlen($_SESSION['email'])>0)
{
	$success='';
	$pass_error ='';
		if(isset($_POST['submit']) && strlen($_GET['idUser'])>0)
		{	
			$password		=	trim(strip_tags($_POST['password']));
			$repassword		=	trim(strip_tags($_POST['repassword']));
			$fname			=	trim(strip_tags($_POST['fname']));
			$lname			=	trim(strip_tags($_POST['lname']));
			$email			=	trim(strip_tags($_POST['email']));
			$telephone		=	trim(strip_tags($_POST['telephone']));
			$fax			=	trim(strip_tags($_POST['fax']));
			$newsletters	=	trim(strip_tags($_POST['newsletters']));
			$id = intval( trim(strip_tags($_GET['idUser'])));

			if(strlen($password)>0)
			{
				if($password != $repassword)
				{
					$pass_error = "<p class='error'>Passwords do not match.</p>";
				}elseif($password==$repassword)
				{
					
					$password=md5($password);
					$sqlPsd="`password`='".$password."' ,"; 
					$pass_error = '<p style="color:#06F; text-transform:uppercase; text-align:center;">Your password has been changed successfuly.</p>';
				}
			}
			
			$sqlEmailExist = "SELECT `idUser` FROM `usersFE` WHERE `email` = '$email'";
			$query=mysql_query($sqlEmailExist);
			$num_email=mysql_num_rows($query);
			if($num_email==0 || ($num_email==1 && $_SESSION['email']==$email))
			{
				$sqlE="UPDATE usersFE SET ".$sqlPsd." fname='{$fname}', lname='{$lname}', telephone='{$telephone}', fax='{$fax}', newsletters='{$newsletters}', email='{$email}' WHERE idUser='".$id."'";
				 
				$myqry=mysql_query($sqlE);
				if($myqry==true)
				{
					$_SESSION['email']=$email;
					setUser();
					$success='<p style="text-align:center; color:#06F; text-transform:uppercase;">Your account has been updated successfully.</p>';
				}
				if($myqry==false)
				{	
					$success="<p class='error'>There was an error connecting to datebase.</p>";
				}	
			}
			else
			{
				$success="<p class='error' style='text-align:center; text-transform:uppercase;'>User with desired email already exists. <br />Please try using a different email address.</p>";
			}
	 }
?>
	<div class="form account_links">
    	<!--<a href="#">Purchase history</a> | -->
		<a href="index.php?page=faq">F.A.Q.</a> | 
        <a href="index.php?page=contact-us">Contact Us</a> | 
        <a href="index.php?page=logout">Log out</a>
    </div>
	<div class="form">
    	<div class="form_header">
    	<h2 style="text-align:center;">Manage your account</h2>
        </div>
        
		<?php
		
			echo $success;
			
			echo $pass_error;
	
				$email = $_SESSION['email'];
				$sql = "SELECT `idUser`, `email`, `password`, `fname`, `lname`, `type`, `companyName`, `city`, `suite`, `address`, `zipCode`, `companyId`, `telephone`, `fax`, `newsletters`, `dateReg` FROM `usersFE` WHERE `email` = '$email'";
				$query=mysql_query($sql);
				$num=mysql_num_rows($query);
				if($num==0)
				{
					$errorMsg.="<p>Your account could not be found in our database.<br />Please contact administrator.</p>";
				}
				if($num>1)
				{
					$errorMsg.="<p>We have more than one accounts with your E-mail/username.<br />Please contact administrator.</p>";
				}
				if($num==1)
				{
					$row=mysql_fetch_array($query);
		?>
					<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
					<script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
					<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
					<link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
			
			
					
						<form action="index.php?page=myAccount&idUser=<?php echo $row["idUser"]; ?>" method="post" enctype="multipart/form-data" name="register">
							<div class="form_body">
                         
                            
									<div class="row">
                                        <h2 style="text-align:center;">You are currently registered under:</h2>
                                    </div>
                                    <div class="row">
                                        <div class="text">
                                            <label>Company:</label><strong><?php echo $row["companyName"]; ?></strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="text">
                                            <label>Address:</label><strong><?php echo $row["address"]; ?></strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="text">
                                            <label>Suite:</label><strong><?php echo $row["suite"]; ?></strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="text">
                                            <label>City:</label><strong><?php echo $row["city"]; ?></strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="text">
                                            <label>Zip Code:</label><strong><?php echo $row["zipCode"]; ?></strong>
                                        </div>
                                    </div>
                                    
                                    
                                    <?PHP
									if($row["companyId"]>0 && $row["companyId"]!=NULL)
									{
										$sqlCo="SELECT `idComp`, `companyName`, `adress`, `city`, `suite`, `zipCode`, `contactPerson` FROM `company` WHERE `idComp`='".$row["companyId"]."'";
										$mysql_query=mysql_query($sqlCo);
										$rowC=mysql_fetch_array($mysql_query);
									?>	
										<div class="row">
											<div class="text">
												<label>Contact person:</label><strong><?php echo $rowC["contactPerson"]; ?></strong>
											</div>
										</div>	
									<?PHP												
										if($_SESSION['CompanyData']['delivery_times'][0])
										{
										?>
											<div class="row">
												<div class="text">
													<label>1st Delivery time:</label><strong><?PHP echo date('g:iA',strtotime($_SESSION['CompanyData']['delivery_times'][0]['time_in'])).' - '.date('g:iA',strtotime($_SESSION['CompanyData']['delivery_times'][0]['time_out'])); ?></strong>  
												</div>
											</div>
										<?PHP
										}
										if($_SESSION['CompanyData']['delivery_times'][1])
										{
										?>
											<div class="row">
												<div class="text">
													<label>2nd Delivery time:</label><strong><?PHP echo date('g:iA',strtotime($_SESSION['CompanyData']['delivery_times'][1]['time_in'])).' - '.date('g:iA',strtotime($_SESSION['CompanyData']['delivery_times'][1]['time_out'])); ?></strong>  
												</div>
											</div>
									<?php 
										}
									}
									
                               	?>
                               <br  />
                               	<div class="row">
                                    <div class="text">
                                        <label>E-mail (username):</label>
                                        <span id="sprytextfield5">
                                        	<input type="text" name="email" id="email" value="<?php echo stripslashes($row["email"]); ?>" />
                                            <span class="textfieldRequiredMsg">A value is required.</span>
										</span>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="text">
                                        <label>First name:</label>
                                        <span id="sprytextfield3">
                                            <input type="text" name="fname" id="fname" value="<?php echo stripslashes($row["fname"]); ?>" />
                                            <span class="textfieldRequiredMsg">A value is required.</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="text">
                                        <label>Last name:</label>
                                        <span id="sprytextfield4">
                                            <input type="text" name="lname" id="lname" value="<?php echo stripslashes($row["lname"]); ?>" />
                                            <span class="textfieldRequiredMsg">A value is required.</span>
                                        </span>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="text">
                                        <label>Password:</label>
                                        <span id="sprypassword1">
                                            <input type="password" name="password" id="password" />
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="text">
                                        <label>Repeat password:</label>
                                        <span id="sprypassword2">
                                            <input type="password" name="repassword" id="repassword" />
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="text">
                                        <label>Telephone:</label> <input type="text" name="telephone" id="telephone" value="<?php echo stripslashes($row["telephone"]); ?>" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="text">
                                        <label>Fax (corporate only):</label> <input type="text" name="fax" id="fax" value="<?php echo stripslashes($row["fax"]); ?>" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="checkbox">
                                        <label style="margin-left:50px;"><input name="newsletters" type="checkbox" <?php if($row["newsletters"]==1){echo " checked=\"checked\"";}?> value="1" /> I agree to receive coupons, discounts, and promotion from Corporate Catering Online</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="submit">
                                        <input name="submit" type="submit" class="myButton" value="Save Changes"/>
                                    </div>
                                </div>
                            </div><!-- form body-->
						</form>
	
					
					<script type="text/javascript">
	
						var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1", {validateOn:["submit"], isRequired:false});
						var sprypassword2 = new Spry.Widget.ValidationPassword("sprypassword2", {validateOn:["submit"], isRequired:false});
						var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "none", {validateOn:["submit"]});
						var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4", "none", {validateOn:["submit"]});
						var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5", "none", {validateOn:["submit"]});
					</script>
				 <?php
				 }//one result
			
?>
	 </div>			
<?PHP

		
}//not logged in
if(strlen($_SESSION['email'])==0)
{
	$errorMsg.="You are not logged in.";
}
	
?>