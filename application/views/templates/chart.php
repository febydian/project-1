<?php 

// $this->db->select("jenis_ikan");
// $ikan = $this->db->get("jenis_ikan")->result();
// foreach ($ikan as $ik) {
//   echo $ik->jenis_ikan;
//   echo '<br>';
// };
// $coba = $ikan[0];
// print_r($ikan[0]);
// echo $coba;
// print_r (explode(" ",$ik->jenis_ikan));

?>
<html>
<head>  
  
</head>
<body>

  <div id="chartContainer" style="height: 300px; width:100%;">
  </div>

  
</body>
<script type="text/javascript">
 
  window.onload = function () {
    <?php 
  

$this->db->select_sum("stok");
$this->db->where('jenis_ikan','LELE');
$jumlah_lele = $this->db->get("ikan")->result();

foreach($jumlah_lele as $jl){
  echo $jl->stok;
  $asli_lele = $jl->stok;
}
$this->db->select_sum("stok");
$this->db->where('jenis_ikan','KOI');
$jumlah_koi = $this->db->get("ikan")->result();

foreach($jumlah_koi as $jl){
  echo $jl->stok;
  $asli_koi = $jl->stok;
}
$this->db->select_sum("stok");
$this->db->where('jenis_ikan','GURAME');
$jumlah_gurame = $this->db->get("ikan")->result();

foreach($jumlah_gurame as $jl){
  echo $jl->stok;
  $asli_gurame = $jl->stok;
}
$this->db->select_sum("stok");
$this->db->where('jenis_ikan','NILA');
$jumlah_nila = $this->db->get("ikan")->result();

foreach($jumlah_nila as $jl){
  echo $jl->stok;
  $asli_nila = $jl->stok;
}

  ?>

    var lele = 
    <?php if ($asli_lele == '') {
      echo 0;
    }else{
      echo $asli_lele;
    }
    ?>;

    var koi = 
    <?php if ($asli_koi == '') {
      echo 0;
    }else{
      echo $asli_koi;
    }
    ?>;

    var gurame = 
    <?php if ($asli_gurame == '') {
      echo 0;
    }else{
      echo $asli_gurame;
    }
    ?>;

    var nila = 
        <?php if ($asli_nila == '') {
          echo 0;
        }else{
          echo $asli_nila;
        }
        ?>;
    var chart = new CanvasJS.Chart("chartContainer",
    {
      title:{
       text: "Chart Background Color"       
      },
      data: [
      {        
        type: "column",
        dataPoints: [
        
        { label: 'lele', y: lele },
        { label: 'koi', y: koi},
        // { label: 'gurame', y: gurame },
        { label: 'nila', y: nila },
       
        ]
      }
      ]
    });

    chart.render();
  }
  </script>
  <script type="text/javascript" src="<?base_url();?> https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</html>
