@extends('layouts.master')
 @section('content')
     <div class="container-fluid">
         <div class="row justify-content-center">
             <div class="col-md-12">
                 <div class="card">
                     <div class="card-body">
                         <div class="mb-4">
                             <a href="{{ route('peminjaman.tambah') }}" class="btn btn-primary">
                                 + Tambah Data Peminjaman
                             </a>
                         </div>

                         <div class="table-responsive">
                             <table class="table table-bordered">
                                 <thead>
                                     <tr>
                                         <th class="px-4 py-2">Nama Peminjam</th>
                                         <th class="px-4 py-2">Buku Yang Dipinjam</th>
                                         <th class="px-4 py-2">Tanggal Peminjaman</th>
                                         <th class="px-4 py-2">Tanggal Harus Kembali</th>
                                         <th class="px-4 py-2">Tanggal Pengembalian</th>
                                         <th class="px-4 py-2">Status</th>
                                         <th class="px-4 py-2">Aksi</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @forelse($peminjaman as $p)
                                         <tr>
                                             <td class="px-4 py-2">{{ $p->user->name }}</td>
                                             <td class="px-4 py-2">{{ $p->buku->judul }}</td>
                                             <td class="px-4 py-2">{{ $p->tanggal_peminjaman }}</td>
                                             <td class="px-4 py-2">{{ $p->tanggal_pengembalian }}</td>
                                             <td>{{$p->sekarang}}</td>
                                             <td class="px-4 py-2">
                                                @if($p->status === 'Dipinjam')
                                                     <span class="badge bg-warning">{{ $p->status }}</span>
                                                @elseif($p->status === 'Dikembalikan')
                                                     <span class="badge bg-primary">{{ $p->status }}</span>
                                                @elseif($p->status === 'Denda')
                                                     <span class = "badge bg-danger">{{ $p->status }}</span>
                                                @endif
                                             </td>
                                             <td class="text-center">
                                                 @if($p->status === 'Dipinjam')
                                                     <form id="from_{{$p->id}}" action="{{ route('peminjaman.kembalikan', $p->id) }}" method="post">
                                                         @csrf
                                                         <button type="submit" class="btn btn-primary">
                                                             Kembalikan
                                                         </button>
                                                     </form>
                                                @elseif  ($p->status === 'Denda')
                                                <a href="{{route('peminjaman.denda', $p->id)}}" class="btn btn-danger">
                                                    Bayar Denda
                                                </a>
                                                @else ($p->status === 'Dikembalikan')

                                                     -

                                                 @endif
                                             </td>
                                         </tr>
                                     @empty
                                         <tr>
                                             <td colspan="6" class="px-4 py-2 text-center">Tidak ada data buku.</td>
                                         </tr>
                                     @endforelse
                                 </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 @endsection