<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProSite - Projects</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif']
                    },
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
        body {
            font-family: 'Inter', sans-serif;
        }

        .bg-neon {
            background-color: #ccff00;
        }

        .text-neon {
            color: #ccff00;
        }

        /* Efek Glow Hijau di Latar Belakang */
        .bg-glow {
            background: radial-gradient(circle at 20% 20%, rgba(204, 255, 0, 0.05) 0%, transparent 40%),
                radial-gradient(circle at 80% 80%, rgba(204, 255, 0, 0.03) 0%, transparent 40%);
        }
    </style>
</head>

<body class="bg-[#0e100f] text-gray-200 font-sans antialiased h-screen overflow-hidden flex m-0 p-0 bg-glow">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-[#090b0a] border-r border-[#171c19] flex flex-col justify-between select-none flex-shrink-0">
        <div>
            <!-- Logo -->
            <div class="flex items-center gap-3 px-6 py-6">
                <div class="rounded-xl flex items-center justify-center flex-shrink-0 bg-neon" style="width:40px;height:40px;">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="width:22px;height:22px;">
                        <rect x="3" y="3" width="7" height="7" rx="1.5" fill="#0a0a0a" />
                        <rect x="14" y="3" width="7" height="7" rx="1.5" fill="#0a0a0a" />
                        <rect x="3" y="14" width="7" height="7" rx="1.5" fill="#0a0a0a" />
                        <rect x="14" y="14" width="7" height="7" rx="1.5" fill="#0a0a0a" />
                    </svg>
                </div>
                <span class="text-xl font-bold tracking-wide text-white">ProSite</span>
            </div>

            <!-- Navigation Links -->
            <nav class="mt-4 px-3 space-y-1.5">
                <a href="{{ url('/dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-gray-400 hover:text-white hover:bg-[#131916] font-medium text-sm transition">
                    <i class="fa-solid fa-chart-pie text-base"></i> Dashboard
                </a>
                <a href="{{ url('/projects') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl bg-[#17201b] text-white font-medium text-sm">
                    <i class="fa-regular fa-folder text-base"></i> Project
                </a>
                <a href="{{ url('/board') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-gray-400 hover:text-white hover:bg-[#131916] font-medium text-sm transition">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" style="width:16px;height:16px;">
                        <rect x="3" y="3" width="5" height="18" rx="1" />
                        <rect x="10" y="3" width="5" height="12" rx="1" />
                        <rect x="17" y="3" width="4" height="8" rx="1" />
                    </svg> Board
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-gray-400 hover:text-white hover:bg-[#131916] font-medium text-sm transition">
                    <i class="fa-regular fa-square-check text-base"></i> Task
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-gray-400 hover:text-white hover:bg-[#131916] font-medium text-sm transition">
                    <i class="fa-regular fa-user text-base"></i> Team
                </a>
                @if((session('user')->id_jabatan ?? 0) == 1)
                <a href="{{ url('/users') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-gray-400 hover:text-white hover:bg-[#131916] font-medium text-sm transition">
                    <i class="fa-solid fa-user-gear text-base"></i> User
                </a>
                @endif
            </nav>
        </div>

        <!-- Settings di Bawah Sidebar -->
        <div class="px-3 pb-6">
            <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-gray-400 hover:text-white hover:bg-[#131916] font-medium text-sm transition">
                <i class="fa-solid fa-gear text-base"></i> Settings
            </a>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 flex flex-col min-w-0">

        <!-- HEADER TOP BAR -->
        <header class="h-16 border-b border-brand-border px-8 flex items-center justify-between">
            <!-- Search Bar -->
            <div class="relative w-80">
                <i data-lucide="search" class="w-4 h-4 absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400"></i>
                <input type="text" placeholder="Search anything, tasks, issues..."
                    class="w-full bg-brand-card text-sm text-gray-200 placeholder-gray-500 rounded-full pl-10 pr-4 py-2 border border-brand-border focus:outline-none focus:border-brand-lime transition">
            </div>

            <!-- Header Actions -->
            <div class="flex items-center gap-4">
                <a href="{{ url('/projects/create') }}" class="bg-brand-lime text-black font-semibold text-sm px-4 py-2 rounded-full flex items-center gap-1.5 hover:bg-opacity-90 transition shadow-lg shadow-lime-500/10">
                    <i data-lucide="plus" class="w-4 h-4"></i>
                    Create Project
                </a>
                <div class="flex items-center gap-2 border-l border-brand-border pl-4">
                    <button class="p-2 text-gray-400 hover:text-white bg-brand-card rounded-full border border-brand-border"><i data-lucide="bell" class="w-4 h-4"></i></button>
                    <button class="p-2 text-gray-400 hover:text-white bg-brand-card rounded-full border border-brand-border"><i data-lucide="sun" class="w-4 h-4"></i></button>
                    <button class="p-2 text-gray-400 hover:text-white bg-brand-card rounded-full border border-brand-border"><i data-lucide="help-circle" class="w-4 h-4"></i></button>
                    <img src="https://i.pravatar.cc/100?img=33" class="w-8 h-8 rounded-full border border-brand-lime ml-2" alt="User Avatar">
                </div>
            </div>
        </header>

        <!-- PAGE CONTENT CONTAINER -->
        <div class="p-8 space-y-6 overflow-y-auto">

            <!-- Title & Filters -->
            <div>
                <h1 class="text-2xl font-bold text-white">Projects</h1>
                <p class="text-sm text-gray-400 mt-0.5">Manage and track all ongoing project streams</p>

                <div class="flex items-center gap-3 mt-4">
                    <button class="bg-brand-card border border-brand-border text-xs px-3 py-1.5 rounded-lg flex items-center gap-2 text-gray-300">
                        Status: <span class="text-white font-medium">All</span>
                        <i data-lucide="chevron-down" class="w-3.5 h-3.5"></i>
                    </button>
                    <button class="bg-brand-card border border-brand-border text-xs px-3 py-1.5 rounded-lg flex items-center gap-2 text-gray-300">
                        Priority: <span class="text-white font-medium">High</span>
                        <i data-lucide="chevron-down" class="w-3.5 h-3.5"></i>
                    </button>
                </div>
            </div>

            <!-- GRID LAYOUT -->
            <div class="grid grid-cols-12 gap-6">

                <!-- PROJECT CARDS GRID (Left 8 Columns) -->
                <div class="col-span-8 grid grid-cols-2 gap-4">

                    <!-- Card 1 -->
                    <div class="bg-brand-card border border-brand-border/80 rounded-2xl p-4 flex flex-col justify-between hover:border-gray-700 transition">
                        <div>
                            <div class="flex items-start justify-between">
                                <div>
                                    <h3 class="text-sm font-semibold text-white">E-Commerce Platform</h3>
                                    <span class="text-[11px] text-gray-400">PRJ-001</span>
                                </div>
                                <span class="bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 text-[10px] px-2.5 py-0.5 rounded-full font-medium">Active</span>
                            </div>
                            <div class="mt-4">
                                <div class="flex justify-between text-xs text-gray-400 mb-1.5">
                                    <span>Completion Progress</span>
                                    <span class="text-white font-semibold">78%</span>
                                </div>
                                <div class="w-full bg-gray-800 rounded-full h-1.5">
                                    <div class="bg-brand-lime h-1.5 rounded-full" style="width: 78%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-between text-xs text-gray-400 mt-4 pt-3 border-t border-brand-border/40">
                            <span class="flex items-center gap-1.5 text-amber-400"><span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span> High Priority</span>
                            <span class="flex items-center gap-1"><i data-lucide="check-square" class="w-3.5 h-3.5"></i> 34 Tasks</span>
                            <span class="flex items-center gap-1"><i data-lucide="calendar" class="w-3.5 h-3.5"></i> Due Dec 15</span>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="bg-brand-card border border-brand-border/80 rounded-2xl p-4 flex flex-col justify-between hover:border-gray-700 transition">
                        <div>
                            <div class="flex items-start justify-between">
                                <div>
                                    <h3 class="text-sm font-semibold text-white">Mobile Banking App</h3>
                                    <span class="text-[11px] text-gray-400">PRJ-002</span>
                                </div>
                                <span class="bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 text-[10px] px-2.5 py-0.5 rounded-full font-medium">Active</span>
                            </div>
                            <div class="mt-4">
                                <div class="flex justify-between text-xs text-gray-400 mb-1.5">
                                    <span>Completion Progress</span>
                                    <span class="text-white font-semibold">65%</span>
                                </div>
                                <div class="w-full bg-gray-800 rounded-full h-1.5">
                                    <div class="bg-brand-lime h-1.5 rounded-full" style="width: 65%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-between text-xs text-gray-400 mt-4 pt-3 border-t border-brand-border/40">
                            <span class="flex items-center gap-1.5 text-rose-500"><span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span> Critical Priority</span>
                            <span class="flex items-center gap-1"><i data-lucide="check-square" class="w-3.5 h-3.5"></i> 52 Tasks</span>
                            <span class="flex items-center gap-1"><i data-lucide="calendar" class="w-3.5 h-3.5"></i> Due Nov 30</span>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="bg-brand-card border border-brand-border/80 rounded-2xl p-4 flex flex-col justify-between hover:border-gray-700 transition">
                        <div>
                            <div class="flex items-start justify-between">
                                <div>
                                    <h3 class="text-sm font-semibold text-white">CRM Dashboard</h3>
                                    <span class="text-[11px] text-gray-400">PRJ-003</span>
                                </div>
                                <span class="bg-blue-500/10 text-blue-400 border border-blue-500/20 text-[10px] px-2.5 py-0.5 rounded-full font-medium">In Review</span>
                            </div>
                            <div class="mt-4">
                                <div class="flex justify-between text-xs text-gray-400 mb-1.5">
                                    <span>Completion Progress</span>
                                    <span class="text-white font-semibold">92%</span>
                                </div>
                                <div class="w-full bg-gray-800 rounded-full h-1.5">
                                    <div class="bg-brand-lime h-1.5 rounded-full" style="width: 92%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-between text-xs text-gray-400 mt-4 pt-3 border-t border-brand-border/40">
                            <span class="flex items-center gap-1.5 text-purple-400"><span class="w-1.5 h-1.5 rounded-full bg-purple-400"></span> Medium Priority</span>
                            <span class="flex items-center gap-1"><i data-lucide="check-square" class="w-3.5 h-3.5"></i> 28 Tasks</span>
                            <span class="flex items-center gap-1"><i data-lucide="calendar" class="w-3.5 h-3.5"></i> Due Oct 20</span>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div class="bg-brand-card border border-brand-border/80 rounded-2xl p-4 flex flex-col justify-between hover:border-gray-700 transition">
                        <div>
                            <div class="flex items-start justify-between">
                                <div>
                                    <h3 class="text-sm font-semibold text-white">API Gateway Service</h3>
                                    <span class="text-[11px] text-gray-400">PRJ-004</span>
                                </div>
                                <span class="bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 text-[10px] px-2.5 py-0.5 rounded-full font-medium">Active</span>
                            </div>
                            <div class="mt-4">
                                <div class="flex justify-between text-xs text-gray-400 mb-1.5">
                                    <span>Completion Progress</span>
                                    <span class="text-white font-semibold">45%</span>
                                </div>
                                <div class="w-full bg-gray-800 rounded-full h-1.5">
                                    <div class="bg-brand-lime h-1.5 rounded-full" style="width: 45%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-between text-xs text-gray-400 mt-4 pt-3 border-t border-brand-border/40">
                            <span class="flex items-center gap-1.5 text-amber-400"><span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span> High Priority</span>
                            <span class="flex items-center gap-1"><i data-lucide="check-square" class="w-3.5 h-3.5"></i> 41 Tasks</span>
                            <span class="flex items-center gap-1"><i data-lucide="calendar" class="w-3.5 h-3.5"></i> Due Jan 10</span>
                        </div>
                    </div>

                    <!-- Card 5 -->
                    <div class="bg-brand-card border border-brand-border/80 rounded-2xl p-4 flex flex-col justify-between hover:border-gray-700 transition">
                        <div>
                            <div class="flex items-start justify-between">
                                <div>
                                    <h3 class="text-sm font-semibold text-white">Design System Library</h3>
                                    <span class="text-[11px] text-gray-400">PRJ-005</span>
                                </div>
                                <span class="bg-gray-500/10 text-gray-400 border border-gray-500/20 text-[10px] px-2.5 py-0.5 rounded-full font-medium">Planning</span>
                            </div>
                            <div class="mt-4">
                                <div class="flex justify-between text-xs text-gray-400 mb-1.5">
                                    <span>Completion Progress</span>
                                    <span class="text-white font-semibold">12%</span>
                                </div>
                                <div class="w-full bg-gray-800 rounded-full h-1.5">
                                    <div class="bg-brand-lime h-1.5 rounded-full" style="width: 12%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-between text-xs text-gray-400 mt-4 pt-3 border-t border-brand-border/40">
                            <span class="flex items-center gap-1.5 text-teal-400"><span class="w-1.5 h-1.5 rounded-full bg-teal-400"></span> Low Priority</span>
                            <span class="flex items-center gap-1"><i data-lucide="check-square" class="w-3.5 h-3.5"></i> 15 Tasks</span>
                            <span class="flex items-center gap-1"><i data-lucide="calendar" class="w-3.5 h-3.5"></i> Due Feb 28</span>
                        </div>
                    </div>

                    <!-- Card 6 -->
                    <div class="bg-brand-card border border-brand-border/80 rounded-2xl p-4 flex flex-col justify-between hover:border-gray-700 transition">
                        <div>
                            <div class="flex items-start justify-between">
                                <div>
                                    <h3 class="text-sm font-semibold text-white">Data Analytics Engine</h3>
                                    <span class="text-[11px] text-gray-400">PRJ-006</span>
                                </div>
                                <span class="bg-amber-500/10 text-amber-500 border border-amber-500/20 text-[10px] px-2.5 py-0.5 rounded-full font-medium">On Hold</span>
                            </div>
                            <div class="mt-4">
                                <div class="flex justify-between text-xs text-gray-400 mb-1.5">
                                    <span>Completion Progress</span>
                                    <span class="text-white font-semibold">33%</span>
                                </div>
                                <div class="w-full bg-gray-800 rounded-full h-1.5">
                                    <div class="bg-brand-lime h-1.5 rounded-full" style="width: 33%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-between text-xs text-gray-400 mt-4 pt-3 border-t border-brand-border/40">
                            <span class="flex items-center gap-1.5 text-purple-400"><span class="w-1.5 h-1.5 rounded-full bg-purple-400"></span> Medium Priority</span>
                            <span class="flex items-center gap-1"><i data-lucide="check-square" class="w-3.5 h-3.5"></i> 22 Tasks</span>
                            <span class="flex items-center gap-1"><i data-lucide="calendar" class="w-3.5 h-3.5"></i> Due Mar 15</span>
                        </div>
                    </div>

                </div>

                <!-- RIGHT SIDE STATS (Right 4 Columns) -->
                <div class="col-span-4 space-y-4">

                    <!-- Summary Card -->
                    <div class="bg-brand-card border border-brand-border/80 rounded-2xl p-5">
                        <h3 class="text-sm font-semibold text-white mb-4">Project Status Summary</h3>

                        <div class="space-y-3 text-xs">
                            <div class="flex items-center justify-between">
                                <span class="flex items-center gap-2 text-gray-300">
                                    <span class="w-2 h-2 rounded-full bg-emerald-400"></span> Active
                                </span>
                                <span class="font-bold text-white">4 Projects</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="flex items-center gap-2 text-gray-300">
                                    <span class="w-2 h-2 rounded-full bg-blue-400"></span> In Review
                                </span>
                                <span class="font-bold text-white">1 Project</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="flex items-center gap-2 text-gray-300">
                                    <span class="w-2 h-2 rounded-full bg-gray-400"></span> Planning
                                </span>
                                <span class="font-bold text-white">1 Project</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="flex items-center gap-2 text-gray-300">
                                    <span class="w-2 h-2 rounded-full bg-amber-500"></span> On Hold
                                </span>
                                <span class="font-bold text-white">1 Project</span>
                            </div>
                        </div>
                    </div>

                    <!-- Overall Efficiency Card -->
                    <div class="bg-brand-card border border-brand-border/80 rounded-2xl p-5">
                        <h3 class="text-sm font-semibold text-white mb-4">Overall Efficiency</h3>

                        <div>
                            <div class="flex items-center justify-between text-xs mb-2">
                                <span class="text-gray-400">On-Time Delivery</span>
                                <span class="font-bold text-white">94.2%</span>
                            </div>
                            <div class="w-full bg-gray-800 rounded-full h-1.5">
                                <div class="bg-brand-lime h-1.5 rounded-full" style="width: 94.2%"></div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </main>

    <!-- Script Lucide Icons -->
    <script>
        lucide.createIcons();
    </script>
</body>

</html>