<?php
$act = $_GET['action'];
$redis = new Redis();    
$redis->connect('127.0.0.1', 6379);
if($act=='lpush'){
  while(True){
    try{
      $value = 'value_'.date('Y-m-d H:i:s');
      $redis->LPUSH('key1',$value);
      sleep(rand()%3);
    }catch(Exception $e){
      echo $e->getMessage()."\n";
    }
  }
}elseif($act=='lpop'){
  while(True){
    try{
        $val = $redis->LPOP('key1')."\n";
        $fp = fopen('test.txt','a+');
        if( $fp === FALSE){
              echo("创建可写文件：test.txt失败");     
        exit();
        }
        if(!fwrite ($fp,$val)){ //将信息写入文件
        echo ("尝试向文件".$fp."写入".$val."失败！");
        fclose($fp);
        exit();             
      } 
      fclose ($fp); 
        
    }catch(Exception $e){
      echo $e->getMessage()."\n";
    }
  }
}