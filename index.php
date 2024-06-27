<?php

require 'partials/__dbconnect.php';

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iForum - Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body>div.my-5.row.mx-auto.justify-content-evenly>div>div {
            display: flex !important;
            flex-direction: column;
            justify-content: space-between !important;
        }


        @media only screen and (max-width: 900px) {
            #cardContainer {
                /* width: 85vw !important; */
                flex-direction: column !important;
                align-items: center !important;
            }
            
            #cardContainer > div 
            {
                width: 75vw !important;
            }

        }
    </style>
</head>

<body class="bg-light">
    <?php

    require "partials/__header.php";

    ?>

    <div id="carouselExampleIndicators" class="carousel slide carousel-fade">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/m-1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/m-2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/m-3.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <h3 class="text-center mt-5 fw-semibold fs-2 h2">- EXPLORE CATEGORIES -</h3>

    <div class="my-5 d-flex flex-wrap mx-auto justify-content-center" id="cardContainer">


        <?php

        $sql_get_categories = "SELECT * FROM `categories`";
        $result = mysqli_query($conn, $sql_get_categories);

        if (!$result) {
            echo "Something Went Wrong, We are working on it, Please try again later.";
        } else {
            if (mysqli_num_rows($result)) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="card mx-3 shadow border-rounded rounded-4 my-3 p-3" style="width: 25vw;">
                    <img src="img/' . $row['category_name'] . '.jpg" class="card-img-top border-rounded rounded-3 img-fluid" alt="' . $row['category_name'] . ' Image">
                    <div class="card-body">
                        <h5 class="card-title">' . $row['category_name'] . '</h5>
                        <p class="card-text">' . substr($row['category_description'], 0, 100) . '...</p>
                        <form method="get" action="threads.php">
                        <input type="hidden" id="category_id" name="category_id" value="' . $row['category_id'] . '">
                        <button type="submit" class="btn btn-primary">See Threads</button>
                        </form>
                        </div>
                    </div>';
                }
            }

            // echo '<div class="card col-md-4 shadow border-rounded rounded-4 my-3 p-3" style="width: 25vw;">
            //         <img src="img/' . $row['category_name'] . '.jpg" class="card-img-top border-rounded rounded-3 img-fluid" alt="' . $row['category_name'] . ' Image">
            //         <div class="card-body">
            //             <h5 class="card-title">' . $row['category_name'] . '</h5>
            //             <p class="card-text">' . substr($row['category_description'], 0, 100) . '...</p>
            //             <form method="get" action="threads.php">
            //             <input type="hidden" id="category_id" name="category_id" value="' . $row['category_id'] . '">
            //             <button type="submit" class="btn btn-primary">See Threads</button>
            //             </form>
            //             </div>
            //         </div>';
        }

        ?>

        <!-- <div class="card col-md-4 shadow border-rounded rounded-4 my-3 p-3" style="width: 25vw;">
            <img src="img/Python.jpg" class="card-img-top border-rounded rounded-3 img-fluid" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div> -->


    </div>

    <?php

    require "partials/__footer.php"

        ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>