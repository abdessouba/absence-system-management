<main class="mt-10 w-[90%] m-auto">
    <div class="flex items-center justify-between px-4 sticky -top-10 py-4 bg-gray-50">
        <div class="mt-3">
            <h1 class="font-semibold text-3xl text-gray-500">Stagiaires</h1>
            @if ($absence)
                <button wire:click="handleAbsence" class="mt-3 ml-2 flex items-center gap-1 font-bold hover:underline cursor-pointer">
                    {{-- <svg class="mb-1 w-[15px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg> --}}
                    <svg class="mb-1 w-[15px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#0a6db8" d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V173.3c0-17-6.7-33.3-18.7-45.3L352 50.7C340 38.7 323.7 32 306.7 32H64zm0 96c0-17.7 14.3-32 32-32H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V128zM224 288a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                    <p class="text-sm pointer-events-none">Save</p>
                </button>
            @else
                <button wire:click="setAbsence(true)" class="mt-3 ml-2 flex items-center gap-1 font-bold hover:underline cursor-pointer">
                    <svg class="mb-1 w-[15px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>
                    <p class="text-sm pointer-events-none">L'absence</p>
                </button>
            @endif
        </div>
        <div class=" relative">
            <select wire:model.live="groupeId"
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
    <div class="overflow-hidden">
        <table class="w-full mt-3 shadow-xl rounded-xl text-gray-500 animate-[fade-in_1s_ease-in-out]">
            <theader>
                <tr class="text-[rgb(39,130,246)]">
                    <th class="py-4 w-2/6">Stagiaires</th>
                    <th class="py-4 w-1/6">Email</th>
                    <th class="py-4 w-1/6">Telephone</th>
                    <th class="py-4 w-1/6">Date Naissance</th>
                    <th class=" py-4">Ville</th>
                    <th class=" py-4">Action</th>
                </tr>
            </theader>
            <tbody class="">
                @foreach ($stagiaires as $stagiaire)
                    <tr class="text-center even:bg-gray-100">
                        <td class="flex gap-4 items-center py-2 pl-20 ">
                            @if ($absence)
                                <div class="flex items-center gap-2">
                                    <input wire:click="set_stagiaire_absence({{$stagiaire->id}})" type="checkbox" class="absence-checkBox w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <button wire:click="setStagiaire({{$stagiaire->id}})" class="active:scale-95 transition-all">
                                        <svg class="w-[17px] group-hover:hidden" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM216 336h24V272H216c-13.3 0-24-10.7-24-24s10.7-24 24-24h48c13.3 0 24 10.7 24 24v88h8c13.3 0 24 10.7 24 24s-10.7 24-24 24H216c-13.3 0-24-10.7-24-24s10.7-24 24-24zm40-208a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/></svg>
                                    </button>
                                </div>
                            @endif
                            <img src="{{ asset('assets/default_stagaire_profile.png') }}"
                                class="w-[64px] h-[64px] bg-gray-200 rounded-full" />
                            <p class="capitalize">{{ $stagiaire->nom . ' ' . $stagiaire->prenom }}</p>
                        </td>
                        <td class="py-2 ">{{ $stagiaire->email }}</td>
                        <td class="py-2 ">{{ $stagiaire->tel }}</td>
                        <td class="py-2 ">{{ $stagiaire->datenaissance }}</td>
                        <td class="py-2  first-letter:uppercase">Fes</td>
                        <td class="py-2 ">
                            <a href="{{route("show", $stagiaire->id)}}"
                                class="block m-auto px-3 py-1 w-[100px] border border-[rgb(39,130,246)] text-[rgb(39,130,246)] rounded-full hover:text-white hover:bg-[rgb(39,130,246)] transition-all duration-200 cursor-pointer">View</a>
                        </td>
                    </tr>
                @endforeach
                @if (count($stagiaires) == 0)
                    <tr>
                        <td colspan="6" class=" text-center py-4">no data yet!</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <p class="mt-2 text-sm font-semibold text-end mr-4 animate-[fade-in_1s_ease-in-out]" id="my-tooltip">{{ count($stagiaires) }} Stagiaires</p>
        
    @if ($stagiaireId)
        <form wire:submit="handleAbsenceForm" id="main-form" class="flex flex-col gap-3 absolute top-1/2 -translate-y-1/2 left-1/2 -translate-x-1/2 w-[350px] h-[400px] bg-white z-20 px-7 py-10 rounded-lg">
            <button wire:click="setStagiaire(null)" class="w-[32px] absolute top-2 right-2 hover:scale-110 transition-all duration-150 cursor-pointer active:scale-100">
                <svg id=""
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path fill="#f63c74"
                        d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm79 143c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
                </svg>
            </button>
            <div class="mt-4">
                <input value="{{$fullName->nom." ".$fullName->prenom}}" id="small" name="stagiaire" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-3"/>
            </div>
            <div>
                <select wire:model="etat_absence_select" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                    <option selected hidden>Etat d'absence</option>
                    @foreach ($etat_absences as $item)
                        <option value="{{$item->id}}">{{$item->etat_absence}}</option>
                    @endforeach
                </select>
            </div>

            <div class="h-full">
                <textarea wire:model="observation" placeholder="observation" id="small" name="jour_id" class="h-full bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg block w-full px-3 py-4"></textarea>
            </div>
            <button form="main-form" type="submit" class="bg-[#25354f] transition-all w-fit px-4 py-3 flex gap-1 items-center rounded-md text-sm">
                <svg class="w-4 mb-[1px]" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path fill="#ffffff"
                        d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V173.3c0-17-6.7-33.3-18.7-45.3L352 50.7C340 38.7 323.7 32 306.7 32H64zm0 96c0-17.7 14.3-32 32-32H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V128zM224 288a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                </svg>
                <p class="text-white font-semibold pointer-events-none">Save</p>
            </button>
        </form>
        <div class="absolute left-0 right-0 top-0 bottom-0 bg-black/30 z-10"></div>
    @endif
    @if ($seance)
        <x-seance-model :groupes="$groupes" :modules="$modules" :salles="$salles" :types="$types" :groupe_id="$groupe_id" :stagiaire_absence_array="$stagiaire_absence_array"/>
    @endif
</main>
