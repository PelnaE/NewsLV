<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Home extends Controller_Template {

    public function action_index()
    {
        $view = View::factory('home/list');
        $model_for_posts = Model::factory('post');
        $get_news = $model_for_posts->get_all_published_posts("jaunumi");
        $view->news = $get_news;
        $get_articles = $model_for_posts->get_all_published_posts("raksti");
        $view->articles = $get_articles;
        $this->template->content = $view->render();
    }

} // End Welcome

