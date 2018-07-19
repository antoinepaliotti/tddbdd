<?php
/**
 * Created by PhpStorm.
 * User: Etudiant0
 * Date: 19/07/2018
 * Time: 12:40
 */

namespace App\Entity;


class Atom
{
    private $name;
    private $symbol;

    /**
     * Atom constructor.
     * @param $name
     * @param $symbol
     */
    public function __construct($name, $symbol)
    {
        if(strlen($symbol) > 2){
            throw new \LengthException(sprintf('Le symbole %s n\' est pas valide', $symbol));
        }

        $this->name = $name;
        $this->symbol = $symbol;
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getSymbol()
    {
        return $this->symbol;
    }



}