<?php

namespace App\DataFixtures;

use App\Entity\Vinyl;
use App\Entity\RecordCrate;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {   
        $metalDesc = "Heavy - Thrash Metal LPs";
        $hiphopDesc = "Hip-hop LPs";
        $popDesc = "Pop Music LPs";
        
        $metal = new RecordCrate();
        $metal->setCrateId(1);
        $metal->setDescription($metalDesc);
        $manager->persist($metal);
        
        $hiphop = new RecordCrate();
        $hiphop->setCrateId(2);
        $hiphop->setDescription($hiphopDesc);
        $manager->persist($hiphop) ;
        
        $pop = new RecordCrate();
        $pop->setCrateId(3);
        $pop->setDescription($popDesc);
        $manager->persist($pop);
        
        foreach ($this->getMetalVinyls() as [$title, $artist, $genre, $year, $label, $tracklist]) {
             $vinyl = new Vinyl();
             $vinyl->setTitle($title);
             $vinyl->setArtist($artist);
             $vinyl->setMusicGenre($genre);
             $vinyl->setReleaseYear($year);
             $vinyl->setLabel($label);
             $vinyl->setTracklist($tracklist);
             
             // Add vinyl to the crate
             $metal->addVinyl($vinyl);
                
                // Persist the Vinyl
             $manager->persist($vinyl);
            
        }
        
        //Roll it back for the other two
        foreach ($this->getHipHopVinyls() as [$title, $artist, $genre, $year, $label, $tracklist]) {
            $vinyl = new Vinyl();
            $vinyl->setTitle($title);
            $vinyl->setArtist($artist);
            $vinyl->setMusicGenre($genre);
            $vinyl->setReleaseYear($year);
            $vinyl->setLabel($label);
            $vinyl->setTracklist($tracklist);
            
            $hiphop->addVinyl($vinyl);
            
            $manager->persist($vinyl);
            
        }
        foreach ($this->getPopVinyls() as [$title, $artist, $genre, $year, $label, $tracklist]) {
            $vinyl = new Vinyl();
            $vinyl->setTitle($title);
            $vinyl->setArtist($artist);
            $vinyl->setMusicGenre($genre);
            $vinyl->setReleaseYear($year);
            $vinyl->setLabel($label);
            $vinyl->setTracklist($tracklist);
            
            $pop->addVinyl($vinyl);
            
            $manager->persist($vinyl);
            
        }
            
        
        // Flush all changes to the database
        $manager->flush();
    }
    
    private function getMetalVinyls()
    {
        yield ['Sabotage', 'Black Sabbath', 'Heavy Metal', 1975, 'Vertigo Records',
            [
                ["track_name" => "Hole in the sky" , "duration" => "3:59" , "track_number" => "1"],
                ["track_name" => "Symtom of the Universe" , "duration" => "6:29" , "track_number" => "2"], 
                ["track_name" => "Megalomania" , "duration" => "9:41" , "track_number" => "3"]
            ]
        ];
        yield ['Master of Puppets', 'Metallica', 'Thrash Metal', 1986, 'Elektra Records',
            [
                ["track_name" => "Battery" , "duration" => "5:12" , "track_number" => "1"],
                ["track_name" => "Master of Puppets" , "duration" => "8:35" , "track_number" => "2"],
                ["track_name" => "The Thing That Should Not Be" , "duration" => "6:36" , "track_number" => "3"]
            ]
            
        ];
        yield ['Painkiller', 'Judas Priest', 'Heavy Metal', 1990, 'Columbia Records',
            [
                ["track_name" => "Painkiller" , "duration" => "6:05" , "track_number" => "1"],
                ["track_name" => "Hell Patrol" , "duration" => "3:36" , "track_number" => "2"],
                ["track_name" => "All Guns Blazing" , "duration" => "3:57" , "track_number" => "3"]
            ]
        ];
    }
    
    private function getHipHopVinyls()
    {
        yield ['Illmatic', 'Nas', 'Hip Hop', 1994, 'Columbia Records',
            [
                ["track_name" => "N.Y State Of Mind" , "duration" => "4:53" , "track_number" => "1"],
                ["track_name" => "Life's a Bitch" , "duration" => "3:30" , "track_number" => "2"],
                ["track_name" => "The World Is Yours" , "duration" => "4:50" , "track_number" => "3"]
            ]
        ];
        yield ['The Marshall Mathers LP', 'Eminem', 'Hip Hop', 2000, 'Aftermath Entertainment',
            [
                ["track_name" => "Kill You" , "duration" => "4:24" , "track_number" => "1"],
                ["track_name" => "Stan" , "duration" => "6:44" , "track_number" => "2"],
                ["track_name" => "The Real Slim Shady" , "duration" => "4:44" , "track_number" => "3"]
            ]
        ];
        yield ['To Pimp a Butterfly', 'Kendrick Lamar', 'Hip Hop', 2015, 'Top Dawg Entertainment',
            [
                ["track_name" => "Wesley's Theory" , "duration" => "3:59" , "track_number" => "1"],
                ["track_name" => "These Walls" , "duration" => "5:00" , "track_number" => "2"],
                ["track_name" => "Alright" , "duration" => "3:39" , "track_number" => "3"]
            ]
        ];
    }
    
    private function getPopVinyls()
    {
        yield ['Bad', 'Michael Jackson', 'Pop', 1987, 'Epic Records',
            [
                ["track_name" => "Bad" , "duration" => "4:07" , "track_number" => "1"],
                ["track_name" => "The Way You Make Me Feel" , "duration" => "4:58" , "track_number" => "2"],
                ["track_name" => "Smooth Criminal" , "duration" => "4:17" , "track_number" => "3"]
            ]
        ];
        yield ['Like a Prayer', 'Madonna', 'Pop', 1989, 'Sire Records',
            [
                ["track_name" => "Like a Prayer" , "duration" => "5:40" , "track_number" => "1"],
                ["track_name" => "Love Song" , "duration" => "4:52" , "track_number" => "2"],
                ["track_name" => "Till Death Do Us Part" , "duration" => "5:18" , "track_number" => "3"]
            ]
        ];
        yield ['True Blue', 'Madonna', 'Pop', 1986, 'Sire Records',
            [
                ["track_name" => "Open Your Heart" , "duration" => "4:13" , "track_number" => "1"],
                ["track_name" => "White Heat" , "duration" => "4:40" , "track_number" => "2"],
                ["track_name" => "True Blue" , "duration" => "4:17" , "track_number" => "3"]
            ]
        ];
    }
    
}
