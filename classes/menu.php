<?php
/**
 * Menu
 * Description: Calls the absract class and sets type when class is called from index.php
 *
 * @author     Renee Campanilla
 */
include "abstract/menuAbstract.php";
include "interface/menuInterface.php";

class Menu extends MenuAbstract implements MenuInterface
{

  public function __construct($type = null)
  {
    $this->setType($type);
  }
}
