<?php $title = "Todo App | Dashboard"; ?>
<?php include_once("../includes/header.php"); ?>

<header class="header">
    <nav class="top-navbar">
        <div class="app-logo"><i class="fa fa-tachometer fa-fw link-icon"></i>&nbsp;Dashboard</div>

        <ul class="nav-list">
            <li class="nav-item">
                <a class="nav-link" href=""><i class="fas fa-power-off fa-fw link-icon"></i>&nbsp;Logout</a>
            </li>
        </ul>
    </nav>
</header>

<main class="content-wrapper">
    <section class="sidebar">
        <p class="sidebar-heading">Welcome! User</p>
        <ul class="side-nav">
            <li class="nav-item"><a class="nav-link" href=""><i class="fas fa-list-ul fa-fw link-icon"></i>&nbsp;My Todos</a></li>
            <li class="nav-item"><a class="nav-link" href=""><i class="fas fa-cog fa-fw link-icon"></i>&nbsp;Settings</a></li>
            <li class="nav-item"><a class="nav-link" href=""><i class="fas fa-user fa-fw link-icon"></i>&nbsp;Profile</a></li>
        </ul>
    </section>
    <section class="content">
        

    </section>
</main>


<?php include_once("../includes/footer.php");?>