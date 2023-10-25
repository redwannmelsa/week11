<?php

class Livre {
  private $title;
  private $author;
  private $isbn;
  private $pages;
  private $userBorrowing = null;
  private $dateBorrowed;

  function __construct(
    $title,
    $author,
    $isbn,
    $pages
  ) {

    $this->title = $title;
    $this->author = $author;
    $this->isbn = $isbn;
    $this->pages = $pages;
  }

  public function __get($property) {
    return $this->$property;
  }

  public function borrow($userId) {
    $this->userBorrowing = $userId;
    $this->dateBorrowed = date("d/m/Y");
  }

    public function return() {
    $this->userBorrowing = null;
    $this->dateBorrowed = null;
  }
}

?>
