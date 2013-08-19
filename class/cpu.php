<?php
    /*  cpu.php
        author: Jewayson Gonzalgo
        created: Aug 17, 2013
        updated: Aug 18, 2013
        desc: cpu class, main os object
        
    */
    
    class CPU {
        protected $_readyQueue;
        protected $_activeJob;
        
        function CPU(ReadyQueue $readyQueue) {
            echo "started CPU<br/>";
            $this->_readyQueue = $readyQueue;
        }
        
        //main processing of the SJF-P process
        function runCPU() {
            echo "<h3>CPU Run</h3><hr/>";
            $time = 0;
            
            while(!($this->_readyQueue->getJobQueue()->isEmpty()) || !($this->_readyQueue->isEmpty()) || !($this->isEmptyActiveJob())) {
                echo "<hr/><b>time: {$time}</b><br/>";
                
                if($this->_readyQueue->checkArrivedJob($time)) {
                    $this->sendJobBack();
                }
                
                $this->_readyQueue->transferJob($time);
                
                $this->activeJobListener();
                
                if($this->isEmptyActiveJob()) {
                    $this->_activeJob = $this->_readyQueue->sendJob();    
                }
                if(!($this->isEmptyActiveJob())){
                    $this->_activeJob->minusBurstTime();
                    
                }
                
                $this->showAllActivity();
                
                $this->activeJobListener();
                $time++;
            }
            echo "all jobs are ended at <b>time {$time}</b>, CPU terminated<br/>";
        }
        
        function sendJobBack() {
            if(!($this->isEmptyActiveJob())) {
                $this->_readyQueue->insertJob($this->_activeJob);
                echo "send job {$this->_activeJob->name} back to ready queue since there arrived new job<br/>";
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
        
        function activeJobListener() {
            if(!($this->isEmptyActiveJob())) {
                if($this->_activeJob->burst == 0) {
                    echo "job {$this->_activeJob->name} burst is 0, unsetting in cpu<br/>";
                    unset($this->_activeJob);
                }    
            }
                
        }
        
        function showActiveJob() { //debug purpose 
            if(!empty($this->_activeJob)) {
                return $this->_activeJob->showJobInfo();    
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
