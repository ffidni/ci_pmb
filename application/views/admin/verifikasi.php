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
    <div id="modal" class="popup">
        <div class="batal-content">
            <form id="batal-form" method="post">
                <span class="close" onclick="closeModal()" >&times;</span>
                <h4>Alasan pembatalan</h4>
                <textarea name="alasan_pembatalan" id="" class="form-control form-textarea" cols="60" rows="10"></textarea>
                <div class="batal-buttons">
                    <input type="submit" class="btn batal-btn" onsubmit="return closeModal(true)">
                </div>
            </form>
        </div>  
    </div>

    <div id="pembayaran" class="popup">
        <div class="img-content">
            <img id="imgBukti" src="" alt="">
        </div>
    </div>
    <div class="container">
        <h2>Daftar Calon Mahasiswa</h2>
        <div class="actions">
        <div class="inputs">
            <span class="mdi mdi-magnify"></span><input placeholder='Cari Calon Mahasiswa' type="text" id="cari" onkeyup="search()">
        </div>
        <div class="inputs">
            <span class="mdi mdi-filter"></span>
            <select name="" id="filter" onchange="search(this)">
                <option value="" selected>Semua</option>
                <option value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
                <option value="Diterima">Diterima</option>
                <option value="Ditolak">Ditolak</option>
                <option value="Lihat Bukti">Sudah Bayar</option>
                <option value="Tidak Ada">Belum Bayar</option>
            </select>
        </div>
        </div>

        <div class="items">
        <?php foreach ($data_mahasiswa as $row) {?>
                <?php
                    $approved = $row->approved;
                    $status = '';
                    $classStatus = '';
                    if ($approved == '0'){
                        $status = 'Ditolak';
                        $classStatus = 'denied';
                    } else if ($approved == '1'){
                        $status = 'Diterima';
                        $classStatus = 'accepted';
                    } else {
                    $status = 'Menunggu konfirmasi';
                    $classStatus ='wait';

                    }
                ?>
                <a href="<?= base_url('admin/user_detail/'.$row->mhs_id)?>">
                <div class="item <?= $classStatus?>">
                    <div class="item-no"><h3><?= $row->nomor_seleksi?></h3></div>
                    <div class="item-content">
                        <div class="row">
                            <h3>Nama</h3>
                            <p><?= $row->mhs_nama?></p>
                        </div>
                        <div class="row">
                            <h3>Nomor HP</h3>
                            <p><?= $row->no_hp?></p>
                        </div>
                        <div class="row">
                            <h3>Asal Sekolah</h3>
                            <p><?= $row->nama_sekolah?></p>
                        </div>
                        <div class="row">
                            <h3>Pilihan Jurusan</h3>
                            <p><?= $row->nama?></p>
                        </div>
                        <div class="row">
                            <h3>Reguler/Non Reguler</h3>
                            <p><?= $row->is_reguler?></p>
                        </div>
                        <div class="row">
                            <h3>Status</h3>
                            <p><?= $status?></p>
                        </div>
                        <div class="row bukti">
                            <h3>Transaksi</h3>
                            <?php if ($row->bukti_pembayaran) {?>
                                <a href="<?= base_url('main/lihat_bukti/'.$row->mhs_id.'/'.$row->mhs_nama.'/'.$row->nomor_seleksi)?>" class="btn-verif">Lihat</a>
                                <?php } else {?>
                                    <a class="btn-verif">Tidak Ada</a>
                                <?php }?>
                        </div>
                        <div class="row dokumen">
                        <h3>Dokumen</h3>
                            <a href="<?= base_url('main/lihat_dokumen/'.$row->mhs_id.'/'.$row->mhs_nama.'/'.$row->nomor_seleksi)?>" class="btn-verif">Lihat</a>
                        </div>

                        <div class="row buttons">
                        <?php if ($status != 'Menunggu konfirmasi') {?>
                        <a href="<?= base_url('admin/batal/'.$row->mhs_id)?>" class="btn">Batal</a>
                        <?php if ($status == 'Diterima'){?>
                            <a href="<?= base_url('admin/user_detail/'.$row->mhs_id.'/true')?>" class="btn">Cetak</a>
                        <?php }?>
                    <?php } else {?>
                        <a href="<?= base_url('admin/accept/'.$row->mhs_id)?>"  class="btn">Terima</a>
                        <a class="btn tolak" onclick="openModal('<?= $row->mhs_id?>')">Tolak</a>
                    <?php }?>
                        </div>
                    </div>
                </div>
        <?php }?>
        </div>
                </a>
                



    </div>

    <script>
        var modal = document.getElementById("modal");
        var imgModal = document.getElementById("pembayaran");
        var imgBukti = document.getElementById("imgBukti");
        var btns = document.querySelectorAll(".tolak");
        var form = document.getElementById("batal-form");
        var currId = ''




        function search(input = false){
            if (input) {
                input = input.value;
            } else {
                let input = document.getElementById("cari").value;
            }
            input = input.toLowerCase();
            let x = document.querySelectorAll(".item");

            for (i = 0; i < x.length; i++){
                if (!x[i].innerHTML.toLowerCase().includes(input)){
                    x[i].style.display = "none";
                } else {
                    x[i].style.display = "flex";
                }
            }

        }

        window.onclick = (event) => {
            if (event.target == modal || event.target == imgModal) {
                closeModal();
            }
        }


        function openModal(id){
            modal.style.display = "block";
            form.action = "<?= base_url('admin/deny/')?>" + id;
        }

        function closeModal(submit = false){
            modal.style.display = "none";
            imgModal.style.disply = "none";
            if (submit) {
                form.submit();
            }
        }

</script>

</body>
</html>