<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/styles.css')?>">
</head>
<body>
    <div class="container">
        <h2>Daftar Calon Mahasiswa</h2>
        <table border="1" cellspacing="0">
            <tr>
                <th>Nomor Seleksi</th>
                <th>Nomor HP</th>
                <th>Asal Sekolah</th>
                <th>Jurusan</th>
                <th>Reguler/Non Reguler</th>
                <th>Status</th>
                <th>Verifikasi</th>
            </tr>
            <?php foreach ($data_mahasiswa as $row) {?>
                <?php
                    $approved = $row->approved;
                    $status = '';
                    if ($approved == '0'){
                        $status = 'Ditolak';
                    } else if ($approved == '1'){
                        $status = 'Diterima';
                    } else {
                    $status = 'Menunggu konfirmasi';

                    }
                ?>
                <tr>
                    <td><?= $row->nomor_seleksi?></td>
                    <td><?= $row->no_hp?></td>
                    <td><?= $row->nama_sekolah?></td>
                    <td><?= $row->nama ?></td>
                    <td><?= $row->is_reguler?></td>
                    <td><?= $status?></td>
                    <?php if ($status != 'Menunggu konfirmasi') {?>
                        <td><a href="<?= base_url('admin/batal/'.$row->mhs_id)?>" class="btn">Batal</a>
                        <?php if ($status == 'Diterima'){?>
                            <a href="<?= base_url('admin/cetak/'.$row->mhs_id)?>" class="btn">Cetak</a></td>
                        <?php }?>
                        
                    <?php } else {?>
                    <td>
                        <a href="<?= base_url('admin/accept/'.$row->mhs_id)?>"  class="btn">Terima</a>
                        <a href="<?= base_url('admin/deny/'.$row->mhs_id)?>" class="btn tolak">Tolak</a>
                    </td>
                    <?php }?>
                </tr>
            <?php }?>
        </table>
    </div>

    <script>
</script>

</body>
</html>