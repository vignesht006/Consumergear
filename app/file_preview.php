<?php

if (isset($_FILES['file'])) {
        $file   = $_FILES['file'];
        // print_r($file);  just checking File properties

        // File Properties
        $file_name  = $file['name'];
        $file_tmp   = $file['tmp_name'];
        $file_size  = $file['size'];
        $file_error = $file['error'];

        // Working With File Extension
        $file_ext   = explode('.', $file_name);
        $file_fname = explode('.', $file_name);

        $file_fname = strtolower(current($file_fname));
        $file_ext   = strtolower(end($file_ext));
        $allowed    = array('jpg','jpeg','png','gif');


        if (in_array($file_ext,$allowed)) {
            //print_r($_FILES);


            if ($file_error === 0) {
                if ($file_size <= 5000000) {
                        $file_name_new     =  $file_fname . uniqid('',true) . '.' . $file_ext;
                        $file_name_new    = $file_name;
                        $file_destination =  'buffer/' . $file_name_new;
                         
                        if (move_uploaded_file($file_tmp, $file_destination)) {
                                echo $file_destination;
                        }
                        else
                        {
                            echo "some error in uploading file".mysqli_error();
                        }
//                        
                }
                else
                {
                    echo "size must bne less then 5MB";
                }
            }

        }
        else
        {
            echo "invalid file";
        }
}

?>
