<?php
require_once 'classes/Livre.php';
require_once 'classes/Bibliotheque.php';
session_start();

$book = Bibliotheque::getBookById($_POST['modify_isbn']);
?>

<?php require_once('header.php'); ?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Modifier un Livre</h2>

    <!-- Display the book details in a form for modification -->
    <form method="post" action="listeLivres.php">

        <input type="hidden" id="isbn" name="isbn" value="<?php echo $book->isbn; ?>">

        <label for="title">Titre:</label>
        <input type="text" id="title" name="title" value="<?php echo $book->title; ?>">

        <label for="author">Auteur:</label>
        <input type="text" id="author" name="author" value="<?php echo $book->author; ?>">

        <label for="pages">Nombre de pages:</label>
        <input type="number" id="pages" name="pages" value="<?php echo $book->pages; ?>">

        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>

<?php require_once('footer.php'); ?> 