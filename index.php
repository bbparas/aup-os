<?php
/* index.php
	created by: Jewayson Gonzalgo
	created on: Aug 14, 2013
	last edited: Aug 18, 2013
	desc: Operating System Project

	Shortest Job First Preemptive sample
	
*/
?>

<!DOCTYPE html>
<html>
	<head>
		<title>OS SJF-P</title>
		<!--<link rel="stylesheet" type="text/css" href="css/ui.css" />-->
        <script type="text/javascript" src="js/os.js"></script>
	</head>
	<body>
        <br/>
		<div class="application">
            <h1>Operating System Project</h1>
            <div class="parameters">
                <table border="1">
                    <tr>
                        <th>Run Type</th>
                        <th>Number of Jobs</th>
                        <th>Quantum</th>
                        <th>Submit</th>
                    </tr>
                    <tr>
                        <td>
                            <select>
                                <option value="fcfs">FCFS</option>
                                <option value="sjfnp">SJF-NP</option>
                                <option value="sjfp">SJF-P</option>
                                <option value="pnp">P-NP</option>
                                <option value="pp">P-P</option>
                                <option value="rr">RR</option>
                            </select>
                        </td>
                        <td>
                            <select>
                                <option value=1>1</option>
                                <option value=2>2</option>
                                <option value=3>3</option>
                                <option value=4>4</option>
                                <option value=5>5</option>
                                <option value=6>6</option>
                                <option value=7>7</option>
                                <option value=8>8</option>
                                <option value=9>9</option>
                                <option value=10>10</option>
                                <option value=11>11</option>
                            </select>
                        </td>
                        <td>
                            <input type="text"/>
                        </td>
                        <td>
                            <button>Proceed</button>
                        </td>
                    </tr>
                </table>
            </div>
            <br/>
            <div class="job-input">
                <table border="1">
                    <tr>
                        <th>Job Name</th>
                        <th>Arrival Time</th>
                        <th>Burst Time</th>
                        <th>Priority</th>
                    </tr>
                </table>
            </div>
            <button>RUN</button>
            <div>
                <p>test here</p>
                <?php
                    include('autoload.php');
                    
                    $jobq = new JobQueue();
                    
                    $job1 = new Job();
                    $job1->name = 1;
                    $job1->arrival = 2;
                    $job1->burst = 5;
                    $job1->priority = 0;
                    $jobq->insertJob($job1);
                    
                    $job2 = new Job();
                    $job2->name = 2;
                    $job2->arrival = 5;
                    $job2->burst = 3;
                    $job2->priority = 0;
                    $jobq->insertJob($job2);
                    $jobq->viewQueue();
                    
                    $readyq = new ReadyQueue($jobq);
                    
                    if($readyq->checkArrivedJob(2)) {
                        echo "there is one!";
                    }
                    
                ?>
                
            </div>
        </div>
	</body>
</html>