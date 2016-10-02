<?php

class Config {

  /**
   * @params string configuration path
   * @return string configuration values
   */
  public static function get($path = null) {
    if ($path) {
      $config = $GLOBALS['config'];
      $path = explode('/', $path);

      foreach ($path as $value) {
        if(isset($config[$value])){
          $config = $config[$value];
        }
      }
      return $config;

    }
  }
}
