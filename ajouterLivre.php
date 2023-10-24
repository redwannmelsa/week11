<?php
session_start();

require_once 'classes/Livre.php';
require_once 'classes/Bibliotheque.php';

require_once('header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book = new Livre(
      $_POST["titre"],
      $_POST["auteur"],
      $isbn = $_POST["isbn"],
      $nombrePages = $_POST["nombrePages"]
    );
    
    Bibliotheque::addBook($book);
}
?>


<div class="container mt-5">
    <h2 class="text-center mb-4">Ajouter un nouveau livre</h2>

    <form action="ajouterLivre.php" method="post">
        <div class="form-group">
            <label for="titre">Titre:</label>
            <input type="text" class="form-control" id="titre" name="titre" required>
        </div>
        <div class="form-group">
            <label for="auteur">Auteur:</label>
            <input type="text" class="form-control" id="auteur" name="auteur" required>
        </div>
        <div class="form-group">
            <label for="isbn">ISBN:</label>
            <input type="text" class="form-control" id="isbn" name="isbn" required>
        </div>
        <div class="form-group">
            <label for="nombrePages">Nombre de pages:</label>
            <input type="number" class="form-control" id="nombrePages" name="nombrePages" required>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>

<?php require_once('footer.php'); ?>