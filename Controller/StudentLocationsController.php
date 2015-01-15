<?php
App::uses('AppController', 'Controller');
/**
 * StudentLocations Controller
 *
 * @property StudentLocation $StudentLocation
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class StudentLocationsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

}
