<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Kartu Rencana Studi (KRS)</h3>
                <?php echo validation_errors(); ?>
                <p class="text-subtitle text-muted">List krs.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/krs') ?>"><?= $this->uri->segment(2) ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page">data krs</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section d-flex gap-3">
        <div class="col-md-8 col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#tambah-data" class="btn  btn-outline-success font-bold"><i class="bi bi-clipboard-plus-fill"></i> Tambah Data KRS</button>
                        <?php echo anchor('admin/krs/print', '<button class="btn btn-outline-info font-bold"><i class="bi bi-printer-fill"></i> Print</button>', array('target' => '_blank')); ?>
                    </div>
                </div>
                <div class="card-content">
                    <!-- table striped -->
                    <div class="table-responsive">
                        <table class="table table-striped table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Matakuliah</th>
                                    <th>Nama Matakuliah</th>
                                    <th>SKS</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($krs_data)) : ?>
                                    <tr>
                                        <td colspan="5">
                                            <h5 class="text-center">Tidak ada data yang ditemukan!</h5>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <?php
                                $no = 1;
                                $jumlahSks = 0;
                                foreach ($krs_data as $krs) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $krs->kode_matakuliah ?></td>
                                        <td><?= $krs->nama_matakuliah ?></td>
                                        <td><?= $krs->sks;
                                            $jumlahSks += $krs->sks; ?></td>
                                        <td class="ps-0">
                                            <div class="d-flex flex-column flex-sm-row justify-content-start align-items-start">
                                                <?php echo anchor('admin/krs/edit/' . $krs->id_krs, '<div class="btn btn-sm btn-primary me-1 mb-1 rounded-pill"><i class="bi bi-pencil-fill"></i></i></div>') ?>
                                                <a class="btn btn-sm btn-danger rounded-pill tombol-hapus" href="<?= base_url('admin/krs/hapus/') . $krs->id_krs ?>"><i class="bi bi-trash2-fill"></i></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td> <?php echo anchor('admin/krs', '<button type="button" class="btn btn-warning btn-sm me-1 mb-1">Kembali</button>') ?>
                                    </td>
                                    <td colspan="2" align="right"><strong>Jumlah SKS</strong> </td>
                                    <td colspan="1"><strong><?php echo $jumlahSks; ?></strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Kartu Rencana Studi</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td><strong>NIM</strong></td>
                                <td>:</td>
                                <td><?php echo $nim ?></td>
                            </tr>
                            <tr>
                                <td><strong>Nama Lengkap</strong></td>
                                <td>:</td>
                                <td><?php echo $nama_lengkap ?></td>
                            </tr>
                            <tr>
                                <td><strong>Program Studi</strong></td>
                                <td>:</td>
                                <td><?php echo $prodi ?></td>
                            </tr>
                            <tr>
                                <td><strong>Tahun Akademik</strong></td>
                                <td>:</td>
                                <td><?php echo $tahun_akademik . '&nbsp;(' . $semester . ')' ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!--tambah data form Modal -->

<div class="modal fade text-left" id="tambah-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Form tambah Program Studi </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-circle-fill text-danger"></i>
                </button>
            </div>
            <form id="myForm" method="post" action="<?php echo base_url('admin/krs/tambah_krs') ?>">
                <input name="id_thn_akad" value="<?php echo $id_thn_akad ?>" type="hidden">
                <input name="id_krs" value="<?php echo $id_krs ?>" type="hidden">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="tahun-akademik">Tahun Akademik</label>
                                <div class="position-relative">
                                    <input name="thn_akad_smt" value="<?php echo $tahun_akademik . '/' . $semester; ?>" type="text" class="form-control" readonly id="tahun-akademik">
                                    <div class="form-control-icon">
                                        <i class="bi bi-calendar-check"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="nim">Nim Mahasiswa</label>
                                <div class="position-relative">
                                    <input name="nim" value="<?php echo $nim; ?>" type="text" class="form-control" readonly id="nim">
                                    <div class="form-control-icon">
                                        <i class="bi bi-person-vcard"></i>
                                    </div>
                                    <?php echo form_error('nim', '<div class="invalid-feedback"><i class="bx bx-radio-circle"></i>', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="nama-matakuliah">Matakuliah</label>
                                <div class="position-relative">
                                    <?php
                                    $query = $this->db->query('SELECT kode_matakuliah, nama_matakuliah FROM matakuliah');
                                    $dropdowns = $query->result();
                                    $dropDownList = array(
                                        '' => 'Pilih Matakuliah'
                                    );
                                    foreach ($dropdowns as $dropdown) {
                                        $dropDownList[$dropdown->kode_matakuliah] = $dropdown->nama_matakuliah;
                                    }

                                    $dropdownAttributes = array(
                                        'class' => 'form-control form-select ' . (form_error('kode_matakuliah') ? 'is-invalid' : ''),
                                        'id' => 'tahun-akademik'
                                    );

                                    echo form_dropdown('kode_matakuliah', $dropDownList, $kode_matakuliah, $dropdownAttributes);
                                    ?>
                                    <div class="form-control-icon">
                                        <i class="bi bi-journal-bookmark"></i>
                                    </div>
                                    <?php echo form_error('kode_matakuliah', '<div class="invalid-feedback"><i class="bx bx-radio-circle"></i>', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success me-1 mb-1">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>