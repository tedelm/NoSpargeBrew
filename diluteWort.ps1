function calculateWort($SG,$Wanted_SG,$Batchsize,$Wanted_IBU){

    $SG = [math]::Round(($SG*1000)-1000,0)
    $wanted_SG = [math]::Round(($wanted_SG*1000)-1000,0)

    $diff = $wanted_SG/$SG
    $waterToAdd = $batchsize-($batchsize*$diff)
    Write-host "You need to add $waterToAdd liters of water to your wort" 

    $MissingIBU = ($Wanted_IBU/$batchsize)*$waterToAdd
    Write-host "Your wort will be missing $MissingIBU IBU after adding $waterToAdd liters of water"

}

calculateWort -SG 1.050 -Wanted_SG 1.045 -Wanted_IBU 30 -Batchsize 23


