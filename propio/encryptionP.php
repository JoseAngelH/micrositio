<?php 
    function cifradoP($dato){
        $abecedario = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
        $indices;
        for($i = 0; $i < strlen($dato); $i++){
            if(!is_numeric($dato[$i])){
                for($j=0; $j<count($abecedario); $j++){
                    if($dato[$i] == $abecedario[$j]){
                        $indices[$i] = $j;
                    }
                }
            }else{
                for($j=0; $j<count($abecedario); $j++){
                    if($dato[$i] == $j){
                        $indices[$i] = $abecedario[$j];
                    }
                }
            }
        }
        $clave = "";
        for($i = 0; $i < count($indices); $i++){
            $clave = $clave.$indices[$i].',';
        }
        return $clave;
    }

    function descifradoP($codigo){
        $codigo = explode(",", $codigo);

        $abecedario = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
        'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
        
        $mensaje = "";

        for($i = 0; $i < count($codigo); $i++){
            if(!is_numeric($codigo[$i])){
                for($j=0; $j<count($abecedario); $j++){
                    if($codigo[$i] == $abecedario[$j]){
                        $mensaje = $mensaje.$j;
                    }
                }
            }else{
                $mensaje = $mensaje.$abecedario[$codigo[$i]];
            }
        }
        return $mensaje;
    }


?>