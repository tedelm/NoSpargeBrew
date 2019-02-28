param(
	[Parameter(Mandatory=$true)]
	[int]$BatchSize,
	
	[Parameter(Mandatory=$true)]
	[int]$MaxBoilVolume,

	[Parameter(Mandatory=$true)]
	[int]$GrainAmount,

	[int]$GrainAbsorption = 1,

	[int]$BoilOffVolume = 3,

	[int]$BrewEfficiency=1.2
	
)

Function NoSpargeVol(){ 

	$WaterNeeded = $BatchSize + ($BatchSize - ($BatchSize - (($GrainAmount * $BrewEfficiency) * $GrainAbsorption) - $BoilOffVolume))
	Write-Host -BackgroundColor yellow -ForegroundColor red "You will need $WaterNeeded L to reach your batch size of $BatchSize L" 
	
	#Max mash vol
	$MaxMashWater = $MaxBoilVolume - ($GrainAmount * $BrewEfficiency)
	Write-Host -BackgroundColor yellow -ForegroundColor red "Mash vol: $MaxMashWater" 
	#Water to be added before boil
	$AddToBoilWater = $WaterNeeded - $MaxMashWater
	Write-Host -BackgroundColor yellow -ForegroundColor red "Add before boil: $AddToBoilWater" 
}

NoSpargeVol 


<#

.SYNOPSIS
Powershell script for calculating water requirements for no-sparge brews.

.DESCRIPTION
This script will help brewers calculate the water required when doing no-sparge brews.

.PARAMETER BatchSize
	The volume going into fermenter (L).

.PARAMETER MaxBoilVolume
	The maximum volume for your brew kettle (L).

.PARAMETER GrainAmount
	The grain bill for your brew (kg).

.PARAMETER BrewEfficiency
	Optional.
	To compensate for the slightly poorer efficiency in no-sparge brews the grain bill will be multiplied with this number.
	Default is 1.2 (120% is needed to reach original OG)

.PARAMETER BoilOffVolume
	Optional.
	The amount of water that is lost during boil (L).
	Default is 3.

.PARAMETER GrainAbsorption
	Optional.
	The amount of water the is absorbed by the grain (L/kg).
	Default is 1.
.EXAMPLE
./noSparge.ps1 -GrainAmount 5.5 -BatchSize 23 -MaxBoilVolume 30



.LINK
https://github.com/tedelm/NoSpargeBrew

#>