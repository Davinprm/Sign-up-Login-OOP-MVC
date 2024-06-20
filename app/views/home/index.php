<h2 id="index-text">Welcome,
    <?php if (isset($_SESSION['userid'])) {
        echo explode(" ", $_SESSION['username'])[0];
    } else {
        echo 'Guest';
    }
    ?>
</h2>