<?php

namespace App\Adapter\Persistence\Entity;

use App\Domain\Model\TournamentFemale;
use Doctrine\ORM\Mapping as ORM;
use JsonSerializable;

#[ORM\Entity]
class Tournament implements JsonSerializable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private $id;

    #[ORM\Column(type: "string", nullable: false)]
    private $tournamentType;

    #[ORM\Column(type: "datetime", nullable: false)]
    private $createdAt;

    #[ORM\OneToOne(targetEntity: Player::class, cascade: ["persist", "remove"])]
    private $winner;

    public function getId(): int
    {
        return $this->id;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    
    public function getWinner(): Player
    {
        return $this->winner;
    }

    public function setWinner(Player $player): void
    {
        $this->winner = $player;
    }

    public static function createFromModel(\App\Domain\Model\Tournament $tournament): Tournament
    {
        $self = new self;
        $self->createdAt = $tournament->getCreatedAt();
        $self->tournamentType = $tournament instanceof TournamentFemale? 'female' : 'male';
        $self->winner = Player::createFromModel($tournament->getWinner());
        return $self;
    }

    public function jsonSerialize() {
        return [
            'created_at' => $this->createdAt->format('Y-m-d h:i'),
            'tournament_type' => ucfirst($this->tournamentType)." Tournmanet",
            'winner' => $this->winner->getName(),
        ];
    } 

}