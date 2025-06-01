  <footer class="main-footer">
    <div class="float-right d-none d-sm-inline">
      Desain By: Malas Coding
    </div>
    <strong>&copy; <?= date('Y') ?> Delison Wonda, Abd. Rachman Dayat, Syari Rukmana Wahab - Semua Hak Cipta Dilindungi Undang - undang.</strong>
  </footer>
</div>

<script src="<?= base_url('backend/plugins/jquery/jquery.min.js'); ?>"></script>

<script src="<?= base_url('backend/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<script src="<?= base_url('backend/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

<script src="<?= base_url('backend/plugins/chart.js/Chart.min.js'); ?>"></script>

<script src="<?= base_url('backend/plugins/sparklines/sparkline.js'); ?>"></script>

<script src="<?= base_url('backend/plugins/jqvmap/jquery.vmap.min.js'); ?>"></script>
<script src="<?= base_url('backend/plugins/jqvmap/maps/jquery.vmap.usa.js'); ?>"></script>

<script src="<?= base_url('backend/plugins/jquery-knob/jquery.knob.min.js'); ?>"></script>

<script src="<?= base_url('backend/plugins/moment/moment.min.js'); ?>"></script>
<script src="<?= base_url('backend/plugins/daterangepicker/daterangepicker.js'); ?>"></script>

<script src="<?= base_url('backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'); ?>"></script>

<script src="<?= base_url('backend/plugins/summernote/summernote-bs4.min.js'); ?>"></script>
<script src="<?= base_url('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>"></script>
<script src="<?= base_url('backend/dist/js/adminlte.js'); ?>"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/ekko-lightbox@5.3.0/dist/ekko-lightbox.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="<?= base_url('backend/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
<script src="<?= base_url('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('backend/plugins/datatables-buttons/js/dataTables.buttons.min.js'); ?>"></script>
<script src="<?= base_url('backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('backend/plugins/jszip/jszip.min.js'); ?>"></script>
<script src="<?= base_url('backend/plugins/pdfmake/pdfmake.min.js'); ?>"></script>
<script src="<?= base_url('backend/plugins/pdfmake/vfs_fonts.js'); ?>"></script>
<script src="<?= base_url('backend/plugins/datatables-buttons/js/buttons.html5.min.js'); ?>"></script>
<script src="<?= base_url('backend/plugins/datatables-buttons/js/buttons.print.min.js'); ?>"></script>
<script src="<?= base_url('backend/plugins/datatables-buttons/js/buttons.colVis.min.js'); ?>"></script>
<script>
  $(function () {
    $("#example1").DataTable({
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

  $(function() {
  let error = '<?php echo $this->session->flashdata('error'); ?>';
  let success = '<?php echo $this->session->flashdata('success'); ?>';

  if (error) {
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: error,
    });
  }

  if (success) {
    Swal.fire({
      icon: 'success',
      title: 'Success!',
      text: success,
    });
  }
});


function confirmDelete(url) {
    Swal.fire({
        title: 'Konfirmasi Hapus',
        text: "Apakah Anda yakin ingin menghapus data ini?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
    });
}

$(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
            wrapping: false
        });
    });
</script>
</body>
</html>
