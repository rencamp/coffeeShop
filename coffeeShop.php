<?php
/**
 * coffeeShop
 * Description: Page that controls the setting of menu list, takes orders from user, and displays receipt
 *
 * @author     Renee Campanilla
 */
 include "classes/menu.php";
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
  $order = is_numeric($order) ? $order : null;
  echo "Quantity: ";
  $quantity = trim( fgets( STDIN ) );//how many for that menu item
  $quantity = is_numeric($quantity) ? $quantity : null;

  if ( empty($order) || empty($quantity) ) {
    exit;
  } else {
    echo "Order more? [Yes/No]";//makes the user decide to checkout or continue ordering
    $more = trim( fgets( STDIN ));
  }

  $order_details = Helper::arraySearch($menu,'id', $order);
  $order_details['quantity'] = $quantity;
  $status = (strtolower($more) == "yes" || strtolower($more) == "y") ? 0 : 1;//updates status
  $ordered[] = $order_details;
}

$receipt = $render->receipt($ordered);
echo $receipt;
