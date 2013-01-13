<?php
App::uses('AppController', 'Controller');
/**
 * CakePHP Component &amp; Model Code Completion
 * @author junichi11
 *
 * ==============================================
 * CakePHP Core Components
 * ==============================================
 * @property AuthComponent $Auth
 * @property AclComponent $Acl
 * @property CookieComponent $Cookie
 * @property EmailComponent $Email
 * @property RequestHandlerComponent $RequestHandler
 * @property SecurityComponent $Security
 * @property SessionComponent $Session
 */
class AppController extends Controller {

    /**
     * Components
     *
     * @var array
     */
    public $components = array(
        'Acl',
        'Auth' => array(
            'authorize' => array(
                'Actions' => array(
                    'userModel' => 'User',
                    'actionPath' => 'controllers'
                )
            ),
        ),
        'RequestHandler',
        'Session',
        'AutoAsset.AssetCollector' => array(
            'assets' => array(
                'headBottom' => array(
                    'js' => array(
                        '/js/libs/auto_asset/script.min',
                        '/js/libs/auto_asset/css',
                        '/js/libs/auto_asset/namespace',
                        '/js/libs/auto_asset/url',
                    )
                )
            ),
            'controllerAssets' => array(
                'css' => true,
                'js' => true
            ),
            //'controllersPath' => '/theme/bootstrap/js/controllers/',
            'jsHelper' => array(
                'script' => '/js/libs/auto_asset/script.min',
                'css' => '/js/libs/auto_asset/css',
                'namespace' => '/js/libs/auto_asset/namespace',
                'url' => '/js/libs/auto_asset/url',
            ),
            //'jsHelpersBlock' => 'headBottom'
        ),
        //'DebugKit.Toolbar' => array('panels' => array('history', 'session'))
    );

    /**
     * Helpers
     *
     * @var array
     */
    public $helpers = array(
        'Html',
        'Form',
        'Time',
        'Number',
        'TwitterBootstrapCakeBake.BootstrapIcon',
        'Session',
        'TwitterBootstrap.BootstrapForm',
        'TwitterBootstrap.BootstrapHtml',
        'TwitterBootstrap.BootstrapPaginator',
        'MenuBuilder.MenuBuilder' => array(
            'activeClass' => 'active',
            'firstClass' => 'first-item',
            'childrenClass' => 'has-children',
            'evenOdd' => false,
            'itemFormat' => '<li%s>%s%s</li>',
            'wrapperFormat' => '<ul%s>%s</ul>',
            'menuVar' => 'menu',
            'authVar' => 'currentUser',
            'authModel' => 'User',
            'authField' => 'role_id',
            'noLinkFormat' => '%s'
        ),
        'Js',
        'AutoAsset.AssetRenderer',
        'AutoAsset.AsyncAsset'
    );

    /**
     * viewClass set to Theme
     *
     * @var string
     */
    public $viewClass = 'Theme';

    /**
     * theme set to bootstrap by default
     *
     * @var string
     */
    public $theme = 'bootstrap';
	
	/**
     * getCurrentUser
	 * 
	 * check if the user is currently log in
     *
     * return array
     */
	function getCurrentUser() {
		if (!$this->Session->read('Auth')) {
			return array();
		}
		return $this->Session->read('Auth');
	}

    /**
     * beforeFilter
     *
     * @throws NotFoundException
     */
    function beforeFilter() {

        //Configure AuthComponent
        $this->Auth->userModel = 'User';
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login', 'admin' => true);
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login', 'admin' => true);
        $this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'home', 'admin' => true);
        $this->Auth->flash = array('element'=>'Flash/error','key'=>'auth','params'=>array());
        $this->Auth->allow('*'); // @todo: for development purposes

        //Protect ACL plugin
        if ($this->request['plugin']=='acl'&&$this->Session->read('Auth.User.role_id')!=Configure::read('Role.master')) {
            throw new NotFoundException(__('Not Found'));
        }

        // AssetCollectorComponent asset list

        if ($this->theme == 'bootstrap') {
            //$this->AssetCollector->resetControllersPath('/theme/bootstrap/js/controllers/');
            $this->AssetCollector->setThemeName('bootstrap');

            $this->AssetCollector->css('bootstrap');
            $this->AssetCollector->css('bootstrap-responsive');
            //$this->AssetCollector->css('font-awesome-ie7','ie');
            $this->AssetCollector->css('font-awesome','head');
            $this->AssetCollector->css('libs/jquery/jquery-ui-1.9.1.custom');
            $this->AssetCollector->css('application');

            $this->AssetCollector->js('libs/jquery/jquery-1.8.2.min','head');
            $this->AssetCollector->js('libs/jquery/jquery-ui-1.9.1.custom.min','head');
            $this->AssetCollector->js('libs/handlebars/handlebars-1.0.rc.1','head');
            $this->AssetCollector->js('bootstrap.min','head');
            $this->AssetCollector->js('application','head');

            // define menus
            $menu = array(
                'admin-navbar' => array(
                    array(
                        'title' => __('Booths'),
                        'url' => array('plugin'=>false, 'controller' => 'booths', 'action' => 'index', 'admin' => true),
                        'permissions' => array(Configure::read('Role.master'),Configure::read('Role.admin'))
                    ),
                    array(
                        'title' => __('Helpers'),
                        'url' => array('plugin'=>false, 'controller' => 'users', 'action' => 'helpers', 'admin' => true),
                        'permissions' => array(Configure::read('Role.master'),Configure::read('Role.admin'))
                    ),
                    array(
                        'title' => __('ACL'),
                        'url' => array('plugin'=>'acl', 'controller' => 'acos', 'action' => 'index', 'admin' => true),
                        'permissions' => array(Configure::read('Role.master'))
                    ),
                    array(
                        'title' => __('Players'),
                        'url' => array('plugin'=>false, 'controller' => 'players', 'action' => 'index', 'admin' => true),
                        'permissions' => array(Configure::read('Role.master'),Configure::read('Role.admin'),Configure::read('Role.helper'))
                    ),
                ),
                'admin-navbar-loggedout' => array(
                    array(
                        'title' => __('Log In'),
                        'url' => array('plugin'=>false, 'controller' => 'users', 'action' => 'login', 'admin' => true),
                    ),
                ),
            );
        }

        // For default settings name must be menu
        $currentUser = $this->Session->read('Auth');
        $this->set(compact('menu','currentUser'));

        parent::beforeFilter();
    }

	function __cleanUpListItems($items) {
		//return $items; // @todo: fix this! :( check html_entity_decode() shit..
		foreach ($items as $key=>$item) {
			//$cleanItem = str_replace('"','&quot;',$item);
			//$cleanItem = htmlentities(str_replace(array("\n", "\r"), "", $item), ENT_QUOTES, "UTF-8");
			$cleanItem = str_replace(array("\n", "\r"), " ", $item);
			$cleanItem = addslashes($cleanItem);
			$items[$key] = $cleanItem;
		}
		return $items;
	}
}
