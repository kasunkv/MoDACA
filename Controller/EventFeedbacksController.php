<?php
App::uses('AppController', 'Controller');
/**
 * EventFeedbacks Controller
 *
 * @property EventFeedback $EventFeedback
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class EventFeedbacksController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

}
