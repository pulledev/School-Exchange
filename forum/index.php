<!doctype html>
<html>
<?php
spl_autoload_register(function ($className) {
error_log('autoloader:'.$className);
include '../classes/'.$className.'.php';
});

Head::printHead("test");



?>








<body>

<?php Navbar::printNavbar("forum"); ?>


<div class="container">
    <h1 class="mx-auto" style="width: 200px;">Forum</h1>
    <?php echo '<a href="newPost.php?want_reply=false">Neue Frage</a>'; ?>
</div>








</body>
</html>
