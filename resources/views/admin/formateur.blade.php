@extends('layouts.secondmain')

@section('content')
    <main class="p-10 w-full">
        <div class="flex items-center justify-between">
            <h1 class="text-4xl font-semibold font-serif my-7">Les Formateurs:</h1>
            @livewire("add-utilisateur")
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">


            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-900 uppercase dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Formateur
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Adresse
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Ville
                            </th>
                            <th scope="col" class="px-6 py-3">
                                type
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($utilisateurs as $utilisateur)
                            <tr class="bg-white dark:bg-gray-800">
                                <th scope="row"
                                    class="flex items-center gap-2 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <img class="w-[48px]" src="{{ asset('assets/profile.png') }}">
                                    <p class=" capitalize">{{$utilisateur->nom. " " . $utilisateur->prenom}}</p>
                                </th>
                                <td class="px-6 py-4">
                                    {{$utilisateur->adresse}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$utilisateur->email}}
                                </td>
                                <td class="px-6 py-4">
                                    {{$utilisateur->ville}}
                                </td>
                                <td class=" {{$utilisateur->isAdmin == 1 ? "text-green-500" : "text-red-300"}} px-6 py-4 capitalize">
                                    {{$utilisateur->isAdmin == 1 ? "admin" : "not admin"}}
                                </td>
                                <td>
                                    @if (!$utilisateur->isAdmin)
                                        <a  class=" text-blue-600 font-semibold hover:underline cursor-pointer" href="{{route("admin.formateur.show", $utilisateur->id)}}">show</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
