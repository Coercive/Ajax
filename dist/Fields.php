<?php
namespace Coercive\Utility\Ajax;

use ReflectionClass;

/**
 * Class Fields
 *
 * List of settings fields
 *
 * @author  	Anthony Moral <contact@coercive.fr>
 * @copyright   2021 Anthony Moral
 * @license 	MIT
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed
 * with this source code.
 */
class Fields
{
	const FIELD_ID = 'id';
	const FIELD_CODE = 'code';
	const FIELD_CLASS = 'class';
	const FIELD_STATUS = 'status';
	const FIELD_LANGUAGE = 'language';
	const FIELD_NAME = 'name';
	const FIELD_TYPE = 'type';
	const FIELD_EVENT = 'event';
	const FIELD_EVENT_TYPE = 'event_type';
	const FIELD_SURTITLE = 'surtitle';
	const FIELD_TITLE = 'title';
	const FIELD_SUBTITLE = 'subtitle';
	const FIELD_LABEL = 'label';
	const FIELD_MESSAGE = 'message';
	const FIELD_MESSAGE_HEADER = 'message_header';
	const FIELD_MESSAGE_FOOTER = 'message_footer';
	const FIELD_MESSAGE_SIGNATURE = 'message_signature';
	const FIELD_MESSAGE_LINK = 'message_link';
	const FIELD_DISMISS = 'dismiss';
	const FIELD_DISMISSL_LABEL = 'dismiss_label';
	const FIELD_CANCEL = 'cancel';
	const FIELD_CANCEL_LABEL = 'cancel_label';
	const FIELD_CONFIRM = 'confirm';
	const FIELD_CONFIRM_LABEL = 'confirm_label';
	const FIELD_CLOSE = 'close';
	const FIELD_CLOSE_LABEL = 'close_label';
	const FIELD_OPEN = 'open';
	const FIELD_OPEN_LABEL = 'open_label';
	const FIELD_NEXT = 'next';
	const FIELD_NEXT_LABEL = 'next_label';
	const FIELD_PREVIOUS = 'previous';
	const FIELD_PREVIOUS_LABEL = 'previous_label';
	const FIELD_CURRENT = 'current';
	const FIELD_CURRENT_LABEL = 'current_label';
	const FIELD_FIRST = 'first';
	const FIELD_FIRST_LABEL = 'first_label';
	const FIELD_LAST = 'last';
	const FIELD_LAST_LABEL = 'last_label';
	const FIELD_RELOAD = 'reload';
	const FIELD_RELOAD_TYPE = 'reload_type';
	const FIELD_RELOAD_METHOD = 'reload_method';
	const FIELD_REDIRECT = 'redirect';
	const FIELD_NEXT_URL = 'next_url';
	const FIELD_TIMEOUT = 'timeout';
	const FIELD_DELAY = 'delay';
	const FIELD_INTERVAL = 'interval';
	const FIELD_ERROR_TITLE = 'error_title';
	const FIELD_ERROR_MESSAGE = 'error_message';
	const FIELD_ERROR_CODE = 'error_code';
	const FIELD_HTML = 'html';
	const FIELD_DATAS = 'datas';
	const FIELD_CONFIGS = 'configs';
	const FIELD_ITEMS = 'items';
	const FIELD_OPTIONS = 'options';
	const FIELD_TEXTS = 'texts';
	const FIELD_LOGS = 'logs';

	/**
	 * Export constants list for current class and extended
	 *
	 * @return array
	 */
	static public function getConstants(): array
	{
		static $classes = null;
		if(null === $classes) {
			$reflectionClass = new ReflectionClass(static::class);
			$classes = $reflectionClass->getConstants();
		}
		return $classes;
	}
}