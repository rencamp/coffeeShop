<?php
include(__DIR__ ."/../helper.php");

abstract class RenderAbstract
{
  public $menu;

  public function process($menu = array())
  {
    $this->menu = $menu;
    $massive_string = "";
    foreach ($menu as $items => $value) {
      $massive_string .= ucwords($items) . ":\n";
      $massive_string .= $this->processSub($value);
    }

    return $massive_string;
  }

  public function processSub($submenu){
    $submenu_string = "";
    foreach ($submenu as $items => $value) {
      $submenu_string .= Helper::tabs(1);
      $submenu_string .= ucwords($items) . "\n";
      foreach ($value as $key => $single) {
        $array_keys = array_keys($single);
        if (is_numeric($key)) {
          $submenu_string .= Helper::tabs(2);
          $submenu_string .= $this->formatDetails($single);
          $submenu_string .= "\n";
        } elseif (is_string($key))  {
          $submenu_string .= Helper::tabs(2);
          $submenu_string .= ucwords($key) ."\n";
          for ( $x = 0; $x < count($single); $x++ ) {
            $submenu_string .= Helper::tabs(3);
            $submenu_string .= $this->formatDetails($single[$x]);
            $submenu_string .= "\n";
          }
        }
      }
    }
    return $submenu_string;
  }

  public function formatDetails($details)
  {
    $details_string = "";
    $id = $details['id'];

    unset($details['id']);
    ksort($details);

    $details_string .= "[" . $id . "] ";

    foreach ( $details as $key => $value ) {
      if ( $value ) {
        if ( $key == 'price' ) {
          $details_string .= "- ";
          $details_string .= "$" . $value;
        } elseif ( $key == 'quantity' ) {
          $details_string .= " x " . $value;
        } else {
          $details_string .= ucwords($value) . " ";
        }
      }
    }
    return $details_string;
  }
}
