<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="<?= base_url('assets/homepage/css/styles.css')?>">
</head>
<body class="home-body">
    <?php $detail_pendaftaran = $this->Form_model->get_details($_SESSION['mhs_id'])->row_array();
    $_SESSION['detail_pendaftaran'] = $detail_pendaftaran;?>
    <div id="informasi" class="modal">
        <div class="modal-content">
        <span id="close">&times;</span>
            <div class="title">
                <h3>Cara Mendaftar di STAINU</h3>
            </div>
            <ol class="steps">
            <li>Mengisi Formulis</li>
            <li>Upload (Pas Photo, KK, Ijazah, KTP)</li>
            <li>Upload Bukti Pembayaran</li>


            </ol>
        </div>
    </div>
    <section>
    <div class="home-container">
        <?php if (empty($detail_pendaftaran)) {?>
            <h1 style="text-align: center;">Selamat datang di aplikasi PMBB2022!</h1>
            <h3>Baca informasi lebih lanjut untuk cara mendaftar dan daftarkan dirimu sekarang!</h3>
        <?php } else if ($this->session->userdata("hak_akses") == "admin") {?>
            <h1>Selamat datang di aplikasi PMB2022!</h1>
        <?php } else if ($detail_pendaftaran['approved'] == '0') {?>
                <h1>Kamu sementara ditolak, dengan alasan:</h1>
                <h3><?= ($detail_pendaftaran['alasan_pembatalan']) ? $detail_pendaftaran['alasan_pembatalan'] : 'Tanpa alasan, hubungi admin untuk info lebih lanjut.'?></h3>
        <?php } else if ($detail_pendaftaran['approved'] == ""){?>
            <h1 style="text-align: center;">Formulir pendaftaran telah terisi.</h1>
            <h3>Konfirmasi pembayaran dan lengkapi dokumen untuk menyelesaikan pendaftaran!</h3>
        <?php } else {?>
            <h3>Selamat! Kamu sudah terdaftar.</h3>
        <?php }?>
        <div class="buttons">
            
            <?php if (!empty($detail_pendaftaran)) {?>

            <?php if ($this->session->userdata("hak_akses") == "admin") {?>
                <a href="<?= base_url('admin/verifikasi')?>" class="btn"><span class="mdi mdi-note"></span>Verifikasi Data</a>
                <?php } else {?>
                    <a href="<?= base_url('form/daftar/detail')?>" class="btn"><span class="mdi mdi-note"></span>Data Pendaftaran-mu</a>
                        <a href="<?= base_url('main/dokumen')?>" class="btn"><span class="mdi mdi-file-link"></span>Lengkapi Dokumen</a>
                        <a href="<?= base_url('main/pembayaran')?>" class="btn"><span class="mdi mdi-credit-card"></span>Konfirmasi Pembayaran</a>
                <?php }?>
            <?php } else {?>
                <a href="<?= base_url('form/daftar')?>" class="btn"><span class="mdi mdi-note"></span>Daftar</a>
                <a  class="btn" id="info"><span class="mdi mdi-information-variant"></span>Cara Mendaftar</a>
                <?php }?>
        </div>
    </div>
    </section>

    <script>
        var modal = document.getElementById("informasi");
        var close = document.querySelector("#close");
        <?php if (empty($detail_pendaftaran))  {?>
        var btn = document.querySelector("#info");
        btn.onclick = () => {
            openModal();
        }
        <?php }?>

        window.onclick = (event) => {
            if (event.target == modal) {
                closeModal();
            }
        }



        close.onclick = () => {
            closeModal();
        }
        function openModal(){
            modal.style.display = "block";
        }

        function closeModal(){
            modal.style.display = "none";
        }

</script>
</body>
</html>