<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Page Heading -->
<div class="d-flex align-items-center justify-content-between p-3 bg-primary text-light">
    <h3>EDIT EMPLOYEE</h3>
</div>
<div class="container">
    <div class="row">
        <div class="col-12 col-- offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">

            <div class="modal-body">
                <?php if (isset($validation)) : ?>
                    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                <?php endif; ?>
                <form action="<?php echo base_url('/employee/edit/' . $ID_EMPLOYEE) ?>" method="post">
                    <?= csrf_field(); ?>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <label for="id_user" class="form-label">ID USER</label>

                            <select name="id_user" id="id_user" class="form-control ">
                                <option value="<?= $ID_USER; ?>"><?= $ID_USER; ?></option>
                            </select>
                        </li>
                        <li class="list-group-item">
                            <label for="id_employee" class="form-label">ID EMPLOYEE</label>

                            <select name="id_employee" id="id_user" class="form-control ">
                                <option value="<?= $ID_EMPLOYEE; ?>"><?= $ID_EMPLOYEE; ?></option>
                            </select>
                        </li>
                        <li class="list-group-item">
                            <label for="id_duty" class="form-label">duty</label>
                            <select name="id_duty" id="id_duty" class="form-control">
                                <option value="<?= $ID_DUTY; ?>" selected>
                                    <?php

                                    use App\Models\DutyModel;

                                    $duty = new DutyModel();

                                    $data = $duty->where('ID_DUTY', $ID_DUTY)->first();
                                    ?>
                                    <?= $data['NAME_DUTY']; ?>
                                </option>

                                <option value="1">Direktur</option>
                                <option value="2">Manajer</option>
                                <option value="3">Staff</option>
                                <option value="4">Magang</option>
                            </select>
                        </li>
                        <li class="list-group-item p-3">
                            <button type="submit" class="btn btn-success">Update</button>
                            <a href="/employee" class="btn btn-warning text-dark">Cancel</a>
                        </li>

                    </ul>

                </form>

            </div>
        </div>
    </div>
</div>


<?= $this->endSection('content'); ?>