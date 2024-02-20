<?php
require_once("config-url.php");
if (!isset($_GET["id"]) || empty($_GET["id"])) {
    header("Location: " . BASE_URL . "admin-info.php?error=no_id");
    exit;
}
$id = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soccer Admin Login</title>
    <link href="css/selection.css" rel="stylesheet">
    <link href="css/admin.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <style>
        #navbar {
            top: 0px !important;
        }

        body {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url("assets/AdobeStock_315461099.jpeg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        center {
            padding: 10px;
            height: auto;
            width: 70%;
            background: linear-gradient(160deg, rgba(38, 41, 184, 1) 0%, rgba(9, 118, 239, 1) 26%, rgba(0, 95, 255, 1) 48%, rgba(11, 128, 228, 1) 68%, rgba(38, 49, 161, 1) 100%);
            color: white;
            border: 2px solid black;
            border-radius: 20px;
        }
    </style>
</head>

<body>
    <?php
    require_once("php/admin-header.php");
    require_once("db/db_config.php");

    $sql = "SELECT * FROM `announcements` WHERE id = ?;";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        // ! Handle the case where the prepared statement could not be created
        header("Location: " . BASE_URL . "admin-info.php?error=find_announcement");
        exit;
    }

    $stmt->bind_param("i", $id);

    // ? checks to see if the execute fails
    if (!$stmt->execute()) {
        header("Location: " . BASE_URL . "admin-info.php?error=find_announcement");
        $stmt->close();
        exit;
    }

    // * Gets the Result
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $id = $row["id"];
            $image = $row["image"];
            $heading = $row["heading"];
            $text = $row["text"];
            $link = $row["link"];

            ?>
            <center>
                <div class="col m-3" style="max-width: 500px">
                    <div class="card shadow-sm">
                        <img id="image" src="images/<?php echo $image ?>" style="width:100%; height:auto;" alt="">
                        <div class="card-body">
                            <p class="card-text">
                                <b>
                                    <h3 id="heading">
                                        <?php echo $heading ?>
                                    </h3>
                                </b>
                                <span id="text">
                                    <?php echo $text ?>
                                </span>
                            </p>
                            <?php if (!empty($link)) { ?>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="<?php echo $link ?>">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                                View
                                            </button>
                                        </a>
                                    </div>
                                    <small class="text-body-secondary"></small>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <form action="admin-functions/edit-announcement.php?id=<?php echo $_GET["id"] ?>" method="post" enctype="multipart/form-data">

                    <div class="my-3" style="width: 80%;">
                        <h4 class="text-start">Upload Image</h4>
                        <input type="file" class="form-control" name="announcement-image" id="announcement-image"
                            accept="image/*">
                        <input type="hidden" name="old-announcement-image" value="<?php echo $image ?>">
                        <h4 class="text-start">Heading</h4>
                        <input id="heading-input" type="text" name="heading" class="form-control"
                            placeholder="Enter Text For Heading" value="<?php echo $heading ?>">
                        <h4 class="text-start">Text</h4>
                        <textarea id="text-input" name="text" cols="30" class="form-control"
                            placeholder="Enter Text For Text"><?php echo $text ?></textarea>
                        <h4 class="text-start">Link</h4>
                        <input type="text" name="link" class="form-control" placeholder="Enter A Link"
                            value="<?php echo $link ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>



            </center>
            <?php
        }
    } else {
        // ! No data found
        echo "no Card found";
    }

    ?>

    <script src="js/announcement.js"></script>

</body>

</html>