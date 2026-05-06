<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kosan</title>
</head>

<style>
.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
    font-family: Arial, sans-serif;
}

.table thead {
    background-color: #4CAF50;
    color: white;
}

.table th, 
.table td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: center;
}

.table tbody tr:nth-child(even) {
    background-color: #f9f9f9;
}

.table tbody tr:hover {
    background-color: #f1f1f1;
    transition: 0.2s;
}

.table th {
    font-weight: bold;
}

.table td {
    font-size: 14px;
}
</style>

<body>
<div class="container">
    <h1>Data Kosan</h1>

    <a href="<?php echo e(route('bangunan.create')); ?>" class="btn btn-primary">+ Tambah Data</a>

    <?php if(session('success')): ?>
        <div class="alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Alamat</th>
                <th>Luas</th>
                <th>Jenis</th>
                <th>Status</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $bangunans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <!-- FIX nomor urut pagination -->
                <td><?php echo e($bangunans->firstItem() + $loop->index); ?></td>

                <td><?php echo e($item->alamat); ?></td>
                <td><?php echo e($item->luas_kamar); ?> m²</td>
                <td><?php echo e(ucfirst($item->jenis_kamar)); ?></td>

                <td>
                    <?php if($item->is_full == 0): ?>
                        <span class="badge available">Tersedia</span>
                    <?php else: ?>
                        <span class="badge full">Penuh</span>
                    <?php endif; ?>
                </td>

                <td>Rp <?php echo e(number_format($item->harga, 0, ',', '.')); ?></td>

                <td>
                    <a href="<?php echo e(route('bangunan.edit', $item->id)); ?>" class="btn btn-warning">Edit</a>

                    <form action="<?php echo e(route('bangunan.destroy', $item->id)); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin hapus data?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="7">Data belum ada</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- FIX pagination -->
    <div style="margin-top:15px;">
        <?php echo e($bangunans->links()); ?>

    </div>
</div>
</body>
</html><?php /**PATH C:\xampp\htdocs\laravel12\resources\views/bangunan/index.blade.php ENDPATH**/ ?>