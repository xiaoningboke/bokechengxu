<?php
namespace Admin\Model;
use Think\Model;
use Admin\Model\ArticleModel;
class CommentModel extends Model {

	/**
	 * 查找给文章下面的评论
	 * @param  [type] $article_id [description]
	 * @return [type]             [description]
	 */
	public function selArticle($article_id){
		$comment = M("Comment");
		$data = $comment->order('id DESC')->where("article_id=$article_id")->select();
		return $data;
	}

	/**
	 * 查询10条评论
	 * @return [type] [description]
	 */
	public function selTen(){
		$comment = M("Comment");
	    $tenComment = $comment->order('id DESC')->limit(10)->select();
	    return $tenComment;
	}
}