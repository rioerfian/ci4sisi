<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            <div class="card mt-2" style="width: 25rem;">
                <div class="card-body ">
                    <h5 class="card-title text-center">Create an Account</h5>
                    <p class="card-text text-center">Enter your personal details to create account</p>
                    <?php if (isset($validation)) : ?>
                        <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                    <?php endif; ?>
                    <form action="<?php echo base_url('/register') ?>" method="post">
                        <?= csrf_field(); ?>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" id="username" required>
                            </li>
                            <li class="list-group-item">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" id="email" required>
                            </li>
                            <li class="list-group-item">
                                <label for="no_hp">No Handphone</label>
                                <input type="text" name="no_hp" class="form-control" id="no_hp" required>
                            </li>
                            <li class="list-group-item">
                                <label for="whatsapp">No Whatsapp</label>
                                <input type="text" name="whatsapp" class="form-control" id="whatsapp" required>
                            </li>
                            <li class="list-group-item">
                                <label for="pin">PIN</label>
                                <input type="text" name="pin" class="form-control" id="pin" required>
                            </li>
                            <li class="list-group-item">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name" required>

                            </li>
                            <li class="list-group-item">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" required>
                            </li>
                            <li class="list-group-item">
                                <button class="btn btn-primary w-100" type="submit">Sign In</button>
                            </li>
                        </ul>
                        <p class="text-center">Already have an account? <a href="login">Log in</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>