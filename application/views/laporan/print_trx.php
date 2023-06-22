<!DOCTYPE html>
<html>

<head>
  <title><?php echo $title; ?></title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
      margin-top: 5px;
    }

    th {
      background-color: #4CAF50;
      font-weight: bold;
    }

    th,
    td {
      text-align: left;
      padding: 8px;
      border: 1px solid grey;
    }

    img {
      display: block;
      margin-left: auto;
      margin-right: auto;
      border: 1px solid black;
    }

    .responsive {
      width: 100%;
      height: auto;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
  </style>
</head>

<body onload="printCetak()">

  <h2 style="text-align: center;"><?php echo $title; ?></h2>

  <div style="overflow-x:auto;">
    <table>
      <tr>
        <th>No</th>
        <th>Tgl Pesan</th>
        <th>Dari</th>
        <th>Total</th>
        <th>Tujuan</th>
        <th>Status</th>
      </tr>
      <?php $i = 1; ?>
      <?php $pendapatan = 0; ?>
      <?php foreach ($transaksi as $pro) : ?>
        <?php $pendapatan += $pro['transaksi_total']; ?>
        <tr>
          <td><?php echo $i . '.'; ?></td>
          <td><?php echo date('d-m-Y H:i:s', strtotime($pro['transaksi_time'])); ?></td>
          <td><?php echo $pro['user_nama']; ?></td>
          <td><?php echo number_format($pro['transaksi_total'], 0, ',', '.'); ?></td>
          <td><?php echo $pro['transaksi_tujuan']; ?></td>
          <td><?php echo ucwords($pro['transaksi_status']); ?></td>
        </tr>
        <?php $i++; ?>
      <?php endforeach; ?>
      <tr>
        <th>Pendapatan</th>
        <th colspan="6">Rp. <?php echo number_format($pendapatan, 0, ',', '.'); ?></th>
      </tr>
    </table>
  </div>
  <script>
    function printCetak() {
      window.print();
    }
  </script>
</body>

</html>