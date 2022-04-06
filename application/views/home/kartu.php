<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/homepage/css/kartu.css')?>">
</head>
<body>
<img src="<?= base_url('assets/homepage/images/header_print.jpg')?>" alt="" class="header-print to-print">
    <div class="main">
    <div class="title">
        <h3>Kartu Pendaftaran</h3>
    </div>
    <div class="container">
        <div class="pas_foto">
            <img src="<?= $detail_pendaftaran['pas_foto']?>" alt="">
        </div>
        <div class="details">
            <table>
                <tr>
                    <td>Nomor Seleksi</td>
                    <td>: <?= $detail_pendaftaran['nomor_seleksi']?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>: <?= $detail_pendaftaran['mhs_nama']?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>: <?= ($detail_pendaftaran['mhs_jk'] == 'l') ? 'Laki-Laki': 'Perempuan'?></td>
                </tr>
                <tr>
                    <td>Nomor Handphone</td>
                    <td>: <?= $detail_pendaftaran['no_hp']?></td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td>: <?= $detail_pendaftaran['mhs_tempat_lahir']?></td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>: <?= $detail_pendaftaran['mhs_tgl_lahir']?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: <?= $detail_pendaftaran['mhs_alamat']?></td>
                </tr>
                <tr>
                    <td>Asal Sekolah</td>
                    <td>: <?= $detail_pendaftaran['nama_sekolah']?></td>
                </tr>
                <tr>
                    <td>Pilihan Prodi</td>
                    <td>: <?= $detail_pendaftaran['nama_prodi']?></td>
                </tr>
            </table>
        </div>

    </div>
    <div class="footer">
            <div class="panitia">
            <h4>Tanda Tangan Panitia</h4>
            <img src="" alt="">
            </div>
            <div class="peserta">
                <h4>Tanda Tangan Peserta</h4>
                <img src="" alt="">
            </div>
        </div>
    </div>
    
</body>
</html>