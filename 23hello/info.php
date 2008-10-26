
<?php
// MODEL
class NewsModel{
    public function __construct($data_array){
        foreach($data_array as $k => $v){
            $this->$k = $v;
        }
    }

    public function isValid(){
        if ((int)$this->news_valid) {
            if (($this->news_validfrom == '0000-00-00 00:00:00')&&
            ($this->news_validto == '0000-00-00 00:00:00')) {
                return true;
            } else if (($this->news_validfrom == '0000-00-00 00:00:00')&&
            (time()<strtotime($this->news_validto))) {
                return true;
            } else if (($this->news_validto == '0000-00-00 00:00:00')&&
            (time()>strtotime($this->news_validfrom))) {
                return true;
            } else if ((time()>strtotime($this->news_validfrom))&&
            (time()<strtotime($this->news_validto))) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
class NewsModelDao {
    public function findAllNews(){
        $query = "SELECT * FROM my_news";
        $result = mysql_query($query)
            or die("B³±d zapytania : " . mysql_error());
        $result_arr = array();
        while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
            $result_arr[] = new NewsModel($line);
        }
        mysql_free_result($result);
        return $result_arr;
    }
}
  require_once('error_handler.php');

  require_once('config.php');
  
  $mysql = new mysql_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
  $query = 'SELECT user_id, user_name FROM users';
  $result = $mysql->query($query);
   while ($row = $result->fetch_array(MYSQLI_ASSOC))
    {
    $user_id = $row['user_id'];
    $user_id = $row['user_name'];
    echo 'Nazwa u¿ytku #' . $user_id . 'to ' . $user_name . '<BR/>';
    };
   $result->clouse();
    $mysqli->clouse();
   ?>
