<?php
$data = file_get_contents("https://jsonplaceholder.typicode.com/users");
$users = json_decode($data);
foreach ($users as $user) {
    ?>
    <p><?= $user->name ?></p>
    <?php
}

$data = ['name' => 'ana', 'username' => 'CoolAna', 'email' => 'ana@ana.com'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://jsonplaceholder.typicode.com/users");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
$result = curl_exec($ch);

if ($result) {
    $obj = json_decode($result);
    print_r($obj);
} else {
    echo "Error";
    echo curl_error($ch);
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://jsonplaceholder.typicode.com/users/2");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
$result = curl_exec($ch);

if ($result) {
    $obj = json_decode($result);
    print_r($obj);
} else {
    echo "Error";
    echo curl_error($ch);
}