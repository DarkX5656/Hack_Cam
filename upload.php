<?php
$data = json_decode(file_get_contents("php://input"));

if ($data && isset($data->image)) {
    $img = $data->image;
    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $decodedData = base64_decode($img);

    $filename = 'capture_' . time() . '.png';
    file_put_contents($filename, $decodedData);
    echo "Saved";
} else {
    echo "No image data!";
}
?>
