<div class="relative w-fit">
    <div class="relative">
        <input wire:model.live.debounce="search" type="text" placeholder="Search Student" name="search"
            class="w-[500px] px-6 py-4 rounded-full shadow-md">
        <svg class="absolute right-6 top-1/2 -translate-y-1/2 w-[28px]" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
            <path fill="#3b82f6"
                d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
        </svg>
    </div>
    @if (count($stagiaires))
        <section
            class="absolute top-[60px] w-full bg-white shadow-md shadow-gray-300 max-h-[260px] overflow-y-auto rounded-lg px-3 py-5 z-20">
            <ul class="flex flex-col gap-2">
                @foreach ($stagiaires as $stagiaire)
                    <li>
                        <a href="{{route("show", $stagiaire->id)}}" class="flex items-start gap-2 hover:bg-gray-200 transition-all cursor-pointer p-2 rounded-lg">
                            <img src="{{ asset('assets/default_stagaire_profile.png') }}"
                                class="w-[50px] h-[50px] bg-gray-200 rounded-full" />
                            <div class="text-sm">
                                <p>{{ $stagiaire->nom . ' ' . $stagiaire->prenom }}</p>
                                <p>{{ $stagiaire->tel }}</p>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </section>
    @endif
</div>
