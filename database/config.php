<?php

$localhost_cleardb_url = "mysql://bdb849485101ff:4630a1b4@us-cdbr-iron-east-05.cleardb.net/heroku_acf8033b177f63a?reconnect=true";

if(!getenv("CLEARDB_DATABASE_URL")) {
	putenv("CLEARDB_DATABASE_URL=$localhost_cleardb_url");
}