<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | TDL</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
        }

        .navbar {
            background: #4a90d9;
            color: #fff;
            padding: 14px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 24px;
        }

        .navbar-brand h3 { font-size: 18px; margin: 0; }

        .nav-links {
            display: flex;
            gap: 16px;
        }

        .nav-links a {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
        }

        .nav-links a:hover {
            color: #fff;
        }

        .navbar .user-info {
            display: flex;
            align-items: center;
            gap: 16px;
            font-size: 14px;
        }

        .btn-logout {
            background: rgba(255,255,255,0.2);
            color: #fff;
            border: 1px solid rgba(255,255,255,0.4);
            padding: 6px 16px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 13px;
            text-decoration: none;
        }

        .btn-logout:hover {
            background: rgba(255,255,255,0.3);
        }

        .content {
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .alert-error {
            background: #ffe0e0;
            color: #c00;
            padding: 12px 16px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 14px;
            border: 1px solid #ffb3b3;
        }

        .welcome-card {
            background: #fff;
            padding: 32px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
        }

        .welcome-card h2 {
            color: #333;
            margin-bottom: 8px;
        }

        .welcome-card p {
            color: #777;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="navbar-brand">
            <h3>TDL - Dashboard</h3>
            
            <!-- Cek Hak Akses (hanya PM dan PO) -->
            @if(in_array(session('user')->id_jabatan, [1, 2]))
            <div class="nav-links">
                <a href="{{ url('/jabatan') }}">Kelola Jabatan</a>
                <a href="{{ url('/users') }}">Kelola Users</a>
            </div>
            @endif
        </div>
        <div class="user-info">
            <span>Halo, {{ session('user')->nama }}</span>
            <a href="{{ url('/logout') }}" class="btn-logout">Logout</a>
        </div>
    </div>

    <div class="content">
        @if(session('error'))
            <div class="alert-error">{{ session('error') }}</div>
        @endif
        <div class="welcome-card">
            <h2>Selamat Datang, {{ session('user')->nama }}!</h2>
            <p>Kamu berhasil login sebagai <strong>{{ session('user')->username }}</strong></p>
            <p style="margin-top: 10px; color: #4a90d9; font-weight: bold;">
                Jabatan: {{ session('user')->jabatan->nama_jabatan ?? 'Tidak diketahui' }}
            </p>
        </div>
    </div>
</body>
</html>
