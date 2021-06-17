<?php

function media_show($media)
{
    $tab_html = [];

    for ($i=0;$i < count($media); $i++) 
    {
        array_push($tab_html,
            '<div class="col">
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                    <img class="card-img-top" src= "./public/img/'.$media[$i]["id_media"].'.jpg" alt="'.$media[$i]["media_name"].'">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">'.$media[$i]["media_name"].'</h5>
                        <p class="card-text">Author :'.$media[$i]["last_name"].' </p>
                        <p class="card-text">Price : '.$media[$i]["media_price"].' </p>
                        <p class="card-text">State :</p>
                    </div>
                    </div>
                </div>
            </div>
            </div>');
    }
    return implode($tab_html);

}
