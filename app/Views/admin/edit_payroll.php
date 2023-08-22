<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Page Heading -->
<div class="d-flex align-items-center justify-content-between p-3 bg-primary text-light">
    <h3>EDIT PAYROLL</h3>
</div>
<div class="container">
    <div class="row">
        <div class="col-12 col-- offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
            <?php if (isset($validation)) : ?>
                <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
            <?php endif; ?>
            <form action="<?php echo base_url('/payroll/edit/' . $ID_PAYROLL) ?>" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="list-group">
                            <li class="list-group-item">

                                <label for="id_employee" class="form-label">employee</label>

                                <select name="id_employee" id="id_employee" class="form-control">
                                    <option value="<?= $ID_EMPLOYEE; ?>"><?= $ID_EMPLOYEE; ?></option>
                                </select>
                            </li>
                            <li class="list-group-item">
                                <label for="salary_deduction" class="form-label">Salary Deduction</label>
                                <input type="number" name="salary_deduction" class="form-control" value="<?= $SALARY_DEDUCTION; ?>">
                            </li>

                            <li class="list-group-item p-3">
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="/payroll" class="btn btn-warning text-dark">Cancel</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection('content'); ?>