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
}