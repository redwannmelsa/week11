<?php
require_once 'classes/UserList.php';
require_once 'classes/User.php';
require_once 'classes/Livre.php';
session_start();
require_once('header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete_borrow"])) {
    $BookList = $_SESSION['bookList'];
    foreach($BookList as $bookId => $book) {
      if ($_POST["delete_borrow"] === $book->userBorrowing) {
        $book->return();
      }
    }
}


?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Liste des emprunts</h2>

    <?php
    if (isset($_SESSION['UserList']) && is_array($_SESSION['UserList'])) {
        echo '<table class="table table-bordered">';
        echo '<thead><tr><th>Adhérent</th><th>Livre emprunté</th><th>Date d\'emprunt</th><th>Date de retour prévue</th><th>Actions</th></tr></thead>';
        echo '<tbody>';

        $UserList = $_SESSION['UserList'];
        $BookList = $_SESSION['bookList'];

        foreach ($UserList as $user) {
            $userId = $user->getUserId();
            foreach ($BookList as $bookId => $book) {
              if ($book->userBorrowing === $userId) {
                echo '<tr>';
                echo '<td>' . $user->getUserName() . '</td>';

                echo '<td>';
                echo $book->title . "<br>";  
                echo '</td>';

                echo '<td>' . $book->dateBorrowed . '</td>';
                echo '<td>' . date("d/m/Y", strtotime($book->dateBorrowed . " +7 days")) . '</td>';
                echo '<td>
                  <form method="post">
                      <input type="hidden" name="delete_borrow" value="' . $userId . '">
                      <button type="submit" class="btn btn-danger" name="delete_user">Delete</button>
                  </form>
                </td>';
                echo '</tr>';
               
              }
            }
        }

        echo '</tbody>';
        echo '</table>';
    }
    ?>

</div>

<?php require_once('footer.php'); ?>
