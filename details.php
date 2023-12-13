<?php
require './connection.php';
$ojectInstance = new multiple('multiple', 'localhost', 'root', '');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $principalImage = $ojectInstance->selectDataById($id);
    $secondaryImages = $ojectInstance->selectAllImagesById($id);
    //   var_dump($principalImage);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
</head>
<style>
    .wraper{
        margin: auto;
        width: 40%;
    }
    .principal-card {
        width: 250px;
        height:auto;
        box-shadow: 4px 4px 5px rgb(240,240,240),
        -4px -4px 5px rgb(240,240,240);
        border-radius: 8px;
        padding-bottom: 9px;
    }

    .principal-card img {
        width: 100%;
        height: 100%;
        border-radius: 10px;
    }
    .secondary-card img{
        width: 50px;
        height: 50px;
    }
    .wraper{
        display: flex;
        gap: 15px;
    }
    .secondary-card .image{
        display: flex;
        flex-direction: column;
    }
    .secondary-card img{
        border: 2px solid rgb(230,230,230);
        padding: 1px;
        border-radius: 4px;
        cursor: pointer;
    }
    .name{
        padding-left: 10px;
    }
</style>

<body>
    <div class="wraper">
        <?php
        if (isset($principalImage)) {
        ?>
            <div class="principal-card">
                <div class="image"><img class="big-image" src="./images/<?php echo $principalImage['image'] ?>"></div>
                <div class="name"><?php echo $principalImage['name'] ?></div>
            </div>
            <div class="secondary-card">

            <?php
            foreach ($secondaryImages as  $value) {
            ?>
                    <div class="image"><img class="small-images" src="./images/<?php echo $value['imageName'] ?>"></div>
        <?php
            }
            ?>
                </div>
<?php
        }

        ?>
    </div>
    <script src="./script.js"></script>
</body>

</html>