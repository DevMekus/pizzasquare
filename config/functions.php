<?php
include('connection.php');
include('mailing.php');

//PROCESSING IMAGE
function processImage($destFolder, $imageName)
{
    $selected_pic = '';
    $ok = 1;
    $destination_folder = $destFolder;
    if (!empty($_FILES[$imageName]['name'])) {
        if ($_FILES[$imageName]['size'] > 2097152) {
            $ok = 0;
            $selected_pic = 'Image size exceeds';
        }
        $imageID = rand(00000, 99999);
        if ($ok = 1) {
            $file_info = explode('.', $_FILES[$imageName]['name']);
            list($filename, $fileextension) = $file_info;
            $new_file_name = $imageID . "-" . time() . "." . $fileextension;
            $destination_file = $destination_folder . $new_file_name;
            move_uploaded_file($_FILES[$imageName]['tmp_name'], $destination_file);
            $selected_pic = $new_file_name;
        } else {
            $selected_pic = '';
        }
    }        //Image Process Ends
    return $selected_pic;
}

//LOGIN IN ACTIVITY
function logActivity($cxn, $flag, $message)
{

    $activityTime = getFormatedDate();
    $stamp = time();
    $insertActivity = mysqli_query($cxn, "INSERT INTO recentactivities(activity,visibility,activityDate,stampTime)VALUES('{$message}','{$flag}','{$activityTime}','{$stamp}')");

    return  $insertActivity;
}

//Save notification
function saveNotification($cxn, $sentTo, $title, $message)
{
    $activityTime = getFormatedDate();
    $stamp = time();
    $insertNote = mysqli_query($cxn, "INSERT INTO notifications(sentTo,title,notice,saveTime,stampTime)VALUES('{$sentTo}','{$title}','{$message}','{$activityTime}','{$stamp}')");

    return  $insertNote;
}

//NORMAL DATE FORMAT
function normalDate()
{
    date_default_timezone_set('Africa/Lagos');
    return date('d-m-y h:m:s', time());
}

//DATE LIKE FRIDAY, 7, 2020
function getFormatedDate()
{
    $mydate = getdate(date("U"));
    return "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";
}

//GENERATES 10 RANDOM ALPHANUMERIC D1DGITS
function idGenerator()
{

    return substr(str_shuffle(MD5(microtime())), 0, 10);
}
