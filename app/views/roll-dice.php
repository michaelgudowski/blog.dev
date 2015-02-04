<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dice Game</title>
</head>
<body>
<? if($guess == $randomnumber){
  	?> 
  	<h1> You're guess of <h1> <?=$guess ?> <h1>is correct</h1>
 <? }
  else{
  	 ?><h1> The number was <h1> <?=$randomnumber;
  	}
?>

</body>
</html>