<?php
//presets start
$widthImage = 100;
$heightImage = 100;
$font_size = 16;
$let_amount = 5;			//quantityNumberOnTask
$quantityNumberOnImage = 30;		//quantityNumberOnImage
$fontSorce = "fonts/cour.ttf";	//sorse for fons file
//presets end
$numbers = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0);
$colors = array("90", "110", "130", "150", "170", "190", "210");
$Sorce = imagecreatetruecolor($widthImage, $heightImage);
$fonCreate = imagecolorallocate($Sorce, 255, 255, 255);
imagefill($Sorce, 0, 0, $fonCreate);

for($iterable1 = 0; $iterable1 < $quantityNumberOnImage; $iterable1++){
   	$color = imagecolorallocatealpha($Sorce, rand(0, 255), rand(0, 255), rand(0, 255), 100);
   	$number = $numbers[rand(0, sizeof($numbers) - 1)];
   	$size = rand($font_size - 2, $font_size + 2);
   	imagettftext($Sorce,$size,
    rand(0,45),
	  rand($widthImage * 0.1, $widthImage - $widthImage * 0.1),
		rand($heightImage * 0.2, $heightImage),
    $color, $font, $number);
}

for($iterable2 = 0; $iterable2 < $let_amount; $iterable2++){
   $color = imagecolorallocatealpha($Sorce,
   $colors[rand(0, sizeof($colors) - 1)],
   $colors[rand(0, sizeof($colors) - 1)],
   $colors[rand(0, sizeof($colors) - 1)],
   rand(25, 35));
   $number = $numbers[rand(0,sizeof($numbers) - 1)];
   $size = rand($font_size * 2 - 2,$font_size * 2 + 2);
   $transitionx = ($iterable2 + 1) * $font_size + rand(1, 5);		//random transition
   $transitiony = (($heightImage * 2) / 3) + rand(0, 5);
   $cod[] = $number;
   imagettftext($Sorce, $size, rand(0, 15), $transitionx, $transitiony, $color, $fontSorce, $number);
}
$cod = implode("", $cod);
header ("Content-type: image/gif");
imagegif($Sorce);
