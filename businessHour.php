<?php
    function bussinessHour($idBH){
        $hoje = getdate();
        $diaDaSemana = $hoje["wday"];
        $horario = $hoje["hours"] . str_pad($hoje["minutes"], 2, '0', STR_PAD_LEFT);
        //$horario = (int) $horario
        $bh = 0;
        $prompt = "";
        $arraySemana = [1,2,3,4,5]; // Segunda a Sexta
        $data = str_pad($hoje["mday"], 2, '0', STR_PAD_LEFT).str_pad($hoje["mon"], 2, '0', STR_PAD_LEFT).$hoje["year"];

        // Data DDMMAAAA
        $arrayFeriado = [
            "01032022", "21042022", "01052022",
            "08052022", "16062022", "07092022",
            "12102022", "02112022", "15112022",
            "25122022", "01012023"];
        
        if(in_array($data, $arrayFeriado)){
            $$flagFeriado = 1;
        } else {
            $flagFeriado = 0;
        }

        $textoPrompt = 'Estamos fora do horário de atendimento';

        switch($idBH){
            case '1':
                // segunda a sexta 08 as 21
                $prompt = "2146";
                if(in_array($diaDaSemana, $arraySemana) && $flagFeriado != 1){
                    if((int)$horario >= 800 && (int)$horario < 2100){
                        $bh = 1;
                    }
                }
                break;

                // Os cases podem se repetir de acordo com a necessidade.
        }


    }
?>