<?php
namespace Coercive\Utility\Ajax;

use Coercive\Utility\HeaderStatus\HeaderStatus;

/**
 * Ajax Response
 *
 * Preset JSON Ajax export response layout
 *
 * @author  	Anthony Moral <contact@coercive.fr>
 * @copyright   2021 Anthony Moral
 * @license 	MIT
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed
 * with this source code.
 */
class Response
{
	/**
	 * List of settings fields
	 *
	 * @var string
	 */
	const FIELD_ID = 'id';
	const FIELD_CODE = 'code';
	const FIELD_CLASS = 'class';
	const FIELD_STATUS = 'status';
	const FIELD_LANGUAGE = 'language';
	const FIELD_NAME = 'name';
	const FIELD_TYPE = 'type';
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
	const FIELD_OPTIONS = 'options';
	const FIELD_TEXTS = 'texts';
	const FIELD_LOGS = 'logs';

	/**
	 * Reload options
	 *
	 * @var string|string[]
	 */
	const RELOAD_TYPE_CONTENT = 'content';
	const RELOAD_TYPE_PAGE = 'page';
	const RELOAD_TYPE_HARD = 'hard';
	const RELOAD_TYPES = [
		self::RELOAD_TYPE_CONTENT,
		self::RELOAD_TYPE_PAGE,
		self::RELOAD_TYPE_HARD,
	];
	const RELOAD_METHOD_AUTO = 'auto';
	const RELOAD_METHOD_USER = 'user';
	const RELOAD_METHODS = [
		self::RELOAD_METHOD_AUTO,
		self::RELOAD_METHOD_USER,
	];

	# CONFIG

	/** @var bool */
	protected $skipNull = true;

	/** @var array */
	protected $defaultRequiredFields = [];

	/** @var array */
	protected $requiredFields = [];

	/** @var int */
	protected $successHttpResponseCode = 200;

	/** @var int */
	protected $failureHttpResponseCode = 500;

	# DEFAULT OPTIONS

	/** @var string */
	protected $defaultId = null;

	/** @var string */
	protected $defaultCode = null;

	/** @var string */
	protected $defaultClass = null;

	/** @var string */
	protected $defaultLanguage = null;

	/** @var string */
	protected $defaultType = null;

	/** @var string */
	protected $defaultName = null;

	/** @var string */
	protected $defaultSuccessSurtitle = null;

	/** @var string */
	protected $defaultFailureSurtitle = null;

	/** @var string */
	protected $defaultSuccessTitle = null;

	/** @var string */
	protected $defaultFailureTitle = null;

	/** @var string */
	protected $defaultSuccessSubtitle = null;

	/** @var string */
	protected $defaultFailureSubtitle = null;

	/** @var string */
	protected $defaultSuccessLabel = null;

	/** @var string */
	protected $defaultFailureLabel = null;

	/** @var string */
	protected $defaultSuccessMessage = null;

	/** @var string */
	protected $defaultFailureMessage = null;

	/** @var string */
	protected $defaultSuccessMessageHeader = null;

	/** @var string */
	protected $defaultFailureMessageHeader = null;

	/** @var string */
	protected $defaultSuccessMessageFooter = null;

	/** @var string */
	protected $defaultFailureMessageFooter = null;

	/** @var string */
	protected $defaultSuccessMessageSignature = null;

	/** @var string */
	protected $defaultFailureMessageSignature = null;

	/** @var string */
	protected $defaultSuccessMessageLink = null;

	/** @var string */
	protected $defaultFailureMessageLink = null;

	/** @var string */
	protected $defaultSuccessDismissLabel = null;

	/** @var string */
	protected $defaultFailureDismissLabel = null;

	/** @var string */
	protected $defaultSuccessCancelLabel = null;

	/** @var string */
	protected $defaultFailureCancelLabel = null;

	/** @var string */
	protected $defaultSuccessConfirmLabel = null;

	/** @var string */
	protected $defaultFailureConfirmLabel = null;

	/** @var string */
	protected $defaultSuccessCloseLabel = null;

	/** @var string */
	protected $defaultFailureCloseLabel = null;

	/** @var string */
	protected $defaultSuccessOpenLabel = null;

	/** @var string */
	protected $defaultFailureOpenLabel = null;

	/** @var string */
	protected $defaultSuccessNextLabel = null;

	/** @var string */
	protected $defaultFailureNextLabel = null;

	/** @var string */
	protected $defaultSuccessPreviousLabel = null;

	/** @var string */
	protected $defaultFailurePreviousLabel = null;

	/** @var string */
	protected $defaultSuccessCurrentLabel = null;

	/** @var string */
	protected $defaultFailureCurrentLabel = null;

	/** @var string */
	protected $defaultSuccessFirstLabel = null;

	/** @var string */
	protected $defaultFailureFirstLabel = null;

	/** @var string */
	protected $defaultSuccessLastLabel = null;

	/** @var string */
	protected $defaultFailureLastLabel = null;

	# MAIN OPTIONS

	/** @var string */
	protected $id = null;

	/** @var string */
	protected $code = null;

	/** @var string */
	protected $class = null;

	/** @var string */
	protected $language = null;

	/** @var string */
	protected $type = null;

	/** @var string */
	protected $name = null;

	/** @var string */
	protected $eventType = null;

	/** @var bool */
	protected $status = null;

	/** @var string */
	protected $surtitle = null;

	/** @var string */
	protected $title = null;

	/** @var string */
	protected $subtitle = null;

