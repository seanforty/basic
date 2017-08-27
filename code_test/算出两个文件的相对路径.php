<?php
/*
写一个函数，算出两个文件的相对路径
用到的函数

dirname()
array_merge()
array_fill()
array_slice()
explode()
implode()
count()

*/

$a = "/a/b/c/d/e.php";
$b = "/a/b/n/m/z.php";
// 比如在$a文件中引用$b, 其相对路径为 ../../n/m/z.php

// 方法一
function getRelativeDirA($a,$b){
    //$dirA = dirname($a);
    $lenA = strlen($a);
    $lenB = strlen($b);
    
    for($n=0;$n<$lenA;$n++){
        if($a[$n]!=$b[$n]){
            break;
        }
    }
        
    $tempDir = substr($a, $n);          //  c/d/e.php
    $tempArr = explode("/", $tempDir);  //  ['c','d','e.php']
    $backDirNum = count($tempArr) - 1;
    //$backDir = implode("/", array_fill(0,$backDirNum,"..") );
    
    $backDir = "";
    for($i=0;$i<$backDirNum;$i++){
        $backDir .= "../";
    }
    
    return $backDir . substr($b,$n);
}

function getRelativeDirB($a,$b){
    $returnPath = array( dirname($a) );
    $arrA = explode("/", $returnPath[0]);
    $arrB = explode("/", $b);
    for($i=0,$len=count($arrA);$i<$len;$i++){
        if($arrA[$i]!=$arrB[$i])
            break;
    }

    $returnPath = array_merge( $returnPath, array_fill( 1, ($len-$i), ".." ) );
    $returnPath = array_merge( $returnPath, array_slice( $arrB, $i ) );
    return implode("/", $returnPath);
}

//echo getRelativeDirA($a,$b);
echo getRelativeDirB($a,$b);
echo "<br/>";
echo "/a/b/c/d/../../n/m/z.php";


?>