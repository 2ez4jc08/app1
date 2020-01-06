<?php
namespace Mai;

use PDO;
use PDOException;

class Sql {

    protected $_dbHandle;
    protected $_result;
    protected $fields = '';
    protected $where = '';
    protected $order = '';
    protected $join = '';
    protected $limit = '';

    public function connect($host, $username, $password, $dbname, $dbtype, $dsn)
    {   
      
        if($dbtype === 'mysql')
        {
            try{
                $dsn = sprintf("mysql:host=%s;dbname=%s;charset=utf8",$host,$dbname);
                $option = array(
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                );
                $this->_dbHandle = new PDO($dsn, $username, $password, $option);
            }catch(PDOException $e){
                // exit('Connection Failed' . $e->getMessage());
                exit("SERVER ERROR TRY AGAIN LATER");
            }
        }else if($dbtype === 'sqlite'){
            try{
                $this->_dbHandle = new PDO($dsn);
            }catch(PDOException $e){
                // exit('Connection Failed' . $e->getMessage());
                exit("SERVER ERROR TRY AGAIN LATER");
            }
        }
        
    }

    public function DbHandle()
    {
		return $this->_dbHandle;
	}
	
    public function ClearFields()
    {
		$this->fields = '';
    }

    public function ClearWhere()
    {
		$this->where = '';
    }

    public function ClearOrder()
    {
		$this->order = '';
    }

    public function ClearJoin()
    {
		$this->join = '';
    }

    public function ClearLimit()
    {
		$this->limit = '';
    }

    public function ClearAll()
    {
        $this->ClearFields();
        $this->ClearWhere();
        $this->ClearOrder();
        $this->ClearJoin();
        $this->ClearLimit();
    }
    
    public function beginTransaction()
    {
		$this->_dbHandle->beginTransaction();
	}
	
    public function commit()
    {
		$this->_dbHandle->commit();
	}
	
    public function rollBack()
    {
		$this->_dbHandle->rollBack();
	}
    
    public function fields($fields = array())
	{
		if(isset($fields)) {
            $this->fields .= $fields;
		}
		return $this;
    }
    
    public function where($where = array())
    {
		if (isset($where)) {
			$this->where .= ' WHERE ' . $where;
		}
		return $this;
	}
	
	public function order($order = array())
	{
		if(isset($order)) {
            $this->order .= ' ORDER BY ' . $order;
    }
		return $this;
    }
    
    public function join($join = array())
	{
		if(isset($join)) {
            $this->join .= $join;
		}
		return $this;
    }
    
    public function limit($limit = array())
	{
		if(isset($limit)) {
            $this->limit .= ' LIMIT ' . $limit;
		}
		return $this;
	}
    
    

}