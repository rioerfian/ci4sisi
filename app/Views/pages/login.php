<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center py-4">
            <div class="card mt-5" style="width: 23rem;">
                <div class="card-body ">
                    <h5 class="card-title text-center">Login to Your Account</h5>
                    <hr>
                    <?php if (session()->getFlashdata('msg')) : ?>
                        <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                    <?php endif; ?>
                    <form action="<?php echo base_url('/login') ?>" method="post">
                        <p class="card-text text-center">Enter your username & password to login</p>
                        <?= csrf_field() ?>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" id="username">
                            </li>
                            <li class="list-group-item">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password">
                            </li>

                            <?php if (isset($validation)) : ?>
                                <div class="col-12">
                                    <div class="alert alert-danger" role="alert">
                                        <?= $validation->listErrors() ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <li class="list-group-item">
                                <button class="btn btn-primary w-100" type="submit">Login</button>
                            </li>
                        </ul>
                        <p class="text-center">Don't have account? <a href="/register">Create an account</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>