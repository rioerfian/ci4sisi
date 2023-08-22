<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center mt-5">
            <h1 class="bg-success p-5 text-light">Welcome to the App.</h1>
            <h3 class="bg-secondary text-light p-2">Demo Account</h3>
            <p>admin account = username : admin111 | password : admin111
                <br>user account = username : user111 | password : user111
            </p>
            <a href="/login" class="btn btn-primary">Login</a>
            <a href="/register" class="btn btn-secondary">Register</a>


        </div>
    </div>
</div>


<?= $this->endSection('content'); ?>