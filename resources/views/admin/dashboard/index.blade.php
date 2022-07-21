<x-app-layout>
    <div class="row  mt-4">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex pb-0 p-3">
                    <h6 class="my-auto">Data Pendaftaran</h6>
                    <div class="nav-wrapper position-relative ms-auto w-50">
                        <ul class="nav nav-pills nav-fill p-1" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#cam1"
                                    role="tab" aria-controls="cam1" aria-selected="true">
                                    Diterima
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#cam2" role="tab"
                                    aria-controls="cam2" aria-selected="false">
                                    Cadangan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#cam3" role="tab"
                                    aria-controls="cam3" aria-selected="false">
                                    Tidak Diterima
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body p-3 mt-2">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show position-relative active height-400 border-radius-lg"
                            id="cam1" role="tabpanel" aria-labelledby="cam1">
                            <div class="row mt-4">
                                <div class="table-responsive">
                                    <table class="table table-flush" id="datatable-search">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama</th>
                                                <th>Foto</th>
                                                <th>Asal Sekolah</th>
                                                <th>Nilai Rata-rata</th>
                                                <th>Action</th>
                                                <th>Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dataakademik->where('status', '=', 'Diterima') as $i)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                    <p class="text-xs font-weight-bold ms-2 mb-0">{{$loop->iteration}}</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                    <p class="text-xs font-weight-bold ms-2 mb-0">{{$i->user->name}}</p>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <img src="{{ asset( $i->foto) }}" style="max-width: 70px" class="img-fluid shadow border-radius-xl">
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                    <p class="text-xs font-weight-bold ms-2 mb-0">{{$i->asal_sekolah}}</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                    <p class="text-xs font-weight-bold ms-2 mb-0">{{$i->nilai_rata_rata}}</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                    <p class="text-xs font-weight-bold ms-2 mb-0">{{$i->user->name}}</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="align-middle text-center">
                                                    <a class="btn btn-link text-dark px-3 mb-0" href="" data-bs-toggle="modal" data-bs-target="#approval-{{$i->id}}"><i class="fas fa-user-edit text-secondary"></i></a>
                                                    </div>
                                                </td>
                                                <td class="text-sm">
                                                    <a href="{{route('order-studio.show', $i->id)}}" data-bs-toggle="tooltip" data-bs-original-title="Preview product">
                                                    <i class="fas fa-eye text-secondary"></i>
                                                    </a>
                                                </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show position-relative  height-400 border-radius-lg" id="cam2"
                        role="tabpanel" aria-labelledby="cam2">
                        <div class="row mt-4">
                            {{-- <div class="table-responsive"> --}}
                                <table class="table table-flush" id="datatable-search1">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Foto</th>
                                            <th>Asal Sekolah</th>
                                            <th>Nilai Rata-rata</th>
                                            <th>Action</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataakademik->where('status', '=', 'Cadangan') as $i)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                <p class="text-xs font-weight-bold ms-2 mb-0">{{$loop->iteration}}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                <p class="text-xs font-weight-bold ms-2 mb-0">{{$i->user->name}}</p>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center">
                                                <img src="{{ asset( $i->foto) }}" style="max-width: 70px" class="img-fluid shadow border-radius-xl">
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                <p class="text-xs font-weight-bold ms-2 mb-0">{{$i->asal_sekolah}}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                <p class="text-xs font-weight-bold ms-2 mb-0">{{$i->nilai_rata_rata}}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                <p class="text-xs font-weight-bold ms-2 mb-0">{{$i->user->name}}</p>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="align-middle text-center">
                                                <a class="btn btn-link text-dark px-3 mb-0" href="" data-bs-toggle="modal" data-bs-target="#approval-{{$i->id}}"><i class="fas fa-user-edit text-secondary"></i></a>
                                                </div>
                                            </td>
                                            <td class="text-sm">
                                                <a href="{{route('order-studio.show', $i->id)}}" data-bs-toggle="tooltip" data-bs-original-title="Preview product">
                                                <i class="fas fa-eye text-secondary"></i>
                                                </a>
                                            </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            {{-- </div> --}}
                        </div>
                    </div>
                    <div class="tab-pane fade show position-relative  height-400 border-radius-lg" id="cam3"
                    role="tabpanel" aria-labelledby="cam3">
                    <div class="row mt-4">
                        {{-- <div class="table-responsive"> --}}
                            <table class="table table-flush" id="datatable-search2">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Foto</th>
                                        <th>Asal Sekolah</th>
                                        <th>Nilai Rata-rata</th>
                                        <th>Action</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataakademik->where('status', '=', 'Tidak Diterima') as $i)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                            <p class="text-xs font-weight-bold ms-2 mb-0">{{$loop->iteration}}</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                            <p class="text-xs font-weight-bold ms-2 mb-0">{{$i->user->name}}</p>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center">
                                            <img src="{{ asset( $i->foto) }}" style="max-width: 70px" class="img-fluid shadow border-radius-xl">
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                            <p class="text-xs font-weight-bold ms-2 mb-0">{{$i->asal_sekolah}}</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                            <p class="text-xs font-weight-bold ms-2 mb-0">{{$i->nilai_rata_rata}}</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                            <p class="text-xs font-weight-bold ms-2 mb-0">{{$i->user->name}}</p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="align-middle text-center">
                                            <a class="btn btn-link text-dark px-3 mb-0" href="" data-bs-toggle="modal" data-bs-target="#approval-{{$i->id}}"><i class="fas fa-user-edit text-secondary"></i></a>
                                            </div>
                                        </td>
                                        <td class="text-sm">
                                            <a href="{{route('order-studio.show', $i->id)}}" data-bs-toggle="tooltip" data-bs-original-title="Preview product">
                                            <i class="fas fa-eye text-secondary"></i>
                                            </a>
                                        </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@push('scripts')
<script>
    const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
        searchable: true,
        fixedHeight: true
    });
    const dataTableSearch1 = new simpleDatatables.DataTable("#datatable-search1", {
        searchable: true,
        fixedHeight: true
    });
    const dataTableSearch1 = new simpleDatatables.DataTable("#datatable-search2", {
        searchable: true,
        fixedHeight: true
    });
</script>
@endpush
</x-app-layout>
