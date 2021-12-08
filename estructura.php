<?php
$m = 10; //cantidad de preguntas pedidas a la DB
$i = 0-9 ; //indexado de cada pregunta según $m

$trivia = array (
    [$i] => array (
        /**********
         * tenemos esta estructura 
         * 
         */
        'pregunta' => '¿una pregunta?',
        'opciones' => array (
            /********
             * Se repite la siguiente estructura 4 veces.
             * Una respuesta correcta con value True
             * 3 alternativas más con value false
             */
            'opcion_1' => array (
                'texto' => 'string',
                'value' => 'bool'
            )
        ),
    ['totalPreguntas'] => $m,
    ['resultado'] => 0,
    ['conteo'] => 1 
    )
);

