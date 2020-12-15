<?php
   
    require_once('files/config.php');
   
    $response = array();
    // $file_name = "text.txt"; // Automatically create (with a text file)

    header('Content-type: application/json');

    if (isset($_GET['action']))
    {
        if ($_GET['action'] == "add")
        {
            if (isset($_GET['text']))
            {
                $text = $_GET['text'];
                
                /*$fp = fopen($file_name, "w+");
                fwrite($fp, $text);
                fclose($fp);*/

                
                $sql = $pdo->prepare("UPDATE `tutunova`.`api` SET `text`='${text}' WHERE  `id`=1;")->execute();

                $response["success"] = 1;
                $response["message"] = "Successfully added new text";
                $response["text"] = $text;
                echo json_encode($response, JSON_PRETTY_PRINT);
            }
            else 
            {
                $response["success"] = 0;
                $response["message"] = "Define an text";
                echo json_encode($response, JSON_PRETTY_PRINT);
            }
        }
        else if ($_GET['action'] == "read")
        {
            /*$fp = fopen($file_name, "r");
            $contents = fread($fp, filesize($file_name));
            fclose($fp);*/
            $sth = $pdo->prepare("SELECT text FROM `tutunova`.`api`");
            $sth->execute();
            $result = $sth->fetch(PDO::FETCH_ASSOC);

            $response["success"] = 1;
            $response["message"] = "Successfully retrieved text";
            $response["text"] = $result['text'];
            echo json_encode($response, JSON_PRETTY_PRINT);
        }
        else
        {
            $response["success"] = 0;
            $response["message"] = "Define an action (add or read)";
            echo json_encode($response, JSON_PRETTY_PRINT);
        }
    }
    else 
    {
        $response["success"] = 0;
        $response["message"] = "Define an action";
        echo json_encode($response, JSON_PRETTY_PRINT);
     }

?>
