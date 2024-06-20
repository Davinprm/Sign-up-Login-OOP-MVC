<h1 class="header">Reset Password</h1>

<?php flash('reset') ?>

<form method="post" action="./controllers/ResetPasswords.php">
    <input type="hidden" name="type" value="send" />
    <input type="text" name="email" 
    placeholder="Email">
    <button type="submit" name="submit">Receive Email</button>
</form>