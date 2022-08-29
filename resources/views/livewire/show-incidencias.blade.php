<div>
    @if (count($incidencias) > 0)
        <table class="table table-responsive table-striped table-sm">
            <thead class="table-info">
                <tr>
                    <th>Qna</th>
                    <th>Codigo</th>
                    <th>Fecha Inicial</th>
                    <th>Fecha Final</th>
                    <th>Periodo</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($incidencias as $incidencia)
                    <tr>
                        <td>{{ $incidencia->qna->qna }}/{{ $incidencia->qna->year }}</td>
                        <td>{{ $incidencia->codigo->code }}</td>
                        <td>{{ $incidencia->fecha_inicio->format('d/m/Y') }}</td>
                        <td>{{ $incidencia->fecha_final->format('d/m/Y') }}</td>
                        <td>{{ $incidencia->periodo->fullDescription ?? '' }}</td>
                        <td>{{ $incidencia->total_dias }}</td>
                        <td>
                            <a wire:click="deleteIncidencia('{{ $incidencia->token }}')" class="fa fa-trash"></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
