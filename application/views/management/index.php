<div class="container">
<?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg-4 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Management pelanggan</h6>
            </div>
            <div class="card-body">
            <form action="<?= base_url('management/index'); ?>" method="post">
                <div class="form-group">
                    <label for="nama">Nama</label>
                        <input type="text" id="nama" class="form-control" placeholder="Nama pelanggan" name="nama">
                    <?= form_error('nama','<small class="form-text text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="kota">Kota</label>
                    <input type="text" id="kota" class="form-control" placeholder="Kota / Kabupaten" name="kota">
                    <?= form_error('kota','<small class="form-text text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="kecamatan">Kecamatan</label>
                    <input type="text" id="kecamatan" class="form-control" placeholder="kecamatan pelanggan" name="kecamatan">
                    <?= form_error('kecamatan','<small class="form-text text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="desa">Kelurahan/Desa</label>
                    <input type="text" id="desa" class="form-control" placeholder="Kelurahan/Desa / Kabupaten" name="desa">
                    <?= form_error('desa','<small class="form-text text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="tarif">Tarif</label>
                    <div class="input-group">
                    <input type="text" class="form-control isi" readonly id="tarif" placeholder="Tarif" name="tarif" data-toggle="modal" data-target="#kodeModal">
                    <div class="input-group-prepend">
                            <div class="input-group-text reload"><i class="fas fa-fw fa-history"></i></div>
                    </div>
                    </div>
                    <?= form_error('tarif','<small class="form-text text-danger pl-3">','</small>'); ?>
                </div>
                <button  type="submit" class="btn btn-primary">Tambah</button>
            </form>
            </div>
        </div>
        </div>

        <!-- card data -->
        <div class="col-lg-8">
        <div class="card">
            <div class="card-header font-weight-bold">
                Pelanggan PT. SETRUM
            </div>
            <div class="card-body shadow">
                <h5 class="card-title font-weight-bold text-primary">Data Pelanggan</h5>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Kode</th>
                            <th>Action</th>
                        </tr>
                        <?php $i = 1; ?>
                        <?php foreach($pelanggan as $pel) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $pel['nama']; ?></td>
                            <td><?= $pel['alamat'];?></td>
                            <td><?= $pel['kode']; ?></td>
                            <td>
                                <a href="<?= base_url() ?>management/updatepelanggan/<?= $pel['id']; ?>" class="badge badge-primary text-white" style="cursor:pointer">Updt</a>
                                <a href="<?= base_url() ?>management/deletepelanggan/<?= $pel['id']; ?>" class="badge badge-danger text-white" style="cursor:pointer">Del.</a>
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