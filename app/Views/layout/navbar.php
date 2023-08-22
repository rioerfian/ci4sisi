<?= $this->section('navbar'); ?>
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg bg-secondary p-3 mb-3">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse flex-row-reverse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link bg-warning text-light" href="register">register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-danger text-light" href="login">log in</a>
                </li>

            </ul>
        </div>
    </nav>
</div>
<?= $this->endSection('navbar'); ?>