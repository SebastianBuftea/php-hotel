<?php
    include __DIR__."/partials/vars.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>Document</title>
</head>
<body>
    <?php include_once __DIR__."/partials/templates/header.php"; ?>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <?php foreach($hotels[0] as $key => $hotel) { ?>
                                <th scope="col"> <?php echo str_replace("_", " ",ucfirst($key));?> </th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($hotels as $hotel){ ?> 
                            <tr>
                                <th> <?php echo $hotel['name']; ?></th>
                                <td> <?php echo $hotel['description']; ?></td>
                                <td> <?php echo $hotel['parking'] ?'yes':'no' ; ?></td>
                                <td> <?php echo $hotel['vote']; ?></td>
                                <td> <?php echo $hotel['distance_to_center']; ?></td>
                            </tr>    
                        <?php } ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>   
    </main>
    <?php include_once __DIR__."/partials/templates/footer.php"; ?>  
</body>
</html>