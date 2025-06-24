@extends('layouts.desa.adminlte.app')

@section('title', 'Manajeme Pengumuman Update')

@section('content')
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header card-header-custom">
                            <h3 class="card-title">Update Pengumuman</h3>
                        </div>
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="#">Tanggal</label>
                                    <input type="date" class="form-control" id="#">
                                </div>
                                <div class="form-group">
                                    <label for="#">Judul</label>
                                    <input type="text" class="form-control" id="#" placeholder="judul">
                                </div>
                                <div class="form-group">
                                    <label for="#">Isi</label>
                                    <textarea id="summernote" name="isi"></textarea>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Ketegori Blog</label>
                                        <select class="form-control">
                                            <option>Pengumuman</option>
                                            <option>Parawisata</option>
                                            <option>Berita</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="#">Gambar</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="#">
                                            <label class="custom-file-label" for="#">Pilih Gambar</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-custom">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
