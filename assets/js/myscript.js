// Toastify Sweet Alert
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 5000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

// Fungsi untuk menampilkan Toast sesuai dengan jenisnya
function showToast(icon, title) {
    Toast.fire({
        icon: icon,
        title: title
    });
}


// Ambil data dari atribut dalam elemen HTML
const inputValidasi = $('.input-validasi').data('flashdata');
$(document).ready(function(){
    if (inputValidasi){
        $('#tambah-data').modal('show');
        showToast('warning', inputValidasi);
    }
});

// Ambil data dari atribut dalam elemen HTML
const flashType = $('.flash-data').data('type');
const flashMessage = $('.flash-data').data('message');
// Periksa apakah ada data yang diterima
if (flashType && flashMessage) {
    // Tampilkan pesan sesuai dengan jenisnya
    if (flashType === 'success') {
        Swal.fire({
            title: 'Sukses!',
            text: flashMessage,
            icon: 'success',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                showToast('success', flashMessage);
            }
        });
    } else if (flashType === 'error') {
        Swal.fire({
            title: 'Error!',
            text: flashMessage,
            icon: 'error'
        }).then((result) => {
            if (result.isConfirmed) {
                showToast('error', flashMessage);
            }
        });
    }
}

//tombol

$('.tombol-hapus').on('click', function(e){
    e.preventDefault();
    const href = $(this).attr('href');
    const namaNavigasi = $('.uri-data').data('uri');


    Swal.fire({
        title: "Apakah kamu yakin?",
        text: "Ingin menghapus data "+ namaNavigasi,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#435ebe",
        cancelButtonColor: "#dc3545",
        confirmButtonText: "Ya, hapus data!"
      }).then((result) => {
        if (result.isConfirmed) {
          document.location.href = href;
        }
      });
});
