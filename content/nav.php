
<nav id="mainnav" class="navbar navbar-expand-lg bg-dark">
<div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mx-auto mb-2 mb-lg-0" >
        <li class="nav-item" >
        <a class="nav-link active"  aria-current="page" style="color: white;" href="index.php?p=home">Homepage</a>
        </li>
        <?php 
        session_start();
        if(empty($_SESSION['username'])){ //IF USER ISNT LOGGED IN, NO SESSION IS STARTED
            ?>
            <li class="nav-item">
                <a class="nav-link" style="color: white;" href="index.php?p=login">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style="color: white;" href="index.php?p=signup">Sign Up</a>
            </li>
            
            <?php
        } else { // IF USER IS LOGGED IN, AND IF IT'S A NORMAL USER ?>
        
        <li class="nav-item">
        <a class="nav-link" style="color: white;" href="index.php?p=myaccount">My Account</a>
        </li>
        
        <li class="nav-item">
        <a class="nav-link" style="color: white;" href="index.php?p=livestream">Live Camera</a>
        </li>

        <?php 
        if($_SESSION['tipoUtilizador'] == 1){ //ONLY IF ITS A ADMIN USER?>
            <li class="nav-item">
            <a class="nav-link" style="color: white;" href="index.php?p=administration">Administration</a>
            </li>
            <?php 
        } ?>

        <li class="nav-item">
        <a class="nav-link" style="color: white;" href="index.php?p=logout">Logout</a>
        </li>
        <?php } ?>
        <li class="nav-item" >
        <a class="nav-link active"  aria-current="page" style="color: white;" href="index.php?p=contact">Support</a>
        </li>
    </ul>
    </div>
</div>
</nav>
<main>

<body>

