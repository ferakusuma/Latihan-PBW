<?php
require 'function.php';

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan.";
    exit;
}

$id = intval($_GET['id']);
$data = query("SELECT * FROM kucing WHERE id = $id");

if (count($data) === 0) {
    echo "Data tidak ditemukan!";
    exit;
}

$kcg = $data[0];

if (isset($_POST["submit"])) {
    if (ubahDataKucing($_POST) > 0) {
        echo "<script>
                alert('Data berhasil diubah!');
                document.location.href = 'datakucing.php';
              </script>";
    } else {
        echo "<script>
                alert('Data gagal diubah!');
                document.location.href = 'datakucing.php';
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Ubah Data Kucing</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #667eea, #764ba2);
      min-height: 100vh;
    }
    .form-container {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(15px);
      padding: 2rem;
      border-radius: 1.5rem;
      box-shadow: 0 30px 60px rgba(0,0,0,0.15);
    }
    .form-input {
      background: rgba(255, 255, 255, 0.9);
      border: 2px solid rgba(102, 126, 234, 0.3);
    }
    .form-input:focus {
      border-color: #667eea;
      box-shadow: 0 0 20px rgba(102, 126, 234, 0.3);
    }
    .btn-submit {
      background: linear-gradient(135deg, #667eea, #764ba2);
      color: white;
      font-weight: 600;
      padding: 14px 32px;
      border-radius: 50px;
      transition: 0.3s ease;
    }
    .btn-submit:hover {
      background: linear-gradient(135deg, #764ba2, #667eea);
      transform: translateY(-2px);
    }
  </style>
</head>
<body class="flex justify-center items-center px-4 py-10">
  <div class="max-w-2xl w-full">
    <div class="text-center mb-8">
      <i class="fas fa-edit text-5xl text-white drop-shadow-lg"></i>
      <h1 class="text-4xl font-bold text-white mt-4">Ubah Data Kucing</h1>
    </div>

    <div class="form-container">
      <form action="" method="post" enctype="multipart/form-data" class="space-y-6">
        <input type="hidden" name="id" value="<?= $kcg["id"] ?>">

        <div>
          <label for="Nama" class="block text-gray-700 font-semibold mb-2"><i class="fas fa-paw mr-2 text-purple-600"></i>Nama Kucing</label>
          <input type="text" name="Nama" id="Nama" required value="<?= htmlspecialchars($kcg["Nama"]) ?>" class="form-input w-full px-4 py-3 rounded-xl focus:outline-none" />
        </div>

        <div>
          <label for="jenis" class="block text-gray-700 font-semibold mb-2"><i class="fas fa-list mr-2 text-purple-600"></i>Jenis</label>
          <input type="text" name="jenis" id="jenis" required value="<?= htmlspecialchars($kcg["jenis"]) ?>" class="form-input w-full px-4 py-3 rounded-xl focus:outline-none" />
        </div>

        <div>
          <label for="Gender" class="block text-gray-700 font-semibold mb-2"><i class="fas fa-venus-mars mr-2 text-purple-600"></i>Jenis Kelamin</label>
          <input type="text" name="Gender" id="Gender" required value="<?= htmlspecialchars($kcg["gender"]) ?>" class="form-input w-full px-4 py-3 rounded-xl focus:outline-none" />
        </div>

        <div>
          <label for="foto" class="block text-gray-700 font-semibold mb-2"><i class="fas fa-camera mr-2 text-purple-600"></i>Foto Kucing (opsional)</label>
          <input type="file" name="foto" id="foto" accept="image/*" class="block w-full text-sm text-gray-700 mt-2">
          <?php if (!empty($kcg["foto"])): ?>
            <img src="img/<?= htmlspecialchars($kcg["foto"]) ?>" width="120" class="rounded-xl mt-4 shadow-lg border border-purple-400">
          <?php endif; ?>
        </div>

        <div class="flex justify-between items-center mt-6">
          <a href="datakucing.php" class="text-sm text-gray-600 hover:text-indigo-700"><i class="fas fa-arrow-left mr-1"></i> Kembali</a>
          <button type="submit" name="submit" class="btn-submit inline-flex items-center gap-2">
            <i class="fas fa-save"></i> Simpan Perubahan
          </button>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
