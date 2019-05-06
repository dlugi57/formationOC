<?php
namespace Controller;
use Exception;

class FocusGallery
{
    public function addPhoto()
    {
        $target_dir = "Public/gallery/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])):
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false):
                $uploadOk = 1;
            else:
                $errorMsg = "Le fichier n'est pas une image.";
                $uploadOk = 0;
            endif;
        endif;
        // Check if file already exists
        if (file_exists($target_file)):
            $errorMsg = "Désolé, le fichier existe déjà.";
            $uploadOk = 0;
        endif;
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000):
            $errorMsg = "Désolé, votre fichier est trop volumineux.";
            $uploadOk = 0;
        endif;
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ):
            $errorMsg = "Désolé, seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés..";
            $uploadOk = 0;
        endif;
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0):
            header('Location: ?action=addPhotoPage&error='. urlencode($errorMsg) .'');
        // if everything is ok, try to upload file
        else:
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)):
                $errorMsg = "Photo ". basename( $_FILES["fileToUpload"]["name"]). " a été envoié.";
                header('Location: ?action=addPhotoPage&error='. urlencode($errorMsg) .'');
            else:
                $errorMsg = "Désolé, une erreur s'est produite lors de l'envoi de votre fichier..";
                header('Location: ?action=addPhotoPage&error='. urlencode($errorMsg) .'');
            endif;
        endif;
    }

    function removePhoto()
    {
      if (isset($_GET['file'])):
        $filename = $_GET['file'];
        if (file_exists($filename)):
          unlink($filename);
          $errorMsg = 'Photo '.$filename.' a été supprime';
          header('Location: ?action=addPhotoPage&error='. urlencode($errorMsg) .'');
        else:
          $errorMsg = 'Impossible de supprimer '.$filename.', fichier ne existe pas';
          header('Location: ?action=addPhotoPage&error='. urlencode($errorMsg) .'');
        endif;
      else:
        $errorMsg = "Désolé, pas de fichier à supprimer.";
        header('Location: ?action=addPhotoPage&error='. urlencode($errorMsg) .'');
      endif;
    }

    function downloadPhoto()
    {
        if (isset($_GET['file'])):
            $file_url = $_GET['file'];
            header('Content-Type: application/octet-stream');
            header("Content-Transfer-Encoding: Binary");
            header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\"");
            readfile($file_url);
        else:
          $errorMsg = "Désolé, aucun fichier à télécharger.";
          header('Location: ?action=addPhotoPage&error='. urlencode($errorMsg) .'');
        endif;
    }
}
