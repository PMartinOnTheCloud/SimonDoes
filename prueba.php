<?php session_start();?>
<?php  

if (isset($_POST["codelevel"])){
        $_SESSION["codelevel"] = $_POST["codelevel"];
    }

$file = 'conf.txt';

$contents = file($file, FILE_IGNORE_NEW_LINES);

$prueba=$_SESSION['codelevel'];


for ($i=0; $i < sizeof($contents); $i++) { 
	if (strpos($contents[$i], $prueba)) {
		$line=$i;
		
	}
	
}

echo"$line";

?>