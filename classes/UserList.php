<?php

require_once "User.php";

class UserList {
    public static function addUser($user) {
    if (!isset($_SESSION['UserList'])) {
      $_SESSION['UserList'] = [];
    }
    $_SESSION['UserList'][$user->getUserId()] = $user;
  }

  public static function deleteUser($userId) {
    if (isset($_SESSION['UserList'])) {
      unset($_SESSION['UserList'][$userId]);
    }
  }

  public static function getUserById($userId) {
    return $_SESSION['UserList'][$userId];
  }

  public static function editUser($user) {
    self::deleteUser($user->userId);
    self::addUser($user);
  }
}