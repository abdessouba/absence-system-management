@extends('layouts.main')
@section('content')
    <main class="h-full">
        <h1 class="font-semibold text-2xl">1) Information du Stagiaire:</h1>
        <section class="p-5 my-5 flex items-start gap-5">
            <img src="{{ asset('assets/default_stagaire_profile.png') }}"
                class="w-[64px] h-[64px] bg-gray-200 rounded-full" />
            <div class="flex justify-between items-start w-full border-gray-300 border-2 rounded-md p-7">
                <table>
                    <tr>
                        <td class=" font-semibold">Nom:</td>
                        <td class="italic px-4 py-1 first-letter:uppercase">{{ $stagiaire_infos->nom }}</td>
                    </tr>
                    <tr>
                        <td class=" font-semibold">Prenom:</td>
                        <td class="italic px-4 py-1 first-letter:uppercase">{{ $stagiaire_infos->prenom }}</td>
                    </tr>
                    <tr>
                        <td class=" font-semibold">Adresse:</td>
                        <td class="italic px-4 py-1 first-letter:uppercase">{{ $stagiaire_infos->adresse }}</td>
                    </tr>
                    <tr>
                        <td class=" font-semibold">Ville:</td>
                        <td class="italic px-4 py-1 first-letter:uppercase">{{ $stagiaire_infos->ville }}</td>
                    </tr>
                    <tr>
                        <td class=" font-semibold">Pay:</td>
                        <td class="italic px-4 py-1 first-letter:uppercase">{{ $stagiaire_infos->pays }}</td>
                    </tr>
                    <tr>
                        <td class=" font-semibold">Telephone:</td>
                        <td class="italic px-4 py-1 first-letter:uppercase">{{ $stagiaire_infos->tel }}</td>
                    </tr>
                    <tr>
                        <td class=" font-semibold">Email:</td>
                        <td class="italic px-4 py-1 first-letter:uppercase">{{ $stagiaire_infos->email }}</td>
                    </tr>
                    <tr>
                        <td class=" font-semibold">Date de Naissance:</td>
                        <td class="italic px-4 py-1 first-letter:uppercase">{{ $stagiaire_infos->datenaissance }}</td>
                    </tr>
                    <tr>
                        <td class=" font-semibold">Date d'inscription:</td>
                        <td class="italic px-4 py-1 first-letter:uppercase">{{ $stagiaire_infos->dateinscription }}</td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td class=" font-semibold">Secteur:</td>
                        <td class="italic px-4 py-1 first-letter:uppercase">{{ $stagiaire_infos->secteur }}</td>
                    </tr>
                    <tr>
                        <td class=" font-semibold">Filière:</td>
                        <td class="italic px-4 py-1 first-letter:uppercase">{{ $stagiaire_infos->filiere }}</td>
                    </tr>
                    <tr>
                        <td class=" font-semibold">Groupe:</td>
                        <td class="italic px-4 py-1 first-letter:uppercase">{{ $stagiaire_infos->groupe }}</td>
                    </tr>
                </table>
                <table></table>
            </div>
        </section>
        <h1 class="font-semibold text-2xl">2) Histoire D'absence:</h1>
        @php

            $justifiee = 0;
            $inJustifiee = 0;
            $autorisee = 0;

            foreach ($stagiaire_absences as $stagiaire_absence) {
                $start_time = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $stagiaire_absence->datedebut);
                $end_time = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $stagiaire_absence->datefin);
                $diff_time = $start_time->diff($end_time);

                $total_time = $diff_time->h + $diff_time->i / 60;

                if ($stagiaire_absence->etat_absence_id == 1) {
                    $justifiee += $total_time;
                }
                if ($stagiaire_absence->etat_absence_id == 2) {
                    $inJustifiee += $total_time;
                }
                if ($stagiaire_absence->etat_absence_id == 3) {
                    $autorisee += $total_time;
                }
            }

        @endphp

        <div class="ml-[100px] w-[93%] mt-5 border-2 border-gray-300 rounded-md p-5">
            <div class="w-[250px]">
                <div class="flex justify-between">
                    <p class="font-semibold">Absence Justifiée: </p>
                    <p class="italic px-2 py-1 text-left text-green-600">{{ $justifiee }}h</p>
                </div>
                <div class="flex justify-between">
                    <p class="font-semibold">Absence non Justifiée: </p>
                    <p class="italic px-2 py-1 text-left text-red-400">{{ $inJustifiee }}h</p>
                </div class="flex justify-between">
                <div class="flex justify-between">
                    <p class="font-semibold">Absence Autorisée: </p>
                    <p class="italic px-2 py-1 text-left text-blue-500">{{ $autorisee }}h</p>
                </div>
            </div>
            <button id="show-stagiaire-model-btn"
                class="mt-2 flex gap-2 items-start border-2 border-gray-300 py-3 px-4 rounded-full">
                <img class="w-6" src="{{ asset('assets/details.png') }}" alt="">
                <p class="font-semibold pointer-events-none">DETAILS</p>
            </button>
        </div>
        <x-calendar-model :stagiaire_absences="$stagiaire_absences" />
        <div id="stagiaire_model_fog" class="hidden absolute left-0 right-0 top-0 bottom-0 bg-black/30 z-10"></div>
        <script>
            const show_stagiaire_model = document.getElementById("show-stagiaire-model")
            const show_stagiaire_model_btn = document.getElementById("show-stagiaire-model-btn")
            const hide_stagiaire_model_btn = document.getElementById("hide-stagiaire-model-btn")
            const stagiaire_model_fog = document.getElementById("stagiaire_model_fog")

            show_stagiaire_model_btn.addEventListener("click", () => {
                show_stagiaire_model.classList.remove("hidden")
                show_stagiaire_model.classList.add("block")
                stagiaire_model_fog.classList.remove("hidden")
                stagiaire_model_fog.classList.add("block")
            })
            hide_stagiaire_model_btn.addEventListener("click", () => {
                show_stagiaire_model.classList.remove("block")
                show_stagiaire_model.classList.add("hidden")
                stagiaire_model_fog.classList.remove("block")
                stagiaire_model_fog.classList.add("hidden")
            })
        </script>
    </main>
@endsection
