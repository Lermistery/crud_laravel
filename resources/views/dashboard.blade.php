<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | ProSite</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { inter: ['Inter', 'sans-serif'] },
                    colors: {
                        bgmain:    '#0c0d0a',
                        bgsidebar: '#111310',
                        bgcard:    '#181a16',
                        bghover:   '#1e2019',
                        bginput:   '#1a1c18',
                        bdr:       '#252820',
                        txprimary: '#e8ead4',
                        txsecond:  '#8a8f78',
                        txmuted:   '#555a44',
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        ::-webkit-scrollbar { width: 4px; }
        ::-webkit-scrollbar-thumb { background: #252820; border-radius: 4px; }
        .bg-glow { position: relative; }
        .bg-glow::after {
            content: '';
            position: fixed;
            bottom: 0; left: 0; right: 0;
            height: 300px;
            background: radial-gradient(ellipse at 50% 110%, rgba(30,80,30,0.30) 0%, transparent 65%);
            pointer-events: none;
            z-index: 0;
        }
        .progress-fill { transition: width 1s ease; }
    </style>
</head>
<body class="bg-bgmain text-txprimary flex h-screen overflow-hidden bg-glow">

    {{-- SIDEBAR --}}
    <aside class="w-44 bg-bgsidebar border-r border-bdr flex flex-col py-4 flex-shrink-0 z-10">
        <div class="flex items-center gap-2.5 px-5 pb-6">
            <div class="w-8 h-8 rounded-lg flex items-center justify-center text-[11px] font-bold text-black flex-shrink-0"
                 style="background:linear-gradient(135deg,#f0b429,#c47c00)">PS</div>
            <span class="text-sm font-semibold">ProSite</span>
        </div>
        <nav class="flex flex-col gap-0.5 px-2">
            <a href="{{ url('/dashboard') }}"
               class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-xs font-medium bg-bghover text-txprimary">
                <i class="fa-solid fa-chart-line text-[11px] w-3.5 text-center"></i> Dashboard
            </a>
            <a href="{{ url('/projects') }}" class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-xs font-medium text-txsecond hover:bg-bghover hover:text-txprimary transition-colors">
                <i class="fa-solid fa-folder-open text-[11px] w-3.5 text-center"></i> Projects
            </a>
            <a href="{{ url('/board') }}" class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-xs font-medium text-txsecond hover:bg-bghover hover:text-txprimary transition-colors">
                <i class="fa-solid fa-table-columns text-[11px] w-3.5 text-center"></i> Boards
            </a>
            <a href="#" class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-xs font-medium text-txsecond hover:bg-bghover hover:text-txprimary transition-colors">
                <i class="fa-solid fa-circle-check text-[11px] w-3.5 text-center"></i> Tasks
            </a>
            <a href="#" class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-xs font-medium text-txsecond hover:bg-bghover hover:text-txprimary transition-colors">
                <i class="fa-solid fa-users text-[11px] w-3.5 text-center"></i> Team
            </a>
            @if(in_array(session('user')->id_jabatan ?? 0, [1, 2]))
            <a href="{{ url('/jabatan') }}" class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-xs font-medium text-txsecond hover:bg-bghover hover:text-txprimary transition-colors">
                <i class="fa-solid fa-id-badge text-[11px] w-3.5 text-center"></i> Jabatan
            </a>
            <a href="{{ url('/users') }}" class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-xs font-medium text-txsecond hover:bg-bghover hover:text-txprimary transition-colors">
                <i class="fa-solid fa-user-gear text-[11px] w-3.5 text-center"></i> Users
            </a>
            @endif
        </nav>
        <div class="flex-1"></div>
        <div class="px-2">
            <a href="#" class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-xs font-medium text-txsecond hover:bg-bghover hover:text-txprimary transition-colors">
                <i class="fa-solid fa-gear text-[11px] w-3.5 text-center"></i> Settings
            </a>
        </div>
    </aside>

    {{-- MAIN --}}
    <div class="flex-1 flex flex-col overflow-hidden z-10">

        {{-- Topbar --}}
        <header class="h-14 bg-bgsidebar border-b border-bdr flex items-center px-6 gap-4 flex-shrink-0">
            <div class="flex items-center gap-2 bg-bginput border border-bdr rounded-lg px-3.5 py-2 flex-1 max-w-xs">
                <i class="fa-solid fa-magnifying-glass text-txmuted text-[11px]"></i>
                <input type="text" placeholder="Search anything, tasks, issues..."
                       class="bg-transparent border-none outline-none text-txprimary text-xs placeholder-txmuted w-full">
            </div>
            <div class="ml-auto flex items-center gap-2">
                <button class="relative w-8 h-8 bg-bginput border border-bdr rounded-lg flex items-center justify-center text-txsecond hover:text-txprimary hover:bg-bghover transition-colors">
                    <i class="fa-solid fa-bell text-[11px]"></i>
                    <span class="absolute top-1.5 right-1.5 w-1.5 h-1.5 bg-yellow-400 rounded-full"></span>
                </button>
                <button class="w-8 h-8 bg-bginput border border-bdr rounded-lg flex items-center justify-center text-txsecond hover:text-txprimary hover:bg-bghover transition-colors">
                    <i class="fa-solid fa-sun text-[11px]"></i>
                </button>
                <button class="w-8 h-8 bg-bginput border border-bdr rounded-lg flex items-center justify-center text-txsecond hover:text-txprimary hover:bg-bghover transition-colors">
                    <i class="fa-solid fa-circle-question text-[11px]"></i>
                </button>
                <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-semibold text-black cursor-pointer"
                     style="background:linear-gradient(135deg,#a3e635,#65a30d)">
                    {{ strtoupper(substr(session('user')->nama ?? 'U', 0, 1)) }}
                </div>
                <a href="{{ url('/logout') }}"
                   class="w-8 h-8 bg-bginput border border-bdr rounded-lg flex items-center justify-center text-txsecond hover:text-txprimary hover:bg-bghover transition-colors">
                    <i class="fa-solid fa-right-from-bracket text-[11px]"></i>
                </a>
            </div>
        </header>

        {{-- Page content --}}
        <div class="flex-1 overflow-y-auto p-5 flex gap-4">

            {{-- Left col --}}
            <div class="flex-1 min-w-0">

                @if(session('error'))
                <div class="flex items-center gap-2 bg-red-500/10 border border-red-500/30 text-red-400 px-4 py-2.5 rounded-lg text-xs mb-4">
                    <i class="fa-solid fa-circle-exclamation"></i> {{ session('error') }}
                </div>
                @endif

                {{-- Stat cards --}}
                <div class="grid grid-cols-5 gap-3 mb-5">
                    <div class="bg-bgcard border border-bdr rounded-xl p-4 hover:border-green-500/20 transition-colors">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-[10px] font-semibold uppercase tracking-wider text-txmuted">Total Projects</span>
                            <i class="fa-regular fa-clipboard text-txmuted text-[11px]"></i>
                        </div>
                        <div class="text-2xl font-bold mb-1">24</div>
                        <div class="text-[11px] text-green-400">+2 this mo</div>
                    </div>
                    <div class="bg-bgcard border border-bdr rounded-xl p-4 hover:border-green-500/20 transition-colors">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-[10px] font-semibold uppercase tracking-wider text-txmuted">Active Tasks</span>
                            <i class="fa-solid fa-circle-check text-txmuted text-[11px]"></i>
                        </div>
                        <div class="text-2xl font-bold mb-1">156</div>
                        <div class="text-[11px] text-green-400">+14% vs last wk</div>
                    </div>
                    <div class="bg-bgcard border border-bdr rounded-xl p-4 hover:border-green-500/20 transition-colors">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-[10px] font-semibold uppercase tracking-wider text-txmuted">Completed Tasks</span>
                            <i class="fa-regular fa-comment text-txmuted text-[11px]"></i>
                        </div>
                        <div class="text-2xl font-bold mb-1">89</div>
                        <div class="text-[11px] text-txsecond">82% target</div>
                    </div>
                    <div class="bg-bgcard border border-bdr rounded-xl p-4 hover:border-green-500/20 transition-colors">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-[10px] font-semibold uppercase tracking-wider text-txmuted">Overdue Tasks</span>
                            <i class="fa-solid fa-triangle-exclamation text-txmuted text-[11px]"></i>
                        </div>
                        <div class="text-2xl font-bold mb-1">12</div>
                        <div class="text-[11px] text-red-400">+3 since yesterday</div>
                    </div>
                    <div class="bg-bgcard border border-bdr rounded-xl p-4 hover:border-green-500/20 transition-colors">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-[10px] font-semibold uppercase tracking-wider text-txmuted">Team Members</span>
                            <i class="fa-solid fa-users text-txmuted text-[11px]"></i>
                        </div>
                        <div class="text-2xl font-bold mb-1">18</div>
                        <div class="text-[11px] text-txsecond">3 teams</div>
                    </div>
                </div>

                {{-- Board header --}}
                <h2 class="text-sm font-semibold mb-4">Development Board</h2>

                {{-- Kanban --}}
                <div class="grid grid-cols-4 gap-3">

                    {{-- TO DO --}}
                    <div class="bg-bgcard border border-bdr rounded-xl p-3.5">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center gap-1.5 text-xs font-semibold">
                                <span class="w-2 h-2 rounded-full bg-txmuted inline-block"></span> To Do
                            </div>
                            <span class="text-[10px] text-txsecond bg-bginput border border-bdr rounded-full px-2 py-0.5">5</span>
                        </div>
                        <div class="bg-bghover border border-bdr rounded-lg p-3 mb-2 hover:border-green-600/40 hover:-translate-y-0.5 transition-all cursor-pointer">
                            <div class="flex items-center justify-between mb-1.5">
                                <span class="text-[9px] font-bold px-1.5 py-0.5 rounded bg-red-500/15 text-red-400 uppercase tracking-wide">High</span>
                                <span class="text-[10px] text-txmuted">PRJ-142</span>
                            </div>
                            <p class="text-[11px] font-medium leading-relaxed mb-2.5">Implement OAuth2 Authentication System</p>
                            <div class="flex items-center justify-between">
                                <div class="w-5 h-5 rounded-full flex items-center justify-center text-[8px] font-bold text-black" style="background:linear-gradient(135deg,#60a5fa,#a78bfa)">JD</div>
                                <div class="flex items-center gap-1.5">
                                    <span class="text-[10px] text-txmuted"><i class="fa-regular fa-calendar text-[9px]"></i> Oct 24</span>
                                    <span class="text-[10px] text-txsecond border border-bdr px-1.5 py-0.5 rounded">Security</span>
                                </div>
                            </div>
                        </div>
                        <div class="bg-bghover border border-bdr rounded-lg p-3 hover:border-green-600/40 hover:-translate-y-0.5 transition-all cursor-pointer">
                            <div class="flex items-center justify-between mb-1.5">
                                <span class="text-[9px] font-bold px-1.5 py-0.5 rounded bg-green-500/15 text-green-400 uppercase tracking-wide">Low</span>
                                <span class="text-[10px] text-txmuted">PRJ-145</span>
                            </div>
                            <p class="text-[11px] font-medium leading-relaxed mb-2.5">Setup Docker Multi-Stage Builds</p>
                            <div class="flex items-center justify-between">
                                <div class="w-5 h-5 rounded-full flex items-center justify-center text-[8px] font-bold text-black" style="background:linear-gradient(135deg,#34d399,#059669)">MK</div>
                                <div class="flex items-center gap-1.5">
                                    <span class="text-[10px] text-txmuted"><i class="fa-regular fa-calendar text-[9px]"></i> Oct 28</span>
                                    <span class="text-[10px] text-txsecond border border-bdr px-1.5 py-0.5 rounded">DevOps</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- IN PROGRESS --}}
                    <div class="bg-bgcard border border-bdr rounded-xl p-3.5">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center gap-1.5 text-xs font-semibold">
                                <span class="w-2 h-2 rounded-full bg-blue-400 inline-block"></span> In Progress
                            </div>
                            <span class="text-[10px] text-txsecond bg-bginput border border-bdr rounded-full px-2 py-0.5">4</span>
                        </div>
                        <div class="bg-bghover border border-bdr rounded-lg p-3 hover:border-green-600/40 hover:-translate-y-0.5 transition-all cursor-pointer">
                            <div class="flex items-center justify-between mb-1.5">
                                <span class="text-[9px] font-bold px-1.5 py-0.5 rounded bg-yellow-500/15 text-yellow-400 uppercase tracking-wide">Critical</span>
                                <span class="text-[10px] text-txmuted">PRJ-138</span>
                            </div>
                            <p class="text-[11px] font-medium leading-relaxed mb-2.5">Design System UI Component Library</p>
                            <div class="flex items-center justify-between">
                                <div class="w-5 h-5 rounded-full flex items-center justify-center text-[8px] font-bold text-black" style="background:linear-gradient(135deg,#f472b6,#db2777)">SJ</div>
                                <div class="flex items-center gap-1.5">
                                    <span class="text-[10px] text-txmuted"><i class="fa-regular fa-calendar text-[9px]"></i> Oct 21</span>
                                    <span class="text-[10px] text-txsecond border border-bdr px-1.5 py-0.5 rounded">Frontend</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- REVIEW --}}
                    <div class="bg-bgcard border border-bdr rounded-xl p-3.5">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center gap-1.5 text-xs font-semibold">
                                <span class="w-2 h-2 rounded-full bg-blue-400 inline-block"></span> Review
                            </div>
                            <span class="text-[10px] text-txsecond bg-bginput border border-bdr rounded-full px-2 py-0.5">3</span>
                        </div>
                        <div class="bg-bghover border border-bdr rounded-lg p-3 hover:border-green-600/40 hover:-translate-y-0.5 transition-all cursor-pointer">
                            <div class="flex items-center justify-between mb-1.5">
                                <span class="text-[9px] font-bold px-1.5 py-0.5 rounded bg-red-500/15 text-red-400 uppercase tracking-wide">High</span>
                                <span class="text-[10px] text-txmuted">PRJ-155</span>
                            </div>
                            <p class="text-[11px] font-medium leading-relaxed mb-2.5">API Rate Limiting &amp; Gateway Config</p>
                            <div class="flex items-center justify-between">
                                <div class="w-5 h-5 rounded-full flex items-center justify-center text-[8px] font-bold text-black" style="background:linear-gradient(135deg,#fb923c,#c2410c)">AK</div>
                                <div class="flex items-center gap-1.5">
                                    <span class="text-[10px] text-txmuted"><i class="fa-regular fa-calendar text-[9px]"></i> Oct 19</span>
                                    <span class="text-[10px] text-txsecond border border-bdr px-1.5 py-0.5 rounded">Backend</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- DONE --}}
                    <div class="bg-bgcard border border-bdr rounded-xl p-3.5">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center gap-1.5 text-xs font-semibold">
                                <span class="w-2 h-2 rounded-full bg-green-400 inline-block"></span> Done
                            </div>
                            <span class="text-[10px] text-txsecond bg-bginput border border-bdr rounded-full px-2 py-0.5">6</span>
                        </div>
                        <div class="bg-bghover border border-bdr rounded-lg p-3 hover:border-green-600/40 hover:-translate-y-0.5 transition-all cursor-pointer">
                            <div class="flex items-center justify-between mb-1.5">
                                <span class="text-[9px] font-bold px-1.5 py-0.5 rounded bg-green-500/15 text-green-400 uppercase tracking-wide">Low</span>
                                <span class="text-[10px] text-txmuted">PRJ-161</span>
                            </div>
                            <p class="text-[11px] font-medium leading-relaxed mb-2.5">PostgreSQL Database Migration Script</p>
                            <div class="flex items-center justify-between">
                                <div class="w-5 h-5 rounded-full flex items-center justify-center text-[8px] font-bold text-black" style="background:linear-gradient(135deg,#f472b6,#db2777)">SJ</div>
                                <div class="flex items-center gap-1.5">
                                    <span class="text-[10px] text-txmuted"><i class="fa-regular fa-calendar text-[9px]"></i> Oct 15</span>
                                    <span class="text-[10px] text-txsecond border border-bdr px-1.5 py-0.5 rounded">Database</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>{{-- /kanban --}}
            </div>{{-- /col-left --}}

            {{-- Right panel --}}
            <div class="w-52 flex-shrink-0 flex flex-col gap-3.5">

                <div class="bg-bgcard border border-bdr rounded-xl p-4">
                    <h3 class="text-xs font-semibold mb-4">Team Workload</h3>
                    <div class="mb-3">
                        <div class="flex justify-between items-center mb-1.5">
                            <span class="text-xs font-medium">John D.</span>
                            <span class="text-[11px] text-txsecond">12 tasks</span>
                        </div>
                        <div class="h-1 rounded-full bg-bginput overflow-hidden">
                            <div class="h-full rounded-full progress-fill" style="width:80%;background:#4ade80;"></div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="flex justify-between items-center mb-1.5">
                            <span class="text-xs font-medium">Sarah J.</span>
                            <span class="text-[11px] text-txsecond">8 tasks</span>
                        </div>
                        <div class="h-1 rounded-full bg-bginput overflow-hidden">
                            <div class="h-full rounded-full progress-fill" style="width:55%;background:#a3e635;"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between items-center mb-1.5">
                            <span class="text-xs font-medium">Michael K.</span>
                            <span class="text-[11px] text-txsecond">4 tasks</span>
                        </div>
                        <div class="h-1 rounded-full bg-bginput overflow-hidden">
                            <div class="h-full rounded-full progress-fill" style="width:30%;background:#a3e635;"></div>
                        </div>
                    </div>
                </div>

                <div class="bg-bgcard border border-bdr rounded-xl p-4">
                    <h3 class="text-xs font-semibold mb-3">Recent Activity</h3>
                    <div class="border-b border-bdr pb-2.5 mb-2.5">
                        <p class="text-[11px] text-txsecond leading-relaxed mb-1">John D. pushed to branch main</p>
                        <span class="text-[10px] text-txmuted">2 mins ago</span>
                    </div>
                    <div class="border-b border-bdr pb-2.5 mb-2.5">
                        <p class="text-[11px] text-txsecond leading-relaxed mb-1">Sarah J. completed PRJ-138</p>
                        <span class="text-[10px] text-txmuted">1 hr ago</span>
                    </div>
                    <div>
                        <p class="text-[11px] text-txsecond leading-relaxed mb-1">Sprint review scheduled</p>
                        <span class="text-[10px] text-txmuted">3 hrs ago</span>
                    </div>
                </div>

            </div>{{-- /right panel --}}

        </div>{{-- /page --}}
    </div>{{-- /main --}}

</body>
</html>
