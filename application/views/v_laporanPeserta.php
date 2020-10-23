<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>asdasdasdasda</title>
  <style>

  table, tr, td {
    border: 1px solid black;
    border-collapse: collapse;
    padding: 10px;
  }
  </style>
</head>
<body>


  <div>
    <table style="width:1000px; border-top-style:none;">
      <tr>
        <td colspan="3"
        style="padding:10px;
        font-size:1.1em;
        text-align:center;
        background-color:red;
        color:white;
        ">
          <b>
            Daftar Peserta
          </b>
        </td>
      </tr>
      <tr>
        <td colspan="3"
        style="padding:10px;
        text-align:center;
        ">
          <b>
          <?php echo $NAMA_RAPAT?>
          </b>
        </td>
      </tr>
        <tr>
          <td style="width:300px">
            <b>
              Nama
            </b>
          </td>
          <td style="width:300px">
            <b>
              Waktu Presensi
            </b>
          </td>
          <td style="width:300px">
            <b>
              Bukti
            </b>
          </td>
        </tr>
      <?php foreach ($data as $key => $val): ?>
        <tr>
          <td style="width:300px">            
              <?php echo $val->NAMA; ?>
          </td>
          <td style="width:300px">
              <?php echo $val->WAKTU_PRESENSI ?>
          </td>
          <td style="width:300px">
            <!--<img src="<?php echo $val->BUKTI_KEHADIRAN ?>" alt="">-->
              <?php echo $val->BUKTI_KEHADIRAN ?>
          </td>
        </tr>
      <?php endforeach;?>
    </table>
  </div>

         

</body>
</html>
