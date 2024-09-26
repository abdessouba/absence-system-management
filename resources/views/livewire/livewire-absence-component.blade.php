<tr class="bg-white dark:bg-gray-800">
    <th class="text-center font-bold text-[14px]">
        @if (isset($edit[$key]) && $edit[$key])
            <button form="absence_form">
                <svg wire:click="editStagiaire({{ $key }}, false)" class="w-4 m-auto cursor-pointer"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path
                        d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V173.3c0-17-6.7-33.3-18.7-45.3L352 50.7C340 38.7 323.7 32 306.7 32H64zm0 96c0-17.7 14.3-32 32-32H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V128zM224 288a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                </svg>
            </button>
            <button wire:click="deleteStagiaireAbsence({{ $key }}, {{ $seanceId }})">
                <svg class="w-4 m-auto cursor-pointer" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path fill="#e13748"
                        d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm88 200H296c13.3 0 24 10.7 24 24s-10.7 24-24 24H152c-13.3 0-24-10.7-24-24s10.7-24 24-24z" />
                </svg>
            </button>
        @else
            <button>
                <svg wire:click="editStagiaire({{ $key }}, true)" class="w-4 m-auto cursor-pointer"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path
                        d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z" />
                </svg>
            </button>
        @endif
    </th>
    <th colspan="6" scope="row"
        class="flex gap-2 items-center capitalize px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        <img src="{{ asset('assets/default_stagaire_profile.png') }}"
            class="w-[48px] h-[48px] bg-gray-200 rounded-full" />
        <div class="">
            <p>{{ $value['nom'] }} {{ $value['prenom'] }}</p>
            @if (isset($edit[$key]) && $edit[$key])
                <form wire:submit="saveAbsence({{ $key }}, {{ $seanceId }})"
                    class="flex items-center gap-2 max-w-sm mx-auto" id="absence_form">
                    <select wire:model="absence" id="underline_select"
                        class="block py-2 px-1 w-full text-xs text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                        <option value="1">Justifié</option>
                        <option value="2">Non justifie</option>
                        <option value="3">Autorisé</option>
                    </select>
                    <button type="button" wire:click="handleEditStudent({{ $key }}, {{ $seanceId }})">
                        <svg class="w-[17px] group-hover:hidden" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z">
                            </path>
                        </svg>
                    </button>
                </form>
            @else
                <p
                    class="text-xs font-semibold 
            {{ $value['etat_absence_id'] == 1
                ? 'text-green-600'
                : ($value['etat_absence_id'] == 2
                    ? 'text-red-500'
                    : 'text-blue-500') }}">
                    {{ $value['etat_absence'] }}
                </p>
            @endif
        </div>
    </th>

</tr>
