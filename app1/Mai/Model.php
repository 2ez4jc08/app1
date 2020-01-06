<?php
namespace Mai;
use ReflectionClass;
use ReflectionProperty;

class Model extends Sql {

    private $_table;
    protected static $_dbConfig = [];

    public function __construct()
    {
        $this->connect(
            self::$_dbConfig['host'],
            self::$_dbConfig['username'],
            self::$_dbConfig['password'],
            self::$_dbConfig['dbname'],
            self::$_dbConfig['dbtype'],
            self::$_dbConfig['dsn']
        );

        if(!$this->_table){
            $this->_model = str_replace('\\','/', get_class($this));
            $this->_table = strtolower(basename($this->_model));
        }
    }

    public static function setDbConfig($config)
    {
        self::$_dbConfig = $config;
    }
    
    public function select($where = null, $fields = null, $join = null, $order = null, $limit = null)
	{
        if(isset($where) && !empty($where)){
            $this->ClearWhere();
            $this->where($where);
        }
        if(isset($fields) && !empty($fields)){
            $this->ClearFields();
            $this->fields($fields);
        }
        if(isset($join) && !empty($join)){
            $this->ClearJoin();
            $this->join($join);
        }
        if(isset($order) && !empty($order)){
            $this->ClearOrder();
            $this->order($order);
        }
        if(isset($limit) && !empty($limit)){
            $this->ClearLimit();
            $this->limit($limit);
        }



		$sql = sprintf(" SELECT %s FROM `%s` %s %s %s %s ", $this->fields, $this->_table, $this->join, $this->where, $this->order, $this->limit);
		// echo $sql;
        $select = $this->_dbHandle->prepare($sql);
        $select->execute();

		$this->ClearAll();
        
        return $select->fetchAll();
    }
    
    public function insert(array $data)
    {
        $fields = array();
        $values = array();
        foreach($data as $key => $val){
            $fields[] = sprintf('`%s`', $key);
            $values[] = sprintf(':%s', $key);
        }

        $field = implode(',',$fields);
        $value = implode(',',$values);
       
        $sql = sprintf("INSERT INTO `%s` (%s)VALUES(%s)", $this->_table, $field, $value);
        $insert = $this->_dbHandle->prepare($sql);
        
        foreach($data as $key => $value){
            $insert->bindValue(":$key", $value);
        }
        $this->ClearAll();

        return $insert->execute();
        
    }

    public function update(array $data, $where = null)
    {
        if(isset($where) && !empty($where)){
            $this->ClearWhere();
            $this->where($where);
        }

        $fields = array();

        foreach($data as $key => $val){
            $fields[] =  sprintf("`%s` = :%s", $key, $key);
        }
        
        $sql = sprintf("UPDATE `%s` SET %s %s", $this->_table, implode(',',$fields), $this->where);
        $update = $this->_dbHandle->prepare($sql); 

        foreach($data as $key => $val){
            $update->bindValue(":$key", $val);
        }
        
        $this->ClearAll();
        return $update->execute();

    }

    public function delete($where = null)
    {
        if(isset($where) && !empty($where)){
            $this->ClearFilter();
            $this->where($where);
        }

        $sql = sprintf(" DELETE FROM `%s` %s", $this->_table);

        $this->ClearAll();

        return $this->_dbHandle->exec($sql);
    }
	
}