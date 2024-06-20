<div>
    <h2 >
        Sign Up
    </h2>
</div>

<?php flash('signup') ?>

<div style="margin: auto; max-width: 600px; width: 100%; padding: 2em;">
    <form action="login" method="post">
        <input type="hidden" name="type" value="signup">
        <div>
            <label for="userid">Full name</label>
            <input type="text" name="userid" id="userid" placeholder="Full name" required>
        </div>
</div>
<div>
    <label for="username">Username</label>
    <input type="text" name="username" id="username" placeholder="Username" required>
</div>
<div>
    <label for="email">Email</label>
    <input type="email" name="email" id="email" placeholder="Email address" required>
</div>
<div>
    <label for="password">Password</label>
    <input type="password" name="password" id="password" placeholder="Password" required>
</div>
<div>
    <label for="password2">Password confirmation</label>
    <input type="password" name="password2" id="password2" placeholder="Password confirmation" required>
</div>
<button type="submit" name="signup">Sign Up</button>
</form>
</div>

<!-- <p><a href="login.php">Login</a></p> -->