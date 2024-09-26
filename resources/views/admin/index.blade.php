@extends('layouts.secondmain')

@section('content')
    <main class="w-full h-screen p-10">

        <form class="max-w-md mx-auto">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="default-search"
                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-full bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search Stagiaires, Formateurs" required />
                <button type="submit"
                    class="text-white absolute end-2.5 bottom-2.5 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2"></button>
            </div>
        </form>

        <main class=" mt-16 text-gray-500">
            <div class="flex items-center justify-between gap-7">
                <section
                    class="group relative p-7 flex flex-col justify-between w-1/3 h-[200px] shadow-3 shadow-gray-300  rounded-3xl cursor-pointer transition-all">
                    <div class="font-semibold first-letter:uppercase text-2xl flex items-center gap-1">
                        <img src="{{ asset('assets/graduation-cap.png') }}" alt="">
                        <p class="hover:underline cursor-default">{{ $stagiaire_count }} Stagiaires</p>
                    </div>
                    <div class="ml-2 font-semibold first-letter:uppercase text-xl flex items-center gap-5">
                        <img class="w-[45px]" src="{{ asset('assets/people.png') }}" alt="">
                        <p class="hover:underline cursor-default">{{ $group_count }} Groups</p>
                    </div>
                    <div class="ml-2 mt-2 font-semibold first-letter:uppercase text-lg flex items-center gap-8">
                        <img class="w-[32px]" src="{{ asset('assets/git.png') }}" alt="">
                        <p class="hover:underline cursor-default">{{ $filiere_count }} filière</p>
                    </div>
                    <svg class="hidden group-hover:block absolute bottom-2 right-2 w-6 h-6"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z" />
                    </svg>
                </section>
                <section
                    class="group relative p-7 flex flex-col justify-between w-1/3 h-[200px] shadow-3 shadow-gray-300  rounded-3xl cursor-pointer transition-all">
                    <div class="font-semibold first-letter:uppercase text-2xl flex items-center gap-1">
                        <img class="w-[55px]" src="{{ asset('assets/teacher.png') }}" alt="">
                        <p class="hover:underline cursor-default">{{ $formateur_count }} Formateurs</p>
                    </div>
                    <div class="font-semibold first-letter:uppercase text-xl flex items-center gap-5">
                        <img class="w-[42px]" src="{{ asset('assets/classroom.png') }}" alt="">
                        <p class="hover:underline cursor-default">{{ $salle_count }} Salles</p>
                    </div>
                    <div></div>
                    <svg class="hidden group-hover:block absolute bottom-2 right-2 w-6 h-6"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z" />
                    </svg>
                </section>
                <section
                    class="group relative p-7 flex flex-col justify-between w-1/3 h-[200px] shadow-3 shadow-gray-300  rounded-3xl cursor-pointer transition-all">
                    <div class="font-semibold first-letter:uppercase gap-1">
                        <div class="flex items-center gap-2 text-3xl">
                            <img class="w-[64px]" src="{{ asset('assets/online-data.png') }}" alt="">
                            <p class="hover:underline cursor-default">{{ $absence_count }} Total D'bsence</p>
                        </div>
                        <ul class=" ml-[65px]">
                            <li>+ Justifiee: <span class=" text-green-500 ">{{ $absence_count_justifiee }}</span></li>
                            <li>+ Non Justifiee: <span class=" text-red-300 ">{{ $absence_count_non_justifiee }}</span>
                            </li>
                            <li>+ Autorise: <span class=" text-blue-300 ">{{ $absence_count_autorise }}</span></li>
                        </ul>
                    </div>
                    <div></div>
                    {{-- <svg class="hidden group-hover:block absolute bottom-2 right-2 w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z"/></svg> --}}
                </section>
            </div>
            <h1 class="mt-10 mb-5 text-2xl font-serif font-bold">L'absences récent</h1>
            <div class="">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                        Stagiaire
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Groupe
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                        Formateur
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        date
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        séance
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        l'etat d'absence
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($absences as $absence)
                                    @php
                                        $date = Carbon\Carbon::parse($absence->datedebut)->translatedFormat('d/m/Y');
                                        $debut = Carbon\Carbon::parse($absence->datedebut)->translatedFormat('H:i');
                                        $fin = Carbon\Carbon::parse($absence->datefin)->translatedFormat('H:i');
                                    @endphp
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                        <th scope="row"
                                            class="flex items-center gap-3 px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                            <img class="w-[48px]" src="{{ asset('assets/user.png') }}" alt="">
                                            <p class=" font-normal">
                                                {{ $absence->stagiaireNom . ' ' . $absence->stagiairePrenom }} </p>
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $absence->filiere . ' ' . $absence->groupe }}
                                        </td>
                                        <td class="capitalize px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                            {{ $absence->formateurNom . ' ' . $absence->formateurPrenom }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $date }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $debut . ' - ' . $fin }}
                                        </td>
                                        <td
                                            class=" capitalize {{ $absence->etat_absence_id == 1 ? 'text-green-500' : ($absence->etat_absence_id == 2 ? 'text-red-300' : 'text-blue-300') }} px-6 py-4">
                                            {{ $absence->etat_absence }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a class=" text-blue-600 font-semibold hover:underline"
                                                href="{{ route('show', $absence->stagiaire_id) }}">Show</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="flex justify-end mt-2">
                    {{ $absences->links() }}
                </div>
            </div>
        </main>

    </main>
@endsection