	/** @var string */
	protected $label = null;

	/** @var string */
	protected $message = null;

	/** @var string */
	protected $messageHeader = null;

	/** @var string */
	protected $messageFooter = null;

	/** @var string */
	protected $messageSignature = null;

	/** @var string */
	protected $messageLink = null;

	/** @var bool */
	protected $dismiss = null;

	/** @var string */
	protected $dismissLabel = null;

	/** @var bool */
	protected $cancel = null;

	/** @var string */
	protected $cancelLabel = null;

	/** @var bool */
	protected $confirm = null;

	/** @var string */
	protected $confirmLabel = null;

	/** @var bool */
	protected $close = null;

	/** @var string */
	protected $closeLabel = null;

	/** @var bool */
	protected $open = null;

	/** @var string */
	protected $openLabel = null;

	/** @var bool */
	protected $next = null;

	/** @var string */
	protected $nextLabel = null;

	/** @var bool */
	protected $previous = null;

	/** @var string */
	protected $previousLabel = null;

	/** @var bool */
	protected $current = null;

	/** @var string */
	protected $currentLabel = null;

	/** @var bool */
	protected $first = null;

	/** @var string */
	protected $firstLabel = null;

	/** @var bool */
	protected $last = null;

	/** @var string */
	protected $lastLabel = null;

	/** @var bool */
	protected $reload = null;

	/** @var string */
	protected $reloadType = null;

	/** @var string */
	protected $reloadMethod = null;

	/** @var bool */
	protected $redirect = null;

	/** @var string */
	protected $nextUrl = null;

	/** @var int */
	protected $timeout = null;

	/** @var int */
	protected $delay = null;

	/** @var int */
	protected $interval = null;

	/** @var string */
	protected $error_title = null;

	/** @var string */
	protected $error_message = null;

	/** @var int */
	protected $error_code = null;

	/** @var string */
	protected $html = null;

	# ADDITIONAL INFORMATIONS

	/** @var array */
	protected $datas = [];

	/** @var array */
	protected $configs = [];

	/** @var array */
	protected $options = [];

	/** @var array */
	protected $texts = [];

	/** @var array */
	protected $logs = [];

	# COMPILING JSON STATUS

	/** @var bool An error occured when build data as json */
	private $jsonLastErrorStatus = false;

	/** @var int json error code for debug */
	private $jsonLastErrorCode = 0;

	/** @var string json error message for debug */
	private $jsonLastErrorMessage = '';

	/**
	 * Export full data, or only setted data
	 *
	 * @param bool $status
	 * @return $this
	 */
	public function skipNull(bool $status): Response
	{
		$this->skipNull = $status;
		return $this;
	}

	/**
	 * @param array $fields
	 * @return $this
	 */
	public function defaultRequiredFields(array $fields): Response
	{
		$this->defaultRequiredFields = $fields;
		return $this;
	}

	/**
	 * @param array $fields
	 * @return $this
	 */
	public function requiredFields(array $fields): Response
	{
		$this->requiredFields = $fields;
		return $this;
	}

	/**
	 * Set HTTP response code (for automatic send)
	 *
	 * @param int $success
	 * @param int $failure
	 * @return $this
	 */
	public function httpResponseCodes(int $success = 200, int $failure = 500): Response
	{
		$this->successHttpResponseCode = $success;
		$this->failureHttpResponseCode = $failure;
		return $this;
	}

	/**
	 * Reinitialize the current instance
	 * but not the default settings
	 * and not the config settings
	 *
	 * @return $this
	 */
	public function reset(): Response
	{
		$this->id = null;
		$this->code = null;
		$this->class = null;
		$this->language = null;
		$this->type = null;
		$this->name = null;
		$this->eventType = null;
		$this->status = null;
		$this->surtitle = null;
		$this->title = null;
		$this->subtitle = null;
		$this->label = null;
		$this->message = null;
		$this->messageHeader = null;
		$this->messageFooter = null;
		$this->messageSignature = null;
		$this->messageLink = null;
		$this->dismiss = null;
		$this->dismissLabel = null;
		$this->cancel = null;
		$this->cancelLabel = null;
		$this->confirm = null;
		$this->confirmLabel = null;
		$this->close = null;
		$this->closeLabel = null;
		$this->open = null;
		$this->openLabel = null;
		$this->next = null;
		$this->nextLabel = null;
		$this->previous = null;
		$this->previousLabel = null;
		$this->current = null;
		$this->currentLabel = null;
		$this->first = null;
		$this->firstLabel = null;
		$this->last = null;
		$this->lastLabel = null;
		$this->reload = null;
		$this->reloadType = null;
		$this->reloadMethod = null;
		$this->redirect = null;
		$this->nextUrl = null;
		$this->timeout = null;
		$this->delay = null;
		$this->interval = null;
		$this->datas = [];
		$this->options = [];
		$this->texts = [];
		$this->logs = [];
		$this->error_title = null;
		$this->error_message = null;
		$this->error_code = null;
		$this->html = null;

		$this->requiredFields = [];
		$this->jsonLastErrorStatus = false;
		$this->jsonLastErrorCode = 0;
		$this->jsonLastErrorMessage = '';

		return $this;
	}

