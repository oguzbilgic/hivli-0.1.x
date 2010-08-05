<?php

class Core_Controller_Base extends Core_Controller
{
		function initBase()
		{			
			$this->view = new Object();
		}
		

		function initStart()
		{
			
		}
		
		function initStop()
		{
			$viewParams = $this->view->get(); 
			if(!empty($viewParams))
			{
				$this->View->setViewParamFromArray($viewParams);	
			}
		}

		function preRender()
		{
			
		}
	
		function postRender()
		{
			
		}

		function preRoute()
		{
			
		}
	
		function postRoute()
		{
			
		}
		
		
}
