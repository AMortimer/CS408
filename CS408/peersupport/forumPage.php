<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$query = mysql_query("SELECT * FROM forum WHERE  = " . $_GET['postid']) or die(mysql_error); 
