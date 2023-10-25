<?php


require_once 'classes/User.php';
require_once 'classes/UserList.php';
require_once 'classes/Livre.php';
require_once 'classes/Bibliotheque.php';

session_start();

require_once('header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    Bibliotheque::getBookById($_POST["book"])->borrow($_POST["user"]);
}
?>


<div class="container mt-5">
    <h2 class="text-center mb-4">Ajouter un emprunt</h2>

    <form action="borrow.php" method="post">
      <select name="user" id="user">
        <?php
        foreach ($_SESSION['UserList'] as $user) {
            echo '<option value="' . $user->getUserId() . '">' . $user->getUserName() . ' ' . $user->getUserLastName() . '</option>';
        }
        ?>
      </select>
      <select name="book" id="book">
        <?php
        foreach ($_SESSION['bookList'] as $book) {
            if ($book->userBorrowing === null) {
              echo '<option value="' . $book->isbn . '">' . $book->title . '</option>';
            }
        }
        ?>
      </select>
    <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>

<?php require_once('footer.php'); ?>