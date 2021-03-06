<?php

class state
{
    private $id;
    private $state;

    function getId()
    {
        return $this->id;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function getState()
    {
        return $this->state;
    }

    function setState($s)
    {
        $this->state = $s;
    }
}

interface statesDAO
{
    public function getAll();
    public function getIdByName($n);
    public function getRetiredStateId();

    public function createState(state $s);
    public function createLendState();
    public function createActiveState();

    public function deleteState(state $s);

    public function checkIfExist($n);
}
