<?php
namespace Coercive\Utility\Ajax\Tests;

use Coercive\Utility\Ajax\Fields;
use Coercive\Utility\Ajax\Response;
use PHPUnit\Framework\TestCase;

final class ResponseTest extends TestCase
{
	public function testScalarSetters(): void
	{
		$r = (new Response)
			->setId(12)
			->setCode(404)
			->setErrorCode(500)
			->setTitle('title')
			->setMessage('message')
			->setTimeout(1000)
			->setRedirect(true)
			->setNextUrl('/next');

		$this->assertSame([
			Fields::FIELD_ID => '12',
			Fields::FIELD_CODE => '404',
			Fields::FIELD_ERROR_CODE => '500',
			Fields::FIELD_TITLE => 'title',
			Fields::FIELD_MESSAGE => 'message',
			Fields::FIELD_TIMEOUT => 1000,
			Fields::FIELD_REDIRECT => true,
			Fields::FIELD_NEXT_URL => '/next',
		], $r->array());
	}

	public function testLabelSetters(): void
	{
		$arr = (new Response)
			->setOpen(true)
			->setOpenLabel('open')
			->setClose(true)
			->setCloseLabel('close')
			->setConfirm(true)
			->setConfirmLabel('confirm')
			->array();

		$this->assertSame('open', $arr[Fields::FIELD_OPEN_LABEL]);
		$this->assertSame('close', $arr[Fields::FIELD_CLOSE_LABEL]);
		$this->assertSame('confirm', $arr[Fields::FIELD_CONFIRM_LABEL]);
		$this->assertTrue($arr[Fields::FIELD_CONFIRM]);
	}

	public function testDefaultConfirmLabel(): void
	{
		$r = (new Response)
			->setDefaultConfirmLabel('default')
			->setDefaultSuccessConfirmLabel('success')
			->setDefaultFailureConfirmLabel('failure');

		$this->assertSame([Fields::FIELD_CONFIRM_LABEL => 'failure'], $r->array());

		$arr = $r->setStatus(true)->array();
		$this->assertSame('success', $arr[Fields::FIELD_CONFIRM_LABEL]);
		$this->assertArrayNotHasKey(Fields::FIELD_CONFIRM, $arr);
	}

	public function testDefaultSetters(): void
	{
		$r = (new Response)
			->setDefaultId(1)
			->setDefaultTitle('title')
			->setDefaultSuccessMessage('ok')
			->setDefaultFailureMessage('ko');

		$this->assertSame([
			Fields::FIELD_ID => '1',
			Fields::FIELD_TITLE => 'title',
			Fields::FIELD_MESSAGE => 'ko',
		], $r->array());

		$this->assertSame('ok', $r->setStatus(true)->array()[Fields::FIELD_MESSAGE]);
	}

	/**
	 * @return array<string, array{string, string}>
	 */
	public static function collectionProvider(): array
	{
		return [
			'configs' => ['Config', Fields::FIELD_CONFIGS],
			'datas' => ['Data', Fields::FIELD_DATAS],
			'options' => ['Option', Fields::FIELD_OPTIONS],
			'items' => ['Item', Fields::FIELD_ITEMS],
			'texts' => ['Text', Fields::FIELD_TEXTS],
			'logs' => ['Log', Fields::FIELD_LOGS],
		];
	}

	#[\PHPUnit\Framework\Attributes\DataProvider('collectionProvider')]
	public function testCollections(string $name, string $field): void
	{
		$r = new Response;
		$plural = $name . 's';

		$r->{"set$plural"}(['a' => 1]);
		$r->{"set$name"}('b', 2);
		$r->{"add$plural"}(['c' => 3]);
		$r->{"add$name"}('c', 4);
		$this->assertSame(['a' => 1, 'b' => 2, 'c' => [3, 4]], $r->{"get$plural"}());
		$this->assertSame(2, $r->{"get$name"}('b'));
		$this->assertSame('x', $r->{"get$name"}('z', 'x'));
		$this->assertSame(['a' => 1, 'b' => 2, 'c' => [3, 4]], $r->array()[$field]);

		$r->{"remove$name"}('b');
		$r->{"remove$plural"}(['a']);
		$this->assertSame(['c' => [3, 4]], $r->{"get$plural"}());

		$r->{"add$plural"}(['d' => 5, 'e' => 6]);
		$r->{"remove$plural"}(['c' => 'whatever', 'd' => 'whatever'], true);
		$this->assertSame(['e' => 6], $r->{"get$plural"}());

		$r->{"clear$plural"}();
		$this->assertSame([], $r->{"get$plural"}());
		$this->assertArrayNotHasKey($field, $r->array());
	}
}
