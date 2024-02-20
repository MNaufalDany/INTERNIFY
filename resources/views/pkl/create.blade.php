<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Pkl</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <style>
        .cke {
            visibility: hidden;
        }
    </style>
</head>

<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('pkl.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold">Nama Siswa</label>
                                <select class="form-control " name="id_siswa" id="namaDropdown">
                                    <option value="">Select Nama Siswa</option>
                                    @foreach($data as $siswa)
                                        <option value="{{ $siswa->id }}">{{ $siswa->nama }} ({{$siswa->kelas}})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Nama Dudi</label>
                                <select class="form-control " name="id_dudi" id="namaDropdown">
                                    <option value="">Select Nama Dudi</option>
                                    @foreach($data2 as $dudi)
                                        <option value="{{ $dudi->id }}">{{ $dudi->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label class="font-weight-bold">Tanggal Masuk</label>
                            <div class="form-group">
                                <input type="date" class="form-control" id="tgl_masuk" name="tgl_masuk">
                            </div>

                            <div class="d-flex justify-content-end ">
                                <button type="submit" class="btn btn-md btn-primary mx-1">SIMPAN</button>
                                <button type="reset" class="btn btn-md btn-warning mx-1">RESET</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Add Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#namaDropdown').select2({
                placeholder: 'Search for a student...',
                allowClear: true
            });
        });
    </script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>
</body>

</html>