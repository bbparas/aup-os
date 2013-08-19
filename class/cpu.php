<?php
    /*  cpu.php
        author: Jewayson Gonzalgo
        created: Aug 17, 2013
        updated: Aug 18, 2013
        desc: cpu class, main os object
        
    */
    
    class CPU {
        protected $_readyQueue;
        protected $_activeJob = array();
        
        function CPU(ReadyQueue $readyQueue) {
            echo "started CPU<br/>";
            $this->_readyQueue = $readyQueue;
        }
        
        function runCPU() {
            echo "<h3>CPU Run</h3><hr/>";
            $time = 0;
            
            while(!($this->_readyQueue->getJobQueue()->isEmpty()) || !($this->_readyQueue->isEmpty()) || !($this->isEmptyActiveJob())) {
                echo "<hr/><b>time: {$time}</b><br/>";
                
                
                if($time == 10)
                    break;
                    
                $this->showAllActivity();
                $time++;
            }
        }
        
        function sendJobBack() {
            if(!($this->isEmptyActiveJob())) {
                $this->_readyQueue->insertJob($this->_activeJob);
                unset($this->_activeJob);    
            }
        }
        
        function isEmptyActiveJob() {
            if(empty($this->_activeJob)) {
                return true;
            }
            else {
                return false;
            }
        }
        
        function showActiveJob() { //debug purpose 
            if(!empty($this->_activeJob)) {
                $this->_activeJob->showJobInfo();    
            }
            
        }
        
        function showAllActivity() { //debug purpose only
            $table = "<table border=1>
                        <tr>
                            <th>Active Job</th>
                            <th>Ready Queue</th>
                            <th>Job Queue</th>
                        </tr>";
            $table .= "<tr>";
            $table .= "<td>".$this->showActiveJob()."</td>";
            $table .= "<td>".$this->_readyQueue->viewQueue()."</td>";
            $table .= "<td>".$this->_readyQueue->getJobQueue()->viewQueue()."</td>";
            $table .= "</tr>";
            $table .= "</table>";
            echo $table;
        }
        
    }
?>
