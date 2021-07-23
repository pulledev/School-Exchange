<?php
require "../init.php";
$id = SchoolExchangeServices::getInstance()->getSessionManager()->getLoggedInUser();
$mariadb = SchoolExchangeServices::getInstance()->getMariadb();
if (!$id) {
    header("Location: /login.php");
}

if (isset($_POST["createQuestion"])) {
    error_log("Forum Post");
    $subject = $_POST["subject"];
    $content = $_POST["content"];
    $theme = $_POST["theme"];
    $anon = $_POST["anon"];
    SchoolExchangeServices::getInstance()->getMariadb()->createQuestion(new ForumQuestion($content, $id->getID(), $theme, $subject, 0));
} elseif (isset($_POST["createAnswer"])) {
    $content = $_POST["content"];
    $qestionId = $_POST["questionId"];
    $mariadb->createAnswer(new ForumAnswer(0, $content, $id->getID(), $qestionId));
}


Head::printHead("Forum", "/forum/forumIndex.css");

?>
<!doctype html>
<html lang="de">

<body>


<?php Navbar::printNavbar("forum"); ?>

<div class="container">
    <h1 class="text-center">Forum</h1>

    <div class="block">
        <div class="d-grid gap-2">
            <button type="button" class="btn btn-primary" id="longQuestion" data-bs-toggle="modal"
                    data-bs-target="#newQuestionModal">
                Neue Frage
            </button>

        </div>
    </div>

</div>

<?php
$database = SchoolExchangeServices::getInstance()->getMariadb();

$questions = $database->listForumQuestions();

if (empty($questions)) {
    echo "<h4 class='text-center'>Es gibt zurzeit keine Fragen</h4>";
} else {
$cnt = 0;
foreach ($questions

as $question) {
?>

<div class="accordion" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">

            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse<?php echo $cnt; ?>" aria-expanded="false"
                    aria-controls="collapse<?php echo $cnt; ?>">

                <?php echo $question->getSubject() ?>
            </button>

        </h2>
        <div id="collapse<?php echo $cnt; ?>" class="accordion-collapse collapse" aria-labelledby="headingTwo"
             data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <div class="row">
                    <div class="col-10"><b><?php echo $question->getQuestion() ?></b> <br>
                        <button class="btn btn-outline-primary"
                                onclick='openAnswerModal(<?php echo $question->getID() ?>, "<?php echo $question->getQuestion(); ?>")'>
                            Antworten
                        </button>
                        <?php
                        if ($id->getID() == $question->getUserId()) {
                            ?><button type="button" class="btn btn-danger">Frage löschen</button><?php
                        }
                        ?>
                    </div>
                    <div class="col">
                        Thema: <?php echo $question->getCategory(); ?><br>
                        User: <?php $mariadb->findUser($question->getUserId())->render(); ?><br>
                        Erstellt: xx.xx.xx
                    </div>
                </div>
                <div class="row">
                    <?php
                    $questionsAnswer = $mariadb->listAnswers($question->getID());
                    if (empty($questions)) {
                        echo "<h4 class='text-center'>Für Diese Fragen gibt es gerade keine Antorten</h4>";
                    } else {
                        $count = 1;
                        foreach ($questionsAnswer as $questionAnswer) {
                            ?>
                            <div class="answereCard">
                                <div class="card" id="answereCard">
                                    <h5 class="card-header">Antwort #<?php echo $count ?></h5>
                                    <div class="card-body">
                                        <p class="card-text"><?php echo $questionAnswer->getAnswer();?></p>
                                    </div>
                                </div>

                            </div>
                            <?php
                            $count++;


                        }
                    }

                    ?>
                </div>


                <br>
            </div>
        </div>
    </div>
    <?php
    $cnt++;
    }
    }


    NewModal::printQuestionModal();
    NewModal::printAnswerModal();
    ?>
    <script src="../js/forum.js"></script>


</body>
</html>
