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

    //Caso deseja estipular uma representação de turno para cada horário...
    function bussinessHourTurnos($idBH){
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

        // Início da definição dos turnos conforme o horário
        // Feriados - Igual ao domingo
        if($horario >= 0 && $horario <= 2359 && $flagFeriado != 0){
            $turno = "B";
        } 
        // segunda à sexta
        else if (in_array($diaDaSemana, $arraySemana) && $horario >= 0 && $horario < 800 && $flagFeriado!= 1){
            $turno = "B"; // das 0h às 07h59m            
        }
        else if (in_array($diaDaSemana, $arraySemana) && $horario >= 800 && $horario < 2100 && $flagFeriado!= 1){
            $turno = "A"; // das 8h às 20h59m       
        }
        else if (in_array($diaDaSemana, $arraySemana) && $horario >= 2101 && $horario < 2359 && $flagFeriado!= 1){
            $turno = "B"; // das 21h01 às 23h59m       
        }

        // e por ai vai de acordo com a construção do seu turno, seja A, B, ..., Z.
    }

?>