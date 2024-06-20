<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['pageTitle'] ?></title>
    <link rel="stylesheet" href="<?=ASSETS?>/css/style.css" type="text/css">
</head>

<body>
    <nav>
        <ul>
            <a href="<?=ROOT?>">
                <li>Home</li>
            </a>
            <?php if (!isset($_SESSION['userid'])):?>
                <a href="<?=ROOT?>sign_up">
                    <li>Sign Up</li>
                </a>
                <a href="login">
                    <li>Login</li>
                </a>
            <?php else:?>
                <a href="login">
                    <li>Logout</li>
                </a>
            <?php endif; ?>
        </ul>
    </nav>