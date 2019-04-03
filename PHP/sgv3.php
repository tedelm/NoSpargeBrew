<?php



switch ($_GET['action']) {
    case "calc":
	
        $SG = $_POST['SG'];
		$Wanted_SG = $_POST['Wanted_SG'];
        $BatchSize = $_POST['BatchSize'];
        $Wanted_IBU = $_POST['Wanted_IBU'];    

    $SG2 = ($SG*1000)-1000;
    $Wanted_SG2 = ($Wanted_SG*1000)-1000;

    $diff = $Wanted_SG2/$SG2;
    $waterToAdd = number_format($BatchSize - ($BatchSize*$diff), 0);
    //Write-host "You need to add $waterToAdd liters of water to your wort" 

    $MissingIBU = number_format(($Wanted_IBU/$BatchSize)*$waterToAdd, 0);
	$NewVolume = $waterToAdd + $BatchSize;

    break;
}

if(isset($SG)){

    $EchoResult = "
	You need to add $waterToAdd liters of water to your wort </br>
	Your wort will be missing $MissingIBU IBU after adding $waterToAdd liters of water </br>
	End wort volume will be $NewVolume liters</br>
	";
	
	
}else{
    
    $BatchSize = 23;
    $SG = 1.055;
    $Wanted_SG = 1.045;    
    $Wanted_IBU = 35;	

}

?>
<head>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<html>
   <body>
   <h1>Specific Gravity Calculator</h1>
   <table class='tableClass2'>
	 <tr>
		<td><a href='http://softwaist.se/NoSparge/index.php'>No Sparge Calculator</a> | <a href='http://softwaist.se/NoSparge/sg.php'>Add sugars</a> | <a href='http://softwaist.se/NoSparge/sgv2.php'>Calc extract</a> | <a href='http://softwaist.se/NoSparge/sgv3.php'>Dilute wort</a> </td>
	 </tr>   
	 <tr>
		<td><?php Echo $EchoResult; ?></td>
	 </tr>	 
	</table>
	</br>   
	
	<form class='formclass' id='calc' method='post' action='sgv3.php?action=calc'>
	<table class='tableClass'>
		<tr>
			<td>Batch Size:</td><td><input class='inputClass' type="number" step='any' value='<?php echo $BatchSize; ?>' name='BatchSize' /></td>
		</tr>
		<tr>
			<td>Measured SG:</td><td><input class='inputClass' type='number' step='any' value='<?php echo $SG; ?>' name='SG' /></td>
		</tr>    
		<tr>
			<td>Wanted SG:</td><td><input class='inputClass' type='number' step='any' value='<?php echo $Wanted_SG; ?>' name='Wanted_SG' /></td>
		</tr>    
		<tr>
			<td>IBU:</td><td><input class='inputClass' type='number' step='any' value='<?php echo $Wanted_IBU; ?>' name='Wanted_IBU' /></td>
		</tr> 		
		</table>
		<input class='inputClass' type="submit" id='calc' value='Calculate'>


    </form>
	</br>
	</br>
   </body>
</html>
