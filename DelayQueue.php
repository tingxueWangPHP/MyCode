<?php
	class DelayQueue {
		
		public $table = "aa";
		
		public $timeStamp = "time";
		
		public $database_config = [
                'host'  => 'localhost',
                'port'  =>      3306,
                'user'  => 'root',
                'passwd'=>  '',
                'dbname'=>  'test',
        	];
		
		public function __construct() {
			include "./mysql.php";
			pcntl_async_signals(true);
			$this->registerAlrm();
			$this->registerUsr1();
		}
		
		public function start() {
			posix_kill(posix_getpid(), SIGALRM);
		}
		
		public function listen() {
			$info = [];
			pcntl_sigwaitinfo([SIGALRM, SIGUSR1], $info);
				
                	if ($info['signo'] == SIGUSR1) {
                        	call_user_func(pcntl_signal_get_handler(SIGUSR1));
                	}

                	if ($info['signo'] == SIGALRM) {
                        	call_user_func(pcntl_signal_get_handler(SIGALRM));
                	}
		}	
		
		public function registerAlrm() {
			pcntl_signal(SIGALRM, function(){
				$mysql = new MMysql($this->database_config);
				//消费
				$res = $mysql->_doQuery("select id from " . $this->table . " where status=0 and " . $this->timeStamp . "<=" . time());
				if ($res) {
						$ids = array_column($res,'id');
						$id = trim(implode(",", $ids), ',');

						echo $id, "---", time(), "\n";

						$mysql->doSql("update ".$this->table." set status=1 where id in (" . $id  . ")");

						$res = $mysql->_doQuery("select min(`".$this->timeStamp."`) as c from ".$this->table." where status=0");

						$time = $res[0]['c'];
						
						if ($time >= time()) {
								pcntl_alarm($time-time());
						} else {
								posix_kill(posix_getpid(), SIGALRM);
						}
					
						
				}
				$mysql->close();
				$this->listen();
			});
			
		}
		
		public function registerUsr1() {
			pcntl_signal(SIGUSR1, function() {
				$mysql = new MMysql($this->database_config);
				$res = $mysql->_doQuery("select min(`".$this->timeStamp."`) as c from ".$this->table." where status=0");
				$time = $res[0]['c'];
				$mysql->close();
				
				if ($time >= time()) {
						pcntl_alarm($time-time());
				} else {
						posix_kill(posix_getpid(), SIGALRM);
				}
				$this->listen();
			});
			
		}
	}
	
	(new DelayQueue)->start();


