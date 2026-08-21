<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ProSite')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Script Anti-Flicker (Mengingat Mode Terakhir) -->
    <script>
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        brand: {
                            lime: '#CCFF00',
                            dark: '#0e100f',
                            sidebar: '#090b0a',
                            card: '#131916',
                            border: '#1f2622',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .bg-neon { background-color: #ccff00; }
        .text-neon { color: #ccff00; }
        .dark .bg-glow {
            background: radial-gradient(circle at 20% 20%, rgba(204, 255, 0, 0.05) 0%, transparent 40%),
                        radial-gradient(circle at 80% 80%, rgba(204, 255, 0, 0.03) 0%, transparent 40%);
        }
        .bg-glow {
            background: radial-gradient(circle at 20% 20%, rgba(204, 255, 0, 0.08) 0%, transparent 40%),
                        radial-gradient(circle at 80% 80%, rgba(0, 0, 0, 0.02) 0%, transparent 40%);
        }
    </style>
</head>

<body class="bg-gray-100 dark:bg-[#0e100f] text-gray-800 dark:text-gray-200 font-sans antialiased h-screen overflow-hidden flex m-0 p-0 bg-glow transition-colors duration-200">

    <!-- SIDEBAR UTAMA -->
    <aside class="w-64 bg-white dark:bg-[#090b0a] border-r border-gray-200 dark:border-[#171c19] flex flex-col justify-between select-none flex-shrink-0 transition-colors duration-200">
        <div>
            <div class="flex items-center gap-3 px-6 py-6">
                <div class="rounded-xl flex items-center justify-center flex-shrink-0 bg-neon shadow-md shadow-lime-500/10" style="width:40px;height:40px;">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="width:22px;height:22px;">
                        <rect x="3" y="3" width="7" height="7" rx="1.5" fill="#0a0a0a" />
                        <rect x="14" y="3" width="7" height="7" rx="1.5" fill="#0a0a0a" />
                        <rect x="3" y="14" width="7" height="7" rx="1.5" fill="#0a0a0a" />
                        <rect x="14" y="14" width="7" height="7" rx="1.5" fill="#0a0a0a" />
                    </svg>
                </div>
                <span class="text-xl font-bold tracking-wide text-gray-900 dark:text-white">ProSite</span>
            </div>

            <nav class="mt-4 px-3 space-y-1.5">
                <a href="{{ url('/dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-[#131916] font-medium text-sm transition">
                    <i class="fa-solid fa-chart-pie text-base"></i> Dashboard
                </a>
                <a href="{{ url('/projects') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl bg-gray-200/80 dark:bg-[#17201b] text-gray-900 dark:text-white font-medium text-sm transition">
                    <i class="fa-regular fa-folder text-base"></i> Project
                </a>
                <a href="{{ url('/board') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-[#131916] font-medium text-sm transition">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" style="width:16px;height:16px;">
                        <rect x="3" y="3" width="5" height="18" rx="1" />
                        <rect x="10" y="3" width="5" height="12" rx="1" />
                        <rect x="17" y="3" width="4" height="8" rx="1" />
                    </svg> Board
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-[#131916] font-medium text-sm transition">
                    <i class="fa-regular fa-square-check text-base"></i> Task
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-[#131916] font-medium text-sm transition">
                    <i class="fa-regular fa-user text-base"></i> Team
                </a>
                @if((session('user')->id_jabatan ?? 0) == 1)
                <a href="{{ url('/users') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-[#131916] font-medium text-sm transition">
                    <i class="fa-solid fa-user-gear text-base"></i> User
                </a>
                @endif
            </nav>
        </div>

        <div class="px-3 pb-6">
            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-[#131916] font-medium text-sm transition">
                <i class="fa-solid fa-gear text-base"></i> Settings
            </a>
        </div>
    </aside>

    <!-- MAIN CONTENT AREA -->
    <main class="flex-1 flex flex-col min-w-0">

        <!-- HEADER TOP BAR UTAMA -->
        <header class="h-16 border-b border-gray-200 dark:border-brand-border px-8 flex items-center justify-between bg-white/50 dark:bg-transparent backdrop-blur-sm transition-colors duration-200">
            <div class="relative w-80">
                <i data-lucide="search" class="w-4 h-4 absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 dark:text-gray-500"></i>
                <input type="text" placeholder="Search anything, tasks, issues..."
                    class="w-full bg-white dark:bg-brand-card text-sm text-gray-800 dark:text-gray-200 placeholder-gray-400 dark:placeholder-gray-500 rounded-full pl-10 pr-4 py-2 border border-gray-300 dark:border-brand-border focus:outline-none focus:border-lime-500 dark:focus:border-brand-lime transition">
            </div>

            <div class="flex items-center gap-4">
                <a href="{{ url('/projects/create') }}" class="bg-brand-lime text-black font-semibold text-sm px-4 py-2 rounded-full flex items-center gap-1.5 hover:bg-opacity-90 transition shadow-lg shadow-lime-500/10">
                    <i data-lucide="plus" class="w-4 h-4"></i>
                    Create Project
                </a>
                <div class="flex items-center gap-2 border-l border-gray-200 dark:border-brand-border pl-4">
                    <button class="p-2 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white bg-white dark:bg-brand-card rounded-full border border-gray-200 dark:border-brand-border shadow-sm dark:shadow-none transition">
                        <i data-lucide="bell" class="w-4 h-4"></i>
                    </button>
                    
                    <!-- Switcher Mode -->
                    <button id="theme-toggle" type="button" class="p-2 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white bg-white dark:bg-brand-card rounded-full border border-gray-200 dark:border-brand-border shadow-sm dark:shadow-none transition">
                        <i id="theme-toggle-light-icon" data-lucide="sun" class="w-4 h-4 hidden dark:block"></i>
                        <i id="theme-toggle-dark-icon" data-lucide="moon" class="w-4 h-4 block dark:hidden"></i>
                    </button>

                    <button class="p-2 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white bg-white dark:bg-brand-card rounded-full border border-gray-200 dark:border-brand-border shadow-sm dark:shadow-none transition">
                        <i data-lucide="help-circle" class="w-4 h-4"></i>
                    </button>
                    <img src="https://i.pravatar.cc/100?img=33" class="w-8 h-8 rounded-full border border-brand-lime ml-2" alt="User Avatar">
                </div>
            </div>
        </header>

        <!-- BAGIAN ISI KONTEN DINAMIS -->
        <div class="p-8 space-y-6 overflow-y-auto">
            @yield('content')
        </div>
    </main>

    <script>
        lucide.createIcons();

        // Logic Switch Theme global
        const themeToggleBtn = document.getElementById('theme-toggle');
        themeToggleBtn.addEventListener('click', function() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        });
    </script>
</body>
</html>