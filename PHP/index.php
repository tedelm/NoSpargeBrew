<?php

switch ($_GET['action']) {
    case "calc":
	
        $BatchSize = $_POST['BatchSize'];
        $MaxBoilVol = $_POST['MaxBoilVol'];
        $MaltKg = $_POST['MaltKg']; 
        $GrainAbs = $_POST['GrainAbs'];
        $BrewEff = $_POST['BrewEff']; 
        $BoilOffLiter = $_POST['BoilOffLiter'];
	
		#Calculate
		$WaterNeeded = $BatchSize + ($BatchSize - ($BatchSize - (($MaltKg * $BrewEff) * $GrainAbs) - $BoilOffLiter));
		$MaxMashWater = $MaxBoilVol - ($MaltKg * $BrewEff);
		$AddToBoilWater = $WaterNeeded - $MaxMashWater;
		
    break;
}

if(isset($BatchSize)){
	$value_BatchSize = $BatchSize;
	$value_MaxBoilVol = $MaxBoilVol;
	$value_MaltKg = $MaltKg;
	$value_GrainAbs = $GrainAbs;
	$value_BrewEff = $BrewEff;
	$value_BoilOffLiter = $BoilOffLiter;
	
	$Echo_MashVol = number_format($MaxMashWater, 2);
	$Echo_MashVolPerKg = number_format(($MaxMashWater/($MaltKg * $BrewEff)), 2);
	$Echo_BeforeBoil = number_format($AddToBoilWater, 2);
	$Echo_GrainNeeded = number_format(($MaltKg * $BrewEff), 2);	
	
}else{
	$value_BatchSize = 23;
	$value_MaxBoilVol = 30;
	$value_MaltKg = 5;
	$value_GrainAbs = 1;
	$value_BrewEff = 1.2;
	$value_BoilOffLiter = 3;
	
	$Echo_MashVol = "N/A";
	$Echo_MashVolPerKg = "N/A";
	$Echo_BeforeBoil = "N/A";
	$Echo_GrainNeeded = "N/A";	
}

?>
<head>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<html>
   <body>
   <h1>No Sparge Calculator</h1>
   </br>
   <table class='tableClass'>
	 <tr>
		<td>Mash vol (L): <?php Echo $Echo_MashVol; ?></td>
	 </tr>
	 <tr>
		<td>Mash L/Kg: <?php Echo $Echo_MashVolPerKg; ?></td>
	 </tr>
	 <tr>	 
		<td>Add before boil (L): <?php Echo $Echo_BeforeBoil; ?></td>
	 </tr>
	 <tr>	 
		<td>You will need <?php Echo $Echo_GrainNeeded; ?> Kg malt</td>
	 </tr>
	</table>
	</br>   
	
	<form class='formclass' id='calc' method='post' action='index.php?action=calc'>
	<table class='tableClass'>
		<tr>
			<td>Batch Size:</td><td><input class='inputClass' type="number" step='any' value='<?php echo $value_BatchSize; ?>' name='BatchSize' /></td>
		</tr>
		<tr>
			<td>Kettle max vol (L):</td><td><input class='inputClass' type='number' step='any' value='<?php echo $value_MaxBoilVol; ?>' name='MaxBoilVol' /></td>
		</tr>
		<tr>
			<td>Grain Bill (Kg):</td><td><input class='inputClass' type="number" step='any' value='<?php echo $value_MaltKg; ?>' name='MaltKg' /></td>
		</tr>
		<tr>
			<td>Grain Absorption (Liter/Kg):</td><td><input class='inputClass' type="number" step='any' value='<?php echo $value_GrainAbs; ?>' name='GrainAbs' /></td>
		</tr>
		<tr>
			<td>No sparge brewhouse eff:</td><td><input class='inputClass' type="number" step='any' value='<?php echo $value_BrewEff; ?>' name='BrewEff' /></td>
		</tr>
		<tr>
			<td>Boil Off (Liters):</td><td><input class='inputClass' type="number" step='any' value='<?php echo $value_BoilOffLiter; ?>' name='BoilOffLiter' /></td>
		</tr>
		</table>
		<input class='inputClass' type="submit" id='calc' value='Calculate'>


    </form>
	</br>
	</br>
   </body>
</html>