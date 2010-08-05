<?php

class Core_Plugin_Base extends Core_Plugin 
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
			
		function getOrderNumber()
		{
			return $this->_orderNumber;
		}
}