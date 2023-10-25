<?php

class User {
  private $name;
  private $lastName;
  private $dateJoined;
  public $userId;

  function __construct(
    $name,
    $lastName,
    $dateJoined,
    $userId
  ) {

    $this->name = $name;
    $this->lastName = $lastName;
    $this->dateJoined = $dateJoined;
    $this->userId = $userId ?? uniqid();
  }

  public function getUserName() {
    return $this->name;
  }

    public function getUserlastName() {
    return $this->lastName;
  }

    public function getUserDateJoined() {
    return $this->dateJoined;
  }

    public function getUserId() {
    return $this->userId;
  }

}

?>
