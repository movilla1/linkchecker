<?php
namespace App;
class BackLinkChecker {
  static function check_back_link($web,$link) {
    $page=BackLinkChecker::getPage($web);
    $present = preg_match("|<a.*?href=.".$link.".*?>|",$page);
    return ($present==1);
  }  

  static function getPage($web) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $web);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
    $page = curl_exec($ch);
    curl_close($ch);
    return $page;
  }
}