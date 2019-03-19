<?php

//1000+(375*0.1)/10
//1000 = sg konvertering
//375 = socker
//0.1 = 100g
//10 = 10 liter

switch ($_GET['action']) {
    case "calc":
	
        $Sugars = $_POST['Sugars'];
        $BatchSize = $_POST['BatchSize'];
        $SugarsKG = $_POST['SugarsKG'];
        

    break;
}

if(isset($Sugars)){

    if($Sugars == 'Sugar'){
        #Table Sugar = 1.0375
        $Sugars_SG = 375;
    }
    if($Sugars == 'Malt Extract'){
        #Malt Extract = 1.0350
        $Sugars_SG = 350;
    }

    $SGResult = number_format((1000+($Sugars_SG*$SugarsKG)/$BatchSize), 0);
	
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
		<td><?php Echo "$SugarsKG Kg $Sugars will rais SG with: $SGResult"; ?></td>
	 </tr>
	</table>
	</br>   
	
	<form class='formclass' id='calc' method='post' action='sg.php?action=calc'>
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
			<td>Addition (Kg):</td><td><input class='inputClass' type='number' step='any' value='<?php echo $SugarsKG; ?>' name='SugarsKG' /></td>
		</tr>        
		</table>
		<input class='inputClass' type="submit" id='calc' value='Calculate'>


    </form>
	</br>
	</br>
   </body>
</html>
