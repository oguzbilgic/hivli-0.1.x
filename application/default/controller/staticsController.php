<?php
class staticsController extends Core_Controller_Base{
	function indexAction(){
		$searchClass = new Search;
		$searches = $searchClass->select(NULL,NULL, NULL, array('id', 'DESC'));
		for ($i = 30; $i >= 0; $i--) {
			$number = 0;
			$date1  = mktime(0, 0, 0, date("m")  , date("d")-$i+1, date("Y"));
		 	$date2  = mktime(0, 0, 0, date("m")  , date("d")-$i, date("Y"));
			foreach ($searches as $search){
				if ($search['date_added'] <= $date1 && $search['date_added'] >= $date2){
					$number++;
				}
			}
			$searchStats[$i] = $number;
		}
			
		$this->view->searchStats = $searchStats;
		
		
		$userClass = new User;
		$users = $userClass->select(NULL,NULL, NULL, array('id', 'DESC'));
		$number = 0;
		for ($i = 30; $i >= 0; $i--) {
			$number = 0;
			$date1  = mktime(0, 0, 0, date("m")  , date("d")-$i+1, date("Y"));
		 	$date2  = mktime(0, 0, 0, date("m")  , date("d")-$i, date("Y"));
			foreach ($users as $user){
				if ($user['date_added'] <= $date1 && $user['date_added'] >= $date2){
					$number++;
				}
			}
			$userStats[$i] = $number;
		}
			
		$this->view->userStats = $userStats;
	}
}