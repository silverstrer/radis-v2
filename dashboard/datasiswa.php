<?php include "../conf/veriflogin.php"; ?>
<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Data Siswa</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Data Pokok</li>
            <li class="active">Data Siswa</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Tambah Data Siswa</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="../conf/proses-tambahsiswa.php">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="namasekolah">Nama Sekolah</label>
                                        <input type="text" class="form-control" id="namasekolah" name="namasekolah">
                                    </div>
                                    <div class="form-group">
                                        <label for="namakepsek">Nama Kepala Sekolah</label>
                                        <input type="text" class="form-control" id="namakepsek" name="namakepsek">
                                    </div>
                                    <div class="form-group">
                                        <label for="nipkepsek">NIP Kepala Sekolah</label>
                                        <input type="text" class="form-control" id="nipkepsek" name="nipkepsek">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tahunpelajaran">Tahun Pelajaran</label>
                                        <input type="text" class="form-control" id="tahunpelajaran" name="tahun" placeholder="contoh: 2023/2024">
                                    </div>
                                    <div class="form-group">
                                        <label for="semester">Semester</label>
                                        <select class="form-control" id="semester" name="semester">
                                            <option value="">PILIH SEMESTER:</option>
                                            <option value="Ganjil">Ganjil</option>
                                            <option value="Genap">Genap</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="titimangsa">Titi mangsa</label>
                                        <input type="text" class="form-control" id="titimangsa" placeholder="contoh: Tangerang, 1 Juli 2023" name="titimangsa">
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">

                            <button type="submit" class="btn btn-primary" name="add"><i class="fa fa-plus-square" aria-hidden="true"></i> Tambah Data</button>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div><!--/.col (left) -->

            <!-- START CUSTOM TABS -->
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"> Data Siswa</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>TAHUN MASUK</th>
                                    <th>NIS</th>
                                    <th>NISN</th>
                                    <th>NAMA SISWA</th>
                                    <th>L/P</th>
                                    <th>KELAS</th>
                                    <th>STATUS</th>
                                    <th>NAMA AYAH</th>
                                    <th>NAMA IBU</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include_once "../conf/conn.php";
                                $no = 0;
                                $query = mysqli_query($link, 'SELECT * FROM datasiswa ORDER BY IDdatasiswa');
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no = $no + 1; ?></td>
                                        <td><?php echo $row['tahunmasuk']; ?></td>
                                        <td><?php echo $row['nis']; ?></td>
                                        <td><?php echo $row['nisn']; ?></td>
                                        <td><a href="index.php?page=profilsiswa&IDdatasiswa=<?= $row['IDdatasiswa']; ?>" title="Lihat Data"><i class="fas trash-o font-light"></i><?php echo $row['nama']; ?></a></td>
                                        <td><?php echo $row['kelamin']; ?></td>
                                        <td><?php echo $row['kelas']; ?></td>
                                        <td><?php echo $row['status']; ?></td>
                                        <td><?php echo $row['namaayah']; ?></td>
                                        <td><?php echo $row['namaibu']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->

        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->