<?php

//inclusion du fichier

require_once '../src/App/Entity/Article.php';

use App\Entity\Article;

//création d'un objet (instanciation)

$article_1 = new Article();

//définir les variables d'objets
$article_1->setReference('REF-101');

$article_1->setTradeName('Téléviseur');

$article_1->setDescription('Meilleure télé du monde');

echo $article_1->getReference();
echo '<br/>';
echo $article_1->getDescription();
echo '<br/>';
echo $article_1->getTradeName();
echo '<br/>';

/* var_dump($article_1); */