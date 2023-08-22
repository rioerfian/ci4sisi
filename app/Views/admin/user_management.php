<?= $this->extend('pages/dashboard'); ?>

<?= $this->section('content'); ?>
<!-- Page Heading -->
<div class="d-flex align-items-center justify-content-between p-3 bg-primary text-light">
    <h3>USER MANAGEMENT</h3>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">User list</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>id user</th>
                            <th>username</th>
                            <th>name</th>
                            <th>Email</th>
                            <th>no hp</th>
                            <th>whatsapp</th>
                            <th>pin</th>
                            <th>status</th>
                            <?php if ($STATUS_USER === 'admin') { ?>
                                <th>action</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($users as $user) {
                        ?>
                            <tr>
                                <td><?= $user['ID_USER']; ?></td>
                                <td><?= $user['USERNAME']; ?></td>
                                <td><?= $user['NAMA_USER']; ?></td>
                                <td><?= $user['EMAIL']; ?></td>
                                <td><?= $user['NO_HP']; ?></td>
                                <td><?= $user['WA']; ?></td>
                                <td><?= $user['PIN']; ?></td>
                                <td><?= $user['STATUS_USER']; ?></td>
                                <?php if ($STATUS_USER === 'admin') { ?>
                                    <td><a href="user/edit/<?= $user['ID_USER']; ?>" class="btn btn-warning">edit</a>

                                        <a href="user/delete/<?= $user['ID_USER']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure ?')">delete</a>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php if ($STATUS_USER === 'admin') { ?>
                    <a href="/user/add" class="btn btn-success m-2" data-toggle="modal" data-target="#modalAdd">+ Add</a>
                <?php } ?>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php //modalADD; 
?>
<div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- di dalam modal-body terdapat 4 form input yang berisi data. data-data tersebut ditampilkan sama seperti menampilkan data pada tabel. -->
            <div class="modal-body">
                <?php if (isset($validation)) : ?>
                    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                <?php endif; ?>
                <form action="<?php echo base_url('/user/add') ?>" method="post">
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
                            <label for="status_user" class="form-label">status</label>
                            <select name="status_user" id="status_user" class="form-control">
                                <option value="user">user</option>
                                <option value="admin">admin</option>
                            </select>

                        </li>
                    </ul>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Input</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>