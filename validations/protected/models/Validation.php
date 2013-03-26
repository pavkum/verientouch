<?php

/*
 *
 * Author : Pavan
 *
 */	

class Validation {


	public function verifyAuthorizationKey($aut,$lin){
		return EmailValidator::validate($aut,$lin);
	}

}
