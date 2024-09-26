@extends('layouts.secondmain')

@section('content')
    <main class="p-10 w-full">
        <div class=" flex items-center justify-between">
            <h1 class="mt-10 mb-5 text-4xl font-serif font-bold capitalize">tous les stagiaires</h1>
            @livewire("add-stagiaire")
        </div>
        <div class="">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 bg-gray-100 uppercase dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-4 dark:bg-gray-800">
                                    Stagiaire
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    Groupe
                                </th>
                                <th scope="col" class="px-6 py-4  dark:bg-gray-800">
                                    Formateur
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    date naissance
                                </th>
                                <th scope="col" class="px-6 py-4">
                                    date inscription
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    numéro
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    ville
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($absences as $absence)
                                @php
                                    $datenaissance = Carbon\Carbon::parse($absence->datenaissance)->translatedFormat('d/m/Y');
                                    $dateinscription = Carbon\Carbon::parse($absence->dateinscription)->translatedFormat('d/m/Y');
                
                                @endphp
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <th scope="row"
                                        class="flex items-center gap-3 px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                        <img class="w-[48px]" src="{{ asset('assets/user.png') }}" alt="">
                                        <p class=" font-normal">
                                            {{ $absence->stagiaireNom . ' ' . $absence->stagiairePrenom }} </p>
                                    </th>
                                    <td class="px-6 py-4 capitalize">
                                        {{ $absence->filiere . ' ' . $absence->groupe }}
                                    </td>
                                    <td class="capitalize px-6 py-4 bg-gray-50 dark:bg-gray-800">
                                        <p>
                                            {{ $absence->formateurNom . ' ' . $absence->formateurPrenom }}
                                        </p>
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$datenaissance}}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{$dateinscription}}
                                    </td>
                                    <td class="px-6 py-4">
                                        <p class=" font-normal">
                                            {{ $absence->tel }} </p>
                                    </td>
                                    <td class="px-6 py-4">
                                        <p class=" font-normal uppercase">
                                            {{ $absence->stagiaireVille }} </p>
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
    </main>
@endsection
