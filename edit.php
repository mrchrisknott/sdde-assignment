<?php

require_once(__DIR__ . '/includes/db.php')

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>SDDE assignment - UOS</title>
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <?php require_once(__DIR__.'/includes/header.php'); ?>
    <div class="container">
        <h1 class="mt-5 mb-5">Update composer</h1>

        <?php
            $composer_id = $_GET['id'];

            if($_POST['first_names']) {
                //process the form
                $data = [
                    "first_names" => $_POST['first_names'],
                    "last_name" => $_POST['last_name'],
                    "country_birth" => $_POST['country_birth'],
                    "musical_period" => $_POST['musical_period'],
                    "year_born" => $_POST['year_born'],
                    "year_died" => $_POST['year_died'],
                    "composer_image" => $_POST['composer_image'],
                    "composer_id" => $composer_id
                ];

                $query = "UPDATE composers SET first_names = :first_names, last_name = :last_name, country_birth = :country_birth, musical_period = :musical_period, year_born = :year_born, year_died = :year_died, composer_image = :composer_image WHERE composer_id = :composer_id";
                $stmt = $Conn->prepare($query);
                $stmt->execute($data);
            ?>

        <div class="alert alert-success" role="alert">
            Your Composer has been updated.
        </div>

        <?php
            }
            $query = "SELECT * FROM composers WHERE composer_id = :composer_id";
            $stmt = $Conn->prepare($query);
            $stmt->execute(["composer_id" => $composer_id]);
            $composer_data = $stmt->fetch(PDO::FETCH_ASSOC);

        ?>

        <form action="" method="post">
            <div class="form-group">
                <label for="First names">First names</label>
                <input type="text" class="form-control" id="firstnames" name="first_names"
                    value="<?php echo $composer_data['first_names']; ?>">
            </div>
            <div class="form-group">
                <label for="Last name">Last name</label>
                <input type="text" class="form-control" id="lastname" name="last_name"
                    value="<?php echo $composer_data['last_name']; ?>">
            </div>
            <div class="form-group">
                <label for="Country of birth">Country of birth</label>
                <input type="text" class="form-control" id="countryofbirth" name="country_birth"
                    value="<?php echo $composer_data['country_birth']; ?>">
            </div>
            <div class="form-group">
                <label for="Musical period">Musical period</label>
                <input type="text" class="form-control" id="musicalperiod" name="musical_period"
                    value="<?php echo $composer_data['musical_period']; ?>">
            </div>
            <div class="form-group">
                <label for="Year of birth">Year of birth</label>
                <input type="number" class="form-control" id="yearofbirth" name="year_born"
                    value="<?php echo $composer_data['year_born']; ?>">
            </div>
            <div class="form-group">
                <label for="Year of death">Year of death</label>
                <input type="number" class="form-control" id="yearofdeath" name="year_died"
                    value="<?php echo $composer_data['year_died']; ?>">
            </div>
            <div class="form-group">
                <label for="Composer image">Composer image</label>
                <input type="text" class="form-control" id="composerimage" name="composer_image"
                    value="<?php echo $composer_data['composer_image']; ?>">
            </div>






            <button type="submit" class="btn btn-primary">Update Composer Record</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</body>

</html>