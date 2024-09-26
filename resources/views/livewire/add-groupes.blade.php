<div>
    <button wire:click="addGroupes" class="flex items-center gap-1 bg-gray-300 p-1 rounded-full shadow-3 shadow-gray-400 mb-1 cursor-pointer">
        <svg class="w-2" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
            <path
                d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
        </svg>
    </button>
    @if ($add)
        <div
            class="p-7 bg-white w-[450px] h-[550px] rounded-lg absolute z-20 left-1/2 -translate-x-1/2 top-1/2 -translate-y-1/2">
            @php
                $array;
                foreach ($groupes as $groupe) {
                    $array[$groupe->filiere_id][$groupe->id] = $groupe->id;
                }
            @endphp
            @foreach ($secteurs as $secteur)
                <h1 class="font-semibold text-lg mb-1">{{ $secteur['secteur'] }}</h1>
                <div>
                    @foreach ($secteur['filieres'] as $filiere)
                        <h2 class="ml-1 capitalize text-sm">{{ $filiere['filiere'] }}</h2>
                        @foreach ($filiere['groupes'] as $groupe)
                            <div class="flex items-center mb-2 mt-3 ml-3">
                                <input type="checkbox"
                                    {{ isset($array[$filiere['id']]) && isset($array[$filiere['id']][$groupe['id']]) ? 'checked' : '' }}
                                    wire:click="handleCheckbox({{ $filiere['id'] }}, {{ $groupe['id'] }})"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label
                                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $groupe['groupe'] }}</label>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            @endforeach
            <div class="font-semibold bg-blue-600 text-white w-fit px-4 py-2 rounded-lg mt-5 fixed bottom-4 cursor-pointer" wire:click="done">Done</div>
        </div>
        <div wire:click="addGroupes" class="bg-black/60 absolute top-0 right-0 bottom-0 left-0"></div>
    @endif
</div>
