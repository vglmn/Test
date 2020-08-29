<?php


namespace App\Entity;


class Article
{
    /**
    * @var string $reference    reference du produit
     */

    private $reference;

    /**
     * @var string $tradeName   nom commercial du produit
     */

    private $tradeName;

    /**
     * @var string $description     description de l'article
     */

    private $description;

    //SETTER de la propriété reference

    /**
     * @param string $reference
     */

    public function setReference($reference) {
        if(strlen($reference) > 7) {
            echo 'La référence ' .$reference . ' doit avoir 3 chiffre après "REF-"';
        } else {
            $this->reference = $reference;
        }
    }



    // ACESSEUR / GETTER de la propriété reference

    /**
     * @return string
     */

    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param string $tradeName
     */
    public function setTradeName($tradeName) {
        $this->tradeName = $tradeName;
    }

    /**
     * @return string
     */
    public function getTradeName()
    {
        return $this->tradeName;
    }

    /**
     * @param string $description
     */
    public function setDescription($description) {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }



}

