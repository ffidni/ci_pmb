<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DocDument</title>
    <link rel="stylesheet" href="<?= base_url('assets/homepage/css/payment.css')?>">
</head>
<body>
    <?php $detail_pendaftaran = $this->Form_model->get_details($_SESSION['mhs_id'])->row_array();
        $_SESSION['detail_pendaftaran'] = $detail_pendaftaran;

        if (!file_exists(str_replace(base_url(), './', $detail_pendaftaran['bukti_pembayaran']))){
            $detail_pendaftaran['bukti_pembayaran'] = ""; 
        }
    ?>
    <div class="container-payment">
        <?= form_open_multipart(base_url('main/upload_bukti'))?>
            <div class="title">
                <span class="mdi mdi-credit-card large"></span>
                <h3><?= (isset($lihat_bukti)) ? 'Bukti Transaksi<br>'.$lihat_bukti['nama'].' ('.$lihat_bukti['nomor_seleksi'].')': 'Konfirmasi Pembayaran'?></h3>
            </div>
            <div class="content">
                <?php if (isset($lihat_bukti)) {?>
                    <img src="<?= $lihat_bukti['img']['bukti_pembayaran']?>" alt="">
                    <div class="buttons">
                        <a class="btn" href="<?= base_url('admin/verifikasi')?>">Kembali</a>
                    </div>
                <?php }else if ($detail_pendaftaran['approved'] == "1") {?>
                    <h4>Bukti transaksi pembayaran anda sudah dikonfirmasi.</h4>
                <?php } else {?>
                    <h4><?= ($detail_pendaftaran['bukti_pembayaran'] && $detail_pendaftaran['approved'] != '1') ?  'Bukti transaksi sudah disertakan. Tunggu konfirmasi dari admin, untuk memvalidasi dan menyelesaikan pendaftaran anda.' : 'Sertakan bukti transaksi anda di sini:' ?></h4>
                <img id="output" alt="" src="<?= ($detail_pendaftaran['bukti_pembayaran']) ? $detail_pendaftaran['bukti_pembayaran']: ''?>">
                <?= (isset($error)) ? $error : ''?>
                <div class="buttons">
                <label for="fileinput" class="btn">Pilih Gambar</label>
                <input type="file" name="userfile" id="fileinput" accept="image/*" onchange="loadFile(event)" name="bukti_pembayaran" size="20">
                <input type="submit" class="btn" value="Upload">
                </div>
                <?php }?>

            </div>
        </form>
    </div>

    <script>
        var loadFile = (event) => {
            var output = document.getElementById("output");
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = () => {
                URL.revokeObjectURL(output.src);
            }
        }
    </script>

</body>
</html>