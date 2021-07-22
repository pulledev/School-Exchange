<?php


class NewModal
{
    public static function printModal()
    {
        ?>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Neue Frage</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>

                            <div class="mb-3">
                                <label for="subject" class="form-label">Titel</label>
                                <input name="subject" type="text" class="form-control" id="inputSubject" aria-describedby="emailHelp">
                                <div id="subject" class="form-text">Der Titel sollte das wichtigste zusammenfassen
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="inputContent" class="form-label">Inhalt</label>
                                <textarea name="content" class="form-control" id="inputContent" rows="3"
                                          aria-describedby="contentHelp"></textarea>
                                <div id="contentHelp" class="form-text">Im Inhalt sollte alles möglichst genau beschrieben werden</div>
                            </div>

                            <div class="mb-3">
                                <label for="selectTheme" class="form-label">Thema</label>
                                <select name="theme" class="form-select" aria-label="Default select example">
                                    <option value="Mathe">Mathe</option>
                                    <option value="Technik">Technik</option>
                                    <option value="Informatik">Informatik</option>
                                    <option value="Naturwissenschaft">Naturwissenschaft</option>
                                </select>
                                <div id="contentHelp" class="form-text">Das Thema sollte dem deiner Frage entsprechen</div>
                            </div>

                            <div class="mb-3 form-check">
                                <input name="anon" type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Frage Anonym stellen</label>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="send" class="btn btn-primary">Abschicken</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <?php

        if (isset($_POST["send"])) {
            $database = SchoolExchangeServices::getInstance()->getMariadb();

            $database->insertNewQuestions($_POST["subject"], ,$_POST["content"], $_POST["theme"], $_POST["anon"]);
        }
    }
}