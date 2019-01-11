<?php
use App\Library\GetFunction;

function getUserNameById($user_id){
	return GetFunction::userById($user_id);
}