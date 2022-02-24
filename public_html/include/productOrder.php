<div class="row padding">
    <div class=" col-xs-2 col-sm-6 col-md-4">
        <div class="contenitoreImmagineCarrello">
            <img src="<?php echo $root.$product['imgPath'];?>" class="immaginePrincipale spazioSinistra" alt="<?php echo $product['imgDescription'];?>">
        </div>
    </div>

    <div class=" col-xs-10 col-sm-6 col-md-8">
        <h4 class="pro-d-title spazioSinistra">
            <a href="product.php?idP=<?php echo $product['idP'];?>" class="testoProdotto">
                <?php echo $product['name']; ?>
            </a>
        </h4>
        <div>
            <?php
                if($categoryRes -> num_rows){
                    echo '<span class="posted_in spazioSinistra">';
                    echo '<strong>Categorie:</strong>';
                    $first = true;
                    while($cat = $categoryRes -> fetch_assoc()){
                        if(!$first)
                            echo ', ';
                        echo '<a rel="tag" href="search.php?search='.$cat['name'].'">'.$cat['name'].'</a>';
                        $first = false;
                    }
                    echo '.';
                }
            ?>
        </div>
        <div class="spazioSinistra">
            <strong>Prezzo Unitario: </strong>
            <span><?php echo $product['price']/100.0 ?>&euro;</span>
        </div>
        <form class="form-group spazioSinistra infoProduct" id="<?php echo $product['idP'];?>" >
            <div style="float:left;margin:10px;">Quantità</div>
            <input style="float:left;margin:10px;" type="number" min="0" value="<?php echo $qta;?>" class="form-control quantity" id="qta<?php echo $product['idP'];?>" readonly>
        </form>
    </div>
</div>