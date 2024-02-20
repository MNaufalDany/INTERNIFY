<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Posts - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="/pkl/create" class="btn btn-md btn-success mb-3">TAMBAH PKL</a>
                        <a href="/siswa" class="btn btn-md btn-primary mb-3">DATA SISWA</a> 
                        <a href="/dudi" class="btn btn-md btn-info mb-3 ">DATA DUDI</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">NO</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">DUDI</th>
                                <th scope="col">TGL MASUK</th>
                                <th scope="col">TGL KELUAR</th>
                                <th scope="col">STATUS</th>
                                <th scope="col">AKSI</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($pkl as $key => $pkls)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td>{{ $pkls->siswa->nama }}</td>
                                    <td>{{ $pkls->dudi->nama }}</td>
                                    <td>{{ $pkls->tgl_masuk }}</td>
                                    <td>{{ $pkls->tgl_keluar }}</td>
                                    <td class="text-center">
                                        @if ($pkls->tgl_keluar)
                                            <span class="badge badge-success">Done</span>
                                        @else
                                            <span class="badge badge-warning">Progress</span>
                                        @endif
                                    </td>                                    
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="#" method="POST">
                                            {{-- <a href="{{ route('pembayaran.edit', $pembayaran->id) }}" class="btn btn-sm btn-primary">EDIT</a> --}}
                                            <a href="{{ route('pkl.show', $pkls->id) }}" class="btn btn-sm btn-info mx-2">DETAIL</a>
                                            {{-- @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button> --}}
                                        </form>
                                    </td>            
                                </tr>
                              @empty
                                  <tr>
                                      <td colspan="4" class="text-center">Data Post belum Tersedia.</td>
                                  </tr>
                              @endforelse
                            </tbody>
                          </table>  

                        <!-- Tambahkan bagian pagination di bawah tabel -->
                        {{ $pkl->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 
        @elseif(session()->has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!'); 
        @endif
    </script>

</body>
</html>
