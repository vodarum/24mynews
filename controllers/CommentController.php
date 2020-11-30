<?php

require_once ROOT . '/models/Comment.php';

class CommentController extends Controller
{
        public function __construct()
        {
                return parent::__construct();
        }

        public function actionView()
        {
                header('Content-Type: text/html');

                if ($_POST['event'] == 'login') {
                        require(ROOT . '/views/reload/clickable.php');
                } else {
                        require(ROOT . '/views/reload/unclickable.php');
                }

                return true;
        }

        public function actionSubmit()
        {
                header('Content-Type: application/json');

                $user_id = '';
                $text = '';
                $news_id = '';
                $in_reply_id = '';

                if (isset($_SESSION['user'])) {
                        $user_id = $_SESSION['user']['id'];
                } else {
                        /* Чтобы комментировать, авторизуйтесь или зарегистрируйтесь */
                        die();
                }

                $text = $_POST['text'];
                $in_reply_id = $_POST['in_reply_id'];

                if (isset($_SESSION['news_id'])) {
                        $news_id = $_SESSION['news_id'];
                } else {
                        /* Перейдите на страницу с новостью, которую хотите прокомментировать */
                        die();
                }

                $submitComment = Comment::submitComment($user_id, $text, $news_id, $in_reply_id);

                if ($submitComment) {
                        $response = [
                                'status' => true,
                                'message' => 'Комментарий отправлен'
                        ];
                } else {
                        $response = [
                                'status' => false,
                                'message' => 'При отправке комментария произошла ошибка'
                        ];
                }

                echo json_encode($response);

                return true;
        }

        public function actionAppend()
        {
                header('Content-Type: text/html');

                if (isset($_SESSION['user'])) {
                        $user_id = $_SESSION['user']['id'];
                } else {
                        /* Чтобы комментировать, авторизуйтесь или зарегистрируйтесь */
                        die();
                }

                if (isset($_SESSION['news_id'])) {
                        $news_id = $_SESSION['news_id'];
                } else {
                        // Перейдите на страницу с новостью, которую хотите прокомментировать
                        die();
                }

                $data['last_comment'] = Comment::getLastComment($news_id, $user_id);
                $data['comments'] = Comment::getComments($news_id);


                if (count($data['comments']) > 1) {
                        require(ROOT . '/views/reload/append.php');
                } else {
                        require(ROOT . '/views/reload/comments.php');
                }

                return true;
        }

        public function actionCount()
        {
                header('Content-Type: text/html');

                if (isset($_SESSION['news_id'])) {
                        $news_id = $_SESSION['news_id'];
                } else {
                        // Перейдите на страницу с новостью, которую хотите прокомментировать
                        die();
                }

                $countComments = Comment::getCountComments($news_id);

                require(ROOT . '/views/reload/count.php');

                return true;
        }

        public function actionGet()
        {
                header('Content-Type: text/html');

                if (isset($_SESSION['news_id'])) {
                        $news_id = $_SESSION['news_id'];
                } else {
                        // Перейдите на страницу с новостью, которую хотите прокомментировать
                        die();
                }

                $data['comments'] = Comment::getComments($news_id);

                require(ROOT . '/views/reload/comments.php');

                return true;
        }

        public function actionUpdate()
        {
                header('Content-Type: text/html');

                $comment_id = $_POST['comment_id'];
                $text = $_POST['text'];

                if (isset($_SESSION['news_id'])) {
                        $news_id = $_SESSION['news_id'];
                } else {
                        // Перейдите на страницу с новостью, которую хотите прокомментировать
                        die();
                }

                $updateComment = Comment::updateComment($comment_id, $text);

                if (!$updateComment) {
                        return false;
                }

                $data = array();
                $data['comments'] = Comment::getComments($news_id);

                require(ROOT . '/views/reload/comments.php');

                return true;
        }

        public function actionDelete()
        {
                header('Content-Type: text/html');

                $data = array();
                $comment_id = $_POST['comment_id'];

                Comment::deleteComment($comment_id);

                if (isset($_SESSION['news_id'])) {
                        $news_id = $_SESSION['news_id'];
                } else {
                        // Перейдите на страницу с новостью, которую хотите прокомментировать
                        die();
                }

                $data['comments'] = Comment::getComments($news_id);

                require(ROOT . '/views/reload/comments.php');

                return true;
        }

        public function actionReply()
        {
                header('Content-Type: text/html');

                $data = array();
                $data['in_reply_id'] = $_POST['in_reply_id'];
                $data['in_reply_author'] = $_POST['in_reply_author'];
                $data['in_reply_text'] = $_POST['in_reply_text'];

                require(ROOT . '/views/reload/reply.php');

                return true;
        }

        public function actionReaction()
        {
                header('Content-Type: application/json');

                $user_id = '';
                $comment_id = '';
                $user_reaction = '';
                $reactions = array();

                if (isset($_SESSION['user'])) {
                        $user_id = $_SESSION['user']['id'];
                        $comment_id = $_POST['comment_id'];
                        $user_reaction = $_POST['user_reaction'];
                } else {
                        /* Чтобы оценить комментарий, авторизуйтесь или зарегистрируйтесь */
                        die();
                }

                if (Comment::reactComment($user_id, $comment_id, $user_reaction)) {
                        $reactions = Comment::countReactComment($comment_id);
                        $response = [
                                'status' => true,
                                'message' => 'Оценка поставлена',
                                'likes' => $reactions['likes_count'],
                                'dislikes' => $reactions['dislikes_count'],
                        ];
                } else {
                        $response = [
                                'status' => false,
                                'message' => 'При оценке комментария произошла ошибка'
                        ];
                }

                echo json_encode($response);

                return true;
        }
}
