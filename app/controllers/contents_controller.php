<?php
class ContentsController extends AppController {

	var $name = 'Contents';
	function beforeFilter()
 	{
		parent::beforeFilter();
		$this->Auth->allow('view','map','location_map','reservation','get_content');
	} 
	
	function map()
	{
		$this->layout = "map";
	}
	
	function get_content($id = null)
	{
		return $this->Content->find("first", array('conditions'=>array('Content.id'=>$id)));
	}
	
	function view($slug = null) 
	{
		$content = $this->Content->find("first", array('conditions'=>array('Content.slug'=>$slug)));
		$this->set('title_for_layout', $content['Content']['title']);
		$this->set('content', $content);
	}
	function location_map($slug = "location-map_11") 
	{
		$content = $this->Content->find("first", array('conditions'=>array('slug'=>$slug)));
		$this->set('content', $content);
	}
	function reservation($slug = "reservation_14 ") 
	{
		$content = $this->Content->find("first", array('conditions'=>array('slug'=>$slug)));
		$this->set('title_for_layout', $content['Content']['title']);
		$this->set('content', $content);
	}
	
	function admin_index() {
		$this->Content->recursive = 0;
		$this->set('contents', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid content', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('content', $this->Content->read(null, $id));
	}

	function admin_add() {
		$this->helpers[] = 'Fck';
		if (!empty($this->data)) {
			$this->Content->create();
			if ($this->Content->save($this->data)) {
				App::import('Sanitize');
				$this->Content->saveField('slug', strtolower(Inflector::slug(Sanitize::paranoid($this->data['Content']['title'], array(' '))).'_'.$this->Content->id), true);
				$this->Session->setFlash(__('The content has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The content could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		$this->helpers[] = 'Fck';
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid content', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Content->save($this->data)) {
				App::import('Sanitize');
				$this->Content->saveField('slug', strtolower(Inflector::slug(Sanitize::paranoid($this->data['Content']['title'], array(' ')), '-').'_'.$this->data['Content']['id']), true);
				$this->Session->setFlash(__('The content has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The content could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Content->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for content', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Content->delete($id)) {
			$this->Session->setFlash(__('Content deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Content was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>