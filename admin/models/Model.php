<?php
	interface Model
	{
		public function __construct($pdo);
		
		public function create();
		
		public function remove($id);
		
		public function update($id);
	}