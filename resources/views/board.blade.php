<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Board | ProSite</title>

    <!-- ANTI-FLICKER: Baca localStorage SEBELUM render -->
    <script>
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: { sans: ['Inter', 'sans-serif'] },
                    colors: {
                        brand: {
                            lime:    '#CCFF00',
                            dark:    '#0e100f',
                            sidebar: '#090b0a',
                            card:    '#131916',
                            border:  '#1f2622',
                        }
                    }
                }
            }
        }
    </script>

    <style>
        body { font-family: 'Inter', sans-serif; }
        .board-scroll::-webkit-scrollbar        { height: 5px; }
        .board-scroll::-webkit-scrollbar-track  { background: transparent; }
        .board-scroll::-webkit-scrollbar-thumb  { background: #d1d5db; border-radius: 4px; }
        .dark .board-scroll::-webkit-scrollbar-thumb { background: #2a2a2a; }
        .col-scroll::-webkit-scrollbar        { width: 3px; }
        .col-scroll::-webkit-scrollbar-track  { background: transparent; }
        .col-scroll::-webkit-scrollbar-thumb  { background: #d1d5db; border-radius: 2px; }
        .dark .col-scroll::-webkit-scrollbar-thumb { background: #2a2a2a; }
        .task-card { transition: transform 0.15s ease, border-color 0.15s ease, box-shadow 0.15s ease; }
        .task-card:hover { transform: translateY(-2px); }
        .logo-glow { box-shadow: 0 0 20px rgba(204,255,0,0.25); }
        .badge-high   { background:rgba(239,68,68,0.14);  color:#dc2626; }
        .badge-medium { background:rgba(234,179,8,0.14);  color:#d97706; }
        .badge-low    { background:rgba(34,197,94,0.14);  color:#16a34a; }
        .dark .badge-high   { background:rgba(239,68,68,0.18);  color:#f87171; }
        .dark .badge-medium { background:rgba(234,179,8,0.18);  color:#fbbf24; }
        .dark .badge-low    { background:rgba(34,197,94,0.18);  color:#4ade80; }
    </style>
</head>

<body class="bg-gray-100 dark:bg-[#0e100f] text-gray-800 dark:text-gray-200 font-sans antialiased h-screen overflow-hidden flex m-0 p-0 transition-colors duration-200">

    <!-- SIDEBAR -->
    <aside class="w-64 min-w-[256px] bg-white dark:bg-[#090b0a] border-r border-gray-200 dark:border-[#1f2622] flex flex-col justify-between select-none flex-shrink-0 transition-colors duration-200 h-screen">
        <div>
            <div class="flex items-center gap-3 px-6 py-6 border-b border-gray-100 dark:border-[#1f2622]">
                <div class="bg-[#ccff00] logo-glow rounded-xl flex items-center justify-center flex-shrink-0" style="width:40px;height:40px;">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="width:22px;height:22px;">
                        <rect x="3"  y="3"  width="7" height="7" rx="1.5" fill="#0a0a0a"/>
                        <rect x="14" y="3"  width="7" height="7" rx="1.5" fill="#0a0a0a"/>
                        <rect x="3"  y="14" width="7" height="7" rx="1.5" fill="#0a0a0a"/>
                        <rect x="14" y="14" width="7" height="7" rx="1.5" fill="#0a0a0a"/>
                    </svg>
                </div>
                <span class="text-xl font-bold tracking-wide text-gray-900 dark:text-white">ProSite</span>
            </div>
            <nav class="mt-4 px-3 space-y-1">
                <a href="{{ url('/dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-[#131916] font-medium text-sm transition">
                    <i class="fa-solid fa-chart-pie text-base"></i> Dashboard
                </a>
                <a href="{{ url('/projects') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-[#131916] font-medium text-sm transition">
                    <i class="fa-regular fa-folder text-base"></i> Project
                </a>
                <a href="{{ url('/board') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl bg-gray-200/80 dark:bg-[#17201b] text-gray-900 dark:text-white font-medium text-sm">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" style="width:16px;height:16px;">
                        <rect x="3"  y="3" width="5" height="18" rx="1"/>
                        <rect x="10" y="3" width="5" height="12" rx="1"/>
                        <rect x="17" y="3" width="4" height="8"  rx="1"/>
                    </svg>
                    Board
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

    <!-- MAIN -->
    <div class="flex-1 flex flex-col min-w-0 h-screen overflow-hidden">

        <!-- TOPBAR -->
        <header class="h-14 border-b border-gray-200 dark:border-[#1f2622] flex items-center justify-between px-6 bg-white/80 dark:bg-[#0e100f] backdrop-blur-sm flex-shrink-0 transition-colors duration-200">
            <div class="flex items-center gap-2 text-sm">
                <a href="{{ url('/board') }}" class="text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition">Boards</a>
                <span class="text-gray-300 dark:text-[#5a5a5a]">&#8250;</span>
                <span class="text-gray-900 dark:text-white font-medium">Sprint 42 Board</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="relative hidden md:block">
                    <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 dark:text-gray-500 text-xs"></i>
                    <input type="text" placeholder="Search tasks..."
                        class="bg-gray-100 dark:bg-[#131916] border border-gray-200 dark:border-[#1f2622] text-sm text-gray-800 dark:text-gray-300 placeholder-gray-400 dark:placeholder-gray-600 rounded-xl pl-8 pr-3 py-1.5 w-52 focus:outline-none focus:border-lime-500 dark:focus:border-[#ccff00] transition">
                </div>
                <button class="w-8 h-8 rounded-xl bg-gray-100 dark:bg-[#131916] border border-gray-200 dark:border-[#1f2622] flex items-center justify-center text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition relative">
                    <i class="fa-regular fa-bell text-sm"></i>
                    <span class="absolute top-1.5 right-1.5 w-1.5 h-1.5 bg-[#ccff00] rounded-full"></span>
                </button>
                <!-- TOGGLE DARK/LIGHT -->
                <button id="theme-toggle" type="button"
                    class="w-8 h-8 rounded-xl bg-gray-100 dark:bg-[#131916] border border-gray-200 dark:border-[#1f2622] flex items-center justify-center text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition"
                    title="Toggle Dark/Light Mode">
                    <i class="fa-regular fa-sun  text-sm hidden dark:block"></i>
                    <i class="fa-regular fa-moon text-sm block  dark:hidden"></i>
                </button>
                <button class="w-8 h-8 rounded-xl bg-gray-100 dark:bg-[#131916] border border-gray-200 dark:border-[#1f2622] flex items-center justify-center text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition">
                    <i class="fa-regular fa-circle-question text-sm"></i>
                </button>
                <div class="w-8 h-8 rounded-xl overflow-hidden border-2 border-[#ccff00]/50 ml-1 flex-shrink-0">
                    <img src="https://i.pravatar.cc/100?img=33" alt="Avatar" class="w-full h-full object-cover">
                </div>
            </div>
        </header>

        <!-- BOARD HEADER -->
        <div class="px-6 pt-5 pb-4 flex items-start justify-between flex-shrink-0 border-b border-gray-200 dark:border-[#1f2622] bg-white dark:bg-[#0e100f] transition-colors duration-200">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white leading-tight tracking-tight">Q4 Marketing Campaign</h1>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-0.5">Manage deliverables and assets for the upcoming launch.</p>
                <div class="flex items-center gap-1 mt-4">
                    <button class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-gray-200 dark:bg-[#131916] text-gray-900 dark:text-white text-xs font-semibold">
                        <i class="fa-solid fa-table-columns"></i> Board
                    </button>
                    <button class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-[#131916] text-xs font-medium transition">
                        <i class="fa-solid fa-list"></i> List
                    </button>
                    <button class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-[#131916] text-xs font-medium transition">
                        <i class="fa-regular fa-calendar"></i> Timeline
                    </button>
                </div>
            </div>
            <div class="flex items-center gap-3 mt-1">
                <div class="flex items-center">
                    <div class="w-7 h-7 rounded-full bg-purple-100 dark:bg-[#3b2a4a] text-purple-700 dark:text-purple-400 text-[10px] font-bold flex items-center justify-center border-2 border-white dark:border-[#0e100f]">JR</div>
                    <div class="w-7 h-7 rounded-full bg-emerald-100 dark:bg-[#1a3a2a] text-emerald-700 dark:text-emerald-400 text-[10px] font-bold flex items-center justify-center border-2 border-white dark:border-[#0e100f] -ml-2">SK</div>
                    <div class="w-7 h-7 rounded-full bg-violet-100 dark:bg-[#2a1a3a] text-violet-700 dark:text-violet-400 text-[10px] font-bold flex items-center justify-center border-2 border-white dark:border-[#0e100f] -ml-2">ML</div>
                    <div class="w-7 h-7 rounded-full bg-gray-200 dark:bg-[#222] text-gray-600 dark:text-gray-400 text-[10px] font-bold flex items-center justify-center border-2 border-white dark:border-[#0e100f] -ml-2">+3</div>
                </div>
                <button class="flex items-center gap-2 px-3 py-1.5 rounded-xl border border-gray-200 dark:border-[#1f2622] bg-white dark:bg-transparent text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white text-xs font-medium transition">
                    <i class="fa-solid fa-filter text-[11px]"></i> Filter
                </button>
                <button class="flex items-center gap-2 px-3 py-1.5 rounded-xl bg-[#ccff00] text-black text-xs font-semibold hover:bg-[#b8e600] transition shadow-sm">
                    <i class="fa-solid fa-plus text-[11px]"></i> Add Task
                </button>
            </div>
        </div>

        <!-- KANBAN COLUMNS -->
        <div class="flex-1 overflow-hidden bg-gray-50 dark:bg-[#0e100f] transition-colors duration-200">
            <div class="flex gap-4 px-6 py-5 h-full overflow-x-auto board-scroll">

                <!-- TO DO -->
                <div class="w-72 min-w-[288px] flex flex-col bg-white dark:bg-[#111210] border border-gray-200 dark:border-[#1f2622] rounded-2xl overflow-hidden flex-shrink-0">
                    <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200 dark:border-[#1f2622]">
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-gray-400 dark:bg-gray-500"></span>
                            <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">To Do</span>
                            <span class="bg-gray-100 dark:bg-[#252525] text-gray-500 dark:text-gray-400 text-[11px] font-semibold px-2 py-0.5 rounded-full border border-gray-200 dark:border-[#1f2622]">3</span>
                        </div>
                        <button class="w-6 h-6 flex items-center justify-center rounded-lg text-gray-400 dark:text-gray-600 hover:bg-gray-100 dark:hover:bg-[#1f2622] hover:text-gray-700 dark:hover:text-gray-300 transition">
                            <i class="fa-solid fa-ellipsis text-xs"></i>
                        </button>
                    </div>
                    <div class="flex-1 overflow-y-auto col-scroll px-3 py-3 flex flex-col gap-3">
                        <!-- Card 1 -->
                        <div class="task-card bg-gray-50 dark:bg-[#161816] border border-gray-200 dark:border-[#282828] hover:border-gray-300 dark:hover:border-[#3a3a3a] hover:shadow-md dark:hover:shadow-none rounded-xl p-3.5 cursor-pointer">
                            <div class="flex items-center justify-between mb-2.5">
                                <span class="badge-high text-[10px] font-bold px-2 py-0.5 rounded tracking-wide uppercase">HIGH</span>
                                <span class="text-[11px] text-gray-400 dark:text-[#5a5a5a] font-mono">#PRO-102</span>
                            </div>
                            <p class="text-sm font-semibold text-gray-800 dark:text-[#e8ead4] leading-snug mb-2">Draft initial landing page copy</p>
                            <p class="text-xs text-gray-500 dark:text-[#6b7280] line-clamp-2 mb-3">Create the hero section and feature highlights for the main product page.</p>
                            <div class="flex items-center justify-between pt-2.5 border-t border-gray-100 dark:border-[#222]">
                                <div class="flex items-center gap-3 text-gray-400 dark:text-[#5a5a5a] text-[11px]">
                                    <span class="flex items-center gap-1"><i class="fa-regular fa-comment text-[10px]"></i> 2</span>
                                    <span class="flex items-center gap-1"><i class="fa-regular fa-eye text-[10px]"></i> 1</span>
                                </div>
                                <div class="w-6 h-6 rounded-full bg-orange-100 dark:bg-[#3a2a1a] text-orange-600 dark:text-orange-400 text-[9px] font-bold flex items-center justify-center">TK</div>
                            </div>
                        </div>
                        <!-- Card 2 -->
                        <div class="task-card bg-gray-50 dark:bg-[#161816] border border-gray-200 dark:border-[#282828] hover:border-gray-300 dark:hover:border-[#3a3a3a] hover:shadow-md dark:hover:shadow-none rounded-xl p-3.5 cursor-pointer">
                            <div class="flex items-center justify-between mb-2.5">
                                <span class="badge-medium text-[10px] font-bold px-2 py-0.5 rounded tracking-wide uppercase">MEDIUM</span>
                                <span class="text-[11px] text-gray-400 dark:text-[#5a5a5a] font-mono">#PRO-105</span>
                            </div>
                            <p class="text-sm font-semibold text-gray-800 dark:text-[#e8ead4] leading-snug mb-3">Source stock images for ad creatives</p>
                            <div class="flex items-center justify-between pt-2.5 border-t border-gray-100 dark:border-[#222]">
                                <span class="flex items-center gap-1 text-gray-400 dark:text-[#5a5a5a] text-[11px]"><i class="fa-regular fa-comment text-[10px]"></i> 0</span>
                                <div class="w-6 h-6 rounded-full bg-emerald-100 dark:bg-[#1a3a2a] text-emerald-600 dark:text-emerald-400 text-[9px] font-bold flex items-center justify-center">SK</div>
                            </div>
                        </div>
                        <!-- Card 3 -->
                        <div class="task-card bg-gray-50 dark:bg-[#161816] border border-gray-200 dark:border-[#282828] hover:border-gray-300 dark:hover:border-[#3a3a3a] hover:shadow-md dark:hover:shadow-none rounded-xl p-3.5 cursor-pointer">
                            <div class="flex items-center justify-between mb-2.5">
                                <span class="badge-low text-[10px] font-bold px-2 py-0.5 rounded tracking-wide uppercase">LOW</span>
                                <span class="text-[11px] text-gray-400 dark:text-[#5a5a5a] font-mono">#PRO-109</span>
                            </div>
                            <p class="text-sm font-semibold text-gray-800 dark:text-[#e8ead4] leading-snug mb-3">Setup newsletter subscription form</p>
                            <div class="flex items-center justify-between pt-2.5 border-t border-gray-100 dark:border-[#222]">
                                <span class="flex items-center gap-1 text-gray-400 dark:text-[#5a5a5a] text-[11px]"><i class="fa-regular fa-comment text-[10px]"></i> 1</span>
                                <div class="w-6 h-6 rounded-full bg-blue-100 dark:bg-[#2d4a6b] text-blue-600 dark:text-blue-300 text-[9px] font-bold flex items-center justify-center">JR</div>
                            </div>
                        </div>
                    </div>
                    <button class="mx-3 mb-3 flex items-center justify-center gap-2 py-2 border border-dashed border-gray-300 dark:border-[#2d2d2d] rounded-xl text-gray-400 dark:text-[#5a5a5a] hover:text-gray-600 dark:hover:text-gray-400 hover:border-gray-400 dark:hover:border-[#3a3a3a] text-xs font-medium transition bg-transparent">
                        <i class="fa-solid fa-plus text-[10px]"></i> Add Task
                    </button>
                </div>

                <!-- IN PROGRESS -->
                <div class="w-72 min-w-[288px] flex flex-col bg-white dark:bg-[#111210] border border-gray-200 dark:border-[#1f2622] rounded-2xl overflow-hidden flex-shrink-0">
                    <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200 dark:border-[#1f2622]">
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                            <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">In Progress</span>
                            <span class="bg-gray-100 dark:bg-[#252525] text-gray-500 dark:text-gray-400 text-[11px] font-semibold px-2 py-0.5 rounded-full border border-gray-200 dark:border-[#1f2622]">2</span>
                        </div>
                        <button class="w-6 h-6 flex items-center justify-center rounded-lg text-gray-400 dark:text-gray-600 hover:bg-gray-100 dark:hover:bg-[#1f2622] hover:text-gray-700 dark:hover:text-gray-300 transition">
                            <i class="fa-solid fa-ellipsis text-xs"></i>
                        </button>
                    </div>
                    <div class="flex-1 overflow-y-auto col-scroll px-3 py-3 flex flex-col gap-3">
                        <!-- Card 1 -->
                        <div class="task-card bg-gray-50 dark:bg-[#161816] border border-gray-200 dark:border-[#282828] hover:border-gray-300 dark:hover:border-[#3a3a3a] hover:shadow-md dark:hover:shadow-none rounded-xl p-3.5 cursor-pointer">
                            <div class="flex items-center justify-between mb-2.5">
                                <span class="badge-high text-[10px] font-bold px-2 py-0.5 rounded tracking-wide uppercase">HIGH</span>
                                <span class="text-[11px] text-gray-400 dark:text-[#5a5a5a] font-mono">#PRO-098</span>
                            </div>
                            <p class="text-sm font-semibold text-gray-800 dark:text-[#e8ead4] leading-snug mb-2.5">Design UI mockups for mobile app</p>
                            <div class="mb-2.5">
                                <div class="flex justify-between text-[11px] text-gray-400 dark:text-[#5a5a5a] mb-1.5">
                                    <span><i class="fa-solid fa-check text-[9px]"></i> 3/5 subtasks</span>
                                    <span class="font-medium text-gray-600 dark:text-gray-400">60%</span>
                                </div>
                                <div class="w-full h-1.5 bg-gray-200 dark:bg-[#2a2a2a] rounded-full overflow-hidden">
                                    <div class="h-full bg-[#ccff00] rounded-full" style="width:60%"></div>
                                </div>
                            </div>
                            <div class="flex items-center justify-between pt-2.5 border-t border-gray-100 dark:border-[#222]">
                                <div class="flex items-center gap-3 text-gray-400 dark:text-[#5a5a5a] text-[11px]">
                                    <span class="flex items-center gap-1"><i class="fa-regular fa-comment text-[10px]"></i> 4</span>
                                    <span class="flex items-center gap-1"><i class="fa-regular fa-clock text-[10px]"></i> Oct 21</span>
                                </div>
                                <div class="w-6 h-6 rounded-full bg-purple-100 dark:bg-[#3b2a4a] text-purple-600 dark:text-purple-400 text-[9px] font-bold flex items-center justify-center">JR</div>
                            </div>
                        </div>
                        <!-- Card 2 -->
                        <div class="task-card bg-gray-50 dark:bg-[#161816] border border-gray-200 dark:border-[#282828] hover:border-gray-300 dark:hover:border-[#3a3a3a] hover:shadow-md dark:hover:shadow-none rounded-xl p-3.5 cursor-pointer">
                            <div class="flex items-center justify-between mb-2.5">
                                <span class="badge-low text-[10px] font-bold px-2 py-0.5 rounded tracking-wide uppercase">LOW</span>
                                <span class="text-[11px] text-gray-400 dark:text-[#5a5a5a] font-mono">#PRO-101</span>
                            </div>
                            <p class="text-sm font-semibold text-gray-800 dark:text-[#e8ead4] leading-snug mb-2.5">Update branding guidelines PDF</p>
                            <div class="mb-2.5">
                                <div class="flex justify-between text-[11px] text-gray-400 dark:text-[#5a5a5a] mb-1.5">
                                    <span><i class="fa-solid fa-check text-[9px]"></i> 1/3 subtasks</span>
                                    <span class="font-medium text-gray-600 dark:text-gray-400">33%</span>
                                </div>
                                <div class="w-full h-1.5 bg-gray-200 dark:bg-[#2a2a2a] rounded-full overflow-hidden">
                                    <div class="h-full bg-[#ccff00] rounded-full" style="width:33%"></div>
                                </div>
                            </div>
                            <div class="flex items-center justify-between pt-2.5 border-t border-gray-100 dark:border-[#222]">
                                <span class="flex items-center gap-1 text-gray-400 dark:text-[#5a5a5a] text-[11px]"><i class="fa-regular fa-comment text-[10px]"></i> 0</span>
                                <div class="w-6 h-6 rounded-full bg-violet-100 dark:bg-[#2a1a3a] text-violet-600 dark:text-violet-400 text-[9px] font-bold flex items-center justify-center">ML</div>
                            </div>
                        </div>
                    </div>
                    <button class="mx-3 mb-3 flex items-center justify-center gap-2 py-2 border border-dashed border-gray-300 dark:border-[#2d2d2d] rounded-xl text-gray-400 dark:text-[#5a5a5a] hover:text-gray-600 dark:hover:text-gray-400 hover:border-gray-400 dark:hover:border-[#3a3a3a] text-xs font-medium transition bg-transparent">
                        <i class="fa-solid fa-plus text-[10px]"></i> Add Task
                    </button>
                </div>

                <!-- REVIEW -->
                <div class="w-72 min-w-[288px] flex flex-col bg-white dark:bg-[#111210] border border-gray-200 dark:border-[#1f2622] rounded-2xl overflow-hidden flex-shrink-0">
                    <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200 dark:border-[#1f2622]">
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-violet-500"></span>
                            <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">Review</span>
                            <span class="bg-gray-100 dark:bg-[#252525] text-gray-500 dark:text-gray-400 text-[11px] font-semibold px-2 py-0.5 rounded-full border border-gray-200 dark:border-[#1f2622]">2</span>
                        </div>
                        <button class="w-6 h-6 flex items-center justify-center rounded-lg text-gray-400 dark:text-gray-600 hover:bg-gray-100 dark:hover:bg-[#1f2622] hover:text-gray-700 dark:hover:text-gray-300 transition">
                            <i class="fa-solid fa-ellipsis text-xs"></i>
                        </button>
                    </div>
                    <div class="flex-1 overflow-y-auto col-scroll px-3 py-3 flex flex-col gap-3">
                        <!-- Card 1 -->
                        <div class="task-card bg-gray-50 dark:bg-[#161816] border border-gray-200 dark:border-[#282828] hover:border-gray-300 dark:hover:border-[#3a3a3a] hover:shadow-md dark:hover:shadow-none rounded-xl p-3.5 cursor-pointer">
                            <div class="flex items-center justify-between mb-2.5">
                                <span class="badge-medium text-[10px] font-bold px-2 py-0.5 rounded tracking-wide uppercase">MEDIUM</span>
                                <span class="text-[11px] text-gray-400 dark:text-[#5a5a5a] font-mono">#PRO-085</span>
                            </div>
                            <p class="text-sm font-semibold text-gray-800 dark:text-[#e8ead4] leading-snug mb-2">Finalize Q3 Analytics Report</p>
                            <p class="text-xs text-gray-500 dark:text-[#6b7280] line-clamp-2 mb-2">Awaiting final approval from the marketing director before publishing.</p>
                            <div class="flex items-center gap-1.5 mb-3">
                                <span class="flex items-center gap-1 bg-red-50 dark:bg-red-900/20 text-red-500 dark:text-red-400 text-[10px] font-semibold px-2 py-0.5 rounded border border-red-200 dark:border-red-800/30">
                                    <i class="fa-regular fa-calendar-xmark text-[9px]"></i> Due Today
                                </span>
                            </div>
                            <div class="flex items-center justify-between pt-2.5 border-t border-gray-100 dark:border-[#222]">
                                <span class="flex items-center gap-1 text-gray-400 dark:text-[#5a5a5a] text-[11px]"><i class="fa-regular fa-comment text-[10px]"></i> 3</span>
                                <div class="flex items-center">
                                    <div class="w-6 h-6 rounded-full bg-emerald-100 dark:bg-[#1a3a2a] text-emerald-600 dark:text-emerald-400 text-[9px] font-bold flex items-center justify-center border-2 border-white dark:border-[#161816]">SK</div>
                                    <div class="w-6 h-6 rounded-full bg-purple-100 dark:bg-[#3b2a4a] text-purple-600 dark:text-purple-400 text-[9px] font-bold flex items-center justify-center border-2 border-white dark:border-[#161816] -ml-2">JR</div>
                                </div>
                            </div>
                        </div>
                        <!-- Card 2 -->
                        <div class="task-card bg-gray-50 dark:bg-[#161816] border border-gray-200 dark:border-[#282828] hover:border-gray-300 dark:hover:border-[#3a3a3a] hover:shadow-md dark:hover:shadow-none rounded-xl p-3.5 cursor-pointer">
                            <div class="flex items-center justify-between mb-2.5">
                                <span class="badge-high text-[10px] font-bold px-2 py-0.5 rounded tracking-wide uppercase">HIGH</span>
                                <span class="text-[11px] text-gray-400 dark:text-[#5a5a5a] font-mono">#PRO-091</span>
                            </div>
                            <p class="text-sm font-semibold text-gray-800 dark:text-[#e8ead4] leading-snug mb-3">A/B test email subject lines</p>
                            <div class="flex items-center justify-between pt-2.5 border-t border-gray-100 dark:border-[#222]">
                                <div class="flex items-center gap-3 text-gray-400 dark:text-[#5a5a5a] text-[11px]">
                                    <span class="flex items-center gap-1"><i class="fa-regular fa-comment text-[10px]"></i> 1</span>
                                    <span class="flex items-center gap-1"><i class="fa-regular fa-clock text-[10px]"></i> Oct 24</span>
                                </div>
                                <div class="w-6 h-6 rounded-full bg-violet-100 dark:bg-[#2a1a3a] text-violet-600 dark:text-violet-400 text-[9px] font-bold flex items-center justify-center">ML</div>
                            </div>
                        </div>
                    </div>
                    <button class="mx-3 mb-3 flex items-center justify-center gap-2 py-2 border border-dashed border-gray-300 dark:border-[#2d2d2d] rounded-xl text-gray-400 dark:text-[#5a5a5a] hover:text-gray-600 dark:hover:text-gray-400 hover:border-gray-400 dark:hover:border-[#3a3a3a] text-xs font-medium transition bg-transparent">
                        <i class="fa-solid fa-plus text-[10px]"></i> Add Task
                    </button>
                </div>

                <!-- DONE -->
                <div class="w-72 min-w-[288px] flex flex-col bg-white dark:bg-[#111210] border border-gray-200 dark:border-[#1f2622] rounded-2xl overflow-hidden flex-shrink-0">
                    <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200 dark:border-[#1f2622]">
                        <div class="flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-[#ccff00]"></span>
                            <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">Done</span>
                            <span class="bg-gray-100 dark:bg-[#252525] text-gray-500 dark:text-gray-400 text-[11px] font-semibold px-2 py-0.5 rounded-full border border-gray-200 dark:border-[#1f2622]">2</span>
                        </div>
                        <button class="w-6 h-6 flex items-center justify-center rounded-lg text-gray-400 dark:text-gray-600 hover:bg-gray-100 dark:hover:bg-[#1f2622] hover:text-gray-700 dark:hover:text-gray-300 transition">
                            <i class="fa-solid fa-ellipsis text-xs"></i>
                        </button>
                    </div>
                    <div class="flex-1 overflow-y-auto col-scroll px-3 py-3 flex flex-col gap-3">
                        <!-- Card 1 -->
                        <div class="task-card bg-gray-50 dark:bg-[#161816] border border-gray-200 dark:border-[#282828] hover:border-gray-300 dark:hover:border-[#3a3a3a] hover:shadow-md dark:hover:shadow-none rounded-xl p-3.5 cursor-pointer opacity-75">
                            <div class="flex items-center justify-between mb-2.5">
                                <span class="text-[11px] text-gray-400 dark:text-[#5a5a5a] font-mono">#PRO-072</span>
                                <span class="flex items-center gap-1 bg-emerald-50 dark:bg-emerald-900/20 text-emerald-600 dark:text-emerald-400 text-[10px] font-semibold px-2 py-0.5 rounded border border-emerald-200 dark:border-emerald-800/30">
                                    <i class="fa-solid fa-check text-[9px]"></i> Done
                                </span>
                            </div>
                            <p class="text-sm font-semibold text-gray-500 dark:text-gray-500 leading-snug mb-3 line-through">Setup email campaign automation</p>
                            <div class="flex items-center justify-between pt-2.5 border-t border-gray-100 dark:border-[#222]">
                                <div class="flex items-center gap-3 text-gray-400 dark:text-[#5a5a5a] text-[11px]">
                                    <span class="flex items-center gap-1"><i class="fa-regular fa-comment text-[10px]"></i> 5</span>
                                    <span class="flex items-center gap-1"><i class="fa-regular fa-clock text-[10px]"></i> Oct 15</span>
                                </div>
                                <div class="w-6 h-6 rounded-full bg-blue-100 dark:bg-[#2d4a6b] text-blue-600 dark:text-blue-300 text-[9px] font-bold flex items-center justify-center">JR</div>
                            </div>
                        </div>
                        <!-- Card 2 -->
                        <div class="task-card bg-gray-50 dark:bg-[#161816] border border-gray-200 dark:border-[#282828] hover:border-gray-300 dark:hover:border-[#3a3a3a] hover:shadow-md dark:hover:shadow-none rounded-xl p-3.5 cursor-pointer opacity-75">
                            <div class="flex items-center justify-between mb-2.5">
                                <span class="text-[11px] text-gray-400 dark:text-[#5a5a5a] font-mono">#PRO-068</span>
                                <span class="flex items-center gap-1 bg-emerald-50 dark:bg-emerald-900/20 text-emerald-600 dark:text-emerald-400 text-[10px] font-semibold px-2 py-0.5 rounded border border-emerald-200 dark:border-emerald-800/30">
                                    <i class="fa-solid fa-check text-[9px]"></i> Done
                                </span>
                            </div>
                            <p class="text-sm font-semibold text-gray-500 dark:text-gray-500 leading-snug mb-3 line-through">Define target audience personas</p>
                            <div class="flex items-center justify-between pt-2.5 border-t border-gray-100 dark:border-[#222]">
                                <div class="flex items-center gap-3 text-gray-400 dark:text-[#5a5a5a] text-[11px]">
                                    <span class="flex items-center gap-1"><i class="fa-regular fa-comment text-[10px]"></i> 2</span>
                                    <span class="flex items-center gap-1"><i class="fa-regular fa-clock text-[10px]"></i> Oct 10</span>
                                </div>
                                <div class="w-6 h-6 rounded-full bg-emerald-100 dark:bg-[#1a3a2a] text-emerald-600 dark:text-emerald-400 text-[9px] font-bold flex items-center justify-center">SK</div>
                            </div>
                        </div>
                    </div>
                    <button class="mx-3 mb-3 flex items-center justify-center gap-2 py-2 border border-dashed border-gray-300 dark:border-[#2d2d2d] rounded-xl text-gray-400 dark:text-[#5a5a5a] hover:text-gray-600 dark:hover:text-gray-400 hover:border-gray-400 dark:hover:border-[#3a3a3a] text-xs font-medium transition bg-transparent">
                        <i class="fa-solid fa-plus text-[10px]"></i> Add Task
                    </button>
                </div>

                <!-- ADD STATUS -->
                <div class="w-72 min-w-[288px] flex-shrink-0">
                    <button class="w-full h-14 flex items-center justify-center gap-2 border-2 border-dashed border-gray-300 dark:border-[#2a2a2a] rounded-2xl text-gray-400 dark:text-[#5a5a5a] hover:text-gray-600 dark:hover:text-gray-400 hover:border-gray-400 dark:hover:border-[#3a3a3a] font-medium text-sm transition bg-transparent">
                        <i class="fa-solid fa-plus text-xs"></i> Add Status
                    </button>
                </div>

            </div>
        </div>

    </div>

    <!-- JAVASCRIPT TEMA -->
    <script>
        document.getElementById('theme-toggle').addEventListener('click', function () {
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
