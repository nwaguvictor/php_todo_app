<?php $title = "Todo App | Dashboard"; ?>
<?php include_once("../includes/header.php"); ?>

<header class="header">
    <nav class="top-navbar">
        <div class="app-logo"><i class="fa fa-tachometer fa-fw link-icon"></i>&nbsp;Dashboard</div>

        <form action="logout.php" method="post" id="logout">
            <button type='submit' name="submit" class="logout-btn"><i class="fas fa-power-off fa-fw link-icon"></i>&nbsp;Logout</button>
        </form>
    </nav>
</header>

<main class="content-wrapper">
    <section class="sidebar">
        <p class="sidebar-heading">Welcome! <?= isset($_SESSION['user']) ? $_SESSION['user']['firstname'] : "User" ?></p>
        <ul class="side-nav">
            <li class="nav-item"><a class="nav-link" href="index.php"><i class="fa fa-tachometer fa-fw link-icon"></i>&nbsp;Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?pages=todos"><i class="fas fa-list-ul fa-fw link-icon"></i>&nbsp;My Todos</a></li>
            <li class="nav-item"><a class="nav-link" href=""><i class="fas fa-cog fa-fw link-icon"></i>&nbsp;Settings</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?pages=profile"><i class="fas fa-user fa-fw link-icon"></i>&nbsp;Profile</a></li>
        </ul>
    </section>
    <section class="content">
        <?php
        if (isset($_GET['pages'])) {
            $pages = $_GET['pages'];
            switch ($pages) {
                case 'todos':
                    include_once("todos.php");
                    break;

                case 'add_todo':
                    include_once("add_todo.php");
                    break;

                case 'profile':
                    include_once("profile.php");
                    break;

                default:
                    include_once("index.php");
                    break;
            }
        } else {
            include_once("index.php");
        }


        ?>

    </section>
</main>


<?php include_once("../includes/footer.php"); ?>