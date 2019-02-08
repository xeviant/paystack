<?php
/**
 *
 * This file is part of the Xeviant Paystack package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package          Paystack
 * @version          1.0
 * @author           Olatunbosun Egberinde
 * @license          MIT Licence
 * @copyright        (c) Olatunbosun Egberinde <bosunski@gmail.com>
 * @link             https://github.com/bosunski/paystack
 *
 */

namespace Xeviant\Paystack\Tests\Api;


class TransferRecipientsTest extends ApiTestCase
{
	const PATH = '/transferrecipient';

	/**
	 * @test
	 */
	public function shouldDeleteTransferRecipient(): void
	{
		$expectedResult = ['message' => 'Transfer recipient set as inactive'];
		$recipientId = 'RCP_x123';

		$api = $this->getApiMock();
		$api->expects(self::once())
		    ->method('delete')
		    ->with(self::PATH .'/' . $recipientId)
		    ->willReturn($expectedResult);

		$this->assertEquals($expectedResult, $api->delete($recipientId));
	}

	/**
	 * @test
	 */
	public function shouldGetTransferRecipients(): void
	{
		$expectedResult = ['data' => [['integration' => 900713]]];

		$api = $this->getApiMock();
		$api->expects(self::once())
		    ->method('get')
		    ->with(self::PATH)
		    ->willReturn($expectedResult);

		$this->assertEquals($expectedResult, $api->list());
	}

	/**
	 * @test
	 */
	public function shouldCreateTransferRecipient(): void
	{
		$expectedResult = ['data' => ['name' => 'Name', 'type' => 'nuban']];
		$input = [
			'name' => 'Name',
			'type' => 'nuban',
		];

		$api = $this->getApiMock();
		$api->expects(self::once())
		    ->method('post')
		    ->with(self::PATH, $input)
		    ->willReturn($expectedResult);

		$this->assertEquals($expectedResult, $api->create($input));
	}

	/**
	 * @test
	 */
	public function shouldUpdatePage(): void
	{
		$input = ['name' => 'Example Name 2'];
		$expectedResult = ['data' => ['name' => 'Example Name 2']];
		$recipientId = 'RCP_x123';

		$api = $this->getApiMock();
		$api->expects(self::once())
		    ->method('put')
		    ->with(self::PATH . "/$recipientId", $input)
		    ->willReturn($expectedResult);

		$this->assertEquals($expectedResult, $api->update($recipientId, $input));
	}

	/**
	 * @test
	 */
	public function shouldGetTransactionsApiObject()
	{
		$api = $this->getApiMock();

		self::assertInstanceOf(TransferRecipientsTest::class, $api);
	}


	/**
	 * @return string
	 */
	protected function getApiClass(): string
	{
		return TransferRecipientsTest::class;
	}
}