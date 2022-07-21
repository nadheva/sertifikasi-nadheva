<x-app-layout>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-6">
              <h4>Data Akademik</h4>
              {{-- <p>Anda belum mengisi data profil, silahkan isi terlebih dahulu!.</p> --}}
            </div>
            <div class="col-lg-6 text-right d-flex flex-column justify-content-center">
              <a class="btn bg-gradient-primary mb-0 ms-lg-auto me-lg-0 me-auto mt-lg-0 mt-2" href="{{route('printpdf')}}">Print</a>
            </div>
          </div>
        <div class="row mt-4">
          <div class="col-lg-4">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="font-weight-bolder">Foto</h5>
                <div class="row">
                  <div class="col-12">
                    <img class="w-100 border-radius-lg shadow-lg mt-3" src="{{asset($dataakademik->foto)}}" alt="">
                  </div>
                  {{-- <div class="col-12 mt-4">
                    <div class="d-flex">
                      <button class="btn bg-gradient-primary btn-sm mb-0 me-2" type="button" name="button">Edit</button>
                      <button class="btn btn-outline-dark btn-sm mb-0" type="button" name="button">Remove</button>
                    </div>
                  </div> --}}
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-8 mt-lg-0 mt-4">
            <div class="card">
              <div class="card-body">
                <h5 class="font-weight-bolder">Informasi Data Siswa</h5>
                <div class="row">
                  <div class="col-12 col-sm-6">
                    <label>Nama Lengkap</label>
                    <input class="form-control" type="text" value="{{$dataakademik->user->name}}" disabled/>
                  </div>
                  <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                    <label>NISN</label>
                    <input class="form-control" type="text" value="{{$dataakademik->nisn}}" disabled/>
                  </div>
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <label>Email</label>
                        <input class="form-control" type="text" value="{{$dataakademik->user->email}}" disabled/>
                    </div>
                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                        <label>Nomor Telepon</label>
                        <input class="form-control" type="text" value="{{$dataakademik->no_telp}}" disabled/>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-sm-6">
                        <label>Tempat Lahir</label>
                        <input class="form-control" type="text" value="{{$dataakademik->tempat_lahir}}" disabled/>
                    </div>
                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                        <label>Tanggal Lahir</label>
                        <input class="form-control" type="text" value="{{$dataakademik->tanggal_lahir}}" disabled/>
                    </div>
                  </div>
              </div>
            </div>
            <div class="card">
                <div class="card-body">
                  <div class="row">
                    <h5 class="font-weight-bolder"></h5>
                    <div class="row mt-3">
                      <div class="col">
                        <label>Alamat</label>
                        <input class="multisteps-form__input form-control" type="text" value="{{$dataakademik->alamat}}" disabled/>
                      </div>
                    </div>
                    <div class="row mt-3">
                      <div class="col-12 col-sm-6">
                        <label>Asal Sekolah</label>
                        <input class="multisteps-form__input form-control" type="text" value="{{$dataakademik->asal_sekolah}}" disabled/>
                      </div>
                      <div class="col-6 col-sm-3 mt-3 mt-sm-0">
                        <label>Nilai Matematika</label>
                        <input class="multisteps-form__input form-control" type="text" value="{{$dataakademik->nilai_mtk}}" disabled/>
                      </div>
                      <div class="col-12 col-sm-6">
                        <label>Nilai Bahasa Inggris</label>
                        <input class="multisteps-form__input form-control" type="text" value="{{$dataakademik->nilai_big}}" disabled/>
                      </div>
                      <div class="col-6 col-sm-3 mt-3 mt-sm-0">
                        <label>Nilai Bahasa Indonesia</label>
                        <input class="multisteps-form__input form-control" type="number" value="{{$dataakademik->nilai_bindo}}" disabled />
                      </div>
                      <div class="col-12 col-sm-6">
                        <label>Nilai Rata-rata</label>
                        <input class="multisteps-form__input form-control" type="text" value="{{$dataakademik->nilai_rata_rata}}" disabled/>
                      </div>
                      <div class="col-6 col-sm-3 mt-3 mt-sm-0">
                        <label>Status</label>
                        @if($dataakademik->status == 0)
                        <input class="multisteps-form__input form-control" type="text" value="Belum Diterima" disabled></input>
                        @elseif($dataakademik->status == 1)
                        <input class="multisteps-form__input form-control" type="text" value="Diterima" disabled ></input>
                        @endif
                      </div>
                    </div>
                </div>
              </div>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-sm-4">

          </div>
          <div class="col-sm-8 mt-sm-0 mt-4">

          </div>
        </div>

     </div>
        </div>
        <script>
            window.print();
        </script>
</x-app-layout>
