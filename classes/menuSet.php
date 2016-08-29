<?php
/**
 * MenuSet
 * Description: Lists all menu items into an array
 *
 * @author     Renee Campanilla
 */
class MenuSet
{
  private $menu = array();

  public function addMenuItem($menu)
  {
    $this->menu[] = $menu;
  }

  public function getMenu()
  {
    return $this->menu;
  }

  public function getByBarcode($barcode)
  {
    foreach ( $this->menu as $menu ) {
      if ( $menu->getBarCode() == $barcode ) {
        return $menu;
      }
    }
    return 0;
  }
}
