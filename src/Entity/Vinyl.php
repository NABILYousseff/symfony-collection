<?php

namespace App\Entity;

use App\Repository\VinylRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VinylRepository::class)]
class Vinyl
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $artist = null;

    #[ORM\Column]
    private ?int $releaseYear = null;

    #[ORM\Column(length: 255)]
    private ?string $label = null;

    #[ORM\Column(length: 255)]
    private ?string $musicGenre = null;

    #[ORM\Column]
    private array $tracklist = [];

    #[ORM\Column(length: 255, nullable: True)]
    private ?string $coverArt = null;

    #[ORM\ManyToOne(inversedBy: 'vinyls')]
    #[ORM\JoinColumn(nullable: false)]
    private ?RecordCrate $recordCrate = null;


    /**
     * @var Collection<int, VinylWall>
     */
   

    public function __construct()
    {
        $this->vinylWalls = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getArtist(): ?string
    {
        return $this->artist;
    }

    public function setArtist(string $artist): static
    {
        $this->artist = $artist;

        return $this;
    }

    public function getReleaseYear(): ?int
    {
        return $this->releaseYear;
    }

    public function setReleaseYear(int $releaseYear): static
    {
        $this->releaseYear = $releaseYear;

        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function getMusicGenre(): ?string
    {
        return $this->musicGenre;
    }

    public function setMusicGenre(string $musicGenre): static
    {
        $this->musicGenre = $musicGenre;

        return $this;
    }

    public function getTracklist(): array
    {
        return $this->tracklist;
    }

    public function setTracklist(array $tracklist): static
    {
        $this->tracklist = $tracklist;

        return $this;
    }

    public function getCoverArt(): ?string
    {
        return $this->coverArt;
    }

    public function setCoverArt(string $coverArt): static
    {
        $this->coverArt = $coverArt;

        return $this;
    }

    public function getRecordCrate(): ?RecordCrate
    {
        return $this->recordCrate;
    }

    public function setRecordCrate(?RecordCrate $recordCrate): static
    {
        $this->recordCrate = $recordCrate;

        return $this;
    }
    public function __toString()
    {
        $s = '' ;
        $s.=$this->getTitle().' '. ' - ' . $this->getArtist();
        return $s ;
    }


    
}
