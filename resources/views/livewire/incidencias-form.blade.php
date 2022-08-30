<div>
    <div class=" row">
        <label for="incidenciaSelect" class="col-sm-12 col-form-label">Incidencia</label>
        <div class="col-sm-12 form-control-sm" wire:ignore>
            <select wire:change="openPeriodos" id="incidenciaSelect" class="form-select rounded-right select2">
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
            <label for="medicos" class="col-sm-8 col-form-label">Medico</label>
            <div class="col-sm-12">
                <select id="medicos" class="form-select rounded-right select2">
                    <option>Selecciona un medico</option>
                    @foreach ($medicos as $medico => $key)
                        <option value="{{ $key }}">{{ $medico }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif


    <div class="mt-2 row">
        <label for="fecha_inicio" class="col-sm-12 col-form-label">Ingresa las Fechas</label>
        <div class="col-sm-6">
            <x-datepicker id="fecha_inicio" wire:model.defer="fecha_inicio" />

        </div>
        <div class="col-sm-6">
            <x-datepicker id="fecha_final" wire:model.defer="fecha_final" />
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
