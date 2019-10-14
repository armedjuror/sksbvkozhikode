<?php
$con = mysqli_connect("localhost","sksbvsta_new","BtQDsr4xXqb8","sksbvsta_new");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


function ranges($zone)
  {
    switch ($zone) {
    case 'KOYILANDY':
      $nor=10;
      $ranges=array('ARIKKULAM','KAKKUR','KOYILANDY','MEPPAYYUR','NANDI',
      'PARAPPALLI','PAYYOLI','THALAKKULATHUR','THIRUVANGOOR','ULLIYERI');
      break;
    case 'KOZHIKODE':
      $nor=10;
      $ranges=array('BEPORE','CHELAVOOR','FEROKE','KOZHIKODE-CITY','KOZHIKODE-WEST',
      'MANKAVU','NALLALAM','PANNIYANKARA','PANTHEERANKAVU','RAMANATTUKARA');
      break;
    case 'KUTTIADY':
      $nor=9;
      $ranges=array('KADIYANGAD','KAKKATTIL','KALLACHI','KUTTIADY','NADAPURAM',
      'NADUVANNOOR','PARAKKADAVU','PERAMBRA','VANIMEL');
      break;
    case 'MAVOOR':
      $nor=9;
      $ranges=array('CHERUVADI','KARANTHOOR','KUTTIKKATTOOR','MALAYAMMA','MAVOOR',
      'MUKKAM','PAZHUR','PERUMANNA','THIRUVAMBADI');
      break;
    case 'THAMARASSERY':
      $nor=10;
      $ranges=array('ARAMBRAM','ELETTIL','KODUVALLY','NARIKKUNI','OMASSERY',
      'POONOOR','PUTHUPPADI','THAMARASSERY','UNNIKULAM','VAVAD');
        break;
    case 'VADAKARA':
      $nor=9;
      $ranges=array('AYANCHERY','AZHIYOOR','CHERAPURAM','KADAMERI','MANIYOOR',
      'ORKATTIRY','THIRUVALLOOR','VADAKARA','VILLYAPALLI');
    default:
      echo "Invalid Input";
      break;
    }
    return $ranges;
  }


  function nor($zone)
  {
    switch ($zone) {
      case 'KOYILANDY':
        $nor=10;
        break;
      case 'KOZHIKODE':
        $nor=10;
        break;
      case 'KUTTIADY':
        $nor=9;
        break;
      case 'MAVOOR':
        $nor=9;
        break;
      case 'THAMARASSERY':
        $nor=10;
        break;
      case 'VADAKARA':
        $nor=9;
        break;
      default:
        echo "Invalid Input";
        break;
      }
      return $nor;
    }
?>
