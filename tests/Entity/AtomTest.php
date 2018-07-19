<?php
/**
 * Created by PhpStorm.
 * User: Etudiant0
 * Date: 19/07/2018
 * Time: 12:30
 */

namespace App\Tests\Entity;


use App\Entity\Atom;
use PHPUnit\Framework\TestCase;

/**
 * $atom = new Atom('Carbone', 'C'); // Le symbole doit faire au max 2 caractères
 * $atom->getName(); //Doit retourner le nom de l'atome
 * $atom->getSymbol(); //Doit retourner le symbole de l'atome
 */
class AtomTest extends TestCase
{
    public function testAtomCanBeCreated()
    {
        $atom = new Atom('Carbone', 'C');
        $this->assertInstanceOf(Atom::class, $atom);
    }

    public function testAtomHasAName()
    {
        $atom = new Atom('Carbone', 'C');
        $this->assertEquals('Carbone', $atom->getName());


        $atom = new Atom('Oxygene', 'O');
        $this->assertEquals('Oxygene', $atom->getName());

    }

    public function testAtomHasASymbol()
    {
        $atom = new Atom('Carbone', 'C');
        $this->assertEquals('C', $atom->getSymbol());

        $atom = new Atom('Oxygene', 'O');
        $this->assertEquals('O', $atom->getSymbol());
    }

    public function testAtomCannotHaveSymbolMoreThanTwoCharacters()
    {
        $this->expectException(\LengthException::class);
        $atom = new Atom('Carbone', 'Ccc');
    }

    public function testAtomCannotBeCreatedWithoutNameAndSymbol()
    {
        $this->expectException(\ArgumentCountError::class);
        $atom = new Atom();
    }
}