@extends('layouts.master')
 
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Daftar Buku yang Dipinjam</div>
 
                    <div class="card-body">
                        @if ($peminjaman->isEmpty())
                            <p>Anda belum meminjam buku.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Tanggal Pengembalian</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($peminjaman as $index => $pinjam)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $pinjam->buku->judul }}</td>
                                                <td>{{ Carbon\Carbon::parse($pinjam->tanggal_peminjaman)->format('d-M-Y') }}</td>
                                                <td>{{ Carbon\Carbon::parse($pinjam->tanggal_pengembalian)->format('d-M-Y') }}</td>
                                                <td>{{ $pinjam->status }}</td>
                                                <td>
                                                    @if($pinjam->status === 'Dikembalikan')
                                                        @php
                                                            $ulasan = $pinjam->buku->ulasans()->where('user_id', Auth::id())->first();
                                                        @endphp
                                                        @if(!$ulasan)
                                                            <a href="{{ route('ulasan.create', ['buku_id' => $pinjam->buku->id]) }}" class="btn btn-success">
                                                                Berikan Ulasan
                                                            </a>
                                                        @else
                                                            <span class="text-muted">Anda sudah memberikan ulasan</span>
                                                        @endif
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection