<?php 
    // ini_set("allow_url_fopen", 1);
    $beachData = file_get_contents("https://hawaiibeachsafety.com/rest/conditions.json");
    $forecastData = json_decode($beachData, true);
    // print_r ($forecastData);
    // echo $forecastData['beach'];
    if ($_GET['beach']) {

        // $beach = str_replace(' ','-',$_GET["beach"]);
        // $forecastPage = file_get_contents("https://hawaiibeachsafety.com/oahu/".$beach);
        $forecastPage = file_get_contents("https://hawaiibeachsafety.com/rest/conditions.json");
        // $forecastData = json_decode($forecastPage);
        // echo $forecastData->access_token;
   
        $forecastData = json_decode($forecastPage,true);
     
        
        foreach ($forecastData as $beach) {
            // echo $beach['beach'];
            // echo $_GET['beach'];
            $beaches = [];
            array_push($beaches,  $beach['beach'] );
            
            // match(regex)
            if ($beach['beach'] == $_GET["beach"]) {
                // print_r($beach);

                $forecast = $beach;
            }
        }

        // foreach($forecastData)

        // $forecastData = explode('<h2 class="pane-title block-title">Surf Forecast (Official)</h2>', $forecastPage);
            
        // $secondData = explode('<h2 class="pane-title block-title">Recommended Activities</h2>', $forecastData[1]);
        // $forecast = $secondData[0];
    }

  

?>

