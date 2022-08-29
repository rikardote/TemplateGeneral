<div>
    <div class="mb-3 row">
        <div class="col-sm-2 col-form-label">Incidencia
        </div>
        <div class="col-sm-10 form-group" wire:ignore>
            <select wire:change="openPeriodos" id="incidenciaSelect" class="form-select select2">
                <option selected="">Selecciona una incidencia</option>
                @foreach ($codigosIncidencias as $codigos => $key)
                    <option value="{{ $key }}">{{ $codigos }}</option>
                @endforeach
            </select>
        </div>
    </div>
    @if ($showPeriodo)
        <div class="mb-3 row">
            <label for="example-text-input" class="col-sm-2 col-form-label">Periodo</label>
            <div class="col-sm-10 form-group">
                <select wire:model.defer="periodo_id" class="form-select">
                    <option selected="">Selecciona un periodo</option>
                    @foreach ($periodos as $periodo => $key)
                        <option value="{{ $key }}">{{ $periodo }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif

    <div class="mb-3 row">
        <label for="example-text-input" class="col-sm-2 col-form-label">Fecha Inicial</label>
        <div class="col-sm-10">
            <input wire:model.defer="fecha_inicio" class="form-control" type="date" id="example-text-input">
        </div>
    </div>

    <div class="mb-3 row">
        <label for="example-text-input" class="col-sm-2 col-form-label">Fecha Inicial</label>
        <div class="col-sm-10">
            <input wire:model.defer="fecha_final" class="form-control" type="date" id="example-text-input">
        </div>
    </div>

    <button wire:click="save" class="btn btn-info waves-effect waves-light">Capturar</button>
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
