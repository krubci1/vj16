<?php
# Stop Hacking attempt
define('__APP__', TRUE);

# Start session
session_start();

# Uključujemo skriptu za odjavu
include('logout.php');

# Prikazujemo korisničko ime ako je prijavljen
if(isset($_SESSION['username'])) {
    echo 'Dobrodošli, ' . htmlspecialchars($_SESSION['username']) . '! <a href="logout.php">Odjava</a>';
} else {
    # Prikazujemo formu za prijavu ako korisnik nije prijavljen
    include('login-form.php');
}

# Variables MUST BE INTEGERS
if(isset($_GET['menu'])) { $menu   = (int)$_GET['menu']; }
if(isset($_GET['action'])) { $action   = (int)$_GET['action']; }

# Variables MUST BE STRINGS A-Z
if(!isset($_POST['_action_']))  { $_POST['_action_'] = FALSE;  }

if (!isset($menu)) { $menu = 1; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- End CSS -->

    <!-- meta elements -->
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="description" content="some description">
    <meta name="keywords" content="keyword 1, keyword 2, keyword 3, keyword 4, ...">

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Hello Example">
    <meta itemprop="description" content="Some description">
    <meta itemprop="image" content="Your URL">

    <!-- Open Graph data -->
    <meta property="og:title" content="Hello Example">
    <meta property="og:type" content="article">
    <meta property="og:url" content="Your URL">
    <meta property="og:image" content="Your URL">
    <meta property="og:description" content="Some description">
    <meta property="article:tag" content="keyword 1, keyword 2, keyword 3, keyword 4, ...">

    <!-- Twitter Card data -->
    <meta name="twitter:title" content="Hello Example">
    <meta name="twitter:description" content="Some description">

    <meta name="author" content="Karlo Rubčić">

    <!-- favicon meta -->
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    <!-- end favicon meta -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <!-- End Google Fonts -->

    <style>
        body {
            font-family: 'Oswald', sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1em 0;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline-block;
            margin-right: 20px;
        }

        nav a {
            text-decoration: none;
            color: white;
        }

        main {
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #333;
            color: white;
            cursor: pointer;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1em 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        footer a {
            color: white;
        }

        footer img {
            vertical-align: middle;
        }
    </style>

    <title>Example page - HTML5</title>
</head>
<body>
    <header>
        <div class="hero-subimage"></div>
        <nav>
            <ul>
                <li><a href="index.php?menu=1">Home</a></li>
                <li><a href="index.php?menu=2">News</a></li>
                <li><a href="index.php?menu=3">Contact</a></li>
                <li><a href="index.php?menu=4">About</a></li>
                <li><a href="index.php?menu=5">Register</a></li>
                <li><a href="index.php?menu=6">Sign In</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Registration Form</h1>
        <div id="register">
            <form action="" id="registration_form" name="registration_form" method="POST">
                <input type="hidden" id="_action_" name="_action_" value="TRUE">

                <label for="fname">First Name *</label>
                <input type="text" id="fname" name="firstname" placeholder="Your name.." required>

                <label for="lname">Last Name *</label>
                <input type="text" id="lname" name="lastname" placeholder="Your last natme.." required>

                <label for="email">Your E-mail *</label>
                <input type="email" id="email" name="email" placeholder="Your e-mail.." required>

                <label for="username">Username:* <small>(Username must have min 5 and max 10 char)</small></label>
                <input type="text" id="username" name="username" pattern=".{5,10}" placeholder="Username.." required><br>

                <label for="password">Password:* <small>(Password must have min 4 char)</small></label>
                <input type="password" id="password" name="password" placeholder="Password.." pattern=".{4,}" required>

                <label for="country">Country:</label>
                <select name="country" id="country">
                    <option value="">molimo odaberite</option>
                    <!-- ... (Popunite opcije država prema vašem potrebama) ... -->
                </select>

                <input type="submit" value="Submit">
            </form>
        </div>
    </main>
    <footer>
        <p>Copyright &copy; 2024 Karlo Rubčić. <a href="https://github.com/asimec1?tab=repositories"><img src="img/GitHub-Mark-Light-32px.png" title="Github" alt="Github"></a></p>
    </footer>
</body>
</html>
