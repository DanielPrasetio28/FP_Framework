<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50 font-sans">

    <!-- Main Container -->
    <div class="flex justify-center items-center h-screen">

        <!-- Register Box -->
        <div class="bg-white shadow-lg rounded-lg p-8 max-w-sm w-full space-y-6">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Daftar Siswa</h2>
            <form action="<?= site_url('loginregister/register_siswa'); ?>" method="POST">
                <div class="space-y-4">
                    <div>
                        <label for="nisn" class="block text-sm font-medium text-gray-700 mb-2">NISN</label>
                        <input type="text" id="nisn" name="nisn" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan NISN" required>
                    </div>
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                        <input type="text" id="nama" name="nama" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan Nama" required>
                    </div>
                    <div>
                        <label for="angkatan" class="block text-sm font-medium text-gray-700 mb-2">Angkatan</label>
                        <input type="number" id="angkatan" name="angkatan" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan Angkatan" required>
                    </div>
                    <?php if (isset($kelas) && !empty($kelas)): ?>
                        <div>
                            <label for="kelas" class="block text-gray-700 font-medium mb-2">Kelas</label>
                            <select name="kelas" id="kelas" class="p-2 border rounded-md w-full text-gray-700" required>
                                <option value="">Pilih Kelas</option>
                                <?php foreach ($kelas as $item): ?>
                                    <option value="<?= $item->id; ?>"><?= $item->tingkat . '-' . $item->jurusan . '-' . $item->nama_kelas; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php else: ?>
                        <p>Data kelas tidak ditemukan. </p>
                    <?php endif; ?>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                        <input type="password" id="password" name="password" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan Password" required>
                    </div>
                    <div>
                        <button type="submit" class="w-full text-white p-3 mt-3 rounded-lg font-semibold bg-gradient-to-r from-indigo-600 to-blue-500 shadow-md transform transition-transform duration-300 hover:scale-105 cursor-pointer">
                            Daftar
                        </button>
                    </div>
                </div>
            </form>
            <div class="text-center">
                <p class="text-sm text-gray-600">Sudah punya akun? <a href="<?= site_url('loginregister/login_siswa'); ?>" class="text-blue-500 font-bold inline-block transform transition-transform duration-300 hover:scale-110">Login</a></p>
            </div>
        </div>
    </div>

</body>
</html>
