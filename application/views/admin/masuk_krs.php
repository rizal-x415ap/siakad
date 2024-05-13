<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Masuk Halaman KRS</h3>
                <p class="text-subtitle text-muted">Form masuk halaman KRS.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">KRS</a></li>
                        <li class="breadcrumb-item active" aria-current="page">masuk halalamn krs</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section d-flex gap-3">
        <div class="col-md-7 col-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form method="post" action="<?php echo base_url('admin/krs/krs_aksi') ?>" class="form form-horizontal">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="nim">NIM Mahasiswa </label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control  <?php echo form_error('nim') ? 'is-invalid' : ''; ?>" name="nim" placeholder="Masukan nim mahasiswa" id="nim">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person-vcard"></i>
                                                </div>
                                                <?php echo form_error('nim', '<div class="invalid-feedback"><i class="bx bx-radio-circle"></i>', '</div>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="tahun-akademik">Tahun Akademik / Semester</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <?php
                                                $query = $this->db->query('SELECT id_thn_akad, semester, CONCAT(tahun_akademik,"/") AS thn_semester FROM tahun_akademik');
                                                $dropdowns = $query->result();
                                                $dropDownList = array(
                                                    '' => 'Pilih Tahun Akademik' 
                                                );
                                                foreach ($dropdowns as $dropdown) {
                                                    if ($dropdown->semester == 'Ganjil') {
                                                        $tampilSemester = "Ganjil";
                                                    } else {
                                                        $tampilSemester = "Genap";
                                                    }
                                                    $dropDownList[$dropdown->id_thn_akad] = $dropdown->thn_semester . " " . $tampilSemester;
                                                }

                                                $dropdownAttributes = array(
                                                    'class' => 'form-control form-select '. (form_error('id_thn_akad') ? 'is-invalid' : ''),
                                                    'id' => 'tahun-akademik'
                                                );

                                                echo form_dropdown('id_thn_akad', $dropDownList, '', $dropdownAttributes);
                                                ?>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-calendar-check"></i>
                                                </div>
                                                <?php echo form_error('id_thn_akad', '<div class="invalid-feedback"><i class="bx bx-radio-circle"></i>', '</div>'); ?>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Proses</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Informasi</h4>
                </div>
                <div class="card-body">
                    <div class="card-content">
                        <p>Ini adalah form untuk memprose data mahasiswa yang akan di isi Kartu Rencana Studinya.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>