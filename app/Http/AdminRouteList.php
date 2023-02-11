<?php
// To implement in admingroups permissions
// to remove CRUD from Validation remove route name
return [
	
	"dashboard" => [ 'read'],
	"Department" => ['create', 'read', 'update', 'delete'],
	"Member" => ['create', 'read', 'update', 'delete'],
	"suppliers" => ['create', 'read', 'update', 'delete'],
	"warehouses" => ['create', 'read', 'update', 'delete'],
	"currency" => ['create', 'read', 'update', 'delete'],
	"tax" => ['create', 'read', 'update', 'delete'],
		"TypesOfExpenses" => ['create', 'read', 'update', 'delete'],
	"expenses" => ['create', 'read', 'update', 'delete'],

	
	"receipt" => ['create', 'read', 'update', 'delete'],
	"CatchReceipt" => ['create', 'read', 'update', 'delete'],
	"invioce" => ['create', 'read', 'update', 'delete'],
	
	"adminShowCities" => ['create', 'read', 'update', 'delete'],

	 	"subCity" =>  ['create', 'read', 'update', 'delete'],
   	"subsubCity" =>  ['create', 'read', 'update', 'delete'],
   	
	"AdminNotifications" => ['create', 'read', 'update', 'delete'],
	 
	"admins" => ['create', 'read', 'update', 'delete'],
	"AdminGroup" => ['create', 'read', 'update', 'delete'],
	
];	