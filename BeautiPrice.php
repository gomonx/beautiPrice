<?php
//created  17/06/64

if (! function_exists('beautiPrice')){
    function beautiPrice($price){
        //$cutOff=null : auto
        $price = floatval(str_replace(',', '', $price));
        // แต่งตัวเลขให้สวย
       // $l = _len($price);
        $l = _addBehind(1,0,strlen($price)-2); 
        $price = ceil($price/$l) * $l;
		return number_format($price, 0, '.', ',');
    }
}

if (! function_exists('beautiPrice2')){
    function beautiPrice2($price,$luckyNumber = null,$cutOff = null){
        //cutOff=3 : คงค่า3หลักแรกไม่เปลี่ยนแปลง หากราคา <= 3หลัก จะเปลี่ยนตัวสุดท้าย
        //หากมีการปัดราคาลง จะขาดทุนไม่เกิน 1% >> cutOff4 = 0.1%
        //luckyNumber ราคาที่เปลี่ยนแปลง หาก > 5 จะถูกเปลี่ยนเป็น LuckyNumber แนะนำ 7,8,9
        if(!isset($luckyNumber) || empty($luckyNumber)){ $luckyNumber = 9;}
        if(!isset($cutOff) || empty($cutOff)){ $cutOff = 3;}

        $price = floatval(str_replace(',', '', $price));
        // แต่งตัวเลขให้สวย
        $len = strlen($price);
        $digi = null;
        $n = null;
        if ($len > $cutOff){
            $n = $cutOff;
        }else{
            $n = $len-1 ;
        }
        
        $digi = intval(substr($price,$n,1));
        if ($digi >5){
            $digi = _addBehind($luckyNumber,0,$len - $n-1);
        }elseif($digi <4){
            $digi = _addBehind(0,0,$len - $n -1);
        }else{
            // 4-5 จะปรับเป็น 5
            $digi = _addBehind(5,0,$len - $n -1);
        }
       
        $price = substr($price,0,$n) . $digi ;
		return number_format($price, 0, '.', ',');
    }
}

if (! function_exists('xPrice')){
    function xPrice($price,$cutOff=null){
        if(!isset($cutOff) || empty($cutOff) || $cutOff < 1){ $cutOff = 2;}
        $digi = substr($price,0,$cutOff);
        return _addBehind($digi,'x',strlen($price) - $cutOff);
    }
}

  function _addBehind($target,$char,$qty=0)
 {
     if ($qty > 0 || !empty($qty)){
        for($i=0;$i<$qty;$i++){
            $target .= $char;
         }
     }
     return $target;
 }

if (! function_exists('margin')){
    function margin(float $price,float $margin){
        return $price / (1-($margin/100));
    }
}