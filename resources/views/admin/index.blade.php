@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green-gradient">
                        <div class="inner">
                            <h3>{{ $users }}</h3>
                            <p>Users</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                    </div>

                </div>

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ $files }}</h3>
                            <p>Total Files</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file-image-o"></i>
                        </div>
                    </div>

                </div>

            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ $report }}</h3>
                            <p>Reports</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file-image-o"></i>
                        </div>
                    </div>

                </div>

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ $prescription }}</h3>
                            <p>Prescriptions</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file-image-o"></i>
                        </div>
                    </div>

                </div>

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ $invoice }}</h3>
                            <p>Invoices</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file-image-o"></i>
                        </div>
                    </div>

                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
@endsection