<div>
    <div class=" row">
        <label for="incidenciaSelect" class="col-sm-12 col-form-label">Incidencia</label>
        <div class="col-sm-12 form-control-sm" wire:ignore>
            <select id="incidenciaSelect" class="form-select rounded-right select2">
                <option>Selecciona una incidencia</option>
                @foreach ($codigosIncidencias as $codigos => $key)
                    <option value="{{ $key }}">{{ $codigos }}</option>
                @endforeach
            </select>

        </div>
    </div>

    @if ($showPeriodo)
        <div class="mt-2 row">
            <label for="periodo" class="col-sm-8 col-form-label">Periodo</label>
            <div class="col-sm-12">
                <select id="periodo" class="rounded-right form-select">
                    @foreach ($periodos as $periodo => $key)
                        <option value="{{ $key }}">{{ $periodo }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif

    @if ($showIncapacidades)
        <div class="mt-2 row">
            <label for="medico_id" class="col-sm-8 col-form-label">Medico</label>
            <div class="col-sm-12">
                <x-select2 id="medico_id" wire:model.defer="medico_id">
                    @foreach ($medicos as $medico)
                        <option value="{{ $medico->id }}">{{ $medico->num_empleado }} - {{ $medico->name }}
                            {{ $medico->father_lastname }}
                            {{ $medico->mother_lastname }} </option>
                    @endforeach
                </x-select2>

            </div>
        </div>
        <div class="mt-2 row">
            <label for="diagnostico" class="col-sm-8 col-form-label">Diagnostico</label>
            <div class="col-sm-12">
                <input class="form-control rounded-right" type="text" id="diagnostico"
                    wire:model.defer="diagnostico">
            </div>
        </div>
        <div class="mt-2 row">
            <label for="fecha_expedida" class="col-sm-12 col-form-label">Fechas Expedida</label>
            <div class="col-sm-12">
                <input wire:model.defer="fecha_expedida" id="fecha_expedida" type="date"
                    class="form-select rounded-right input-xs flatpickr" placeholder="MM/DD/YYYY" autocomplete="off">
            </div>
        </div>
    @endif


    <div class="mt-2 row">
        <label for="fecha_inicio" class="col-sm-12 col-form-label">Ingresa las Fechas</label>
        <div class="col-sm-6">
            <x-date-picker id="fecha_inicio" wire:model.defer="fecha_inicio" />

        </div>
        <div class="col-sm-6">
            <x-date-picker id="fecha_final" wire:model.defer="fecha_final" />
        </div>
    </div>


    <button wire:click="save" class="mt-3 btn btn-info waves-effect waves-light">Capturar</button>

    @push('scripts')
        <script>
            $("#incidenciaSelect").on('change', function(e) {
                let id = $(this).val()
                @this.set('codigodeincidencia_id', id);
                livewire.emit('openPeriodos');
            })
        </script>
    @endpush
</div>
