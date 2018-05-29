<?php
for($counter = 0 ; $counter < $id ; )
{
	$ran=rand(0,11);
	if($play["$ran"] != null)
	{
		$theText["$counter"] = $play["$ran"];
		$counter = $counter + 1;
		$play["$ran"] = null;
	}
	
	
}
for($counter = 0 ; $counter < $id ; $counter = $counter +1 )
{
	//echo $pic["$counter"];
	$num = $counter + 1 ;
	echo $num.'.';
	echo $name["$counter"];
	echo "<br>";
	echo '<img src='.$pic["$counter"].'.jpg width="200">';
	echo "<br>";
	echo $theText["$counter"];
	echo "<br>";
	echo "<br>";
}
