@extends('layouts.master')

@section('navigasi')
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">{{ $judul }}</li>
@endsection


@section('konten')
<div class="row" id="message-row">
    <div class="col-sm-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h3 class="card-title">{{ $judul }}</h3>
                    </div>
                </div>
                <br>
            </div>
            <div class="card-body">
                <table id="tbl-message" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>From</th>
                            <th>Mail</th>
                            <th>Message</th>
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
@include('message.form')

@endsection

@section('js')
<script src="{{ asset('assets') }}/public/js/message.js"></script>
@endsection
