<?php
require_once 'classes/User.php';
require_once 'classes/UserList.php';
session_start();

$user = UserList::getuserById($_POST['modify_userId']);
?>

<?php require_once('header.php'); ?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Modifier un adhérent</h2>

    <!-- Display the user details in a form for modification -->
    <form method="post" action="listUsers.php">

        <input type="hidden" id="userId" name="userId" value="<?php echo $user->getUserId(); ?>">
        <input type="hidden" id="dateJoined" name="dateJoined" value="<?php echo $user->getUserDateJoined(); ?>">

        <label for="name">Nom:</label>
        <input type="text" id="name" name="name" value="<?php echo $user->getUserName(); ?>">

        <label for="lastname">Auteur:</label>
        <input type="text" id="lastname" name="lastname" value="<?php echo $user->getUserLastName(); ?>">

        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>

<?php require_once('footer.php'); ?> 