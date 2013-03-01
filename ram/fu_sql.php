start<br><?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class db_mysql{

    public $connect 	= NULL;
private $SQL_SERVER 	= 'my40.szu.pl';
private $SQL_ADMIN 	= 'bornkesws';
private $SQL_PASSWORD 	= 'lo5ksgol208';
private $SQL_DBAZA 	= 'bornkesws';

   public function __construct(){ echo '<hr>construktor<hr>';
        $this->connect = mysql_connect(
                                $this->SQL_SERVER,
                                $this->SQL_ADMIN,
                                $this->SQL_PASSWORD);
        if ($this->connect)
           mysql_select_db($this->SQL_DBAZA, $this->connect);
    }

    public function __destruct(){
        if(is_resource($this->connect)) {
            mysql_close($this->connect);
        }
    }
    public function info(){
       if (!$this->connect)
          echo 'niema po³aczenia';
       else
          echo 'jest Po³aczenie';
    }

    public function select($Zapytanie){
      //  if($obiekt instanceof Zapytania)
       //       $Zapytanie = $obiekt->DropZap();
       // else     return false;

        if (!$this->connect) return false;

        $result = ( mysql_query($Zapytanie) );
        while ($row = mysql_fetch_assoc($result)) {
            $a[] = $row;
		}
        return $a;
    }
};


echo 'test';

$mysql = new db_mysql;
echo 'po wywolaniu';

//print_r($mysql->select('SELECT * FROM `list_user`'));

/*
$mysql->disconnect();

//*/