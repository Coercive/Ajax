<?php
namespace Coercive\Utility\Ajax;

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
class Response extends TightResponse
{
	/**
	 * @param int|string $mixed
	 * @return $this
	 */
	public function setDefaultId($mixed): Response
	{
		return $this->setDefault(Fields::FIELD_ID, (string) $mixed);
	}

	/**
	 * @param int|string $mixed
	 * @return $this
	 */
	public function setDefaultCode($mixed): Response
	{
		return $this->setDefault(Fields::FIELD_CODE, (string) $mixed);
	}

	/**
	 * @param string $class
	 * @return $this
	 */
	public function setDefaultClass(string $class): Response
	{
		return $this->setDefault(Fields::FIELD_CLASS, $class);
	}

	/**
	 * @param string $language
	 * @return $this
	 */
	public function setDefaultLanguage(string $language): Response
	{
		return $this->setDefault(Fields::FIELD_LANGUAGE, $language);
	}

	/**
	 * @param string $type
	 * @return $this
	 */
	public function setDefaultType(string $type): Response
	{
		return $this->setDefault(Fields::FIELD_TYPE, $type);
	}

	/**
	 * @param string $name
	 * @return $this
	 */
	public function setDefaultName(string $name): Response
	{
		return $this->setDefault(Fields::FIELD_NAME, $name);
	}

	/**
	 * @param string $title
	 * @return $this
	 */
	public function setDefaultSurtitle(string $title): Response
	{
		return $this->setDefault(Fields::FIELD_SURTITLE, $title);
	}

	/**
	 * @param string $title
	 * @return $this
	 */
	public function setDefaultSuccessSurtitle(string $title): Response
	{
		return $this->setDefault(Fields::FIELD_SURTITLE, $title, true);
	}

	/**
	 * @param string $title
	 * @return $this
	 */
	public function setDefaultFailureSurtitle(string $title): Response
	{
		return $this->setDefault(Fields::FIELD_SURTITLE, $title, false);
	}

	/**
	 * @param string $title
	 * @return $this
	 */
	public function setDefaultTitle(string $title): Response
	{
		return $this->setDefault(Fields::FIELD_TITLE, $title);
	}

	/**
	 * @param string $title
	 * @return $this
	 */
	public function setDefaultSuccessTitle(string $title): Response
	{
		return $this->setDefault(Fields::FIELD_TITLE, $title, true);
	}

	/**
	 * @param string $title
	 * @return $this
	 */
	public function setDefaultFailureTitle(string $title): Response
	{
		return $this->setDefault(Fields::FIELD_TITLE, $title, false);
	}

	/**
	 * @param string $title
	 * @return $this
	 */
	public function setDefaultSubtitle(string $title): Response
	{
		return $this->setDefault(Fields::FIELD_SUBTITLE, $title);
	}

	/**
	 * @param string $title
	 * @return $this
	 */
	public function setDefaultSuccessSubtitle(string $title): Response
	{
		return $this->setDefault(Fields::FIELD_SUBTITLE, $title, true);
	}

