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
                        <?PHP
                        $semua_status = 'checked';
                        $aktif_status = 'unchecked';
                        $lulus_status = 'unchecked';
                        $mutasi_status = 'unchecked';

                        if (isset($_POST['Filter'])) {
                            $selected_radio = $_POST['status'];
                            if ($selected_radio == 'Aktif') {
                                $aktif_status = 'checked';
                            } else if ($selected_radio == 'Lulus') {
                                $lulus_status = 'checked';
                            } else if ($selected_radio == 'Mutasi') {
                                $mutasi_status = 'checked';
                            } else if ($selected_radio == 'Semua') {
                                $semua_status = 'checked';
                            }
                        }

                        if ($aktif_status == 'checked') {
                            echo <<<gfg
                            <script>alert('Data berhasil dipilih!');</script>
                            <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-info"></i> Info!</h4>
                            Data yang ditampilkan adalah <b> Data Siswa Aktif </b>
                            </div>
                            gfg;
                        } elseif ($lulus_status == 'checked') {
                            echo <<<gfg
                            <script>alert('Data berhasil dipilih!');</script>
                            <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-info"></i> Info!</h4>
                            Data yang ditampilkan adalah <b> Data Siswa Lulus </b>
                            </div>
                            gfg;
                        } elseif ($mutasi_status == 'checked') {
                            echo <<<gfg
                            <script>alert('Data berhasil dipilih!');</script>
                            <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-info"></i> Info!</h4>
                            Data yang ditampilkan adalah <b> Data Siswa Mutasi </b>
                            </div>
                            gfg;
                        } elseif ($aktif_status !== 'checked' || $mutasi_status !== 'checked' || $lulus_status !== 'checked') {
                            echo "Menampilkan data siswa keseluruhan";
                        }
                        ?>

                        <style>
                            input[type="radio"] {
                                visibility: hidden;
                                height: 0;
                                width: 0;
                            }

                            label {
                                cursor: pointer;
                            }

                            input:checked+label {
                                background: #d2d6de;
                                padding: 2px 6px;
                                border-radius: 3px;
                                margin: 3px 6px;
                            }
                        </style>

                        <form action="" method="post">

                            <Input type='Radio' Name='status' value='Semua' id="semua" <?PHP print $semua_status; ?>><label for="semua">Semua</label>

                            <Input type='Radio' Name='status' value='Aktif' id="aktif" <?PHP print $aktif_status; ?>><label for="aktif">Aktif</label>

                            <Input type='Radio' Name='status' value='Lulus' id="lulus" <?PHP print $lulus_status; ?>><label for="lulus">Lulus</label>

                            <Input type='Radio' Name='status' value='Mutasi' id="mutasi" <?PHP print $mutasi_status; ?>><label for="mutasi">Mutasi</label>

                            <button type="submit" class="btn btn-primary" name="Filter"><i class="fa fa-filter" aria-hidden="true"></i> Filter Data</button>
                        </form>
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

                                if ($aktif_status == 'checked') {
                                    $query = mysqli_query($link, "SELECT * FROM datasiswa WHERE status = 'Aktif'");
                                } elseif ($lulus_status == 'checked') {
                                    $query = mysqli_query($link, "SELECT * FROM datasiswa WHERE status = 'Lulus'");
                                } elseif ($mutasi_status == 'checked') {
                                    $query = mysqli_query($link, "SELECT * FROM datasiswa
                                     WHERE status = 'Mutasi'");
                                } elseif ($aktif_status !== 'checked' || $mutasi_status !== 'checked' || $lulus_status !== 'checked') {
                                    $query = mysqli_query($link, "SELECT * FROM datasiswa ORDER BY IDdatasiswa");
                                }


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