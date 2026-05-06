<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah data kosan</title>
</head>
<style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f8f9fa; color: #333; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        h1 { font-size: 1.8rem; color: #4CAF50; margin-bottom: 20px; border-bottom: 2px solid #e0e0e0; padding-bottom: 10px; }
        .alert-error { background-color: #f8d7da; color: #721c24; padding: 12px; border-radius: 5px; margin-bottom: 15px; border: 1px solid #f5c6cb; }
        .btn { display: inline-block; padding: 10px 15px; text-decoration: none; border-radius: 4px; font-size: 14px; transition: 0.3s; cursor: pointer; border: none; }
        .btn-outline { background-color: transparent; color: #007bff; border: 1px solid #007bff; margin-bottom: 15px; display: inline-block; }
        .btn-outline:hover { background-color: #007bff; color: #fff; }
        .btn-primary { background-color: #4CAF50; color: white; width: 100%; font-size: 16px; margin-top: 10px; }
        .btn-primary:hover { background-color: #45a049; }
        .form-group { margin-bottom: 15px; }
        label { font-weight: bold; display: block; margin-bottom: 5px; font-size: 14px; }
        input[type="number"], select, textarea { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; font-family: inherit; }
        input:focus, select:focus, textarea:focus { border-color: #4CAF50; outline: none; box-shadow: 0 0 5px rgba(76, 175, 80, 0.3); }
    </style>
<body>
    <div class="container">
        <h1>Tambah Data Kostan</h1>

        <a href="<?php echo e(route('bangunan.index')); ?>" class="btn btn-outline">&laquo; Kembali ke Daftar</a>

        <?php if($errors->any()): ?>
            <div class="alert-error">
                <ul style="margin: 0; padding-left: 20px;">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('bangunan.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea name="alamat" id="alamat" rows="3" required><?php echo e(old('alamat')); ?></textarea>
            </div>

            <div class="form-group">
                <label for="luas_kamar">Luas Kamar (m²):</label>
                <input type="number" step="0.01" name="luas_kamar" id="luas_kamar" value="<?php echo e(old('luas_kamar')); ?>" required>
            </div>

            <div class="form-group">
                <label for="jenis_kamar">Jenis Kamar:</label>
                <select name="jenis_kamar" id="jenis_kamar" required>
                    <option value="">-- Pilih Jenis --</option>
                    <option value="campuran" <?php echo e(old('jenis_kamar') == 'campuran' ? 'selected' : ''); ?>>Campuran</option>
                    <option value="laki-laki" <?php echo e(old('jenis_kamar') == 'laki-laki' ? 'selected' : ''); ?>>Laki-laki</option>
                    <option value="perempuan" <?php echo e(old('jenis_kamar') == 'perempuan' ? 'selected' : ''); ?>>Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="is_full">Ketersediaan:</label>
                <select name="is_full" id="is_full" required>
                    <option value="0" <?php echo e(old('is_full') == '0' ? 'selected' : ''); ?>>Tersedia</option>
                    <option value="1" <?php echo e(old('is_full') == '1' ? 'selected' : ''); ?>>Penuh</option>
                </select>
            </div>

            <div class="form-group">
                <label for="harga">Harga (Rp):</label>
                <input type="number" name="harga" id="harga" value="<?php echo e(old('harga')); ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </form>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel12\resources\views/bangunan/create.blade.php ENDPATH**/ ?>