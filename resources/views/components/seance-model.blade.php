@props(['groupes', 'modules', 'salles', 'types', 'groupe_id', 'stagiaire_absence_array'])
<form wire:submit="handleAbsenceSeanceForm"
    class="flex flex-col gap-3 absolute top-1/2 -translate-y-1/2 left-1/2 -translate-x-1/2  bg-white z-20 px-7 py-10 rounded-lg">
    <div class="flex gap-2 items-start">
        <div>
            <label for="time" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">date:</label>
            <div class="relative">
                <input wire:model="date" type="date" id="time"
                    class="  bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[130px] p-[11px] dark:bg-gray-700"
                    value="" required />
            </div>
        </div>
        <div>
            <label for="time" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">heure
                debut:</label>
            <div class="relative">
                <input wire:model="heure_debut" type="time" id="time"
                    class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-fit p-2.5 dark:bg-gray-700"
                    value="08:30" required />
            </div>
        </div>
        <div>
            <label for="time" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">heure
                fin:</label>
            <div class="relative">
                <input wire:model="heure_fin" type="time" id="time"
                    class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-fit p-2.5 dark:bg-gray-700"
                    value="13:30" required />
            </div>
        </div>
        <div>
            <label for="default" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Type</label>
            <select wire:model="type_id" id="default"
                class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-fit p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->type }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="default" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Salle</label>
            <select wire:model="salle_id" id="default"
                class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-fit p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($salles as $salle)
                    <option value="{{ $salle->id }}">{{ $salle->salle }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="default" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Module</label>
            <select wire:model="module_id" id="default"
                class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block max-w-[200px] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($modules as $module)
                    <option value="{{ $module->id }}">{{ $module->intitule }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="default" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Groupe</label>
            <select wire:model="groupe_id" id="default"
                class=" pointer-events-none bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-fit p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($groupes as $groupe)
                    <option value="{{ $groupe->groupe_id }}">
                        {{ $groupe->groupe }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="flex flex-col gap-1 mb-2">
        <h1 class="font-semibold ">Les absences: ({{ count($stagiaire_absence_array) }})</h1>
        <div class=" text-sm font-semibold ml-1 w-fit min-h-[40px]  rounded-md px-4 py-2 shadow-black">
           <p class=" capitalize"> <span class="font-bold">-</span> abdessamad jema (Injustifie)</p>
           <p class=" capitalize"> <span class="font-bold">-</span> saad d jemoui (Injustifie)</p>
        </div>
    </div>

    {{-- <section class="w-full h-[250px] border-2 border-gray-300 rounded-lg shadow-black"></section> --}}
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
                viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path fill="#ffffff"
                    d="M463.5 224H472c13.3 0 24-10.7 24-24V72c0-9.7-5.8-18.5-14.8-22.2s-19.3-1.7-26.2 5.2L413.4 96.6c-87.6-86.5-228.7-86.2-315.8 1c-87.5 87.5-87.5 229.3 0 316.8s229.3 87.5 316.8 0c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0c-62.5 62.5-163.8 62.5-226.3 0s-62.5-163.8 0-226.3c62.2-62.2 162.7-62.5 225.3-1L327 183c-6.9 6.9-8.9 17.2-5.2 26.2s12.5 14.8 22.2 14.8H463.5z" />
            </svg>
            <p class="text-white font-semibold pointer-events-none">Cancel</p>
        </button>
    </div>
</form>
<div class="absolute left-0 right-0 top-0 bottom-0 bg-black/30 z-10"></div>
