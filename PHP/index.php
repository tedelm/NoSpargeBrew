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
		
		$Echo_MashVol = number_format($MaxMashWater, 2);
		$Echo_MashVolPerKg = number_format(($MaxMashWater/($MaltKg * $BrewEff)), 2);
		$Echo_BeforeBoil = number_format($AddToBoilWater, 2);
		$Echo_GrainNeeded = number_format(($MaltKg * $BrewEff), 2);
		
    break;
}

if(isset($BatchSize)){
	$value_BatchSize = $BatchSize;
	$value_MaxBoilVol = $MaxBoilVol;
	$value_MaltKg = $MaltKg;
	$value_GrainAbs = $GrainAbs;
	$value_BrewEff = $BrewEff;
	$value_BoilOffLiter = $BoilOffLiter;
}else{
	$value_BatchSize = 23;
	$value_MaxBoilVol = 30;
	$value_MaltKg = 5;
	$value_GrainAbs = 1;
	$value_BrewEff = 1.2;
	$value_BoilOffLiter = 3;
}

?>

<html>
   <body>
   <h1>No Sparge Calculator</h1></br></br></br>
	<form id='calc' method='post' action='index.php?action=calc'>
        Batch Size: <input type="number" step='any' value='<?php echo $value_BatchSize; ?>' name='BatchSize' /></br>
        Kettel max vol (L): <input type='number' step='any' value='<?php echo $value_MaxBoilVol; ?>' name='MaxBoilVol' /></br>
        Grain Bill (Kg): <input type="number" step='any' value='<?php echo $value_MaltKg; ?>' name='MaltKg' /></br>
        Grain Absorption (Liter/Kg): <input type="number" step='any' value='<?php echo $value_GrainAbs; ?>' name='GrainAbs' /></br>
		No sparge brewhouse eff: <input type="number" step='any' value='<?php echo $value_BrewEff; ?>' name='BrewEff' /></br>
        Boil Off (Liters): <input type="number" step='any' value='<?php echo $value_BoilOffLiter; ?>' name='BoilOffLiter' /></br></br>
		<input type="submit" id='calc' value='Calculate'></br>
    </form>
	</br>
	</br>
    Mash vol (L): <?php Echo $Echo_MashVol; ?></br>
	Mash L/Kg: <?php Echo $Echo_MashVolPerKg; ?></br>
    Add before boil (L): <?php Echo $Echo_BeforeBoil; ?></br>
    You will need <?php Echo $Echo_GrainNeeded; ?> Kg malt</br>	
	</br>
   </body>
</html>