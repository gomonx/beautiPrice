<?php
include 'beautiPrice.php';
echo 'DEMO ';
echo '<br>';

$price = '1999999' ; //need 1.9xxxxx
echo 'ราคาจริง = '. $price . ' ราคาโฆษณา = เริ่มต้นเพียง ' . xPrice($price) . ' บาท <br>';

$price = '54' ; //need 55
echo 'oliginal Price = '. $price . ' bueatiful Price = ' . beautiPrice($price) . '<br>';

$price = '57' ; //need 59
echo 'oliginal Price = '. $price . ' bueatiful Price = ' . beautiPrice($price) . '<br>';

$price = '157' ; //need 159
echo 'oliginal Price = '. $price . ' bueatiful Price = ' . beautiPrice($price) . '<br>';

$price = '1,674' ; //need 1,670
echo 'oliginal Price = '. $price . ' bueatiful Price = ' . beautiPrice2($price) . '<br>';

$price = '16,782' ; //need 16,790
echo 'oliginal Price = '. $price . ' bueatiful Price = ' . beautiPrice2($price) . '<br>';

$price = '15,750' ; //need 15,750
echo 'oliginal Price = '. $price . ' bueatiful Price = ' . beautiPrice2($price) . '<br>';

$price = '15,721' ; //need 15,700
echo 'oliginal Price = '. $price . ' bueatiful Price = ' . beautiPrice2($price) . '<br>';

$price = '157,878' ;//need 158,000
echo 'oliginal Price = '. $price . ' bueatiful Price = ' . beautiPrice2($price) . '<br>';

$price = '157,478' ;//need 157,500
echo 'oliginal Price = '. $price . ' bueatiful Price = ' . beautiPrice2($price) . '<br>';

$price = '1,574,780' ;//need 1,575,000
echo 'oliginal Price = '. $price . ' bueatiful Price = ' . beautiPrice2($price) . '<br>';
