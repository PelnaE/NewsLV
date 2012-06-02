<?php defined('SYSPATH') or die('Hacking attemp!');

class Controller_Dashboard_Posts extends Controller_Template {
	public function action_list(){
		$model_for_posts = Model::factory('post');
        $get_posts = $model_for_posts->get_post_list();
        $view = View::factory('dashboard/list');
        $view->posts = $get_posts;
        $this->template->content = $view->render();

	}
	public function action_post() {
        $model_for_users = Model::factory('user');
        $session = Session::instance();
        $user_session = $session->get('user');
        $author_name = $model_for_users->get_user_by_session_id($user_session);
        $view = View::factory('dashboard/write');
        $view->author = $author_name;

        if ($this->request->method() === Request::POST) {
            if (!Security::check($this->request->post('csrf_token'))) {

                throw new HTTP_Exception_401("Bad token!");
            }
            $title = $this->request->post('title');
            $slug = $this->request->post('slug');
            $introduction = $this->request->post('introduction');
            $content = $this->request->post('content');
            $author = $this->request->post('author');
            $category = $this->request->post('category');
            $date = time();
            if (empty($introduction) and empty($category) and empty($title) and empty($content) and empty($author) and empty($date)) {
                throw new Exception('Please don`t make empty fields!');
            }
            $model_for_posts = Model::factory('post');
            if(empty($slug)){
                $slug = URL::title($title, '_');
            }
            $insert_entry = $model_for_posts->insert_post($title,$slug,$category,$date,$author,$introduction,$content);
            if (!$insert_entry) {
                throw new Exception('Check if you are connected to database!');
            }
            $this->request->redirect('dashboard/posts/post');
        }
        $this->template->content = $view->render();
    }
    public function action_edit() {
        $post_id = $this->request->param('id');
        $view = View::factory('dashboard/edit');
        if (empty($post_id)) {
            throw new Exception('ID must not be empty!');
        }

        $model_for_posts = Model::factory('post');
        $post = $model_for_posts->get_post_by_id($post_id);
        if (!$post) {
            throw new Exception('Not found!');
        }
        if ($this->request->method() === Request::POST) {
             if (!Security::check($this->request->post('csrf_token'))) {

                throw new HTTP_Exception_401("Bad token!");
            }
            $post_title = $this->request->post('title');
            $post_introduction = $this->request->post('introduction');
            $post_content = $this->request->post('content');
            $update_post = $model_for_posts->update_post($post_title, $post_content,$post_introduction, $post_id);
            if (!$update_post) {
                throw new Exception('Check fields!');
            }
            Session::instance()->set('Entry.success', true);
            $this->request->redirect('dashboard/posts/edit/' . $post_id);
        }
        $view->posts = $post;
        $view->success = Session::instance()->get_once('Entry.success');
        $this->template->content = $view->render();
    }
    public function action_delete() {
        $post_id = $this->request->param('id');

        if (!$post_id) {
            throw new Exception('ID must not be empty!');
        }
        $model_for_posts = Model::factory('post');
         if (!Security::check($this->request->param('id2'))) {

                throw new HTTP_Exception_401("Bad token!");
            }
        $delete_post = $model_for_posts->delete_post($post_id);
        if (!$delete_post) {
            throw new Exception('Error with deleting entry!');
        }
        $this->request->redirect('dashboard/posts');
    }

}