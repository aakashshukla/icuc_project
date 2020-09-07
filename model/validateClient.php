<?php
	include_once '../model/ValidateClient.php';

	class ValidateClient {

		public static function validate($client) {
			$validation = "";

			$validation .= self::validateFirstName($client->first_name);
			$validation .= self::validateLastName($client->last_name);
			$validation .= self::validateAddress($client->address);
			$validation .= self::validatePhoneNumber($client->phone_number);
			$validation .= self::validateAssignedLawyer($client->assigned_lawyer);

			return $validation;

		}

		private static function validateFirstName($first_name) {
			if($first_name == null || empty($first_name) || strlen($first_name) < 3) {
				return "Client First Name should be at least 3 characters long. ";
			}
		}

		private static function validateLastName($last_name) {
			if($last_name == null || empty($last_name) || strlen($last_name) < 3) {
				return "Client Last Name should be at least 3 characters long. ";
			}
		}

		private static function validateAddress($address) {
			if($address == null || empty($address) || strlen($address) < 3) {
				return "Client address should be at least 3 characters long. ";
			}
		}

		private static function validatePhoneNumber($phone_number) {
			if(!preg_match("/^[1-9]{1}[0-9]{2}-[0-9]{3}-[0-9]{4}$/", $phone_number)) {
				return "Phone Number should be in ***-***-**** format. ";
			}
		}

		private static function validateAssignedLawyer($assigned_lawyer) {
			if($assigned_lawyer == null || empty($assigned_lawyer) || strlen($assigned_lawyer) < 3) {
				return "Assigned Lawyer Name should be at least 3 characters long. ";
			}
		}
	}
?>