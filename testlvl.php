<?php

if (isset($level)) {
	$searchfor = $level;
	
}
else {
	$searchfor = 'S3324';
	
}

$file = 'conf.txt';
 //<-- 
// get the file contents, assuming the file to be readable (and exist)
$contents = file_get_contents($file);

// escape special characters in the query
$pattern = preg_quote($searchfor, ',');

$pattern = "/^.*$pattern.*\$/m";
echo "$pattern";
if(preg_match_all($pattern, $contents, $matches)){
	echo"aqui si";
	foreach ($matches[0] as $point) {
		$codeline=explode(",",$point);
		$name=$codeline[0];
		$width=$codeline[1];
		$heigth=$codeline[2];
		$numberOfCeldasToIlluminate=$codeline[3];
		$secondsin=$codeline[4];
		$code=$codeline[5];

	}
   
}
else{
   echo "No matches found";
} 

?>

