@extends('layouts.main_index_admin')
@section('main_index')
    {{-- content --}}
    <button type="button" class="btn btn-primary">. . .</button>

    <div class="container-fluid py-4">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Peminjaman Buku</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Judul</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Penerbit</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Penulis</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Stok Buku</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bukus as $buku)
                                            <tr>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">{{ $buku->judul }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">{{ $buku->penerbit }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">{{ $buku->pengarang }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">{{ $buku->stok_buku }}</p>
                                                </td>
                                                <td class="">
                                                    <button type="button" class="btn btn-info">Edit</button>
                                                    <button type="button" class="btn btn-danger">Delete</button>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection