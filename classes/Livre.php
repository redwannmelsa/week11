<?php

class Livre {
  private $title;
  private $author;
  private $isbn;
  private $pages;

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
}

?>
