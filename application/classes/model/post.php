<?php
class Model_Post extends Model {
	public function insert_post($title,
								$slug,
								$category,
								$date,
								$author,
								$introduction,
								$content){
		return $query = DB::insert('posts',
				array('title',
					'slug',
					'category',
					'date',
					'author',
					'introduction',
					'content'))
			->values(array($title,
							$slug,
							$category,
							$date,
							$author,
							$introduction,
							$content))
			->execute();
	}

	public function get_all_published_posts($category){
		return $query = DB::select()
			->from('posts')
			->where('category', '=', $category)
			->order_by('id', 'DESC')
			->execute()
			->as_array();
	}

	public function get_post_by_id($id){
		return $query = db::select()
			->from('posts')
			->where('id','=',array($id))
			->as_object()
			->execute();
	}

	public function update_post($title,
								$content,
								$introduction,
								$id){
		$query = DB::update('posts')
			->set(array(
				'title'=>$title,
				'content'=>$content,
				'introduction'=>$intro))
			->where('id','=',$id)
			->execute();
	}

	public function get_post_list(){
		return $query = DB::select()
			->from('posts')
			->order_by('id','DESC')
			->execute()
			->as_array();
	}

	public function delete_post($id){
		return $query = db::delete('posts')
			->where('id','=',array($id))
			->execute();
	}
}
