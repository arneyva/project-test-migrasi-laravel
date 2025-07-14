@extends('template.dashboard.header')

@section('title', 'Login')

@section('content')<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row align-items-end">
                <div class="col-xl-12 col-12">
                    <div class="box bg-primary-light pull-up">
                        <div class="box-body p-xl-0">
                            <div class="row align-items-center">
                                <div class="col-12 col-lg-3"><img src="{{asset('template/images/svg-icon/color-svg/custom-14.svg')}}" alt=""></div>
                                <div class="col-12 col-lg-9">
                                    <h2>Hello, Welcome Back!</h2>
                                    <p class="text-dark mb-0 fs-16">
                                        Your course Overcoming the fear of public speaking was completed by 11 New users this week!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="box no-shadow mb-0 bg-transparent">
                        <div class="box-header no-border px-0">
                            <h3 class="box-title">Manajemen Akses</h3>

                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <h4 class="box-title">List Data User</h4>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Nama User</th>
                                            <th>Email</th>
                                            <th>Role Akses</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($users as $user )
                                       <tr>
                                           <td>{{$user->name}}</td>
                                           <td>{{$user->email}}</td>
                                           <td>{{$user->roles->first()->name ?? 'No Role'}}</td>     
                                           <td></td>                                      
                                       @endforeach
                                       </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Nama User</th>
                                            <th>Email</th>
                                            <th>Role Akses</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </section>
    </div>
</div>
@endsection