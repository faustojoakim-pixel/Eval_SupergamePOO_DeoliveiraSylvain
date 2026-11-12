<?php

Class Controller {
//Atribut
private ModelPlayer $model;
private ViewHome $view;

//Constructeur
public function __construct(ModelPlayer $model, ViewHome $view){
    $this->model = $model;
    $this->view = $view;

}



//getter et setter
/**
 * Get the value of model
 *
 * @return ModelPlayer
 */
public function getModel(): ModelPlayer {
return $this->model;
}

/**
 * Set the value of model
 *
 * @param ModelPlayer $model
 *
 * @return self
 */
public function setModel(ModelPlayer $model): self {
$this->model = $model;
return $this;
}

/**
 * Get the value of view
 *
 * @return ViewHome
 */
public function getView(): ViewHome {
return $this->view;
}

/**
 * Set the value of view
 *
 * @param ViewHome $view
 *
 * @return self
 */
public function setView(ViewHome $view): self {
$this->view = $view;
return $this;

}

//fonction render
public function render(): void
{
    $this->getView()->displayAll();
}

}














