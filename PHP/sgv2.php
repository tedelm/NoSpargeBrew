<?php



switch ($_GET['action']) {
    case "calc":
	
        $Sugars = $_POST['Sugars'];
        $BatchSize = $_POST['BatchSize'];
        $MeasuredSG = $_POST['MeasuredSG'];
        $WantedSG = $_POST['WantedSG'];        

        $MissingPoints = ($WantedSG - $MeasuredSG) * 1000; //Result should be the at least 1.

    break;
}

if(isset($Sugars)){

    if($Sugars == 'Sugar'){
        #Table Sugar = 1.0375
        $Sugars_SG = 375;
        $amount = 0.00267; //Kg
    }
    if($Sugars == 'Malt Extract'){
        #Malt Extract = 1.0350
        $Sugars_SG = 350;
        $amount = 0.00286; //Kg
    }

    $calcMissing = ($amount * $MissingPoints);
    $AmountToAdd = $calcMissing*$BatchSize;

    $SGResult = number_format(($AmountToAdd), 3);

    $EchoResult = "You will have to add $SGResult Kg of $Sugars to get from $MeasuredSG to $WantedSG";
	
}else{
    
    $BatchSize = 23;
    $MeasuredSG = 1.045;
    $WantedSG = 1.065;    

}

?>
<head>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<html>
   <body>
   <h1>Specific Gravity Calculator</h1>
   </br>
   <table class='tableClass2'>
	 <tr>
		<td><?php Echo $EchoResult; ?></td>
	 </tr>
	</table>
	</br>   
	
	<form class='formclass' id='calc' method='post' action='sgv2.php?action=calc'>
	<table class='tableClass'>
		<tr>
			<td>Batch Size:</td><td><input class='inputClass' type="number" step='any' value='<?php echo $BatchSize; ?>' name='BatchSize' /></td>
		</tr>
		<tr>
			<td>Addition Type:</td><td>
                                    <select class='inputClass'  name='Sugars' />
                                        <option value='Sugar' >Sugar</option>
                                        <option value='Malt Extract'>Malt Extract</option>
                                    </select>
                                    </td>
		</tr>
		<tr>
			<td>Measured SG:</td><td><input class='inputClass' type='number' step='any' value='<?php echo $MeasuredSG; ?>' name='MeasuredSG' /></td>
		</tr>    
		<tr>
			<td>Wanted SG:</td><td><input class='inputClass' type='number' step='any' value='<?php echo $WantedSG; ?>' name='WantedSG' /></td>
		</tr>             
		</table>
		<input class='inputClass' type="submit" id='calc' value='Calculate'>


    </form>
	</br>
	</br>
   </body>
</html>
