<div class="container">
    <div class="row">
        <div class="col-lg">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>No.</th>
                        <th>tanggal bayar</th>
                        <th>jumlah tagihan</th>
                        <th>biaya administrasi</th>
                        <th>tarif perKWH</th>
                        <th>nama</th>
                        <th>alamat</th>
                        <th>pemakaian</th>
                    </tr>
                    <?php $no = 1; ?>
                    <?php foreach($pembayaran as $pem) : ?>
                    <tr>
                        <th><?= $no; ?></th>
                        <th><?= $pem['tanggal_bayar']; ?></th>
                        <th><?= $pem['jumlah_tagihan']; ?></th>
                        <th><?= $pem['biaya_admin']; ?></th>
                        <th><?= $pem['tarif_perkwh']; ?></th>
                        <th><?= $pem['nama']; ?></th>
                        <th><?= $pem['alamat']; ?></th>
                        <th><?= $pem['pemakaian']; ?></th>
                    </tr>
                    <?php $no++ ?>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>