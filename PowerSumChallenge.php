<?php

$X = 7;
$N = 2;
$foo = $X;
$NArr = array();
$totalSolutions = 0;


function getSolutions($foo, $NArr, $totalSolutions)
{
	// $NArr = array_reverse($NArr);
	if ($foo == 0){
		$totalSolutions++;
	}
	else {
		$sumVals = 0;
		for($i = 0; $i < count($NArr); $i++){
			$sumVals += $NArr[$i];
			if ($sumVals == $foo){
				$totalSolutions++;
			}
			elseif($sumVals > $foo){
				$newFoo = $foo - $NArr[$i];
				$lastOutTake = $NArr[$i];
				$newNArr = $NArr;
				$j = 0;
				while($newNArr == $NArr){
					if($NArr[$j] >= $lastOutTake OR $NArr[$j] > $newFoo){
						$newNArr = array_slice($NArr, 0, $j);
					}
					$j++;
				}
				$newTotalSolutions = getSolutions($newFoo, $newNArr, 0);
				$totalSolutions += $newTotalSolutions;
			}
		}
	}
	$returns = array("\$foo" => $foo, "\$NArr" => $NArr, "\$totalSolutions" => $totalSolutions);
	return $totalSolutions;
}

function buildArray($X, $N, $NArr)
{
	$i = 2;
	$arrVal = 1;
	while ($arrVal <= $X){
		array_push($NArr, $arrVal);
		$arrVal = pow($i, $N);
		$i++;
	}
	return $NArr;
}

$NArr = buildArray($X, $N, $NArr);
$returns = getSolutions($foo, $NArr, $totalSolutions);
printf($returns); 



