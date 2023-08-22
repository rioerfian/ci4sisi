<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- Page Heading -->
<div class="d-flex align-items-center justify-content-between p-3 bg-primary text-light">
    <h3>EDIT SPPD</h3>
</div>
<div class="container">
    <div class="row">
        <div class="col-12 col-- offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
            <?php if (isset($validation)) : ?>
                <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
            <?php endif; ?>
            <form action="<?php echo base_url('/sppd/edit/' . $ID_SPPD) ?>" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="list-group">
                            <li class="list-group-item">

                                <label for="id_employee" class="form-label">employee</label>

                                <select name="id_employee" id="id_employee" class="form-control ">
                                    <option value="<?= $ID_EMPLOYEE; ?>"><?= $ID_EMPLOYEE; ?></option>

                                </select>
                            </li>
                            <li class="list-group-item">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" cols="10" rows="5" class="form-control">
                                <?= $DESCRIPTION; ?>
                                </textarea>
                            </li>
                            <li class="list-group-item">
                                <label for="destination" class="form-label">Destination</label>
                                <input type="text" name="destination" class="form-control" value="<?= $DESTINATION; ?>">
                            </li>
                            <li class="list-group-item">
                                <label for="departure" class="form-label">Departure date</label>
                                <input type="date" name="departure" class="form-control" value="<?= $DEPARTURE_DATE; ?>">
                            </li>
                            <li class="list-group-item">
                                <label for="arrive" class="form-label">Arrive date</label>
                                <input type="date" name="arrive" class="form-control" value="<?= $ARRIVE_DATE; ?>">
                            </li>
                            <li class="list-group-item p-3">
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="/sppd" class="btn btn-warning text-dark">Cancel</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?= $this->endSection('content'); ?>