<?php
//$begin = microtime( true );
//file( './error.log' );
//$end = microtime( true );
//echo "cost : ".( $end - $begin ).PHP_EOL;


//$begin = microtime( true );
//$fp = fopen( './error.log' ,'r');
//while( false !== ( $char = fgetc( $fp ) ) ){
//    // ⚠️⚠️⚠️ 作为测试代码是否正确，你可以打开注释 ⚠️⚠️⚠️
//    // 但是，打开注释后屏显字符会严重拖慢程序速度！也就是说程序运行速度可能远远超出屏幕显示速度
//    echo $char.PHP_EOL;
//}
//fclose( $fp );
//$end = microtime( true );
//echo "cost : ".( $end - $begin ).PHP_EOL;


//$begin = microtime( true );
//$fp = fopen( './error.log', 'r' );
//while( false !== ( $buffer = fgets( $fp, 4096 ) ) ){
//    echo $buffer.PHP_EOL;
//}
//if( !feof( $fp ) ){
//    throw new Exception('... ...');
//}
//fclose( $fp );
//$end = microtime( true );
//echo "cost : ".( $end - $begin ).' sec'.PHP_EOL;



$begin = microtime( true );
$fp = fopen( './error.log', 'r' );
while( !feof( $fp ) ){
    // 如果你要使用echo，那么，你会很惨烈...
    $data = fread( $fp, 10240 );
    //echo $data;
}
fclose( $fp );
$end = microtime( true );
echo "cost : ".( $end - $begin ).' sec'.PHP_EOL;