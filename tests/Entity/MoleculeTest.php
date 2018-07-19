<?php
/**
 * Created by PhpStorm.
 * User: Etudiant0
 * Date: 19/07/2018
 * Time: 14:34
 */

namespace App\Tests\Entity;


use App\Entity\Atom;
use App\Entity\Molecule;
use PHPUnit\Framework\TestCase;


/**
 * $molecule = new Molecule("glucide");
 * $molecule->addAtom(new Atom('Carbon', 'C'))
 *          ->addArtom(new Atom('Oxygen', 'O"));
 * $molecule->getAtoms(); // Retourne un tableau d'atomes
 * $molecule->merge(); // Réaliser la fusion si au moins 2 atomes
 * $molecule->getName(); //  Renvoie CO
 * $molecule->getType(); // Renvoie glucide
 */
class MoleculeTest extends TestCase
{
    public function testMoleculeCanBeInstancied()
    {
        $this->assertInstanceOf(
            Molecule::class,
            new Molecule('glucide')
        );
    }

    public function testAtomCanBeAddedInMolecule()
    {
        $atom = $this->createMock(Atom::class);
        $molecule = new Molecule('glucide');
        $this->assertSame($molecule, $molecule->addAtom($atom));

        $this->assertContainsOnlyInstancesOf(Atom::class, $molecule->getAtoms());

    }

    public function testMoleculeCannotContainOnlyOneAtom()
    {
        $this->expectException(\LogicException::class);
        $atom = $this->getMockBuilder(Atom::class)
            ->disableOriginalConstructor()
            ->setMethods(['getSymbol'])
            ->getMock();
        $atom->method('getSymbol')->willReturn('C');
        $molecule = new Molecule('glucide');
        $molecule->addAtom($atom);
        $molecule->getName();
    }

    public function testMoleculeCanBeMerged()
    {
        $carbon = $this->createConfiguredMock(Atom::class, [
            'getSymbol' => 'C'
        ]);

        $oxygen = $this->createConfiguredMock(Atom::class, [
            'getSymbol' => 'O'
        ]);
        $molecule = new Molecule('glucide');
        $molecule->addAtom($carbon)
                 ->addAtom($oxygen);

        $molecule->merge();

        $this->assertEquals('CO',$molecule->getName());

    }

    public function testCanRetrievedMoleculeType()
    {
        $molecule = new Molecule('glucide');
        $this->assertEquals('glucide', $molecule->getType());
    }

}