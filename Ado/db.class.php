<?php
    require_once("./configuration.php");   //�������ó����ļ�
    date_default_timezone_set(TIMEZONE); 
    /**
     * ������DB
     * ˵�������ݿ������
     */
    class DB
    {
        public $host;            //������
        public $username;        //���ݿ��û���
        public $password;        //��������
        public $dbname;          //���ݿ���
        public $conn;            //���ݿ����ӱ���
        /**
         * DB�๹�캯��
         */
        public function DB($host=DB_HOST ,$username=DB_USER,$password=DB_PASSWORD,$dbname=DB_NAME)
        {
            $this->host = $host;
            $this->username = $username;
            $this->password = $password;
            $this->dbname = $dbname;
             
        }
        /**
         * �����ݿ�����
         */
        public function open()
        {
            $this->conn = mysql_connect($this->host,$this->username,$this->password);
            mysql_select_db($this->dbname);
            mysql_query("SET CHARACTER SET utf8");
        }
        /**
         * �ر���������
         */
        public function close()
        {
            mysql_close($this->conn);
        }
        /**
         * ͨ��sql����ȡ����
         * @return: array()
         */
        public function getObjListBySql($sql)
        {
            $this->open();
            $rs = mysql_query($sql,$this->conn);
            $objList = array();
            while($obj = mysql_fetch_object($rs))
            {
                if($obj)
                {
                    $objList[] = $obj;
                }
            }
            $this->close();
            return $objList;
        }
        /**
         * �����ݿ���в�������
         * @param��$table,����
         * @param��$columns,�������������ֶ��������顣Ĭ�Ͽ����飬����ȫ�������ֶ���
         * @param��$values,������Ӧ�����ֶε�����ֵ������
         */
        public function insertData($table,$columns=array(),$values=array())
        {
            $sql = 'insert into '.$table .'( ';
            for($i = 0; $i < sizeof($columns);$i ++)
            {
                $sql .= $columns[$i];
                if($i < sizeof($columns) - 1)
                {
                    $sql .= ',';
                }
            }
            $sql .= ') values ( ';
            for($i = 0; $i < sizeof($values);$i ++)
            {
                $sql .= "'".$values[$i]."'";
                if($i < sizeof($values) - 1)
                {
                    $sql .= ',';
                }
            }
            $sql .= ' )';
            $this->open();
            mysql_query($sql,$this->conn);
            $id = mysql_insert_id($this->conn);
            $this->close();
            return $id;
        }
        /**
         * ͨ�����е�ĳһ���Ի�ȡ����
         */
        public function getDataByAtr($tableName,$atrName,$atrValue){
            @$data = $this->getObjListBySql("SELECT * FROM ".$tableName." WHERE $atrName = '$atrValue'");
            if(count($data)!=0)return $data;
            return NULL;   
            }
        /**
         * ͨ�����е�"id"��ɾ����¼
         */
         public function delete($tableName,$atrName,$atrValue){
             $this->open();
             $deleteResult = false;
             if(mysql_query("DELETE FROM ".$tableName." WHERE $atrName = '$atrValue'")) $deleteResult = true;
             $this->close();
             if($deleteResult) return true;
             else return false;
             }
        /**
         * ���±��е�����ֵ
         */
         public function updateParamById($tableName,$atrName,$atrValue,$key,$value){
            $db = new DB();
            $db->open();
            if(mysql_query("UPDATE ".$tableName." SET $key = '$value' WHERE $atrName = '$atrValue' ")){  //$key��Ҫ������
                $db->close();
                return true;
            }
            else{
                $db->close();
                return false;
            }
         }
        /*
         * @description: ȡ��һ��table������������
         * @param: $tbName ����
         * @return���ַ�������
         */
        public function fieldName($tbName){
            $resultName=array();
            $i=0;
            $this->open();
            $result = mysql_query("SELECT * FROM $tbName");
            while ($property = mysql_fetch_field($result)){
                $resultName[$i++]=$property->name;
                }
            $this->close();
            return $resultName;
            }
    }
?>