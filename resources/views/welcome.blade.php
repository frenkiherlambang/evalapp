<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LiterasiGuru</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .hamburger svg>:first-child,
        .hamburger svg>:nth-child(2),
        .hamburger svg>:nth-child(3) {
            transform-origin: center;
            transform: rotate(0deg)
        }

        .hamburger svg>:first-child {
            transition: y .1s ease-in .25s, transform .22s cubic-bezier(.55, .055, .675, .19), opacity .1s ease-in
        }

        .hamburger svg>:nth-child(2) {
            transition: transform .22s cubic-bezier(.55, .055, .675, .19)
        }

        .hamburger svg>:nth-child(3) {
            transition: y .1s ease-in .25s, transform .22s cubic-bezier(.55, .055, .675, .19), width .1s ease-in .25s
        }

        .hamburger.active svg>:first-child {
            opacity: 0;
            y: 11;
            transform: rotate(225deg);
            transition: y .1s ease-out, transform .22s cubic-bezier(.215, .61, .355, 1) .12s, opacity .1s ease-out .12s
        }

        .hamburger.active svg>:nth-child(2) {
            transform: rotate(225deg);
            transition: transform .22s cubic-bezier(.215, .61, .355, 1) .12s
        }

        .hamburger.active svg>:nth-child(3) {
            y: 11;
            transform: rotate(135deg);
            transition: y .1s ease-out, transform .22s cubic-bezier(.215, .61, .355, 1) .12s, width .1s ease-out
        }
    </style>
</head>

