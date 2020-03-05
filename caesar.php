#!/usr/bin/php -d display_errors
<?php

class Caesar {
	public static $numbersToLetters = array(
	0 	=> 'A',
	1 	=> 'B',
	2 	=> 'C',
	3 	=> 'D',
	4 	=> 'E',
	5 	=> 'F',
	6 	=> 'G',
	7 	=> 'H',
	8	=> 'I',
	9 	=> 'J',
	10 	=> 'K',
	11 	=> 'L',
	12	=> 'M',
	13	=> 'N',
	14	=> 'O',
	15	=> 'P',
	16	=> 'Q',
	17	=> 'R',
	18	=> 'S',
	19	=> 'T',
	20	=> 'U',
	21  => 'V',
	22	=> 'W',
	23  => 'X',
	24  => 'Y',
	25	=> 'Z'
	);

	public static $lettersToNumbers = array(
	'A'	=> 0,
	'B'	=> 1,
	'C' => 2,
	'D'	=> 3,
	'E'	=> 4,
	'F'	=> 5,
	'G' => 6,
	'H'	=> 7,
	'I' => 8,
	'J'	=> 9,
	'K'	=> 10,
	'L'	=> 11,
	'M'	=> 12,
	'N'	=> 13,
	'O'	=> 14,
	'P'	=> 15,
	'Q'	=> 16,
	'R'	=> 17,
	'S'	=> 18,
	'T'	=> 19,
	'U'	=> 20,
	'V' => 21,
	'W'	=> 22,
	'X' => 23,
	'Y' => 24,
	'Z'	=> 25
	);




	/**
	 * The shift
	 */
	public $shift_key = 3;

	/**
	 * Encrypts the plaintext using the shift key, and returns the ciphertext (in all caps).
	 */
	public function encrypt($plaintext) {
		//Capitalize all the characters
		$plaintext = strtoupper($plaintext);  // see https://www.php.net/manual/en/function.strtoupper.php
		//convert the string to an array, and then loop over the
		$plaintext = str_split ($plaintext); // going to seperate ever letter //see https://www.php.net/manual/en/function.str-split.php
												//also see https://www.php.net/manual/en/function.explode.php

		//var_dump($plaintext); //Debug code  uncomment to see the array

		$cyphertext = array(); //create an empty array for our cyphertext

		//temporary variables for our script.  This is inelegant, but easy to follow.
		$tmp_plain_num = 0;
		$tmp_crypt_num = 0;
		foreach ($plaintext as $char) {
			//check to make sure we have a letter.  If we do not, just stick it in the cyphertext unencrypted.
			if(ctype_alpha($char)) {
				$tmp_plain_num = self::$lettersToNumbers[$char]; //gets the number
				/**
				 *	In php, mod takes precedence over addition, so we need parenthesis.  What would happen without them?
				 */
				$tmp_crypt_num = ($tmp_plain_num + $this->shift_key) % 26; //  See https://www.php.net/manual/en/language.operators.precedence.php for php's PEMDAS

				/**
				 *	In php (as opposed to some other languages), we can append an element to the end of an array
				 *   by simply leaving the index empty.
				 */
				$cyphertext[] = self::$numbersToLetters[$tmp_crypt_num]; //encrypt the letter, and append it to the array.
			} else {
				$cyphertext[] = $char; //stick the non-letter in.
			}
		}

		//var_dump($cyphertext); //Debug code  Uncomment to see the array

		$cyphertext = implode($cyphertext); //convert back to a string.  See https://www.php.net/manual/en/function.implode.php

		return($cyphertext);
	}



//start
	public function decrypt($cyphertext) {
//we will use this statement to start decryption of cyphertext
 	//converts the string into an array of characters
 	$cyphertext = str_split ($cyphertext);

	//var_dump($cyphertext); //Debug code  uncomment to see the array

	$plaintext = array(); //creates an empty array for the plaintext


	//temporary variables for our script.
	$tmp_cipher_num = 0;//** Starting at 0
	$tmp_decrypt_num = 0;//**
	foreach ($cyphertext as $char) {
		//check to make sure we have a letter.  If we do not, just stick it in the
		//cyphertext unencrypted.
		if(ctype_alpha($char)) {
			$tmp_cipher_num = self::$lettersToNumbers[$char]; /*gets the letter from
			*the encrypted numbers.
			*/
			$tmp_decrypt_num = ($tmp_cipher_num - $this->shift_key + 26) % 26; // this
			/** is taking the encrypted cipher and decrypting it. // taking the cypher
			* number and turning it into the encrypted number
			*E.g. 'B'=>1 so you would take (1 -($this=the_shift_key=3)+26 ) % 26 to
			*get to the number 24.
			*/
			$plaintext[] = self::$numbersToLetters[$tmp_decrypt_num]; //decrypt the
			//letter or changing the number to its corresponding letter, and appending
			// it to the array.
			//e.g. instead of outputing the number 24 in the above example, the answer
			// would be letter 'y' because it is at position 24
		} else {
		$plaintext[] = $char; //stick the letter in plaintext
		}
	}
	//var_dump($plaintext);// debug code

$plaintext = implode($plaintext);// going to split the array

$plaintext = strtolower($plaintext); /** turning uncrypted plaintext to
*lowercase letters
*/
		return ($plaintext);
	}
}
