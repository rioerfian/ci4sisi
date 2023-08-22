<?= $this->extend('pages/dashboard'); ?>

<?= $this->section('content'); ?>
<!-- Page Heading -->
<div class="d-flex align-items-center justify-content-between p-3 bg-primary text-light">
    <h3>PAYROLL MANAGEMENT</h3>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">PAYROLL list</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>id payroll</th>
                            <th>name</th>
                            <th>duty</th>
                            <th>salary</th>
                            <th>salary deduction</th>
                            <th>TOTAL</th>
                            <?php if ($STATUS_USER === 'admin') { ?>
                                <th>action</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($result as $row) {
                            //var_dump($user);
                        ?>
                            <tr>
                                <td><?= $row['ID_PAYROLL']; ?></td>
                                <td><?= $row['NAMA_USER']; ?></td>
                                <td><?= $row['NAME_DUTY']; ?></td>
                                <td><?= $row['SALARY']; ?></td>
                                <td><?= $row['SALARY_DEDUCTION']; ?></td>
                                <td><?= $row['TOTAL_SALARY']; ?></td>
                                <?php if ($STATUS_USER === 'admin') { ?>
                                    <td><a href="payroll/edit/<?= $row['ID_PAYROLL']; ?>" class="btn btn-warning">edit</a>
                                        <a href="payroll/delete/<?= $row['ID_PAYROLL']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure ?')">delete</a>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- di dalam modal-body terdapat 4 form input yang berisi data. data-data tersebut ditampilkan sama seperti menampilkan data pada tabel. -->
            <div class="modal-body">
                <?php if (isset($validation)) : ?>
                    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                <?php endif; ?>
                <form action="<?php echo base_url('/payroll/add') ?>" method="post">
                    <?= csrf_field(); ?>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <?php

                            use App\Models\PayrollModel;
                            use App\Models\EmployeeModel;

                            $payroll = new PayrollModel();
                            $employee = new EmployeeModel();


                            $result = $employee->findAll();
                            ?>
                            <label for="id_employee" class="form-label">name</label>

                            <select name="id_employee" id="id_employee" class="form-control ">

                                <?php foreach ($result as $row) {
                                ?>
                                    <option value="<?= $row['ID_EMPLOYEE']; ?>"><?= $row['ID_EMPLOYEE']; ?></option>
                                <?php }
                                ?>
                            </select>
                        </li>
                        <li class="list-group-item">
                            <label for="salary_deduction" class="form-label">Salary Deduction</label>
                            <input type="number" name="salary_deduction" class="form-control">
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