<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

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
                    <div class="shrink-0 mr-4"><a class="block" aria-label="Cruip" href="/"><svg class="w-8 h-8"
                                viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
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
                    <nav class="hidden md:flex md:grow">
                        <ul class="flex grow justify-end flex-wrap items-center">
                            <li><a class=" font-medium text-gray-600 hover:text-gray-900 px-5 py-3 flex items-center transition duration-150 ease-in-out"
                                    href="{{ route('login')}}">Sign in</a></li>
                            <li>
                                {{-- add sign up button --}}
                                <a class="rounded px-4 py-2 flex items-center text-gray-200 bg-gray-900 hover:bg-gray-800 ml-3"
                                    href="/signup">Sign up
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
            <section class="relative">
                <div class="absolute left-1/2 transform -translate-x-1/2 bottom-0 pointer-events-none -z-1"
                    aria-hidden="true"><svg width="1360" height="578" viewBox="0 0 1360 578"
                        xmlns="http://www.w3.org/2000/svg">
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
                    </svg></div>
                <div class="max-w-6xl mx-auto px-4 sm:px-6">
                    <div class="pt-32 pb-12 md:pt-40 md:pb-20">
                        <div class="text-center pb-12 md:pb-16">
                            <h1 class="text-5xl md:text-6xl font-extrabold leading-tighter tracking-tighter mb-4 aos-init aos-animate"
                                data-aos="zoom-y-out">Make your website <span
                                    class="bg-clip-text text-transparent bg-gradient-to-r from-blue-500 to-teal-400">wonderful</span>
                            </h1>
                            <div class="max-w-3xl mx-auto">
                                <p class="text-xl text-gray-600 mb-8 aos-init aos-animate" data-aos="zoom-y-out"
                                    data-aos-delay="150">Our landing page template works on all devices, so you only
                                    have to set it up once, and get beautiful results forever.</p>
                                <div class="max-w-xs mx-auto sm:max-w-none sm:flex sm:justify-center aos-init aos-animate"
                                    data-aos="zoom-y-out" data-aos-delay="300">
                                    <div><a class="px-4 py-2 rounded text-white bg-blue-600 hover:bg-blue-700 w-full mb-4 sm:w-auto sm:mb-0"
                                            href="#0">Start free trial</a></div>
                                    <div><a class="px-4 py-2 rounded text-white bg-gray-900 hover:bg-gray-800 w-full sm:w-auto sm:ml-4"
                                            href="#0">Learn more</a></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div>
                                <div class="relative flex justify-center mb-8 aos-init aos-animate"
                                    data-aos="zoom-y-out" data-aos-delay="450">
                                    <div class="flex flex-col justify-center"><img alt="Modal video thumbnail"
                                            loading="lazy" width="768" height="432" decoding="async"
                                            data-nimg="1" style="color:transparent"
                                            srcset="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fhero-image.aff77a9d.png&amp;w=828&amp;q=75 1x, /_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fhero-image.aff77a9d.png&amp;w=1920&amp;q=75 2x"
                                            src="/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fhero-image.aff77a9d.png&amp;w=1920&amp;q=75"><svg
                                            class="absolute inset-0 max-w-full mx-auto md:max-w-none h-auto"
                                            width="768" height="432" viewBox="0 0 768 432"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <defs>
                                                <linearGradient x1="50%" y1="0%" x2="50%"
                                                    y2="100%" id="hero-ill-a">
                                                    <stop stop-color="#FFF" offset="0%"></stop>
                                                    <stop stop-color="#EAEAEA" offset="77.402%"></stop>
                                                    <stop stop-color="#DFDFDF" offset="100%"></stop>
                                                </linearGradient>
                                                <linearGradient x1="50%" y1="0%" x2="50%"
                                                    y2="99.24%" id="hero-ill-b">
                                                    <stop stop-color="#FFF" offset="0%"></stop>
                                                    <stop stop-color="#EAEAEA" offset="48.57%"></stop>
                                                    <stop stop-color="#DFDFDF" stop-opacity="0" offset="100%">
                                                    </stop>
                                                </linearGradient>
                                                <radialGradient cx="21.152%" cy="86.063%" fx="21.152%"
                                                    fy="86.063%" r="79.941%" id="hero-ill-e">
                                                    <stop stop-color="#4FD1C5" offset="0%"></stop>
                                                    <stop stop-color="#81E6D9" offset="25.871%"></stop>
                                                    <stop stop-color="#338CF5" offset="100%"></stop>
                                                </radialGradient>
                                                <circle id="hero-ill-d" cx="384" cy="216"
                                                    r="64"></circle>
                                            </defs>
                                            <g fill="none" fill-rule="evenodd">
                                                <circle fill-opacity=".04" fill="url(#hero-ill-a)" cx="384"
                                                    cy="216" r="128"></circle>
                                                <circle fill-opacity=".16" fill="url(#hero-ill-b)" cx="384"
                                                    cy="216" r="96"></circle>
                                                <g fill-rule="nonzero">
                                                    <use fill="#000" xlink:href="#hero-ill-d"></use>
                                                    <use fill="url(#hero-ill-e)" xlink:href="#hero-ill-d"></use>
                                                </g>
                                            </g>
                                        </svg></div><button
                                        class="absolute top-full flex items-center transform -translate-y-1/2 bg-white rounded-full font-medium group p-4 shadow-lg"><svg
                                            class="w-6 h-6 fill-current text-gray-400 group-hover:text-blue-600 shrink-0"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10zm0 2C5.373 24 0 18.627 0 12S5.373 0 12 0s12 5.373 12 12-5.373 12-12 12z">
                                            </path>
                                            <path d="M10 17l6-5-6-5z"></path>
                                        </svg><span class="ml-3">Watch the full video (2 min)</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
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
                                            class="flex flex-col sm:flex-row justify-center max-w-xs mx-auto sm:max-w-md lg:mx-0">
                                            <input type="email"
                                                class="form-input w-full appearance-none bg-gray-800 border border-gray-700 focus:border-gray-600 rounded-sm px-4 py-3 mb-2 sm:mb-0 sm:mr-2 text-white placeholder-gray-500"
                                                placeholder="Your email…" aria-label="Your email…"><a
                                                class="btn text-white bg-blue-600 hover:bg-blue-700 shadow"
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
            </section>
        </main>
        <footer>
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
        </footer>
        <div class="fixed bottom-0 right-0 w-full md:bottom-8 md:right-12 md:w-auto z-60">
            <div class="bg-slate-800 text-slate-50 text-sm p-3 md:rounded shadow-lg flex justify-between">
                <div class="text-slate-500 inline-flex"><a class="font-medium hover:underline text-slate-50"
                        href="https://github.com/cruip/tailwind-landing-page-template" target="_blank"
                        rel="noreferrer">Download<span class="hidden sm:inline"> on GitHub</span></a> <span
                        class="italic px-1.5">or</span> <a class="font-medium hover:underline text-emerald-400"
                        href="https://cruip.com/simple/" target="_blank" rel="noreferrer">Check Premium Version</a>
                </div><button class="text-slate-500 hover:text-slate-400 pl-2 ml-3 border-l border-gray-700"><span
                        class="sr-only">Close</span><svg class="w-4 h-4 shrink-0 fill-current" viewBox="0 0 16 16">
                        <path
                            d="M12.72 3.293a1 1 0 00-1.415 0L8.012 6.586 4.72 3.293a1 1 0 00-1.414 1.414L6.598 8l-3.293 3.293a1 1 0 101.414 1.414l3.293-3.293 3.293 3.293a1 1 0 001.414-1.414L9.426 8l3.293-3.293a1 1 0 000-1.414z">
                        </path>
                    </svg></button>
            </div>
        </div>
    </div>
</body>

</html>
