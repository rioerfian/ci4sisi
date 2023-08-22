<?= $this->extend('pages/dashboard'); ?>

<?= $this->section('content'); ?>
<!-- Page Heading -->
<div class="d-flex align-items-center justify-content-between p-3 bg-primary text-light">
    <h3>SPPD MANAGEMENT</h3>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">SPPD list</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>id sppd</th>
                            <th>description</th>
                            <th>destination</th>
                            <th>departure</th>
                            <th>arrive</th>
                            <th>employee</th>
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
                                <td><?= $row['ID_SPPD']; ?></td>
                                <td><?= $row['DESCRIPTION']; ?></td>
                                <td><?= $row['DESTINATION']; ?></td>
                                <td><?= $row['DEPARTURE_DATE']; ?></td>
                                <td><?= $row['ARRIVE_DATE']; ?></td>
                                <td><?= $row['NAMA_USER']; ?></td>
                                <?php if ($STATUS_USER === 'admin') { ?>
                                    <td><a href="sppd/edit/<?= $row['ID_SPPD']; ?>" class="btn btn-warning">edit</a>
                                        <a href="sppd/delete/<?= $row['ID_SPPD']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure ?')">delete</a>
                                    </td>
                                <?php } ?>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php if ($STATUS_USER === 'admin') { ?>
                    <a href="/employee/add" class="btn btn-success m-2" data-toggle="modal" data-target="#modalAdd">+ Add</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah sppd</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- di dalam modal-body terdapat 4 form input yang berisi data. data-data tersebut ditampilkan sama seperti menampilkan data pada tabel. -->
            <div class="modal-body">
                <?php if (isset($validation)) : ?>
                    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                <?php endif; ?>
                <form action="<?php echo base_url('/sppd/add') ?>" method="post">
                    <?= csrf_field(); ?>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <?php

                            use App\Models\EmployeeModel;

                            $employee = new EmployeeModel();

                            $result = $employee->findAll();

                            ?>
                            <label for="id_employee" class="form-label">Employee</label>

                            <select name="id_employee" id="id_employee" class="form-control ">

                                <?php foreach ($result as $row) {
                                ?>
                                    <option value="<?= $row['ID_EMPLOYEE']; ?>"><?= $row['ID_EMPLOYEE']; ?></option>
                                <?php }
                                ?>
                            </select>
                        </li>
                        <li class="list-group-item">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" cols="10" rows="5" class="form-control"></textarea>
                        </li>
                        <li class="list-group-item">
                            <label for="destination" class="form-label">Destination</label>
                            <input type="text" name="destination" class="form-control">
                        </li>
                        <li class="list-group-item">
                            <label for="departure" class="form-label">Departure date</label>
                            <input type="date" name="departure" class="form-control">
                        </li>
                        <li class="list-group-item">
                            <label for="arrive" class="form-label">Arrive date</label>
                            <input type="date" name="arrive" class="form-control">
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