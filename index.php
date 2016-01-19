<!DOCTYPE html>
<html lang="pl">
<?php
  $outputLevelLight = '';
  $outputTemperature = 0;
  function getCurrentTemperature() {
    exec('cat /sys/bus/w1/devices/28-0000056d465d/w1_slave | cut -d " " -f 10 | grep "t=" | cut -d "=" -f 2 2>&1',$outputTemperature, $returnTemperatureValue);
    return $outputTemperature[0]/1000;
  }

  function getCurrentLightLevel() {
    exec('cat outputFile 2>&1', $outputLevelLight, $returnLightValue);
    return $outputLevelLight[0] . '%';
  }

function turnOnLight() {
	exec('sudo python turnOnLight.py');
}

function turnOffLight() {
	exec('sudo python turnOffLight.py');
}

  if (isset($_GET['isReady'])) {
    $outputLevelLight = getCurrentLightLevel();
    $outputTemperature = getCurrentTemperature();
  }
// TODO: Fix this http methods
  if(isset($_GET["turnLight"]) && trim($_GET["turnLight"]) == 'on'){
    turnOnLight();   
  }

  if(isset($_GET["turnLight"]) && trim($_GET["turnLight"]) == 'off'){
     turnOffLight();
  }
?>
<head>
  <meta charset="utf-8"> 
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="main.css">
  <title>Interaktywny dom</title>
</head>
<body>
  <div class='container--widgets'>
    <div class='card temp'>
      <div class='inner'>
        <div class='icon'></div>
        <div class='title'>
          <div class='text'>TEMPERATURE</div>
        </div>
        <div class='number'><?php echo $outputTemperature; ?></div>
        <div class='measure'>CELCIUS</div>
      </div>
    </div>
    <div class='card energy'>
      <div class='inner'>
        <div class='icon'></div>
        <div class='title'>
          <div class='text'>LIGHT LEVEL</div>
        </div>
        <div class='number'><?php echo $outputLevelLight ?></div>
      </div>
    </div>
  </div>
  <div class="col-md-12 text-center">
      <a class="btn btn-success" href='index.php?isReady=true'>Refresh</a>
      <a class="btn btn-success" href='index.php?turnLight=on'>Turn on Light</a>
      <a class="btn btn-danger" href='index.php?turnLight=off'>Turn off light</a>
  
    
</div>
</body>
</html>

