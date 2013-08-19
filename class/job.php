<?php
    /*  job.php
        author: Jewayson Gonzalgo
        created: Aug 17, 2013
        updated: Aug 17, 2013
        desc: Job objects
    */
    
    class Job {
        
        protected $_column = array();
        protected $_data = array();
        
        function Job() {
            $this->_column = array("name", "arrival", "burst", "priority");
        }    
        
        function showJobInfo() {
            $job = "";
            foreach($this->_column as $col) {
                $job .= $col." -> ".$this->_data[$col]."<br/>";
            }
            return $job;
        }
        
        function minusBurstTime() { //can be transferred to cpu later
            $this->_data['burst']--;
        }
        
        function __get($key) {
            if(in_array($key, $this->_column) && isset($this->_data[$key])) {
                return $this->_data[$key];
            }
            echo "error: column doesn exist or value is not yet set job.php<br/>";
        }
        
        function __set($column, $value) {
            if(in_array($column, $this->_column) && !isset($this->_data[$column])) {
                $this->_data[$column] = $value;
            }
            else {
                echo "error: column dont exist or value is already set job.php<br/>";
            }
        }
        
    }
?>
