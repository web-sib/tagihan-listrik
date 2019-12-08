<div class="container">
<?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg-5 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Management</h6>
            </div>
            <div class="card-body">
            <form action="<?= base_url('management/tarif'); ?>" method="post">
                <div class="form-group">
                    <label for="kode">Kode</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">TR</div>
                        </div>
                        <input readonly value="<?= $kode; ?>" type="text" id="kode" class="form-control" placeholder="Kode tarif" name="kode">
                    </div>
                    <?= form_error('kode','<small class="form-text text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="daya">Daya</label>
                    <div class="input-group">
                    <input type="text" id="daya" class="form-control" placeholder="Daya" name="daya">
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
                        <input type="text" class="form-control" id="tarif" onkeyup="tari();" placeholder="Tarif /Kwh" name="tarif">
                    </div>
                    <?= form_error('tarif','<small class="form-text text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="beban">Beban</label>
                    <div class="input-group">
                    <input type="text" class="form-control" id="beban" placeholder="Beban" name="beban">
                    <div class="input-group-prepend">
                            <div class="input-group-text">Kwh</div>
                    </div>
                    </div>
                    <?= form_error('beban','<small class="form-text text-danger pl-3">','</small>'); ?>
                </div>
                <button class="btn btn-primary" type="submit">Tambah</button>
            </form>
            </div>
        </div>
        </div>

        <!-- card data -->
        <div class="col-lg-7">
        <div class="card">
            <div class="card-header font-weight-bold">
                Data Tarif
            </div>
            <div class="card-body shadow">
                <h5 class="card-title font-weight-bold text-primary">Tarif (Bawah, Menengah, Atas)</h5>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>No.</th>
                            <th>Kode</th>
                            <th>Daya</th>
                            <th>Tarif/Kwh</th>
                            <th>Beban</th>
                            <th>Aksi</th>
                        </tr>
                        <?php $i = 1; ?>
                        <?php foreach($tarif as $tar) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $tar['kode']; ?></td>
                            <td><?= $tar['daya']. " "."V/A"; ?></td>
                            <td><?= "Rp."." ".number_format($tar['tarif_perkwh'],0,',','.'); ?></td>
                            <td><?= $tar['beban']." "."Kwh"; ?></td>
                            <td>
                                <a href="<?= base_url('management/updatetarif/') ?><?= $tar['kode']; ?>" class="badge badge-primary">Update</a>
                                <a href="<?= base_url('management/deletetarif/') ?><?= $tar['kode']; ?>" class="badge badge-danger">Delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>  
</div>