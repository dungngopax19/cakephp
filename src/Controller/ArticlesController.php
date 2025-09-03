<?php

declare(strict_types=1);

namespace App\Controller;


/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 */
class ArticlesController extends AppController
{
    public function index()
    {
        $data = ['apple', 'banana', 'cherry'];
    }

    public function view($id = null)
    {
        $article = $this->Articles->get($id, contain: ['Users', 'Tags']);
        $this->set(compact('article'));
    }

    public function add()
    {
        $article = $this->Articles->newEmptyEntity();
        if ($this->request->is('post')) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        $users = $this->Articles->Users->find('list')->all();
        $tags = $this->Articles->Tags->find('list')->all();
        $this->set(compact('article', 'users', 'tags'));
    }

    public function edit($id = null)
    {
        $article = $this->Articles->get($id, contain: ['Tags']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        $users = $this->Articles->Users->find('list')->all();
        $tags = $this->Articles->Tags->find('list')->all();
        $this->set(compact('article', 'users', 'tags'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The article has been deleted.'));
        } else {
            $this->Flash->error(__('The article could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
