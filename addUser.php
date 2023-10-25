<?php
session_start();

require_once 'classes/User.php';
require_once 'classes/UserList.php';

require_once('header.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = new User(
      $_POST["name"],
      $_POST["surname"],
      $dateJoined = $_POST["dateJoined"],
      $userId = null
    );
    
    UserList::addUser($user);
}
?>


<div class="container mt-5">
    <h2 class="text-center mb-4">Ajouter un nouvel adhérent</h2>

    <form action="addUser.php" method="post">
        <div class="form-group">
            <label for="name">Prénom:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="surname">Nom:</label>
            <input type="text" class="form-control" id="surname" name="surname" required>
        </div>
        <div class="form-group">
            <label for="dateJoined">dateJoined:</label>
            <input type="text" class="form-control" id="dateJoined" name="dateJoined" required>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>

<?php require_once('footer.php'); ?>