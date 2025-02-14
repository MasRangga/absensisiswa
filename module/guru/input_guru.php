<?php
include 'config/conn.php'; // Pastikan koneksi database disertakan

if ($_GET['act'] == "input") {
?>
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><strong>Input Data Guru</strong></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Input Data Guru</div>
                <div class="panel-body">
                    <div class="row">
                        <form method="post" role="form" action="././module/simpan.php?act=input_guru">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>NIP</label>
                                    <input class="form-control" placeholder="NIP" name="nip">
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input class="form-control" placeholder="Nama" name="nama">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="jk" value="L" checked>Laki - Laki
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="jk" value="P">Perempuan
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" placeholder="Alamat" name="alamat" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" placeholder="Password" name="k_password" type="password">
                                </div>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
} 

if ($_GET['act'] == "edit_guru") {
?>
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><strong>Edit Data Guru</strong></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Edit Data Guru</div>
                <div class="panel-body">
                    <div class="row">
                        <?php
                        // Menggunakan mysqli_query untuk query
                        $sql = mysqli_query($conn, "SELECT * FROM guru WHERE idg='{$_GET['idg']}'");
                        $rs = mysqli_fetch_array($sql);
                        ?>
                        <form method="post" role="form" action="././module/simpan.php?act=edit_guru">
                            <input type="hidden" name="idg" value="<?php echo $_GET['idg']; ?>" />
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>NIP</label>
                                    <input class="form-control" required placeholder="NIP" name="nip" value="<?php echo $rs['nip']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input class="form-control" placeholder="Nama" name="nama" value="<?php echo $rs['nama']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <?php if ($rs['jk'] == "L") { ?>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="jk" value="L" checked>Laki - Laki
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="jk" value="P">Perempuan
                                            </label>
                                        </div>
                                    <?php } else { ?>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="jk" value="L">Laki - Laki
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="jk" value="P" checked>Perempuan
                                            </label>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" placeholder="Alamat" name="alamat" rows="3"><?php echo $rs['alamat']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" placeholder="Password" name="k_password" type="password">
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
} 
?>
