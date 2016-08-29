<?php
//formats data to be used for Menu
//max of 2 tags
$menu_list = array(
  [
      'Chocolate Mud Cake',
      3,
      ['desserts','cake']
  ],
  [
      'Vanilla Mud Cake',
      3,
      ['desserts','cake']
  ],
  [
      'Boston Cheesecake',
      3,
      ['desserts','cake']
  ],
  [
      'Pancake',
      3,
      ['desserts']
  ],
  [
      'Waffle',
      3,
      ['desserts']
  ],
  [
      'Black',
      2,
      ['drinks','coffee']
  ],
  [
      'Latte',
      2.50,
      ['drinks','coffee']
  ],
  [
      'Mocha',
      2.50,
      ['drinks','coffee']
  ],
  [
      'English',
      1.50,
      ['drinks','tea']
  ],
  [
      'Vanilla',
      0,
      ['drinks','milkshake']
  ],
  [
      'Caramel',
      0,
      ['drinks','milkshake']
  ],
  [
      'Chocolate',
      0,
      ['drinks','milkshake']
  ]
);
$menu_array = array();

foreach ( $menu_list as $list ) {
  $menu = new Menu($list[0]);
  $menu->setPrice($list[1]);
  $menu->setTag($list[2]);
  $menu->setBarCode(count($menu_array)+1);

  $menu_array[] = $menu;
}
