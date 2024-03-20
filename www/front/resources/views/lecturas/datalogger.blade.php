    <table class=" table table-bordered table-condensed table-sm table-hover" style="font-size: small;">
        <thead>
            <tr>
                <td colspan="2" class=" bg-secondary text-center text-white">ESTACION</td>
                <td class=" bg-secondary text-center text-white">LECTURA</td>
                <td colspan="3" class=" bg-secondary text-center text-white">NIVELES</td>
                <td class=" bg-secondary text-center text-white">&nbsp;</td>
                <td colspan="3" class=" bg-secondary text-center text-white">BOMBA1</td>
                <td class=" bg-secondary text-center text-white">&nbsp;</td>
                <td colspan="3" class=" bg-secondary text-center text-white">BOMBA2</td>
                <td class=" bg-secondary text-center text-white">&nbsp;</td>
                <td colspan="3" class=" bg-secondary text-center text-white">BOMBA3</td>
                <td class=" bg-secondary text-center text-white">&nbsp;</td>
                <td colspan="2" class=" bg-secondary text-center text-white">TABLERO</td>
                <td class=" bg-secondary text-white text-end">

                    @if ($setting->f_iteracciones == 1)
                        <span id="btn-estado-lecturas" class="text-warning">
                            Revisar VPN o conexión de red
                        </span>
                    @endif


                    @if ($setting->f_detenerlecturas == 0)
                        <button class="btn btn-sm btn-success">
                            <i class="fa fa-spinner fa-pulse text-white"></i>
                            Leyendo
                        </button>
                    @else
                        <button class="btn btn-sm btn-danger">
                            Detenido
                        </button>
                    @endif



                </td>
            </tr>
        </thead>

        <tbody>

            @php
                define('MONITOREO_LECTURA_OBSOLETA_SEGUNDOS', 30);
                define('MAXIMO_RUIDO_POTENCIOMETROS', 30);
            @endphp

            @foreach ($dataloggers as $datalogger)
                @php

                    $EA1 = $EA2 = $EA3 = '';
                    $ea1_factor = $ea2_factor = $ea3_factor = 0;
                    $relay1 = $datalogger->f_SR1;

                    $ahora = new \Carbon\Carbon('America/Buenos_Aires');
                    $leido = \Carbon\Carbon::parse($datalogger->f_fecha);
                    $tiempo = $ahora->diffInSeconds($leido);

                    if (
                        $datalogger->getAnalogico('f_habilitado', 'EA1') == 1 and
                        MAXIMO_RUIDO_POTENCIOMETROS < $datalogger->f_EA1
                    ) {
                        $ea1_factor = $datalogger->getAnalogico('f_factor', 'EA1');
                        $ea1_real = ($datalogger->f_EA1 * $ea1_factor) / 1023;
                        $EA1 = round($ea1_real / 10, 2) . ' A';
                    }

                    if (
                        $datalogger->getAnalogico('f_habilitado', 'EA2') == 1 and
                        MAXIMO_RUIDO_POTENCIOMETROS < $datalogger->f_EA2
                    ) {
                        $ea2_factor = $datalogger->getAnalogico('f_factor', 'EA2');
                        $ea2_real = ($datalogger->f_EA2 * $ea2_factor) / 1023;
                        $EA2 = round($ea2_real / 10, 2) . ' A';
                    }

                @endphp

                <tr>
                    <td @include('lecturas.estado')>
                    </td>

                    {{-- ESTACION --}}
                    <th>
                        <div class=" text-dark text-opacity-50">
                            {{ $datalogger->placa->f_nombre }}
                        </div>
                    </th>

                    {{-- LECTURA --}}
                    <td class=" text-center">
                        <div class=" text-dark text-opacity-50">
                            {{ date('d M. H:i:s', strtotime($datalogger->f_fecha)) }}
                        </div>
                    </td>

                    {{-- NIVELES --}}
                    <td class=" text-center @if ($datalogger->f_ED1 == 1) nivel1 @endif">
                        <div class=" text-dark text-opacity-50">
                            {{ $datalogger->f_ED1 }}
                        </div>
                    </td>
                    <td class=" text-center @if ($datalogger->f_ED2 == 1) nivel2 @endif">
                        <div class=" text-dark text-opacity-50">
                            {{ $datalogger->f_ED2 == 1 ? 2 : null }}
                        </div>
                    </td>
                    <td class=" text-center @if ($datalogger->f_ED3 == 1) nivel3 @endif">
                        <div class=" text-dark text-opacity-50">
                            {{ $datalogger->f_ED3 == 1 ? 3 : null }}
                        </div>
                    </td>
                    <td class=" text-center">
                        &nbsp;
                    </td>

                    {{-- BOMBA 1 / AMPERAJE --}}
                    <td class="text-center bomba1" title="MARCHA">
                        @if ($datalogger->f_ED4 == 1)
                            <i class="fa fa-cog fa-pulse text-success"></i>
                        @else
                            <i class="fa fa-cog text-black-50 text-muted "></i>
                        @endif
                    </td>
                    <td class="text-center bomba1" title="AMPERAJE">
                        {{ $EA1 }}
                    </td>
                    <td class="text-center bomba1" title="FALLA">
                        @if ($datalogger->f_ED6 == 1)
                            <i class="fas fa-exclamation-triangle text-danger blink"></i>
                        @else
                            <i class="fas fa-exclamation-triangle text-danger text-muted"></i>
                        @endif
                    </td>
                    <td class=" text-center">

                    </td>

                    {{-- BOMBA 2 / AMPERAJE --}}
                    <td class="text-center bomba2">
                        @if ($datalogger->f_ED5 == 1)
                            <i class="fa fa-cog fa-pulse text-success"></i>
                        @else
                            <i class="fa fa-cog text-black-50 text-muted "></i>
                        @endif
                    </td>
                    <td class="text-center bomba2">
                        {{ $EA2 }}
                    </td>
                    <td class="text-center bomba2">

                        @if ($datalogger->f_ED7 == 1)
                            <i class="fas fa-exclamation-triangle text-danger blink"></i>
                        @else
                            <i class="fas fa-exclamation-triangle text-danger text-muted"></i>
                        @endif
                    </td>
                    <td class=" text-center">

                    </td>

                    {{-- BOMBA 3 / AMPERAJE --}}
                    <td class="text-center bomba3">
                        <i class="fa fa-cog text-black-50 text-muted "></i>
                    </td>
                    <td class="text-center bomba3">
                        &nbsp;
                    </td>
                    <td class="text-center bomba3">
                        <i class="fas fa-exclamation-triangle text-danger text-muted"></i>
                    </td>
                    <td class=" text-center">

                    </td>

                    {{-- TABLERO --}}
                    <td class=" text-center">
                        {{ round($datalogger->f_EA3 * 0.33) }} º
                    </td>
                    <td class=" text-center">
                        @if ($datalogger->f_ED8 == 1)
                            <i class="fas fa-exclamation-triangle text-danger blink"></i>
                        @else
                            <i class="fas fa-exclamation-triangle text-danger text-muted"></i>
                        @endif
                    </td>

                    {{-- SITUACION --}}
                    <td>
                        <div class=" text-dark text-opacity-50">
                            {{ $datalogger->f_situacion }}
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
