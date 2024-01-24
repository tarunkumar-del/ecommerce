<?php
/** sidebar active */
function setActive(array $active){
    if(is_array($active)){
        foreach($active as $r){
                if(request()->routeIs($r)){
                    return 'active';
                }
        }
    }
}
