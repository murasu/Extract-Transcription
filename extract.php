<?php

// Save the json data into a text file and set the filename here
$file_name = "transcribed.json";

$myfile = fopen($file_name, "r") or die("Unable to open file!");
$json_data = fread($myfile,filesize($file_name));
fclose($myfile);

$data_array = json_decode($json_data);
printData($data_array);


// This function will just print the transcripted text
function printData($data, $indent = 0) {
    if (is_object($data) || is_array($data)) {
        foreach ($data as $key => $value) {
            if (is_object($value) || is_array($value)) {
                //echo PHP_EOL;
                printData($value, $indent + 4);
            } else {
                if ($key == "transcript") {
                    echo $value . PHP_EOL;
                }
            }
        }
    }
}

?>