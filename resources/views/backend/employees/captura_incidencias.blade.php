@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Captura de Incidencias</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <livewire:incidencias-form :employe="$employe">
                        </div>
                    </div>
                </div> <!-- end col -->

                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">{{ $employe->num_empleado }}</div>
                            <div class="mb-3">{{ $employe->fullName }}</div>
                            <div class="mb-3">{{ $employe->deparment->fullDescription }}</div>
                            <div class="mb-3">{{ $employe->horario->horario }}</div>
                            <div class="mb-3">{{ $employe->condicion->condicion }}</div>
                        </div>
                    </div>
                </div> <!-- end col -->


            </div>
            <div class="row justify-content-end">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <livewire:show-incidencias :employe="$employe" />
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

        </div> <!-- container-fluid -->



    </div>
@endsection
