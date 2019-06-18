<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $datos = file_get_contents("https://reqres.in/api/users?per_page=20");
        $obj = json_decode($datos);
        foreach ($obj->data as $user) {
            ?>
            <p><?= $user->first_name ?> <?= $user->last_name ?></p>
            <?php
        }

        $data = ['name' => 'ana', 'job' => 'Carnicera'];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://reqres.in/api/users/2");
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
        ?>
    </body>
</html>
