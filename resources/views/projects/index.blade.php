@extends('layouts.app')

@section('title', 'ProSite - Projects')

@section('content')
    <!-- Title & Filters -->
    <div>
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Projects</h1>
        <p class="text-sm text-gray-500 dark:text-gray-400 mt-0.5">Manage and track all ongoing project streams</p>

        <div class="flex items-center gap-3 mt-4">
            <button class="bg-white dark:bg-brand-card border border-gray-200 dark:border-brand-border text-xs px-3 py-1.5 rounded-lg flex items-center gap-2 text-gray-700 dark:text-gray-300 shadow-sm dark:shadow-none">
                Status: <span class="text-gray-900 dark:text-white font-medium">All</span>
                <i data-lucide="chevron-down" class="w-3.5 h-3.5"></i>
            </button>
            <button class="bg-white dark:bg-brand-card border border-gray-200 dark:border-brand-border text-xs px-3 py-1.5 rounded-lg flex items-center gap-2 text-gray-700 dark:text-gray-300 shadow-sm dark:shadow-none">
                Priority: <span class="text-gray-900 dark:text-white font-medium">High</span>
                <i data-lucide="chevron-down" class="w-3.5 h-3.5"></i>
            </button>
        </div>
    </div>

    <!-- GRID LAYOUT -->
    <div class="grid grid-cols-12 gap-6">

        <!-- PROJECT CARDS GRID (Left 8 Columns) -->
        <div class="col-span-8 grid grid-cols-2 gap-4">

            @forelse($projects as $project)
            <a href="{{ url('/projects/' . $project->id) }}" class="bg-white dark:bg-brand-card border border-gray-200 dark:border-brand-border/80 rounded-2xl p-4 flex flex-col justify-between hover:border-lime-500 dark:hover:border-[#ccff00] transition group shadow-sm dark:shadow-none">
                <div>
                    <div class="flex items-start justify-between">
                        <div>
                            <h3 class="text-sm font-semibold text-gray-900 dark:text-white group-hover:text-lime-600 dark:group-hover:text-brand-lime transition">{{ $project->nama_project }}</h3>
                            <span class="text-[11px] text-gray-500 dark:text-gray-400 font-mono">KEY: {{ $project->key }}</span>
                        </div>
                        <span class="bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/20 text-[10px] px-2.5 py-0.5 rounded-full font-medium">Active</span>
                    </div>
                    @if($project->deskripsi)
                    <p class="text-xs text-gray-600 dark:text-gray-400 mt-2 line-clamp-2">{{ $project->deskripsi }}</p>
                    @endif
                    <div class="mt-4">
                        <div class="flex justify-between text-xs text-gray-500 dark:text-gray-400 mb-1.5">
                            <span>Tasks</span>
                            <span class="text-gray-900 dark:text-white font-semibold">{{ $project->tasks_count ?? 0 }} Tasks</span>
                        </div>
                        <div class="w-full bg-gray-200 dark:bg-gray-800 rounded-full h-1.5">
                            <div class="bg-brand-lime h-1.5 rounded-full" style="width: 100%"></div>
                        </div>
                    </div>
                </div>
                <div class="flex items-center justify-between text-xs text-gray-500 dark:text-gray-400 mt-4 pt-3 border-t border-gray-100 dark:border-brand-border/40">
                    <span class="flex items-center gap-1.5 text-amber-600 dark:text-amber-400"><span class="w-1.5 h-1.5 rounded-full bg-amber-500 dark:bg-amber-400"></span> Prosite Workspace</span>
                    <span class="flex items-center gap-1"><i data-lucide="calendar" class="w-3.5 h-3.5"></i> {{ $project->deadline ? \Carbon\Carbon::parse($project->deadline)->format('d M Y') : 'No Deadline' }}</span>
                </div>
            </a>
            @empty
            <div class="col-span-2 bg-white dark:bg-brand-card border border-gray-200 dark:border-brand-border/80 rounded-2xl p-10 text-center flex flex-col items-center justify-center space-y-4 shadow-sm dark:shadow-none">
                <div class="w-12 h-12 rounded-2xl bg-lime-500/10 dark:bg-brand-lime/10 flex items-center justify-center text-lime-600 dark:text-brand-lime">
                    <i class="fa-solid fa-folder-plus text-xl"></i>
                </div>
                <div>
                    <h3 class="text-base font-bold text-gray-900 dark:text-white">Belum ada proyek</h3>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Buat proyek baru pertama Anda untuk memulai manajemen tugas Jira-style.</p>
                </div>
                <a href="{{ url('/projects/create') }}" class="bg-brand-lime text-black font-semibold text-xs px-4 py-2.5 rounded-xl flex items-center gap-2 hover:opacity-90 transition">
                    <i class="fa-solid fa-plus"></i> Buat Proyek Baru
                </a>
            </div>
            @endforelse

        </div>

        <!-- RIGHT SIDE STATS (Right 4 Columns) -->
        <div class="col-span-4 space-y-4">

            <!-- Summary Card -->
            <div class="bg-white dark:bg-brand-card border border-gray-200 dark:border-brand-border/80 rounded-2xl p-5 shadow-sm dark:shadow-none">
                <h3 class="text-sm font-semibold text-gray-900 dark:text-white mb-4">Project Status Summary</h3>

                <div class="space-y-3 text-xs">
                    <div class="flex items-center justify-between">
                        <span class="flex items-center gap-2 text-gray-600 dark:text-gray-300">
                            <span class="w-2 h-2 rounded-full bg-emerald-500 dark:bg-emerald-400"></span> Total Proyek
                        </span>
                        <span class="font-bold text-gray-900 dark:text-white">{{ count($projects) }} Projects</span>
                    </div>
                </div>
            </div>

            <!-- Overall Efficiency Card -->
            <div class="bg-white dark:bg-brand-card border border-gray-200 dark:border-brand-border/80 rounded-2xl p-5 shadow-sm dark:shadow-none">
                <h3 class="text-sm font-semibold text-gray-900 dark:text-white mb-4">Overall Efficiency</h3>

                <div>
                    <div class="flex items-center justify-between text-xs mb-2">
                        <span class="text-gray-500 dark:text-gray-400">On-Time Delivery</span>
                        <span class="font-bold text-gray-900 dark:text-white">94.2%</span>
                    </div>
                    <div class="w-full bg-gray-200 dark:bg-gray-800 rounded-full h-1.5">
                        <div class="bg-brand-lime h-1.5 rounded-full" style="width: 94.2%"></div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection