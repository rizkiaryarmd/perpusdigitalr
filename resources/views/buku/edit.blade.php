@extends('layouts.master')

@section('content')
        <div class="container">
            <nav class="navbar navbar-dark bg-primary">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <b> Edit Buku</b>
                    </a>
                </div>
            </nav>
            <br>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Edit Data
                    </div>
                    <div class="card-body">
                        <form action="{{ route('buku.update', $buku->id) }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="judul" class="form-label">judul</label>
                                <input type="text" value="{{$buku->judul}}" name="judul" class="form-control"
                                    id="judul" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">penulis</label>
                                <input type="text" name="penulis" value="{{$buku->penulis}}" class="form-control"> 
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">penerbit</label>
                                <input type="text" name="penerbit" value="{{$buku->penerbit}}" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">tahun terbit</label>
                                <input type="number" name="tahun_terbit" value="{{$buku->tahun_terbit}}"  class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection