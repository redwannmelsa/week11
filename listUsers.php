<?php
require_once 'classes/UserList.php';
require_once 'classes/User.php';
session_start();
require_once('header.php');

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["delete_userId"])) {
    $userIdToDelete = $_POST["delete_userId"];
    UserList::deleteuser($userIdToDelete);
} else if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["userId"])) {
  UserList::edituser(new User(
    $_POST["name"],
    $_POST["lastname"],
    $_POST["dateJoined"],
    $_POST["userId"]
  ));
}
?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Liste des Adhérents</h2>

    <?php
    if (isset($_SESSION['UserList']) && is_array($_SESSION['UserList'])) {
        echo '<table class="table table-bordered">';
        echo '<thead><tr><th>name</th><th>surname</th><th>userId</th><th>dateJoined</th><th>Actions</th></tr></thead>';
        echo '<tbody>';

        foreach ($_SESSION['UserList'] as $userId => $user) {
            echo '<tr>';
            echo '<td>' . $user->getUserName() . '</td>';
            echo '<td>' . $user->getUserLastName() . '</td>';
            echo '<td>' . $user->getUserId() . '</td>';
            echo '<td>' . $user->getUserDateJoined() . '</td>';
            echo '<td>
              <form method="post">
                  <input type="hidden" name="delete_userId" value="' . $userId . '">
                  <button type="submit" class="btn btn-danger" name="delete_user">Delete</button>
              </form>
              <form method="post" action="modifyUser.php">
                  <input type="hidden" name="modify_userId" value="' . $userId . '">
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