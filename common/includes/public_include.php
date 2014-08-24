<?php

function home_base_url(){

	// first get http protocol if http or https
	$base_url = (isset($_SERVER['HTTPS']) &&
	$_SERVER['HTTPS']!='off') ? 'https://' : 'http://';

	// get default website root directory
	$tmpURL = dirname(__FILE__);
	
	/*
	 * when use dirname(__FILE__) will return value like this "C:\xampp\htdocs\my_website",
	 * convert value to http url use string replace, replace any backslashes to slash in this
	 * case use chr value "92"
	 */
	$tmpURL = str_replace(chr(92),'/',$tmpURL);

	/*
	 * now replace any same string in $tmpURL value to null or ''
	 * and will return value like /localhost/my_website/ or just /my_website/
	 */
	$tmpURL = str_replace($_SERVER['DOCUMENT_ROOT'],'',$tmpURL);

	// delete any slash character in first and last of value

	$tmpURL = ltrim($tmpURL,'/');
	$tmpURL = rtrim($tmpURL, '/');

	// check again if we find any slash string in value then we can assume its local machine

	if (strpos($tmpURL,'/')){
		// explode that value and take only first value
		$tmpURL = explode('/',$tmpURL);
		$tmpURL = $tmpURL[0];
	}

	// now last steps assign protocol in first value
	if ($tmpURL !== $_SERVER['HTTP_HOST']) {

		
		$app_uri = $_SERVER['REQUEST_URI'];
		//echo $docRoot . "\n";
		$app_name = explode('/', $app_uri);

		//echo $app_name[1];

		// if protocol its http then like this
		//$base_url .= $_SERVER['HTTP_HOST'].'/'.$tmpURL.'/';
		$base_url .= $_SERVER['HTTP_HOST'].'/' . $app_name[1] .'/';
	}
	else
	// else if protocol is https
	$base_url .= $tmpURL.'/';
	// give return value
	return $base_url;
}

// Indore 9724666563


echo '<script src="'.home_base_url().'common/external/jqGrid/js/jquery-1.4.2.min.js" type="text/javascript"></script>'."\n";

echo '<script src="'.home_base_url().'common/external/jquery/jquery-1.11.0.js" type="text/javascript"></script>'."\n";
echo '<script src="'.home_base_url().'common/external/jquery/jquery-migrate.js" type="text/javascript"></script>'."\n";

echo '<script src="'.home_base_url().'common/external/jquery-ui-1.10.4/js/jquery-ui-1.10.4.custom.js" type="text/javascript"></script>'."\n";
echo '<script src="'.home_base_url().'common/external/jquery-ui-1.10.4/development-bundle/ui/jquery.ui.datepicker.js" type="text/javascript"></script>'."\n";

echo '<script src="'.home_base_url().'common/external/jquery-timepicker-master/jquery.timepicker.js" type="text/javascript"></script>'."\n";

echo '<script src="'.home_base_url().'common/external/jquery-ui-timepicker/jquery-ui-timepicker-addon.js" type="text/javascript"></script>'."\n";

echo '<script src="'.home_base_url().'common/external/jqGrid/js/i18n/grid.locale-en.js" type="text/javascript"></script>'."\n";
echo '<script src="'.home_base_url().'common/external/jqGrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>'."\n";
echo '<script src="'.home_base_url().'common/external/jqGrid/src/grid.common.js" type="text/javascript"></script>'."\n";
echo '<script src="'.home_base_url().'common/external/jqGrid/src/grid.formedit.js" type="text/javascript"></script>'."\n";
echo '<script src="'.home_base_url().'common/external/jqGrid/src/jqModal.js" type="text/javascript"></script>'."\n";
echo '<script src="'.home_base_url().'common/external/jqGrid/src/jqDnR.js" type="text/javascript"></script>'."\n";



echo '<link rel="stylesheet" type="text/css" media="screen" href="'.home_base_url().'common/external/jqGrid/css/ui.jqgrid.css" />'."\n";

echo '<link rel="stylesheet" type="text/css" media="screen" href="'.home_base_url().'common/external/jquery-ui-1.10.4/css/smoothness/jquery-ui-1.10.4.custom.css" />'."\n";
echo '<link rel="stylesheet" type="text/css" media="screen" href="'.home_base_url().'common/external/jquery-ui-1.10.4/development-bundle/themes/smoothness/jquery.ui.datepicker.css" />'."\n";

echo '<link rel="stylesheet" type="text/css" media="screen" href="'.home_base_url().'common/external/jquery-timepicker-master/jquery.timepicker.js" />'."\n";
echo '<link rel="stylesheet" type="text/css" media="screen" href="'.home_base_url().'common/external/jquery-ui-timepicker/jquery-ui-timepicker-addon.js" />'."\n";


?>

