<?php


namespace App\Entity;


class Article2
{
    //variable de classe, utiliser static car la variable ne dépend pas du contexte, càd de l'objet courant

    private static $remise = 10;
    // une constante est comme une propriété de classe mais accessible seulement en lecture, sa valeur ne peut jamais être modifié, ni à l'extérieur ni à l'intérieur
    // par défaut une constante est public et static

    const REMISE_MAX = 20;

    // PHP 7.1

    private const REMISE_MIN = 0;
    public const REMISE_EXCP = 50;
    protected const REMISE_DEFAULT = 5;

    // Cette méthode permet de retourner la valeur constante qui ne peut être modifié (comme une constante), Son accès est privé. Donc celà revient à  retourner une valeur privée
    private static function CONST_REMISE_MAX() {
        return 20;
    }

    //Cette méthode va permettre un accès public à la constante, la passer en privée revient au même que si on avait déclaré une constante en "private"
    public static function REMISE_MAX() {
        return self::CONST_REMISE_MAX();
    }

    //mutateur pour propriété de classe

    public static function setRemise($remise) {

        if($remise > self::REMISE_MAX){
            self::$remise = self::REMISE_MAX;
        } else {
        self::$remise = $remise;
        }
        self::$remise = (int)$remise;
    }
    //accesseur pour propriété de classe

    public static function getRemise() {
        return self::$remise;
    }

    /**
     * @var string $reference   référence de l'article
     */
    private $reference;

    /**
     * @var string $tradeName   nom commercial de l'article
     */

    private $tradeName;

    /**
     * @var float    $price  prix de l'article
     */

    private $price;

    //METHODE D'OBJET : méthode qui agit uniquement sur l'objet courant, désigné par $this
    //C'est le cas des mutateurs, et des accesseurs (getters et setters)


    /**
     * @param string $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    /**
     * @param string $tradeName
     */
    public function setTradeName($tradeName)
    {
        $this->tradeName = $tradeName;
    }

    /**
     * @param float $price
     */
    public function setPrice($price)
    {
        if(self::IsPositive($price)) {
            $this->price = $price;
        } else {
        $this->$price = null;
        }
    }

    /**
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @return string
     */
    public function getTradeName()
    {
        return $this->tradeName;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    //Autres méthodes d'objet

    /**
     * @param int $percent
     */

    public function increasePrice($percent){
        $this->price = $this->price * (1 + $percent /100);
    }

    public function decreasePrice($percent){
        $this->price = $this->price * (1 - $percent /100);
    }

    // Pas forcément une bonne chose, le nom de la méthode n'est pas clair quand à ce qu'on attends d'elle

    private function generateReference(){
    $words = explode(' ', $this->tradeName);
    $letters='';
    foreach ($words as $word) {
        $letters .= strtoupper(substr($word,0,1));
        }
    return $letters;
    }

    public function autoAssignementReference( ){
        $this->reference = $this->generateReference();
    }

    public function getPriceAfterDiscount() {
       // return $this->price * (1 - self::$remise / 100);
        return $this->price * ( 1 - self::getRemise() / 100);
    }

    public static function isPositive($price){
        if($price >=0) {
            return true;
        }
        return false;

    }
}

