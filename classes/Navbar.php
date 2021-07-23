<?php


class Navbar
{

    static function printNavbar($active)
    {
        $user = SchoolExchangeServices::getInstance()->getSessionManager()->getLoggedInUser()->getUsername();

        $learn = null;
        $forum = null;
        $adminPanel = null;
        $settings = null;
        $home = null;
        $group = null;

        if ($active == "learn") {
            $learn = "active";
            $navTitle = "Lernen";
        } elseif ($active == "forum") {
            $forum = "active";
            $navTitle = "Forum";
        } elseif ($active == "adminPanel") {
            $adminPanel = "active";
            $navTitle = "Admin Panel";
        } elseif ($active == "settings") {
            $settings = "active";
            $navTitle = "Einstellungen";
        } elseif ($active == "groups") {
            $group = "active";
            $navTitle = "Lern Gruppen";
        } elseif ($active == "home") {
            $home = "active";
            $navTitle = "Home";
        }


        ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navigation</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                <aria-controls
                ="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link <?php echo $home; ?> " href="../home.php">Home</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle <?php echo $learn; ?>" href="#" id="navbarDropdown"
                               role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Lernen
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="../Definitions/index.php">Erklärungen</a></li>
                                <li><a class="dropdown-item " href="#">Aufgaben</a></li>
                                <li><a class="dropdown-item " href="../groups/index.php">Lerngruppe</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $forum; ?>" href="../forum/index.php">Forum</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link <?php echo $adminPanel; ?>" href="../getcodep.php">Admin Panel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $settings; ?>" href="../settings.php">Einstellungen</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <li class="nav-item">
                    <a class="nav-link dropdown-toggle <?php echo $learn; ?>" href="#" id="navbarDropdown"
                       role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Lernen
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../Definitions/index.php">Erklärungen</a></li>
                        <li><a class="dropdown-item " href="#">Aufgaben</a></li>
                        <li><a class="dropdown-item " href="../groups/index.php">Lerngruppe</a></li>
                    </ul>
                </li>


            </div>
            <!-- Right elements -->
        </nav>
        <?php


    }
}