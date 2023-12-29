@extends('layouts.main_index_admin')
@section('main_index')
    {{-- content --}}
    <div class="container-fluid py-4">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Data Peminjaman</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs align-middle font-weight-bolder opacity-7">
                                                Id</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs align-middle font-weight-bolder opacity-7">
                                                Id Siswa</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs align-middle font-weight-bolder opacity-7">
                                                Nama Siswa</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs align-middle font-weight-bolder opacity-7">
                                                Id Buku</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs align-middle font-weight-bolder opacity-7">
                                                Nama Buku</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs align-middle font-weight-bolder opacity-7">
                                                Qty</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs align-middle font-weight-bolder opacity-7">
                                                Update At</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs align-middle font-weight-bolder opacity-7">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($trxs as $trx)
                                            <tr>
                                                <td class="px-4">
                                                    <p class="text-xs text-secondary mb-0">{{ $trx->id }}</p>
                                                </td>
                                                <td class="px-4">
                                                    <p class="text-xs text-secondary mb-0">{{ $trx->siswa_id }}</p>
                                                </td>
                                                <td class="px-4">
                                                    <p class="text-xs text-secondary mb-0">{{ $trx->name_siswa }}</p>
                                                </td>
                                                <td class="px-4">
                                                    <p class="text-xs text-secondary mb-0">{{ $trx->buku_id }}</p>
                                                </td>
                                                <td class="px-4">
                                                    <p class="text-xs text-secondary mb-0">{{ $trx->name_buku }}</p>
                                                </td>
                                                <td class="px-4">
                                                    <p class="text-xs text-secondary mb-0">{{ $trx->qty }}</p>
                                                </td>
                                                <td class="px-4">
                                                    <p class="text-xs text-secondary mb-0">{{ $trx->updated_at }}</p>
                                                </td>
                                                <td class="d-flex gap-3">
                                                    <form action="{{ route('data_pinjam.delete', $trx->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
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
