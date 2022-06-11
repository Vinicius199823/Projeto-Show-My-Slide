<?php
    
    include 'conexaoteste.php'; 

    if(isset($_POST['submit'])){
        
        $uploadsDir = "../upload/";
        $allowedFileType = array('jpg','png','jpeg');
        
        
        if (!empty(array_filter($_FILES['arquivo']['name']))) { 
            
            
            foreach($_FILES['arquivo']['name'] as $id=>$val){ 
                
                $fileName        = $_FILES['arquivo']['name'][$id];
                $tempLocation    = $_FILES['arquivo']['tmp_name'][$id];
                $targetFilePath  = $uploadsDir . $fileName;
                $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
                $uploadDate      = date('Y-m-d H:i:s');
                $uploadOk = 1;

                if(in_array($fileType, $allowedFileType)){ 
                        if(move_uploaded_file($tempLocation, $targetFilePath))
                            $sqlVal = "('".$fileName."', '".$uploadDate."')";
                         else { 
                            $response = array(
                                "status" => "alert-danger",
                                "message" => "File coud not be uploaded."
                            );
                         }
                        
                }   
                 else { 
                    $response = array(
                        "status" => "alert-danger",
                        "message" => "Only .jpg, .jpeg and .png file formats allowed."
                    );
                 }
                
                if(!empty($sqlVal)) {
                    //$select = $conn -> query("SELECT * from arquivo"); 
                    $insert = $conn->query("INSERT INTO arquivo (file, datahora) VALUES $sqlVal");
                    if($insert) { 
                        $response = array(
                            "status" => "alert-success",
                            "message" => "Files successfully uploaded."
                        );
                    }
                     else { 
                        $response = array(
                            "status" => "alert-danger",
                            "message" => "Files coudn't be uploaded due to database error."
                        );
                     }
                }
            }
            
                    
                
            

         
        }
        else {             
            $response = array(
                "status" => "alert-danger",
                "message" => "Please select a file to upload.",
            );
         }
        
    } 
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <title>PHP 8 Upload Multiple Files Example</title>
    <style>
    .container{  
        max-width: 450px;
    }
    .imgGallery img{ 
    padding: 8px;
    max-width: 100px;
    }
    </style>
</head>

<body>

    <div class="container mt-5">
        <form action="" method="post" enctype="multipart/form-data" class="mb-3">
            <h3 class="text-center mb-5">Upload Multiple Images in PHP 8</h3>

            <div class="user-image mb-3 text-center">
                <div class="imgGallery">

                </div>
            </div>

            <div class="custom-file">
                <input type="file" name="file[]" class="custom-file-input" id="chooseFile" multiple>
                <label class="custom-file-label" for="chooseFile">Select file</label>
            </div>

            <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                Upload Files
            </button>
        </form>


        <?php if(!empty($response)) ?>
        <div class="alert <?php echo $response["status"]; ?>">
            
        </div>
        <?php ?>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <script>
    $(function() {

        var multiImgPreview = function(input, imgPreviewPlaceholder){ 

                if (input.files)
                    var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++){ 
                    var reader = new FileReader();

                    reader.onload = function(event)
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);


                    reader.readAsDataURL(input.files[i]);
                }


        };

        $('#chooseFile').on('change', function() multiImgPreview(this, 'div.imgGallery'););
    });
    </script>


</body>

</html>