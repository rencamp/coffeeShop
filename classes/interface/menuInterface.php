<?php
/**
 * MenuInterface
 * Description: functions that a menu class must have
 *
 * @author     Renee Campanilla
 */

interface MenuInterface
{
  public function __construct();

  public function add();

  public function addOns();

  public function getMenu();
}
