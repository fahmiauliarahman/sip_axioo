@extends('layouts.master')

@section('navigasi')
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">{{ $judul }}</li>
@endsection


@section('konten')
<div class="row" id="student-row">
    <div class="col-sm-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h3 class="card-title">{{ $judul }}</h3>
                    </div>
                    <div class="col text-right">
                        <a id="btn-add-student" class="btn bg-primary"><i class="fa fa-plus mr-2"></i>Add</a>
                    </div>
                </div>
                <br>
            </div>
            <div class="card-body">
                <table id="tbl-student" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>School</th>
                            <th>Grade</th>
                            <th>Department</th>
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
@include('student.form')
@include('masterdata.school.form')
@include('masterdata.department.form')

@endsection

@section('js')
<script src="{{ asset('assets') }}/public/js/masterdata/school.js"></script>
<script src="{{ asset('assets') }}/public/js/masterdata/department.js"></script>
<script src="{{ asset('assets') }}/public/js/student.js"></script>
@endsection
