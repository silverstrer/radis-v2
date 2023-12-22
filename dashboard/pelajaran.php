<?php include "../conf/veriflogin.php"; ?>
<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Mata Pelajaran</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Setup</li>
            <li class="active">Mata Pelajaran</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Tambah Data Pelajaran</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="../conf/proses-tambahpelajaran.php">
                        <?php
                        include "../conf/conn.php";
                        $no = 0;
                        $query_kelas = mysqli_query($link, 'SELECT * FROM kelas;');
                        ?>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="pelajaran">Mata Pelajaran</label>
                                        <input type="text" class="form-control" id="pelajaran" name="pelajaran">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="kelas">Kelas</label>
                                        <select class="form-control" id="kelas" name="IDkelas">
                                            <option value="">PILIH KELAS:</option>
                                            <?php while ($row_kelas = mysqli_fetch_array($query_kelas)) { ?>
                                                <option value="<?php echo $row_kelas['IDkelas']; ?>"><?php echo $row_kelas['kelas']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary" name="add">Tambah Data</button>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div><!--/.col (left) -->

            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Mata Pelajaran</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Kelas</th>
                                    <th colspan="6">Kompetensi Dasar</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include_once "../conf/conn.php";
                                $no = 0;
                                $query = mysqli_query($link, 'SELECT *
                                FROM kelas
                                INNER JOIN pelajaran ON kelas.IDkelas=pelajaran.IDkelas;');
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no = $no + 1; ?></td>
                                        <td><?php echo $row['namapelajaran']; ?></td>
                                        <td><?php echo $row['kelas']; ?></td>
                                        <td>
                                            <div class="form-group">(1)
                                                <input type="checkbox" class="flat-red" <?php if ($row['kd1'] !== "") {
                                                                                            echo "checked";
                                                                                        }  ?> disabled />
                                        </td>
                                        <td>
                                            <div class="form-group">(2)
                                                <input type="checkbox" class="flat-red" <?php if ($row['kd2'] !== "") {
                                                                                            echo "checked";
                                                                                        }  ?> disabled />
                                        </td>
                                        <td>
                                            <div class="form-group">(3)
                                                <input type="checkbox" class="flat-red" <?php if ($row['kd3'] !== "") {
                                                                                            echo "checked";
                                                                                        }  ?> disabled />
                                        </td>
                                        <td>
                                            <div class="form-group">(4)
                                                <input type="checkbox" class="flat-red" <?php if ($row['kd4'] !== "") {
                                                                                            echo "checked";
                                                                                        }  ?> disabled />
                                        </td>
                                        <td>
                                            <div class="form-group">(5)
                                                <input type="checkbox" class="flat-red" <?php if ($row['kd5'] !== "") {
                                                                                            echo "checked";
                                                                                        }  ?> disabled />
                                        </td>
                                        <td>
                                            <div class="form-group">(6)
                                                <input type="checkbox" class="flat-red" <?php if ($row['kd6'] !== "") {
                                                                                            echo "checked";
                                                                                        }  ?> disabled />
                                        </td>

                                        <td>
                                            <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal<?php echo $row['IDpelajaran']; ?>">Detail</a>
                                            <!-- MODAL POP UP -->
                                            <div class="modal fade" id="modal<?php echo $row['IDpelajaran']; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title">Detail Mata Pelajaran</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form role="form" method="post" action="../conf/ubah-pelajaran.php">
                                                                <div class="box-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="pelajaran">Mata Pelajaran</label>
                                                                                <input type="text" class="form-control" id="pelajaran" name="namapelajaran" value="<?php echo $row['namapelajaran']; ?>">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="kelas">Kelas</label>
                                                                                <?php
                                                                                include "../conf/conn.php";
                                                                                $no = 0;
                                                                                $query_kelas = mysqli_query($link, 'SELECT * FROM kelas;');
                                                                                ?>
                                                                                <select class="form-control" id="kelas" name="IDkelas">

                                                                                    <!-- DEFAULT ANSWER -->
                                                                                    <option default value="<?php echo $row['IDkelas']; ?>"><?php echo $row['kelas']; ?></option>
                                                                                    <!-- DEFAULT ANSWER -->

                                                                                    <?php while ($row_kelas = mysqli_fetch_array($query_kelas)) { ?>
                                                                                        <option value="<?php echo $row_kelas['IDkelas']; ?>"><?php echo $row_kelas['kelas']; ?></option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="kd1">Kompetensi Dasar 1</label>
                                                                                <textarea cols="60" rows="4" id="kd1" name="kd1" maxlength="255"><?php echo $row['kd1']; ?></textarea>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="kd2">Kompetensi Dasar 2</label>
                                                                                <textarea cols="60" rows="4" id="kd2" name="kd2" maxlength="255"><?php echo $row['kd2']; ?></textarea>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="kd3">Kompetensi Dasar 3</label>
                                                                                <textarea cols="60" rows="4" id="kd3" name="kd3" maxlength="255"><?php echo $row['kd3']; ?></textarea>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="kd4">Kompetensi Dasar 4</label>
                                                                                <textarea cols="60" rows="4" id="kd4" name="kd4" maxlength="255"><?php echo $row['kd4']; ?></textarea>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="kd5">Kompetensi Dasar 5</label>
                                                                                <textarea cols="60" rows="4" id="kd5" name="kd5" maxlength="255"><?php echo $row['kd5']; ?></textarea>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="kd6">Kompetensi Dasar 6</label>
                                                                                <textarea cols="60" rows="4" id="kd6" name="kd6" maxlength="255"><?php echo $row['kd6']; ?></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" class="form-control" id="IDpelajaran" name="IDpelajaran" value="<?php echo $row['IDpelajaran']; ?>">
                                                                </div><!-- /.box-body -->
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                                                                    <button type="submit" class="btn btn-primary" name="ubah">Simpan Perubahan</button>
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- / MODAL POP UP -->

                                            <a class="btn btn-sm btn-danger" href="../conf/hapus_pelajaran.php?id=<?= $row['IDpelajaran']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?');">Hapus</a>
                                        </td>
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