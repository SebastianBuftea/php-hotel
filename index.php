<?php
    include __DIR__."/partials/vars.php";

    /* visualizziamo tutti gli hotel se non è presente nessun dato in input */
    $filtered_hotels= $hotels;

    /* se è presente un dato in input allora eseguiamo i seguenti filtraggi */
    /* filtraggio del parcheggio */
    if(isset($_GET['parcheggio'])){
        $parcheggio= $_GET['parcheggio'];

        /* se in input del parcheggio è impostato tutti facciamo vedere tutti gli hotel */
        if($parcheggio=='tutti'){
            $filtered_hotels= $hotels;
        }

        /* altrimenti verifichiamo se in input è specificato che si vuole con parcheggio o senza */
        else{
            $temphotels=[];

            /* transformiamo il valore da stringa in booleano */
            if($parcheggio == 'true'){
                $parcheggio= true;
            }
            elseif($parcheggio == 'false'){
                $parcheggio= false;
            }

            /* eseguiamo un ciclo che andra ad aggiungere gli hotel con le caratteristiche impostata in 
               input in un array provvisorio  */
            foreach($filtered_hotels as $hotel){
                if($hotel['parking'] == $parcheggio){
                    $temphotels[]=$hotel;
                }    
            }  

            $filtered_hotels= $temphotels;  
        }  
    }


    /* filtraggio per voto */
    if(isset($_GET['stelle'])){
        $stelle= $_GET['stelle'];
        $temphotels=[];

         /* eseguiamo un ciclo che andra ad aggiungere gli hotel con le caratteristiche impostata in 
            input in un array provvisorio  */
            foreach($filtered_hotels as $hotel){
                if($hotel['vote'] >= $stelle){
                    $temphotels[]=$hotel;
                }    
            }  
            $filtered_hotels= $temphotels;  
        }
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
                <div class="col">
                    <!-- form per gli imput -->
                    <form action="index.php" class="my-4">
                        <label for="parcheggio">Seleziona se vuoi vedere i risultati con o senza parcheggio</label>
                        <select name="parcheggio" id="parcheggio">
                            <option value="tutti">Tutti</option>
                            <option value="true">Si</option>
                            <option value="false">No</option>       
                        </select> <br>
                        <input type="number" placeholder="numero di stelle" name="stelle" id="stars" max="5" class="my-2">
                        <button type="submit">Cerca</button>
                    </form>
                </div>
                <div class="col-12">
                    <!-- table di visualizazzione -->
                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <?php foreach($filtered_hotels[0] as $key => $hotel) { ?>
                                <th scope="col"> <?php echo str_replace("_", " ",ucfirst($key));?> </th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($filtered_hotels as $hotel){ ?> 
                            <tr>
                                <th> <?php echo $hotel['name']; ?></th>
                                <td> <?php echo $hotel['description']; ?></td>
                                <td> <?php echo $hotel['parking'] ?'Yes':'No' ; ?></td>
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