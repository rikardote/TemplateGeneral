@props(['id'])

<input {{ $attributes }} id="{{ $id }}" type="text" class="form-select rounded-pill flatpickr"
    placeholder="MM/DD/YYYY" autocomplete="off">

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

    <script src="https://npmcdn.com/flatpickr/dist/l10n/es.js"></script>
    <script>
        $("#{{ $id }}").flatpickr({
            locale: "es",
            dateFormat: "d/m/Y"
        });
    </script>
@endpush
