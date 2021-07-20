<!doctype html>
<html>

<!doctype html>


<?php
spl_autoload_register(function ($className) {
    error_log('autoloader:'.$className);
    include '../classes/'.$className.'.php';
});

Head::printHead("Lerngruppen","forumIndex.css");
?>

<body>

<?php Navbar::printNavbar("groups"); ?>



<body>



</body>
</html>
