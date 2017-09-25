<?php
namespace App;
class BackLinkChecker {
  static function check_back_link($web,$link) {
    $page=BackLinkChecker::getPage($web);
    $ret=false;
    $present = preg_match_all('/<a\s+.*?href=[\"\']?([^\"\' >]*)[\"\']?[^>]*>(.*?)<\/a>/i', $page, $matches, PREG_SET_ORDER);
    foreach ($matches as $match) {
      $ret |= (strcasecmp($match[1],$link)==0); //Compare in case insensitive form
    }
    return $ret;
  }  

  static function getPage($web) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $web);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch,CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-GB; rv:1.8.1.12) Gecko/20080201 Firefox/2.0.0.12');
    curl_setopt($ch,CURLOPT_HEADER,0);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_FOLLOWLOCATION,0);
    curl_setopt($ch,CURLOPT_TIMEOUT,120);
    $page = curl_exec($ch);
    curl_close($ch);
    return $page;
  }
}