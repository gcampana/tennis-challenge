<?php

namespace App\Adapter\Persistence\Entity;


use App\Domain\Model\PlayerFemale;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Player
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private $id;

    #[ORM\Column(type: "string", nullable: false)]
    private $name;

    #[ORM\Column(type: "string", nullable: false)]
    private $type;

    #[ORM\Column(type: "integer", nullable: false)]
    private $skill;

    #[ORM\Column(type: "integer", nullable: true)]
    private $strength;
    
    #[ORM\Column(type: "integer", nullable: true)]
    private $velocity;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $reactionTime;

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type)
    {
        $this->type = $type;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function getSkill(): int
    {
        return $this->skill;
    }

    public function setSkill(int $skill): void
    {
        $this->skill = $skill;
    }

    public function getStrength(): ?int
    {
        return $this->strength;
    }

    public function setStrength(int $strength): void
    {
        $this->strength = $strength;
    }

    public function getVelocity(): ?int
    {
        return $this->velocity;
    }

    public function setVelocity(int $velocity): void
    {
        $this->velocity = $velocity;
    }

    public function getReactionTime(): ?int
    {
        return $this->reactionTime;
    }

    public function setReactionTime(int $reactionTime): void
    {
        $this->reactionTime = $reactionTime;
    }

    public static function createFromModel(\App\Domain\Model\Player $playerModel): Player
    {
        $self = new self;
        $self->setName($playerModel->getName());
        $self->setSkill($playerModel->getSkill());
        if($playerModel instanceof PlayerFemale){
            $self->setReactionTime($playerModel->getReactionTime());
            $self->setType('female');
        } else{
            $self->setStrength($playerModel->getStrength());
            $self->setVelocity($playerModel->getVelocity());
            $self->setType('male');
        }
        return $self;
    }
}