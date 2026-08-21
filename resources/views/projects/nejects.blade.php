@extends('layouts.app')

@section('title', 'Create Project | ProSite')

@section('content')
    <div class="flex items-center justify-center py-6">

        <div class="w-full max-w-2xl bg-white dark:bg-brand-card border border-gray-200 dark:border-brand-border/80 rounded-2xl p-8 shadow-md dark:shadow-2xl">
            <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-1.5">Create New Project</h2>
            <p class="text-xs text-gray-500 dark:text-gray-400 mb-6">Set up a new workspace for your team. You can modify these details later.</p>

            <form action="{{ url('/projects') }}" method="POST" class="space-y-5">
                @csrf

                {{-- Project Name --}}
                <div class="space-y-2">
                    <label for="project_name" class="block text-[11px] font-semibold tracking-wider text-gray-500 dark:text-gray-400 uppercase">Project Name</label>
                    <input type="text" id="project_name" name="nama_project" required
                        placeholder="e.g. Q4 Marketing Campaign"
                        class="w-full bg-gray-50 dark:bg-transparent border border-gray-200 dark:border-brand-border rounded-lg px-4 py-3 text-xs text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 outline-none focus:border-lime-500 dark:focus:border-brand-lime transition-colors">
                </div>

                {{-- Project Description --}}
                <div class="space-y-2">
                    <label for="project_desc" class="block text-[11px] font-semibold tracking-wider text-gray-500 dark:text-gray-400 uppercase">Project Description</label>
                    <textarea id="project_desc" name="deskripsi" rows="4"
                        placeholder="Briefly describe the goals and scope..."
                        class="w-full bg-gray-50 dark:bg-transparent border border-gray-200 dark:border-brand-border rounded-lg px-4 py-3 text-xs text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 outline-none focus:border-lime-500 dark:focus:border-brand-lime transition-colors resize-none"></textarea>
                </div>

                {{-- Deadline --}}
                <div class="space-y-2">
                    <label for="deadline" class="block text-[11px] font-semibold tracking-wider text-gray-500 dark:text-gray-400 uppercase">Deadline</label>
                    <input type="date" id="deadline" name="deadline" required
                        class="w-full bg-gray-50 dark:bg-transparent border border-gray-200 dark:border-brand-border rounded-lg px-4 py-3 text-xs text-gray-900 dark:text-white outline-none focus:border-lime-500 dark:focus:border-brand-lime transition-colors">
                </div>

                {{-- Form Actions --}}
                <div class="flex justify-end gap-3 pt-4 border-t border-gray-100 dark:border-brand-border/40">
                    <a href="{{ url('/projects') }}"
                        class="px-5 py-2.5 rounded-lg border border-gray-200 dark:border-brand-border text-xs font-semibold text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-brand-hover transition-colors">
                        Cancel
                    </a>
                    <button type="submit"
                        class="px-5 py-2.5 rounded-lg bg-lime-400 dark:bg-brand-lime text-black text-xs font-bold flex items-center gap-1.5 hover:opacity-90 transition-all">
                        <i class="fa-solid fa-check"></i> Oke
                    </button>
                </div>

            </form>
        </div>

    </div>
@endsection