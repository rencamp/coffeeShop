<?php
/**
 * Helper
 * Description: Functions that are useful all around
 *
 * @author     Renee Campanilla
 */
class Helper
{
  public static function tabs($num = 0)
  {
    $tabs = "";

    if ( is_numeric($num) ) {
      $num = (int) $num;
      for ( $x = 0; $x < $num; $x++ ) {
        $tabs .= "\t";
      }
    }

    return $tabs;
  }

  public static function arraySearch($array, $key, $value)
  {
      $results = array();

      if (is_array($array)) {
          if (isset($array[$key]) && $array[$key] == $value) {
              $results = $array;
          }

          foreach ($array as $subarray) {
              $results = array_merge($results, self::arraySearch($subarray, $key, $value));
          }
      }

      return $results;
  }
}
