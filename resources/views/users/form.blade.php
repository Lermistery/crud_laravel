<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($user) ? 'Edit User' : 'Tambah User' }} | TDL</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background-color: #f0f2f5; }
        .navbar { background: #4a90d9; color: #fff; padding: 14px 24px; display: flex; justify-content: space-between; align-items: center; }
        .navbar-brand { display: flex; align-items: center; gap: 24px; }
        .navbar-brand h3 { font-size: 18px; margin: 0; }
        .nav-links { display: flex; gap: 16px; }
        .nav-links a { color: rgba(255,255,255,0.8); text-decoration: none; font-size: 14px; font-weight: 500; }
        .nav-links a:hover, .nav-links a.active { color: #fff; }
        .navbar .user-info { display: flex; align-items: center; gap: 16px; font-size: 14px; }
        .btn-logout { background: rgba(255,255,255,0.2); color: #fff; border: 1px solid rgba(255,255,255,0.4); padding: 6px 16px; border-radius: 6px; cursor: pointer; font-size: 13px; text-decoration: none; }
        
        .content { max-width: 600px; margin: 40px auto; padding: 0 20px; }
        .card { background: #fff; padding: 32px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .card-header { margin-bottom: 24px; border-bottom: 1px solid #eee; padding-bottom: 16px; }
        .card-header h2 { color: #333; font-size: 20px; }
        
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; font-size: 14px; color: #555; font-weight: bold; }
        .form-group input, .form-group select { width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 6px; font-size: 14px; }
        .form-group input:focus, .form-group select:focus { outline: none; border-color: #4a90d9; }
        .form-text { font-size: 12px; color: #888; margin-top: 4px; display: block; }
        
        .btn-primary { background: #4a90d9; color: #fff; padding: 10px 20px; border-radius: 6px; text-decoration: none; font-size: 14px; border: none; cursor: pointer; }
        .btn-primary:hover { background: #3a7bc8; }
        .btn-secondary { background: #95a5a6; color: #fff; padding: 10px 20px; border-radius: 6px; text-decoration: none; font-size: 14px; border: none; cursor: pointer; display: inline-block; }
        
        .alert-error { background: #ffe0e0; color: #c00; padding: 12px; border-radius: 6px; margin-bottom: 20px; border: 1px solid #ffb3b3; font-size: 14px; }
        .alert-error ul { margin-left: 20px; margin-top: 8px; }
        
        .form-actions { display: flex; justify-content: flex-end; gap: 12px; margin-top: 30px; }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="navbar-brand">
            <h3>TDL - Dashboard</h3>
            <div class="nav-links">
                <a href="{{ url('/jabatan') }}">Kelola Jabatan</a>
                <a href="{{ url('/users') }}" class="active">Kelola Users</a>
            </div>
        </div>
        <div class="user-info">
            <span>Halo, {{ session('user')->nama }}</span>
            <a href="{{ url('/logout') }}" class="btn-logout">Logout</a>
        </div>
    </div>

    <div class="content">
        <div class="card">
            <div class="card-header">
                <h2>{{ isset($user) ? 'Edit Data User' : 'Tambah User Baru' }}</h2>
            </div>
            
            @if($errors->any())
                <div class="alert-error">
                    <strong>Oops! Ada kesalahan:</strong>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ isset($user) ? url('/users/'.$user->id) : url('/users') }}" method="POST">
                @csrf
                @if(isset($user))
                    @method('PUT')
                @endif
                
                <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" value="{{ old('nama', $user->nama ?? '') }}" required placeholder="Contoh: Budi Santoso">
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" value="{{ old('username', $user->username ?? '') }}" required placeholder="Contoh: budi123">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <div style="position: relative; display: flex; align-items: center;">
                        <input type="password" id="inputPass" name="pass" {{ isset($user) ? '' : 'required' }} placeholder="Minimal 6 karakter" style="width: 100%; padding-right: 40px;">
                        <button type="button" onclick="togglePass()" style="position: absolute; right: 10px; background: none; border: none; cursor: pointer; font-size: 16px;">
                            👁️
                        </button>
                    </div>
                    @if(isset($user))
                        <span class="form-text">*Kosongkan jika tidak ingin mengubah password.</span>
                    @endif
                </div>

                <script>
                    function togglePass() {
                        var x = document.getElementById("inputPass");
                        if (x.type === "password") {
                            x.type = "text";
                        } else {
                            x.type = "password";
                        }
                    }
                </script>

                <div class="form-group">
                    <label>Jabatan</label>
                    <select name="id_jabatan" required>
                        <option value="">-- Pilih Jabatan --</option>
                        @foreach($jabatans as $j)
                            <option value="{{ $j->id_jabatan }}" {{ (old('id_jabatan', $user->id_jabatan ?? '') == $j->id_jabatan) ? 'selected' : '' }}>
                                {{ $j->nama_jabatan }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-actions">
                    <a href="{{ url('/users') }}" class="btn-secondary">Batal</a>
                    <button type="submit" class="btn-primary">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
