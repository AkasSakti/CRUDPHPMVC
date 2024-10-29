<?php
$userController = new UserController();
$users = $userController->getAllUsers();
?>

<!-- Form Tambah User -->
<h2>Tambah User Baru</h2>
<form method="POST" action="index.php">
    <input type="hidden" name="action" value="create">
    <div>
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" placeholder="NIM" required>
    </div>
    <div>
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" placeholder="Nama" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Email" required>
    </div>
    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Password" required>
    </div>
    <button type="submit">Tambah</button>
</form>

<!-- Tabel User -->
<h2>Daftar User</h2>
<table border="1">
    <tr>
        <th>NIM</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Aksi</th>
    </tr>
    <?php if (!empty($users)): ?>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo !empty($user['nim']) ? htmlspecialchars($user['nim']) : ''; ?></td>
            <td><?php echo !empty($user['nama']) ? htmlspecialchars($user['nama']) : ''; ?></td>
            <td><?php echo !empty($user['email']) ? htmlspecialchars($user['email']) : ''; ?></td>
            <td>
                <!-- Form Edit -->
                <form method="POST" action="index.php" style="display: inline;">
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="id" value="<?php echo !empty($user['id_user']) ? htmlspecialchars($user['id_user']) : ''; ?>">
                    <input type="text" name="nim" value="<?php echo !empty($user['nim']) ? htmlspecialchars($user['nim']) : ''; ?>" required>
                    <input type="text" name="nama" value="<?php echo !empty($user['nama']) ? htmlspecialchars($user['nama']) : ''; ?>" required>
                    <input type="email" name="email" value="<?php echo !empty($user['email']) ? htmlspecialchars($user['email']) : ''; ?>" required>
                    <input type="password" name="password" placeholder="Kosongkan jika tidak diubah">
                    <button type="submit">Update</button>
                </form>
                
                <!-- Form Delete -->
                <form method="POST" action="index.php" style="display: inline;">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="<?php echo !empty($user['id_user']) ? htmlspecialchars($user['id_user']) : ''; ?>">
                    <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="4">Tidak ada data user</td>
        </tr>
    <?php endif; ?>
</table>
