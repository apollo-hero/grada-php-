<?PHP
session_start();
if(isset($_POST['setCateringUnregisteredUser']))
{
	$zip = NULL;
	if(isset($_POST['zip']))
	{
		$zip=trim(strip_tags($_POST['zip']));
	}
	setUnregisteredUser('corporate', $zip);
	setUnregisteredCompany('', '', '', $zip, '');
}

function setUnregisteredUser($type = NULL, $zip = NULL)
{
	$userArray = array
		(	
			'id'				=> NULL,
			'email'				=> NULL,
			'first_name'		=> NULL,
			'last_name'			=> NULL,
			'type'				=> $type,
			'company_name'		=> NULL,	
			'address'			=> NULL,
			'zip_code'			=> $zip,
			'company_id'		=> NULL,
			'telephone'			=> NULL,
			'fax'				=> NULL,		
			'city'				=> NULL,
			'suite'				=> NULL,
			'notification'		=> NULL,
			'routecomp_id'		=> NULL,
			'logged_in'			=> false,
			'delivery_option'	=> NULL,
			'delayed_billing'	=> false
		);
			
	$_SESSION['UserData'] = $userArray;	
}

function setUnregisteredCompany($companyName, $address, $city, $zip_code, $suite)
{
	
	$company = array();

		$company['id'] = NULL;
		$company['name'] = $companyName;
		$company['address'] = $address;
		$company['city'] = $city;
		$company['zip_code'] = $zip_code;
		$company['suite'] = $suite;
		$company['contact_person'] = NULL;
		$company['verified'] = true;
	
	$_SESSION['CompanyData'] = $company;

}
?>