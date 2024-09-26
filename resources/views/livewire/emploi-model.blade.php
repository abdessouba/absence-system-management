<div id="optionsModel"
    class=" animate-[fade-in_.5s_ease-in-out] w-fit max-h-[690px] p-7 absolute z-30 left-1/2 -translate-x-1/2 top-0 bg-white shadow-3 rounded-xl">
    <h1 class="font-semibold text-3xl mb-5">Emplois du Temps {{ $emplois[0]->groupe }}</h1>
    <div class="flex flex-wrap gap-3 max-h-[480px] overflow-y-auto max-w-[660px]">
        @foreach ($emplois as $emploi)
            @php
                $heure_debut = Carbon\Carbon::createFromTimeString($emploi->heure_debut);
                $heure_fin = Carbon\Carbon::createFromTimeString($emploi->heure_fin);
                $escape = $heure_debut->diff($heure_fin);
                $escape_h = $escape->h;
                // form key
                $formKey = $emploi->id;
            @endphp
            {{-- @if ($escape_h > 0) --}}
            <form  id="{{$emploi->id}}" class="main-form flex flex-col gap-2">
                <input hidden value="{{$emploi->groupe_id}}" name="groupe_id"/>
                <div class="gap-2 flex items-center border p-3 rounded">
                    <div>
                        <select {{$emploi->id != $edit_id ? "disabled" : ""}} id="small"
                            name="jour_id"
                            class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg block w-fit p-2.5">
                            <option>Jour</option>
                            @foreach ($jours as $jour)
                                <option value="{{ $jour->id }}"
                                    {{ $emploi->jours_id == $jour->id ? 'selected' : '' }}>{{ $jour->jour }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full max-w-[7rem]">
                        <label for="start-time-thursday" class="sr-only">Heure Debut:</label>
                        <div class="relative">
                            <input {{$emploi->id != $edit_id ? "disabled" : ""}} name="heure_debut" type="time" 
                                class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-fit p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                value="{{ $escape_h > 0 ? $emploi->heure_debut : "" }}" required="">
                        </div>
                    </div>
                    <div class="w-full max-w-[7rem]">
                        <label for="end-time-thursday" class="sr-only">Heure Fin:</label>
                        <div class="relative">
                            <input {{$emploi->id != $edit_id ? "disabled" : ""}} name="heure_fin" type="time"
                                class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-fit p-2.5 "
                                value="{{ $escape_h > 0 ? $emploi->heure_fin : "" }}" required="">
                        </div>
                    </div>
                    {{-- <div>
                    <select id="small" wire:model="module_id"
                        class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg block max-w-[200px] p-2.5">
                        <option selected>Module</option>
                        @foreach ($modules as $module)
                            <option value="{{ $module->id }}">{{ $module->intitule }}</option>
                        @endforeach
                    </select>
                </div> --}}
                    <div>
                        <select {{$emploi->id != $edit_id ? "disabled" : ""}} name="salle_id" id="small"
                            class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg block w-[75px] p-2.5">
                            <option hidden>Salle</option>
                            @foreach ($salles as $salle)
                                <option {{ $emploi->salles_id == $salle->id ? 'selected' : '' }} value="{{ $salle->id }}">{{ $salle->salle }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <select {{$emploi->id != $edit_id ? "disabled" : ""}} name="type_id"
                            class=" uppercase bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg block p-2.5">
                            @foreach ($types as $type)
                                <option {{ $emploi->types_id == $type->id ? 'selected' : '' }} value="{{ $type->id }}">{{ $type->type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex items-center">
                        <button type="button"
                            class="inline-flex items-center p-1.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Delete</span>
                        </button>
                        @if($emploi->id != $edit_id)
                            <button wire:click="editId({{$emploi->id}})" type="button"
                                class="group inline-flex items-center p-1.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100">
                                <svg class="w-[18px] h-[18px] group-hover:hidden" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#808999" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>
                                <svg class="w-[18px] h-[18px] hidden group-hover:block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>
                                <span class="sr-only">edit</span>
                            </button>
                        @else
                            <button type="submit"
                                class="group inline-flex items-center p-1.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100">
                                <svg class="w-[18px] h-[18px] group-hover:hidden" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path fill="#636e83"
                                        d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V173.3c0-17-6.7-33.3-18.7-45.3L352 50.7C340 38.7 323.7 32 306.7 32H64zm0 96c0-17.7 14.3-32 32-32H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V128zM224 288a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                                </svg>
                                <svg class="w-[18px] h-[18px] hidden group-hover:block"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path
                                        d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V173.3c0-17-6.7-33.3-18.7-45.3L352 50.7C340 38.7 323.7 32 306.7 32H64zm0 96c0-17.7 14.3-32 32-32H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V128zM224 288a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                                </svg>
                                <span class="sr-only">save</span>
                            </button>
                        @endif
                    </div>
                    {{-- <button type="button group"
                        class="group inline-flex items-center p-1.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100">
                        <svg class=" group-hover:hidden w-[18px] h-[18px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#828287" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>
                        <svg class=" group-hover:block hidden w-[18px] h-[18px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#4e4e50" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>
                        <span class="sr-only">Edit</span>
                    </button> --}}
                </div>
            </form>
            {{-- @endif --}}
        @endforeach
    </div>
    <button type="button" class="block ml-auto text-sm mr-2 mt-4">+ add</button>
    <div class="flex items-center gap-2">
        {{-- <button form="main-form" type="submit" class="bg-[#25354f] px-4 py-3 flex gap-1 items-center rounded-md">
            <svg class="w-4 mb-[1px]" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path fill="#ffffff"
                    d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V173.3c0-17-6.7-33.3-18.7-45.3L352 50.7C340 38.7 323.7 32 306.7 32H64zm0 96c0-17.7 14.3-32 32-32H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V128zM224 288a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
            </svg>
            <p class="text-white font-semibold">Save</p>
        </button> --}}
        <button type="submit" class="bg-[#ba4646] px-4 py-3 flex gap-1 items-center rounded-md">
            <svg class="w-4 mb-[1px]" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path fill="#ffffff"
                    d="M463.5 224H472c13.3 0 24-10.7 24-24V72c0-9.7-5.8-18.5-14.8-22.2s-19.3-1.7-26.2 5.2L413.4 96.6c-87.6-86.5-228.7-86.2-315.8 1c-87.5 87.5-87.5 229.3 0 316.8s229.3 87.5 316.8 0c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0c-62.5 62.5-163.8 62.5-226.3 0s-62.5-163.8 0-226.3c62.2-62.2 162.7-62.5 225.3-1L327 183c-6.9 6.9-8.9 17.2-5.2 26.2s12.5 14.8 22.2 14.8H463.5z" />
            </svg>
            <p class="text-white font-semibold pointer-events-none">Reset</p>
        </button>
    </div>
    <svg id="second_model_btn"
        class="w-[32px] absolute top-2 right-2 hover:scale-110 transition-all duration-150 cursor-pointer active:scale-100"
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
        <path fill="#f63c74"
            d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm79 143c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z" />
    </svg>
</div>
