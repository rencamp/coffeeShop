<?php
/**
 * coffeeShop
 * Description: Page that controls the setting of menu list, takes orders from user, and displays receipt
 *
 * @author     Renee Campanilla
 */
include "classes\menu.php";
include "classes\menuSet.php";
include "classes\display.php";
include "classes\orders.php";
include "inc\menu_list.php";

$ordered = array();//list of orders
$status = 0;//determines if the user wants to order more
$orders = new Orders();//initialize orders object

//initialize MenuSet
$menu = new MenuSet();

//insert menu_list to the MenuSet
foreach ($menu_array as $item) {
  $menu->addMenuItem($item);
}

//Display readable Menu
Display::displayMenu($menu->getMenu());

//This loops asks the user what to order
while ($status == 0) {
  echo "\nPlease enter the item number of your order: ";
  $order = trim( fgets( STDIN ) );//user input; what menu item
  echo "Quantity: ";
  $quantity = trim( fgets( STDIN ) );//how many for that menu item
  $orders->setOrders($order,$quantity);//list orders of user

  echo "Order more? [Yes/No]";//makes the user decide to checkout or continue ordering
  $more = trim( fgets( STDIN ));
  $status = (strtolower($more) == "yes" || strtolower($more) == "y") ? 0 : 1;//updates status
}

//get all orders ready for checkout
$all_orders = $orders->getOrders();

//Display receipt and total amount due
Display::receipt($all_orders, $menu);
