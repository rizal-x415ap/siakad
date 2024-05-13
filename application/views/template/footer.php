<footer>
    <div class="footer clearfix mb-0 text-muted ">
        <div class="float-start">
            <p>2023 &copy; Siakad</p>
        </div>
        <div class="float-end">
            <p>Made with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                by <a href="https://instagram.com/rizaall15_">Rizal</a></p>
        </div>
    </div>
</footer>
        </div>
    </div>
    <!-- Mengambil flashdata inputValidation error -->
    <div class="input-validasi" data-flashdata="<?php echo $this->session->flashdata('input'); ?>"></div>
<script src="<?php echo base_url('assets/dist');?>/assets/extensions/sweetalert2/sweetalert2.all.min.js"></script>

    <script src="<?php echo base_url('assets/dist');?>/assets/static/js/components/dark.js"></script>
    <script src="<?php echo base_url('assets/dist');?>/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    
    
    <script src="<?php echo base_url('assets/dist');?>/assets/compiled/js/app.js"></script>
    <script src="<?php echo base_url('assets/js');?>/myscript.js"></script>



    
<!-- Need: Apexcharts -->
<?php if($this->uri->segment(2) == 'dashboard'): ?>
<script src="<?php echo base_url('assets/dist');?>/assets/extensions/apexcharts/apexcharts.min.js"></script>
<script src="<?php echo base_url('assets/dist');?>/assets/static/js/pages/dashboard.js"></script>
<?php endif; ?>

</body>

</html>