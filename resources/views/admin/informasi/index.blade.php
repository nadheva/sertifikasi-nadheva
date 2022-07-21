<x-app-layout>
    @if(Auth::user()->where('role', '=', 'Admin'))
    <div class="col-md-12 mb-lg-0 mb-4">
      <div class="card mt-4">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-6 d-flex align-items-center">
              <h6 class="mb-0">Data Informasi</h6>
            </div>
            <div class="col-6 text-end">
                <a class="btn bg-gradient-dark mb-0" href="" data-bs-toggle="modal" data-bs-target="#tambahPerangkat"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Data</a>
              </div>
          </div>
        </div>
        <div class="card">
          <div class="table-responsive">
            <table id="datatable-search" class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tahun Ajaran</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kuota</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">KKM</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gambar</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deskripsi</th>
                  {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Link Youtube</th> --}}
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($informasi as $item)
                <tr>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $loop->iteration }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" >{{ $item->tahun_ajaran }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" maxlength="10" >{{ $item->status }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $item->kuota }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ $item->kkm }}</span>
                  </td>
                  <td class="align-middle text-center">
                    <img src="{{ asset( $item->gambar) }}" style="max-width: 70px" class="img-fluid shadow border-radius-xl">
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold" style="display:block;text-overflow: ellipsis;width: 200px;overflow: hidden; white-space: nowrap;">{!! $item->deskripsi !!}</span>
                  </td>
                  <td>
                    <div class="align-middle text-center">
                      <form id="form-delete" action="{{route('informasi-pendaftaran.destroy', $item->id)}}" method="POST" style="display: inline">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0 show_confirm" data-toggle="tooltip" title='Delete' ><i class="fas fa-trash text-secondary"></i></button>
                      </form>
                      <a class="btn btn-link text-dark px-3 mb-0" href="" data-bs-toggle="modal" data-bs-target="#editPerangkat-{{$item->id}}"><i class="fas fa-user-edit text-secondary"></i></a>
                      <a href="{{route('informasi-pendaftaran.show', $item->id)}}" data-bs-toggle="tooltip" data-bs-original-title="View">
                        <i class="fas fa-eye text-secondary"></i>
                      </a>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Tambah Perangkat -->
    <div class="modal fade" id="tambahPerangkat" tabindex="-1" role="dialog" aria-labelledby="tambahPerangkatLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="post" action="{{ route('informasi-pendaftaran.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahPerangkatLabel">Tambah Data Informasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                      <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Tahun Ajaran:</label>
                            <input type="text" class="form-control" name="tahun_ajaran" placeholder="*Tahun Ajaran" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Kuota:</label>
                            <input type="number" class="form-control" name="kuota" placeholder="*Kuota" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">KKM:</label>
                            <input type="number" class="form-control" name="kkm" placeholder="*KKM" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Gambar:</label>
                            <input type="file" class="form-control" name="gambar" placeholder="*Gambar" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Link Youtube:</label>
                            <input type="text" class="form-control" name="link_youtube" placeholder="*Link Youtube" required>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Deskripsi:</label>
                            <textarea class="form-control" name="deskripsi" id="mytextarea" placeholder="*Deskripsi" required></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn bg-gradient-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- Modal Edit Perangkat -->
    @foreach($informasi as $i)
    <div class="modal fade" id="editPerangkat-{{$i->id}}" tabindex="-1" role="dialog" aria-labelledby="editPerangkatLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form method="post" action="{{ url('informasi-pendaftaran-update', $i->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahPerangkatLabel">Edit Data Informasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Tahun Ajaran:</label>
                            <input type="number" class="form-control" name="tahun_ajaran" placeholder="*Tahun Ajaran" value="{{$i->tahun_ajaran}}" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Kuota:</label>
                            <input type="number" class="form-control" name="kuota" placeholder="*Kuota" value="{{$i->kuota}}" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">KKM:</label>
                            <input type="number" class="form-control" name="kkm" placeholder="*KKM" value="{{$i->kkm}}" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Gambar:</label>
                            <input type="file" class="form-control" name="gambar" placeholder="*Gambar" value="{{$i->gambar}}" required>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Link Youtube:</label>
                            <input type="text" class="form-control" name="link_youtube" placeholder="*Link Youtube" value="{{$i->link_youtube}}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1" class="col-form-label">Resepsionis</label>
                            <select class="form-control" name="resepsionis_id" id="exampleFormControlSelect1" placeholder="*Resepsionis" required>
                            <option value="{{$i->status}}" selected>{{$i->status}}</option>
                              <option value="{{$i->status}}">{{$i->status}}</option>
                            </select>
                          </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Deskripsi:</label>
                            <textarea class="form-control" name="deskripsi" id="mytextarea" placeholder="*Deskripsi" required>{{$i->deskripsi}}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn bg-gradient-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
    @endif

    @push('scripts')
    <script>
      const dataTableSearch = new simpleDatatables.DataTable("#datatable-search", {
        searchable: true,
        fixedHeight: true
      });


      $('.show_confirm').click(function(event) {
              var form =  $(this).closest("form");
              var name = $(this).data("name");
              event.preventDefault();
              swal({
                  title: `Hapus Data?`,
                  text: "Jika data terhapus, data akan hilang selamanya!",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
                  form.submit();
                }
              });
          });

    </script>
    @endpush
  </x-app-layout>

