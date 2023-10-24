<?php
require_once 'classes/Bibliotheque.php';
require_once 'classes/Livre.php';
session_start();
require_once('header.php');

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["delete_isbn"])) {
    $isbnToDelete = $_POST["delete_isbn"];
    Bibliotheque::deleteBook($isbnToDelete);
    // After deleting the book, you can reload the page or update the book list as needed.
} else if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["isbn"])) {
  Bibliotheque::editBook(new Livre(
    $_POST["title"],
    $_POST["author"],
    $_POST["isbn"],
    $_POST["pages"]
  ));
}
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Liste des Livres</h2>

    <?php
    if (isset($_SESSION['bookList']) && is_array($_SESSION['bookList'])) {
        echo '<table class="table table-bordered">';
        echo '<thead><tr><th>Titre</th><th>Auteur</th><th>ISBN</th><th>Nombre de pages</th><th>Actions</th></tr></thead>';
        echo '<tbody>';

        foreach ($_SESSION['bookList'] as $isbn => $book) {
            echo '<tr>';
            echo '<td>' . $book->title . '</td>';
            echo '<td>' . $book->author . '</td>';
            echo '<td>' . $isbn . '</td>';
            echo '<td>' . $book->pages . '</td>';
            echo '<td>
              <form method="post">
                  <input type="hidden" name="delete_isbn" value="' . $isbn . '">
                  <button type="submit" class="btn btn-danger" name="delete_book">Delete</button>
              </form>
              <form method="post" action="modifierLivre.php">
                  <input type="hidden" name="modify_isbn" value="' . $isbn . '">
                  <button class="btn btn-primary">Modify</button>
              </form>
            </td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    }
    ?>

</div>

<?php require_once('footer.php'); ?>