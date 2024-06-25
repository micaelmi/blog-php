<?php
function loadFile($file)
{
  switch ($file["error"]) {
    case UPLOAD_ERR_OK:
      return true;
      break;
    case UPLOAD_ERR_INI_SIZE:

    case UPLOAD_ERR_FORM_SIZE:

    case UPLOAD_ERR_PARTIAL:

    case UPLOAD_ERR_NO_FILE:

    case UPLOAD_ERR_NO_TMP_DIR:

    case UPLOAD_ERR_CANT_WRITE:

    case UPLOAD_ERR_EXTENSION:

      return false;
    default:
      break;
  }
}

function moveFile($file, $name)
{
  move_uploaded_file($file["tmp_name"], $name);
}

function loadImage($name)
{
  $file = "https://picsum.photos/1200/600";

  if (file_exists($name)) {
    $file = $name;
  }

  return $file;
}