	/**
	 * Export settings as array
	 *
	 * @return array
	 */
	public function array(): array
	{
		$arr = [
			static::FIELD_ID => $this->id ?? $this->defaultId,
			static::FIELD_CODE => $this->code ?? $this->defaultCode,
			static::FIELD_CLASS => $this->class ?? $this->defaultClass,
			static::FIELD_STATUS => $this->status,
			static::FIELD_LANGUAGE => $this->language ?? $this->defaultLanguage,
			static::FIELD_TYPE => $this->type ?? $this->defaultType,
			static::FIELD_NAME => $this->name ?? $this->defaultName,
			static::FIELD_EVENT_TYPE => $this->eventType,
			static::FIELD_SURTITLE => $this->surtitle ?? ($this->status ? $this->defaultSuccessSurtitle : $this->defaultFailureSurtitle),
			static::FIELD_TITLE => $this->title ?? ($this->status ? $this->defaultSuccessTitle : $this->defaultFailureTitle),
			static::FIELD_SUBTITLE => $this->subtitle ?? ($this->status ? $this->defaultSuccessSubtitle : $this->defaultFailureSubtitle),
			static::FIELD_LABEL => $this->label ?? ($this->status ? $this->defaultSuccessLabel : $this->defaultFailureLabel),
			static::FIELD_MESSAGE => $this->message ?? ($this->status ? $this->defaultSuccessMessage : $this->defaultFailureMessage),
			static::FIELD_MESSAGE_HEADER => $this->messageHeader ?? ($this->status ? $this->defaultSuccessMessageHeader : $this->defaultFailureMessageHeader),
			static::FIELD_MESSAGE_FOOTER => $this->messageFooter ?? ($this->status ? $this->defaultSuccessMessageFooter : $this->defaultFailureMessageFooter),
			static::FIELD_MESSAGE_SIGNATURE => $this->messageSignature ?? ($this->status ? $this->defaultSuccessMessageSignature : $this->defaultFailureMessageSignature),
			static::FIELD_MESSAGE_LINK => $this->messageLink ?? ($this->status ? $this->defaultSuccessMessageLink : $this->defaultFailureMessageLink),
			static::FIELD_DISMISS => $this->dismiss,
			static::FIELD_DISMISSL_LABEL => $this->dismissLabel ?? ($this->status ? $this->defaultSuccessDismissLabel : $this->defaultFailureDismissLabel),
			static::FIELD_CANCEL => $this->cancel,
			static::FIELD_CANCEL_LABEL => $this->cancelLabel ?? ($this->status ? $this->defaultSuccessCancelLabel : $this->defaultFailureCancelLabel),
			static::FIELD_CONFIRM => $this->confirm,
			static::FIELD_CONFIRM_LABEL => $this->confirmLabel ?? ($this->status ? $this->defaultSuccessConfirmLabel : $this->defaultFailureConfirmLabel),
			static::FIELD_CLOSE => $this->close,
			static::FIELD_CLOSE_LABEL => $this->closeLabel ?? ($this->status ? $this->defaultSuccessCloseLabel : $this->defaultFailureCloseLabel),
			static::FIELD_OPEN => $this->open,
			static::FIELD_OPEN_LABEL => $this->openLabel ?? ($this->status ? $this->defaultSuccessOpenLabel : $this->defaultFailureOpenLabel),
			static::FIELD_NEXT => $this->next,
			static::FIELD_NEXT_LABEL => $this->nextLabel ?? ($this->status ? $this->defaultSuccessNextLabel : $this->defaultFailureNextLabel),
			static::FIELD_PREVIOUS => $this->previous,
			static::FIELD_PREVIOUS_LABEL => $this->previousLabel ?? ($this->status ? $this->defaultSuccessPreviousLabel : $this->defaultFailurePreviousLabel),
			static::FIELD_CURRENT => $this->current,
			static::FIELD_CURRENT_LABEL => $this->currentLabel ?? ($this->status ? $this->defaultSuccessCurrentLabel : $this->defaultFailureCurrentLabel),
			static::FIELD_FIRST => $this->first,
			static::FIELD_FIRST_LABEL => $this->firstLabel ?? ($this->status ? $this->defaultSuccessFirstLabel : $this->defaultFailureFirstLabel),
			static::FIELD_LAST => $this->last,
			static::FIELD_LAST_LABEL => $this->lastLabel ?? ($this->status ? $this->defaultSuccessLastLabel : $this->defaultFailureLastLabel),
			static::FIELD_RELOAD => $this->reload,
			static::FIELD_RELOAD_TYPE => $this->reloadType,
			static::FIELD_RELOAD_METHOD => $this->reloadMethod,
			static::FIELD_REDIRECT => $this->redirect,
			static::FIELD_NEXT_URL => $this->nextUrl,
			static::FIELD_TIMEOUT => $this->timeout,
			static::FIELD_DELAY => $this->delay,
			static::FIELD_INTERVAL => $this->interval,
			static::FIELD_ERROR_TITLE => $this->error_title,
			static::FIELD_ERROR_MESSAGE => $this->error_message,
			static::FIELD_ERROR_CODE => $this->error_code,
			static::FIELD_HTML => $this->html,
			static::FIELD_DATAS => $this->datas,
			static::FIELD_CONFIGS => $this->configs,
			static::FIELD_OPTIONS => $this->options,
			static::FIELD_TEXTS => $this->texts,
			static::FIELD_LOGS => $this->logs,
		];
		if ($this->skipNull) {
			$requiredFields = array_filter(array_unique(array_merge($this->defaultRequiredFields, $this->requiredFields)));
			$arr = array_filter($arr, function($v, $k) use ($requiredFields) {
				if($requiredFields && in_array($k, $requiredFields, true)) {
					return true;
				}
				elseif(null === $v) {
					return false;
				}
				elseif(is_array($v) && !$v) {
					return false;
				}
				else {
					return true;
				}
			}, ARRAY_FILTER_USE_BOTH);
		}
		return $arr;
	}

