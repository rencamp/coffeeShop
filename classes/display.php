<?php
/**
 * Display
 * Description: Formats, processes, and displays menu items and receipt/total in readable format.
 *
 * @author     Renee Campanilla
 */
class Display
{

  public function displayMenu($menu)
  {
    $menu = self::sortMenu($menu);

    echo "====================MENU====================\n";

    foreach ( $menu as $item => $value ) {
      echo ucwords($item) . ":\n";
      foreach ($value as $key => $details) {
        if ( !is_int($key) ) {
          echo "\t" . ucwords($key) . "\n";
          $tabs = "\t\t";
        } else {
          $tabs = "\t";
        }

        if ( is_array($details) ) {
          foreach ( $details as $sub_menu ) {
            echo $tabs . "[" . $sub_menu->getBarCode() . "] " . $sub_menu->getName() . " - $" . $sub_menu->getPrice() . "\n";
          }
        } else {
          echo $tabs . "[" . $details->getBarCode() . "] " . ucwords($details->getName() . " - ");
          echo "$" . $details->getPrice() . "\n";
        }
      }
      echo "\n";
    }
    echo "====================MENU====================\n";
  }

  //sort menu items by tag
  public function sortMenu($menu)
  {
    $menu = self::sortByProductName($menu);

    foreach ( $menu as $key ) {
      if ( isset($key->getTag()[1]) ) {
        $tags[$key->getTag()[0]][$key->getTag()[1]][] = $key;
      } else {
        $tags[$key->getTag()[0]][] = $key;
      }
    }

    ksort($tags);

    return $tags;
  }

  //sort menu items by product name
  public function sortByProductName($menu)
  {
    usort($menu,function($a, $b) {
         return strcmp($a->getName(),$b->getName());
    });

    return $menu;
  }

  //display receipt
  public function receipt($orders, $menu)
  {
    echo "\n\n====================RECEIPT====================\n";
    $total = 0;
    $result = "";

    foreach ( $orders as $order ) {
      $ordered = $menu->getByBarcode($order['barcode']);
      $result .= "[" . ucwords($ordered->getTag()[0]);
      if ( isset($ordered->getTag()[1]) ) {
        $result .= "-" . ucwords($ordered->getTag()[1]);
      }
      $result .= "] ";
      $result .= $ordered->getName() . " \t$" . $ordered->getPrice();
      $result .= " x " . $order['quantity'] . "\n";
      $total = $total + ($ordered->getPrice() * $order['quantity']);
    }
    echo $result . "\nTotal: $" . $total;
    echo "\n===============================================\n";
  }
}
