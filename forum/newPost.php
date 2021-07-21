<!doctype html>
<html>
<?php
spl_autoload_register(function ($className) {
    error_log('autoloader:' . $className);
    include '../classes/' . $className . '.php';
});

Head::printHead("Neue Frage", "forumIndex.css");


?>


<body>

<?php Navbar::printNavbar("forum"); ?>

</body>
</html>