<?php
namespace Coercive\Utility\Ajax;

use Coercive\Utility\HeaderStatus\HeaderStatus;

/**
 * Ajax Tight Response
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
class TightResponse
{
	# CONFIG

	protected bool $skipNull = true;

	protected array $defaultRequiredFields = [];

	protected array $requiredFields = [];

	protected int $successHttpResponseCode = 200;

	protected int $failureHttpResponseCode = 500;

	# DATAS STORAGE

	protected ? bool $status = null;

	protected array $defaults = [];

	protected array $successDefaults = [];

	protected array $failureDefaults = [];

	protected array $datas = [];

	# COMPILING JSON STATUS

	/** @var bool An error occured when build data as json */
	private bool $jsonLastErrorStatus = false;

	/** @var int json error code for debug */
	private int $jsonLastErrorCode = 0;

	/** @var string json error message for debug */
	private string $jsonLastErrorMessage = '';

	/**
	 * Export full data, or only setted data
	 *
	 * @param bool $status
	 * @return $this
	 */
	public function skipNull(bool $status): TightResponse
	{
		$this->skipNull = $status;
		return $this;
	}

	/**
	 * @param array $fields
	 * @return $this
	 */
	public function defaultRequiredFields(array $fields): TightResponse
	{
		$this->defaultRequiredFields = $fields;
		return $this;
	}

	/**
	 * @param array $fields
	 * @return $this
	 */
	public function requiredFields(array $fields): TightResponse
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
	public function httpResponseCodes(int $success = 200, int $failure = 500): TightResponse
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
	 * @param array $keep [optional] List of data field contents to keep
	 * @return $this
	 */
	public function reset(array $keep = []): TightResponse
	{
		$datas = [];
		foreach ($keep as $field) {
			if(isset($this->datas[$field])) {
				$datas[$field] = $this->datas[$field];
			}
		}
		$this->datas = $datas;

		if(!in_array(Fields::FIELD_STATUS, $keep)) {
			$this->status = null;
		}

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
		$arr = array_merge($this->defaults, ($this->status ? $this->successDefaults : $this->failureDefaults), $this->datas);

		$requiredFields = array_filter(array_unique(array_merge($this->defaultRequiredFields, $this->requiredFields)));
		foreach ($requiredFields as $key) {
			if(!array_key_exists($key, $arr)) {
				$arr[$key] = null;
			}
		}

		if (!$this->skipNull) {
			foreach (Fields::getConstants() as $key) {
				if(!array_key_exists($key, $arr)) {
					$arr[$key] = null;
				}
			}
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
			return false;
		}
	}

	/**
	 * Set custom default parameter
	 *
	 * @param string $field
	 * @param mixed $value
	 * @param bool|null $status [optional]
	 * @return $this
	 */
	public function setDefault(string $field, $value, ? bool $status = null): TightResponse
	{
		if(null === $status)
		{
			$this->defaults[$field] = $value;
		}
		elseif(false === $status)
		{
			$this->failureDefaults[$field] = $value;
		}
		elseif(true === $status)
		{
			$this->successDefaults[$field] = $value;
		}
		return $this;
	}

	/**
	 * Set custom parameter
	 *
	 * @param string $field
	 * @param mixed $value
	 * @return $this
	 */
	public function set(string $field, $value): TightResponse
	{
		$this->datas[$field] = $value;
		return $this;
	}

	/**
	 * @param string $field
	 * @param array $datas
	 * @return $this
	 */
	public function merge(string $field, array $datas): TightResponse
	{
		$this->datas[$field] = array_merge($this->datas[$field] ?? [], $datas);
		return $this;
	}

	/**
	 * @param string $field
	 * @param string $key
	 * @param mixed $value
	 * @return $this
	 */
	public function insert(string $field, string $key, $value): TightResponse
	{
		$this->datas[$field][$key] = $value;
		return $this;
	}

	/**
	 * @param string $field
	 * @param string $key
	 * @param mixed $value
	 * @return $this
	 */
	public function add(string $field, string $key, $value): TightResponse
	{
		if(!is_array($this->datas[$field][$key] ?? [])) {
			$this->datas[$field][$key] = [$this->datas[$field][$key]];
		}
		$this->datas[$field][$key][] = $value;
		return $this;
	}

	/**
	 * @param string $field
	 * @param array $list
	 * @param bool $keys [optional]
	 * @return $this
	 */
	public function drop(string $field, array $list, bool $keys = false): TightResponse
	{
		if($keys) {
			$list = array_keys($list);
		}
		$this->datas[$field] = array_diff_key($this->datas[$field] ?? [], $list);
		return $this;
	}

	/**
	 * @param string $field
	 * @param string $key
	 * @return $this
	 */
	public function remove(string $field, string $key): TightResponse
	{
		unset($this->datas[$field][$key]);
		return $this;
	}

	/**
	 * @param string $field
	 * @param mixed $default [optional]
	 * @return mixed
	 */
	public function get(string $field, $default = null)
	{
		return $this->datas[$field] ?? $default;
	}

	/**
	 * @param string $field
	 * @param string $key
	 * @param mixed $default [optional]
	 * @return mixed
	 */
	public function target(string $field, string $key, $default = null)
	{
		return $this->datas[$field][$key] ?? $default;
	}

	/**
	 * @param bool $status
	 * @return $this
	 */
	public function setStatus(bool $status): TightResponse
	{
		$this->status = $status;
		return $this->set(Fields::FIELD_STATUS, $status);
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