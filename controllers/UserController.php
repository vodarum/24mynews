<?php

require_once ROOT . '/models/User.php';

class UserController extends Controller
{
        public function __construct()
        {
                return parent::__construct();
        }

        public function actionLogin()
        {
                header('Content-Type: application/json');

                $emailLogin = '';
                $passwordLogin = '';

                $emailLogin = $_POST['email'];
                $passwordLogin = $_POST['password'];

                $errors = false;
                $errorsFields = false;

                /* Валидация формы */
                if (!User::checkEmail($emailLogin)) {
                        $errors[] = 'Неправильный email';
                        $errorsFields[] = 'emailLogin';
                }
                if (!User::checkPassword($passwordLogin)) {
                        $errors[] = 'Пароль не должен быть короче 6-ти символов и должен содержать символы верхнего и нижнего регистров, цифры и специальные символы';
                        $errorsFields[] = 'passwordLogin';
                }


                if (!empty($errorsFields)) {
                        $response = [
                                "status" => false,
                                'type' => 1,
                                'errors_fields' => $errorsFields,
                                'errors' => $errors,
                                'message' => 'Проверьте правильность заполнения полей'
                        ];

                        echo json_encode($response);

                        die();
                }

                /* $password = md5($password); */

                /* Проверка существования пользователя */
                /* $userId = User::checkUserData($email, $password); */
                $user = User::checkUserData($emailLogin, $passwordLogin);

                if ($user == false) {
                        /* Если введённые данные неправильные, показываем ошибку */
                        $errors[] = 'Неправильные данные для входа на сайт';

                        $response = [
                                'status' => false,
                                'type' => 2,
                                'message' => 'Неправильные данные для входа на сайт'
                        ];
                } else {
                        /* Если введённые данные правильные, запоминаем пользователя в сессию */
                        User::auth($user);

                        $response = [
                                'status' => true,
                                'valueLayout' => [
                                        'nameClass' => 'h-menu__logout-link',
                                        'pathImg' => '/template/img/core-img/logout.svg',
                                        'textP' => 'Выйти'
                                ]
                        ];
                }

                echo json_encode($response);

                return true;
        }

        public function actionLogout()
        {
                header('Content-Type: application/json');

                unset($_SESSION['user']);

                $response = [
                        'status' => true,
                        'valueLayout' => [
                                'nameClass' => 'h-menu__login-link',
                                'pathImg' => '/template/img/core-img/login.svg',
                                'textP' => 'Войти'
                        ]
                ];

                echo json_encode($response);

                return true;
        }

        public function actionRegister()
        {
                header('Content-Type: application/json');

                $nameUser = '';
                $surnameUser = '';
                $emailReg = '';
                $passwordReg = '';
                $passwordConfirm = '';

                $nameUser = $_POST['name'];
                $surnameUser = $_POST['surname'];
                $emailReg = $_POST['email'];
                $passwordReg = $_POST['password'];
                $passwordConfirm = $_POST['passwordConfirm'];

                $errors = false;
                $errorsFields = false;

                /* Валидация формы */
                if (!User::checkName($nameUser)) {
                        $errors[] = 'Имя не должно быть короче 2-х символов';
                        $errorsFields[] = 'nameUser';
                }
                if (!User::checkSurname($surnameUser)) {
                        $errors[] = 'Фамилия не должна быть короче 2-х символов';
                        $errorsFields[] = 'surnameUser';
                }
                if (!User::checkEmail($emailReg)) {
                        $errors[] = 'Проверьте адрес почты';
                        $errorsFields[] = 'emailReg';
                }
                if (!User::checkPassword($passwordReg)) {
                        $errors[] = 'Пароль не должен быть короче 6-ти символов и должен содержать символы верхнего и нижнего регистров, цифры и специальные символы';
                        $errorsFields[] = 'passwordReg';
                }
                if (!User::checkPasswordConfirm($passwordConfirm, $passwordReg)) {
                        $errors[] = 'Пароли, которые Вы ввели, не совпадают';
                        $errorsFields[] = 'passwordConfirm';
                }

                if (!empty($errorsFields)) {
                        $response = [
                                "status" => false,
                                'type' => 1,
                                'errors_fields' => $errorsFields,
                                'errors' => $errors,
                                'message' => 'Проверьте правильность заполнения полей'
                        ];

                        echo json_encode($response);

                        die();
                }

                /* $password = md5($password); */


                /* Проверка существования пользователя */
                // $user = User::checkUserData($emailReg, $passwordReg = false);
                $user = User::checkEmailExists($emailReg);

                if ($user) {
                        /* Если в БД найдено хотя бы одно совпадение по email, значит, показываем ошибку */
                        $errors[] = 'Пользователь с таким email существует';

                        $response = [
                                'status' => false,
                                'type' => 2,
                                'message' => 'Пользователь с таким email существует'
                        ];
                } else {
                        /* Если введённые данные правильные, заносим пользователя в БД */
                        User::register($nameUser, $surnameUser, $emailReg, $passwordReg);

                        $response = [
                                'status' => true
                        ];
                }

                echo json_encode($response);

                return true;
        }
}
