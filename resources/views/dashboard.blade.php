<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProSite - Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Warna kustom hijau neon sesuai gambar */
        .bg-neon { background-color: #ccff00; }
        .text-neon { color: #ccff00; }
        .border-neon { border-color: #ccff00; }
    </style>
</head>
<body class="bg-[#0e100f] text-gray-200 font-sans antialiased h-screen overflow-hidden flex m-0 p-0">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-[#090b0a] border-r border-[#171c19] flex flex-col justify-between select-none flex-shrink-0">
        <div>
            <!-- Logo -->
            <div class="flex items-center gap-3 px-6 py-6">
                <div class="bg-neon text-black p-2 rounded-xl flex items-center justify-center font-bold text-lg">
                    <i class="fa-solid fa-shapes"></i>
                </div>
                <span class="text-xl font-bold tracking-wide text-white">ProSite</span>
            </div>

            <!-- Navigation Links -->
            <nav class="mt-4 px-3 space-y-1.5">
                <a href="{{ url('/dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl bg-[#17201b] text-white font-medium text-sm">
                    <i class="fa-solid fa-chart-pie text-base"></i> Dashboard
                </a>
                <a href="{{ url('/projects') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-gray-400 hover:text-white hover:bg-[#131916] font-medium text-sm transition">
                    <i class="fa-regular fa-folder text-base"></i> Projects
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-gray-400 hover:text-white hover:bg-[#131916] font-medium text-sm transition">
                    <i class="fa-regular fa-clone text-base"></i> Boards
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-gray-400 hover:text-white hover:bg-[#131916] font-medium text-sm transition">
                    <i class="fa-regular fa-square-check text-base"></i> Tasks
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-gray-400 hover:text-white hover:bg-[#131916] font-medium text-sm transition">
                    <i class="fa-regular fa-user text-base"></i> Team
                </a>
                @if((session('user')->id_jabatan ?? 0) == 1)
                <a href="{{ url('/users') }}" class="flex items-center gap-3 px-4 py-3 rounded-2xl text-gray-400 hover:text-white hover:bg-[#131916] font-medium text-sm transition">
                    <i class="fa-solid fa-user-gear text-base"></i> Users
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
    <div class="flex-1 flex flex-col h-screen overflow-hidden bg-[#0e100f]">
        
        <!-- TOPBAR -->
        <header class="h-20 border-b border-[#171c19] flex items-center justify-between px-8 bg-[#0e100f] flex-shrink-0">
            <!-- Search bar -->
            <div class="relative w-96">
                <span class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-gray-500">
                    <i class="fa-solid fa-magnifying-glass text-sm"></i>
                </span>
                <input type="text" placeholder="Search anything, tasks, issues..." class="w-full bg-[#131916] text-sm text-gray-300 pl-11 pr-4 py-2.5 rounded-2xl border border-[#1f2622] focus:outline-none focus:border-[#ccff00] transition">
            </div>

            <!-- Top Right Icons & Button -->
            <div class="flex items-center gap-4">
                <!-- Create Project Button -->
                <button class="bg-neon text-black font-semibold text-sm px-4 py-2.5 rounded-xl flex items-center gap-2 hover:opacity-95 transition shadow-sm">
                    <i class="fa-solid fa-plus text-xs font-bold"></i> Create Project
                </button>

                <button class="w-10 h-10 rounded-xl bg-[#131916] border border-[#1f2622] flex items-center justify-center text-gray-400 hover:text-white transition relative">
                    <i class="fa-regular fa-bell text-sm"></i>
                    <span class="absolute top-2.5 right-2.5 w-2 h-2 bg-neon rounded-full"></span>
                </button>
                <button class="w-10 h-10 rounded-xl bg-[#131916] border border-[#1f2622] flex items-center justify-center text-gray-400 hover:text-white transition">
                    <i class="fa-regular fa-sun text-sm"></i>
                </button>
                <button class="w-10 h-10 rounded-xl bg-[#131916] border border-[#1f2622] flex items-center justify-center text-gray-400 hover:text-white transition">
                    <i class="fa-regular fa-circle-question text-sm"></i>
                </button>
                <div class="ml-1">
                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&h=100&fit=crop&crop=faces" alt="Profile" class="w-10 h-10 rounded-xl object-cover border border-[#1f2622]">
                </div>
            </div>
        </header>

        <!-- DASHBOARD CONTAINER -->
        <main class="flex-1 overflow-y-auto p-8 bg-[#0e100f]">
            
            <!-- STATS CARDS ROW -->
            <div class="grid grid-cols-5 gap-5 mb-8">
                <!-- Card 1 -->
                <div class="bg-[#131916] border border-[#1f2622] rounded-2xl p-5 flex flex-col justify-between shadow-sm">
                    <div class="flex justify-between items-start text-gray-400">
                        <span class="text-xs font-semibold tracking-wider text-gray-400">TOTAL PROJECTS</span>
                        <i class="fa-regular fa-folder text-lg text-gray-400"></i>
                    </div>
                    <div class="mt-4">
                        <h3 class="text-3xl font-bold text-white">24</h3>
                        <p class="text-xs text-neon font-medium mt-1">+2 this mo</p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-[#131916] border border-[#1f2622] rounded-2xl p-5 flex flex-col justify-between shadow-sm">
                    <div class="flex justify-between items-start text-gray-400">
                        <span class="text-xs font-semibold tracking-wider text-gray-400">ACTIVE TASKS</span>
                        <i class="fa-regular fa-square-check text-lg text-gray-400"></i>
                    </div>
                    <div class="mt-4">
                        <h3 class="text-3xl font-bold text-white">156</h3>
                        <p class="text-xs text-neon font-medium mt-1">+14% vs last wk</p>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-[#131916] border border-[#1f2622] rounded-2xl p-5 flex flex-col justify-between shadow-sm">
                    <div class="flex justify-between items-start text-gray-400">
                        <span class="text-xs font-semibold tracking-wider text-gray-400">COMPLETED TASKS</span>
                        <i class="fa-solid fa-layer-group text-lg text-gray-400"></i>
                    </div>
                    <div class="mt-4">
                        <h3 class="text-3xl font-bold text-white">89</h3>
                        <p class="text-xs text-neon font-medium mt-1">82% target</p>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="bg-[#131916] border border-[#1f2622] rounded-2xl p-5 flex flex-col justify-between shadow-sm">
                    <div class="flex justify-between items-start text-gray-400">
                        <span class="text-xs font-semibold tracking-wider text-gray-400">OVERDUE TASKS</span>
                        <i class="fa-solid fa-triangle-exclamation text-lg text-gray-400"></i>
                    </div>
                    <div class="mt-4">
                        <h3 class="text-3xl font-bold text-white">12</h3>
                        <p class="text-xs text-rose-500 font-medium mt-1">+3 since yesterday</p>
                    </div>
                </div>

                <!-- Card 5 -->
                <div class="bg-[#131916] border border-[#1f2622] rounded-2xl p-5 flex flex-col justify-between shadow-sm">
                    <div class="flex justify-between items-start text-gray-400">
                        <span class="text-xs font-semibold tracking-wider text-gray-400">TEAM MEMBERS</span>
                        <i class="fa-regular fa-user text-lg text-gray-400"></i>
                    </div>
                    <div class="mt-4">
                        <h3 class="text-3xl font-bold text-white">18</h3>
                        <p class="text-xs text-neon font-medium mt-1">3 teams</p>
                    </div>
                </div>
            </div>

            <!-- BOARD SECTION -->
            <div class="grid grid-cols-4 gap-6">
                
                <!-- MAIN KANBAN BOARD -->
                <div class="col-span-3">
                    <div class="flex items-center justify-between mb-5">
                        <h2 class="text-xl font-bold text-white">Development Board</h2>
                    </div>

                    <!-- Columns Grid -->
                    <div class="grid grid-cols-4 gap-4">
                        
                        <!-- COLUMN 1: To Do -->
                        <div class="flex flex-col gap-4">
                            <div class="flex items-center justify-between text-sm px-1">
                                <div class="flex items-center gap-2">
                                    <span class="w-2.5 h-2.5 rounded-full bg-gray-400"></span>
                                    <span class="font-semibold text-gray-300">To Do</span>
                                </div>
                                <span class="text-xs text-gray-500 bg-[#131916] border border-[#1f2622] px-2 py-0.5 rounded-md">5</span>
                            </div>

                            <!-- Card 1 -->
                            <div class="bg-[#131916] border border-[#1f2622] rounded-2xl p-4 flex flex-col justify-between gap-4 shadow-sm">
                                <div>
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="bg-[#2c2211] text-amber-400 text-[10px] font-semibold px-2 py-0.5 rounded">High</span>
                                        <span class="text-[11px] text-gray-500 font-mono">PRJ-142</span>
                                    </div>
                                    <p class="text-sm font-semibold text-gray-200 leading-snug">Implement OAuth2 Authentication System</p>
                                </div>
                                <div class="flex items-center justify-between pt-2 border-t border-[#1b241f]">
                                    <div class="flex items-center gap-2">
                                        <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=50&h=50&fit=crop" class="w-6 h-6 rounded-lg object-cover border border-[#1f2622]" alt="avatar">
                                        <span class="text-xs text-gray-400">Oct 24</span>
                                    </div>
                                    <span class="bg-[#15231c] text-neon text-[10px] px-2 py-0.5 rounded-md font-medium">Security</span>
                                </div>
                            </div>

                            <!-- Card 2 -->
                            <div class="bg-[#131916] border border-[#1f2622] rounded-2xl p-4 flex flex-col justify-between gap-4 shadow-sm">
                                <div>
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="bg-[#15231c] text-neon text-[10px] font-semibold px-2 py-0.5 rounded">Low</span>
                                        <span class="text-[11px] text-gray-500 font-mono">PRJ-145</span>
                                    </div>
                                    <p class="text-sm font-semibold text-gray-200 leading-snug">Setup Docker Multi-Stage Builds</p>
                                </div>
                                <div class="flex items-center justify-between pt-2 border-t border-[#1b241f]">
                                    <div class="flex items-center gap-2">
                                        <img src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?w=50&h=50&fit=crop" class="w-6 h-6 rounded-lg object-cover border border-[#1f2622]" alt="avatar">
                                        <span class="text-xs text-gray-400">Oct 28</span>
                                    </div>
                                    <span class="bg-[#241e15] text-amber-500 text-[10px] px-2 py-0.5 rounded-md font-medium">DevOps</span>
                                </div>
                            </div>
                        </div>

                        <!-- COLUMN 2: In Progress -->
                        <div class="flex flex-col gap-4">
                            <div class="flex items-center justify-between text-sm px-1">
                                <div class="flex items-center gap-2">
                                    <span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span>
                                    <span class="font-semibold text-gray-300">In Progress</span>
                                </div>
                                <span class="text-xs text-gray-500 bg-[#131916] border border-[#1f2622] px-2 py-0.5 rounded-md">4</span>
                            </div>

                            <!-- Card -->
                            <div class="bg-[#131916] border border-[#1f2622] rounded-2xl p-4 flex flex-col justify-between gap-4 shadow-sm">
                                <div>
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="bg-[#2c1515] text-rose-400 text-[10px] font-semibold px-2 py-0.5 rounded">Critical</span>
                                        <span class="text-[11px] text-gray-500 font-mono">PRJ-138</span>
                                    </div>
                                    <p class="text-sm font-semibold text-gray-200 leading-snug">Design System UI Component Library</p>
                                </div>
                                <div class="flex items-center justify-between pt-2 border-t border-[#1b241f]">
                                    <div class="flex items-center gap-2">
                                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=50&h=50&fit=crop" class="w-6 h-6 rounded-lg object-cover border border-[#1f2622]" alt="avatar">
                                        <span class="text-xs text-gray-400">Oct 21</span>
                                    </div>
                                    <span class="bg-[#141b24] text-blue-400 text-[10px] px-2 py-0.5 rounded-md font-medium">Frontend</span>
                                </div>
                            </div>
                        </div>

                        <!-- COLUMN 3: Review -->
                        <div class="flex flex-col gap-4">
                            <div class="flex items-center justify-between text-sm px-1">
                                <div class="flex items-center gap-2">
                                    <span class="w-2.5 h-2.5 rounded-full bg-blue-500"></span>
                                    <span class="font-semibold text-gray-300">Review</span>
                                </div>
                                <span class="text-xs text-gray-500 bg-[#131916] border border-[#1f2622] px-2 py-0.5 rounded-md">3</span>
                            </div>

                            <!-- Card -->
                            <div class="bg-[#131916] border border-[#1f2622] rounded-2xl p-4 flex flex-col justify-between gap-4 shadow-sm">
                                <div>
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="bg-[#2c2211] text-amber-400 text-[10px] font-semibold px-2 py-0.5 rounded">High</span>
                                        <span class="text-[11px] text-gray-500 font-mono">PRJ-155</span>
                                    </div>
                                    <p class="text-sm font-semibold text-gray-200 leading-snug">API Rate Limiting & Gateway Config</p>
                                </div>
                                <div class="flex items-center justify-between pt-2 border-t border-[#1b241f]">
                                    <div class="flex items-center gap-2">
                                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=50&h=50&fit=crop" class="w-6 h-6 rounded-lg object-cover border border-[#1f2622]" alt="avatar">
                                        <span class="text-xs text-gray-400">Oct 19</span>
                                    </div>
                                    <span class="bg-[#201824] text-purple-400 text-[10px] px-2 py-0.5 rounded-md font-medium">Backend</span>
                                </div>
                            </div>
                        </div>

                        <!-- COLUMN 4: Done -->
                        <div class="flex flex-col gap-4">
                            <div class="flex items-center justify-between text-sm px-1">
                                <div class="flex items-center gap-2">
                                    <span class="w-2.5 h-2.5 rounded-full bg-neon"></span>
                                    <span class="font-semibold text-gray-300">Done</span>
                                </div>
                                <span class="text-xs text-gray-500 bg-[#131916] border border-[#1f2622] px-2 py-0.5 rounded-md">6</span>
                            </div>

                            <!-- Card -->
                            <div class="bg-[#131916] border border-[#1f2622] rounded-2xl p-4 flex flex-col justify-between gap-4 shadow-sm">
                                <div>
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="bg-[#15231c] text-neon text-[10px] font-semibold px-2 py-0.5 rounded">Low</span>
                                        <span class="text-[11px] text-gray-500 font-mono">PRJ-161</span>
                                    </div>
                                    <p class="text-sm font-semibold text-gray-200 leading-snug">PostgreSQL Database Migration Script</p>
                                </div>
                                <div class="flex items-center justify-between pt-2 border-t border-[#1b241f]">
                                    <div class="flex items-center gap-2">
                                        <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=50&h=50&fit=crop" class="w-6 h-6 rounded-lg object-cover border border-[#1f2622]" alt="avatar">
                                        <span class="text-xs text-gray-400">Oct 15</span>
                                    </div>
                                    <span class="bg-[#152124] text-cyan-400 text-[10px] px-2 py-0.5 rounded-md font-medium">Database</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- RIGHT SIDE PANELS -->
                <div class="col-span-1 flex flex-col gap-6">
                    
                    <!-- Team Workload Card -->
                    <div class="bg-[#131916] border border-[#1f2622] rounded-2xl p-5 shadow-sm">
                        <h3 class="text-sm font-bold text-white mb-4">Team Workload</h3>
                        
                        <div class="space-y-4">
                            <div>
                                <div class="flex justify-between text-xs mb-1.5">
                                    <span class="text-gray-300 font-medium">John D.</span>
                                    <span class="text-gray-500">12 tasks</span>
                                </div>
                                <div class="w-full bg-[#1b241f] h-1.5 rounded-full overflow-hidden">
                                    <div class="bg-neon h-full rounded-full" style="width: 85%"></div>
                                </div>
                            </div>

                            <div>
                                <div class="flex justify-between text-xs mb-1.5">
                                    <span class="text-gray-300 font-medium">Sarah J.</span>
                                    <span class="text-gray-500">8 tasks</span>
                                </div>
                                <div class="w-full bg-[#1b241f] h-1.5 rounded-full overflow-hidden">
                                    <div class="bg-neon h-full rounded-full" style="width: 60%"></div>
                                </div>
                            </div>

                            <div>
                                <div class="flex justify-between text-xs mb-1.5">
                                    <span class="text-gray-300 font-medium">Michael K.</span>
                                    <span class="text-gray-500">4 tasks</span>
                                </div>
                                <div class="w-full bg-[#1b241f] h-1.5 rounded-full overflow-hidden">
                                    <div class="bg-neon h-full rounded-full" style="width: 30%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity Card -->
                    <div class="bg-[#131916] border border-[#1f2622] rounded-2xl p-5 shadow-sm">
                        <h3 class="text-sm font-bold text-white mb-4">Recent Activity</h3>
                        
                        <div class="space-y-4 text-xs">
                            <div>
                                <p class="text-gray-300 leading-normal">John D. pushed to branch main</p>
                                <span class="text-gray-500 text-[11px]">2 mins ago</span>
                            </div>
                            <div>
                                <p class="text-gray-300 leading-normal">Sarah J. completed PRJ-138</p>
                                <span class="text-gray-500 text-[11px]">1 hr ago</span>
                            </div>
                            <div>
                                <p class="text-gray-300 leading-normal">Sprint review scheduled</p>
                                <span class="text-gray-500 text-[11px]">3 hrs ago</span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </main>
    </div>

</body>
</html>