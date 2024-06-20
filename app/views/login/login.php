<h1 class="header">Login</h1>

<?php flash('login') ?>

<form method="post" action="<?=ROOT?>">
<input type="hidden" name="type" value="login">
    <input type="text" name="name/email"  
    placeholder="Username/Email">
    <input type="password" name="password" 
    placeholder="Password">
    <button type="submit" name="submit">Log In</button>
</form>

<div class="form-sub-msg"><a href="reset_password">Forgotten Password?</a></div>