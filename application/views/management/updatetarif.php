<div class="container">
    <div class="row">
        <div class="col-lg mb-5">
        <div class="card shadow mb-5">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Management</h6>
            </div>
            <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="daya">Daya</label>
                    <div class="input-group">
                    <input value="<?= $tarif['daya']; ?>" type="text" id="daya" class="form-control" placeholder="Daya" name="daya">
                    <div class="input-group-prepend">
                            <div class="input-group-text">VA</div>
                    </div>
                    </div>
                    <?= form_error('daya','<small class="form-text text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="tarif">Tarif/Kwh</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Rp.</div>
                        </div>
                        <input type="text" value="<?= $tarif['tarif_perkwh']; ?>" class="form-control" id="tarif" onkeyup="tari();" placeholder="Tarif /Kwh" name="tarif">
                    </div>
                    <?= form_error('tarif','<small class="form-text text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="beban">Beban</label>
                    <div class="input-group">
                    <input type="text" value="<?= $tarif['beban']; ?>" class="form-control" id="beban" placeholder="Beban" name="beban">
                    <div class="input-group-prepend">
                            <div class="input-group-text">Kwh</div>
                    </div>
                    </div>
                    <?= form_error('beban','<small class="form-text text-danger pl-3">','</small>'); ?>
                </div>
                <button class="btn btn-primary" type="submit">Update</button>
                <a href="<?= base_url('management/tarif'); ?>" class="btn btn-warning">Kembali</a>
            </form>
            </div>
        </div>
        </div>
    </div>
</div>