<?php
$in = "Artist_lists_small.txt";
$lt = 50;
$lwc = array();
$ln = 0;
$out = "output2.txt";
$start = microtime(true);

foreach (file($in) as $line) {
	$ln++;
	$item = explode(",", $line);
	foreach($item as $artist){
			$artist = trim($artist);
			if($lwc[$artist] == null){
				$lwc[$artist] = array();
			}
			$lwc[$artist][] = $ln;
	}
}



$fh = fopen($out, 'w') or die("can't open output file\n");
foreach($lwc as $k1=>$value){
	if(count($value) >= $lt){
		foreach($lwc as $k2=>$value2){
			if(count($value2) >= $lt && $k2 > $k1){
								
				$lc = count(array_intersect_key($value, $value2));
				if($lc >= $lt){
					fwrite($fh, $k1. " & ".$k2. " (".$lc.")\n");
					#echo  $k1. " & ".$k2. " (".$lc.")\n";
				}
			}
		}	
	}
}
fclose($fh);

echo "finish: ", microtime(true) -  $start;
echo "\n\n FYI -- \nOutput file = ".$out."\n";
