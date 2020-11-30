<?php

class Comment extends Model
{
    public static function submitComment($user_id, $text, $news_id, $in_reply_id)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO comment(user_id, text, news_id, in_reply_id) VALUES (:user_id, :text, :news_id, :in_reply_id)';

        $result = $db->prepare($sql);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $result->bindParam(':text', $text, PDO::PARAM_STR);
        $result->bindParam(':news_id', $news_id, PDO::PARAM_INT);

        if ($in_reply_id) {
            $result->bindParam(':in_reply_id', $in_reply_id, PDO::PARAM_INT);
        } else {
            $result->bindParam(':in_reply_id', $in_reply_id, PDO::PARAM_NULL);
        }

        if ($result->execute()) {
            return true;
        }

        return false;
    }

    /* Метод, получающий все комментарии к одной новости */

    public static function getComments($news_id)
    {
        $db = Db::getConnection();
        $comments = array();

        $sql = 'SELECT comment.id AS id, user.id AS user_id, CONCAT_WS(\' \', user.name, user.surname) user, '
            . 'user.email AS user_email, DATE_FORMAT(submit_date, "%d.%m.%Y, %H.%i") AS submit_date, text, news_id, '
            . 'in_reply_id FROM comment JOIN user ON comment.news_id=:news_id AND user.id=comment.user_id';

        $result = $db->prepare($sql);
        $result->bindParam(':news_id', $news_id, PDO::PARAM_INT);
        $result->execute();

        $i = 0;
        while ($row = $result->fetch()) {

            $comments[$i]['id'] = $row['id'];
            $comments[$i]['user_id'] = $row['user_id'];
            $comments[$i]['user'] = $row['user'];
            $comments[$i]['user_email'] = $row['user_email'];
            $comments[$i]['submit_date'] = $row['submit_date'];
            $comments[$i]['text'] = $row['text'];
            $comments[$i]['news_id'] = $row['news_id'];
            $comments[$i]['in_reply_id'] = $row['in_reply_id'];
            $comments[$i]['likes_count'] = Comment::countReactComment($row['id'])['likes_count'];
            $comments[$i]['dislikes_count'] = Comment::countReactComment($row['id'])['dislikes_count'];

            $i++;
        }

        return $comments;
    }


    /* Метод, получающий последний комментарий к новости */

    public static function getLastComment($news_id, $user_id)
    {
        $db = Db::getConnection();
        $lastComment = array();

        $sql = 'SELECT comment.id AS id, user.id AS user_id, CONCAT_WS(\' \', user.name, user.surname) user, '
            . 'user.email AS user_email, DATE_FORMAT(submit_date, "%d.%m.%Y, %H.%i") AS submit_date, text, news_id, '
            . 'in_reply_id FROM comment JOIN user ON comment.id=(SELECT MAX(id) FROM comment WHERE news_id=:news_id '
            . 'AND comment.user_id=:user_id) AND comment.user_id=user.id';

        $result = $db->prepare($sql);
        $result->bindParam(':news_id', $news_id, PDO::PARAM_INT);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $result->execute();

        $row = $result->fetch();

        $lastComment['id'] = $row['id'];
        $lastComment['user_id'] = $row['user_id'];
        $lastComment['user'] = $row['user'];
        $lastComment['user_email'] = $row['user_email'];
        $lastComment['submit_date'] = $row['submit_date'];
        $lastComment['text'] = $row['text'];
        $lastComment['news_id'] = $row['news_id'];
        $lastComment['in_reply_id'] = $row['in_reply_id'];
        $lastComment['likes_count'] = Comment::countReactComment($row['id'])['likes_count'];
        $lastComment['dislikes_count'] = Comment::countReactComment($row['id'])['dislikes_count'];

        return $lastComment;
    }

    public static function getCountComments($news_id)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM comment WHERE news_id=:news_id';

        $result = $db->prepare($sql);
        $result->bindParam(':news_id', $news_id, PDO::PARAM_INT);
        $result->execute();

        return $result->rowCount();
    }

    public static function reactComment($user_id, $comment_id, $user_reaction)
    {
        if ($user_reaction == 'like') {
            $is_positive = 1;
        } else {
            $is_positive = 0;
        }

        $db_Select = Db::getConnection();

        /* Проверяем наличие лайка/дизлайка пользователя по паре "user_id-comment_id" */

        $sql_Select = 'SELECT is_positive FROM reaction WHERE user_id=:user_id AND comment_id=:comment_id';

        $result_Select = $db_Select->prepare($sql_Select);

        $result_Select->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $result_Select->bindParam(':comment_id', $comment_id, PDO::PARAM_INT);
        $result_Select->execute();
        $valueIsPos = $result_Select->fetch();

        if (!$valueIsPos) {

            /* Если совпадения нет, тогда выполняем запись лайка/дизлайка в таблицу */

            $db_Insert = Db::getConnection();
            $sql_Insert = 'INSERT INTO reaction (user_id, comment_id, is_positive) VALUES (:user_id, :comment_id, :is_positive)';

            $result_Insert = $db_Insert->prepare($sql_Insert);

            $result_Insert->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $result_Insert->bindParam(':comment_id', $comment_id, PDO::PARAM_INT);
            $result_Insert->bindParam(':is_positive', $is_positive, PDO::PARAM_INT);

            return $result_Insert->execute();
        } else {

            /* Если совпадение есть, тогда проверяем, отличается ли текщая оценка (лайк/дизлайк) от поставленной ранее */

            if ($is_positive == $valueIsPos['is_positive']) {

                /* Если настоящая оценка совпадает с поставленной ранее, выполняем удаление записи */

                $db_Delete = Db::getConnection();
                $sql_Delete = 'DELETE FROM reaction WHERE user_id=:user_id AND comment_id=:comment_id';

                $result_Delete = $db_Delete->prepare($sql_Delete);

                $result_Delete->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                $result_Delete->bindParam(':comment_id', $comment_id, PDO::PARAM_INT);

                return $result_Delete->execute();
            } else {

                /* Если настоящая оценка совпадает с поставленной ранее, выполняем изменение записи */

                $db_Update = Db::getConnection();
                $sql_Update = 'UPDATE reaction SET is_positive=:is_positive WHERE user_id=:user_id AND comment_id=:comment_id';

                $result_Update = $db_Update->prepare($sql_Update);

                $result_Update->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                $result_Update->bindParam(':comment_id', $comment_id, PDO::PARAM_INT);
                $result_Update->bindParam(':is_positive', $is_positive, PDO::PARAM_INT);

                return $result_Update->execute();
            }
        }
    }

    public static function countReactComment($comment_id)
    {
        $db = Db::getConnection();
        $reactions = array();

        $sql_likes = 'SELECT is_positive FROM reaction WHERE comment_id=:comment_id AND is_positive=1';
        $result_likes = $db->prepare($sql_likes);
        $result_likes->bindParam(':comment_id', $comment_id, PDO::PARAM_INT);
        $result_likes->execute();

        $likes_count = $result_likes->rowCount();

        if ($likes_count) {
            $reactions['likes_count'] = $likes_count;
        } else {
            $reactions['likes_count'] = '';
        }

        $sql_dislikes = 'SELECT is_positive FROM reaction WHERE comment_id=:comment_id AND is_positive=0';
        $result_dislikes = $db->prepare($sql_dislikes);
        $result_dislikes->bindParam(':comment_id', $comment_id, PDO::PARAM_INT);
        $result_dislikes->execute();

        $dislikes_count = $result_dislikes->rowCount();

        if ($dislikes_count) {
            $reactions['dislikes_count'] = $dislikes_count;
        } else {
            $reactions['dislikes_count'] = '';
        }

        return $reactions;
    }

    public static function updateComment($id, $text)
    {
        $db = Db::getConnection();
        $sql = 'UPDATE comment SET submit_date=CURRENT_TIMESTAMP, text=:text WHERE id=:id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':text', $text, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function deleteComment($id)
    {
        $db = Db::getConnection();
        $sql = 'DELETE FROM comment WHERE id=:id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();
    }
}
