@extends('layouts.secondmain')

@section('content')
    <main class="p-14 w-full">
        <h1 class="font-semibold font-serif text-4xl ">Formateur Information:</h1>
        <section class="mt-10 flex items-start gap-5">
            <img class="w-[64px]" src="{{asset("assets/profile.png")}}" alt="">
            <div class="w-full border-2 border-gray-300 rounded-md  p-7 flex flex-col gap-5 justify-between items-start">
                <table>
                        <tr>
                            <td class="font-semibold">Nom: </td>
                            <td>{{$formateur->nom}}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold">Prenom: </td>
                            <td>{{$formateur->prenom}}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold">Adresse: </td>
                            <td>{{$formateur->adresse}}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold">Ville: </td>
                            <td>{{$formateur->ville}}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold">Email: </td>
                            <td>{{$formateur->email}}</td>
                        </tr>
                </table>
                <div class="">
                    <div class="flex items-center gap-2">
                        <h2 class="font-semibold mb-1">Groupes:</h2>
                        @livewire("add-groupes", ["secteurs"=>$secteurs, "groupes" => $groupes, "userId"=>$formateur->id])
                    </div>
                    @foreach ($groupes as $groupe)
                        <p class=" capitalize">{{$groupe->filiere." ".$groupe->groupe}}</p>
                    @endforeach
                </div>
                <div></div>
            </div>
        </section>
    </main>
@endsection