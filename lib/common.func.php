<?php 
function alertMes($mes,$url){
	echo "<script>alert('{$mes}');</script>";
	echo "<script>window.location='{$url}';</script>";
}


function getMilliSeconds() {
    list($t1, $t2) = explode(' ', microtime());
    return (float)sprintf('%.0f',(floatval($t1)+floatval($t2))*1000);
}



function getDate01($time){
    if(isToday($time)){
        return date('H:i',$time); 
    }else{
        return date('m-d H:i',$time); 
    }
    
}

 
 function isToday($time) { 
    $a_date = date('Y-m-d',$time); 
    $b_date = date('Y-m-d',time()); 
    if($a_date==$b_date){ 
        return true; 
    }else{ 
        return false; 
    } 
}