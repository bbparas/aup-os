<?php
    /*  job.php
        author: Jewayson Gonzalgo
        created: Aug 17, 2013
        edited: Aug 17, 2013
        desc: Job objects
    */
    
    class Job {
        
        private $_jobName;
        private $_burstTime;
        private $_arrivalTime;
        private $_priority;
        
        function Job($jobName, $arrivalTime, $burstTime, $priority = null) {
            $this->_arrivalTime = $arrivalTime;
            $this->_burstTime = $burstTime;
            $this->_priority = $priority;
        }    
    }
?>
