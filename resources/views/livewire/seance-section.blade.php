<div class=" overflow-x-auto mt-7 flex flex-col gap-2">
    @foreach ($seance_absences as $seance_absence)
        @php
            $date = Carbon\Carbon::parse($seance_absence['datedebut']);
            $date->locale('fr_FR');
            $dayName = $date->isoFormat('dddd');
            $formattedDate = $dayName . ' ' . $date->format('d-m-Y');

            $debut = Carbon\Carbon::parse($seance_absence['datedebut']);
            $fin = Carbon\Carbon::parse($seance_absence['datefin']);

            $heure_debut = sprintf('%02d:%02d:%02d', $debut->hour, $debut->minute, $debut->second);

            $heure_fin = sprintf('%02d:%02d:%02d', $fin->hour, $fin->minute, $fin->second);

        @endphp

        <table onclick="absence_table({{ $seance_absence['id'] }})"
            class="absences_table relative w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead
                class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400 cursor-pointer">
                <tr class="text-[14px]">
                    <th scope="col" class="px-6 py-3 rounded-s-lg max-w-[20px] bg-gray-500 text-gray-50">
                        {{ $seance_absence['id'] }}
                    </th>
                    <th scope="col" class="px-6 py-3 w-1/6">
                        {{ $formattedDate }}
                    </th>
                    <th scope="col" class="px-6 py-3 w-1/6">
                        de {{ $heure_debut }} a {{ $heure_fin }}
                    </th>
                    <th scope="col" class="px-6 py-3 w-1/6">
                        GROUPE <span class="text-gray-500">{{ $seance_absence['groupe'] }}</span>
                    </th>
                    <th scope="col" class="px-6 py-3 w-1/6">
                        {{ $seance_absence['intitule'] }}
                    </th>
                    <th scope="col" class="px-6 py-3 w-1/6">
                        {{ $seance_absence['type'] }}
                    </th>
                    <th scope="col" class="px-6 py-3 rounded-e-lg flex items-center gap-1 cursor-pointer ">
                        <div class="flex items-center gap-3">
                            <p>(
                                @if (isset($seance_absence['absences']))
                                    {{ count($seance_absence['absences']) }}
                                @else
                                    0
                                @endif
                                )
                            </p>
                            <p class=" pointer-events-none">Absences</p>
                        </div>
                        <svg class="w-4" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M256 0a256 256 0 1 0 0 512A256 256 0 1 0 256 0zM127 281c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l71 71L232 136c0-13.3 10.7-24 24-24s24 10.7 24 24l0 182.1 71-71c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9L273 393c-9.4 9.4-24.6 9.4-33.9 0L127 281z" />
                        </svg>
                        <button wire:click="edit_seance({{ $seance_absence['id'] }})" id="edit_absence">
                            <svg class="w-4 ml-2 mb-1 hover:scale-125 transition-all duration-150"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path
                                    d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                            </svg>
                        </button>
                    </th>
                </tr>
            </thead>
            @if (isset($seance_absence['absences']))
                <tbody id="{{ $seance_absence['id'] }}" class="h-full hidden">
                    @foreach ($seance_absence['absences'] as $key => $value)
                        @livewire('livewire_absence_component', ['value' => $value, 'key' => $key, 'seanceId' => $seance_absence['id']])
                    @endforeach
                </tbody>
            @else
                <tbody id="{{ $seance_absence['id'] }}" class="hidden">
                    <tr>
                        <th colspan="7" class="text-center p-2">pas d'absences</th>
                    </tr>
                </tbody>
            @endif
        </table>
    @endforeach
    {{-- edit seance modal --}}
    @if ($seance)
        @php
            $date = Carbon\Carbon::parse($seance['datedebut']);
            $date = $date->toDateString();
            $heurefin = Carbon\Carbon::parse($seance['datefin']);
            $heurefin = $heurefin->format('H:i:s');

            $heuredebut = Carbon\Carbon::parse($seance['datedebut']);
            $heuredebut = $heuredebut->format('H:i:s');
        @endphp
        <div class="absolute left-0 top-0 bottom-0 right-0 bg-black/60"></div>
        <form wire:submit.prevent="handleUpdateForm"
            class="flex flex-col gap-3 absolute top-1/2 -translate-y-1/2 left-1/2 -translate-x-1/2  bg-white z-20 px-7 py-10 rounded-lg">
            <div class="flex gap-2 items-start">
                <div>
                    <label for="time"
                        class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">date:</label>
                    <div class="relative">
                        <input type="date" id="time"
                            class="  bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[130px] p-[11px] dark:bg-gray-700"
                            value="{{ $date }}" required />
                    </div>
                </div>
                <div>
                    <label for="time" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">heure
                        debut:</label>
                    <div class="relative">
                        <input wire:model="heure_debut" type="time" id="time"
                            class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-fit p-2.5 dark:bg-gray-700"
                            value="{{ $heuredebut }}" required />
                    </div>
                </div>
                <div>
                    <label for="time" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">heure
                        fin:</label>
                    <div class="relative">
                        <input wire:model="heure_fin" type="time" id="time"
                            class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-fit p-2.5 dark:bg-gray-700"
                            value="{{ $heurefin }}" required />
                    </div>
                </div>
                <div>
                    <label for="default"
                        class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                    <select wire:model="type_id" id="default"
                        class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-fit p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}"
                                {{ $seance['type_id'] == $type->id ? 'selected' : '' }}>{{ $type->type }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="default"
                        class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Salle</label>
                    <select wire:model="salle_id" id="default"
                        class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-fit p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($salles as $salle)
                            <option value="{{ $salle->id }}"
                                {{ $seance['salle_id'] == $salle->id ? 'selected' : '' }}>{{ $salle->salle }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="default"
                        class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Module</label>
                    <select wire:model="module_id" id="default"
                        class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block max-w-[200px] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($modules as $module)
                            <option value="{{ $module->id }}"
                                {{ $seance['module_id'] == $module->id ? 'selected' : '' }}>{{ $module->intitule }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="default"
                        class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Groupe</label>
                    <select wire:model="groupe_id" id="default"
                        class=" pointer-events-none bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-fit p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($groupes as $groupe)
                            <option {{ $seance['groupe_id'] == $groupe->groupe_id ? 'selected' : '' }} value="{{ $groupe->groupe_id }}">
                                {{ $groupe->groupe }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex gap-2 items-center">
                <button type="submit"
                    class="bg-[#25354f] transition-all w-fit px-4 py-3 flex gap-1 items-center rounded-md text-sm">
                    <svg class="w-4 mb-[1px]" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path fill="#ffffff"
                            d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V173.3c0-17-6.7-33.3-18.7-45.3L352 50.7C340 38.7 323.7 32 306.7 32H64zm0 96c0-17.7 14.3-32 32-32H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V128zM224 288a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                    </svg>
                    <p class="text-white font-semibold pointer-events-none">Save</p>
                </button>
                <button wire:click="refresh" type="button"
                    class="bg-[#ba4646] px-4 py-3 flex gap-1 items-center rounded-md text-sm">
                    <svg class="w-4 mb-[1px]" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path fill="#ffffff"
                            d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                    </svg>
                    <p class="text-white font-semibold pointer-events-none">Cancel</p>
                </button>
            </div>
        </form>
    @endif
    {{-- seance absence student MODAL --}}
    @if ($toEditStagiaire)
        <div class="absolute left-0 top-0 bottom-0 right-0 bg-black/40"></div>
        <form wire:submit.prevent="handleStagiaireAbsenceUpdateFullForm" id="main-form"
            class="flex flex-col gap-3 absolute top-1/2 -translate-y-1/2 left-1/2 -translate-x-1/2 w-[350px] h-[400px] bg-white z-20 px-7 py-10 rounded-lg">
            <button wire:click="setStagiaire(null)"
                class="w-[32px] absolute top-2 right-2 hover:scale-110 transition-all duration-150 cursor-pointer active:scale-100">
                <svg id="" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path fill="#f63c74"
                        d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm79 143c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z">
                    </path>
                </svg>
            </button>
            <div class="mt-4">
                <input value="{{ $toEditStagiaire->nom ." ". $toEditStagiaire->prenom }}" id="small" name="stagiaire"
                    class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-3">
            </div>
            <div>
                <select wire:model="etat_absence_select"
                    class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                    <option selected="" hidden="">Etat d'absence</option>
                    <!--[if BLOCK]><![endif]-->
                    <option value="1" {{$toEditStagiaire->etat_absence_id == 1 ? "selected" : ""}}>Justifié</option>
                    <option value="2" {{$toEditStagiaire->etat_absence_id == 2 ? "selected" : ""}}>Non justifié</option>
                    <option value="3" {{$toEditStagiaire->etat_absence_id == 3 ? "selected" : ""}}>autorisé</option>
                    <!--[if ENDBLOCK]><![endif]-->
                </select>
            </div>

            <div class="h-full">
                <textarea wire:model="observation" placeholder="observation"
                    id="small" name="jour_id"
                    class="h-full bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg block w-full px-3 py-4">{{ $toEditStagiaire->observation }}</textarea>
            </div>
            <button form="main-form" type="submit"
                class="bg-[#25354f] transition-all w-fit px-4 py-3 flex gap-1 items-center rounded-md text-sm">
                <svg class="w-4 mb-[1px]" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path fill="#ffffff"
                        d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V173.3c0-17-6.7-33.3-18.7-45.3L352 50.7C340 38.7 323.7 32 306.7 32H64zm0 96c0-17.7 14.3-32 32-32H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V128zM224 288a64 64 0 1 1 0 128 64 64 0 1 1 0-128z">
                    </path>
                </svg>
                <p class="text-white font-semibold pointer-events-none">Save</p>
            </button>
        </form>
    @endif
</div>
