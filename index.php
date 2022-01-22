<?php
require("./src/functions.php");
$users = createUsers();

file_put_contents("users.json", json_encode($users));
$data = file_get_contents("users.json");
$newUsers = json_decode($data, true);

$result_names = [];
$sum_age = 0;

foreach ($newUsers as $newUser)
{
    if (isset($result_names[$newUser["name"]])) {
        $result_names[$newUser["name"]]++;
    } else {
        $result_names[$newUser["name"]] = 1;
    }
    $sum_age += $newUser["age"];
}

echo "<pre>";
var_dump($result_names);
echo "</pre>";

echo "Средний возраст " . $sum_age/sizeof($newUsers);

