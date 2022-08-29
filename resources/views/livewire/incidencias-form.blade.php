<div>
    <div class="mb-3 row">
        <label for="incidenciaSelect" class="col-sm-2 col-form-label">Incidencia</label>
        <div class="col-sm-8 form-group" wire:ignore>
            <select wire:change="openPeriodos" id="incidenciaSelect" class="form-select select2">
                <option>Selecciona una incidencia</option>
                @foreach ($codigosIncidencias as $codigos => $key)
                    <option value="{{ $key }}">{{ $codigos }}</option>
                @endforeach
            </select>
        </div>
    </div>
    @if ($showPeriodo)
        <div class="mb-3 row">
            <label for="periodo" class="col-sm-2 col-form-label">Periodo</label>
            <div class="col-sm-8 form-group">
                <select wire:model.defer="periodo_id" id="periodo" class="rounded-pill form-select">
                    <option selected="">Selecciona un periodo</option>
                    @foreach ($periodos as $periodo => $key)
                        <option value="{{ $key }}">{{ $periodo }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif

    <div class="mb-3 row">
        <label for="fecha_inicio" class="col-sm-2 col-form-label">Fecha Inicial</label>
        <div class="col-sm-8 form-group">
            <x-datepicker id="fecha_inicio" wire:model.lazy="fecha_inicio" />
        </div>
        @error('title')
            <div id="invalidTitleFeedback" class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3 row">
        <label for="fecha_final" class="col-sm-2 col-form-label">Fecha Final</label>
        <div class="col-sm-8 form-group">
            <x-datepicker id="fecha_final" wire:model.lazy="fecha_final" />
        </div>
        @error('title')
            <div id="invalidTitleFeedback" class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
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