<body class="antialiased">
    <div class="flex flex-col min-h-screen overflow-hidden supports-[overflow:clip]:overflow-clip">
        <header x-data="{ scrolled: false }" x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 0 })"
            :class="{
                'fixed w-full z-30 md:bg-opacity-90 transition duration-300 ease-in-out ': true,
                'fixed w-full z-30 md:bg-opacity-90 transition duration-300 ease-in-out bg-white backdrop-blur-sm shadow-lg': scrolled
            }">
            <div class="max-w-6xl mx-auto px-5 sm:px-6">
                <div class="flex items-center justify-between h-16 md:h-20">
                    <div class="shrink-0 mr-4"><a class="block" aria-label="Cruip" href="/">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40"
                                height="40" viewBox="0 0 511.63 511.63"
                                style="enable-background:new 0 0 511.63 511.63;" xml:space="preserve">
                                <g>
                                    <path
                                        d="M452.098,172.443c-15.317-16.368-36.206-24.457-62.67-24.267c-14.66-11.421-31.601-17.129-50.819-17.129
		c-4.186,0-8.278,0.284-12.278,0.855c-10.849-6.28-22.176-9.803-33.972-10.562V73.089c0-19.985-7.225-37.163-21.697-51.534
		C256.196,7.187,238.969,0,218.985,0c-19.607,0-36.641,7.233-51.108,21.698c-14.465,14.469-21.698,31.599-21.698,51.394v106.78
		c-11.419-4.185-23.601-6.279-36.545-6.279c-23.22,0-41.208,7.758-53.959,23.267c-12.753,15.514-19.126,35.166-19.126,58.957
		c0,7.231,1.663,13.849,4.996,19.841c3.333,5.992,8.042,11.232,14.134,15.705c6.089,4.469,12.085,8.322,17.987,11.56
		c5.901,3.241,12.752,6.759,20.557,10.564c7.803,3.806,13.701,6.95,17.7,9.421c10.467,6.656,22.744,16.18,36.829,28.545
		c0.572,0.386,2.19,1.721,4.854,4c2.667,2.286,4.714,4.093,6.139,5.428c1.427,1.334,3.474,3.285,6.136,5.852
		c2.664,2.566,4.805,4.856,6.423,6.852c1.615,1.995,3.33,4.144,5.137,6.427c1.809,2.279,3.14,4.517,3.999,6.707
		s1.287,4.237,1.287,6.14v82.228c0,10.089,3.568,18.698,10.705,25.837c7.139,7.139,15.752,10.708,25.841,10.708h182.716
		c10.088,0,18.705-3.569,25.844-10.708c7.132-7.135,10.708-15.748,10.708-25.837v-82.228c0-11.231,5.616-32.456,16.848-63.666
		c13.134-35.978,19.694-66.626,19.694-91.933C475.077,210.418,467.429,188.814,452.098,172.443z M396.573,469.657
		c-3.621,3.614-7.905,5.428-12.854,5.428s-9.227-1.817-12.847-5.428c-3.614-3.613-5.421-7.898-5.421-12.847
		s1.807-9.232,5.421-12.847c3.62-3.617,7.898-5.428,12.847-5.428s9.232,1.811,12.854,5.428c3.613,3.614,5.421,7.898,5.421,12.847
		S400.184,466.044,396.573,469.657z M429.405,289.933c-6.092,18.75-12.183,37.164-18.274,55.251
		c-6.091,18.079-9.137,33.975-9.137,47.674v9.134h-182.72v-9.134c0-13.511-5.424-26.833-16.272-39.968
		c-4.76-5.708-14.849-15.327-30.264-28.838c-15.415-13.703-29.215-24.366-41.396-31.978c-3.999-2.478-10.183-5.995-18.558-10.567
		c-26.458-12.56-39.687-21.121-39.687-25.693c0-13.513,2.902-24.506,8.709-32.976c5.802-8.47,15.082-12.703,27.834-12.703
		c8.186,0,16.228,1.427,24.126,4.283c7.898,2.852,14.372,5.992,19.414,9.419s10.278,6.567,15.703,9.423
		c5.429,2.855,10.044,4.283,13.849,4.283V73.092c0-9.514,3.666-17.983,10.994-25.41c7.327-7.421,15.843-11.132,25.553-11.132
		c9.898,0,18.462,3.615,25.697,10.848c7.233,7.232,10.848,15.798,10.848,25.697v94.501c3.239-2.858,7.756-5.236,13.56-7.139
		c5.805-1.903,11.088-2.856,15.845-2.856c13.135,0,24.455,5.042,33.969,15.131c6.092-3.427,12.662-5.14,19.705-5.14
		c7.042,0,14.037,1.667,20.984,4.996c6.943,3.333,11.939,7.854,14.985,13.562c5.708-0.95,11.036-1.427,15.985-1.427
		c31.781,0,47.681,17.985,47.681,53.958C438.546,254.099,435.497,271.186,429.405,289.933z" />
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                            </svg>
                        </a></div>
                    @guest
                        <nav class="hidden md:flex md:grow">
                            <ul class="flex grow justify-end flex-wrap items-center">
                                <li><a class=" font-medium text-gray-600 hover:text-gray-900 px-5 py-3 flex items-center transition duration-150 ease-in-out"
                                        href="{{ route('login') }}">Sign in</a></li>
                                <li>
                                    {{-- add sign up button --}}
                                    <a class="rounded px-4 py-2 flex items-center text-gray-200 bg-gray-900 hover:bg-gray-800 ml-3"
                                        href="{{ route('register') }}">Sign up
                                        <svg class="w-3 h-3 fill-current text-gray-400 shrink-0 ml-2 -mr-1"
                                            viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.707 5.293L7 .586 5.586 2l3 3H0v2h8.586l-3 3L7 11.414l4.707-4.707a1 1 0 000-1.414z"
                                                fill-rule="nonzero"></path>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    @endguest
                    @auth
                        <nav class="hidden md:flex md:grow">
                            <ul class="flex grow justify-end flex-wrap items-center">

                                <li>
                                    {{-- add sign up button --}}
                                    <a class="rounded px-4 py-2 flex items-center text-gray-200 bg-gray-900 hover:bg-gray-800 ml-3"
                                        href="{{ route('users.dashboard') }}">Dashboard
                                        <svg class="w-3 h-3 fill-current text-gray-400 shrink-0 ml-2 -mr-1"
                                            viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.707 5.293L7 .586 5.586 2l3 3H0v2h8.586l-3 3L7 11.414l4.707-4.707a1 1 0 000-1.414z"
                                                fill-rule="nonzero"></path>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    @endauth
                    <div x-data="{ open: false }" class="flex md:hidden">
                        <button x-on:click="open = !open" :class="{ 'hamburger': true, 'active': open, 'false': !open }"
                            aria-controls="mobile-nav" aria-expanded="false">
                            <span class="sr-only">Menu</span><svg class="w-6 h-6 fill-current text-gray-900"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <rect y="4" width="24" height="2"></rect>
                                <rect y="11" width="24" height="2"></rect>
                                <rect y="18" width="24" height="2"></rect>
                            </svg></button>
                        <div x-show="open" x-on:click.away="open = false"
                            x-transition:enter="transition duration-300 ease-in-out"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                            <nav id="mobile-nav"
                                class="absolute top-full h-screen pb-16 z-20 left-0 w-full overflow-scroll bg-white opacity-100 translate-y-0">
                                <ul class="px-5 py-2">
                                    <li><a class="flex font-medium w-full text-gray-600 hover:text-gray-900 py-2 justify-center"
                                            href="/signin">Sign in</a></li>
                                    <li><a class="rounded px-4 py-2 flex items-center justify-center text-gray-200 bg-gray-900 hover:bg-gray-800 w-full my-2"
                                            href="/signup"><span>Sign up</span><svg
                                                class="w-3 h-3 fill-current text-gray-400 shrink-0 ml-2 -mr-1"
                                                viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.707 5.293L7 .586 5.586 2l3 3H0v2h8.586l-3 3L7 11.414l4.707-4.707a1 1 0 000-1.414z"
                                                    fill="#999" fill-rule="nonzero"></path>
                                            </svg></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main class="grow">
            <section class="relative w-full flex items-center flex-col h-screen">
                {{-- <div class="absolute left-1/2 transform -translate-x-1/2 bottom-0 pointer-events-none -z-1"
                    aria-hidden="true">
                    <svg width="1360" height="578" viewBox="0 0 1360 578" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <linearGradient x1="50%" y1="0%" x2="50%" y2="100%"
                                id="illustration-01">
                                <stop stop-color="#FFF" offset="0%"></stop>
                                <stop stop-color="#EAEAEA" offset="77.402%"></stop>
                                <stop stop-color="#DFDFDF" offset="100%"></stop>
                            </linearGradient>
                        </defs>
                        <g fill="url(#illustration-01)" fill-rule="evenodd">
                            <circle cx="1232" cy="128" r="128"></circle>
                            <circle cx="155" cy="443" r="64"></circle>
                        </g>
                    </svg>
                </div> --}}
                <div class="max-w-6xl h-full flex flex-col items-center justify-center mx-auto px-4 sm:px-6">
                    <div class="pt-32 pb-12 md:pt-40 md:pb-20">
                        <div class="text-center pb-12 md:pb-16">
                            <h1 class="text-3xl md:text-4xl font-bold leading-tighter tracking-tighter mb-4 aos-init aos-animate"
                                data-aos="zoom-y-out">Kembangkan Literasi Anda dengan LiterasiGuru</span>
                            </h1>
                            <div class="max-w-3xl mx-auto">
                                <p class="text-xl text-gray-600 mb-8 aos-init aos-animate" data-aos="zoom-y-out"
                                    data-aos-delay="150">Aplikasi Web Inovatif untuk Umpan Balik Personal</p>
                                <div class="max-w-xs mx-auto sm:max-w-none flex flex-wrap sm:justify-center gap-4 aos-init aos-animate"
                                    data-aos="zoom-y-out" data-aos-delay="300">
                                    <a class="px-4 py-3 rounded text-white bg-blue-600 hover:bg-blue-700 w-full sm:w-auto sm:mb-0"
                                        href="register">Mulai Mencoba</a>
                                    <a class="px-4 py-3 rounded text-white bg-gray-900 hover:bg-gray-800 w-full sm:w-auto sm:mb-0"
                                        href="#explore">Pelajari</a>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div>
                                <div class="relative flex justify-center mb-8 aos-init aos-animate"
                                    data-aos="zoom-y-out" data-aos-delay="450">
                                    <div class="flex flex-col justify-center">


                                    </div>
                                    {{-- <button
                                        class="absolute top-full flex items-center transform -translate-y-1/2 bg-white rounded-full font-medium group p-4 shadow-lg"><svg
                                            class="w-6 h-6 fill-current text-gray-400 group-hover:text-blue-600 shrink-0"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10zm0 2C5.373 24 0 18.627 0 12S5.373 0 12 0s12 5.373 12 12-5.373 12-12 12z">
                                            </path>
                                            <path d="M10 17l6-5-6-5z"></path>
                                        </svg>
                                        <span class="ml-3">Watch the full video (2 min)</span>
                                    </button> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#explore">
                    <div class="scroll absolute bottom-16"></div>
                </a>
            </section>

            <section id="explore" class="relative pb-16">
                <div class="absolute inset-0 bg-gray-100 pointer-events-none " aria-hidden="true"></div>
                <div class="absolute left-0 right-0 m-auto w-px p-px h-20 bg-gray-200 transform -translate-y-1/2">
                </div>
                <div class="relative max-w-6xl mx-auto px-4 sm:px-6">
                    <div class="pt-12 md:pt-20">
                        {{-- <div class="max-w-3xl mx-auto text-center pb-12 md:pb-16">
                            <h1 class="h2 mb-4">Explore the solutions</h1>
                            <p class="text-xl text-gray-600">Duis aute irure dolor in reprehenderit in voluptate velit
                                esse cillum dolore eu fugiat nulla pariatur excepteur sint occaecat cupidatat.</p>
                        </div> --}}
                        <div x-data="{
                            tab: 'tab1',
                            activeTab: function(tab) {
                                this.tab = tab
                            },
                            isTabActive: function(tab) {
                                return this.tab === tab
                            }
                        }" class="md:grid md:grid-cols-12 md:gap-6">
                            <div class="max-w-xl md:max-w-none md:w-full mx-auto md:col-span-7 lg:col-span-6 md:mt-6 aos-init aos-animate"
                                data-aos="fade-right">
                                <div class="md:pr-4 lg:pr-12 xl:pr-16 mb-8">
                                    <h3 class="h3 mb-3 text-3xl font-bold">LiterasiGuru</h3>
                                    <p class="text-xl text-gray-600">LiterasiGuru, aplikasi web inovatif, evaluasi &
                                        tingkatkan literasi guru. Gabungan teknologi & umpan balik personal. Guru
                                        menilai & tingkatkan praktik mengajar.</p>
                                </div>
                                <div class="mb-8 md:mb-0">
                                    <a x-on:click="activeTab('tab1')"
                                        :class="{
                                            'bg-gray-200 border-transparent': isTabActive('tab1'),
                                            'flex items-center text-lg p-5 rounded border transition duration-300 ease-in-out mb-3 bg-white shadow-md border-gray-200 hover:shadow-lg': true,
                                            'bg-white shadow-md border-gray-200 hover:shadow-lg': !isTabActive('tab1')
                                        }">
                                        <div>
                                            <div class="font-bold leading-snug tracking-tight mb-1">Proses Penilaian
                                            </div>
                                            <div class="text-gray-600">
                                                Guru dapat mengakses modul penilaian komprehensif.
                                            </div>
                                        </div>
                                        <div
                                            class="flex justify-center items-center w-8 h-8 bg-white rounded-full shadow flex-shrink-0 ml-3">
                                            <svg class="w-3 h-3 fill-current" viewBox="0 0 12 12"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.953 4.29a.5.5 0 00-.454-.292H6.14L6.984.62A.5.5 0 006.12.173l-6 7a.5.5 0 00.379.825h5.359l-.844 3.38a.5.5 0 00.864.445l6-7a.5.5 0 00.075-.534z">
                                                </path>
                                            </svg>
                                        </div>
                                    </a><a x-on:click="activeTab('tab2')"
                                        :class="{
                                            'bg-gray-200 border-transparent': isTabActive('tab2'),
                                            'flex items-center text-lg p-5 rounded border transition duration-300 ease-in-out mb-3 bg-white shadow-md border-gray-200 hover:shadow-lg': true,
                                            'bg-white shadow-md border-gray-200 hover:shadow-lg': !isTabActive('tab1')
                                        }">
                                        <div>
                                            <div class="font-bold leading-snug tracking-tight mb-1">Umpan Balik</div>
                                            <div class="text-gray-600">Setelah penilaian selesai, guru akan menerima laporan terperinci yang menyoroti kelebihan dan area yang perlu ditingkatkan</div>
                                        </div>
                                        <div
                                            class="flex justify-center items-center w-8 h-8 bg-white rounded-full shadow flex-shrink-0 ml-3">
                                            <svg class="w-3 h-3 fill-current" viewBox="0 0 12 12"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.854.146a.5.5 0 00-.525-.116l-11 4a.5.5 0 00-.015.934l4.8 1.921 1.921 4.8A.5.5 0 007.5 12h.008a.5.5 0 00.462-.329l4-11a.5.5 0 00-.116-.525z"
                                                    fill-rule="nonzero"></path>
                                            </svg>
                                        </div>
                                    </a><a x-on:click="activeTab('tab3')"
                                        :class="{
                                            'bg-gray-200 border-transparent': isTabActive('tab3'),
                                            'flex items-center text-lg p-5 rounded border transition duration-300 ease-in-out mb-3 bg-white shadow-md border-gray-200 hover:shadow-lg': true,
                                            'bg-white shadow-md border-gray-200 hover:shadow-lg': !isTabActive('tab1')
                                        }">
                                        <div>
                                            <div class="font-bold leading-snug tracking-tight mb-1">Pemantauan Kemajuan </div>
                                            <div class="text-gray-600"> Guru dapat melacak kemajuan mereka dari waktu ke waktu dan membandingkan hasil mereka dengan rekan sejawat atau standar nasional</div>
                                        </div>
                                        <div
                                            class="flex justify-center items-center w-8 h-8 bg-white rounded-full shadow flex-shrink-0 ml-3">
                                            <svg class="w-3 h-3 fill-current" viewBox="0 0 12 12"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.334 8.06a.5.5 0 00-.421-.237 6.023 6.023 0 01-5.905-6c0-.41.042-.82.125-1.221a.5.5 0 00-.614-.586 6 6 0 106.832 8.529.5.5 0 00-.017-.485z"
                                                    fill="#191919" fill-rule="nonzero"></path>
                                            </svg>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div
                                class="max-w-xl md:max-w-none md:w-full mx-auto md:col-span-5 lg:col-span-6 mb-8 md:mb-0 md:order-1">
                                <div class="transition-all" style="height: 468px;">
                                    <div class="relative flex flex-col text-center lg:text-right">
                                        <div x-show="isTabActive('tab1')"
                                            x-transition:enter="transition ease-out duration-300"
                                            x-transition:enter-start="opacity-0  translate-y-16"
                                            x-transition:enter-end="opacity-100 translate-y-0"
                                            x-transition:leave="transition absolute w-full duration-300"
                                            x-transition:leave-start="opacity-100  translate-y-0"
                                            x-transition:leave-end="opacity-0 -translate-y-16">
                                            <div class="relative inline-flex flex-col">
                                                <img src="https://placehold.co/600x400?text=Slide 1" alt="Features bg"
                                                    loading="lazy" width="500" height="462" decoding="async"
                                                    data-nimg="1" class="md:max-w-none mx-auto rounded"
                                                    style="color:transparent">
                                            </div>

                                        </div>
                                        <div x-show="isTabActive('tab2')"
                                            x-transition:enter="transition  ease-out duration-300"
                                            x-transition:enter-start="opacity-0  translate-y-16"
                                            x-transition:enter-end="opacity-100 translate-y-0"
                                            x-transition:leave="transition  absolute w-full duration-300"
                                            x-transition:leave-start="opacity-100  translate-y-0"
                                            x-transition:leave-end="opacity-0 -translate-y-16">
                                            <div class="relative inline-flex flex-col">
                                                <img src="https://placehold.co/600x400?text=Slide 2" alt="Features bg"
                                                    loading="lazy" width="500" height="462" decoding="async"
                                                    data-nimg="1" class="md:max-w-none mx-auto rounded"
                                                    style="color:transparent">
                                            </div>
                                        </div>
                                        <div x-show="isTabActive('tab3')"
                                            x-transition:enter="transition  ease-out duration-300"
                                            x-transition:enter-start="opacity-0  translate-y-16"
                                            x-transition:enter-end="opacity-100 translate-y-0"
                                            x-transition:leave="transition  absolute w-full duration-300"
                                            x-transition:leave-start="opacity-100  translate-y-0"
                                            x-transition:leave-end="opacity-0 -translate-y-16">
                                            <div class="relative inline-flex flex-col">
                                                <img src="https://placehold.co/600x400?text=Slide 3" alt="Features bg"
                                                    loading="lazy" width="500" height="462" decoding="async"
                                                    data-nimg="1" class="md:max-w-none mx-auto rounded"
                                                    style="color:transparent">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- <section>
                <div class="max-w-6xl mx-auto px-4 sm:px-6">
                    <div class="pb-12 md:pb-20">
                        <div class="relative bg-gray-900 rounded py-10 px-8 md:py-16 md:px-12 shadow-2xl overflow-hidden aos-init"
                            data-aos="zoom-y-out">
                            <div class="absolute right-0 bottom-0 pointer-events-none hidden lg:block"
                                aria-hidden="true"><svg width="428" height="328"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <defs>
                                        <radialGradient cx="35.542%" cy="34.553%" fx="35.542%" fy="34.553%"
                                            r="96.031%" id="ni-a">
                                            <stop stop-color="#DFDFDF" offset="0%"></stop>
                                            <stop stop-color="#4C4C4C" offset="44.317%"></stop>
                                            <stop stop-color="#333" offset="100%"></stop>
                                        </radialGradient>
                                    </defs>
                                    <g fill="none" fill-rule="evenodd">
                                        <g fill="#FFF">
                                            <ellipse fill-opacity=".04" cx="185" cy="15.576" rx="16"
                                                ry="15.576"></ellipse>
                                            <ellipse fill-opacity=".24" cx="100" cy="68.402" rx="24"
                                                ry="23.364"></ellipse>
                                            <ellipse fill-opacity=".12" cx="29" cy="251.231" rx="29"
                                                ry="28.231"></ellipse>
                                            <ellipse fill-opacity=".64" cx="29" cy="251.231" rx="8"
                                                ry="7.788"></ellipse>
                                            <ellipse fill-opacity=".12" cx="342" cy="31.303" rx="8"
                                                ry="7.788"></ellipse>
                                            <ellipse fill-opacity=".48" cx="62" cy="126.811" rx="2"
                                                ry="1.947"></ellipse>
                                            <ellipse fill-opacity=".12" cx="78" cy="7.072" rx="2"
                                                ry="1.947"></ellipse>
                                            <ellipse fill-opacity=".64" cx="185" cy="15.576" rx="6"
                                                ry="5.841"></ellipse>
                                        </g>
                                        <circle fill="url(#ni-a)" cx="276" cy="237" r="200">
                                        </circle>
                                    </g>
                                </svg></div>
                            <div class="relative flex flex-col lg:flex-row justify-between items-center">
                                <div class="text-center lg:text-left lg:max-w-xl">
                                    <h3 class="h3 text-white mb-2">Want more tutorials &amp; guides?</h3>
                                    <p class="text-gray-300 text-lg mb-6">Lorem ipsum dolor sit amet consectetur
                                        adipisicing elit nemo expedita voluptas culpa sapiente.</p>
                                    <form class="w-full lg:w-auto">
                                        <div
                                            class="flex flex-col items-center sm:flex-row justify-center max-w-xs mx-auto sm:max-w-md lg:mx-0">
                                            <input type="email"
                                                class="form-input w-full bg-gray-800 border border-gray-700 focus:border-gray-600 rounded-sm px-4 py-3 mb-2 sm:mb-0 sm:mr-2 text-white placeholder-gray-500"
                                                placeholder="Your email…" aria-label="Your email…">
                                            <a class="px-4 py-3 rounded items-center justify-center text-white bg-blue-600 hover:bg-blue-700 shadow"
                                                href="#0">Subscribe</a>
                                        </div>
                                        <p class="text-sm text-gray-400 mt-3">No spam. You can unsubscribe at any time.
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> --}}
        </main>
        {{-- <footer>
            <div class="max-w-6xl mx-auto px-4 sm:px-6">
                <div class="grid sm:grid-cols-12 gap-8 py-8 md:py-12 border-t border-gray-200">
                    <div class="sm:col-span-12 lg:col-span-3">
                        <div class="mb-2"><a class="block" aria-label="Cruip" href="/"><svg
                                    class="w-8 h-8" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                    <defs>
                                        <radialGradient cx="21.152%" cy="86.063%" fx="21.152%" fy="86.063%"
                                            r="79.941%" id="footer-logo">
                                            <stop stop-color="#4FD1C5" offset="0%"></stop>
                                            <stop stop-color="#81E6D9" offset="25.871%"></stop>
                                            <stop stop-color="#338CF5" offset="100%"></stop>
                                        </radialGradient>
                                    </defs>
                                    <rect width="32" height="32" rx="16" fill="url(#footer-logo)"
                                        fill-rule="nonzero"></rect>
                                </svg></a></div>
                        <div class="text-sm text-gray-600"><a href="#0"
                                class="text-gray-600 hover:text-gray-900 hover:underline transition duration-150 ease-in-out">Terms</a>
                            · <a href="#0"
                                class="text-gray-600 hover:text-gray-900 hover:underline transition duration-150 ease-in-out">Privacy
                                Policy</a></div>
                    </div>
                    <div class="sm:col-span-6 md:col-span-3 lg:col-span-2">
                        <h6 class="text-gray-800 font-medium mb-2">Products</h6>
                        <ul class="text-sm">
                            <li class="mb-2"><a href="#0"
                                    class="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">Web
                                    Studio</a></li>
                            <li class="mb-2"><a href="#0"
                                    class="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">DynamicBox
                                    Flex</a></li>
                            <li class="mb-2"><a href="#0"
                                    class="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">Programming
                                    Forms</a></li>
                            <li class="mb-2"><a href="#0"
                                    class="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">Integrations</a>
                            </li>
                            <li class="mb-2"><a href="#0"
                                    class="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">Command-line</a>
                            </li>
                        </ul>
                    </div>
                    <div class="sm:col-span-6 md:col-span-3 lg:col-span-2">
                        <h6 class="text-gray-800 font-medium mb-2">Resources</h6>
                        <ul class="text-sm">
                            <li class="mb-2"><a href="#0"
                                    class="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">Documentation</a>
                            </li>
                            <li class="mb-2"><a href="#0"
                                    class="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">Tutorials
                                    &amp; Guides</a></li>
                            <li class="mb-2"><a href="#0"
                                    class="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">Blog</a>
                            </li>
                            <li class="mb-2"><a href="#0"
                                    class="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">Support
                                    Center</a></li>
                            <li class="mb-2"><a href="#0"
                                    class="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">Partners</a>
                            </li>
                        </ul>
                    </div>
                    <div class="sm:col-span-6 md:col-span-3 lg:col-span-2">
                        <h6 class="text-gray-800 font-medium mb-2">Company</h6>
                        <ul class="text-sm">
                            <li class="mb-2"><a href="#0"
                                    class="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">Home</a>
                            </li>
                            <li class="mb-2"><a href="#0"
                                    class="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">About
                                    us</a></li>
                            <li class="mb-2"><a href="#0"
                                    class="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">Company
                                    values</a></li>
                            <li class="mb-2"><a href="#0"
                                    class="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">Pricing</a>
                            </li>
                            <li class="mb-2"><a href="#0"
                                    class="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">Privacy
                                    Policy</a></li>
                        </ul>
                    </div>
                    <div class="sm:col-span-6 md:col-span-3 lg:col-span-3">
                        <h6 class="text-gray-800 font-medium mb-2">Subscribe</h6>
                        <p class="text-sm text-gray-600 mb-4">Get the latest news and articles to your inbox every
                            month.</p>
                        <form>
                            <div class="flex flex-wrap mb-4">
                                <div class="w-full"><label class="block text-sm sr-only"
                                        for="newsletter">Email</label>
                                    <div class="relative flex items-center max-w-xs"><input id="newsletter"
                                            type="email"
                                            class="form-input w-full text-gray-800 px-3 py-2 pr-12 text-sm"
                                            placeholder="Your email" required=""><button type="submit"
                                            class="absolute inset-0 left-auto" aria-label="Subscribe"><span
                                                class="absolute inset-0 right-auto w-px -ml-px my-2 bg-gray-300"
                                                aria-hidden="true"></span><svg
                                                class="w-3 h-3 fill-current text-blue-600 mx-3 shrink-0"
                                                viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.707 5.293L7 .586 5.586 2l3 3H0v2h8.586l-3 3L7 11.414l4.707-4.707a1 1 0 000-1.414z"
                                                    fill-rule="nonzero"></path>
                                            </svg></button></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="md:flex md:items-center md:justify-between py-4 md:py-8 border-t border-gray-200">
                    <ul class="flex mb-4 md:order-1 md:ml-4 md:mb-0">
                        <li><a href="#0"
                                class="flex justify-center items-center text-gray-600 hover:text-gray-900 bg-white hover:bg-white-100 rounded-full shadow transition duration-150 ease-in-out"
                                aria-label="Twitter"><svg class="w-8 h-8 fill-current" viewBox="0 0 32 32"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M24 11.5c-.6.3-1.2.4-1.9.5.7-.4 1.2-1 1.4-1.8-.6.4-1.3.6-2.1.8-.6-.6-1.5-1-2.4-1-1.7 0-3.2 1.5-3.2 3.3 0 .3 0 .5.1.7-2.7-.1-5.2-1.4-6.8-3.4-.3.5-.4 1-.4 1.7 0 1.1.6 2.1 1.5 2.7-.5 0-1-.2-1.5-.4 0 1.6 1.1 2.9 2.6 3.2-.3.1-.6.1-.9.1-.2 0-.4 0-.6-.1.4 1.3 1.6 2.3 3.1 2.3-1.1.9-2.5 1.4-4.1 1.4H8c1.5.9 3.2 1.5 5 1.5 6 0 9.3-5 9.3-9.3v-.4c.7-.5 1.3-1.1 1.7-1.8z">
                                    </path>
                                </svg></a></li>
                        <li class="ml-4"><a href="#0"
                                class="flex justify-center items-center text-gray-600 hover:text-gray-900 bg-white hover:bg-white-100 rounded-full shadow transition duration-150 ease-in-out"
                                aria-label="Github"><svg class="w-8 h-8 fill-current" viewBox="0 0 32 32"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16 8.2c-4.4 0-8 3.6-8 8 0 3.5 2.3 6.5 5.5 7.6.4.1.5-.2.5-.4V22c-2.2.5-2.7-1-2.7-1-.4-.9-.9-1.2-.9-1.2-.7-.5.1-.5.1-.5.8.1 1.2.8 1.2.8.7 1.3 1.9.9 2.3.7.1-.5.3-.9.5-1.1-1.8-.2-3.6-.9-3.6-4 0-.9.3-1.6.8-2.1-.1-.2-.4-1 .1-2.1 0 0 .7-.2 2.2.8.6-.2 1.3-.3 2-.3s1.4.1 2 .3c1.5-1 2.2-.8 2.2-.8.4 1.1.2 1.9.1 2.1.5.6.8 1.3.8 2.1 0 3.1-1.9 3.7-3.7 3.9.3.4.6.9.6 1.6v2.2c0 .2.1.5.6.4 3.2-1.1 5.5-4.1 5.5-7.6-.1-4.4-3.7-8-8.1-8z">
                                    </path>
                                </svg></a></li>
                        <li class="ml-4"><a href="#0"
                                class="flex justify-center items-center text-gray-600 hover:text-gray-900 bg-white hover:bg-white-100 rounded-full shadow transition duration-150 ease-in-out"
                                aria-label="Facebook"><svg class="w-8 h-8 fill-current" viewBox="0 0 32 32"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14.023 24L14 17h-3v-3h3v-2c0-2.7 1.672-4 4.08-4 1.153 0 2.144.086 2.433.124v2.821h-1.67c-1.31 0-1.563.623-1.563 1.536V14H21l-1 3h-2.72v7h-3.257z">
                                    </path>
                                </svg></a></li>
                    </ul>
                    <div class="text-sm text-gray-600 mr-4">© Cruip.com. All rights reserved.</div>
                </div>
            </div>
        </footer> --}}
        {{-- <div class="fixed bottom-0 right-0 w-full md:bottom-8 md:right-12 md:w-auto z-60">

        </div> --}}
    </div>
</body>

</html>
