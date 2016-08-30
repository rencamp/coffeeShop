<?php
abstract class MenuAbstract
{
  public $id;
  public $name;
  public $price;
  public $menu_list = array();
  public $type;
  public $temp = array();

  public function add($category = null)
  {
    $temp['id'] = $this->id;
    $temp['name'] = $this->name;
    $temp['price'] = $this->price;

    $this->menu_list[$this->type][$category][] = $temp;
  }

  public function displayAll()
  {
    return $this->menu_list;
  }

  public function getDetail($id)
  {
    $item = Helper::arraySearch($this->menu_list,'id', $id);
    return $item;
  }
}