	/**
	 * @param string $title
	 * @return $this
	 */
	public function setDefaultFailureSubtitle(string $title): Response
	{
		return $this->setDefault(Fields::FIELD_SUBTITLE, $title, false);
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultLabel(string $label): Response
	{
		return $this->setDefault(Fields::FIELD_LABEL, $label);
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultSuccessLabel(string $label): Response
	{
		return $this->setDefault(Fields::FIELD_LABEL, $label, true);
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultFailureLabel(string $label): Response
	{
		return $this->setDefault(Fields::FIELD_LABEL, $label, false);
	}

	/**
	 * @param string $message
	 * @return $this
	 */
	public function setDefaultMessage(string $message): Response
	{
		return $this->setDefault(Fields::FIELD_MESSAGE, $message);
	}

	/**
	 * @param string $message
	 * @return $this
	 */
	public function setDefaultSuccessMessage(string $message): Response
	{
		return $this->setDefault(Fields::FIELD_MESSAGE, $message, true);
	}

	/**
	 * @param string $message
	 * @return $this
	 */
	public function setDefaultFailureMessage(string $message): Response
	{
		return $this->setDefault(Fields::FIELD_MESSAGE, $message, false);
	}

	/**
	 * @param string $header
	 * @return $this
	 */
	public function setDefaultMessageHeader(string $header): Response
	{
		return $this->setDefault(Fields::FIELD_MESSAGE_HEADER, $header);
	}

	/**
	 * @param string $header
	 * @return $this
	 */
	public function setDefaultSuccessMessageHeader(string $header): Response
	{
		return $this->setDefault(Fields::FIELD_MESSAGE_HEADER, $header, true);
	}

	/**
	 * @param string $header
	 * @return $this
	 */
	public function setDefaultFailureMessageHeader(string $header): Response
	{
		return $this->setDefault(Fields::FIELD_MESSAGE_HEADER, $header, false);
	}

	/**
	 * @param string $footer
	 * @return $this
	 */
	public function setDefaultMessageFooter(string $footer): Response
	{
		return $this->setDefault(Fields::FIELD_MESSAGE_FOOTER, $footer);
	}

	/**
	 * @param string $footer
	 * @return $this
	 */
	public function setDefaultSuccessMessageFooter(string $footer): Response
	{
		return $this->setDefault(Fields::FIELD_MESSAGE_FOOTER, $footer, true);
	}

	/**
	 * @param string $footer
	 * @return $this
	 */
	public function setDefaultFailureMessageFooter(string $footer): Response
	{
		return $this->setDefault(Fields::FIELD_MESSAGE_FOOTER, $footer, false);
	}

	/**
	 * @param string $signature
	 * @return $this
	 */
	public function setDefaultMessageSignature(string $signature): Response
	{
		return $this->setDefault(Fields::FIELD_MESSAGE_SIGNATURE, $signature);
	}

	/**
	 * @param string $signature
	 * @return $this
	 */
	public function setDefaultSuccessMessageSignature(string $signature): Response
	{
		return $this->setDefault(Fields::FIELD_MESSAGE_SIGNATURE, $signature, true);
	}

	/**
	 * @param string $signature
	 * @return $this
	 */
	public function setDefaultFailureMessageSignature(string $signature): Response
	{
		return $this->setDefault(Fields::FIELD_MESSAGE_SIGNATURE, $signature, false);
	}

	/**
	 * @param string $link
	 * @return $this
	 */
	public function setDefaultMessageLink(string $link): Response
	{
		return $this->setDefault(Fields::FIELD_MESSAGE_LINK, $link);
	}

	/**
	 * @param string $link
	 * @return $this
	 */
	public function setDefaultSuccessMessageLink(string $link): Response
	{
		return $this->setDefault(Fields::FIELD_MESSAGE_LINK, $link, true);
	}

	/**
	 * @param string $link
	 * @return $this
	 */
	public function setDefaultFailureMessageLink(string $link): Response
	{
		return $this->setDefault(Fields::FIELD_MESSAGE_LINK, $link, false);
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultDismissLabel(string $label): Response
	{
		return $this->setDefault(Fields::FIELD_DISMISSL_LABEL, $label);
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultSuccessDismissLabel(string $label): Response
	{
		return $this->setDefault(Fields::FIELD_DISMISSL_LABEL, $label, true);
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultFailureDismissLabel(string $label): Response
	{
		return $this->setDefault(Fields::FIELD_DISMISSL_LABEL, $label, false);
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultCancelLabel(string $label): Response
	{
		return $this->setDefault(Fields::FIELD_CANCEL_LABEL, $label);
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultSuccessCancelLabel(string $label): Response
	{
		return $this->setDefault(Fields::FIELD_CANCEL_LABEL, $label, true);
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultFailureCancelLabel(string $label): Response
	{
		return $this->setDefault(Fields::FIELD_CANCEL_LABEL, $label, false);
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultConfirmLabel(string $label): Response
	{
		return $this->setDefault(Fields::FIELD_CONFIRM, $label);
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultSuccessConfirmLabel(string $label): Response
	{
		return $this->setDefault(Fields::FIELD_CONFIRM, $label, true);
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultFailureConfirmLabel(string $label): Response
	{
		return $this->setDefault(Fields::FIELD_CONFIRM, $label, false);
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultCloseLabel(string $label): Response
	{
		return $this->setDefault(Fields::FIELD_CLOSE_LABEL, $label);
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultSuccessCloseLabel(string $label): Response
	{
		return $this->setDefault(Fields::FIELD_CLOSE_LABEL, $label, true);
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultFailureCloseLabel(string $label): Response
	{
		return $this->setDefault(Fields::FIELD_CLOSE_LABEL, $label, false);
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultOpenLabel(string $label): Response
	{
		return $this->setDefault(Fields::FIELD_OPEN_LABEL, $label);
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultSuccessOpenLabel(string $label): Response
	{
		return $this->setDefault(Fields::FIELD_OPEN_LABEL, $label, true);
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultFailureOpenLabel(string $label): Response
	{
		return $this->setDefault(Fields::FIELD_OPEN_LABEL, $label, false);
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultNextLabel(string $label): Response
	{
		return $this->setDefault(Fields::FIELD_NEXT_LABEL, $label);
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultSuccessNextLabel(string $label): Response
	{
		return $this->setDefault(Fields::FIELD_NEXT_LABEL, $label, true);
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultFailureNextLabel(string $label): Response
	{
		return $this->setDefault(Fields::FIELD_NEXT_LABEL, $label, false);
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultPreviousLabel(string $label): Response
	{
		return $this->setDefault(Fields::FIELD_PREVIOUS_LABEL, $label);
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultSuccessPreviousLabel(string $label): Response
	{
		return $this->setDefault(Fields::FIELD_PREVIOUS_LABEL, $label, true);
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultFailurePreviousLabel(string $label): Response
	{
		return $this->setDefault(Fields::FIELD_PREVIOUS_LABEL, $label, false);
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultCurrentLabel(string $label): Response
	{
		return $this->setDefault(Fields::FIELD_CURRENT_LABEL, $label);
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultSuccessCurrentLabel(string $label): Response
	{
		return $this->setDefault(Fields::FIELD_CURRENT_LABEL, $label, true);
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultFailureCurrentLabel(string $label): Response
	{
		return $this->setDefault(Fields::FIELD_CURRENT_LABEL, $label, false);
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultFirstLabel(string $label): Response
	{
		return $this->setDefault(Fields::FIELD_FIRST_LABEL, $label);
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultSuccessFirstLabel(string $label): Response
	{
		return $this->setDefault(Fields::FIELD_FIRST_LABEL, $label, true);
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultFailureFirstLabel(string $label): Response
	{
		return $this->setDefault(Fields::FIELD_FIRST_LABEL, $label, false);
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultLastLabel(string $label): Response
	{
		return $this->setDefault(Fields::FIELD_LAST_LABEL, $label);
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultSuccessLastLabel(string $label): Response
	{
		return $this->setDefault(Fields::FIELD_LAST_LABEL, $label, true);
	}

	/**
	 * @param string $label
	 * @return $this
	 */
	public function setDefaultFailureLastLabel(string $label): Response
	{
		return $this->setDefault(Fields::FIELD_LAST_LABEL, $label, false);
	}

	/**
	 * @param int|string $value
	 * @return $this
	 */
	public function setId($value): Response
	{
		return $this->set(Fields::FIELD_ID, (string) $value);
	}

	/**
	 * @param int|string $value
	 * @return $this
	 */
	public function setCode($value): Response
	{
		return $this->set(Fields::FIELD_CODE, (string) $value);
	}

	/**
	 * @param string $value
	 * @return $this
	 */
	public function setClass(string $value): Response
	{
		return $this->set(Fields::FIELD_CLASS, $value);
	}

	/**
	 * @param string $value
	 * @return $this
	 */
	public function setLanguage(string $value): Response
	{
		return $this->set(Fields::FIELD_CLASS, $value);
	}

	/**
	 * @param string $value
	 * @return $this
	 */
	public function setType(string $value): Response
	{
		return $this->set(Fields::FIELD_TYPE, $value);
	}

	/**
	 * @param string $value
	 * @return $this
	 */
	public function setField(string $value): Response
	{
		return $this->set(Fields::FIELD_FIELD, $value);
	}

	/**
	 * @param string $value
	 * @return $this
	 */
	public function setName(string $value): Response
	{
		return $this->set(Fields::FIELD_NAME, $value);
	}

	/**
	 * @param string $value
	 * @return $this
	 */
	public function setEvent(string $value): Response
	{
		return $this->set(Fields::FIELD_EVENT, $value);
	}

	/**
	 * @param string $value
	 * @return $this
	 */
	public function setEventType(string $value): Response
	{
		return $this->set(Fields::FIELD_EVENT_TYPE, $value);
	}

	/**
	 * @param string $value
	 * @return $this
	 */
	public function setSurtitle(string $value): Response
	{
		return $this->set(Fields::FIELD_SURTITLE, $value);
	}

	/**
	 * @param string $value
	 * @return $this
	 */
	public function setTitle(string $value): Response
	{
		return $this->set(Fields::FIELD_TITLE, $value);
	}

	/**
	 * @param string $value
	 * @return $this
	 */
	public function setSubtitle(string $value): Response
	{
		return $this->set(Fields::FIELD_SUBTITLE, $value);
	}

	/**
	 * @param string $value
	 * @return $this
	 */
	public function setLabel(string $value): Response
	{
		return $this->set(Fields::FIELD_LABEL, $value);
	}

	/**
	 * @param string $value
	 * @return $this
	 */
	public function setMessage(string $value): Response
	{
		return $this->set(Fields::FIELD_MESSAGE, $value);
	}

	/**
	 * @param string $value
	 * @return $this
	 */
	public function setMessageHeader(string $value): Response
	{
		return $this->set(Fields::FIELD_MESSAGE_HEADER, $value);
	}

	/**
	 * @param string $value
	 * @return $this
	 */
	public function setMessageFooter(string $value): Response
	{
		return $this->set(Fields::FIELD_MESSAGE_FOOTER, $value);
	}

	/**
	 * @param string $value
	 * @return $this
	 */
	public function setMessageSignature(string $value): Response
	{
		return $this->set(Fields::FIELD_MESSAGE_SIGNATURE, $value);
	}

	/**
	 * @param string $value
	 * @return $this
	 */
	public function setMessageLink(string $value): Response
	{
		return $this->set(Fields::FIELD_MESSAGE_LINK, $value);
	}

	/**
	 * @param bool $status
	 * @return $this
	 */
	public function setDismiss(bool $status): Response
	{
		return $this->set(Fields::FIELD_DISMISS, $status);
	}

	/**
	 * @param string $value
	 * @return $this
	 */
	public function setDismissLabel(string $value): Response
	{
		return $this->set(Fields::FIELD_DISMISSL_LABEL, $value);
	}

	/**
	 * @param bool $status
	 * @return $this
	 */
	public function setCancel(bool $status): Response
	{
		return $this->set(Fields::FIELD_CANCEL, $status);
	}

	/**
	 * @param string $value
	 * @return $this
	 */
	public function setCancelLabel(string $value): Response
	{
		return $this->set(Fields::FIELD_CANCEL_LABEL, $value);
	}

	/**
	 * @param bool $status
	 * @return $this
	 */
	public function setConfirm(bool $status): Response
	{
		return $this->set(Fields::FIELD_CONFIRM, $status);
	}

	/**
	 * @param string $value
	 * @return $this
	 */
	public function setConfirmLabel(string $value): Response
	{
		return $this->set(Fields::FIELD_CONFIRM_LABEL, $value);
	}

	/**
	 * @param bool $status
	 * @return $this
	 */
	public function setClose(bool $status): Response
	{
		return $this->set(Fields::FIELD_CLOSE, $status);
	}

	/**
	 * @param string $value
	 * @return $this
	 */
	public function setCloseLabel(string $value): Response
	{
		return $this->set(Fields::FIELD_CLOSE_LABEL, $value);
	}

	/**
	 * @param bool $status
	 * @return $this
	 */
	public function setOpen(bool $status): Response
	{
		return $this->set(Fields::FIELD_OPEN, $status);
	}

	/**
	 * @param string $value
	 * @return $this
	 */
	public function setOpenLabel(string $value): Response
	{
		return $this->set(Fields::FIELD_CLOSE_LABEL, $value);
	}

	/**
	 * @param bool $status
	 * @return $this
	 */
	public function setNext(bool $status): Response
	{
		return $this->set(Fields::FIELD_NEXT, $status);
	}

	/**
	 * @param string $value
	 * @return $this
	 */
	public function setNextLabel(string $value): Response
	{
		return $this->set(Fields::FIELD_NEXT_LABEL, $value);
	}

	/**
	 * @param bool $status
	 * @return $this
	 */
	public function setPrevious(bool $status): Response
	{
		return $this->set(Fields::FIELD_PREVIOUS, $status);
	}

	/**
	 * @param string $value
	 * @return $this
	 */
	public function setPreviousLabel(string $value): Response
	{
		return $this->set(Fields::FIELD_PREVIOUS_LABEL, $value);
	}

	/**
	 * @param bool $status
	 * @return $this
	 */
	public function setCurrent(bool $status): Response
	{
		return $this->set(Fields::FIELD_CURRENT, $status);
	}

	/**
	 * @param string $value
	 * @return $this
	 */
	public function setCurrentLabel(string $value): Response
	{
		return $this->set(Fields::FIELD_CURRENT_LABEL, $value);
	}

	/**
	 * @param bool $status
	 * @return $this
	 */
	public function setFirst(bool $status): Response
	{
		return $this->set(Fields::FIELD_FIRST, $status);
	}

	/**
	 * @param string $value
	 * @return $this
	 */
	public function setFirstLabel(string $value): Response
	{
		return $this->set(Fields::FIELD_FIRST_LABEL, $value);
	}

	/**
	 * @param bool $status
	 * @return $this
	 */
	public function setLast(bool $status): Response
	{
		return $this->set(Fields::FIELD_LAST, $status);
	}

	/**
	 * @param string $value
	 * @return $this
	 */
	public function setLastLabel(string $value): Response
	{
		return $this->set(Fields::FIELD_LAST_LABEL, $value);
	}

	/**
	 * @param bool $status
	 * @return $this
	 */
	public function setReload(bool $status): Response
	{
		return $this->set(Fields::FIELD_RELOAD, $status);
	}

	/**
	 * @param string $value
	 * @return $this
	 */
	public function setReloadType(string $value): Response
	{
		return $this->set(Fields::FIELD_RELOAD_TYPE, $value);
	}

	/**
	 * @param string $value
	 * @return $this
	 */
	public function setReloadMethod(string $value): Response
	{
		return $this->set(Fields::FIELD_RELOAD_METHOD, $value);
	}

	/**
	 * @param bool $status
	 * @return $this
	 */
	public function setRedirect(bool $status): Response
	{
		return $this->set(Fields::FIELD_REDIRECT, $status);
	}

	/**
	 * @param string $value
	 * @return $this
	 */
	public function setNextUrl(string $value): Response
	{
		return $this->set(Fields::FIELD_NEXT_URL, $value);
	}

	/**
	 * @param int $ms
	 * @return $this
	 */
	public function setTimeout(int $ms): Response
	{
		return $this->set(Fields::FIELD_TIMEOUT, $ms);
	}

	/**
	 * @param int $ms
	 * @return $this
	 */
	public function setDelay(int $ms): Response
	{
		return $this->set(Fields::FIELD_DELAY, $ms);
	}

	/**
	 * @param int $ms
	 * @return $this
	 */
	public function setInterval(int $ms): Response
	{
		return $this->set(Fields::FIELD_INTERVAL, $ms);
	}

	/**
	 * @param string $value
	 * @return $this
	 */
	public function setErrorTitle(string $value): Response
	{
		return $this->set(Fields::FIELD_ERROR_TITLE, $value);
	}

	/**
	 * @param string $value
	 * @return $this
	 */
	public function setErrorMessage(string $value): Response
	{
		return $this->set(Fields::FIELD_ERROR_MESSAGE, $value);
	}

	/**
	 * @param int|string $value
	 * @return $this
	 */
	public function setErrorCode($value): Response
	{
		return $this->set(Fields::FIELD_ERROR_CODE, (string) $value);
	}

	/**
	 * @param string $value
	 * @return $this
	 */
	public function setHtml(string $value): Response
	{
		return $this->set(Fields::FIELD_HTML, $value);
	}

	/**
	 * @param array $arr
	 * @return $this
	 */
	public function setConfigs(array $arr): TightResponse
	{
		return $this->set(Fields::FIELD_CONFIGS, $arr);
	}

	/**
	 * @param string $key
	 * @param mixed $value
	 * @return $this
	 */
	public function setConfig(string $key, $value): TightResponse
	{
		return $this->insert(Fields::FIELD_CONFIGS, $key, $value);
	}

	/**
	 * @param array $arr
	 * @return $this
	 */
	public function addConfigs(array $arr): TightResponse
	{
		return $this->merge(Fields::FIELD_CONFIGS, $arr);
	}

	/**
	 * @param string $key
	 * @param mixed $value
	 * @return $this
	 */
	public function addConfig(string $key, $value): TightResponse
	{
		return $this->add(Fields::FIELD_CONFIGS, $key, $value);
	}

	/**
	 * @param array $list
	 * @param bool $keys [optional]
	 * @return $this
	 */
	public function removeConfigs(array $list, bool $keys = false): TightResponse
	{
		return $this->drop(Fields::FIELD_CONFIGS, $list, $keys);
	}

	/**
	 * @param string $key
	 * @return $this
	 */
	public function removeConfig(string $key): TightResponse
	{
		return $this->remove(Fields::FIELD_CONFIGS, $key);
	}

	/**
	 * @return $this
	 */
	public function clearConfigs(): TightResponse
	{
		return $this->set(Fields::FIELD_CONFIGS, []);
	}

	/**
	 * @return array
	 */
	public function getConfigs(): array
	{
		return $this->get(Fields::FIELD_CONFIGS, []);
	}

	/**
	 * @param string $key
	 * @param mixed $default [optional]
	 * @return mixed
	 */
	public function getConfig(string $key, $default = null)
	{
		return $this->target(Fields::FIELD_CONFIGS, $key, $default);
	}

	/**
	 * @param array $arr
	 * @return $this
	 */
	public function setDatas(array $arr): TightResponse
	{
		return $this->set(Fields::FIELD_DATAS, $arr);
	}

	/**
	 * @param string $key
	 * @param mixed $value
	 * @return $this
	 */
	public function setData(string $key, $value): TightResponse
	{
		return $this->insert(Fields::FIELD_DATAS, $key, $value);
	}

	/**
	 * @param array $arr
	 * @return $this
	 */
	public function addDatas(array $arr): TightResponse
	{
		return $this->merge(Fields::FIELD_DATAS, $arr);
	}

	/**
	 * @param string $key
	 * @param mixed $value
	 * @return $this
	 */
	public function addData(string $key, $value): TightResponse
	{
		return $this->add(Fields::FIELD_DATAS, $key, $value);
	}

	/**
	 * @param array $list
	 * @param bool $keys [optional]
	 * @return $this
	 */
	public function removeDatas(array $list, bool $keys = false): TightResponse
	{
		return $this->drop(Fields::FIELD_DATAS, $list, $keys);
	}

	/**
	 * @param string $key
	 * @return $this
	 */
	public function removeData(string $key): TightResponse
	{
		return $this->remove(Fields::FIELD_DATAS, $key);
	}

	/**
	 * @return $this
	 */
	public function clearDatas(): TightResponse
	{
		return $this->set(Fields::FIELD_DATAS, []);
	}

	/**
	 * @return array
	 */
	public function getDatas(): array
	{
		return $this->get(Fields::FIELD_DATAS, []);
	}

	/**
	 * @param string $key
	 * @param mixed $default [optional]
	 * @return mixed
	 */
	public function getData(string $key, $default = null)
	{
		return $this->target(Fields::FIELD_DATAS, $key, $default);
	}

	/**
	 * @param array $arr
	 * @return $this
	 */
	public function setOptions(array $arr): Response
	{
		return $this->set(Fields::FIELD_OPTIONS, $arr);
	}

	/**
	 * @param string $key
	 * @param mixed $value
	 * @return $this
	 */
	public function setOption(string $key, $value): Response
	{
		return $this->insert(Fields::FIELD_OPTIONS, $key, $value);
	}

	/**
	 * @param array $arr
	 * @return $this
	 */
	public function addOptions(array $arr): Response
	{
		return $this->merge(Fields::FIELD_OPTIONS, $arr);
	}

	/**
	 * @param string $key
	 * @param mixed $value
	 * @return $this
	 */
	public function addOption(string $key, $value): Response
	{
		return $this->add(Fields::FIELD_OPTIONS, $key, $value);
	}

	/**
	 * @param array $list
	 * @param bool $keys [optional]
	 * @return $this
	 */
	public function removeOptions(array $list, bool $keys = false): Response
	{
		return $this->drop(Fields::FIELD_OPTIONS, $list, $keys);
	}

	/**
	 * @param string $key
	 * @return $this
	 */
	public function removeOption(string $key): Response
	{
		return $this->remove(Fields::FIELD_OPTIONS, $key);
	}

	/**
	 * @return $this
	 */
	public function clearOptions(): Response
	{
		return $this->set(Fields::FIELD_OPTIONS, []);
	}

	/**
	 * @return array
	 */
	public function getOptions(): array
	{
		return $this->get(Fields::FIELD_OPTIONS, []);
	}

	/**
	 * @param string $key
	 * @param mixed $default [optional]
	 * @return mixed
	 */
	public function getOption(string $key, $default = null)
	{
		return $this->target(Fields::FIELD_OPTIONS, $key, $default);
	}

	/**
	 * @param array $arr
	 * @return $this
	 */
	public function setItems(array $arr): Response
	{
		return $this->set(Fields::FIELD_ITEMS, $arr);
	}

	/**
	 * @param string $key
	 * @param mixed $value
	 * @return $this
	 */
	public function setItem(string $key, $value): Response
	{
		return $this->insert(Fields::FIELD_ITEMS, $key, $value);
	}

	/**
	 * @param array $arr
	 * @return $this
	 */
	public function addItems(array $arr): Response
	{
		return $this->merge(Fields::FIELD_ITEMS, $arr);
	}

	/**
	 * @param string $key
	 * @param mixed $value
	 * @return $this
	 */
	public function addItem(string $key, $value): Response
	{
		return $this->add(Fields::FIELD_ITEMS, $key, $value);
	}

	/**
	 * @param array $list
	 * @param bool $keys [optional]
	 * @return $this
	 */
	public function removeItems(array $list, bool $keys = false): Response
	{
		return $this->drop(Fields::FIELD_ITEMS, $list, $keys);
	}

	/**
	 * @param string $key
	 * @return $this
	 */
	public function removeItem(string $key): Response
	{
		return $this->remove(Fields::FIELD_ITEMS, $key);
	}

	/**
	 * @return $this
	 */
	public function clearItems(): Response
	{
		return $this->set(Fields::FIELD_ITEMS, []);
	}

	/**
	 * @return array
	 */
	public function getItems(): array
	{
		return $this->get(Fields::FIELD_ITEMS, []);
	}

	/**
	 * @param string $key
	 * @param mixed $default [optional]
	 * @return mixed
	 */
	public function getItem(string $key, $default = null)
	{
		return $this->target(Fields::FIELD_ITEMS, $key, $default);
	}

	/**
	 * @param array $arr
	 * @return $this
	 */
	public function setTexts(array $arr): Response
	{
		return $this->set(Fields::FIELD_TEXTS, $arr);
	}

	/**
	 * @param string $key
	 * @param mixed $value
	 * @return $this
	 */
	public function setText(string $key, $value): Response
	{
		return $this->insert(Fields::FIELD_TEXTS, $key, $value);
	}

	/**
	 * @param array $arr
	 * @return $this
	 */
	public function addTexts(array $arr): Response
	{
		return $this->merge(Fields::FIELD_TEXTS, $arr);
	}

	/**
	 * @param string $key
	 * @param mixed $value
	 * @return $this
	 */
	public function addText(string $key, $value): Response
	{
		return $this->add(Fields::FIELD_TEXTS, $key, $value);
	}

	/**
	 * @param array $list
	 * @param bool $keys [optional]
	 * @return $this
	 */
	public function removeTexts(array $list, bool $keys = false): Response
	{
		return $this->drop(Fields::FIELD_TEXTS, $list, $keys);
	}

	/**
	 * @param string $key
	 * @return $this
	 */
	public function removeText(string $key): Response
	{
		return $this->remove(Fields::FIELD_TEXTS, $key);
	}

	/**
	 * @return $this
	 */
	public function clearTexts(): Response
	{
		return $this->set(Fields::FIELD_TEXTS, []);
	}

	/**
	 * @return array
	 */
	public function getTexts(): array
	{
		return $this->get(Fields::FIELD_TEXTS, []);
	}

	/**
	 * @param string $key
	 * @param mixed $default [optional]
	 * @return mixed
	 */
	public function getText(string $key, $default = null)
	{
		return $this->target(Fields::FIELD_TEXTS, $key, $default);
	}

	/**
	 * @param array $arr
	 * @return $this
	 */
	public function setLogs(array $arr): Response
	{
		return $this->set(Fields::FIELD_LOGS, $arr);
	}

	/**
	 * @param string $key
	 * @param mixed $value
	 * @return $this
	 */
	public function setLog(string $key, $value): Response
	{
		return $this->insert(Fields::FIELD_LOGS, $key, $value);
	}

	/**
	 * @param array $arr
	 * @return $this
	 */
	public function addLogs(array $arr): Response
	{
		return $this->merge(Fields::FIELD_LOGS, $arr);
	}

	/**
	 * @param string $key
	 * @param mixed $value
	 * @return $this
	 */
	public function addLog(string $key, $value): Response
	{
		return $this->add(Fields::FIELD_LOGS, $key, $value);
	}

	/**
	 * @param array $list
	 * @param bool $keys [optional]
	 * @return $this
	 */
	public function removeLogs(array $list, bool $keys = false): Response
	{
		return $this->drop(Fields::FIELD_LOGS, $list, $keys);
	}

	/**
	 * @param string $key
	 * @return $this
	 */
	public function removeLog(string $key): Response
	{
		return $this->remove(Fields::FIELD_LOGS, $key);
	}

	/**
	 * @return $this
	 */
	public function clearLogs(): Response
	{
		return $this->set(Fields::FIELD_LOGS, []);
	}

	/**
	 * @return array
	 */
	public function getLogs(): array
	{
		return $this->get(Fields::FIELD_LOGS, []);
	}

	/**
	 * @param string $key
	 * @param mixed $default [optional]
	 * @return mixed
	 */
	public function getLog(string $key, $default = null)
	{
		return $this->target(Fields::FIELD_LOGS, $key, $default);
	}
}