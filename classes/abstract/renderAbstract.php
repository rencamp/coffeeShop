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
      foreach ($value as $sub_items => $sub_value) {
        $massive_string .= Helper::tabs(1);
        if ( is_numeric($sub_items) ) {
          $massive_string .= $this->formatDetails($sub_value);
        } elseif ( is_string($sub_items) ) {
          $massive_string .= ucwords($sub_items) . "\n";
          foreach ( $sub_value as $key => $details ) {
            if ( is_numeric($key) ) {
              $massive_string .= Helper::tabs(2);
              $massive_string .= $this->formatDetails($details);
              $massive_string .= "\n";
            } elseif ( is_string($key) ) {
              $massive_string .= Helper::tabs(2);
              $massive_string .= ucwords($key) . "\n";
              for ( $x = 0; $x < count($details); $x++ ) {
                $massive_string .= Helper::tabs(3);
                $massive_string .= $this->formatDetails($details[$x]);
                $massive_string .= "\n";
              }
            }
          }
        }
        $massive_string .= "\n";
      }
    }
    return $massive_string;
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
