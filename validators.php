<?php

Validator::extend('alpha_spaces', function($attribute, $value)
{
    //return preg_match("/^([-a-z0-9_-ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöùúûüýøþÿÐdŒ-\s])+$/i", $value); 
    //return preg_replace('([^A-Za-z0-9])', '', $value);
	return preg_match('/^[\pL\s]+$/u', $value);
}); 