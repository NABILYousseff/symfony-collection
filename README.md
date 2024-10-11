# Le Projet sera autour des collections de Vinyls 


# Installation 


# Description du projet (Initialisation)


- Création du Projet Symfony sous le nom myvinyls


- Création des entités : Vinyl , RecordCrate (inventaire de chaque utilisateur), VinylWall (la galerie pour les visitants du site), CrateDiggers (utilisateurs du site)

# Différents attributs de chaque classe :
  - Vinyl :
     id (int)
     title (String)
     artist (String)
     releaseYear (Date)
     Label (String)
     musicGenre (String)
     tracklist (String Array)

  - RecordCrate :
     crateId (int)
     digger (String : owner of the crate, One-To-One relation with  CrateDiggers)  
     Vinyls (Many-To-Many relation wih vinyl)

     

