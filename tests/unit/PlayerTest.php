<?php

use App\Domain\Model\Player;


class PlayerTest extends PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function a_player_with_name_and_skill_can_be_created(): void
    {
        $player = new Player('Some Player', 70);
        $this->assertEquals($player->getName(), 'Some Player');
        $this->assertEquals($player->getSkill(), 70);
    }

    /**
     * @test
     */
    public function a_player_without_name_and_skill_cant_be_created(): void
    {
        $this->expectException(ArgumentCountError::class);
        new Player();
    }

    /**
     * @test
     */
    public function a_player_skill_should_be_between_0_and_100(): void
    {
        $playerNoSkill = new Player('Some Name', 0);
        $playerFullSkill = new Player('Othe Name', 100);
        $this->assertEquals($playerNoSkill->getSkill(),0);
        $this->assertEquals($playerFullSkill->getSkill(), 100);
    }

    /**
     * @test
     */
    public function a_player_skill_should_not_be_smaller_than_0(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Player skill must be from 0 up to 100');
        new Player('Some Name', -1);
    }

    /**
     * @test
     */
    public function a_player_skill_should_not_be_greater_than_100(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Player skill must be from 0 up to 100');
        new Player('Some Name', 101);
    }
    
}