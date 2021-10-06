<?php
function  load_2d_arr_from_file(string  $filePath)
{
    // $filename = "fichier.txt";
    // $handle = fopen($filename, "r");
    // $contents = fread($handle, filesize($filename));
    // fclose($handle);
    // $headers = explode("\n", $contents);
    $headers = file($filePath);
    // array_pop($headers);
    array_shift($headers);
    foreach ($headers as $key => &$value) {


        $value = str_split(trim($value));
        // for ($y=0; $y < ; $y++) { 
        //     for ($x=0; $x < ; $x++) { 
        //         # code...
        //     }
        //     # code...
        // }
    }
    return $headers;
}

// load_2d_arr_from_file($argv[1]);


function doubletableau($file)
{
    $tableau = load_2d_arr_from_file($file);
    for ($y = 0; $y < count($tableau); $y++) {
        //  $key = $tableau[$i];
        for ($x = 0; $x < count($tableau[$y]); $x++) {

            $top_right = isset($tableau[$y - 1][$x]) ? $tableau[$y - 1][$x] : 0;

            $top_left = isset($tableau[$y - 1][$x - 1]) ? $tableau[$y - 1][$x - 1] : 0;

            $bottom_left = isset($tableau[$y][$x - 1]) ? $tableau[$y][$x - 1] : 0;

            if ($tableau[$y][$x] == ".") {
                $tableau[$y][$x] = $top_right + $bottom_left - $top_left + 0;
            } else {
                $tableau[$y][$x] = $top_right + $bottom_left - $top_left + 1;
            }
            //  print_r($tableau);
        }
    }
    return ($tableau);
}

// doubletableau();



function cherchecarrer($file)
{
    
    $doublearray = doubletableau($file);

    $finalarray = [];
    $cote = 1;
    
    for ($y = 0; $y < count($doublearray); $y++) {



        for ($x = 0; $x < count($doublearray[$y]); $x++) {

            if (($y < $cote - 1) || ($x < $cote - 1)) {
                continue;
            }
            $top_right = isset($doublearray[$y - $cote][$x]) ? $doublearray[$y - $cote][$x] : 0;

            $top_left = isset($doublearray[$y - $cote][$x - $cote]) ? $doublearray[$y - $cote][$x - $cote] : 0;

            $bottom_left = isset($doublearray[$y][$x - $cote]) ? $doublearray[$y][$x - $cote] : 0;


            $result = $doublearray[$y][$x] - $bottom_left - $top_right + $top_left == 0;




            if ($result) {
                // echo 'carrer man' . PHP_EOL;
                // var_dump($cote);
                $coordonner = [$y, $x , $cote];
                // echo $cote . PHP_EOL;
                // echo $coordonner . PHP_EOL;
                // $carrer = ($y - $cote) . "," . ($x - $cote) . PHP_EOL;
                // echo $carrer;
                $cote++;
                // echo 'ya R' . PHP_EOL;
            }
        }
    }
    // print_r( $coordonner[2]);

    $tabstr = load_2d_arr_from_file($file);
    
    for ($y= $coordonner[0]; $y > $coordonner[0] - $coordonner[2] ; $y--) { 
        for ($x = $coordonner[1]; $x > $coordonner[1] - $coordonner[2] ; $x--) { 
            $tabstr[$y][$x] = "x";
            // break;
        }
    }

    foreach ($tabstr as $value) {
        echo implode($value) . PHP_EOL;
    }
    // array_push($finalarray, )
    // print_r($doublearray);
}

cherchecarrer($argv[1]);


// function tableaufinal(){
    // $carre = cherchecarrer();

// }

// load_2d_arr_from_file($argv[1]);


// function doubletableau(){
//  $tableau = load_2d_arr_from_file("./fichier.txt");
//  foreach ($tableau as $key) {
//      for ($i=0; $i < count($key) ; $i++) { 
//          if ($key[$i] == ".") {
//              $key[$i] = 1;
//          } else {
//              $key[$i] = 0;
//          }
//      }
//      $tableau[] = $key;
//  }
//  print_r($tableau);
// }

// doubletableau();
