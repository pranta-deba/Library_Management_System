<div class="container">
    <h3 class="mt-3">
        <li>Top writers</li>
    </h3>
</div>
<div class="d-flex justify-content-center">
    <div class="container mb-4 owl-carousel" id="owl-demo">

        <!-- all writer loop -->
        <?php
        $quary_1 = "select * from writers where 1";
        $result_1 = $conn->query($quary_1);
        while ($row = $result_1->fetch_assoc()) {
            echo '<div class="card p-2 m-2" style="width: 15rem;">
            <img class="card-img-top" src="Admin/Assets/Images/' . $row['image'] . '" alt="Card image cap" style="height: 150px;">
            <div class="card-body">
                <h5 class="card-title">' . $row['name'] . '</h5>
                <p class="card-text">Stoke : ' . $row['total_books'] . '</p>
                <a href="#" class="btn text-decoration-underline">All Books..</a>
            </div>
        </div>';
        };
        ?>
        <!-- all writer loop -->
    </div>
</div>