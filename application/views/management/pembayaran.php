<div class="container mb-5">
<?= $this->session->flashdata('message'); ?>
    <div class="row">
        <div class="col-lg-8 mb-5">
        <div class="card shadow mb-5">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Management</h6>
            </div>
            <div class="card-body">
            <form action="<?= base_url('management/pembayaran'); ?>" method="post">
                <div class="form-group">
                    <input type="text" readonly value="<?= date('y-m-d'); ?>" class="form-control form-control-user" id="tanggal" name="tanggal">
                    <?= form_error('tanggal','<small class="form-text text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="pelanggan">Tagihan</label>
                    <div class="input-group">
                    <input type="text" class="form-control tag" readonly id="tagihan" placeholder="tagihan tagihan" name="tagihan" data-toggle="modal" data-target="#kodeModal">
                    <div class="input-group-prepend">
                            <div class="input-group-text reload3"><i class="fas fa-fw fa-history"></i></div>
                    </div>
                    </div>
                    <?= form_error('pelanggan','<small class="form-text text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="hidden" id="tarif" class="form-control tarif" name="tarif">
                    <?= form_error('tarif','<small class="form-text text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="hidden" id="pemakai" class="form-control pemakai" name="pemakai">
                    <?= form_error('pemakai','<small class="form-text text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group">
                <label for="kode">Denda</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Rp.</div>
                        </div>
                        <input readonly type="text" id="denda" onkeyup = "total();" class="form-control" name="denda">
                    </div>
                    <?= form_error('denda','<small class="form-text text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group">
                <label for="kode">Biaya Administrasi</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Rp.</div>
                        </div>
                        <input type="text" id="admin" onkeyup="total();" class="form-control" name="admin">
                    </div>
                    <?= form_error('admin','<small class="form-text text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="kode">Jumlah tagihan</label>
                        <input type="text" readonly onkeyup="total();" id="jumlah" class="form-control" name="jumlah">
                    <?= form_error('jumlah','<small class="form-text text-danger pl-3">','</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="hidden" value="sudah  di bayar" id="status" class="form-control" name="status">
                    <?= form_error('status','<small class="form-text text-danger pl-3">','</small>'); ?>
                </div>
                <button class="btn btn-primary" type="submit">Tambah</button>
            </form>
            </div>
        </div>
        </div>

        <!-- card data -->
    <div class="col-lg-4">
        <div class="row">
            <div class="col">
                <div class="card mb-2" style="width: 20.5rem;">
                    <div class="card-header text-white bg-gradient-primary">
                        Pelanggan
                    </div>
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="form-group">
                            <label for="exampleInputnama1">Nama</label>
                            <input type="text" class="form-control nama" readonly id="exampleInputnama1" placeholder="nama">
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="form-group">
                            <label for="exampleInputalamat1">Alamat</label>
                            <input type="text" class="form-control alamat" readonly id="exampleInputalamat1" placeholder="alamat">
                        </div>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
    <div class="row">
        <div class="col">
            <div class="card mb-2" style="width: 20.5rem;">
                    <div class="card-header text-white bg-gradient-secondary">
                        Tagihan
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">                        
                        <div class="form-group">
                            <label for="exampleInputtanggal1">Bulan dan tahun tagih</label>
                            <input type="text" class="form-control bulan" readonly id="exampleInputtanggal1" placeholder="tahun dan bulan tagih">
                        </div> 
                        </li>
                        <li class="list-group-item">                        
                        <div class="form-group">
                            <label for="exampleInputpemakaian1">Pemakaian</label>
                            <input type="text" class="form-control pemakaian" readonly id="exampleInputpemakaian1" placeholder="pemakaian">
                        </div>
                        </li>
                        <li class="list-group-item">                        
                        <div class="form-group">
                            <label for="exampleInputstatus1">Status</label>
                            <input type="text" class="form-control status" readonly id="exampleInputstatus1" placeholder="status">
                        </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    <div class="row">
        <div class="col">
            <div class="card" style="width: 20.5rem;">
                    <div class="card-header text-white bg-gradient-danger">
                        Pembayaran
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">                        
                        <div class="form-group">
                            <label for="exampleInputtanggal1">Tanggal</label>
                            <input type="text" class="form-control tanggal" readonly id="exampleInputtanggal1" placeholder="tanggal">
                        </div> 
                        </li>
                    </ul>
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
          <h5 class="modal-title" id="kodeModalLabel">Pilih Tagihan</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table">
                    <tr>
                            <th>Id</th>
                            <th>Tahun</th>
                            <th>Bulan</th>
                            <th>nama</th>
                            <th>alamat</th>
                            <th>pilih</th>
                        </tr>
                        <?php foreach($tagih as $tagi) : ?>
                        <tr>
                            <td><?= $tagi['id_tagihan']; ?></td>
                            <td><?= $tagi['tahun_tagih']; ?></td>
                            <td><?= $tagi['bulan_tagih']; ?></td>
                            <td><?= $tagi['nama']; ?></td>
                            <td><?= $tagi['alamat']; ?></td>
                            <td><button class="badge badge-primary tagi" type="button" data-dismiss="modal" 
                            data-tagi="<?= $tagi['id_tagihan']; ?>"
                            data-nama="<?= $tagi['nama']; ?>"
                            data-alamat="<?= $tagi['alamat']; ?>"
                            data-bulan="<?= $tagi['bulan_tagih']; ?>"
                            data-pemakaian="<?= $tagi['pemakaian']; ?>"
                            data-status="<?= $tagi['status']; ?>"
                            data-tanggal="<?= date('y-m-d'); ?>"
                            data-denda="<?= $tagi['denda']; ?>"
                            data-tarif="<?= $tagi['tarif_perkwh']; ?>"
                            >
                            <i class="fas fa-fw fa-check"></i></button></td>
                        </tr>
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