<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Jabatan | TDL</title>
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
        .btn-logout:hover { background: rgba(255,255,255,0.3); }

        .content { max-width: 900px; margin: 40px auto; padding: 0 20px; }
        .card { background: #fff; padding: 24px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .card-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        .card-header h2 { color: #333; font-size: 20px; }
        
        .btn-primary { background: #4a90d9; color: #fff; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-size: 14px; border: none; cursor: pointer; }
        .btn-primary:hover { background: #3a7bc8; }
        .btn-danger { background: #e74c3c; color: #fff; padding: 6px 12px; border-radius: 4px; text-decoration: none; font-size: 12px; border: none; cursor: pointer; }
        .btn-danger:hover { background: #c0392b; }
        .btn-warning { background: #f39c12; color: #fff; padding: 6px 12px; border-radius: 4px; text-decoration: none; font-size: 12px; border: none; cursor: pointer; }
        .btn-warning:hover { background: #d68910; }

        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f8f9fa; font-weight: 600; color: #555; }
        tr:hover { background-color: #f5f5f5; }
        
        .alert-success { background: #d4edda; color: #155724; padding: 12px; border-radius: 6px; margin-bottom: 20px; border: 1px solid #c3e6cb; }

        /* Modal Styles */
        .modal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); align-items: center; justify-content: center; }
        .modal-content { background: #fff; padding: 24px; border-radius: 8px; width: 100%; max-width: 400px; }
        .modal-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; }
        .modal-header h3 { margin: 0; }
        .close { font-size: 24px; cursor: pointer; color: #777; border: none; background: none; }
        .form-group { margin-bottom: 16px; }
        .form-group label { display: block; margin-bottom: 6px; font-size: 14px; color: #555; }
        .form-group input { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; font-size: 14px; }
        .modal-footer { display: flex; justify-content: flex-end; gap: 10px; margin-top: 20px; }
        .btn-secondary { background: #95a5a6; color: #fff; padding: 8px 16px; border-radius: 6px; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="navbar-brand">
            <h3>TDL - Dashboard</h3>
            @if(in_array(session('user')->id_jabatan, [1, 2]))
            <div class="nav-links">
                <a href="{{ url('/jabatan') }}" class="active">Kelola Jabatan</a>
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
        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h2>Data Jabatan</h2>
                <button class="btn-primary" onclick="openModal('addModal')">+ Tambah Jabatan</button>
            </div>
            
            <table>
                <thead>
                    <tr>
                        <th width="10%">ID</th>
                        <th>Nama Jabatan</th>
                        <th width="20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jabatans as $j)
                    <tr>
                        <td>{{ $j->id_jabatan }}</td>
                        <td>{{ $j->nama_jabatan }}</td>
                        <td>
                            <div style="display: flex; gap: 8px;">
                                <button class="btn-warning" onclick="openEditModal({{ $j->id_jabatan }}, '{{ $j->nama_jabatan }}')">Edit</button>
                                <form action="{{ url('/jabatan/'.$j->id_jabatan) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus jabatan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-danger">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div id="addModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Tambah Jabatan</h3>
                <button class="close" onclick="closeModal('addModal')">&times;</button>
            </div>
            <form action="{{ url('/jabatan') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nama Jabatan</label>
                    <input type="text" name="nama_jabatan" required placeholder="Contoh: QA Engineer">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-secondary" onclick="closeModal('addModal')">Batal</button>
                    <button type="submit" class="btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Edit Jabatan</h3>
                <button class="close" onclick="closeModal('editModal')">&times;</button>
            </div>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Nama Jabatan</label>
                    <input type="text" name="nama_jabatan" id="edit_nama_jabatan" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-secondary" onclick="closeModal('editModal')">Batal</button>
                    <button type="submit" class="btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal(id) { document.getElementById(id).style.display = 'flex'; }
        function closeModal(id) { document.getElementById(id).style.display = 'none'; }
        
        function openEditModal(id, nama) {
            document.getElementById('edit_nama_jabatan').value = nama;
            document.getElementById('editForm').action = '/jabatan/' + id;
            openModal('editModal');
        }

        // Tutup modal jika click di luar kotak
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = 'none';
            }
        }
    </script>
</body>
</html>
