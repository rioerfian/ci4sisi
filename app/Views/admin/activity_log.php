<?= $this->extend('pages/dashboard'); ?>

<?= $this->section('content'); ?>
<!-- Page Heading -->
<div class="d-flex align-items-center justify-content-between p-3 bg-primary text-light">
    <h3>USER ACTIVITY LOG</h3>
</div>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">ACCTIVITY list</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No activity</th>
                            <th>username</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Menu ID</th>
                            <?php if ($STATUS_USER === 'admin') { ?>
                                <th>action</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($result as $row) {
                        ?>
                            <tr>
                                <td><?= $row['NO_ACTIVITY']; ?></td>
                                <td><?= $row['USERNAME']; ?></td>
                                <td><?= $row['DESCRIPTION']; ?></td>
                                <td><?= $row['STATUS']; ?></td>
                                <td><?= $row['MENU_ID']; ?></td>
                                <?php if ($STATUS_USER === 'admin') { ?>
                                    <td><a href="log/edit/<?= $row['ID_USER']; ?>" class="btn btn-warning" data-toggle="modal" data-target="#modalEdit">edit</a>

                                        <a href="log/delete/<?= $row['ID_USER']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure ?')">delete</a>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


<?= $this->endSection('content'); ?>