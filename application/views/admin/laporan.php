<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Peminjaman</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table thead th {
            background-color: #f2f2f2;
            text-align: left;
            padding: 10px;
            border: 1px solid #ddd;
        }

        table tbody td, table tbody th {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }

        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #666;
        }

        @media print {
            body {
                margin: 0;
            }

            .footer {
                display: none;
            }
        }
    </style>
</head>
<body>

<h1>Laporan Peminjaman Buku</h1>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Peminjam</th>
            <th>Tanggal Peminjaman</th>
            <th>Tanggal Pengembalian</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($buku as $book) { ?>
            <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $book['judul']; ?></td>
                <td><?= $book['namaLengkap']; ?></td>
                <td><?= $book['tanggalPeminjaman']; ?></td>
                <td><?= $book['tanggalPengembalian'] ?: '-'; ?></td>
                <td>
                    <?php if ($book['statusPeminjaman'] == 'Proses') {
                        echo "Menunggu Verifikasi";
                    } else {
                        echo $book['statusPeminjaman'];
                    } ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<div class="footer">
    <p>Laporan ini dihasilkan oleh sistem pada <?= date('d-m-Y H:i:s'); ?>.</p>
</div>

<script>
    window.print();
</script>

</body>
</html>
