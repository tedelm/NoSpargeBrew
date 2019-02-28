# NoSpargeBrew
Calculate No Sparge water with powershell

Copy/Paste to powershell:</br>
</br>
```
Function NoSpargeVol(){
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
Write-Host -BackgroundColor yellow -ForegroundColor red "You will need $WaterNeeded L to reach your batch size of $BatchSize L" </br>
}</br>
</br>
NoSpargeVol
```
</br>
</br>
</br>
</br>





