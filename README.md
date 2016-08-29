# coffeeShop
This is a simple PHP command line project that asks the user what menu item to order and how many then calculates the total amount due.

To run in the command line use the following:
```
php coffeeShop.php
```
**note: make sure PHP is running in your system and you're running it using the correct path [<outside_path>\coffeeShop.php if you want to run it outside it's folder].

When you hit enter, it will ask you to enter the corresponding item number of each menu item. The item number can be found just beside the menu name, inside square brackets.
Then it will ask the quantity. Always input a number. Otherwise, it will not take note your order.

If it asks 'Want to order more?', just input 'y' or 'yes'. Capitalization for 'y' and 'yes' is not strict. To terminate and go to checkout, just enter 'no' or any character except 'y' and 'yes' of course.
