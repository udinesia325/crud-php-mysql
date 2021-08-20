<?php
  require_once("../utils.php");
  require_once("../vendor/autoload.php");
  if(!isset($_GET["kelas"])&&!isset($_GET["wali"])){
    header("location:index.php");
  }
  $mpdf = new \Mpdf\Mpdf();
  $kelas = $_GET["kelas"];
  $wali = $_GET["wali"];
  $data_kelas = query("select * from kelas where nama_kelas = '$kelas' and wali_kelas = '$wali'");
  $result=mysqli_fetch_assoc($data_kelas);
  if(mysqli_num_rows($data_kelas)==0){
    header("location:index.php");
  }
  $data_siswa = query("select nama from siswa where nama_kelas= '$kelas' ");
  $colHari = "";

  for ($i = 1; $i <=31; $i++) {
     $colHari .="<th>$i</th>";
  }
  $data = "
  <html>
    <head>
      <style>
        table{
          border-collapse:collapse;
        }
        th{
          background-color:#ddd;
        }
        table,th,td{
          padding:.5em;
        }
      </style>
    </head>
    <body>
    ";
    $data .=" <p><b>Wali Kelas :". $result["wali_kelas"]."</b></p>
      <p><b>Kelas :". $result["nama_kelas"]."</b></p>
      <p><b>Bulan :</b> </p>";
    $data .="<table border='1'>
    <tr>
        <thead>
          <th>No</th>
          <th>Nama</th>
          ".$colHari."
        </thead>
    </tr>";
    $no = 1;
    while($row = mysqli_fetch_assoc($data_siswa)){
     $nama = $row["nama"];
     $rowHari = "";
     for ($j = 1; $j <=31; $j++) {
        $rowHari .="<td></td>";
     }
   $data .=" <tr>
        <tbody>
          <td>$no</td>
          <td>$nama</td>
          ".$rowHari."
       </tbody>
    </tr>";
    $no++;
    }
   $data .=" 
      </table>";
      
    $data .="
    <br/>
    <br/>
    tanggal : 
    <br/>
    <br/>
    <br/>
   <b><u><h4>".$result["wali_kelas"]."</h4></u></b>
   </body>
  </html>
";
$mpdf->WriteHTML($data);
$mpdf->Output("absen.pdf","I");

?>