<x-guest-layout>
    <div
        class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-r from-pink-800 to-orange-600">
        <p
            class="text-8xl font-semibold mb-12 text-white [text-shadow:__5px_2px_rgb(0_0_0_/_10%)] p-8 sm:p-0 text-center">
           Ai Assit</p>

        <button type="link" onclick="window.location.href='{{ url('auth/google') }}'"
            class="text-gray-700 bg-white hover:shadow-lg text-xl focus:ring-4 focus:outline-none focus:ring-[#4285F4]/50 font-medium rounded-lg px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#4285F4]/55 me-2 mb-2">
            <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 18 19">
                <path fill-rule="evenodd"
                    d="M8.842 18.083a8.8 8.8 0 0 1-8.65-8.948 8.841 8.841 0 0 1 8.8-8.652h.153a8.464 8.464 0 0 1 5.7 2.257l-2.193 2.038A5.27 5.27 0 0 0 9.09 3.4a5.882 5.882 0 0 0-.2 11.76h.124a5.091 5.091 0 0 0 5.248-4.057L14.3 11H9V8h8.34c.066.543.095 1.09.088 1.636-.086 5.053-3.463 8.449-8.4 8.449l-.186-.002Z"
                    clip-rule="evenodd" />
            </svg>
            Sign in with Google
        </button>
        <div>
            <p class="text-white mt-6 text-lg w-[80vw] sm:w-[30vw]  text-center"></p>
            <p
                class="bg-stone-800 text-white shadow text-md text-center w-[80vw] sm:w-[30vw] rounded-lg p-4 mt-8 font-semibold">
                You can write something here</p>
            </p>
        </div>
    </div>
</x-guest-layout>
