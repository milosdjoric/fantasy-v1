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
        $this->score = !empty($data['score']) ? $data['score'] : null;
    }

}
