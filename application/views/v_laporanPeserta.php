<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
  <style>

  table, tr, td {
    border: 1px solid black;
    border-collapse: collapse;
    padding: 10px;
    overflow: hidden;
  }
  </style>
</head>
<body>


  <div>
    <table style="width:1000px; border-top-style:none;">
      <tr>
        <td colspan="5"
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
        <td colspan="5"
        style="padding:10px;
        text-align:center;
        ">
          <b>
          <?php echo $NAMA_RAPAT?>
          </b>
        </td>
      </tr>
        <tr>
          <td style="width:200px">
            <b>
              Nama
            </b>
          </td>          
          <td style="width:200px">
            <b>
              Unit
            </b>
          </td>
          <td style="width:200px">
            <b>
              Nama Unit/Instansi
            </b>
          </td>
          <td style="width:200px">
            <b>
              Jabatan
            </b>
          </td>
          <td style="width:200px">
            <b>
              Waktu Presensi
            </b>
          </td>
        </tr>
      <?php foreach ($data as $key => $val): ?>
        <tr>
          <td style="width:200px">            
              <?php echo $val->NAMA; ?>
          </td>          
          <td style="width:200px">
              <?php echo $val->NAMA_UNIT ?>
          </td>
          <td style="width:200px">
              <?php echo $val->INSTANSI ?>
          </td>
          <td style="width:200px">
              <?php echo $val->JABATAN ?>
          </td>
          <td style="width:200px">
              <?php echo $val->WAKTU_PRESENSI ?>
          </td>
        </tr>
      <?php endforeach;?>
    </table>
  </div>

         

</body>
</html>
