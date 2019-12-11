<?php

class Product extends ActiveRecord\Model {

   static $validates_uniqueness_of = array(
      array('code')
   );

}
