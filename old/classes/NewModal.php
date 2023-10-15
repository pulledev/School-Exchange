<?php


namespace classes;

use classes\SchoolExchangeServices;

class NewModal
{
    public static function printQuestionModal()
    {
        ?>
        <div class="modal fade" id="newQuestionModal" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Neue Frage</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post">

                            <div class="mb-3">
                                <label for="subject" class="form-label">Titel</label>
                                <input name="subject" type="text" class="form-control" id="inputSubject"
                                       aria-describedby="emailHelp">
                                <div id="subject" class="form-text">Der Titel sollte das wichtigste zusammenfassen
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="inputContent" class="form-label">Inhalt</label>
                                <textarea name="content" class="form-control" id="inputContent" rows="3"
                                          aria-describedby="contentHelp"></textarea>
                                <div id="contentHelp" class="form-text">Im Inhalt sollte alles möglichst genau
                                    beschrieben werden
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="selectTheme" class="form-label">Thema</label>
                                <select name="theme" class="form-select" aria-label="Default select example">
                                    <option value="Mathe">Mathe</option>
                                    <option value="Technik">Technik</option>
                                    <option value="Informatik">Informatik</option>
                                    <option value="Naturwissenschaft">Naturwissenschaft</option>
                                </select>
                                <div id="contentHelp" class="form-text">Das Thema sollte dem deiner Frage entsprechen
                                </div>
                            </div>

                            <div class="mb-3 form-check">
                                <input name="anon" type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Frage Anonym stellen</label>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="createQuestion" class="btn btn-primary">Abschicken</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <?php

    }

    public static function printAnswerModal()
    {
        ?>
        <div class="modal fade" id="newAnswerModal" tabindex="-1" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div></div>
                        <div class="row"><h4 class="modal-title" id="question"></h4></div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <input name="questionId" type="hidden" id="questionId">

                            <div class="mb-3">
                                <label for="inputContent" class="form-label">Inhalt</label>
                                <textarea name="content" class="form-control" id="inputContent" rows="3"
                                          aria-describedby="contentHelp"></textarea>
                                <div id="contentHelp" class="form-text">Im Inhalt sollte alles möglichst genau
                                    beschrieben werden
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" name="createAnswer" class="btn btn-primary">Abschicken</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <?php


    }

    public static function newUserModal()
    {
        ?>
        <div class="modal fade" id="newUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteUserModalLabel">Neuen Benutzer anlegen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="password" class="form-label">Username</label>
                                <input type="text" class="form-control" id="password" aria-describedby="textUser">
                                <div id="textUser" class="form-text">Wähle hier den Username für den neuen Benutzer
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" aria-describedby="textEmail">
                                <div id="textEmail" class="form-text">Trage hier die Email adresse ein</div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Passwort</label>
                                <input type="password" class="form-control" id="password" aria-describedby="textPass">
                                <div id="textPass" class="form-text">Wähle hier ein sicheres Passwort</div>
                            </div>
                            <div class="mb-3">
                                <label for="disabledSelect" class="form-label">Rang</label>
                                <select id="disabledSelect" class="form-select">
                                    <option>0 - Benutzer</option>
                                    <option>1 - Lehrer</option>
                                    <option>2 - Moderator</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Anlegen</button>
                    </div>
                </div>

            </div>
        </div>
        <?php
    }/*#deleteUserModal*/
    public static function deleteUserModal()
    {
        ?>
        <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newUserModalLabel">Benutzer löschen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form method="post">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="disabledSelect" class="form-label">Benutzer:</label>
                                <select id="userSelect" class="form-select">
                                    <?php
                                    $mariadb = SchoolExchangeServices::getInstance()->getMariadb();
                                    $user = SchoolExchangeServices::getInstance()->getSessionManager()->getLoggedInUser()->getID();

                                    $questions = $mariadb->listUser();
                                    if (empty($questions)) {
                                        echo "<option>Es gibt zurzeit keine User außer dich! Du bist allein :(</option>";
                                    } else {
                                        foreach ($questions as $question) {
                                            if ($question->getID() != $mariadb->findUser($user)->getID()) {
                                                ?>
                                                <option><?php echo $question->getUsername(); ?> </option> <?php
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                                <div id="textPass" class="form-text">Bedenke diesen Schritt gut...</div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="delete" class="btn btn-danger">Löschen</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <?php
    }
}