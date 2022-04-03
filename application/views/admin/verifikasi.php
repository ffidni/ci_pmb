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
        <table border="1" cellspacing="0" id="verifikasi_table">
            <thead>
            <tr>
                <th scope="col">Nomor Seleksi</th>
                <th scope="col">Nomor HP</th>
                <th scope="col">Asal Sekolah</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Reguler/Non Reguler</th>
                <th scope="col">Status</th>
                <th scope="col">Dokumen</th>
                <th scope="col">Transaksi</th>
                <th scope="Aksi">Aksi</th>
            </tr>
            </thead>
            <tbody>
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
                    <td data-label="Nomor Seleksi"><?= $row->nomor_seleksi?></td>
                    <td data-label="Nomor HP"><?= $row->no_hp?></td>
                    <td data-label="Asal Sekolah"><?= $row->nama_sekolah?></td>
                    <td data-label="Jurusan"><?= $row->nama ?></td>
                    <td data-label="Reguler/Non Reguler"><?= $row->is_reguler?></td>
                    <td data-label="Status"><?= $status?></td>
                    <td data-label="Dokumen">
                            <a href="<?= base_url('main/lihat_dokumen/'.$row->mhs_id.'/'.$row->mhs_nama.'/'.$row->nomor_seleksi)?>" class="btn">Lihat</a>

                    </td>
                    <td data-label="Transaksi">
                    <?php if ($row->bukti_pembayaran) {?>
                                <a href="<?= base_url('main/lihat_bukti/'.$row->mhs_id.'/'.$row->mhs_nama.'/'.$row->nomor_seleksi)?>" class="btn">Lihat</a>
                                <?php } else {?>
                                    Belum Transaksi
                                <?php }?>
                    </td>
                    <td data-label="Aksi">
                    <?php if ($status != 'Menunggu konfirmasi') {?>
                        <a href="<?= base_url('admin/batal/'.$row->mhs_id)?>" class="btn">Batal</a>
                        <?php if ($status == 'Diterima'){?>
                            <a href="<?= base_url('admin/cetak/'.$row->mhs_id)?>" class="btn">Cetak</a>
                        <?php }?>
                        
                    <?php } else {?>
                        <a href="<?= base_url('admin/accept/'.$row->mhs_id)?>"  class="btn">Terima</a>
                        <a class="btn tolak" onclick="openModal('<?= $row->mhs_id?>')">Tolak</a>
                    <?php }?>
                    </td>


                </tr>
            <?php }?>
            </tbody>
        </table>
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
                input = input.value.toUpperCase();
            } else {
                input = document.getElementById("cari").value.toUpperCase();
            }
            let x = document.querySelectorAll(".item");

            table = document.getElementById("verifikasi_table");
            tbody = document.querySelector("tbody");
            tr = tbody.getElementsByTagName("tr");

            for (var i = 0; i < tr.length; i ++){
                var value = tr[i].innerHTML;
                if (value.toUpperCase().includes(input)){
                    tr[i].style.display = "table-row";
                } else {
                    tr[i].style.display = "none";
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