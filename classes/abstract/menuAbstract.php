<?php

abstract class MenuAbstract
{
  private $color;
  private $id;
  private $name;
  private $price;
  private $menu_list = array();
  private $type;
  private $temp = array();

  public function add($category = null)
  {
    $temp['id'] = $this->id;
    $temp['name'] = $this->name;
    $temp['price'] = $this->price;
    $temp['color'] = $this->color;

    $this->menu_list[$this->type][$category][] = $temp;
  }

  public function addOns($category = null)
  {
    $temp['id'] = $this->id;
    $temp['name'] = $this->name;
    $temp['price'] = $this->price;

    if ( $category ) {
      $this->menu_list[$this->type][$category]['add_ons'][] = $temp;
    } else {
      $this->menu_list[$this->type]['add_ons'][] = $temp;
    }
  }

  public function getMenu($category = null, $type = null)
  {
    if ( $category && $type ) {
      return $this->menu_list[$type][$category];
    }

    return $this->menu_list;
  }

  public function getDetail($id)
  {
    $item = Helper::arraySearch($this->menu_list,'id', $id);
    return $item;
  }

  public function setColor($color = null)
  {
    $this->color = $color;
  }

  public function setId($id = null)
  {
    $this->id = $id;
  }

  public function setName($name = null)
  {
    $this->name = $name;
  }

  public function setPrice($price = null)
  {
    $this->price = $price;
  }

  public function setType($type = null)
  {
    $this->type = $type;
  }
}
