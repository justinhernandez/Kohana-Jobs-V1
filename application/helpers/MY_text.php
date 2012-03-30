<?php defined('SYSPATH') or die('No direct script access.');

class text extends text_Core {

	/**
	 * Converts **bold text** to <strong>bold text</strong>.
	 *
	 * @param   string
	 * @return  string
	 */
	public static function strongify($str)
	{
		return preg_replace('~\*\*(?!\*)(.+?)\*\*~', '<strong>$1</strong>', $str);
	}

	/**
	 * Converts a number (0-99) to its written version. Example: 5 becomes "five".
	 * Larger or smaller numbers will be returned untouched.
	 *
	 * @param   integer
	 * @return  string|integer
	 */
	public static function num2str($num)
	{
		static $zero2nineteen = array
		(
			'zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine',
			'ten', 'eleven', 'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
		);

		static $twenty2ninety = array
		(
			2 => 'twenty', 'thirty', 'fourty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety'
		);

		// Done with invalid or out-of-range numbers
		if ( ! ctype_digit((string) $num) OR $num < 0 OR $num > 99)
			return $num;

		// 0-19 is hard-coded in the array
		if ($num < 20)
			return $zero2nineteen[$num];

		// Pull apart first and second digit
		$num = (string) $num;
		$str = $twenty2ninety[$num[0]];
		$str .= ($num[1] === '0') ? '' : '-'.$zero2nineteen[$num[1]];

		return $str;
	}
}
