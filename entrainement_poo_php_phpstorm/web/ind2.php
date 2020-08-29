<?php

require_once '../src/App/Entity\Article2.php';

use App\Entity\Article2;

$article_1 = new Article2();
$article_2 = new Article2();
$article_3 = new Article2();

$setPriceForArticle_1 = 150;
$article_1->setPrice($setPriceForArticle_1);
$article_1->increasePrice(5);
$article_1->decreasePrice(10);
$article_1->setTradeName('Clavier ultra plat noir Mécanique');
$article_1->autoAssignementReference();
echo $article_1->getPrice();

echo '<br/>';
echo $article_1->getPriceAfterDiscount(); // si la variable de classe $remise est private

$article_2->setTradeName('Ecran incurvé rétina 144hz 1ms');
$article_2->autoAssignementReference();
$article_2->setPrice(200);
$article_2->increasePrice(10);

$article_3->setTradeName('Souris 10 raccourcis');
$article_3->setPrice(150);

echo '<br/>';
Article2::setRemise(20.6);
echo Article2::getRemise();
echo '<br/>';

echo Article2::REMISE_MAX;

// Article2::REMISE_MAX = 50; -> il est impossible d'écrire dans une constante en PHP, en dehors de la ligne où elle est déclarée
echo '<br/>';
echo Article2::REMISE_MAX();

/**


$priceForArticle_1 = 150;


$priceIsOk = Article2::isPositive($priceForArticle_1);
if($priceIsOk){
    echo '<br/>';
    echo 'Le prix proposé, de ' . $priceForArticle_1 . ', est valide';
} else {
    echo 'Le prix proposé n\'est pas valide, il doit être positif';
}
echo '<br/>'; */

/** SI LA VARIABLE DE CLASSE $REMISE EST PUBLIC

//affichage de la remise

echo '<br/>';
echo 'Article2::$remise => ' . Article2::$remise;
echo '<br/>';

//affichage depuis les objets

echo $article_1::$remise;
echo '<br/>';
echo $article_2::$remise;
echo '<br/>';
echo '<p> après modification de la valeur de la remise </p>';
echo '<br/>';
Article2::$remise = 15;
echo '<br/>';
echo 'Article2::$remise => ' . Article2::$remise;
echo '<br/>';
echo $article_1::$remise;
echo '<br/>';
echo $article_2::$remise;

echo '<p> Après seconde modification de la valeur de la remise </p>';
echo '<br/>';
Article2::$remise = 20;
echo '<br/>';
echo 'Article2::$remise => ' . Article2::$remise;
echo '<br/>';
echo $article_1::$remise;
echo '<br/>';
echo $article_2::$remise;

echo '<br/>'; */
echo '<pre>';
var_dump($article_1);
echo '</pre>';

echo '<pre>';
var_dump($article_2);
echo '</pre>';