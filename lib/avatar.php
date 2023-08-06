<?php

function createAvatarImage($string)
{
    $imageFilePath = "../temp/" . $string . ".png";

    if (!file_exists($imageFilePath)) {

        //base avatar image that we use to center our text string on top of it.
        $avatar = imagecreate(185, 190);

        //assign random rgb values
        $r = rand(50, 200); //r(ed)
        $g = rand(50, 200); //g(reen)
        $b = rand(50, 200); //b(lue)

        imagecolorallocate($avatar, $r, $g, $b);
        $textcolor = imagecolorallocate($avatar, 255, 255, 255);
        $font =dirname(__DIR__).'\assets\fonts\bold.ttf';
        echo $font;
        $font = mb_convert_encoding($font, 'big5', 'utf-8');

        include "sizeavatar.php";

        imagettftext($avatar, 90, 0, $x, $y, $textcolor, $font, $string);

        //header("Content-type: image/png");  
        imagepng($avatar, $imageFilePath);
        imagedestroy($avatar);
        return $imageFilePath;
    } else {
        $imageFilePath = "../temp/" . $string . ".png";
        return $imageFilePath;
    }
}

?>
