<?php
/**
 * Created by PhpStorm.
 * User: Etudiant0
 * Date: 19/07/2018
 * Time: 14:41
 */

namespace App\Entity;


class Molecule
{
    /**
     * @var Atom[]
     */
    private $atoms = [];
    private $name;
    private $type;

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function addAtom($atom)
    {
        $this->atoms[] = $atom;
        return $this;
    }

    public function getAtoms()
    {
        return $this->atoms;
    }

    public function merge()
    {
        if (count($this->atoms) < 2){
            throw new \LogicException('Il n\'y a pas assez d\'atomes dans la molécule');
        }

        $this->name = '';
        foreach($this->atoms as $atom){
            $this->name .= $atom->getSymbol();
        }
    }

    public function getName()
    {
        if(null === $this->name){
            $this->merge();
        }

        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }


}