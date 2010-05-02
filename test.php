<?php

$ua_tests = array(

	// Internet Explorer bestiary
	'IE9 on Win7' => array(
		'ua' => 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Trident/5.0)',
		'test' => array(
			'browser' => 'ie',
			'browserversion' => '9',
			'platform' => 'windows',
			'platformversion' => '6.1',
			'platformtype' => 'desktop'
		)
	),
	'IE9 on Vista' => array(
		'ua' => 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.0; Trident/5.0)',
		'test' => array(
			'browser' => 'ie',
			'browserversion' => '9',
			'platform' => 'windows',
			'platformversion' => '6.0',
			'platformtype' => 'desktop'
		)
	),
	'IE8 on Win7' => array(
		'ua' => 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; WOW64; Trident/4.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0; MS-RTC LM 8)',
		'test' => array(
			'browser' => 'ie',
			'browserversion' => '8',
			'platform' => 'windows',
			'platformversion' => '6.1',
			'platformtype' => 'desktop'
		)
	),
	'IE8 on Vista' => array(
		'ua' => 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0)',
		'test' => array(
			'browser' => 'ie',
			'browserversion' => '8',
			'platform' => 'windows',
			'platformversion' => '6.0',
			'platformtype' => 'desktop'
		)
	),
	'IE8 on WinXP' => array(
		'ua' => 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 5.1; Trident/4.0; InfoPath.1; .NET CLR 2.0.50727; .NET CLR 3.0.04506.30; .NET CLR 3.0.04506.648; yie8)',
		'test' => array(
			'browser' => 'ie',
			'browserversion' => '8',
			'platform' => 'windows',
			'platformversion' => '5.1',
			'platformtype' => 'desktop'
		)
	),
	'IE7 on Win7' => array(
		'ua' => 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.1; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)',
		'test' => array(
			'browser' => 'ie',
			'browserversion' => '7',
			'platform' => 'windows',
			'platformversion' => '6.1',
			'platformtype' => 'desktop'
		)
	),
	'IE7 (IE Tester) on Win7' => array(
		'ua' => 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.1; WOW64; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)',
		'test' => array(
			'browser' => 'ie',
			'browserversion' => '7',
			'platform' => 'windows',
			'platformversion' => '6.1',
			'platformtype' => 'desktop'
		)
	),
	'IE7 on Vista' => array(
		'ua' => 'Mozilla/5.0 (compatible; MSIE 7.0; Windows NT 6.0; WOW64; SLCC1; .NET CLR 2.0.50727; Media Center PC 5.0; c .NET CLR 3.0.04506; .NET CLR 3.5.30707; InfoPath.1; el-GR)',
		'test' => array(
			'browser' => 'ie',
			'browserversion' => '7',
			'platform' => 'windows',
			'platformversion' => '6.0',
			'platformtype' => 'desktop'
		)
	),
	'IE7 on WinXP' => array(
		'ua' => 'Mozilla/4.0 (Windows; MSIE 7.0; Windows NT 5.1; SV1; .NET CLR 2.0.50727)',
		'test' => array(
			'browser' => 'ie',
			'browserversion' => '7',
			'platform' => 'windows',
			'platformversion' => '5.1',
			'platformtype' => 'desktop'
		)
	),
	'IE6 (IE Tester) on Win 7' => array(
		'ua' => 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 6.1; WOW64; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729; Media Center PC 6.0)',
		'test' => array(
			'browser' => 'ie',
			'browserversion' => '6',
			'platform' => 'windows',
			'platformversion' => '6.1',
			'platformtype' => 'desktop'
		)
	),
	'IE6 on WinXP' => array(
		'ua' => 'Mozilla/5.0 (compatible; MSIE 6.0; Windows NT 5.1)',
		'test' => array(
			'browser' => 'ie',
			'browserversion' => '6',
			'platform' => 'windows',
			'platformversion' => '5.1',
			'platformtype' => 'desktop'
		)
	)
);

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Basset test</title>
	</head>
	<body>
		<h1>Test results</h1>
		<p>
			<a href="http://www.useragentstring.com/pages/useragentstring.php">Add more tests!</a>
		</p>
		<table border="1">
			<tr>
				<th rowspan="2">Subject</th>
				<th colspan="7">Results</th>
				<th rowspan="2">UA-String</th>
			</tr>
			<tr>
				<th>Name</th>
				<th>Version</th>
				<th>Engine</th>
				<th>Version</th>
				<th>OS</th>
				<th>Version</th>
				<th>Type</th>
			</tr>

<?php

include('Basset.php');

$properties = array('name', 'version', 'engine', 'engineversion', 'platform', 'platformversion', 'platformtype');

foreach($ua_tests as $title => $test){
	if(!isset($test['ua'])){
		$test['ua'] = '';
	}
	$uas = (is_array($test['ua'])) ? $test['ua'] : array($test['ua']);
	echo '<tr>';
	echo '<th rowspan="'.count($uas).'" id="'.preg_replace('/[^(\x20-\x7F)\x0A]*/','', $title).'"><a href="#'.preg_replace('/[^(\x20-\x7F)\x0A]*/','', $title).'">'.$title.'</a></th>';
	foreach($uas as $ua){
		if($ua != $uas[0]){
			echo '<tr>';
		}
		$browser = new Browser($ua);
		foreach($properties as $property){
			if(!isset($test['test'][$property]) || $test['test'][$property] == ''){
				if(empty($browser->$property)){
					$message = 'Not tested, not found';
				}
				else{
					$message = 'Not tested, found <b>'.$browser->$property.'</b>';
				}
				echo '<td bgcolor="#EEEEEE">'.$message.'</td>';
			}
			elseif(strtolower($test['test'][$property]) == strtolower($browser->$property)){
				echo '<td bgcolor="#00FF00">Pass ('.$browser->$property.')</td>';
			}
			else{
				echo '<td bgcolor="#FF0000">Fail (Expected <b>'.$test['test'][$property].'</b>, found <b>'.$browser->$property.'</b>)</td>';
			}
		}
		echo '<td>'.$ua.'</td>';
		echo '</tr>';
	}
}

?>

		</table>
	</body>
</html>