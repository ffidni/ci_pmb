<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/style.css')?>">
</head>
<body>
    <?php $update_status = $this->session->flashdata("update_status")?>
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

    <div class="notif" id="notif">
        <div class="content">
            <p><?= (isset($update_status) && $update_status != -1) ? "Data akun berhasil diperbarui." : "Memperbarui akun gagal. Pastikan anda terkoneksi dengan internet."?></p>
        </div>
    </div>

    <div id="pembayaran" class="popup">
        <div class="img-content">
            <img id="imgBukti" src="" alt="">
        </div>
    </div>
    <div class="container tab">
        <div class="tab-links">
            <button class="tab-link active-tab" onclick="openTab(event, 'daftar_pengguna')">Daftar Pengguna</button>
            <button class="tab-link" onclick="openTab(event, 'daftar_mahasiswa')">Daftar Calon Mahasiswa</button>
        </div>
        <div class="tab-content active" id="daftar_pengguna">
        <h2>Daftar Pengguna</h2>
        <div class="actions">
        <div class="inputs">
            <span class="mdi mdi-magnify"></span><input placeholder='Cari Pengguna' type="text" id="cariAkun" onkeyup="search('cariAkun', 'pengguna_table')">
        </div>
        <div class="inputs">
            <span class="mdi mdi-filter"></span>
            <select name="" id="filterAkun" onchange="search('cariAkun', 'pengguna_table', this.value)">
                <option value="" selected>Semua</option>
                <option value="Belum Daftar">Belum Daftar</option>
                <option value="Sudah Daftar">Sudah Daftar</option>
            </select>
        </div>
        </div>


        <div class="items">
            <table border="1" cellspacing="0" id="pengguna_table">
                <thead>
                    <tr>
                        <th scope="col">Nomor HP</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_pengguna as $row) {?>
                        <?php if ($row->hak_akses != 'admin') { ?>
                            <tr>
                                <td data-label="Nomor HP"><?= $row->no_hp?></td>
                                <td data-label="Email"><?= $row->email?></td>
                                <td data-label="Status" class="<?= ($row->mhs_id) ? 'sudah-daftar' : 'belum-daftar' ?>"><?= ($row->mhs_id) ? 'Sudah Daftar' : 'Belum Daftar' ?></td>
                                <td data-label="Aksi">
                                    <div class="buttons">
                                    <a href="<?= base_url('admin/reset_password/'.$row->id)?>" class="btn">Reset Password</a>
                                    </div>
                                </td>
                            </tr>
                        <?php }?>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="tab-content" id="daftar_mahasiswa">
        <h2>Daftar Calon Mahasiswa</h2>
        <div class="actions">
        <div class="inputs">
            <span class="mdi mdi-magnify"></span><input placeholder='Cari Calon Mahasiswa' type="text" id="cari" onkeyup="search('cari', 'verifikasi_table')">
        </div>
        <div class="inputs">
            <span class="mdi mdi-filter"></span>
            <select name="" id="filter" onchange="search('cari', 'verifikasi_table', this.value)">
                <option value="" selected>Semua</option>
                <option value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
                <option value="Diterima">Diterima</option>
                <option value="Ditolak">Ditolak</option>
                <option value="Bukti">Sudah Bayar</option>
                <option value="Belum Bayar">Belum Bayar</option>
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
                <th scope="col">Aksi</th>
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
                                <a href="<?= base_url('main/lihat_bukti/'.$row->mhs_id.'/'.$row->mhs_nama.'/'.$row->nomor_seleksi)?>" class="btn">Bukti</a>
                                <?php } else {?>
                                    Belum Bayar
                                <?php }?>
                    </td>
                    <td data-label="Aksi">
                        <div class="buttons aksi-btn">
                        <a href="<?= base_url('admin/user_detail/'.$row->mhs_id)?>" class="btn">Detail</a>

                        <?php if ($status != 'Menunggu konfirmasi') {?>
                            <a href="<?= base_url('admin/batal/'.$row->mhs_id)?>" class="btn">Batal</a>
                            <?php if ($status == 'Diterima'){?>
                                <a href="<?= base_url('admin/user_detail/'.$row->mhs_id.'/'.'cetak')?>" class="btn">Cetak</a>
                            <?php }?>
                            
                        <?php } else {?>
                            <a href="<?= base_url('admin/accept/'.$row->mhs_id)?>"  class="btn">Terima</a>
                            <a class="btn tolak" onclick="openModal('<?= $row->mhs_id?>')">Tolak</a>
                        <?php }?>
                                                </div>

                    </td>


                </tr>
            <?php }?>
            </tbody>
        </table>
        </div>
    </div>


    <script>
            <?php if (isset($update_status)) {?> 
                var notif = document.getElementById("notif");
                <?php if ($update_status == -1){?>
                    notif.style.backgroundColor = "rgb(206, 103, 103)";
                    notif.style.border = "rgb(169, 85, 85)";
                <?php }?>
                notif.style.display = "block";
                var count = 1
                var interval = setInterval(() => {
                    if (count === 2) {
                        clearInterval(interval);
                        notif.style.display = "none";
                        count = 1;
                    } else {
                        count++;
                    }
                }, 2000);
            <?php }?>
        
            notif.addEventListener("click", () => {
                notif.style.display = "none";
            })
        var modal = document.getElementById("modal");
        var imgModal = document.getElementById("pembayaran");
        var imgBukti = document.getElementById("imgBukti");
        var btns = document.querySelectorAll(".tolak");
        var form = document.getElementById("batal-form");
        var currId = ''

        function openTab(event, tab){
              var tab_content, tab_links;

              tab_content = document.querySelectorAll(".tab-content");
              tab_content.forEach((content) => {
                  content.style.display = "none";
              });

              tab_links = document.querySelectorAll(".tab-link");
              tab_links.forEach((links) => {
                  links.classList.remove("active-tab");
              });
              
              document.getElementById(tab).style.display = "block";
              if (event) {
              event.currentTarget.classList.add("active-tab");
              }
              window.scrollTo(0,0);
              

          }


        function search(inputName, tableName, filter = ''){
            let input = document.getElementById(inputName).value.toUpperCase();
            let x = document.querySelectorAll(".item");

            filter = filter.toUpperCase();
            table = document.getElementById(tableName);
            tbody = table.querySelector("tbody");
            tr = tbody.getElementsByTagName("tr");
            
            console.log(tableName);
            for (var i = 0; i < tr.length; i ++){
                var value = tr[i].innerHTML;
                if (value.toUpperCase().includes(input) && value.toUpperCase().includes(filter)){
                    tr[i].style.display = "";
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