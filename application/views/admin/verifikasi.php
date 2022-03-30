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
    <div id="modal" class="batal-popup">
        <div class="batal-content">
            <form id="batal-form" method="post">
                <span class="close" onclick="closeModal()">&times;</span>
                <h4>Alasan pembatalan</h4>
                <textarea name="alasan_pembatalan" id="" class="form-control form-textarea" cols="60" rows="10"></textarea>
                <div class="batal-buttons">
                    <input type="submit" class="btn batal-btn" onsubmit="return closeModal(true)">
                </div>
            </form>
        </div>  
    </div>
    <div class="container">
        <h2>Daftar Calon Mahasiswa</h2>
        <table border="1" cellspacing="0">
            <thead>
            <tr>
                <th scope="col">Nomor Seleksi</th>
                <th scope="col">Nomor HP</th>
                <th scope="col">Asal Sekolah</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Reguler/Non Reguler</th>
                <th scope="col">Status</th>
                <th scope="col">Verifikasi</th>
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
                    <?php if ($status != 'Menunggu konfirmasi') {?>
                        <td data-label="Verifikasi"><a href="<?= base_url('admin/batal/'.$row->mhs_id)?>" class="btn">Batal</a>
                        <?php if ($status == 'Diterima'){?>
                            <a href="<?= base_url('admin/cetak/'.$row->mhs_id)?>" class="btn">Cetak</a></td>
                        <?php }?>
                        
                    <?php } else {?>
                    <td data-label="Verifikasi">
                        <a href="<?= base_url('admin/accept/'.$row->mhs_id)?>"  class="btn">Terima</a>
                        <a class="btn tolak" onclick="openModal('<?= $row->mhs_id?>')">Tolak</a>
                    </td>
                    <?php }?>
                </tr>
            <?php }?>
            </tbody>

        </table>
    </div>

    <script>
        var modal = document.getElementById("modal");
        var btns = document.querySelectorAll(".tolak");
        var form = document.getElementById("batal-form");

        window.onclick = (event) => {
            if (event.target == modal) {
                closeModal();
            }
        }

        function openModal(id){
            modal.style.display = "block";
            form.action = "<?= base_url('admin/deny/')?>" + id;
        }

        function closeModal(submit = false){
            modal.style.display = "none";
            if (submit) {
                form.submit();
            }
        }

</script>

</body>
</html>