@extends('layouts.master')

@section('konten')
<div class="row">
    <div class="col-6">
        <!-- small card -->
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{ count($students) }}</h3>

                <p>Students</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-plus"></i>
            </div>
            <a href="{{ route('student.index') }}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ count($messages) }}</h3>

                <p>Messages</p>
            </div>
            <div class="icon">
                <i class="fas fa-envelope"></i>
            </div>
            <a href="{{ route('message.index') }}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>

<div class="row my-2">
    <h3>Profile</h3>
</div>

<div class="row">
    <div class="col-sm-8">
        <!-- Widget: user widget style 1 -->
        <div class="card card-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-primary">
                <h3 class="widget-user-username">{{ Auth::user()->name }}</h3>
                <h5 class="widget-user-desc">Admin</h5>
            </div>
            <div class="widget-user-image">
                <img class="img-circle elevation-2" src="{{ asset('assets') }}/img/default-user.png" alt="User Avatar">
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                            <h5 class="description-header">Fahmi Aulia Rahman</h5>
                            <span class="description-text">Linked.in</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 border-right">
                        <div class="description-block">
                            <h5 class="description-header">fahmiauliarahman</h5>
                            <span class="description-text">Github</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4">
                        <div class="description-block">
                            <h5 class="description-header"><a
                                    href="mailto:fahmi@codesomnia.xyz">fahmi@codesomnia.xyz</a>
                            </h5>
                            <span class="description-text">Mail</span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- /.widget-user -->
    </div>
</div>
@endsection
