<!DOCTYPE html>
<html>

<head>
    <title>Livelear</title>
    <link href="./public/css/bootstrap.min.css" rel="stylesheet">
    <link href="./public/css/style.css" rel="stylesheet">
    <script src="./public/js/bootstrap.min.js"></script>
</head>

<body>
    <a href="./treatement/insertline.php" >INSERT A LINE</a>
    <br/>
    <a href="./treatement/insert.php" >INSERT A CART</a>
    <div class="big_container">
        <div class="contain container_fluid row">
        <?php

        include './treatement/model.php';
        $model = new Model();
        $rows = $model->fetchline();
        
        $i = 1;
        if(!empty($rows)){
        foreach($rows as $rowline){ 
        ?>
            <div class="list col-md-3">
            <h4> <?php echo $rowline['title_line']; ?></h4>
            <?php
            
            $rows = $model->fetchcard($rowline['id_line']);
            
            $i = 1;
            if(!empty($rows)){
            foreach($rows as $rowcard){ 
            ?>
                
                
                <div class="card card_for_css" style="width: 14rem;">
                    <!-- <img src="./public/images/thiaroyeinfo.png" class="card-img-top" alt="..."> -->
                    <div class="card-body">
                        <h4><?php echo $rowcard['title_card']; ?></h4>
                        <p class="card-text"><?php echo $rowcard['contain_card']; ?></p>
                    </div>
                    <div class="link">
                        <a href="./treatement/read.php?id=<?php echo $rowcard['id_card']; ?>">Read</a>
                        <a href="./treatement/delete.php?id=<?php echo $rowcard['id_card']; ?>" >Delete</a>
                        <a href="./treatement/edit.php?id=<?php echo $rowcard['id_card']; ?>" >Edit</a>
                    </div>
                </div>
                <?php
                }
              }else{
                echo "no data";
            }

              ?>
                
                
            </div>

            <!-- <div class="list" class="list col-md-3">
                <h4>Title card</h4>
                <div class="card card_for_css" style="width: 14rem;">
                     <img src="./public/images/thiaroyeinfo.png" class="card-img-top" alt="..."> 
                    <div class="card-body">
                        <h4>Title card</h4>
                        <p class="card-text">Some quick example text to build on the card title.</p>
                    </div>
                </div>
                <div class="card card_for_css" style="width: 14rem;">
                    <img src="./public/images/thiaroyeinfo.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4>Title card</h4>
                        <p class="card-text">Some quick example text to build on the card title.</p>
                    </div>
                </div>
            </div>

            <div class="list" class="list col-md-3">
                <h4>Title card</h4>
                <div class="card card_for_css" style="width: 14rem;">
                    <img src="./public/images/thiaroyeinfo.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4>Title card</h4>
                        <p class="card-text">Some quick example text to build on the card title.</p>
                    </div>
                </div>
                <div class="card card_for_css" style="width: 14rem;">
                    <img src="./public/images/thiaroyeinfo.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4>Title card</h4>
                        <p class="card-text">Some quick example text to build on the card title.</p>
                    </div>
                </div>
            </div>
           
            <div class="list" class="list col-md-3">
                <h4>Title card</h4>
                <div class="card card_for_css" style="width: 14rem;">
                    <img src="./public/images/thiaroyeinfo.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4>Title card</h4>
                        <p class="card-text">Some quick example text to build on the card title.</p>
                    </div>
                </div>
                <div class="card card_for_css" style="width: 14rem;">
                    <img src="./public/images/thiaroyeinfo.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4>Title card</h4>
                        <p class="card-text">Some quick example text to build on the card title.</p>
                    </div>
                </div>
            </div> -->

            <?php
                }
              }else{
                echo "no data";
            }

              ?>

        </div>
    </div>
</body>

</html>