<?php

/*
opendir()
readdir()
is_dir()
scandir()
closedir()
*/

function getListFile($dir){
    $files=array();
    if($fileHandler = opendir($dir)){
        while( ($file=readdir($fileHandler)) !== false ){
            if($file != "." && $file != ".."){
                if(is_dir($dir . "/" . $file)){
                    $files[$file] = scandir($dir . "/" . $file);
                }else{
                    $files[]=$file;
                }
            }
        }
        closedir($fileHandler);
        return $files;
    }
}

print_r( getListFile("E:\www\temp") );





?>