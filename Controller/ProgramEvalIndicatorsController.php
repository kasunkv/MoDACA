<?php
App::uses('AppController', 'Controller');
/**
 * ProgramEvalIndicators Controller
 *
 * @property ProgramEvalIndicator $ProgramEvalIndicator
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ProgramEvalIndicatorsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
    public $helpers = array('Js');

}
