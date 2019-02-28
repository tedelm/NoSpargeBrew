# NoSpargeBrew
Calculate No Sparge water with powershell

Copy/Paste to powershell:</br>
</br>
#Batch size (Liters)</br>
	$BatchSize = 23</br>
#Grain Bill (Kg)</br>
	$MaltKg = 5.5</br>
#Grain Absorption (Liter/Kg)</br>
	$GrainAbs = 1</br>
#No sparge brewhouse eff 1.2 = 120% malt needed to reach original sparge OG</br>
	$BrewEff = 1.2</br>
#Boil Off (Liters)</br>
	$BoilOffLiter = 3</br>
</br>
$WaterNeeded = $BatchSize + ($BatchSize - ($BatchSize - (($MaltKg * $BrewEff) * $GrainAbs) - $BoilOffLiter))</br>
Write-Host "You will need $WaterNeeded to reach your batch size of $BatchSize"
</br>
</br>
</br>
</br>





