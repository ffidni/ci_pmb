<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('assets/homepage/css/dokumen.css')?>">
</head>
<body>
<?php 
    $detail_pendaftaran = $this->Form_model->get_details((isset($lihat_dokumen)) ? $lihat_dokumen['id'] : $_SESSION['mhs_id'])->row_array();
        $_SESSION['detail_pendaftaran'] = $detail_pendaftaran;

        if (!file_exists(str_replace(base_url(), './', $detail_pendaftaran['pas_foto']))){
            $detail_pendaftaran['pas_foto'] = ""; 
        }
        if (!file_exists(str_replace(base_url(), './', $detail_pendaftaran['ktp']))){
            $detail_pendaftaran['ktp'] = ""; 
        }
        if (!file_exists(str_replace(base_url(), './', $detail_pendaftaran['kartu_keluarga']))){
            $detail_pendaftaran['kartu_keluarga'] = ""; 
        }
        if (!file_exists(str_replace(base_url(), './', $detail_pendaftaran['ijazah']))){
            $detail_pendaftaran['ijazah'] = ""; 
        }
    ?>
    <div class="dokumen-container">
        <div class="title">
            <span class="mdi mdi-file-link-outline"></span>
            <h3>Kelengkapan Dokumen <?= (isset($lihat_dokumen)) ? '<br>'.$lihat_dokumen['title'] : '' ?></h3>
            <?= (isset($error)) ? $error : ''?>
            <div class="buttons">
                        <a class="btn" href="<?= base_url('admin/verifikasi')?>">Kembali</a>
            </div>
        </div>
        <div class="docs">
            <div class="doc">
                <?= form_open_multipart(base_url('main/upload_dokumen'), array("id" => "pas_foto_form"))?>
                <div class="img">
                    <object data="<?= $detail_pendaftaran['pas_foto']?>" id="pas_foto_output" class="pas-foto <?= ($detail_pendaftaran['pas_foto']) ? 'show-doc' : 'hide-doc'?>"></object>
                    <span class="mdi mdi-account-box-outline <?= ($detail_pendaftaran['pas_foto']) ? 'hide-doc' : 'show-doc'?>"></span>
                </div>
                <h4>PAS Foto</h4>
                <p class="<?= ($detail_pendaftaran['pas_foto']) ? 'lengkap' : 'belum-lengkap'?>"><?= ($detail_pendaftaran['pas_foto']) ? 'Lengkap': 'Belum Lengkap'?></p>
                <div class="buttons">
                <?php if (!isset($lihat_dokumen)) {?>
                    <label for="pas_foto_input" class="btn">Unggah</label>
                    <input type="file" name="pas_foto" id="pas_foto_input" class="btn unggah" accept="image/*" onchange="loadFile(event, 'pas_foto_output', 'pas_foto_form')">
                <?php }?>
                <?php if ($detail_pendaftaran['pas_foto']) {?>
                    <a class="btn" href="<?= $detail_pendaftaran['pas_foto']?>" target="_blank">Buka</a>
                    <a href="<?= $detail_pendaftaran['pas_foto']?>" class="btn" download>Unduh</a>
                <?php }?>
                </div>

                </form>
            </div>
            <div class="doc">
                <?= form_open_multipart(base_url('main/upload_dokumen'), array("id" => "ktp_form"))?>
                <div class="img">
                    <object data="<?= $detail_pendaftaran['ktp']?>" alt="" id="ktp_output" class="<?= ($detail_pendaftaran['ktp']) ? 'show-doc' : 'hide-doc'?>">
                    <span class="mdi mdi-credit-card-chip-outline"></span>
                </object>
                    <span class="mdi mdi-credit-card-chip-outline <?= ($detail_pendaftaran['ktp']) ? 'hide-doc' : 'show-doc'?>"></span>
                </div>
                <h4>KTP</h4>
                <p class="<?= ($detail_pendaftaran['ktp']) ? 'lengkap' : 'belum-lengkap'?>"><?= ($detail_pendaftaran['ktp']) ? 'Lengkap': 'Belum Lengkap'?></p>
                <div class="buttons">
                <?php if (!isset($lihat_dokumen)) {?>
                <label for="ktp_input" class="btn">Unggah</label>
                <input type="file" name="ktp" id="ktp_input" class="btn unggah" accept="image/*" onchange="loadFile(event, 'ktp_output', 'ktp_form')">
                <?php }?>
                <?php if ($detail_pendaftaran['ktp']) {?>
                    <a class="btn" href="<?= $detail_pendaftaran['ktp']?>" target="_blank">Buka</a>
                    <a href="<?= $detail_pendaftaran['ktp']?>" class="btn" download>Unduh</a>
                <?php }?>
                </div>

                </form>
            </div>
            <div class="doc">
            <?= form_open_multipart(base_url('main/upload_dokumen'), array("id" => "kk_form"))?>
                <div class="img">
                    <object data="<?= $detail_pendaftaran['kartu_keluarga']?>" alt="" id="kk_output" class="<?= ($detail_pendaftaran['kartu_keluarga']) ? 'show-doc' : 'hide-doc'?>"><span class="mdi mdi-book-open-outline"></span></object>
                    <span class="mdi mdi-book-open-outline <?= ($detail_pendaftaran['kartu_keluarga']) ? 'hide-doc' : 'show-doc'?>"></span>
                </div>
                <h4>Kartu Keluarga</h4>
                <p class="<?= ($detail_pendaftaran['kartu_keluarga']) ? 'lengkap' : 'belum-lengkap'?>"><?= ($detail_pendaftaran['kartu_keluarga']) ? 'Lengkap': 'Belum Lengkap'?></p>
                <div class="buttons">
                <?php if (!isset($lihat_dokumen)) {?>
                    <label for="kk_input" class="btn">Unggah</label>
                    <input type="file" name="kartu_keluarga" id="kk_input" class="btn unggah" accept="image/*" onchange="loadFile(event, 'kk_output', 'kk_form')">
                <?php }?>
                <?php if ($detail_pendaftaran['kartu_keluarga']) {?>
                    <a class="btn" href="<?= $detail_pendaftaran['kartu_keluarga']?>" target="_blank">Buka</a>
                    <a href="<?= $detail_pendaftaran['kartu_keluarga']?>" class="btn" download>Unduh</a>
                <?php }?>
                </div>
            </form>
            </div>
            <div class="doc">
            <?= form_open_multipart(base_url('main/upload_dokumen'), array("id" => "ijazah_form"))?>
                <div class="img">
                    <object data="<?= $detail_pendaftaran['ijazah']?>" alt="" id="ijazah_output" class="<?= ($detail_pendaftaran['ijazah']) ? 'show-doc' : 'hide-doc'?>"><span class="mdi mdi-book-account-outline"></span></object>
                    <span class="mdi mdi-book-account-outline <?= ($detail_pendaftaran['ijazah']) ? 'hide-doc' : 'show-doc'?>"></span>
                </div>
                <h4>Ijazah</h4>
                <p class="<?= ($detail_pendaftaran['ijazah']) ? 'lengkap' : 'belum-lengkap'?>"><?= ($detail_pendaftaran['ijazah']) ? 'Lengkap': 'Belum Lengkap'?></p>
                <div class="buttons">
                <?php if (!isset($lihat_dokumen)) {?>
                <label for="ijazah_input" class="btn">Unggah</label>
                <input type="file" name="pas_foto" id="ijazah_input" class="btn unggah" accept="image/*" onchange="loadFile(event, 'ijazah_output', 'ijazah_form')">
                <?php }?>
                <?php if ($detail_pendaftaran['ijazah']) { ?>
                    <a class="btn" href="<?= $detail_pendaftaran['ijazah']?>" target="_blank">Buka</a>
                    <a href="<?= $detail_pendaftaran['ijazah']?>" class="btn" download>Unduh</a>
                <?php }?>
                </div>
            </div>
        </form>
        </div>
    </div>

    <script>
        

        var loadFile = (event, outputID, formID) => {
            var output = document.getElementById(outputID);
            var form = document.getElementById(formID); 
            form.submit();
        }
    </script>
    
</body>
</html>