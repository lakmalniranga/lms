<?php

/**
 * Database Operation
 */
class DB
{
  private static $_instance = null;
  private $_pdo,
          $_query,
          $_error = false,
          $_results,
          $_resultslimit,
          $_count = 0;

  function __construct()
  {
    try {
      $this->_pdo = new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }

  public static function getInstance() {
    if (!isset(self::$_instance)) {
      self::$_instance = new self();
    }
    return self::$_instance;
  }

  public function query($sql, $params = array()) {
    $this->_error = false;

    if ($this->_query = $this->_pdo->prepare($sql)) {
      $i = 1;
      if (count($params)) {
        foreach ($params as $param) {
          $this->_query->bindValue($i, $param);
          $i++;
        }
      }

      if($this->_query->execute()) {
          $this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
          $this->_count = $this->_query->rowCount();
      }else {
        $this->_error = true;
      }
    }

    return $this;
  }

  private function action($action, $table, $where = array()) {
    if (count($where) === 3) {
      $operators = array('=', '>', '<', '>=', '<=', 'like', 'in');

      $field  = $where[0];
      $operator = $where[1];
      $value = $where[2];

      if (in_array($operator, $operators)) {
        $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";

        if (!$this->query($sql, array($value))->error()) {
          return $this;
        }
      }
    }
    return false;
  }

  public function get($table, $where) {
    return $this->action('SELECT *', $table, $where);
  }

  public function delete($table, $where) {
    return $this->action('DELETE', $table, $where);
  }

  public function insert($table, $fields = array()) {
    if (count($fields)) {
      $keys = array_keys($fields);
      $values = null;
      $i = 1;

      foreach ($fields as $field) {
        $values .= '?';
        if ($i < count($fields)) {
          $values .= ', ';
        }
        $i++;
      }

      $sql = "INSERT INTO {$table} (`" . implode('`, `', $keys) . "`) VALUES ({$values})";
      if (!$this->query($sql, $fields)->error()) {
        return true;
      }
    }
    return false;
  }

  public function update($table, $id, $fields) {
    $set = '';
    $i = 1;

    foreach ($fields as $name => $value) {
      $set .= "{$name} = ?";
      if($i < count($fields)) {
        $set .= ', ';
      }
      $i++;
    }

    $sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";
    if (!$this->query($sql, $fields)->error()) {
      return true;
    }
    return false;
  }

  public function error() {
    return $this->_error;
  }

  public function count() {
    return $this->_count;
  }

  public function results() {
    return $this->_results;
  }

  public function first() {
    return $this->_results[0];
  }

  public function limitTo($rows) {
    $_resultslimits = array();
    if ($this->_count > $rows) {
      for ($i=0; $i < $rows; $i++) {
        $_resultslimits[$i] = $this->_results[$i];
      }
    }else {
      for ($i=0; $i < $this->_count; $i++) {
        $_resultslimits[$i] = $this->_results[$i];
      }
    }
    return $_resultslimits;
  }

}
