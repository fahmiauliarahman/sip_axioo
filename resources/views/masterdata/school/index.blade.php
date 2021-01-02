@extends('layouts.master')

@section('navigasi')
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item">Master Data</li>
<li class="breadcrumb-item active">{{ $judul }}</li>
@endsection


@section('konten')
<div class="row" id="school-row">
    <div class="col-sm-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h3 class="card-title">{{ $judul }}</h3>
                    </div>
                    <div class="col text-right">
                        <a id="btn-add-school" class="btn bg-primary"><i class="fa fa-plus mr-2"></i>Add</a>
                    </div>
                </div>
                <br>
            </div>
            <div class="card-body">
                <table id="tbl-school" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>School Name</th>
                            <th>School Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@include('masterdata.school.form')

@endsection

@section('js')
<script src="{{ asset('assets') }}/public/js/masterdata/school.js"></script>
@endsection
