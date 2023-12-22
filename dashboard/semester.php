<?php include "../conf/veriflogin.php"; ?>
<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Semester</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li>Setup</li>
            <li class="active">Semester</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Tambah Data Semester</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="../conf/proses-tambahsemester.php">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tahunpelajaran">Tahun Pelajaran</label>
                                        <input type="text" class="form-control" id="tahunpelajaran" name="tahun" placeholder="contoh: 2023/2024">
                                    </div>
                                    <div class="form-group">
                                        <label for="semester">Semester</label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="semester" id="ganjil" value="Ganjil">
                                                Ganjil
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="semester" id="genap" value="Genap">
                                                Genap
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="titimangsa">Titi mangsa</label>
                                        <input type="text" class="form-control" id="titimangsa" placeholder="contoh: Tangerang, 1 Juli 2023" name="titimangsa">
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
                        <h3 class="box-title">Data Semester</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tahun Pelajaran</th>
                                    <th>Semester</th>
                                    <th>Titimangsa</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include_once "../conf/conn.php";
                                $no = 0;
                                $query = mysqli_query($link, 'SELECT * FROM semester ORDER BY IDsemester');
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no = $no + 1; ?></td>
                                        <td><?php echo $row['tahun']; ?></td>
                                        <td><?php echo $row['semester']; ?></td>
                                        <td><?php echo $row['titimangsa']; ?></td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal<?php echo $row['IDsemester']; ?>">Ubah</a>
                                            <!-- MODAL POP UP -->
                                            <div class="modal fade" id="modal<?php echo $row['IDsemester']; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title">Ubah Data</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form role="form" method="post" action="../conf/ubah-semester.php">
                                                                <div class="box-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="tahunpelajaran">Tahun Pelajaran</label>
                                                                                <input type="text" class="form-control" id="tahunpelajaran" name="tahun" placeholder="contoh: 2023/2024" value="<?php echo $row['tahun']; ?>">
                                                                            </div>
                                                                            <br>
                                                                            <div class="form-group">
                                                                                <label for="semester">Semester</label>
                                                                                <select class="form-control" id="semester" name="semester">
                                                                                    <option><?php echo $row['semester']; ?></option>
                                                                                    <option value="Ganjil">Ganjil</option>
                                                                                    <option value="Genap">Genap</option>
                                                                                </select>
                                                                            </div>
                                                                            <br>
                                                                            <div class="form-group">
                                                                                <label for="titimangsa">Titi mangsa</label>
                                                                                <input type="text" class="form-control" id="titimangsa" placeholder="contoh: Tangerang, 1 Juli 2023" name="titimangsa" value="<?php echo $row['titimangsa']; ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" class="form-control" id="IDsemester" name="IDsemester" value="<?php echo $row['IDsemester']; ?>">
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

                                            <a class="btn btn-sm btn-danger" href="../conf/hapus_semester.php?id=<?= $row['IDsemester']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?');">Hapus</a>
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