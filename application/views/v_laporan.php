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
  }
  </style>
</head>
<body>
  <div>
    <table style="width:1000px;" >    
      <tr>
        <td  
        rowspan="5"
        align="center"
        style="width:300px;"
        > 
          <img src="application/views/logo.jpg" alt="asdasdas"
            style="
            width:200px;
            padding:10px 0px;"
          >
        </td>
        <td 
        colspan="2" 
        style="
        text-align: center;
        background-color: red;
        color: white;
        font-size: 1.2em;
        ">
        <b>
          Minutes Of Meeting
        </b>
        </td>
      </tr>
      <tr>
        <td  colspan="2" 
        style="
        text-align: center;
        padding: 15px;
        ">
        <b>
        <?php echo $NAMA_RAPAT;?>
        </b>
        </td>
      </tr>
      <tr>
        <td style="width: 80px;"><b>Date</b></td>
        <td ><?php echo $TANGGAL;?></td>
      </tr>
      <tr>
        <td style="width: 80px;"><b>Time</b></td>
        <td ><?php echo $WAKTU_MULAI ?> - <?php echo $WAKTU_SELESAI ?></td>
      </tr>
      <tr>
        <td style="width: 80px;"><b>Venue</b></td>
        <td><?php echo $TEMPAT ?></td>
      </tr>
    </table>
  </div>
  <hr 
  style="
  margin: 7px 0px 1px 0px;
  color:black;">
  <hr 
  style="
  margin: 1px 0px 10px 0px;
  height:4px;
  color:black;
  ">

  <div>
    <table style="width:1000px">
        <tr>
          <td 
          style="width:250px;"
          >
            <b>
              Meeting called by
            </b>
          </td>
          <td><?php echo $PENGUNDANG?></td>
          <td
          style="width:250px;"
          >
            <b>
              Note Taker
             </b>
          </td>
          <td><?php echo $NOTULEN ?></td>
        </tr>
        <tr>
          <td>
            <b>
              Type of meeting
            </b>
          </td>
          <td colspan="3"><?php echo $TIPE_RAPAT?></td>
        </tr>
        <tr>
          <td>
            <b>
              Facilitator
            </b>
          </td>
          <td colspan="3"><?php echo $NAMA?></td>
        </tr>
        <tr>
          <td>
            <b>
              Attendees
            </b>
          </td>
          <td colspan="3">
            Terlampir
          </td>
        </tr>
    </table>
  </div>

  <table style="width:1000px; border-top-style:none;">
      <tr>
      <td colspan="1"
      style="padding:10px;
      font-size:1.1em;
      text-align:center;
      background-color:red;
      color:white;
      ">
        <b>
          Background
        </b>
      </td>
      <tr>
        <td style="height:450px; vertical-align: top;">
          <?php echo $BACKGROUND ?>
        </td>
      </tr>
    </table>
    <table style="width:1000px; border-top-style:none;">
      <tr>
      <td colspan="1"
      style="padding:10px;
      font-size:1.1em;
      text-align:center;
      background-color:red;
      color:white;
      ">
        <b>
          Result
        </b>
      </td>
      <tr>
        <td style="height:450px; vertical-align: top;">
          <?php echo $RESULT ?>
        </td>
      </tr>
    </table>        

</body>
</html>