	/**
	 * Export settings as json string
	 *
	 * @return string
	 */
	public function json(): string
	{
		$json = (string) json_encode($this->array());
		$this->jsonLastErrorCode = json_last_error();
		$this->jsonLastErrorStatus = $this->jsonLastErrorCode !== JSON_ERROR_NONE;
		$this->jsonLastErrorMessage = (string) json_last_error_msg();
		return $json;
	}

	/**
	 * Auto-export settings as json string
	 *
	 * @return string
	 */
	public function __toString()
	{
		return $this->json();
	}

	/**
	 * Output JSON with customizables CleanBuffer + HttpResponseCode + Header Content-Type
	 *
	 * @param bool $clear [optional] Clean outpout buffer before sending JSON
	 * @param int $success [optional] Http Response Code in case of successful compilation of the JSON
	 * @param int $failure [optional] Http Response Code in case of failure of compilation of the JSON
	 * @return bool
	 */
	public function send(bool $clear = true, int $success = null, int $failure = null): bool
	{
		$json = $this->json();
		if(null === $success) {
			$success = $this->successHttpResponseCode;
		}
		if(null === $failure) {
			$failure = $this->failureHttpResponseCode;
		}
		if($clear) {
			while (ob_get_level()) {
				ob_end_clean();
			}
		}
		if($json && !$this->jsonLastErrorStatus) {
			HeaderStatus::send($success);
			header('Content-Type: application/json');
			echo $json;
			return true;
		}
		else {
			HeaderStatus::send($failure);
			header('Content-Type: text/plain');
			echo $json;
			return false;
		}
	}

	/**
	 * @param int|string $mixed
	 * @return $this
	 */
	public function setDefaultId($mixed): Response
	{
		$this->defaultId = (string) $mixed;
		return $this;
	}

	/**
	 * @param int|string $mixed
	 * @return $this
	 */
	public function setDefaultCode($mixed): Response
	{
		$this->defaultCode = (string) $mixed;
		return $this;
	}

	/**
	 * @param string $class
	 * @return $this
	 */
	public function setDefaultClass(string $class): Response
	{
		$this->defaultClass = $class;
		return $this;
	}

	/**
	 * @param string $language
	 * @return $this
	 */
	public function setDefaultLanguage(string $language): Response
	{
		$this->defaultLanguage = $language;
		return $this;
	}

	/**
	 * @param string $type
	 * @return $this
	 */
	public function setDefaultType(string $type): Response
	{
		$this->defaultType = $type;
		return $this;
	}

	/**
	 * @param string $name
	 * @return $this
	 */
	public function setDefaultName(string $name): Response
	{
		$this->defaultName = $name;
		return $this;
	}

	/**
	 * @param string $title
	 * @return $this
	 */
	public function setDefaultSurtitle(string $title): Response
	{
		$this->defaultSuccessSurtitle = $title;
		$this->defaultFailureSurtitle = $title;
		return $this;
	}

	/**
	 * @param string $title
	 * @return $this
	 */
	public function setDefaultSuccessSurtitle(string $title): Response
	{
		$this->defaultSuccessSurtitle = $title;
		return $this;
	}

	/**
	 * @param string $title
	 * @return $this
	 */
	public function setDefaultFailureSurtitle(string $title): Response
	{
		$this->defaultFailureSurtitle = $title;
		return $this;
	}

	/**
	 * @param string $title
	 * @return $this
	 */
	public function setDefaultTitle(string $title): Response
	{
		$this->defaultSuccessTitle = $title;
		$this->defaultFailureTitle = $title;
		return $this;
	}

	/**
	 * @param string $title
	 * @return $this
	 */
	public function setDefaultSuccessTitle(string $title): Response
	{
		$this->defaultSuccessTitle = $title;
		return $this;
	}

	/**
	 * @param string $title
	 * @return $this
	 */
	public function setDefaultFailureTitle(string $title): Response
	{
		$this->defaultFailureTitle = $title;
		return $this;
	}

	/**
	 * @param string $title
	 * @return $this
	 */
	public function setDefaultSubtitle(string $title): Response
	{
		$this->defaultSuccessSubtitle = $title;
		$this->defaultFailureSubtitle = $title;
		return $this;
	}

	/**
	 * @param string $title
	 * @return $this
	 */
	public function setDefaultSuccessSubtitle(string $title): Response
	{
		$this->defaultSuccessSubtitle = $title;
		return $this;
	}

