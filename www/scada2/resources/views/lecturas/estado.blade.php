@if ($relay1 == 1) class="bg-secondary" @endif
                    @if ($tiempo > MONITOREO_LECTURA_OBSOLETA_SEGUNDOS) class="bg-warning"
            @elseif($datalogger->f_ED4 == 1 or $datalogger->f_ED5 == 1)
                class="bg-success"
            @else
                class="bg-info" @endif
