
  <div class="container">
      <div class="row">
          <div class="col-lg mb-5">
      <div class="card shadow mb-5">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Update</h6>
            </div>
            <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="nama">Nama</label>
                        <input type="text" value="<?= $pelanggan['nama']; ?>" id="nama" class="form-control" placeholder="Nama pelanggan" name="nama">
                    <?= form_error('nama','<small class="form-text text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="kota">Alamat</label>
                    <input type="text" id="alamat" value="<?= $pelanggan['alamat']; ?>" class="form-control" placeholder="alamat" name="alamat">
                    <?= form_error('alamat','<small class="form-text text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="tarif">Tarif</label>
                    <div class="input-group">
                    <input type="text" value="<?= $pelanggan['kode']; ?>" class="form-control isi" readonly id="tarif" placeholder="Tarif" name="tarif" data-toggle="modal" data-target="#kodeModal">
                    <div class="input-group-prepend">
                            <div class="input-group-text reload"><i class="fas fa-fw fa-history"></i></div>
                    </div>
                    </div>
                    <?= form_error('tarif','<small class="form-text text-danger pl-3">','</small>'); ?>
                </div>
                <button  type="submit" class="btn btn-primary">Update</button>
            </form>
            </div>
        </div>
        </div>
    </div>
  </div>

        <!-- Modal data Tarif -->
<div class="modal fade" id="kodeModal" tabindex="-1" role="dialog" aria-labelledby="kodeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="kodeModalLabel">Pilih Tarif</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table">
                    <tr>
                            <th>No.</th>
                            <th>Kode</th>
                            <th>Daya</th>
                            <th>Tarif/Kwh</th>
                            <th>Beban</th>
                            <th>Pilih</th>
                        </tr>
                        <?php $i = 1; ?>
                        <?php foreach($tarif as $tar) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $tar['kode']; ?></td>
                            <td><?= $tar['daya']; ?></td>
                            <td><?= $tar['tarif_perkwh']; ?></td>
                            <td><?= $tar['beban']; ?></td>
                            <td><button class="badge badge-primary kode" type="button" data-dismiss="modal" data-tarif="<?= $tar['kode']; ?>"><i class="fas fa-fw fa-check"></i></button></td>
                        </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
