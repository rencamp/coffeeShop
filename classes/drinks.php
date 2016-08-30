<?php
/**
 * Drinks
 * Description: Adds menu items under drinks;
 *
 * @author     Renee Campanilla
 */

class Drinks extends MenuAbstract
{
  public function __construct()
  {
    $this->type = 'drinks';
  }

  public function display($category = null)
  {
    if ( $category ) {
      return $this->menu_list['drinks'][$category];
    }

    return $this->menu_list['drinks'];
  }
}
