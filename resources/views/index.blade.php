@extends('layouts.main')
@section('content')
    <header class="flex items-center justify-between">
        <livewire:search/>
        <div class="flex items-center gap-3">
            <div class="border-[2px] p-[3px] rounded-full border-[rgb(39,130,246)]">
                <img src="{{ asset('assets/default_profile.png') }}" class="w-[64px] h-[64px] bg-gray-200 rounded-full" />
            </div>
            <div>
                <p class=" capitalize">{{Auth::user()->nom}}</p>
            </div>
        </div>
    </header>
    <livewire:stagiaires/>
@endsection
