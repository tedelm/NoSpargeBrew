# NoSpargeBrew
Calculate No Sparge water with powershell

Copy/Paste to powershell:</br>
</br>
```
Function NoSpargeVol(){ 
	#Batch size (Liters)
	$BatchSize = 23
	#Max Boil vol (GrainFater = 30L)
	$MaxBoilVol = 30
	#Grain Bill (Kg)
	$MaltKg = 5.5
	#Grain Absorption (Liter/Kg)
	$GrainAbs = 1
	#No sparge brewhouse eff 1.2 = 120% malt needed to reach original sparge OG
	$BrewEff = 1.2
	#Boil Off (Liters)
	$BoilOffLiter = 3

	$WaterNeeded = $BatchSize + ($BatchSize - ($BatchSize - (($MaltKg * $BrewEff) * $GrainAbs) - $BoilOffLiter))
	Write-Host -BackgroundColor yellow -ForegroundColor red "You will need $WaterNeeded L to reach your batch size of $BatchSize L" 
	
	#Max mash vol
	$MaxMashWater = $MaxBoilVol - ($MaltKg * $BrewEff)
	Write-Host -BackgroundColor yellow -ForegroundColor red "Mash vol: $MaxMashWater" 
	#Water to be added before boil
	$AddToBoilWater = $WaterNeeded - $MaxMashWater
	Write-Host -BackgroundColor yellow -ForegroundColor red "Add before boil: $AddToBoilWater" 
}

NoSpargeVol 


```
</br>
</br>
</br>
</br>





