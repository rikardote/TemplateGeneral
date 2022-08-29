@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="mb-sm-0">Captura de Incidencias</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <livewire:incidencias-form :employe="$employe">
                        </div>
                    </div>
                </div> <!-- end col -->

                <div class="col-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">{{ $employe->num_empleado }} - {{ $employe->fullName }}</div>
                            <div class="mb-3">{{ $employe->deparment->fullDescription }}</div>
                            <div class="mb-3">{{ $employe->horario->horario }} | {{ $employe->condicion->condicion }}
                            </div>
                        </div>
                        <div class="justify-content-center">
                            <livewire:show-incidencias :employe="$employe" />
                        </div>
                    </div>
                </div> <!-- end col -->





            </div>

        </div> <!-- container-fluid -->



    </div>
@endsection
