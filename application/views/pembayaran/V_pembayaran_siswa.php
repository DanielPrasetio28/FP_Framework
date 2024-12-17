<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Utama</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="bg-blue-50 font-sans">

<!-- Container -->
<div class="flex" id="app">

    <!-- Sidebar -->
    <div class="bg-white text-gray-800 w-64 h-screen p-5 space-y-6 transition-all duration-300" id="sidebar">
            <ul class="space-y-4">
                <li><a href="<?= site_url('dashboard'); ?>" class="text-blue-500 flex items-center p-3 rounded-md text-2xl font-bold ml-4"><i></i>SiFoAkademik</a></li>
                <li><a href="<?= site_url('dashboard'); ?>" class="text-blue-500 flex items-center hover:bg-gradient-to-r from-blue-500 to-indigo-400 hover:text-white p-3 rounded-md"><i class="fas fa-home mr-3"></i>Dashboard</a></li>
                <li><a href="<?= site_url('jurnal'); ?>" class="flex items-center hover:bg-gradient-to-r from-blue-500 to-indigo-400 hover:text-white p-3 rounded-md"><i class="fas fa-book mr-3"></i>Jurnal Kelas</a></li>
                <li><a href="<?= site_url('pembayaran/upload_bukti'); ?>" class="flex items-center hover:bg-gradient-to-r from-blue-500 to-indigo-400 hover:text-white p-3 rounded-md"><i class="fas fa-credit-card mr-3"></i>Pembayaran</a></li>
                <li><a href="<?= site_url('absensi'); ?>" class="flex items-center hover:bg-gradient-to-r from-blue-500 to-indigo-400 hover:text-white p-3 rounded-md"><i class="fas fa-calendar-check mr-3"></i>Absensi</a></li>
            </ul>
        </div>

    <!-- Content Area -->
    <div class="flex-1 p-8 space-y-6 transition-all duration-300" id="content">
        <!-- Header -->
        <h2 class="text-3xl font-bold mb-6 text-gray-800">Upload Bukti Pembayaran SPP</h2>

        <!-- Flash Messages -->
        <?php if ($this->session->flashdata('error')): ?>
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                <?= $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('success')): ?>
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                <?= $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <!-- Form Upload -->
        <form action="<?= site_url('pembayaran/simpan_bukti'); ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-6">
                <label for="bukti_transfer" class="block font-bold mb-2 text-gray-700">Bukti Transfer</label>
                <input type="file" name="bukti_transfer" id="bukti_transfer" class="border p-2 rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <button type="submit" class="bg-blue-500 font-bold text-white p-3 rounded-md inline-block transform transition-transform duration-300 hover:scale-110 hover:bg-gradient-to-r from-blue-500 to-indigo-500">
                Upload
            </button>
        </form>
    </div>        
</div>

</body>
</html>
