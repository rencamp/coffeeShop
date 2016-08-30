<?php
/**
 * Render
 * Description: Renders result to readable format.
 *
 * @author     Renee Campanilla
 */
include "abstract/renderAbstract.php";

class Render extends RenderAbstract
{

  public function displayMenu($menu)
  {
    $menu_string = "====================MENU====================\n";
    $menu_string .= $this->process($menu);
    $menu_string .= "====================MENU====================\n";

    return $menu_string;
  }

  public function receipt($orders)
  {
    $receipt = "";
    $total = 0;
    $receipt .= "\n\n====================RECEIPT====================\n";

    for ( $x = 0; $x < count($orders); $x++ ) {
      $receipt .= $this->formatDetails($orders[$x]) . "\n";
      $total = $total + ($orders[$x]['price'] * $orders[$x]['quantity']);
    }

    $receipt .= "TOTAL: $" . $total;
    $receipt .= "\n===============================================\n";

    return $receipt;
  }
}
