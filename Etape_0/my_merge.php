<?php
    function my_merge_image($path01, $path02){
        $arrSize = [];
        $width = 0;
        $height = 0;
        $i = 0;

        array_push($arrSize, getimagesize($path01));
        array_push($arrSize, getimagesize($path02));
        
        // definit width / height max
         while ($i < count($arrSize)){
            if ($width < $arrSize[$i][0]){
                $width = $arrSize[$i][0];
            }
            $height += $arrSize[$i][1];
            $i++;
        }

        // creation img Ressource 
        $imgM01 = imagecreatefrompng($path01);
        $imgM02 = imagecreatefrompng($path02);

        // Creation image container 
        $img1 = imagecreatetruecolor($width, $height);
        // SUppr couleur de fond 
        imagealphablending($img1, false);
        imagesavealpha($img1, true);


        // Ajout img path01 et path02 a img container 
        imagecopy($img1, $imgM01, 0, 0, 0, 0, 200, 200);
        imagecopy($img1, $imgM02, -0, 200, 0, 0, 200, 200);

        
        // creation img container dans l'arborescence
        imagepng($img1, "sprite.png");

    }
    my_merge_image('./img01.png', './img02.png');