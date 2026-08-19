<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Project | ProSite</title>
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
                        brandlime: '#c8f135',
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
    </style>
</head>

<body class="bg-bgmain text-txprimary flex h-screen overflow-hidden bg-glow">

    {{-- SIDEBAR --}}
    <aside class="w-44 bg-bgsidebar border-r border-bdr flex flex-col py-4 flex-shrink-0 z-10">
        <div class="flex items-center gap-2.5 px-5 pb-6">
            <div class="w-8 h-8 rounded-lg flex items-center justify-center text-[11px] font-bold text-black flex-shrink-0"
                 style="background:linear-gradient(135deg,#c8f135,#85a300)">PS</div>
            <span class="text-sm font-semibold">ProSite</span>
        </div>
        <nav class="flex flex-col gap-0.5 px-2">
            <a href="{{ url('/dashboard') }}"
               class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-xs font-medium text-txsecond hover:bg-bghover hover:text-txprimary transition-colors">
                <i class="fa-solid fa-chart-line text-[11px] w-3.5 text-center"></i> Dashboard
            </a>
            <a href="{{ url('/projects') }}" class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-xs font-medium bg-bghover text-txprimary">
                <i class="fa-solid fa-folder-open text-[11px] w-3.5 text-center"></i> Projects
            </a>
            <a href="#" class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-xs font-medium text-txsecond hover:bg-bghover hover:text-txprimary transition-colors">
                <i class="fa-solid fa-table-columns text-[11px] w-3.5 text-center"></i> Boards
            </a>
            <a href="#" class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-xs font-medium text-txsecond hover:bg-bghover hover:text-txprimary transition-colors">
                <i class="fa-solid fa-circle-check text-[11px] w-3.5 text-center"></i> Tasks
            </a>
            <a href="#" class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-xs font-medium text-txsecond hover:bg-bghover hover:text-txprimary transition-colors">
                <i class="fa-solid fa-users text-[11px] w-3.5 text-center"></i> Team
            </a>
            @if((session('user')->id_jabatan ?? 0) == 1)
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
            <div class="flex items-center gap-2 text-xs text-txsecond font-medium">
                <span>Projects</span>
                <i class="fa-solid fa-chevron-right text-[9px] text-txmuted"></i>
                <span class="text-txprimary font-semibold">New Project</span>
            </div>
            
            <div class="ml-auto flex items-center gap-2">
                <div class="flex items-center gap-2 bg-bginput border border-bdr rounded-lg px-3.5 py-2 w-64 mr-2">
                    <i class="fa-solid fa-magnifying-glass text-txmuted text-[11px]"></i>
                    <input type="text" placeholder="Search anything, tasks, issues..."
                           class="bg-transparent border-none outline-none text-txprimary text-xs placeholder-txmuted w-full">
                </div>
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
        <div class="flex-1 overflow-y-auto p-8 flex items-center justify-center">

            <div class="w-full max-w-xl bg-bgcard border border-bdr rounded-2xl p-8 shadow-2xl">
                <h2 class="text-xl font-bold mb-2">Create New Project</h2>
                <p class="text-xs text-txsecond mb-6">Set up a new workspace for your team. You can modify these details later.</p>

                <form action="#" method="POST" class="space-y-5">
                    @csrf

                    {{-- Project Name --}}
                    <div class="space-y-2">
                        <label for="project_name" class="block text-[11px] font-semibold tracking-wider text-txsecond uppercase">Project Name</label>
                        <input type="text" id="project_name" name="nama_project" required
                               placeholder="e.g. Q4 Marketing Campaign"
                               class="w-full bg-bginput border border-bdr rounded-lg px-4 py-3 text-xs text-txprimary placeholder-txmuted outline-none focus:border-brandlime transition-colors">
                    </div>

                    {{-- Project Description --}}
                    <div class="space-y-2">
                        <label for="project_desc" class="block text-[11px] font-semibold tracking-wider text-txsecond uppercase">Project Description</label>
                        <textarea id="project_desc" name="deskripsi" rows="4"
                                  placeholder="Briefly describe the goals and scope..."
                                  class="w-full bg-bginput border border-bdr rounded-lg px-4 py-3 text-xs text-txprimary placeholder-txmuted outline-none focus:border-brandlime transition-colors resize-none"></textarea>
                    </div>

                    {{-- Deadline --}}
                    <div class="space-y-2">
                        <label for="deadline" class="block text-[11px] font-semibold tracking-wider text-txsecond uppercase">Deadline</label>
                        <input type="date" id="deadline" name="deadline" required
                               class="w-full bg-bginput border border-bdr rounded-lg px-4 py-3 text-xs text-txprimary placeholder-txmuted outline-none focus:border-brandlime transition-colors">
                    </div>

                    {{-- Form Actions --}}
                    <div class="flex justify-end gap-3 pt-4">
                        <a href="{{ url('/projects') }}"
                           class="px-5 py-2.5 rounded-lg border border-bdr text-xs font-semibold text-txsecond hover:text-txprimary hover:bg-bghover transition-colors">
                            Cancel
                        </a>
                        <button type="submit"
                                class="px-5 py-2.5 rounded-lg bg-brandlime text-black text-xs font-bold flex items-center gap-1.5 hover:bg-opacity-95 transition-all">
                            <i class="fa-solid fa-check"></i> Oke
                        </button>
                    </div>

                </form>
            </div>

        </div>{{-- /page --}}
    </div>{{-- /main --}}

</body>
</html>
