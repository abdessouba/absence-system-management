@extends('layouts.main')
@section('content')
    <main class="p-5 h-full">
        <h1 class="font-semibold text-2xl">Les Seances:</h1>
        @livewire('seance-section', ['seance_absences' => $seance_absences])
    </main>
@endsection
<script>
    // window.onload = function() {
    //     const tables = document.getElementsByTagName("table");
    //     Array.from(tables).forEach((element) => {
    //         element.addEventListener("click", (event) => {
    //             event.target.parentElement.parentElement.nextElementSibling.classList.add("hidden")
    //         })
    //     })
    // }

    const absence_table = (id) => {
        const tbody = document.getElementById(id)
        tbody.classList.remove("hidden");
    }
</script>
