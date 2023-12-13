<?php
require './connection.php';
$objectInstance = new multiple('multiple', 'localhost', 'root', '');
$data = $objectInstance->selectData();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/index.css<?php echo time() ?>">
    <title>Multiple images</title>
</head>
<style>
    body {
        background: rgb(245, 245, 245);
    }

    .wraper {
        display: grid;
        margin: auto;
        width: 60%;
    }

    .images-wraper {
       display: flex;
       gap: 10px;
    }

    .images-wraper .card {
        height: 240px;
        width: 200px;
        max-width: 400px;
        background: #fff;
        cursor: pointer;
        border-radius: 10px;
        padding-bottom: 8px;
        transition: .8s;
    }

    .images-wraper .card:hover img {
        transform: scale(1.07);
    }

    .images-wraper .card img {
        width: 100%;
        height: 200px;
        border-radius: 20px;
        transition: .8s;
    }

    .images-wraper .card .name {
        margin: 6px 0 0 6px;
    }

    a {
        text-decoration: none;
        color: #000;
    }
    .small-images-card{
        position: relative;
    }
    .small-images-card img{
        width: 60px;
        height: 60px;
    }
</style>

<body>
    <div class="wraper">
        <h4>Multiple images in php</h4>
        <div class="images-wraper">
            <?php
            foreach ($data as $value) {
            ?>
                <div class="card">
                        <a href="details.php?id=<?php echo $value['id'] ?>">
                            <div class="image"><img src="./images/<?php echo $value['image'] ?>"></div>
                            <div class="name"><?php echo $value['name'] ?></div>
                        </a>
                    </div>

<?php
            }
            ?>            
        </div>
    </div>
</body>

</html>