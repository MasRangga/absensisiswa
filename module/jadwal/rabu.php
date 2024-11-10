<?php
include "config/conn.php"; // Pastikan file koneksi ke database sudah di-include
?>
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><strong>Data Jadwal</strong></h3>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <ul class="nav nav-tabs">
                <li role="presentation"><a href="media.php?module=senin">Senin</a></li>
                <li role="presentation"><a href="media.php?module=selasa">Selasa</a></li>
                <li role="presentation" class="active"><a href="media.php?module=rabu">Rabu</a></li>
                <li role="presentation"><a href="media.php?module=kamis">Kamis</a></li>
                <li role="presentation"><a href="media.php?module=jumat">Jum'at</a></li>
            </ul>
            <br>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Hari</th>
                                <th class="text-center">Jam</th>
                                <th class="text-center">Kelas</th>
                                <th class="text-center">Guru</th>
                                <th class="text-center">Mata Pelajaran</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql = mysqli_query($conn, "
                                SELECT 
                                    jadwal.idj, 
                                    hari.nama_hari AS hari, 
                                    kelas.nama_kelas AS nama_kelas, 
                                    guru.nama AS nama_guru, 
                                    mata_pelajaran.nama_mata_pelajaran AS nama_mp, 
                                    jadwal.jam_mulai, 
                                    jadwal.jam_selesai 
                                FROM jadwal
                                JOIN hari ON jadwal.idh = hari.idh
                                JOIN kelas ON jadwal.idk = kelas.idk
                                JOIN guru ON jadwal.idg = guru.idg
                                JOIN mata_pelajaran ON jadwal.idm = mata_pelajaran.idm
                                WHERE jadwal.idh = 3
                                ORDER BY jadwal.jam_mulai
                            ");
                            while ($rs = mysqli_fetch_array($sql)) {
                            ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $rs['hari']; ?></td>
                                    <td><?php echo $rs['jam_mulai'] . ' - ' . $rs['jam_selesai']; ?></td>
                                    <td><?php echo $rs['nama_kelas']; ?></td>
                                    <td><?php echo $rs['nama_guru']; ?></td>
                                    <td><?php echo $rs['nama_mp']; ?></td>
                                    <td class="text-center">
                                        <!-- Edit -->
                                   
                                        <a href="././module/simpan.php?act=hapus_jadwal&idj=<?php echo $rs['idj']; ?>">
                                            <button type="button" class="btn btn-danger">Hapus</button>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
