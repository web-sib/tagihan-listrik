<div class="container mb-5">
<?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg-5 mb-5">
        <div class="card shadow mb-5">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Management</h6>
            </div>
            <div class="card-body">
            <form action="<?= base_url('management/tagihan'); ?>" method="post">
                <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" readonly value="<?= date('Y'); ?>" class="form-control form-control-user" id="tahun" name="tahun">
                    <?= form_error('tahun','<small class="form-text text-danger pl-3">','</small>'); ?>
                </div>
                <div class="col-sm-6">
                    <input type="text" readonly value="<?= date('M'); ?>" class="form-control form-control-user" id="bulan" name="bulan">
                    <?= form_error('bulan','<small class="form-text text-danger pl-3">','</small>'); ?>
                </div>
                </div>
                <div class="form-group">
                    <label for="kode">Pemakaian</label>
                        <input type="text" id="pemakaian" class="form-control" placeholder="pemakaian" name="pemakaian">
                    <?= form_error('pemakaian','<small class="form-text text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="hidden" value="belum bayar" id="status" class="form-control" name="status">
                    <?= form_error('status','<small class="form-text text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="pelanggan">pelanggan</label>
                    <div class="input-group">
                    <input type="text" class="form-control pel" readonly id="pelanggan" placeholder="pelanggan" name="pelanggan" data-toggle="modal" data-target="#kodeModal">
                    <div class="input-group-prepend">
                            <div class="input-group-text reload2"><i class="fas fa-fw fa-history"></i></div>
                    </div>
                    </div>
                    <?= form_error('pelanggan','<small class="form-text text-danger pl-3">','</small>'); ?>
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
                Data Tagihan
            </div>
            <div class="card-body shadow">
                <h5 class="card-title font-weight-bold text-primary">Tagihan Tahun <?= date('Y'); ?> Bulan <?= date('M'); ?></h5><i>jika data berwarna merah(tagihan bulan sebelumnya belum di bayar)</i>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th>No.</th>
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Kode tagihan</th>
                            <th>Denda</th>
                        </tr>
                        <?php $i = 1; ?>
                        <?php foreach($tagihan as $tag) : ?>
                        <?php if($tag['bulan_tagih'] != date('M')) : ?>
                        <tr class="text-danger">
                            <td><?= $i; ?></td>
                            <td><?= $tag['id_tagihan']; ?></td>
                            <td><?= $tag['nama']; ?></td>
                            <td><?= $tag['alamat']; ?></td>
                            <td><?= $tag['kode']; ?></td>
                            <td>RP.<?= $tag['denda']; ?></td>
                        </tr>
                        <?php else: ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $tag['id_tagihan']; ?></td>
                            <td><?= $tag['nama']; ?></td>
                            <td><?= $tag['alamat']; ?></td>
                            <td><?= $tag['kode']; ?></td>
                            <td>RP.<?= $tag['denda']; ?></td>
                        </tr>
                        <?php $i++; ?>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </div>  
</div>

<!-- Modal pelanggan -->
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
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Kode Tarif</th>
                        </tr>
                        <?php $i = 1;?>
                        <?php foreach($pelanggan as $pel) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $pel['id']; ?></td>
                            <td><?= $pel['nama']; ?></td>
                            <td><?= $pel['alamat']; ?></td>
                            <td><?= $pel['kode']; ?></td>
                            <td><button class="badge badge-primary pelang" type="button" data-dismiss="modal" data-tagihan="<?= $pel['id']; ?>"><i class="fas fa-fw fa-check"></i></button></td>
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