	/**
	 * @param string $title
	 * @return $this
	 */
	public function setDefaultFailureSubtitle(string $title): Response
	{
		$this->defaultFailureSubtitle = $title;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultLabel(string $label): Response
	{
		$this->defaultSuccessLabel = $label;
		$this->defaultFailureLabel = $label;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultSuccessLabel(string $label): Response
	{
		$this->defaultSuccessLabel = $label;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultFailureLabel(string $label): Response
	{
		$this->defaultFailureLabel = $label;
		return $this;
	}

	/**
	 * @param string $message
	 * @return $this
	 */
	public function setDefaultMessage(string $message): Response
	{
		$this->defaultSuccessMessage = $message;
		$this->defaultFailureMessage = $message;
		return $this;
	}

	/**
	 * @param string $message
	 * @return $this
	 */
	public function setDefaultSuccessMessage(string $message): Response
	{
		$this->defaultSuccessMessage = $message;
		return $this;
	}

	/**
	 * @param string $message
	 * @return $this
	 */
	public function setDefaultFailureMessage(string $message): Response
	{
		$this->defaultFailureMessage = $message;
		return $this;
	}

	/**
	 * @param string $header
	 * @return $this
	 */
	public function setDefaultMessageHeader(string $header): Response
	{
		$this->defaultSuccessMessageHeader = $header;
		$this->defaultFailureMessageHeader = $header;
		return $this;
	}

	/**
	 * @param string $header
	 * @return $this
	 */
	public function setDefaultSuccessMessageHeader(string $header): Response
	{
		$this->defaultSuccessMessageHeader = $header;
		return $this;
	}

	/**
	 * @param string $header
	 * @return $this
	 */
	public function setDefaultFailureMessageHeader(string $header): Response
	{
		$this->defaultFailureMessageHeader = $header;
		return $this;
	}

	/**
	 * @param string $footer
	 * @return $this
	 */
	public function setDefaultMessageFooter(string $footer): Response
	{
		$this->defaultSuccessMessageFooter = $footer;
		$this->defaultFailureMessageFooter = $footer;
		return $this;
	}

	/**
	 * @param string $footer
	 * @return $this
	 */
	public function setDefaultSuccessMessageFooter(string $footer): Response
	{
		$this->defaultSuccessMessageFooter = $footer;
		return $this;
	}

	/**
	 * @param string $footer
	 * @return $this
	 */
	public function setDefaultFailureMessageFooter(string $footer): Response
	{
		$this->defaultFailureMessageFooter = $footer;
		return $this;
	}

	/**
	 * @param string $signature
	 * @return $this
	 */
	public function setDefaultMessageSignature(string $signature): Response
	{
		$this->defaultSuccessMessageSignature = $signature;
		$this->defaultFailureMessageSignature = $signature;
		return $this;
	}

	/**
	 * @param string $signature
	 * @return $this
	 */
	public function setDefaultSuccessMessageSignature(string $signature): Response
	{
		$this->defaultSuccessMessageSignature = $signature;
		return $this;
	}

	/**
	 * @param string $signature
	 * @return $this
	 */
	public function setDefaultFailureMessageSignature(string $signature): Response
	{
		$this->defaultFailureMessageSignature = $signature;
		return $this;
	}

	/**
	 * @param string $link
	 * @return $this
	 */
	public function setDefaultMessageLink(string $link): Response
	{
		$this->defaultSuccessMessageLink = $link;
		$this->defaultFailureMessageLink = $link;
		return $this;
	}

	/**
	 * @param string $link
	 * @return $this
	 */
	public function setDefaultSuccessMessageLink(string $link): Response
	{
		$this->defaultSuccessMessageLink = $link;
		return $this;
	}

	/**
	 * @param string $link
	 * @return $this
	 */
	public function setDefaultFailureMessageLink(string $link): Response
	{
		$this->defaultFailureMessageLink = $link;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultDismissLabel(string $label): Response
	{
		$this->defaultSuccessDismissLabel = $label;
		$this->defaultFailureDismissLabel = $label;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultSuccessDismissLabel(string $label): Response
	{
		$this->defaultSuccessDismissLabel = $label;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultFailureDismissLabel(string $label): Response
	{
		$this->defaultFailureDismissLabel = $label;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultCancelLabel(string $label): Response
	{
		$this->defaultSuccessCancelLabel = $label;
		$this->defaultFailureCancelLabel = $label;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultSuccessCancelLabel(string $label): Response
	{
		$this->defaultSuccessCancelLabel = $label;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultFailureCancelLabel(string $label): Response
	{
		$this->defaultFailureCancelLabel = $label;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultConfirmLabel(string $label): Response
	{
		$this->defaultSuccessConfirmLabel = $label;
		$this->defaultFailureConfirmLabel = $label;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultSuccessConfirmLabel(string $label): Response
	{
		$this->defaultSuccessConfirmLabel = $label;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultFailureConfirmLabel(string $label): Response
	{
		$this->defaultFailureConfirmLabel = $label;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultCloseLabel(string $label): Response
	{
		$this->defaultSuccessCloseLabel = $label;
		$this->defaultFailureCloseLabel = $label;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultSuccessCloseLabel(string $label): Response
	{
		$this->defaultSuccessCloseLabel = $label;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultFailureCloseLabel(string $label): Response
	{
		$this->defaultFailureCloseLabel = $label;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultOpenLabel(string $label): Response
	{
		$this->defaultSuccessOpenLabel = $label;
		$this->defaultFailureOpenLabel = $label;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultSuccessOpenLabel(string $label): Response
	{
		$this->defaultSuccessOpenLabel = $label;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultFailureOpenLabel(string $label): Response
	{
		$this->defaultFailureOpenLabel = $label;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultNextLabel(string $label): Response
	{
		$this->defaultSuccessNextLabel = $label;
		$this->defaultFailureNextLabel = $label;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultSuccessNextLabel(string $label): Response
	{
		$this->defaultSuccessNextLabel = $label;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultFailureNextLabel(string $label): Response
	{
		$this->defaultFailureNextLabel = $label;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultPreviousLabel(string $label): Response
	{
		$this->defaultSuccessPreviousLabel = $label;
		$this->defaultFailurePreviousLabel = $label;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultSuccessPreviousLabel(string $label): Response
	{
		$this->defaultSuccessPreviousLabel = $label;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultFailurePreviousLabel(string $label): Response
	{
		$this->defaultFailurePreviousLabel = $label;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultCurrentLabel(string $label): Response
	{
		$this->defaultSuccessCurrentLabel = $label;
		$this->defaultFailureCurrentLabel = $label;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultSuccessCurrentLabel(string $label): Response
	{
		$this->defaultSuccessCurrentLabel = $label;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultFailureCurrentLabel(string $label): Response
	{
		$this->defaultFailureCurrentLabel = $label;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultFirstLabel(string $label): Response
	{
		$this->defaultSuccessFirstLabel = $label;
		$this->defaultFailureFirstLabel = $label;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultSuccessFirstLabel(string $label): Response
	{
		$this->defaultSuccessFirstLabel = $label;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultFailureFirstLabel(string $label): Response
	{
		$this->defaultFailureFirstLabel = $label;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultLastLabel(string $label): Response
	{
		$this->defaultSuccessLastLabel = $label;
		$this->defaultFailureLastLabel = $label;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultSuccessLastLabel(string $label): Response
	{
		$this->defaultSuccessLastLabel = $label;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultFailureLastLabel(string $label): Response
	{
		$this->defaultFailureLastLabel = $label;
		return $this;
	}

	/**
	 * @param int|string $mixed
	 * @return $this
	 */
	public function setId($mixed): Response
	{
		$this->id = (string) $mixed;
		return $this;
	}

	/**
	 * @param int|string $mixed
	 * @return $this
	 */
	public function setCode($mixed): Response
	{
		$this->code = (string) $mixed;
		return $this;
	}

	/**
	 * @param string $class
	 * @return $this
	 */
	public function setClass(string $class): Response
	{
		$this->class = $class;
		return $this;
	}

	/**
	 * @param string $language
	 * @return $this
	 */
	public function setLanguage(string $language): Response
	{
		$this->language = $language;
		return $this;
	}

	/**
	 * @param string $type
	 * @return $this
	 */
	public function setType(string $type): Response
	{
		$this->type = $type;
		return $this;
	}

	/**
	 * @param string $name
	 * @return $this
	 */
	public function setName(string $name): Response
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @param string $type
	 * @return $this
	 */
	public function setEventType(string $type): Response
	{
		$this->eventType = $type;
		return $this;
	}

	/**
	 * @param bool $status
	 * @return $this
	 */
	public function setStatus(bool $status): Response
	{
		$this->status = $status;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function isSuccess(): bool
	{
		return $this->status;
	}

	/**
	 * @return bool
	 */
	public function isFailure(): bool
	{
		return !$this->status;
	}

	/**
	 * @param string $title
	 * @return $this
	 */
	public function setSurtitle(string $title): Response
	{
		$this->surtitle = $title;
		return $this;
	}

	/**
	 * @param string $title
	 * @return $this
	 */
	public function setTitle(string $title): Response
	{
		$this->title = $title;
		return $this;
	}

	/**
	 * @param string $title
	 * @return $this
	 */
	public function setSubtitle(string $title): Response
	{
		$this->subtitle = $title;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setLabel(string $label): Response
	{
		$this->label = $label;
		return $this;
	}

	/**
	 * @param string $message
	 * @return $this
	 */
	public function setMessage(string $message): Response
	{
		$this->message = $message;
		return $this;
	}

	/**
	 * @param string $header
	 * @return $this
	 */
	public function setMessageHeader(string $header): Response
	{
		$this->messageHeader = $header;
		return $this;
	}

	/**
	 * @param string $footer
	 * @return $this
	 */
	public function setMessageFooter(string $footer): Response
	{
		$this->messageFooter = $footer;
		return $this;
	}

	/**
	 * @param string $signature
	 * @return $this
	 */
	public function setMessageSignature(string $signature): Response
	{
		$this->messageSignature = $signature;
		return $this;
	}

	/**
	 * @param string $link
	 * @return $this
	 */
	public function setMessageLink(string $link): Response
	{
		$this->messageLink = $link;
		return $this;
	}

	/**
	 * @param bool $status
	 * @return $this
	 */
	public function setDismiss(bool $status): Response
	{
		$this->dismiss = $status;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDismissLabel(string $label): Response
	{
		$this->dismissLabel = $label;
		return $this;
	}

	/**
	 * @param bool $status
	 * @return $this
	 */
	public function setCancel(bool $status): Response
	{
		$this->cancel = $status;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setCancelLabel(string $label): Response
	{
		$this->cancelLabel = $label;
		return $this;
	}

	/**
	 * @param bool $status
	 * @return $this
	 */
	public function setConfirm(bool $status): Response
	{
		$this->confirm = $status;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setConfirmLabel(string $label): Response
	{
		$this->confirmLabel = $label;
		return $this;
	}

	/**
	 * @param bool $status
	 * @return $this
	 */
	public function setClose(bool $status): Response
	{
		$this->close = $status;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setCloseLabel(string $label): Response
	{
		$this->closeLabel = $label;
		return $this;
	}

	/**
	 * @param bool $status
	 * @return $this
	 */
	public function setOpen(bool $status): Response
	{
		$this->open = $status;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setOpenLabel(string $label): Response
	{
		$this->openLabel = $label;
		return $this;
	}

	/**
	 * @param bool $status
	 * @return $this
	 */
	public function setNext(bool $status): Response
	{
		$this->next = $status;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setNextLabel(string $label): Response
	{
		$this->nextLabel = $label;
		return $this;
	}

	/**
	 * @param bool $status
	 * @return $this
	 */
	public function setPrevious(bool $status): Response
	{
		$this->previous = $status;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setPreviousLabel(string $label): Response
	{
		$this->previousLabel = $label;
		return $this;
	}

	/**
	 * @param bool $status
	 * @return $this
	 */
	public function setCurrent(bool $status): Response
	{
		$this->current = $status;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setCurrentLabel(string $label): Response
	{
		$this->currentLabel = $label;
		return $this;
	}

	/**
	 * @param bool $status
	 * @return $this
	 */
	public function setFirst(bool $status): Response
	{
		$this->first = $status;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setFirstLabel(string $label): Response
	{
		$this->firstLabel = $label;
		return $this;
	}

	/**
	 * @param bool $status
	 * @return $this
	 */
	public function setLast(bool $status): Response
	{
		$this->last = $status;
		return $this;
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setLastLabel(string $label): Response
	{
		$this->lastLabel = $label;
		return $this;
	}

	/**
	 * @param bool $status
	 * @return $this
	 */
	public function setReload(bool $status): Response
	{
		$this->reload = $status;
		return $this;
	}

	/**
	 * @param string $type
	 * @return $this
	 */
	public function setReloadType(string $type): Response
	{
		$this->reloadType = $type;
		return $this;
	}

	/**
	 * @param string $method
	 * @return $this
	 */
	public function setReloadMethod(string $method): Response
	{
		$this->reloadMethod = $method;
		return $this;
	}

	/**
	 * @param bool $status
	 * @return $this
	 */
	public function setRedirect(bool $status): Response
	{
		$this->redirect = $status;
		return $this;
	}

	/**
	 * @param string $url
	 * @return $this
	 */
	public function setNextUrl(string $url): Response
	{
		$this->nextUrl = $url;
		return $this;
	}

	/**
	 * @param int $ms
	 * @return $this
	 */
	public function setTimeout(int $ms): Response
	{
		$this->timeout = $ms;
		return $this;
	}

	/**
	 * @param int $ms
	 * @return $this
	 */
	public function setDelay(int $ms): Response
	{
		$this->delay = $ms;
		return $this;
	}

	/**
	 * @param int $ms
	 * @return $this
	 */
	public function setInterval(int $ms): Response
	{
		$this->interval = $ms;
		return $this;
	}

	/**
	 * @param string $title
	 * @return $this
	 */
	public function setErrorTitle(string $title): Response
	{
		$this->error_title = $title;
		return $this;
	}

	/**
	 * @param string $message
	 * @return $this
	 */
	public function setErrorMessage(string $message): Response
	{
		$this->error_message = $message;
		return $this;
	}

	/**
	 * @param int $code
	 * @return $this
	 */
	public function setErrorCode(int $code): Response
	{
		$this->error_code = $code;
		return $this;
	}

	/**
	 * @param string $html
	 * @return $this
	 */
	public function setHtml(string $html): Response
	{
		$this->html = $html;
		return $this;
	}

	/**
	 * @param array $configs
	 * @return $this
	 */
	public function setConfigs(array $configs): Response
	{
		$this->configs = $configs;
		return $this;
	}

	/**
	 * @param array $configs
	 * @return $this
	 */
	public function addConfigs(array $configs): Response
	{
		$this->configs = array_merge($this->configs, $configs);
		return $this;
	}

	/**
	 * @param string $key
	 * @param mixed $value
	 * @return $this
	 */
	public function addConfig(string $key, $value): Response
	{
		$this->configs[$key] = $value;
		return $this;
	}

	/**
	 * @param array $configs
	 * @param bool $keys [optional]
	 * @return $this
	 */
	public function removeConfigs(array $configs, bool $keys = false): Response
	{
		if($keys) {
			$configs = array_keys($configs);
		}
		$this->configs = array_diff_key($this->configs, $configs);
		return $this;
	}

	/**
	 * @param string $key
	 * @return $this
	 */
	public function removeConfig(string $key): Response
	{
		unset($this->configs[$key]);
		return $this;
	}

	/**
	 * @return $this
	 */
	public function clearConfigs(): Response
	{
		$this->configs = [];
		return $this;
	}

	/**
	 * @return array
	 */
	public function getConfigs(): array
	{
		return $this->configs;
	}

	/**
	 * @param string $key
	 * @param mixed $default [optional]
	 * @return mixed
	 */
	public function getConfig(string $key, $default = null)
	{
		return $this->configs[$key] ?? $default;
	}

	/**
	 * @param array $datas
	 * @return $this
	 */
	public function setDatas(array $datas): Response
	{
		$this->datas = $datas;
		return $this;
	}

	/**
	 * @param array $datas
	 * @return $this
	 */
	public function addDatas(array $datas): Response
	{
		$this->datas = array_merge($this->datas, $datas);
		return $this;
	}

	/**
	 * @param string $key
	 * @param mixed $value
	 * @return $this
	 */
	public function addData(string $key, $value): Response
	{
		$this->datas[$key] = $value;
		return $this;
	}

	/**
	 * @param array $datas
	 * @param bool $keys [optional]
	 * @return $this
	 */
	public function removeDatas(array $datas, bool $keys = false): Response
	{
		if($keys) {
			$datas = array_keys($datas);
		}
		$this->datas = array_diff_key($this->datas, $datas);
		return $this;
	}

	/**
	 * @param string $key
	 * @return $this
	 */
	public function removeData(string $key): Response
	{
		unset($this->datas[$key]);
		return $this;
	}

	/**
	 * @return $this
	 */
	public function clearDatas(): Response
	{
		$this->datas = [];
		return $this;
	}

	/**
	 * @return array
	 */
	public function getDatas(): array
	{
		return $this->datas;
	}

	/**
	 * @param string $key
	 * @param mixed $default [optional]
	 * @return mixed
	 */
	public function getData(string $key, $default = null)
	{
		return $this->datas[$key] ?? $default;
	}

	/**
	 * @param array $options
	 * @return $this
	 */
	public function setOptions(array $options): Response
	{
		$this->options = $options;
		return $this;
	}

	/**
	 * @param array $options
	 * @return $this
	 */
	public function addOptions(array $options): Response
	{
		$this->options = array_merge($this->options, $options);
		return $this;
	}

	/**
	 * @param string $key
	 * @param mixed $value
	 * @return $this
	 */
	public function addOption(string $key, $value): Response
	{
		$this->options[$key] = $value;
		return $this;
	}

	/**
	 * @param array $options
	 * @param bool $keys [optional]
	 * @return $this
	 */
	public function removeOptions(array $options, bool $keys = false): Response
	{
		if($keys) {
			$options = array_keys($options);
		}
		$this->options = array_diff_key($this->options, $options);
		return $this;
	}

	/**
	 * @param string $key
	 * @return $this
	 */
	public function removeOption(string $key): Response
	{
		unset($this->options[$key]);
		return $this;
	}

	/**
	 * @return $this
	 */
	public function clearOptions(): Response
	{
		$this->options = [];
		return $this;
	}

	/**
	 * @return array
	 */
	public function getOptions(): array
	{
		return $this->options;
	}

	/**
	 * @param string $key
	 * @param mixed $default [optional]
	 * @return mixed
	 */
	public function getOption(string $key, $default = null)
	{
		return $this->options[$key] ?? $default;
	}

	/**
	 * @param array $texts
	 * @return $this
	 */
	public function setTexts(array $texts): Response
	{
		$this->texts = $texts;
		return $this;
	}

	/**
	 * @param array $texts
	 * @return $this
	 */
	public function addTexts(array $texts): Response
	{
		$this->texts = array_merge($this->texts, $texts);
		return $this;
	}

	/**
	 * @param string $key
	 * @param mixed $value
	 * @return $this
	 */
	public function addText(string $key, $value): Response
	{
		$this->texts[$key] = $value;
		return $this;
	}

	/**
	 * @param array $texts
	 * @param bool $keys [optional]
	 * @return $this
	 */
	public function removeTexts(array $texts, bool $keys = false): Response
	{
		if($keys) {
			$texts = array_keys($texts);
		}
		$this->texts = array_diff_key($this->texts, $texts);
		return $this;
	}

	/**
	 * @param string $key
	 * @return $this
	 */
	public function removeText(string $key): Response
	{
		unset($this->texts[$key]);
		return $this;
	}

	/**
	 * @return $this
	 */
	public function clearTexts(): Response
	{
		$this->texts = [];
		return $this;
	}

	/**
	 * @return array
	 */
	public function getTexts(): array
	{
		return $this->texts;
	}

	/**
	 * @param string $key
	 * @param mixed $default [optional]
	 * @return mixed
	 */
	public function getText(string $key, $default = null)
	{
		return $this->texts[$key] ?? $default;
	}

	/**
	 * @param array $logs
	 * @return $this
	 */
	public function setLogs(array $logs): Response
	{
		$this->logs = $logs;
		return $this;
	}

	/**
	 * @param array $logs
	 * @return $this
	 */
	public function addLogs(array $logs): Response
	{
		$this->logs = array_merge($this->logs, $logs);
		return $this;
	}

	/**
	 * @param string $key
	 * @param mixed $value
	 * @return $this
	 */
	public function addLog(string $key, $value): Response
	{
		$this->logs[$key] = $value;
		return $this;
	}

	/**
	 * @param array $logs
	 * @param bool $keys [optional]
	 * @return $this
	 */
	public function removeLogs(array $logs, bool $keys = false): Response
	{
		if($keys) {
			$logs = array_keys($logs);
		}
		$this->logs = array_diff_key($this->logs, $logs);
		return $this;
	}

	/**
	 * @param string $key
	 * @return $this
	 */
	public function removeLog(string $key): Response
	{
		unset($this->logs[$key]);
		return $this;
	}

	/**
	 * @return $this
	 */
	public function clearLogs(): Response
	{
		$this->logs = [];
		return $this;
	}

	/**
	 * @return array
	 */
	public function getLogs(): array
	{
		return $this->logs;
	}

	/**
	 * @param string $key
	 * @param mixed $default [optional]
	 * @return mixed
	 */
	public function getLog(string $key, $default = null)
	{
		return $this->logs[$key] ?? $default;
	}

	/**
	 * @return bool
	 */
	public function getJsonLastErrorStatus(): bool
	{
		return $this->jsonLastErrorStatus;
	}

	/**
	 * @return int
	 */
	public function getJsonLastErrorCode(): int
	{
		return $this->jsonLastErrorCode;
	}

	/**
	 * @return string
	 */
	public function getJsonLastErrorMessage(): string
	{
		return $this->jsonLastErrorMessage;
	}
}