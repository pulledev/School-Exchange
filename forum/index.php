<!doctype html>
<html>
<?php
spl_autoload_register(function ($className) {
    error_log('autoloader:' . $className);
    include '../classes/' . $className . '.php';
});

Head::printHead("Forum", "forumIndex.css");


?>


<body>

<?php Navbar::printNavbar("forum"); ?>


<div class="container">
    <h1 class="text-center">Forum</h1>

    <div class="block">
        <div class="d-grid gap-2">
            <a class="btn btn-primary"  id="longQuestion" href="">Neue Frage</a>
        </div>
    </div>

</div>

<?php
$datenbank = new Mariadb();


$questions = $datenbank->fetchForumQuestions();


if (empty($questions)) {
    echo "<h4 class='text-center'>Es gibt zurzeit keine Fragen</h4>";
} else {
    $cnt = 0;
    foreach ($questions as $question) {
        ?>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $cnt;?>" aria-expanded="false" aria-controls="collapse<?php echo $cnt;?>">
                        <?php echo $question->getSubject() ?>
                    </button>
                </h2>
                <div id="collapse<?php echo $cnt;?>" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col">
                                Thema: <?php echo $question->getCategory();?><br>

                            </div>
                            <div class="col-10"><b><?php echo $question->getQuestion()?></b></div>
                        </div>
                         <br>
                    </div>
                </div>
        </div>
        <?php
        $cnt++;
    }
}


?>


</body>
</html>
