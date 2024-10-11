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
     tracklist (JSON)
     coverArt (String) : URL of the cover image ?

  - RecordCrate :
     crateId (int)
     description (Sring)
     owner (String : owner of the crate, One-To-One relation with  CrateDiggers)  
     Vinyls (One-To-Many relation wih vinyl)

  - CrateDigger :
     id (int)
     Name (String)
     email (String)
       

