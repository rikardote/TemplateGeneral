@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Empleados</h4>


                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="" class="btn btn-dark btn-rounded waves-effect waves-light"
                                style="float: right">Agregar Empleado</a><br> <br>


                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Numero de Empleado</th>
                                        <th>Nombre</th>
                                        <th>Action</th>
                                </thead>

                                <tbody>

                                    @foreach ($employees as $employe)
                                        <tr>
                                            <td> {{ $employe->num_empleado }} </td>
                                            <td> {{ $employe->fullName }} </td>

                                            <td>
                                                <a href="" class="btn btn-info sm" title="Ver Empleado"> <i
                                                        class="fas fa-user"></i>
                                                </a>

                                                <a href="{{ route('empleado_incidencia.capturar', $employe->num_empleado) }}"
                                                    class="btn btn-primary sm" title="Capturar Incidencia"> <i
                                                        class="fas fa-edit"></i>
                                                </a>

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->



        </div> <!-- container-fluid -->
    </div>
@endsection
