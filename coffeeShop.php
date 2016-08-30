<?php
/**
 * coffeeShop
 * Description: Page that controls the setting of menu list, takes orders from user, and displays receipt
 *
 * @author     Renee Campanilla
 */
 include "classes/desserts.php";
 include "classes/drinks.php";
 include "classes/toys.php";
 include "classes/render.php";
 include "inc/menu_list.php";

$render = new Render();
$menu = isset($menu) ? $menu : exit();
$menu_list = $render->displayMenu($menu);

echo $menu_list;

$ordered = array();
$status = 0;

//This loops asks the user what to order
while ($status == 0) {
  echo "\nPlease enter the item number of your order: ";
  $order = trim( fgets( STDIN ) );//user input; what menu item
  $order_details = Helper::arraySearch($menu,'id', $order);
  echo "Quantity: ";
  $quantity = trim( fgets( STDIN ) );//how many for that menu item
  $order_details['quantity'] = $quantity;
  echo "Order more? [Yes/No]";//makes the user decide to checkout or continue ordering
  $more = trim( fgets( STDIN ));
  $status = (strtolower($more) == "yes" || strtolower($more) == "y") ? 0 : 1;//updates status
  $ordered[] = $order_details;
}

$receipt = $render->receipt($ordered);
echo $receipt;
