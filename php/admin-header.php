<?php require_once("config-url.php"); ?>

<div id="navbar" style="z-index: 3;">
    <a href="<?php echo BASE_URL ?>index.php">
        <img fluid src="images/ball.png" style="width: 90%; height:auto" alt="Ball">
    </a>
    <a href="index.php">
        Admin Page
    </a>
    <a href="<?php echo BASE_URL ?>admin-players.php">Players</a>
    <a href="<?php echo BASE_URL ?>admin-parents.php">Parents</a>
    <a href="<?php echo BASE_URL ?>admin-coaches.php">Coaches</a>
    <a href="<?php echo BASE_URL ?>admin-officials.php">Officials</a>
    <a href="<?php echo BASE_URL ?>admin-info.php">Info</a>
    <a href="#footer">Contact Us</a>
    <a href="https://simcoesoccer.powerupsports.com/index.php?page=LOGIN" class="split"><img
            src="images/PowerUp_logo.png" alt="POWERUP" style="width:50%; padding-top:2%"></a>
            <a style="float: right;" href="<?php echo BASE_URL ?>admin-functions/admin-logout.php">Log Out</a>
</div>