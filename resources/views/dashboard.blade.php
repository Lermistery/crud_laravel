<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | ProSite</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --bg-main: #0f1117;
            --bg-sidebar: #161b22;
            --bg-card: #1c2128;
            --bg-card-hover: #21262d;
            --bg-input: #21262d;
            --border: #30363d;
            --text-primary: #e6edf3;
            --text-secondary: #8b949e;
            --text-muted: #6e7681;
            --accent-blue: #388bfd;
            --accent-green: #3fb950;
            --accent-yellow: #d29922;
            --accent-red: #f85149;
            --sidebar-w: 200px;
            --topbar-h: 56px;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-main);
            color: var(--text-primary);
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        /* Sidebar */
        .sidebar {
            width: var(--sidebar-w);
            background: var(--bg-sidebar);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            padding: 16px 0;
            flex-shrink: 0;
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 6px 20px 24px;
        }

        .logo-icon {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #f0b429, #e07c00);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 700;
            color: #000;
        }

        .logo-text { font-size: 16px; font-weight: 700; }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 20px;
            font-size: 13.5px;
            color: var(--text-secondary);
            text-decoration: none;
            border-radius: 6px;
            margin: 1px 8px;
            transition: background .15s, color .15s;
        }

        .nav-item:hover, .nav-item.active {
            background: var(--bg-card);
            color: var(--text-primary);
        }

        .nav-item i { width: 16px; font-size: 13px; }
        .sidebar-spacer { flex: 1; }

        /* Main */
        .main { flex: 1; display: flex; flex-direction: column; overflow: hidden; }

        /* Topbar */
        .topbar {
            height: var(--topbar-h);
            background: var(--bg-sidebar);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            padding: 0 24px;
            gap: 16px;
            flex-shrink: 0;
        }

        .search-wrap {
            display: flex;
            align-items: center;
            gap: 8px;
            background: var(--bg-input);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 7px 14px;
            flex: 1;
            max-width: 380px;
        }

        .search-wrap i { color: var(--text-muted); font-size: 13px; }

        .search-wrap input {
            background: none;
            border: none;
            outline: none;
            color: var(--text-primary);
            font-size: 13.5px;
            width: 100%;
            font-family: 'Inter', sans-serif;
        }

        .search-wrap input::placeholder { color: var(--text-muted); }

        .topbar-right { margin-left: auto; display: flex; align-items: center; gap: 10px; }

        .topbar-icon {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            background: var(--bg-input);
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-secondary);
            font-size: 14px;
            cursor: pointer;
            transition: background .15s, color .15s;
            text-decoration: none;
        }

        .topbar-icon:hover { background: var(--bg-card-hover); color: var(--text-primary); }

        .avatar {
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: linear-gradient(135deg, #388bfd, #a371f7);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
        }

        /* Page */
        .page {
            flex: 1;
            overflow-y: auto;
            padding: 24px;
            display: flex;
            gap: 20px;
        }

        .page::-webkit-scrollbar { width: 5px; }
        .page::-webkit-scrollbar-thumb { background: var(--border); border-radius: 4px; }

        .col-left { flex: 1; min-width: 0; }

        /* Stat cards */
        .stat-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 12px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 16px;
            transition: border-color .2s;
        }

        .stat-card:hover { border-color: var(--accent-blue); }

        .stat-label {
            font-size: 10px;
            font-weight: 600;
            letter-spacing: .7px;
            text-transform: uppercase;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .stat-value { font-size: 26px; font-weight: 700; margin: 8px 0 4px; line-height: 1; }
        .stat-sub { font-size: 11px; color: var(--accent-green); }
        .stat-sub.red { color: var(--accent-red); }
        .stat-sub.muted { color: var(--text-muted); }

        .board-header { display: flex; align-items: center; margin-bottom: 16px; }
        .board-title { font-size: 16px; font-weight: 600; }

        /* Kanban */
        .kanban { display: grid; grid-template-columns: repeat(4, 1fr); gap: 14px; }

        .kanban-col {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 14px;
        }

        .kanban-col-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 12px;
        }

        .col-label { display: flex; align-items: center; gap: 7px; font-size: 13px; font-weight: 600; }

        .dot { width: 8px; height: 8px; border-radius: 50%; }
        .dot-gray   { background: var(--text-muted); }
        .dot-blue   { background: var(--accent-blue); }
        .dot-yellow { background: var(--accent-yellow); }
        .dot-green  { background: var(--accent-green); }

        .col-count {
            background: var(--bg-input);
            border: 1px solid var(--border);
            border-radius: 20px;
            font-size: 11px;
            padding: 1px 8px;
            color: var(--text-secondary);
        }

        /* Task card */
        .task-card {
            background: var(--bg-card-hover);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 10px;
            transition: border-color .2s, transform .15s;
            cursor: pointer;
        }

        .task-card:last-child { margin-bottom: 0; }
        .task-card:hover { border-color: var(--accent-blue); transform: translateY(-1px); }

        .task-card-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 8px;
        }

        .badge {
            font-size: 10px;
            font-weight: 600;
            padding: 2px 8px;
            border-radius: 4px;
            text-transform: uppercase;
        }

        .badge-high     { background: rgba(248,81,73,.18); color: #f85149; }
        .badge-critical { background: rgba(210,153,34,.18); color: #d29922; }
        .badge-low      { background: rgba(63,185,80,.18);  color: #3fb950; }

        .task-id { font-size: 10.5px; color: var(--text-muted); }

        .task-title {
            font-size: 12.5px;
            font-weight: 500;
            line-height: 1.45;
            margin-bottom: 12px;
        }

        .task-footer { display: flex; align-items: center; justify-content: space-between; }

        .task-avatar {
            width: 22px; height: 22px;
            border-radius: 50%;
            background: linear-gradient(135deg, #388bfd, #a371f7);
            display: flex; align-items: center; justify-content: center;
            font-size: 9px; font-weight: 700;
        }

        .task-meta { display: flex; align-items: center; gap: 8px; }

        .task-date {
            font-size: 10.5px; color: var(--text-muted);
            display: flex; align-items: center; gap: 4px;
        }

        .task-tag {
            font-size: 10px; padding: 2px 7px;
            border-radius: 4px; border: 1px solid var(--border);
            color: var(--text-secondary);
        }

        /* Right panel */
        .col-right { width: 220px; flex-shrink: 0; }

        .panel {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 16px;
            margin-bottom: 14px;
        }

        .panel-title { font-size: 13px; font-weight: 600; margin-bottom: 14px; }

        .member-row { margin-bottom: 12px; }
        .member-row:last-child { margin-bottom: 0; }

        .member-info { display: flex; justify-content: space-between; align-items: center; margin-bottom: 5px; }
        .member-name { font-size: 12.5px; font-weight: 500; }
        .member-tasks { font-size: 11px; color: var(--text-muted); }

        .progress-bar { height: 4px; border-radius: 2px; background: var(--bg-input); overflow: hidden; }
        .progress-fill { height: 100%; border-radius: 2px; }

        .activity-item { padding: 9px 0; border-bottom: 1px solid var(--border); }
        .activity-item:last-child { border-bottom: none; padding-bottom: 0; }
        .activity-item:first-child { padding-top: 0; }
        .activity-text { font-size: 11.5px; color: var(--text-secondary); line-height: 1.45; margin-bottom: 3px; }
        .activity-time { font-size: 10.5px; color: var(--text-muted); }

        .alert-error {
            background: rgba(248,81,73,.15);
            color: #f85149;
            border: 1px solid rgba(248,81,73,.3);
            padding: 10px 14px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 16px;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-logo">
            <div class="logo-icon">PS</div>
            <span class="logo-text">ProSite</span>
        </div>

        <a href="{{ url('/dashboard') }}" class="nav-item active">
            <i class="fa-solid fa-chart-line"></i> Dashboard
        </a>
        <a href="{{ url('/projects') }}" class="nav-item">
            <i class="fa-solid fa-folder-open"></i> Projects
        </a>
        <a href="{{ url('/boards') }}" class="nav-item">
            <i class="fa-solid fa-table-columns"></i> Boards
        </a>
        <a href="{{ url('/tasks') }}" class="nav-item">
            <i class="fa-solid fa-circle-check"></i> Tasks
        </a>
        <a href="{{ url('/team') }}" class="nav-item">
            <i class="fa-solid fa-users"></i> Team
        </a>

        @if(in_array(session('user')->id_jabatan ?? 0, [1, 2]))
        <a href="{{ url('/jabatan') }}" class="nav-item">
            <i class="fa-solid fa-id-badge"></i> Jabatan
        </a>
        <a href="{{ url('/users') }}" class="nav-item">
            <i class="fa-solid fa-user-gear"></i> Users
        </a>
        @endif

        <div class="sidebar-spacer"></div>

        <a href="{{ url('/settings') }}" class="nav-item">
            <i class="fa-solid fa-gear"></i> Settings
        </a>
    </aside>

    <!-- Main -->
    <div class="main">

        <!-- Topbar -->
        <div class="topbar">
            <div class="search-wrap">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Search anything, tasks, issues...">
            </div>
            <div class="topbar-right">
                <div class="topbar-icon"><i class="fa-solid fa-bell"></i></div>
                <div class="topbar-icon"><i class="fa-solid fa-sun"></i></div>
                <div class="topbar-icon"><i class="fa-solid fa-circle-question"></i></div>
                <div class="avatar">{{ strtoupper(substr(session('user')->nama ?? 'U', 0, 1)) }}</div>
                <a href="{{ url('/logout') }}" class="topbar-icon" style="color:inherit;">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </a>
            </div>
        </div>

        <!-- Page -->
        <div class="page">

            <!-- Left column -->
            <div class="col-left">

                @if(session('error'))
                    <div class="alert-error"><i class="fa-solid fa-circle-exclamation"></i> {{ session('error') }}</div>
                @endif

                <!-- Stat cards -->
                <div class="stat-grid">
                    <div class="stat-card">
                        <div class="stat-label">Total Projects <i class="fa-regular fa-clipboard"></i></div>
                        <div class="stat-value">24</div>
                        <div class="stat-sub">+2 this mo</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-label">Active Tasks <i class="fa-solid fa-circle-check"></i></div>
                        <div class="stat-value">156</div>
                        <div class="stat-sub">+14% vs last wk</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-label">Completed Tasks <i class="fa-regular fa-comment"></i></div>
                        <div class="stat-value">89</div>
                        <div class="stat-sub">82% target</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-label">Overdue Tasks <i class="fa-solid fa-triangle-exclamation"></i></div>
                        <div class="stat-value">12</div>
                        <div class="stat-sub red">+3 since yesterday</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-label">Team Members <i class="fa-solid fa-users"></i></div>
                        <div class="stat-value">18</div>
                        <div class="stat-sub muted">3 teams</div>
                    </div>
                </div>

                <!-- Board header -->
                <div class="board-header">
                    <span class="board-title">Development Board</span>
                </div>

                <!-- Kanban -->
                <div class="kanban">

                    <!-- To Do -->
                    <div class="kanban-col">
                        <div class="kanban-col-header">
                            <div class="col-label"><span class="dot dot-gray"></span> To Do</div>
                            <span class="col-count">5</span>
                        </div>
                        <div class="task-card">
                            <div class="task-card-top">
                                <span class="badge badge-high">High</span>
                                <span class="task-id">PRJ-142</span>
                            </div>
                            <div class="task-title">Implement OAuth2 Authentication System</div>
                            <div class="task-footer">
                                <div class="task-avatar">JD</div>
                                <div class="task-meta">
                                    <span class="task-date"><i class="fa-regular fa-calendar"></i> Oct 24</span>
                                    <span class="task-tag">Security</span>
                                </div>
                            </div>
                        </div>
                        <div class="task-card">
                            <div class="task-card-top">
                                <span class="badge badge-low">Low</span>
                                <span class="task-id">PRJ-145</span>
                            </div>
                            <div class="task-title">Setup Docker Multi-Stage Builds</div>
                            <div class="task-footer">
                                <div class="task-avatar">MK</div>
                                <div class="task-meta">
                                    <span class="task-date"><i class="fa-regular fa-calendar"></i> Oct 28</span>
                                    <span class="task-tag">DevOps</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- In Progress -->
                    <div class="kanban-col">
                        <div class="kanban-col-header">
                            <div class="col-label"><span class="dot dot-blue"></span> In Progress</div>
                            <span class="col-count">4</span>
                        </div>
                        <div class="task-card">
                            <div class="task-card-top">
                                <span class="badge badge-critical">Critical</span>
                                <span class="task-id">PRJ-138</span>
                            </div>
                            <div class="task-title">Design System UI Component Library</div>
                            <div class="task-footer">
                                <div class="task-avatar">SJ</div>
                                <div class="task-meta">
                                    <span class="task-date"><i class="fa-regular fa-calendar"></i> Oct 21</span>
                                    <span class="task-tag">Frontend</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Review -->
                    <div class="kanban-col">
                        <div class="kanban-col-header">
                            <div class="col-label"><span class="dot dot-yellow"></span> Review</div>
                            <span class="col-count">3</span>
                        </div>
                        <div class="task-card">
                            <div class="task-card-top">
                                <span class="badge badge-high">High</span>
                                <span class="task-id">PRJ-155</span>
                            </div>
                            <div class="task-title">API Rate Limiting & Gateway Config</div>
                            <div class="task-footer">
                                <div class="task-avatar">AK</div>
                                <div class="task-meta">
                                    <span class="task-date"><i class="fa-regular fa-calendar"></i> Oct 19</span>
                                    <span class="task-tag">Backend</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Done -->
                    <div class="kanban-col">
                        <div class="kanban-col-header">
                            <div class="col-label"><span class="dot dot-green"></span> Done</div>
                            <span class="col-count">6</span>
                        </div>
                        <div class="task-card">
                            <div class="task-card-top">
                                <span class="badge badge-low">Low</span>
                                <span class="task-id">PRJ-161</span>
                            </div>
                            <div class="task-title">PostgreSQL Database Migration Script</div>
                            <div class="task-footer">
                                <div class="task-avatar">SJ</div>
                                <div class="task-meta">
                                    <span class="task-date"><i class="fa-regular fa-calendar"></i> Oct 15</span>
                                    <span class="task-tag">Database</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!-- /kanban -->
            </div><!-- /col-left -->

            <!-- Right panel -->
            <div class="col-right">
                <div class="panel">
                    <div class="panel-title">Team Workload</div>
                    <div class="member-row">
                        <div class="member-info">
                            <span class="member-name">John D.</span>
                            <span class="member-tasks">12 tasks</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width:80%; background:#3fb950;"></div>
                        </div>
                    </div>
                    <div class="member-row">
                        <div class="member-info">
                            <span class="member-name">Sarah J.</span>
                            <span class="member-tasks">8 tasks</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width:55%; background:#d2ff3a;"></div>
                        </div>
                    </div>
                    <div class="member-row">
                        <div class="member-info">
                            <span class="member-name">Michael K.</span>
                            <span class="member-tasks">4 tasks</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width:30%; background:#d2ff3a;"></div>
                        </div>
                    </div>
                </div>

                <div class="panel">
                    <div class="panel-title">Recent Activity</div>
                    <div class="activity-item">
                        <div class="activity-text">John D. pushed to branch main</div>
                        <div class="activity-time">2 mins ago</div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-text">Sarah J. completed PRJ-138</div>
                        <div class="activity-time">1 hr ago</div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-text">Sprint review scheduled</div>
                        <div class="activity-time">3 hrs ago</div>
                    </div>
                </div>
            </div><!-- /col-right -->

        </div><!-- /page -->
    </div><!-- /main -->

</body>
</html>
