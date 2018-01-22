<?php

abstract class Controller{

    abstract public function create(Model $model);
    abstract public function retrieve(Model $model);
    abstract public function update(Model $model);
    abstract public function delete(Model $model);


}

?>