<x-app-layout>
    <div class="sm:p-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg dark:bg-stone-800 ">
                <!-- component -->
                <style>
                    .scrollbar-w-2::-webkit-scrollbar {
                        width: 0.25rem;
                        height: 0.25rem;
                    }

                    .scrollbar-track-blue-lighter::-webkit-scrollbar-track {
                        --bg-opacity: 1;
                        background-color: #f7fafc;
                        background-color: rgba(247, 250, 252, var(--bg-opacity));
                    }

                    .scrollbar-thumb-blue::-webkit-scrollbar-thumb {
                        --bg-opacity: 1;
                        background-color: #edf2f7;
                        background-color: rgba(237, 242, 247, var(--bg-opacity));
                    }

                    .scrollbar-thumb-rounded::-webkit-scrollbar-thumb {
                        border-radius: 0.25rem;
                    }
                </style>
                <livewire:chatbox :thread=$thread>
                <script>

                    var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
                    var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

                    // Change the icons inside the button based on previous settings
                    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                        themeToggleLightIcon.classList.remove('hidden');
                    } else {
                        themeToggleDarkIcon.classList.remove('hidden');
                    }

                    var themeToggleBtn = document.getElementById('theme-toggle');

                    themeToggleBtn.addEventListener('click', function() {

                        // toggle icons inside button
                        themeToggleDarkIcon.classList.toggle('hidden');
                        themeToggleLightIcon.classList.toggle('hidden');

                        // if set via local storage previously
                        if (localStorage.getItem('color-theme')) {
                            if (localStorage.getItem('color-theme') === 'light') {
                                document.documentElement.classList.add('dark');
                                localStorage.setItem('color-theme', 'dark');
                            } else {
                                document.documentElement.classList.remove('dark');
                                localStorage.setItem('color-theme', 'light');
                            }

                            // if NOT set via local storage previously
                        } else {
                            if (document.documentElement.classList.contains('dark')) {
                                document.documentElement.classList.remove('dark');
                                localStorage.setItem('color-theme', 'light');
                            } else {
                                document.documentElement.classList.add('dark');
                                localStorage.setItem('color-theme', 'dark');
                            }
                        }

                    });
                </script>

            </div>
        </div>
    </div>
</x-app-layout>