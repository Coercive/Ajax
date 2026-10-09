<?php
namespace Coercive\Utility\Ajax\Tests;

use Coercive\Utility\Ajax\Fields;
use Coercive\Utility\Ajax\TightResponse;
use PHPUnit\Framework\TestCase;

final class CustomFields extends Fields
{
	const FIELD_CUSTOM = 'custom';
}

final class TightResponseTest extends TestCase
{
	public function testEmptyArraySkipNull(): void
	{
		$this->assertSame([], (new TightResponse)->array());
	}

	public function testSkipNullRemovesNullAndEmptyArray(): void
	{
		$r = (new TightResponse)
			->set('a', null)
			->set('b', [])
			->set('c', 0)
			->set('d', '')
			->set('e', false);
		$this->assertSame(['c' => 0, 'd' => '', 'e' => false], $r->array());
	}

	public function testNoSkipNullExportsAllFields(): void
	{
		$arr = (new TightResponse)->skipNull(false)->set(Fields::FIELD_ID, '1')->array();
		$this->assertSame('1', $arr[Fields::FIELD_ID]);
		foreach (Fields::getConstants() as $field) {
			$this->assertArrayHasKey($field, $arr);
		}
	}

	public function testRequiredFieldsKeptEvenIfNull(): void
	{
		$r = (new TightResponse)
			->defaultRequiredFields(['id'])
			->requiredFields(['name', 'datas'])
			->set('datas', []);
		$this->assertSame(['datas' => [], 'id' => null, 'name' => null], $r->array());
	}

	public function testDefaultsBySuccessAndFailure(): void
	{
		$r = (new TightResponse)
			->setDefault('title', 'default')
			->setDefault('message', 'ok', true)
			->setDefault('message', 'ko', false);

		$this->assertSame(['title' => 'default', 'message' => 'ko'], $r->array());

		$r->setStatus(true);
		$this->assertSame(['title' => 'default', 'message' => 'ok', 'status' => true], $r->array());

		$r->set('title', 'custom');
		$this->assertSame('custom', $r->array()['title']);
	}

	public function testDataManipulation(): void
	{
		$r = new TightResponse;
		$r->merge('list', ['a' => 1])->merge('list', ['b' => 2]);
		$this->assertSame(['a' => 1, 'b' => 2], $r->get('list'));

		$r->insert('list', 'c', 3);
		$this->assertSame(3, $r->target('list', 'c'));

		$r->add('list', 'c', 4)->add('list', 'd', 5);
		$this->assertSame([3, 4], $r->target('list', 'c'));
		$this->assertSame([5], $r->target('list', 'd'));

		$r->remove('list', 'd');
		$this->assertNull($r->target('list', 'd'));
		$this->assertSame('x', $r->target('list', 'd', 'x'));

		$r->drop('list', ['a']);
		$this->assertSame(['b' => 2, 'c' => [3, 4]], $r->get('list'));

		$r->drop('list', ['c' => 'whatever'], true);
		$this->assertSame(['b' => 2], $r->get('list'));

		$this->assertSame('none', $r->get('unknown', 'none'));
	}

	public function testDrop(): void
	{
		$data = ['a' => 1, 'b' => 2, 'c' => 3, 0 => 'zero', 1 => 'one'];
		$drop = function (array $list, bool $useKeys = false) use ($data): array {
			return (new TightResponse)->set('list', $data)->drop('list', $list, $useKeys)->get('list');
		};

		# List of key names (default)
		$this->assertSame(['c' => 3, 0 => 'zero', 1 => 'one'], $drop(['a', 'b']));
		$this->assertSame(['a' => 1, 'b' => 2, 'c' => 3], $drop([0, 1]));
		$this->assertSame($data, $drop(['unknown']));
		$this->assertSame($data, $drop([]));

		# Associative array : use its keys, ignore its values
		$this->assertSame(['c' => 3, 0 => 'zero', 1 => 'one'], $drop(['a' => 'x', 'b' => 'y'], true));
		$this->assertSame(['a' => 1, 'b' => 2, 'c' => 3], $drop(['a', 'b'], true));
		$this->assertSame($data, $drop([], true));
	}

	public function testDropOnUnknownField(): void
	{
		$r = (new TightResponse)->skipNull(false)->drop(Fields::FIELD_DATAS, ['a']);
		$this->assertNull($r->get(Fields::FIELD_DATAS));
		$this->assertNull($r->array()[Fields::FIELD_DATAS]);
	}

	public function testReset(): void
	{
		$r = (new TightResponse)
			->defaultRequiredFields(['id'])
			->requiredFields(['name'])
			->setDefault('title', 'default')
			->setStatus(true)
			->set('id', '1')
			->set('name', 'foo');

		$r->reset(['name']);
		$this->assertSame(['title' => 'default', 'name' => 'foo', 'id' => null], $r->array());
		$this->assertFalse($r->isSuccess());

		$r->setStatus(true)->reset([Fields::FIELD_STATUS]);
		$this->assertTrue($r->isSuccess());
	}

	public function testStatusBeforeSet(): void
	{
		$r = new TightResponse;
		$this->assertFalse($r->isSuccess());
		$this->assertTrue($r->isFailure());
	}

	public function testStatus(): void
	{
		$r = (new TightResponse)->setStatus(true);
		$this->assertTrue($r->isSuccess());
		$this->assertFalse($r->isFailure());

		$r->setStatus(false);
		$this->assertFalse($r->isSuccess());
		$this->assertTrue($r->isFailure());
	}

	public function testJson(): void
	{
		$r = (new TightResponse)->set('id', '1')->setStatus(true);
		$this->assertSame('{"id":"1","status":true}', $r->json());
		$this->assertSame('{"id":"1","status":true}', (string) $r);
		$this->assertFalse($r->getJsonLastErrorStatus());
		$this->assertSame(JSON_ERROR_NONE, $r->getJsonLastErrorCode());
		$this->assertSame('No error', $r->getJsonLastErrorMessage());
	}

	public function testJsonError(): void
	{
		$r = (new TightResponse)->set('bad', "\xB1\x31");
		$this->assertSame('', $r->json());
		$this->assertTrue($r->getJsonLastErrorStatus());
		$this->assertSame(JSON_ERROR_UTF8, $r->getJsonLastErrorCode());
		$this->assertNotSame('', $r->getJsonLastErrorMessage());

		$r->reset();
		$this->assertFalse($r->getJsonLastErrorStatus());
		$this->assertSame(0, $r->getJsonLastErrorCode());
		$this->assertSame('', $r->getJsonLastErrorMessage());
	}

	public function testCallbacks(): void
	{
		$array = null;
		$json = null;
		$r = (new TightResponse)
			->set('id', '1')
			->callAfterArray(function (array $arr) use (&$array) { $array = $arr; })
			->callAfterJson(function (string $str) use (&$json) { $json = $str; });

		$r->json();
		$this->assertSame(['id' => '1'], $array);
		$this->assertSame('{"id":"1"}', $json);

		$array = $json = null;
		$r->callAfterArray()->callAfterJson()->json();
		$this->assertNull($array);
		$this->assertNull($json);
	}

	public function testGetConstantsIsCachedPerClass(): void
	{
		$parent = Fields::getConstants();
		$child = CustomFields::getConstants();

		$this->assertArrayNotHasKey('FIELD_CUSTOM', $parent);
		$this->assertSame('custom', $child['FIELD_CUSTOM']);
		$this->assertArrayNotHasKey('FIELD_CUSTOM', Fields::getConstants());
		$this->assertCount(count($parent) + 1, $child);
	}
}
