<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authentification</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="bg-gray-200">
    <section class="flex items-center justify-center h-screen">
        <div class="flex h-full flex-wrap items-center justify-center text-neutral-800 dark:text-neutral-200 w-[60%]">
            <div class="w-full">
                <div class="block rounded-lg bg-white shadow-lg dark:bg-neutral-800">
                    <div class="g-0 lg:flex lg:flex-wrap">
                        <!-- Left column container-->
                        <div class="px-4 md:px-0 lg:w-6/12">
                            <div class="md:mx-6 md:p-12">
                                <!--Logo-->
                                <div class="text-center">
                                    <img class="mx-auto w-[80px]"
                                        src="{{asset("assets/gestion-du-temps.png")}}"
                                        alt="logo" />
                                    <h4 class="mb-12 mt-1 pb-1 text-xl font-semibold capitalize">
                                        gestionnaire de temps
                                    </h4>
                                </div>

                                <form method="POST" action="{{route("login.store")}}">
                                    @csrf
                                    <p class="mb-4">Please login to your account</p>
                                    <!--Username input-->
                                    <div class="relative mb-4" data-twe-input-wrapper-init>
                                        <input name="email" type="text"
                                            autocomplete="off"
                                            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                                            id="exampleFormControlInput1" placeholder="Username" />
                                        <label for="exampleFormControlInput1"
                                            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">Username
                                        </label>
                                    </div>

                                    <!--Password input-->
                                    <div class="relative mb-4" data-twe-input-wrapper-init>
                                        <input name="password" type="password"
                                            autocomplete="off"
                                            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-white dark:placeholder:text-neutral-300 dark:autofill:shadow-autofill dark:peer-focus:text-primary [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                                            id="exampleFormControlInput11" placeholder="Password" />
                                        <label for="exampleFormControlInput11"
                                            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">Password
                                        </label>
                                    </div>

                                    <!--Submit button-->
                                    <div class="mb-12 pb-1 pt-1 text-center">
                                        <button
                                            class="bg-gradient-to-r from-green-400 to-blue-500 mb-3 inline-block w-full rounded px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-dark-3 transition duration-150 ease-in-out hover:shadow-dark-2 focus:shadow-dark-2 focus:outline-none focus:ring-0 active:shadow-dark-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
                                            type="submit" data-twe-ripple-init data-twe-ripple-color="light"">
                                            Log in
                                        </button>

                                        <!--Forgot password link-->
                                        {{-- <a href="#!">Forgot password?</a> --}}
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Right column container with background and description-->
                        <div class="flex items-center rounded-b-lg lg:w-6/12 lg:rounded-e-lg lg:rounded-bl-none bg-gradient-to-r from-green-400 to-blue-500"/>
                            
                            <div class="px-4 py-6 text-white md:mx-6 md:p-12">
                                <h4 class="mb-6 text-xl font-semibold">
                                    We are more than just a company
                                </h4>
                                <p class="text-sm">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing
                                    elit, sed do eiusmod tempor incididunt ut labore et
                                    dolore magna aliqua. Ut enim ad minim veniam, quis
                                    nostrud exercitation ullamco laboris nisi ut aliquip ex
                                    ea commodo consequat.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
