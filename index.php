<?php
include "config/connect.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>FKU</title>
        <script type="text/javascript" src="assets/script/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="ajax.js"></script>
        <script type="text/javascript" src="todo.js"></script>
        <link rel="stylesheet" href="assets/stylesheet.css">
        <link rel="stylesheet" href="https://unpkg.com/flexboxgrid2@7.2.1/flexboxgrid2.min.css">
    </head>
    <body>
        <div class="wrapper">
            <!--Header-->
            <header class="header">
                <div class="header__content">
                    <div class="container">
                        <div class="header__body">
                            <div class="header__logo">
                                <img src="logo.svg" alt="Логотип" height=70px width=160px>
                            </div>
                            <div class="header__items">
                                <div class="header__team">
                                    <a href="#employees">Сотрудники</a>
                                </div>
                                <div class="header__vac">
                                    <a href="#vac">Отпуска</a>
                                </div>
                                <div class="header__todo">
                                    <a href="#todo">План задач</a>
                                </div>
                                <div class="header__game">
                                    <a href="game.html" target="_blank">Змейка</a>
                                </div>
                                <div class="header__register">
                                    <a href="register/index_register.php">Учетная запись</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <br>
            <h2 align="center">Сотрудники</h3>
            <p><a name="employees"></a></p> 
            <!--Search-->
            <div class="search">
                <div class="container">
                    <form action="vendor/search.php?go" method="post" class="search__form" id="searchform">
                        <input  type="text" name="name"> 
                        <input  type="submit" name="submit" id="search" value="Поиск по ФИО"> 
                    </form>
                </div>
            </div>
            <!--Main-->
            <div class="content">
                <div class="container">
                    <form action="vendor/update.php" method="post">
                        <table id="myTable" border="1" cellspacing="0" cellpadding="5">
                            <thead>
                                <tr>
                                    <th rowspan="3">id</th>
                                    <th rowspan="3">Структурное подразделение</th>
                                    <th rowspan="3">Должность</th>
                                    <th rowspan="3">ФИО</th>
                                    <th rowspan="3">Табельный номер</th>
                                    <th colspan="5">Отпуск</th>
                                    <th rowspan="3">Примечание</th>
                                </tr>
                                <tr>
                                    <th rowspan="2">Количество календарных дней</th>
                                    <th colspan="2">Дата</th>
                                    <th colspan="2">Перенесение отпуска</th>
                                </tr>
                                <tr>
                                    <th>Запланированная</th>
                                    <th>Фактическая</th>
                                    <th>Основание</th>
                                    <th>Предпологаемая</th>
                                </tr>
                            </thead>
                            <tbody id="tb">
                                <?php
                                $result = mysqli_query($con, "SELECT * FROM employees");
                                $result = mysqli_fetch_all($result);
                                $i = 0;
                                foreach ($result as $result) {
                                    ?>
                                    <tr>
                                        <td><input size="1" value="<?= $result[0] ?>" name="id[<?= $i ?>]"></td>
                                        <td><input size="12" value="<?= $result[1] ?>" name="td1[<?= $i ?>]"></td>
                                        <td><input size="12" value="<?= $result[2] ?>" name="td2[<?= $i ?>]"></td>
                                        <td><input size="12" value="<?= $result[3] ?>" name="td3[<?= $i ?>]"></td>
                                        <td><input size="12" value="<?= $result[4] ?>" name="td4[<?= $i ?>]"></td>
                                        <td><input size="15" value="<?= $result[5] ?>" name="td5[<?= $i ?>]"></td>
                                        <td><input size="15" value="<?= $result[6] ?>" name="td6[<?= $i ?>]"></td>
                                        <td><input size="12" value="<?= $result[7] ?>" name="td7[<?= $i ?>]"></td>
                                        <td><input size="15" value="<?= $result[8] ?>" name="td8[<?= $i ?>]"></td>
                                        <td><input size="15" value="<?= $result[9] ?>" name="td9[<?= $i ?>]"></td>
                                        <td><input size="12" value="<?= $result[10] ?>" name="td10[<?= $i ?>]"></td>
                                        <td><a href="vendor/employee.php?id=<?= $result[0] ?>">Посмотреть</a></td>
                                        <td><a style="color: red;" href="vendor/delete.php?id=<?= $result[0] ?>">Удалить</a></td>
                                    </tr>
                                    <?php
                                    $i = $i + 1;
                                }
                                ?>
                            </tbody>
                        </table>
                        <br>
                        <input type="submit" id="save" value="Сохранить таблицу">
                    </form>
                    <form action="vendor/export.php" method="post">
                        <input type="submit" value="Экспортировать">
                    </form>
                    <br>
                    <form action="vendor/add.php" method="post">
                        <input type="text" id="fio" name="fio">
                        <input type="submit" id="add" value="Добавить строку по ФИО" name=<?= $i ?>>
                    </form>
                    <br>
                    <h2 align="center">Отпуска</h3>
                    <p><a name="vac"></a></p> 
                    <form action="" method="post" id="ajax_form">
                        <div style="width:1200px; height:90px; overflow:auto;">
                            <table border="1">
                                <tr align="center" , class="month1", id="row11">
                                    <td rowspan="1">name</td>
                                    <td colspan="31">январь</td>
                                    <td colspan="28">февраль</td>
                                    <td colspan="31">март</td>
                                    <td colspan="30">апрель</td>
                                    <td colspan="31">май</td>
                                    <td colspan="30">июнь</td>
                                    <td colspan="31">июль</td>
                                    <td colspan="31">апрель</td>
                                    <td colspan="30">сентябрь</td>
                                    <td colspan="31">октябрь</td>
                                    <td colspan="30">ноябрь</td>
                                    <td colspan="31">декабрь</td>
                                </tr>
                                <tr align="center", class="days1" id="row12">
                                    <td>
                                        <select id="user1" name="select1">
                                            <option value="" selected disabled hidden>Выбери</option>
                                            <?php
                                            $res1 = mysqli_query($con, "SELECT * FROM employees");
                                            $res1 = mysqli_fetch_all($res1);
                                            foreach ($res1 as $res1) {
                                                ?>
                                                <option value="<?= $res1[0] ?>"><?= $res1[3] ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td>
                                    <td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td>
                                    <td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td>
                                    <td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td>
                                    <td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td>
                                    <td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td>
                                    <td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td>
                                    <td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td>
                                    <td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td>
                                    <td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td>
                                    <td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td>
                                    <td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td>
                                    <td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td>
                                    <td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td>
                                    <td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td>
                                    <td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td>
                                    <td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td>
                                    <td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td>
                                    <td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td>
                                    <td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td>
                                    <td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td>
                                    <td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td>
                                    <td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td>
                                    <td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td>
                                    <td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td>
                                    <td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td>
                                    <td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td>
                                    <td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td>
                                    <td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td>
                                    <td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td>
                                    <td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td>
                                    <td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td>
                                    <td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td>
                                    <td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td>
                                    <td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td>
                                    <td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td>
                                </tr>
                                <tr align="center ", class = "days2" id="row22">
                                    <td>
                                        <select id="user2" name="select2">
                                            <option value="" selected disabled hidden>Выбери</option>
                                            <?php
                                            $res2 = mysqli_query($con, "SELECT * FROM employees");
                                            $res2 = mysqli_fetch_all($res2);
                                            foreach ($res2 as $res2) {
                                                ?>
                                                <option value="<?= $res2[0] ?>"><?= $res2[3] ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td>
                                    <td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td>
                                    <td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td>
                                    <td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td>
                                    <td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td>
                                    <td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td>
                                    <td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td>
                                    <td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td>
                                    <td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td>
                                    <td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td>
                                    <td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td>
                                    <td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td>
                                    <td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td>
                                    <td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td>
                                    <td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td>
                                    <td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td>
                                    <td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td>
                                    <td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td>
                                    <td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td>
                                    <td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td>
                                    <td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td>
                                    <td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td>
                                    <td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td>
                                    <td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td>
                                    <td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td>
                                    <td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td>
                                    <td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td>
                                    <td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td>
                                    <td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td>
                                    <td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td>
                                    <td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td>
                                    <td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td>
                                    <td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td>
                                    <td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td>
                                    <td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td>
                                    <td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td><td>31</td>
                                </tr>
                            </table>
                        </div>
                        <input type="button" id="btn" value="Отправить" />
                    </form>
                    <div id="day1" hidden=""></div>
                    <div id="month1" hidden=""></div>
                    <div id="year1" hidden=""></div>
                    <div id="day2" hidden=""></div>
                    <div id="month2" hidden=""></div>
                    <div id="year2" hidden=""></div>
                    <div id="duration1" hidden=""></div>
                    <div id="duration2" hidden=""></div>
                    <br>
                    <!--TO-DO LIST-->
                    <div class="todo">
                        <p><a name="todo"></a></p> 
                        <h2 align="center">План задач</h3>
                        <form action="vendor/todo.php" method="post">
                            <input type="text" name="title" required>
                            <input type="submit" id="todo_add" value="Добавить">
                        </form>
                        <br>
                        <ul>
                            <?php

                            $todo_res = mysqli_query($con, "SELECT * FROM `to-do-list` ORDER BY `id` DESC");
                            $todo_res = mysqli_fetch_all($todo_res);

                            foreach($todo_res as $todo_res) {
                                echo '<div><li>'. $todo_res[1] .' <a href="vendor/todo_delete.php?id='.$todo_res[0].'" id="card-link-click">X</a></li>' . ' </div>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <br>
            </div>
        </div>
        <!---------------------------------------------Footer-------------------------------------------------->
        <footer class="footer">
            <div class="footer__section-1">
                <div class="section-1">
                    <div class="col-xs-12 col-md-4 col-lg-4">
                        <div class="section-1__item">
                            <a href="#">Обработка персональных данных</a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4 col-lg-4">
                        <div class="section-1__item">
                            <a href="#">© 2021 ФКУ</a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4 col-lg-4">
                        <div class="section-1__item">
                            <a href="#">Пользовательское соглашение</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>