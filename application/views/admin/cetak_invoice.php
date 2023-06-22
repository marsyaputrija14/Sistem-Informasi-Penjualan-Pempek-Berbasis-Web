<!DOCTYPE html>
<html>

<head>
  <title><?php echo $title; ?></title>
  <style>
    #table {
      border-collapse: collapse;
      width: 100%;
      margin-top: 5px;
    }

    #tableatas {
      border: none;
    }

    th {
      background-color: #4CAF50;
      font-weight: bold;
    }

    #table th,
    #table td {
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

    @page {
      size: auto;
      margin: 0;
    }
  </style>
</head>

<body onload="printCetak()" style="padding:25px">

  <h2 style=" text-align: center;"><?php echo $title; ?></h2>
  <?php $tr = $dtransaksi->row_array(); ?>
  <table id="tableatas">
    <tr>
      <td width="150px">Nomor Transaksi</td>
      <td>:</td>
      <td><?php echo $tr['transaksi_id']; ?></td>
    </tr><br>
    <tr>
      <td>Nama Pemesan</td>
      <td>:</td>
      <td><?php echo $tr['user_nama']; ?></td>
    </tr><br>
    <tr>
      <td>Tanggal Pesan</td>
      <td>:</td>
      <td><?php echo tanggal($tr['transaksi_tgl_pesan']); ?></td>
    </tr><br>
    <tr>
      <td>Batas Pembayaran</td>
      <td>:</td>
      <td><?php echo tanggal($tr['transaksi_bts_bayar']); ?></td>
    </tr><br>
    <tr>
      <td>Status</td>
      <td>:</td>
      <td><?php echo ucwords($tr['transaksi_status']); ?></td>
    </tr><br>
    <tr>
      <td>Tujuan</td>
      <td>:</td>
      <td><?php echo $tr['transaksi_tujuan']; ?>, <?php echo $tr['transaksi_kota']; ?>, <?php echo $tr['transaksi_prov']; ?>, <?php echo $tr['transaksi_pos']; ?></td>
    </tr><br>
    <tr>
      <td>Kurir / Layanan</td>
      <td>:</td>
      <td><?php echo strtoupper($tr['transaksi_kurir']); ?> / <?php echo $tr['transaksi_service']; ?></td>
    </tr>
  </table>
  <br>
  <br>
  <table id="table">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Item</th>
        <th>Harga Item</th>
        <th>Jumlah Item</th>
        <th>Biaya</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; ?>
      <?php $ongkir = $tr['transaksi_total']; ?>
      <?php foreach ($dtransaksi->result_array() as $trs) : ?>
        <?php $ongkir -= $trs['d_transaksi_biaya']; ?>
        <tr>
          <td><?php echo $i . '.'; ?></td>
          <td><?php echo $trs['produk_name']; ?></td>
          <td><?php echo number_format($trs['produk_price'], 0, ',', '.'); ?></td>
          <td><?php echo $trs['d_transaksi_qty']; ?></td>
          <td><?php echo number_format($trs['d_transaksi_biaya'], 0, ',', '.'); ?></td>
        </tr>
        <?php $i++; ?>
      <?php endforeach; ?>
    </tbody>
    <tr>
      <td colspan="4">Ongkos Kirim</td>
      <td>Rp. <?php echo number_format($ongkir, 0, ',', '.'); ?></td>
    </tr>
    <tr>
      <td colspan="4">Total</td>
      <td>Rp. <?php echo number_format($tr['transaksi_total'], 0, ',', '.'); ?></td>
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