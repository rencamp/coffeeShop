<?php
/**
 * Orders
 * Description: takes note of the orders entered by the user.
 * Data is stored in an array
 *
 * @author     Renee Campanilla
 */
class Orders
{
  private $orders = array();
  private $quantity = 0;

  public function setOrders($order, $quantity)
  {
    if ( is_numeric($order) && is_numeric($quantity) ) {
      $order_temp = array();
      $order_temp['barcode'] = $order;
      $order_temp['quantity'] = $quantity;
      $this->orders[] = $order_temp;
    }
  }

  public function getOrders()
  {
    return $this->orders;
  }
}
