@props(['stagiaire_absences'])
<div id="show-stagiaire-model"
    class="animate-[fade-in_0.3s_ease-in-out] hidden absolute z-20 top-10 bottom-10 left-[130px] right-[30px] bg-white rounded-md">
    <table class="w-full h-full">
        <tr>
            <th class=" first-letter:capitalize px-2 py-4 border-r-2 border-gray-200 ">Jours</th>
            <th class=" first-letter:capitalize px-2 py-4 border-r-2 border-gray-200 w-1/12">janvier</th>
            <th class=" first-letter:capitalize px-2 py-4 border-r-2 border-gray-200 w-1/12">février</th>
            <th class=" first-letter:capitalize px-2 py-4 border-r-2 border-gray-200 w-1/12">mars</th>
            <th class=" first-letter:capitalize px-2 py-4 border-r-2 border-gray-200 w-1/12">avril</th>
            <th class=" first-letter:capitalize px-2 py-4 border-r-2 border-gray-200 w-1/12">mai</th>
            <th class=" first-letter:capitalize px-2 py-4 border-r-2 border-gray-200 w-1/12">juin</th>
            <th class=" first-letter:capitalize px-2 py-4 border-r-2 border-gray-200 w-1/12">juillet</th>
            <th class=" first-letter:capitalize px-2 py-4 border-r-2 border-gray-200 w-1/12">Août</th>
            <th class=" first-letter:capitalize px-2 py-4 border-r-2 border-gray-200 w-1/12">septembre</th>
            <th class=" first-letter:capitalize px-2 py-4 border-r-2 border-gray-200 w-1/12">octobre</th>
            <th class=" first-letter:capitalize px-2 py-4 border-r-2 border-gray-200 w-1/12">novembre</th>
            <th class=" first-letter:capitalize px-2 py-4 border-gray-200 w-1/12">décembre</th>
        </tr>
        <tbody class="text-sm text-center">
            @php
                
                $mois_day = [];
                $color;
                $total;

                $current_month = 0;
                foreach ($stagiaire_absences as $stagiaire_absence) {
                    $start_time = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $stagiaire_absence->datedebut);
                    $end_time = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $stagiaire_absence->datefin);
                    $diff_time = $start_time->diff($end_time);
                    $total = $diff_time->h + $diff_time->i / 60;
                    $month = $start_time->month;
                    $day = $start_time->day;

                    switch ($stagiaire_absence->etat_absence_id) {
                        case 1:
                            $color = 'bg-green-600 text-white';
                            break;
                        case 2:
                            $color = 'bg-red-400 text-white';
                            break;
                        case 3:
                            $color = 'bg-blue-400 text-white';
                            break;
                        
                    }

                    if ($current_month != $month) {
                        $mois_day[$month] = [];
                        $mois_day[$month][$day] = [$total, $color];
                        $current_month = $month;
                    } else {
                        $mois_day[$month][$day] = [$total, $color];
                    }
                    
                }

            @endphp
            @for ($j = 1; $j <= 31; $j++)
                <tr class='border border-gray-300'>
                    <th class="">{{ $j }}</th>
                    @for ($i = 1; $i <= 12; $i++)
                        <td class="{{ isset($mois_day[$i]) && isset($mois_day[$i][$j]) ? $mois_day[$i][$j][1] : '' }} border-l border-gray-200 font-semibold text-center">
                            {{ isset($mois_day[$i]) && isset($mois_day[$i][$j]) ? $mois_day[$i][$j][0] . 'h' : '' }}
                        </td>
                    @endfor
                </tr>
            @endfor
        </tbody>
    </table>
    <button id="hide-stagiaire-model-btn" type="button"
        class="bg-[#ba4646] px-[7px] py-1 absolute top-1 right-1 rounded-md text-sm hover:scale-105 active:scale-95 transition-all">
        <svg class="w-3" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
            <path fill="#ffffff"
                d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
        </svg>
    </button>
</div>
