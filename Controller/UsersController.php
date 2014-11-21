<?php
App::uses('AppController', 'Controller');
App::uses('PasswordGenerator', 'Lib');
App::uses('SendEmail', 'Lib');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UsersController extends AppController {
    
    //public $components = array('Auth');
/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
        
        
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow('forgotPassword');
        }

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        
        public function login() {
            if ($this->request->is('post')) {
                $temp = $this->request->data;
                if ($this->Auth->login()) {
                    
                    $user = AuthComponent::user();
                    if($user['approved']) {
                        if ($user['role'] == 'Student') {
                            return $this->redirect(array('controller' => 'students', 'action' => 'index'));
                        } else if ($user['role'] == 'Admin') {
                            return $this->redirect(array('controller' => 'administrators', 'action' => 'index'));
                        } else if ($user['role'] == 'Staff') {
                            return $this->redirect(array('controller' => 'staffs', 'action' => 'index'));
                        }
                    } else {
                        $this->Session->setFlash(__('<b>Oopzz!</b>  Your Account is <b>NOT Approved</b> yet. You will Receive and Email When Your Account is Active.'), 'flashError');
                        $this->Auth->logout();
                        return;
                    }
                    
                } else {
                    $this->Session->setFlash(__('<b>Oopzz!</b>  Invalid username/password'), 'flashError');
                }
           }
        }
        
        public function redirectLoggedUser() {
            $user = AuthComponent::user();
            if ($user['role'] == 'Student') {
                return $this->redirect(array('controller' => 'students', 'action' => 'index'));
            } else if ($user['role'] == 'Admin') {
                return $this->redirect(array('controller' => 'administrators', 'action' => 'index'));
            } else if ($user['role'] == 'Staff') {
                return $this->redirect(array('controller' => 'staffs', 'action' => 'index'));
            }
        }
        
        public function logout(){
            $this->Auth->logout();
            $this->redirect(array('controller' => 'users', 'action' => 'login'));
        }
        
        public function forgotPassword() {
            if ($this->request->is('post')) {
                
                $resStd = false;
                $resUser = false;
                
                //email details
                $receiverEmail = '';
                $receiverName = '';
                $receiverUsername = '';
                $newPassword = '';
                
                $resetRequest = $this->request->data;
                $forgottenUser = null;
                
                $user = $this->User->find('first', array(
                   'conditions' => array(
                       'username' => $resetRequest['User']['username'],
                   ) 
                ));
                
                if (!empty($user)) {
                    switch ($user['User']['role']) {
                        case 'Student':
                            $this->loadModel('Student');
                            $forgottenUser = $this->Student->find('first', array(
                                'conditions' => array(
                                    'user_id' => $user['User']['id'],
                                )
                            ));

                            if ($resetRequest['User']['username'] === $forgottenUser['Student']['username'] && $resetRequest['User']['email'] === $forgottenUser['Student']['email']) {
                                // reset  the password and send the email.                                
                                $newPassword = PasswordGenerator::getRandomPassword(10);
                                $hashedPassword = PasswordGenerator::hashPassword($newPassword);
                                
                                // set the details of the receiver for sending mail
                                $receiverEmail = $forgottenUser['Student']['email'];
                                $receiverName = $forgottenUser['Student']['first_name'];
                                $receiverUsername = $forgottenUser['Student']['username'];
                                
                                // load the models and update the record
                                $resStd = $this->Student->updateAll(array('password' => "'" . $hashedPassword . "'"), array('student.id' => $forgottenUser['Student']['id']));
                                $this->loadModel('User');
                                $resUser = $this->User->updateAll(array('password' => "'" . $hashedPassword . "'"), array('user.id' => $user['User']['id']));
                              
                            } else {
                                if($resetRequest['User']['email'] != $forgottenUser['Student']['email']) {
                                    $this->Session->setFlash(__('<b>Email</b> address you entered is not associated with an account. Please enter the email address used to create the account.'), 'flashWarn');
                                    return;
                                }
                            }     
                            break;
                        case 'Admin':
                            $this->loadModel('Administrator');
                            $forgottenUser = $this->Administrator->find('first', array(
                                'conditions' => array(
                                    'user_id' => $user['User']['id'],
                                )
                            ));
                            
                            if ($resetRequest['User']['username'] === $forgottenUser['Administrator']['username'] && $resetRequest['User']['email'] === $forgottenUser['Administrator']['email']) {
                                // reset  the password and send the email.                                
                                $newPassword = PasswordGenerator::getRandomPassword(10);
                                $hashedPassword = PasswordGenerator::hashPassword($newPassword);
                                
                                // set the details of the receiver for sending mail
                                $receiverEmail = $forgottenUser['Administrator']['email'];
                                $receiverName = $forgottenUser['Administrator']['first_name'];
                                $receiverUsername = $forgottenUser['Administrator']['username'];
                                
                                // load the models and update the record
                                $resStd = $this->Administrator->updateAll(array('password' => "'" . $hashedPassword . "'"), array('administrator.id' => $forgottenUser['Administrator']['id']));
                                $this->loadModel('User');
                                $resUser = $this->User->updateAll(array('password' => "'" . $hashedPassword . "'"), array('user.id' => $user['User']['id']));
                              
                            } else {
                                if($resetRequest['User']['email'] != $forgottenUser['Administrator']['email']) {
                                    $this->Session->setFlash(__('<b>Email</b> address you entered is not associated with an account. Please enter the email address used to create the account.'), 'flashWarn');
                                    return;
                                }
                            }     

                            break;
                        case 'Staff':
                            $this->loadModel('Staff');
                            $forgottenUser = $this->Staff->find('first', array(
                                'conditions' => array(
                                    'user_id' => $user['User']['id'],
                                )
                            ));
                            
                            
                            if ($resetRequest['User']['username'] === $forgottenUser['Staff']['username'] && $resetRequest['User']['email'] === $forgottenUser['Staff']['email']) {
                                // reset  the password and send the email.                                
                                $newPassword = PasswordGenerator::getRandomPassword(10);
                                $hashedPassword = PasswordGenerator::hashPassword($newPassword);
                                
                                // set the details of the receiver for sending mail
                                $receiverEmail = $forgottenUser['Staff']['email'];
                                $receiverName = $forgottenUser['Staff']['first_name'];
                                $receiverUsername = $forgottenUser['Staff']['username'];
                                
                                // load the models and update the record
                                $resStd = $this->Staff->updateAll(array('password' => "'" . $hashedPassword . "'"), array('staff.id' => $forgottenUser['Staff']['id']));
                                $this->loadModel('User');
                                $resUser = $this->User->updateAll(array('password' => "'" . $hashedPassword . "'"), array('user.id' => $user['User']['id']));
                              
                            } else {
                                if($resetRequest['User']['email'] != $forgottenUser['Staff']['email']) {
                                    $this->Session->setFlash(__('<b>Email</b> address you entered is not associated with an account. Please enter the email address used to create the account.'), 'flashWarn');
                                    return;
                                }
                            }     
                            break;

                        default:
                            break;
                    }
                    
                    if (!empty($forgottenUser)) {
                        if ($resStd && $resUser) {
                            // create the email Fields
                            $subject = "MoDACA - Password Reset.";
                            $emailFields = array();
                            $emailFields['title'] = $receiverName;
                            $emailFields['username'] = $receiverUsername;
                            $emailFields['password'] = $newPassword;    
                            
                            $res = SendEmail::sendMail($receiverEmail, $subject, $emailFields, 'reset_password');
                            if ($res) {
                                $this->Session->setFlash(__('An email containing the login credentials has been sent to your email address. Please check your inbox.'), 'flashSuccess');
                                return $this->redirect(array('action' => 'login'));
                            } else {
                                $this->Session->setFlash(__('An error occured, your new password is not sent. Please try again.'), 'flashError');
                                return $this->redirect(array('action' => 'login'));
                            }
                        }
                    }
                    
                    
                } else {
                    $this->Session->setFlash(__('Your <b>username</b> is not registered with us. Please enter a valid username'), 'flashWarn');
                    return;
                }
                
                
                
                
            }
        }
}
