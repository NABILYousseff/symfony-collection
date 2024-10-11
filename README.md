# Collection des Vinyls

- Ce projet est autour des collections des albums de musique (vinyls), l'idée c'est que chaque utilisateur (owners) aura un inventaire de vinyls nommé RecordCrate, aucune exigence pour le genre des vinyls par Crate , ils peuvent être diversifiés mais pour le moment le fichier des Fixtures aura une classification par genre puisqu'on n'a pas encore créer des utilisateurs (je voulais juste organiser les inventaires selon un principe, ce N'EST PAS EXIGÉ PAR LE CODE). 


# Installation 


# Description du projet (Initialisation)


- Création du Projet Symfony sous le nom myvinyls


- Création des entités RecordCrate (inventaire) et Vinyl (objet)

# Différents attributs de chaque classe :
  - Vinyl :
     id (int)
     title (String)
     artist (String)
     releaseYear (Date)
     Label (String)
     musicGenre (String)
     tracklist (JSON)
     coverArt (String) : URL of the cover image ? ( indisponibles pour le moment)
     RecordCrate (Many-To-One relation with the RecordCrate Class)

  - RecordCrate :
     crateId (int)
     description (Sring)
     Vinyls (One-To-Many relation wih vinyl)

# Données chargées :

  -  Pour le moment j'ai créé 3 inventaires, chaque inventaire contient 3 vinyls, et chaque "record" contient 3 morceaux avec leurs informations (numéro du track, titre et durée) 
    
# Controllers :
    
    - 2 contrôleurs (RecordCrateController et VinylController) : 
    
Le premier contrôleur contient 2 méthodes : indexAction et showAction. RecordCrateController::method indexAction pour l'affichage de la liste des inventaires (crates), et RecordCrateController::method showAction pour l'affichage des détails et du contenu d'un seul inventaire specifique.

```php
#[Route('/crates')]
class RecordCrateController extends AbstractController
{
    /**
     * Liste des inventaires
     */
    
    #[Route('/', name: 'home', methods: ['GET'])]
    public function indexAction(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $crates = $entityManager->getRepository(RecordCrate::class)->findAll();
        return $this->render('record_crate/index.html.twig', [
            'crates' => $crates,
        ]);
    }
    /**
     * Afficher un inventaire spécifique
     */
    #[Route('/{id}', name : 'recrate_show',requirements: ['id' => '\d+'], methods: ['GET'])]
    public function showAction(RecordCrate $crate) : Response 
    {
        return $this->render('record_crate/show.html.twig',
            
            ['crate' => $crate]);
            
      }
}
```
- Le 2ème contrôleur contient une seule méthode VinylController::method showAction pour l'affichage des détails d'un seul vinyl.

```php
class VinylController extends AbstractController
{
    //Welcome page
    #[Route('/vinyl/{id}', name: 'vinyl_show',requirements: ['id' => '\d+'], methods : ['GET'])]
    public function showAction(Vinyl $vinyl) : Response
    {
        return $this->render('vinyl/index.html.twig',[
            'vinyl' => $vinyl
            ]);
    }
    
}
```
# Les Routes vers les gabarits Twig :

 - Comme on peut le constater à partir des snippets du code, 3 routes ont été configurées ; "/crates/" pour l'accès à la liste des inventaires, représentée par le fichier twig index.html.twig (avec un peu de CSS :)), vraie galère ), "/crates/{id}" pour l'accès à un inventaire spécifique (fichier twig sous templates/RecordCrate/show.html.twig), et la route "/vinyl/{id}" pour afficher un vinyl individuel, qui appartient à un certain "Crate" (fichier sous templates/Vinyl/index.html.twig).


          
# Gabarits Twig :

- J'ai utilisé (pour le moment) un affichage sous forme de tables pour les inventaires individuels et les morceaux individuels, une sorte de blocs avec des boutons pour la page d'accueil ("/crates").

- J'ai aussi introduit du CSS dans le fichier dont le chemin est : "/public/css/style.css" (pour ne pas compliquer les choses), que j'appelle en utilisant la fonction Twig "asset" dans le "templates/base.html.twig" duquel héritent les autres pages fichiers Twig.




