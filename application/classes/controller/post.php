<?php defined('SYSPATH') or die('Fuck you!');

class Controller_Post extends Controller_Template{
    public function action_index(){
        $post_id = $this->request->param('id');
        $slug = $this->request->param('slug');
        if (!$post_id) {
            $this->request->redirect('/');
        }

        $model_for_posts = Model::factory('post');
        $get_post = $model_for_posts->get_post_by_id($post_id);
        if (!$get_post) {
            $this->request->redirect('/');
        }
        $view = View::factory('home/post');
        $view->posts = $get_post;
        $this->template->content = $view->render();
    }
}

