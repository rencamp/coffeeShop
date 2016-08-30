<?php
/**
 * Toys
 * Description: Adds menu items under toys
 *
 * @author     Renee Campanilla
 */

class Toys extends MenuAbstract
{
  public $color;

  public function __construct()
  {
    $this->type = 'toys';
  }

  public function add($category = null)
  {
    $temp['id'] = $this->id;
    $temp['name'] = $this->name;
    $temp['price'] = $this->price;
    $temp['color'] = $this->color;

    $this->menu_list[$this->type][$category][] = $temp;
  }

  public function display($category = null)
  {
    if ( $category ) {
      return $this->menu_list['toys'][$category];
    }

    return $this->menu_list['toys'];
  }
}
