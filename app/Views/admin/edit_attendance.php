<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Page Heading -->
<div class="d-flex align-items-center justify-content-between p-3 bg-primary text-light">
    <h3>EDIT PAYROLL</h3>
</div>
<div class="container">
    <div class="row">
        <div class="col-12 col-- offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
            <form action="<?php echo base_url('/attendance/edit/' . $ID_ATTENDANCE) ?>" method="post">
                <?= csrf_field(); ?>
                <ul class="list-group">
                    <li class="list-group-item">
                        <?php

                        use App\Models\EmployeeModel;

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
                        <label for="month" class="form-label">Month</label>
                        <input type="text" name="month" class="form-control" value="<?= $MONTH; ?>">
                    </li>
                    <li class="list-group-item">
                        <label for="year" class="form-label">year</label>
                        <input type="text" name="year" class="form-control" value="<?= $YEAR; ?>">
                    </li>
                    <li class="list-group-item">
                        <label for="total_attention" class="form-label">Total Attention</label>
                        <input type="text" name="total_attention" class="form-control" value="<?= $TOTAL_ATTENTION; ?>">
                    </li>
                    <li class="list-group-item">
                        <label for="total_permission" class="form-label">Total Permission</label>
                        <input type="text" name="total_permission" class="form-control" value="<?= $TOTAL_PERMISSION; ?>">
                    </li>
                    <li class="list-group-item p-3">
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="/attendance" class="btn btn-warning text-dark">Cancel</a>
                    </li>

                </ul>
            </form>

        </div>
    </div>
</div>


<?= $this->endSection('content'); ?>