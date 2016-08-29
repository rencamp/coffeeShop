<?php
/**
 * Menu
 * Description: Formats a single menu item.
 *
 * @author     Renee Campanilla
 */
class Menu
{
  private $product_name = null;
  private $price = 0;
  private $tag = null;
  private $barcode = 0;

  public function __construct($product_name = null)
  {
    $this->product_name = $product_name;
  }

  public function setName($name)
  {
    if ( empty($name) ) {
      $this->product_name = null;
    } else {
      $this->product_name = ucwords($name);
    }
  }

  public function getName()
  {
    return $this->product_name;
  }

  public function setPrice($price)
  {
    $price = number_format($price,2);
    if ( empty($price) || ((!is_double($price)) && $price < 0) ) {
      $this->price = 0;
    } else {
      $this->price = $price;
    }
  }

  public function getPrice()
  {
    return $this->price;
  }

  public function setTag($tag)
  {
    if ( empty($tag) ) {
      $this->tag = null;
    } else {
      $this->tag = $tag;
    }
  }

  public function getTag()
  {
    return $this->tag;
  }

  public function setBarCode($barcode)
  {
    if ( empty($barcode) ) {
      $this->barcode = null;
    } else {
      $this->barcode = $barcode;
    }
  }

  public function getBarCode()
  {
    return $this->barcode;
  }
}
