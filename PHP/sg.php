<?php

//1000+(375*0.1)/12
//1000 = sg konvertering
//375 = socker
//0.1 = 100g
//12 = 12 liter

switch ($_GET['action']) {
    case "calc":
	
        $Sugars = $_POST['Sugars'];
        $BatchSize = $_POST['BatchSize'];
        $SugarsKG = $_POST['SugarsKG'];
        

    break;
}

if(isset($Sugars)){

    if($Sugars == 'Sugar'){
        $Sugars_SG = 375;
    }
    if($Sugars == 'Malt Extract'){
        $Sugars_SG = 350;
    }

    $SGResult = number_format((1000+($Sugars_SG*$SugarsKG)/$BatchSize), 2);
	$Result = "$SugarsKG Kg $Sugars will raise SG with: $SGResult";
}else{
    
    $BatchSize = '23';
    $SugarsKG = '0.250';
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
		<td><?php Echo $Result; ?></td>
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
