<?php
// here
class MP {
	static $auth_token 	= "Blft0gQ-XXccABwdFdDdABKf7wqFE3HXfQgwlLtE3gIGgo5YdARhMg";
	static $url_api 	= "http://api.maropost.com/accounts/1044/";
	function request($action, $endpoint, $dataArray) {
		$url = self::$url_api . $endpoint . ".json"; 
	  	$ch = curl_init();
	  	$dataArray['auth_token'] = self::$auth_token;
	  	$json = json_encode($dataArray);
	    //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	    curl_setopt($ch, CURLOPT_MAXREDIRS, 10 );
	    curl_setopt($ch, CURLOPT_URL, $url);
	    switch($action){
	            case "POST":
	            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
	            break;
	        case "GET":
	            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
	            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
	            break;
	        case "PUT":
	            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
	            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
	            break;
	        case "DELETE":
	            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
	            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
	            break;
	        default:
	            break;
	    }
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json','Accept: application/json'));
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	    echo $output = curl_exec($ch);
	    curl_close($ch);
		}
}

?>
<?php

// get the new item here - new item from INS
//



$sql = "SELECT `notifications`.`dt`, `notifications`.`receipt`, `lineItems`.`itemNo`, `billing`.`email`,`billing`.`firstName`, `billing`.`lastName`, `lineItems`.`downloadUrl`, `notifications`.`affiliate`, `notifications`.`vendor`
FROM `notifications`
LEFT JOIN `lineItems` on `notifications`.`id` = `lineItems`.`lnkid`
LEFT JOIN `billing` on `billing`.`lnkid` = `notifications`.`id`
WHERE (`lineItems`.`itemNo` LIKE 'cptbook%' or `lineItems`.`itemNo` LIKE 'sgfl%' or `lineItems`.`itemNo` LIKE 'swt%' or `lineItems`.`itemNo` LIKE 'tclsr%') AND `billing`.`email` <> '' AND `notifications`.`receipt` = '".$_SESSION['receipt']."' 
GROUP BY `notifications`.`dt`, `notifications`.`receipt`, `lineItems`.`itemNo`, `billing`.`email`,`billing`.`firstName`, `billing`.`lastName`, `lineItems`.`downloadUrl`, `notifications`.`affiliate`, `notifications`.`vendor`";

$mp = new MP;
$getnew = $myPDO->query($sql);
while ($row = $getnew->fetch()) { 

	//$row['id']

	if(!empty($row['itemNo']) && !empty($row['email']))
	{

		$first_name=$row['firstName'];
		$email=$row['email'];
		$page=$row['downloadUrl'];
		$affiliate=(empty($row['affiliate'])? 'vendor:'.$row['vendor']:'affiliate:'.$row['affiliate']);
		$updatedTimeUtc = gmdate("Y-m-d\\TH:i:s\\Z");

		$contactData= ["contact"=>["email"=>$email,"first_name"=>$first_name,"custom_field"=>["opt_source_drm"=>$page,"affiliate"=>$affiliate,"updated" => $updatedTimeUtc],"add_tags"=>[$row['itemNo'], "clickbank"],"subscribe"=>true,"remove_from_dnm"=>true]];
		$newcontact = $mp->request('POST','lists/14/contacts',  $contactData); // 18 is he original value 

		$myPDO->query($qry = "UPDATE notifications SET posted = 1 WHERE receipt = '".$_SESSION['receipt']."'");

		if($newcontact)
			file_put_contents('ins_maro.txt', ">>>>ok result: ".print_r($newcontact , true), FILE_APPEND);
    	else
			file_put_contents('ins_maro.txt', ">>>>error result: ".print_r($newcontact , true), FILE_APPEND);

	}

}
      	


// SELECT `notifications`.`dt`, `lineitems`.`itemNo`, `billing`.`email`,`billing`.`firstName`, `billing`.`lastName`
// FROM `notifications`
// LEFT JOIN `lineitems` on `notifications`.`id` = `lineitems`.`lnkid`
// LEFT JOIN `billing` on `billing`.`lnkid` = `notifications`.`id`
// WHERE (`lineitems`.`itemNo` LIKE 'cptbook%' or `lineitems`.`itemNo` LIKE 'sgfl%' or `lineitems`.`itemNo` LIKE 'swt%' or `lineitems`.`itemNo` LIKE 'tclsr%') AND `billing`.`email` <> ''
// GROUP BY `notifications`.`dt`, `lineitems`.`itemNo`, `billing`.`email`,`billing`.`firstName`, `billing`.`lastName`


?>