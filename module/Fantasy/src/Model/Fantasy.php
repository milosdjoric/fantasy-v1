<?php

namespace Fantasy\Model;

class Fantasy
{

    public $id;
    public $player;
    public $score;

    public function exchangeArray(array $data)
    {
        $this->id = !empty($data['id']) ? $data['id'] : null;
        $this->player = !empty($data['player']) ? $data['player'] : null;
        $this->team = !empty($data['team']) ? $data['team'] : null;
        $this->score = !empty($data['score']) ? $data['score'] : null;
        $this->price = !empty($data['price']) ? $data['price'] : null;
        $this->up = !empty($data['up']) ? $data['up'] : null;
        $this->keeps_value = !empty($data['keeps_value']) ? $data['keeps_value'] : null;
        $this->down = !empty($data['down']) ? $data['down'] : null;
        $this->opponent = !empty($data['opponent']) ? $data['opponent'] : null;
    }

}
