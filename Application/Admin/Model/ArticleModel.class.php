<?php
namespace Admin\Model;
use Think\Model;
class ArticleModel extends Model {

	/**
	 * 添加文章
	 * @param [type] $data [description]
	 */
	public function addArticle($data){
		$article = M("Article");
		$i = $article->add($data);
		return $i;
	}

	/**
	 * 查找单个文章的数据
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function findArticle($id){
		$article = M("Article");
		$data = $article->where("id = $id")->find();
		return $data;
	}

	/**
	 * 修改文章的数据
	 * @param [type] $data [description]
	 */
	public function exitArticle($data){
		$id = $data["id"];
		$article = M("Article");
		$i = $article->where("id = $id")->save($data);
		return $i;
	}

	/**
	 * 删除文章数据
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function delarticle($id){
		$article = M("Article");
		$i = $article->where("id = $id")->delete();
		return $i;
	}
}