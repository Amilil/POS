<form action="{{ url('/barang/import_ajax') }}" method="POST" id="form-import" enctype="multipart/form-data">
    @csrf
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="downloadTemplate">Download Template</label>
                    <a href="{{ asset('template_barang.xlsx') }}" class="btn btn-info btn-sm" download>
                        <i class="fa fa-file-excel"></i> Download
                    </a>
                    <small id="error-kategori_id" class="error-text form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label for="file_barang">Pilih File</label>
                    <input type="file" name="file_barang" id="file_barang" class="form-control" required>
                    <small id="error-file_barang" class="error-text form-text text-danger"></small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        // Initialize jQuery Validation
        $("#form-import").validate({
            rules: {
                file_barang: {
                    required: true,
                    extension: "xlsx"
                },
            },
            // Handle form submission via AJAX
            submitHandler: function(form) {
                var formData = new FormData(form);

                $.ajax({
                    url: form.action,
                    type: form.method,
                    data: formData,
                    processData: false, // Essential for handling file uploads
                    contentType: false, // Essential for handling file uploads
                    success: function(response) {
                        if (response.status) { // If successful
                            $('#myModal').modal('hide'); // Assuming 'myModal' is the ID of your modal
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.message
                            });
                            // Check if tableBarang is defined before trying to reload
                            if (typeof tableBarang !== 'undefined' && tableBarang !== null) {
                                tableBarang.ajax.reload(); // Reload datatable
                            } else {
                                console.warn("tableBarang is not defined. Cannot reload datatable.");
                            }
                        } else { // If error
                            $('.error-text').text(''); // Clear previous error messages
                            $.each(response.msgField, function(prefix, val) {
                                $('#error-' + prefix).text(val[0]);
                            });
                            Swal.fire({
                                icon: 'error',
                                title: 'Terjadi Kesalahan',
                                text: response.message
                            });
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        // Handle AJAX errors (e.g., server unreachable, 500 error)
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Terjadi kesalahan saat mengunggah file. Silakan coba lagi.'
                        });
                        console.error("AJAX Error:", textStatus, errorThrown, jqXHR);
                    }
                });
                return false; // Prevent default form submission
            },
            // Configure error display for jQuery Validation
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>