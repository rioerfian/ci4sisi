<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Page Heading -->
<div class="d-flex align-items-center justify-content-between p-3 bg-primary text-light">
    <h3>EDIT USER</h3>
</div>
<div class="container">
    <div class="row">
        <div class="col-12 col-- offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
            <?php if (isset($validation)) : ?>
                <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
            <?php endif; ?>
            <form action="<?php echo base_url('/user/edit/' . $ID_USER) ?>" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" id="username" value="<?= $USERNAME; ?>">
                            </li>
                            <li class="list-group-item">
                                <label for="email">Email</label>
                                <input type="text" name="email" class="form-control" id="email" value="<?= $EMAIL; ?>">
                            </li>
                            <li class="list-group-item">
                                <label for="no_hp">No Handphone</label>
                                <input type="text" name="no_hp" class="form-control" id="no_hp" value="<?= $NO_HP; ?>">
                            </li>
                            <li class="list-group-item">
                                <label for="whatsapp">No Whatsapp</label>
                                <input type="text" name="whatsapp" class="form-control" id="whatsapp" value="<?= $WA; ?>">
                            </li>
                            <li class="list-group-item">
                                <label for="pin">PIN</label>
                                <input type="text" name="pin" class="form-control" id="pin" value="<?= $PIN; ?>">
                            </li>
                            <li class="list-group-item">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="<?= $NAMA_USER; ?>">

                            </li>
                            <li class="list-group-item">
                                <label for="status_user" class="form-label">STATUS USER</label>
                                <input type="text" name="status_user" class="form-control" id="status_user" value="<?= $STATUS_USER; ?>">

                            </li>

                            <li class="list-group-item p-3">
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="/user" class="btn btn-warning text-dark">Cancel</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection('content'); ?>