<?php

    //load all wordpress functions
    require_once("../../../../wp-load.php");
    if($_POST) {
        
        //the data retrieved
        $input = $_POST['data'];

        // decrypt the data
        $decrypted_path = decrypt_data($input);

        //below is the file that is being pushed into the header
        $mime_type = mime_content_type($decrypted_path); 
        
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Type: " . $mime_type);
        header("Content-Length: " .(string)(filesize($decrypted_path)) );
        header('Content-Disposition: attachment; filename="'.basename($decrypted_path).'"');
        header("Content-Transfer-Encoding: binary\n");
        
        readfile($decrypted_path); 
        exit();
    }

?>