<?php

/**
 * CatClass
 */
class Cat{
  public $color = 'White and Yellow';

  public $number_of_legs = 4;

  public $name = 'Sudu Pus';

  static public $place = 'Anuradhapura';

  public function myCat()
  {
      $output = '';

      $output .= $this->color;
      $output .= $this->number_of_legs;
      $output .= $this->name;
      $output .= self::$place;

      return $output;
  }

}


?>
