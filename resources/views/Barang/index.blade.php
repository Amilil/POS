@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
            <a class="btn btn-sm btn-primary mt-1" href="{{ url('kategori/create') }}">Tambah</a>
            <button onclick="modalAction('{{ url('kategori/create_ajax') }}')" class="btn btn-sm btn-success mt-1">Tambah Ajax</button>
        </div>
    </div>
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="row mb-3">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Filter: </label>
                    <div class="col-3">
                        <select class="form-control" id="kategori_id" name="kategori_id">
                            <option value="">- Semua -</option>
                            @foreach($kategori as $item)
                            <option value="{{ $item->kategori_id }}">{{ $item->kategori_nama }}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Kategori</small>
                    </div>
                </div>
            </div>
        </div>
<table class="table table-bordered table-striped table-hover table-sm" id="table_kategori">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade animate shake" tabindex="-1" role="dialog" data-backdrop="static"
    data-keyboard="false" aria-hidden="true"></div>
@endsection

@push('css')
<!-- Tambahkan CSS tambahan jika diperlukan -->
@endpush

@push('js')
<script>
    function modalAction(url = '') {
        $('#myModal').load(url, function() {
            $('#myModal').modal('show');
        });
    }

    $(document).ready(function() {
        const dataKategori = $('#table_kategori').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ url('kategori/list') }}",
                type: "POST",
                data: function(d) {
                    d.kategori_id = $('#kategori_id').val();
                    d._token = '{{ csrf_token() }}';
                }
            },
            columns: [{
                    data: "DT_RowIndex",
                    className: "text-center",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "kategori_kode"
                },
                {
                    data: "kategori_nama"
                },
                {
                    data: "aksi",
                    orderable: false,
                    searchable: false
                }
            ]
        });
$('#kategori_id').on('change', function() {
            dataKategori.ajax.reload();
        });
    });
</script>
@endpush