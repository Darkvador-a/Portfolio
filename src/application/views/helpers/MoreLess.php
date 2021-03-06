<?php

class Ip_View_Helper_MoreLess extends Zend_View_Helper_Abstract
{
    public function moreLess($string, $length = 50){
        $html = $string;
        
        if(strlen($string) > ($length + 10)){
          $pieces = explode(' ', $string);
          $strDisplay = null;
          $strHide = null;
          $stop = false;
          
          foreach ($pieces as $piece) {
              if(strlen ($strDisplay . ' ' . $piece) < $length && $stop == FALSE) {
                  $strDisplay .= ' ' . $piece;
              } else {
                  $stop = true;
                  $strHide .= ' ' . $piece;
              }
          }
          
          $html = $strDisplay
               . '<span style="display:none">'
               . $strHide
               . '</span> <span class="label label-primary">MORE</span>';
        }
        
        return $html;
    }
}