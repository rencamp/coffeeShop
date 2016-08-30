<?php
/**
 * Desserts
 * Description: Adds menu items under dessert
 *
 * @author     Renee Campanilla
 */
include "abstract/menuAbstract.php";

class Desserts extends MenuAbstract
{

  public function __construct()
  {
    $this->type = 'desserts';
  }

  public function display($category = null)
  {
    if ( $category ) {
      return $this->menu_list['desserts'][$category];
    }

    return $this->menu_list['desserts'];
  }

  public function addOns($category = null)
  {
    $temp = array('id' => $this->id, 'name' => $this->name, 'price' => $this->price);

    if ( $category ) {
      $this->menu_list[$this->type][$category]['add_ons'][] = $temp;
    } else {
      $this->menu_list[$this->type]['add_ons'][] = $temp;
    }
  }
}
