<div class="mt-10 w-[90%] m-auto relative">
    <div class="mt-1 px-2 font-semibold text-lg flex items-center justify-between">
        <h1 class="font-semibold text-2xl">Emploi du Temps</h1>
        <div class=" relative">
            <select wire:model.live="groupe_id"
                class="block w-fit px-4 py-3 text-xl text-gray-900 border font-bold border-gray-300 bg-gray-50 rounded-full focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($groupes as $groupe)
                    <option value="{{ $groupe->groupe_id }}">DD{{ $groupe->groupe }}</option>
                @endforeach
            </select>
            <svg class="w-5 absolute top-2 right-1 bg-gray-50 p-1 rounded-xl pointer-events-none"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 320 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path
                    d="M182.6 470.6c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-9.2-9.2-11.9-22.9-6.9-34.9s16.6-19.8 29.6-19.8H288c12.9 0 24.6 7.8 29.6 19.8s2.2 25.7-6.9 34.9l-128 128z" />
            </svg>
        </div>
    </div>
    <div id="content" class="max-w-full overflow-x-hidden">
        <div>
            <table class="shadow-4 mt-10 w-full">
                <thead class="bg-gray-100">
                    <tr class="border-b">
                        <th class="p-5">j/h</th>
                        <th class="p-5 border-r-2 border-black-300" colspan="2">8:30 - 9:30</th>
                        <th class="p-5 border-r-2 border-black-300" colspan="2">9:30 - 10:30</th>
                        <th class="p-5 border-r-2 border-black-300" colspan="2">10:30 - 11:30</th>
                        <th class="p-5 border-r-2 border-black-300" colspan="2">11:30 - 12:30</th>
                        <th class="p-5 border-r-2 border-black-300" colspan="2">12:30 - 13:30</th>
                        <th class="p-5 border-r-2 border-black-300" colspan="2">13:30 - 14:30</th>
                        <th class="p-5 border-r-2 border-black-300" colspan="2">14:30 - 15:30</th>
                        <th class="p-5 border-r-2 border-black-300" colspan="2">15:30 - 16:30</th>
                        <th class="p-5 border-r-2 border-black-300" colspan="2">16:30 - 17:30</th>
                        <th class="p-5" colspan="2">17:30 - 18:30</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($emplois as $emploi)
                        @php
                            $heure_debut = Carbon\Carbon::createFromTimeString($emploi->heure_debut);
                            // colspan escape
                            $start = Carbon\Carbon::createFromTimeString('08:30:00');
                            $escape = $start->diff($heure_debut);
                            $escape_h = $escape->h;
                            $escape_m = $escape->i >= 30 ? 0.5 : 0;
                            $escape_cols = ($escape_h + $escape_m) * 2;
                            // set emploi time
                            $heure_fin = Carbon\Carbon::createFromTimeString($emploi->heure_fin);
                            $time_diff = $heure_debut->diff($heure_fin);
                            $hours = $time_diff->h;
                            $minutes = $time_diff->i >= 30 ? 0.5 : 0;
                            $cols = ($hours + $minutes) * 2;

                            $jour = ''; 

                            switch ($emploi->jours_id) {
                                case 1:
                                    $jour = 'L';
                                    break;
                                case 2:
                                    $jour = 'M';
                                    break;
                                case 3:
                                    $jour = 'M';
                                    break;
                                case 4:
                                    $jour = 'J';
                                    break;
                                case 5:
                                    $jour = 'V';
                                    break;
                                case 6:
                                    $jour = 'S';
                                    break;
                                
                            }
                            // dump($escape_m)
                        @endphp
                        <tr class="border-b">
                            <th class="p-5 font-bold bg-gray-100">{{ $jour }}</th>
                            @if ($escape_cols / 2 > 0)
                                <td colspan="{{ $escape_cols }}"></td>
                            @endif
                            @if ($cols / 2 > 0)
                                <td class="p-5 bg-sky-300 text-center font-semibold text-gray-50 italic cursor-pointer hover:shadow-lg transition-all capitalize"
                                    colspan="{{ $cols }}">{{$emploi->nom ." ". $emploi->prenom}} ({{ $cols / 2 }}h)</td>
                            @endif
                        </tr>
                    @endforeach

                    {{-- for colspan --}}
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="px-2 flex items-center justify-between gap-1 -mt-7 z-20 absolute left-0 right-0 -bottom-10">
        <div id="print" class="flex items-center gap-1 cursor-pointer hover:underline">
            <svg class="w-[18px]" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path
                    d="M128 0C92.7 0 64 28.7 64 64v96h64V64H354.7L384 93.3V160h64V93.3c0-17-6.7-33.3-18.7-45.3L400 18.7C388 6.7 371.7 0 354.7 0H128zM384 352v32 64H128V384 368 352H384zm64 32h32c17.7 0 32-14.3 32-32V256c0-35.3-28.7-64-64-64H64c-35.3 0-64 28.7-64 64v96c0 17.7 14.3 32 32 32H64v64c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V384zM432 248a24 24 0 1 1 0 48 24 24 0 1 1 0-48z" />
            </svg>
            <a href="{{ route('emploi.show', 1) }}" class="font-semibold cursor-pointer">print</a>
        </div>
        <div id="options" class="flex items-center gap-1 cursor-pointer hover:underline ">
            <svg class="w-[18px]" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path
                    d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z" />
            </svg>
            <button class="font-semibold pointer-events-none">Advanced Options</button>
        </div>
    </div>
    <livewire:emploi-model :emplois="$emplois"/>
    
</div>
