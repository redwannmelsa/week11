<?php

require_once 'Livre.php';

class Bibliotheque {
  public static $bookList = [];

  public static function addBook($book) {
    if (!isset($_SESSION['bookList'])) {
      $_SESSION['bookList'] = [];
    }
    $_SESSION['bookList'][$book->isbn] = $book;
  }

  public static function deleteBook($isbn) {
    if (isset($_SESSION['bookList'])) {
      unset($_SESSION['bookList'][$isbn]);
    }
  }

  public static function getBookById($isbn) {
    return $_SESSION['bookList'][$isbn];
  }

  public static function editBook($book) {
    self::deleteBook($book->isbn);
    self::addBook($book);
  }
}

?>
