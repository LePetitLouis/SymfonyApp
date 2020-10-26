<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

$APIKEY = "edc9ca08d1fd48379f1a944c52a6e98c";

class mainController extends AbstractController{

    /**
     * @Route("/", name="home")
     */
    public function home(){
        $url = file_get_contents( 'https://newsapi.org/v2/sources?language=fr&apiKey=edc9ca08d1fd48379f1a944c52a6e98c');
        $news = json_decode($url);
        //var_dump($news);
        return $this->render('home.html.twig', ['news' => $news]);
    }

    /**
     * @Route("/{source}", name="listeArticles")
     */
    public function listeArticles($source){
        $url = json_decode(file_get_contents('https://newsapi.org/v2/top-headlines?sources='.$sources.'&apiKey='.$APIKEY));
        return $this->render('listeArticles.html.twig', ['listeArticles' => $url]);  
    }

}

?>