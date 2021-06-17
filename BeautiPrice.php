<?php
//created  17/06/64
// ทำการปัดราคาให้ใกล้เคียงกับค่าใดค่าหนึ่ง [9] <--> [5] <--> [0]
// >5 จะปัดขึ้น 
// 4 จะปัดขึ้นเป็น 5
// <4 จะปัดลงป็น 0
// โดยเลข 9 เราเรียกว่า luckyNumber สามารถเปลี่ยนค่าได้ตามชอบ (แนะนำ 9,8,7)
if (! function_exists('beautiPrice')){
    function beautiPrice($price,$luckyNumber = null,$cutOff = null){
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

// ปัดเลขอย่างย่อ 
//เน้นปัดเลขขึ้นให้เป็นจำนวนเต็ม (เพิ่มกำไร)
//จำนวนหลักที่ปัดขึ้น คือกึ่งหนึ่งของหลักทั้งหมด (หลักด้านหลัง)
// หากเลขมี 4หลัก จะปัด 2หลัก || 5หลัก จะปัด 3หลัก
if (! function_exists('beautiPrice2')){
    function beautiPrice2($price){
        //$cutOff=null : auto
        $price = floatval(str_replace(',', '', $price));
        // แต่งตัวเลขให้สวย
        $n = (strlen($price)/2)-1 ;
        if ($n <= 0){$n=1;} // ป้องกันไม่ให้ $n ต่ำกว่า 1
        $l = _addBehind(1,0,$n); 
        $price = ceil($price/$l) * $l;
		return number_format($price, 0, '.', ',');
    }
}

if (! function_exists('xPrice',$char='X')){
    function xPrice($price,$cutOff=null){
        if(!isset($cutOff) || empty($cutOff) || $cutOff < 1){ $cutOff = 2;}
        $newNumber='';
        $j= 0;

        for($i=strlen($price)-1;$i>=0;$i--){
            if(is_numeric(substr($price,$i,1))){
                if($i >=$cutOff){
                    $newNumber = $char . $newNumber;
                }else{
                    $newNumber = substr($price,$i,1) . $newNumber;
                }  
            }
            if(($j+1) % 3 == 0){
                $newNumber = ',' . $newNumber;
            }
            $j++;
        }
        return $newNumber;
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